<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planes extends MX_Controller{

    private $name = 'El plan';
    function __construct()
    {
        parent::__construct();    
        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library(array('ion_auth', 'form_validation'));
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            $this->load->module('template');
            $this->load->model('Carrera_model');
            $this->load->model('Ciclo_model');
            $this->load->model('Planes_model');
            $this->load->model('Titulo_model');
            $this->load->model('Orientaciones_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    } 

    public function index($id_carrera, $mensaje=null)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            $data['planes'] = $this->Planes_model->get_all_planes_by_carrera($id_carrera);
            
            foreach ($data['planes'] as $key => $plan) {
                $data['planes'][$key]->ciclos =  new stdClass;
                $data['planes'][$key]->ciclos = $this->Ciclo_model->get_ciclos_by_plan($plan->id); 
            }

            $data['id_carrera'] = $id_carrera; 
            $data['user'] = $this->ion_auth->user()->row();
            
            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }
            
            $this->template->cargar_vista('abm/planes/index', $data);
        }
    }

    public function add($id_carrera=null)
    {
        $this->form_validation->set_rules('nombre',lang('form_name'),'required');
		$this->form_validation->set_rules('duracion',lang('form_duration'),'required|integer');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_carrera' => $this->input->post('id_carrera'),
                'nombre' => $this->input->post('nombre'),
				'duracion' => $this->input->post('duracion'),
            );
            $plan_id = $this->Planes_model->add_planes($params);            
            
            if ($plan_id)
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
             
            redirect(site_url('abm/planes/edit/'.$plan_id));
        }
        else
        {
            $data['carrera'] = $this->Carrera_model->get_carrera($id_carrera);
            $this->template->cargar_vista('abm/planes/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['plan'] = $this->Planes_model->get_planes($id);
        
        if(isset($data['plan']['id']))
        {
            $this->form_validation->set_rules('nombre',lang('form_name'),'required');
            $this->form_validation->set_rules('duracion',lang('form_duration'),'required|integer');

			if($this->form_validation->run())     
            {   
                $params = array(
					'id_carrera' => $this->input->post('id_carrera'),
					'nombre' => $this->input->post('nombre'),
                    'duracion' => $this->input->post('duracion'),
                );
            
                if ($this->Planes_model->update_planes($id,$params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                    
                $this->index($this->input->post('id_carrera'), $mensaje);
            }
            else
            {
                $data['ciclos'] = $this->Ciclo_model->get_ciclos_by_plan($data['plan']['id']);
                $data['carreras'] = $this->Carrera_model->get_all_carrera();
				$data['orientaciones'] = $this->Orientaciones_model->get_orientaciones_by_plan($data['plan']['id']);
                $data['titulos'] = $this->Titulo_model->get_all_titulos_by_plan($data['plan']['id']); 

                $this->template->cargar_vista('abm/planes/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $plan = $this->Planes_model->get_planes($id);

        if(isset($plan['id']))
        {   
            $c = $this->Planes_model->get_carrera_by_plan($plan['id']);
            if ($this->Planes_model->delete_planes($id))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_remove_success_text'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_remove_error_text'), $this->name));    
            
            $this->index($c->id_carrera, $mensaje);
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }

    public function activate($id)
    {
        if ($this->ion_auth->is_admin())
        {
            $cantidad = $this->Planes_model->existe_plan_carrera($id);
            if($cantidad[0]->cantidad == 1){
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('plan_activate_error'), $this->name));
            }else{
                $update['vigente']= true;
                $this->Planes_model->change_status($id, $update);
                $mensaje = $this->template->cargar_alerta('success', lang('record_success'),
                                sprintf(lang('plan_activate_success'), $this->name));
            }

            $c = $this->Planes_model->get_carrera_by_plan($id);
            $this->index($c->id_carrera, $mensaje);   
        }
    }

    public function deactivate($id=NULL)
    {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
        {
            $params['vigente']= false; 
            if ($this->Planes_model->change_status($id, $params))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('plan_deactivate_success'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('plan_deactivate__error'), $this->name));    

            $c = $this->Planes_model->get_carrera_by_plan($id);
            $this->index($c->id_carrera, $mensaje);
        }
    }
    
}
