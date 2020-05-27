<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escuela extends MX_Controller {

    private $name = 'La escuela';
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
            $this->load->model('Escuela_model');
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
            $data['escuelas'] = $this->Escuela_model->get_all_escuela();
            $data['user'] = $this->ion_auth->user()->row();
            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }

            $this->template->cargar_vista('abm/escuela/edit/1', $data);
        }
    }

    public function add()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {

            $this->form_validation->set_rules('nombre',lang('form_name'),'required');
            $this->form_validation->set_rules('universidad',lang('form_university'),'required');
            $this->form_validation->set_rules('director',lang('form_director'),'required');
            $this->form_validation->set_rules('color',lang('form_color'),'required');

            if($this->form_validation->run($this))     
            {   
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    'universidad' => $this->input->post('universidad'),
                    'director' => $this->input->post('director'),
                    'color' => $this->input->post('color'),
                );

                if ($this->Escuela_model->add_escuela($params))
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

                $this->template->cargar_vista('abm/escuela/add', $data);
            }
        }
    }  

    public function edit($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            
            $data['escuela'] = $this->Escuela_model->get_escuela($id);
            
            if(isset($data['escuela']['id']))
            {
                $this->form_validation->set_rules('nombre',lang('form_name'),'required');
                $this->form_validation->set_rules('universidad',lang('form_university'),'required');
                $this->form_validation->set_rules('director',lang('form_director'),'required');
                $this->form_validation->set_rules('color',lang('form_color'),'required');
                    
                if($this->form_validation->run($this))     
                {                       
                    $params = array(
                        'nombre' => $this->input->post('nombre'),
                        'universidad' => $this->input->post('universidad'),
                        'director' => $this->input->post('director'),
                        'color' => $this->input->post('color'),
                    );


                    if ($this->Escuela_model->update_escuela($id, $params))
                        $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                        sprintf(lang('record_edit_success_text'), $this->name));    
                    else   
                            $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                        sprintf(lang('record_edit_error_text'), $this->name));  

                    redirect('abm/escuela/edit/'.$id, 'refresh');
                }
                else
                {
                    $data['user'] = $this->ion_auth->user()->row();
                    $this->template->cargar_vista('abm/escuela/edit', $data);
                }
            }
            else
                show_error(sprintf(lang('no_existe'), $this->name));
        }
    } 

    public function remove($id)
    {
        $escuela = $this->Escuela_model->get_escuela($id);

        if(isset($escuela['id']))
        {
            if ($this->Escuela_model->delete_escuela($id))
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

?>
