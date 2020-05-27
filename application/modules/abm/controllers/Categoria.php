<?php

class Categoria extends MX_Controller{
    
    private $name = 'La categoría';
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
            $this->load->model('Categoria_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    } 

    function index($mensaje=null)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            $data['categorias'] = $this->Categoria_model->get_all_categoria();
            $data['user'] = $this->ion_auth->user()->row();
            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }
            $this->template->cargar_vista('abm/categoria/index', $data);
        }
    }

    function add()
    {   
        $this->form_validation->set_rules('nombre',lang('form_name'),'required');
        
        if($this->form_validation->run($this))     
        {   
            $params = array(
                'id' => $this->input->post('id'),
                'nombre' => $this->input->post('nombre'),
            );
            
            if ($this->Categoria_model->add_categoria($params))
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
            
            $this->template->cargar_vista('abm/categoria/add', $data);
        }
    }  

    function edit($id)
    {   
        $data['categoria'] = $this->Categoria_model->get_categoria($id); 
        
        if(isset($data['categoria']['id']))
        {
            $this->form_validation->set_rules('nombre',lang('form_name'),'required');
        
            if($this->form_validation->run())     
            {   
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    );

                if ($this->Categoria_model->update_categoria($id,$params))
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
                $this->template->cargar_vista('abm/categoria/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    function remove($id)
    {
        $categoria = $this->Categoria_model->get_categoria($id);

        if(isset($categoria['id']))
        {
            if ($this->Categoria_model->delete_categoria($id))
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
