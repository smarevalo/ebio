<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correlatividad_tipo extends MX_Controller {

    private $name = 'El tipo de correlatividad';
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
            $this->load->model('Correlatividad_tipo_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    }

    public function index($mensaje=null)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            $data['tipos'] = $this->Correlatividad_tipo_model->get_all_correlativas_tipo(); 
            $data['user'] = $this->ion_auth->user()->row();
            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }

            $this->template->cargar_vista('abm/correlatividad_tipo/index', $data);
        }

    }

    public function add()
    {
		$this->form_validation->set_rules('nombre',lang('form_name'),'required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'descripcion' => $this->input->post('nombre'),
            );
            
            if ($this->Correlatividad_tipo_model->add_correlativas_tipo($params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
                    
            $this->index($mensaje);
        }
        else
        {
            $data['user'] = $this->ion_auth->user()->row();
            $this->template->cargar_vista('abm/correlatividad_tipo/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['tipo'] = $this->Correlatividad_tipo_model->get_correlativas_tipo($id);
        
        if(isset($data['tipo']['id']))
        {
			$this->form_validation->set_rules('nombre',lang('form_name'),'required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'descripcion' => $this->input->post('nombre'),
                );

                if ($this->Correlatividad_tipo_model->update_correlativas_tipo($id,$params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                    
                $this->index($mensaje);
            }
            else
            {
                $data['user'] = $this->ion_auth->user()->row();
        
                $this->template->cargar_vista('abm/correlatividad_tipo/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $tipo = $this->Correlatividad_tipo_model->get_correlativas_tipo($id);

        // check if the materia exists before trying to delete it
        if(isset($tipo['id']))
        {
            if ($this->Correlatividad_tipo_model->delete_correlativas_tipo($id))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_remove_success_text'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_remove_error_text'), $this->name));    
                
            $this->index($mensaje);
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }
	
}

