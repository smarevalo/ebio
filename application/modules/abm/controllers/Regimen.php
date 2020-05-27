<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Regimen extends MX_Controller{
    
    private $name = 'El regimen';
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
            $this->load->model('Regimen_model');
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
            $data['regimenes'] = $this->Regimen_model->get_all_regimen();
            $data['user'] = $this->ion_auth->user()->row();
            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }

            $this->template->cargar_vista('abm/regimen/index', $data);
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('nombre',lang('form_name'),'required');
        
        if($this->form_validation->run($this))     
        {   
            $params = array(
                'id' => $this->input->post('id'),
                'nombre' => $this->input->post('nombre'),
            );
            
            if ($this->Regimen_model->add_regimen($params))
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
            
            $this->template->cargar_vista('abm/regimen/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['regimen'] = $this->Regimen_model->get_regimen($id); 
        
        if(isset($data['regimen']['id']))
        {
            $this->form_validation->set_rules('nombre',lang('form_name'),'required');
        
            if($this->form_validation->run())     
            {   
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    );

                if ($this->Regimen_model->update_regimen($id,$params))
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
                $this->template->cargar_vista('abm/regimen/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $regimen = $this->Regimen_model->get_regimen($id);

        if(isset($regimen['id']))
        {
            if ($this->Regimen_model->delete_regimen($id))
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
