<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Cursos extends MX_Controller{
    
    private $name = 'El curso';
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
            $this->load->model('Cursos_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    } 

    public function index($mensaje=null)
    {
        $data['cursos'] = $this->Cursos_model->get_all_cursos();
        //var_dump($data['cursos']);  exit();
        if (isset($mensaje)) {
            $data['alerta'] = $mensaje;
        }
        $this->template->cargar_vista('abm/cursos/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nombre','Nombre','required|max_length[300]');
        $this->form_validation->set_rules('fecha_inicio','Inicio','required');
        $this->form_validation->set_rules('fecha_fin','Fin','required');
        
		if($this->form_validation->run($this))     
        {   
            $params = array(
				'nombre' => $this->input->post('nombre'),
				'fecha_inicio' => $this->input->post('fecha_inicio'),
				'fecha_fin' => $this->input->post('fecha_fin'),
				'modalidad' => $this->input->post('modalidad'),
                'enlace' => $this->input->post('enlace'),
                'profesor' => $this->input->post('profesor'),
                'publicado' => ($this->input->post('publicado')==1)? 1 : 0,
            );
            
            if ($this->Cursos_model->add_cursos($params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
                    
            redirect('abm/cursos/', 'refresh');
        }
        else
        {
			$data['tipos'] = '';
            $this->template->cargar_vista('abm/cursos/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['cursos'] = $this->Cursos_model->get_curso($id);
        
        if(isset($data['cursos']['id']))
        {
			$this->form_validation->set_rules('nombre','Nombre','required|max_length[300]');
            $this->form_validation->set_rules('fecha_inicio','Inicio','required');
            $this->form_validation->set_rules('fecha_fin','Fin','required');			

			if($this->form_validation->run($this))     
            {   
                $params = array(

                    'nombre' => $this->input->post('nombre'),
                    'fecha_inicio' => $this->input->post('fecha_inicio'),
                    'fecha_fin' => $this->input->post('fecha_fin'),
                    'modalidad' => $this->input->post('modalidad'),
                    'enlace' => $this->input->post('enlace'),
                    'profesor' => $this->input->post('profesor'),
                    'publicado' => ($this->input->post('publicado')==1)? 1 : 0,
                );
                
                if ($this->Cursos_model->update_curso($id,$params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                        $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                    
                redirect('abm/cursos/', 'refresh');
            }
            else
            {
                $data['all_users'] = '';
                $this->template->cargar_vista('abm/cursos/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 


    public function remove($id)
    {
        $curso = $this->Cursos_model->get_curso($id);

        if(isset($curso['id']))
        {
            if ($this->Cursos_model->delete_curso($id))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_remove_success_text'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_remove_error_text'), $this->name));    
                
            redirect('abm/cursos/', 'refresh');
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }
    
}
