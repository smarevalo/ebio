<?php
 
class Titulo extends MX_Controller{

    private $name = 'El título';
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
            $this->load->model('Titulo_model');
            $this->load->model('Planes_model');
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
            /* $data['titulos'] = $this->Titulo_model->get_all_titulos(); */
            $data['titulos'] = $this->Titulo_model->get_all_titulos_by_carrera($id_carrera);
            $data['user'] = $this->ion_auth->user()->row();
            
            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }       
            $this->template->cargar_vista('abm/titulo/index', $data);
        }
    }

    public function add()
    {
		$this->form_validation->set_rules('nombre','Nombre','required');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'id_plan' => $this->input->post('id_plan'),
                'id_orientacion' => ($this->input->post('id_orientacion') == '')? null:$this->input->post('id_orientacion'),
                'nombre' => $this->input->post('nombre'),
            );
            
            if ($this->Titulo_model->add_titulo($params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
            
            redirect(site_url('abm/planes/edit/'.$this->input->post('id_plan')));
        }
        else
        {
            $data['planes'] = $this->Planes_model->get_all_planes();
            $data['orientaciones'] = $this->Orientaciones_model->get_all_orientaciones();
            
            $this->template->cargar_vista('abm/titulo/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['titulo'] = $this->Titulo_model->get_titulo($id);
        
        if(isset($data['titulo']['id']))
        {
			$this->form_validation->set_rules('nombre','Nombre','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_orientacion' => ($this->input->post('id_orientacion') == '')? null:$this->input->post('id_orientacion'),
					'nombre' => $this->input->post('nombre'),
                );
            
                if ($this->Titulo_model->update_titulo($id,$params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                    
                redirect(site_url('abm/planes/edit/'.$data['titulo']['id_plan']));
            }
            else
            {
				$data['plan'] = $data['titulo']['id_plan'];
				$data['orientaciones'] = $this->Orientaciones_model->get_orientaciones_by_plan($data['titulo']['id_plan']);

                 $this->template->cargar_vista('abm/titulo/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $titulo = $this->Titulo_model->get_titulo($id);

        // check if the titulo exists before trying to delete it
        if(isset($titulo['id']))
        {
            if ($this->Titulo_model->delete_titulo($id))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_remove_success_text'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_remove_error_text'), $this->name));    
                
            redirect(site_url('abm/planes/edit/'.$titulo['id_plan']));
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }
    
}
