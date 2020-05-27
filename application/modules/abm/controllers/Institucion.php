<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Institucion extends MX_Controller{

    private $name = 'La institución';
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
            $this->load->model('Institucion_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    } 

    public function index($mensaje=null)
    {
        $data['instituciones'] = $this->Institucion_model->get_all_instituciones();
        if (isset($mensaje)) {
            $data['alerta'] = $mensaje;
        }
        $this->template->cargar_vista('abm/institucion/index', $data);
    }

    public function add()
    {
		$this->form_validation->set_rules('razon_social','Razon Social','required|max_length[100]');
        $this->form_validation->set_rules('cuit','Cuit','required|max_length[11]');
		$this->form_validation->set_rules('direccion','Dirección','required|max_length[100]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'razon_social' => $this->input->post('razon_social'),
                'cuit' => $this->input->post('cuit'),
				'direccion' => $this->input->post('direccion'),
            );
            
            if ($this->Institucion_model->add_institucion($params))
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
            $this->template->cargar_vista('abm/institucion/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['institucion'] = $this->Institucion_model->get_institucion($id);
        
        if(isset($data['institucion']['id']))
        {
			$this->form_validation->set_rules('razon_social','Razon Social','required|max_length[100]');
            $this->form_validation->set_rules('cuit','Cuit','required|max_length[11]');
            $this->form_validation->set_rules('direccion','Dirección','required|max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    'razon_social' => $this->input->post('razon_social'),
                    'cuit' => $this->input->post('cuit'),
                    'direccion' => $this->input->post('direccion'),
                );
            
                if ($this->Institucion_model->update_institucion($id,$params))
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
                $this->template->cargar_vista('abm/institucion/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $institucion = $this->Institucion_model->get_institucion($id);

        if(isset($institucion['id']))
        {
            if ($this->Institucion_model->delete_institucion($id))
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
