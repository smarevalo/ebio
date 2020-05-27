<?php
 
class Cvar extends MX_Controller{
    
    private $name = 'CV resumido';
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
            $this->load->model('Docente_model');
            $this->load->model('Persona_model');
            $this->load->model('Docente_categoria_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    } 

    public function edit($id)
    {
        $data['docente'] = $this->Docente_model->get_docente($id);
        $data['persona'] = $this->Persona_model->get_persona($data['docente']['persona_id']);
        $data['cvar'] = $this->Docente_model->get_cvar_by_docente($id);
        $data['docente']=array_merge($data['persona'], $data['docente']); 
        
        if(isset($data['docente']['id']))
        {   

            $this->form_validation->set_rules('areas','Áreas de actuación','max_length[1000]');
            $this->form_validation->set_rules('experticia','Experticia','max_length[1000]');
            $this->form_validation->set_rules('grado','Grado','max_length[1000]');
            $this->form_validation->set_rules('especializacion','Especialización','max_length[1000]');
            $this->form_validation->set_rules('maestria','Maestria','max_length[1000]');
            $this->form_validation->set_rules('doctorado','Doctorado','max_length[1000]');

            if($this->form_validation->run())     
            {   
                $params = array(
                    'areas' => $this->input->post('areas'),
                    'experticia' => $this->input->post('experticia'),
                    'grado' => $this->input->post('grado'),
                    'especializacion' => $this->input->post('especializacion'),
                    'maestria' => $this->input->post('maestria'),
                    'doctorado' => $this->input->post('doctorado')
                );            
				
                if ($this->Docente_model->update_cvar($id,$params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                
                $data['docentes'] = $this->Docente_model->get_all_docente();
                $data['alerta'] = $mensaje;
                $this->template->cargar_vista('abm/docente/index', $data);
            }
            else
            {
                $data['categorias'] = $this->Docente_categoria_model->get_all_categoria(); 
                $data['user'] = $this->ion_auth->user()->row(); 
                
                $this->template->cargar_vista('abm/cvar/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

}
