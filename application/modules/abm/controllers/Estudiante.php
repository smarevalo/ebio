<?php
 
class Estudiante extends MX_Controller{

    private $name = 'El estudiante';
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
            $this->load->model('Estudiante_model');
            $this->load->model('Planes_model');
            $this->load->model('Persona_model');
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
            $data['estudiantes'] = $this->Estudiante_model->get_all_estudiantes();
            $data['user'] = $this->ion_auth->user()->row();

            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }

            $this->template->cargar_vista('abm/estudiante/index', $data);
        }
    }

    public function add()
    {
		$this->form_validation->set_rules('apellido',lang('form_last_name'),'required');
        $this->form_validation->set_rules('nombre','1º Nombre','required');
        $this->form_validation->set_rules('email1',sprintf(lang('form_email'),'1'),'required|valid_email');
        $this->form_validation->set_rules('email2',sprintf(lang('form_email'),'2'),'valid_email');
        $this->form_validation->set_rules('legajo','Legajo','required');
        $this->form_validation->set_rules('dni','DNI','required|min_length[7]|max_length[8]|numeric');


		if($this->form_validation->run())     
        {   
            $params_persona = array(
                'apellido' => $this->input->post('apellido'),
                'nombre' => $this->input->post('nombre'),
                'nombre_2' => $this->input->post('nombre_2'),
                'dni' => $this->input->post('dni'),
                'cuit' => $this->input->post('cuit'),
                'email1' => $this->input->post('email1'),
                'email2' => $this->input->post('email2')
            );

            if($this->Persona_model->get_persona_by_dni($this->input->post('dni'))){
               $persona_id =  $this->Persona_model->get_persona_by_dni($this->input->post('dni'));
            }else 
            {
                $persona_id = $this->Persona_model->add_persona($params_persona);
            }

            $ban=0;
            if($this->input->post('legajo') != "" && $this->Estudiante_model->get_estudiante_by_legajo($this->input->post('legajo'))){
               $estudiante_id =  $this->Estudiante_model->get_estudiante_by_legajo($this->input->post('legajo'));
               $ban=1;
            }else 
            {
                $params_estudiante = array(
                    'persona_id' => $persona_id,
                    'id_plan' => $this->input->post('id_plan'),
                    'legajo' => $this->input->post('legajo'),
                );
                $estudiante_id = $this->Estudiante_model->add_estudiante($params_estudiante);
            }

            if ($persona_id && $estudiante_id){
                    if($ban==0)
                        $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
                    else
                        $mensaje =  $this->template->cargar_alerta('warning', lang('record_duplicated'), 
                                sprintf(lang('record_duplicated_text'), $this->name));

            }else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
                    
            $this->index($mensaje);
        }
        else
        {            
            $data['planes'] = $this->Planes_model->get_all_planes();
            $data['user'] = $this->ion_auth->user()->row(); 
        
            $this->template->cargar_vista('abm/estudiante/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['estudiante'] = $this->Estudiante_model->get_estudiante($id);
        
        $data['persona'] = $this->Persona_model->get_persona($data['estudiante']['persona_id']);

        $data['estudiante']=array_merge($data['persona'], $data['estudiante']); 
        
        if(isset($data['estudiante']['id']))
        {
            $this->form_validation->set_rules('apellido',lang('form_last_name'),'required');
            $this->form_validation->set_rules('nombre','1º Nombre','required');
            $this->form_validation->set_rules('email1',sprintf(lang('form_email'),'1'),'required|valid_email');
            $this->form_validation->set_rules('email2',sprintf(lang('form_email'),'2'),'valid_email');
            $this->form_validation->set_rules('legajo','Legajo','required');
            $this->form_validation->set_rules('dni','DNI','required|min_length[7]|max_length[8]|numeric');
		
			if($this->form_validation->run())     
            {   
                $params_persona = array(
                    'apellido' => $this->input->post('apellido'),
                    'nombre' => $this->input->post('nombre'),
                    'nombre_2' => $this->input->post('nombre_2'),
                    'dni' => $this->input->post('dni'),
                    'cuit' => $this->input->post('cuit'),
                    'email1' => $this->input->post('email1'),
                    'email2' => $this->input->post('email2')
                );


                if($this->Persona_model->get_persona_by_dni($this->input->post('dni')))
                {
                   $persona_id =  $this->Persona_model->get_persona_by_dni($this->input->post('dni'));
                }else 
                {
                    $persona_id = $this->Persona_model->update_persona($data['estudiante']['persona_id'], $params_persona);
                }

                $ban=0;
                if($this->input->post('legajo') != "" && $this->Estudiante_model->get_estudiante_by_legajo($this->input->post('legajo'))){
                   $estudiante_id =  $this->Estudiante_model->get_estudiante_by_legajo($this->input->post('legajo'));
                   $ban=1;
                }else 
                {
                    $params_estudiante = array(
                        'persona_id' => $persona_id,
                        'id_plan' => $this->input->post('id_plan'),
                        'legajo' => $this->input->post('legajo'),
                    );
                    $estudiante_id = $this->Estudiante_model->update_estudiante($id, $params_estudiante);
                }

                if ($persona_id && $estudiante_id){
                        if($ban==0)
                            $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_add_success_text'), $this->name));    
                        else
                            $mensaje =  $this->template->cargar_alerta('warning', lang('record_duplicated'), 
                                    sprintf(lang('record_duplicated_text'), $this->name));

                }else   
                        $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_add_error_text'), $this->name)); 
                        
                $this->index($mensaje);
            }
            else
            {
                $data['user'] = $this->ion_auth->user()->row(); 
                $data['planes'] = $this->Planes_model->get_all_planes();
                $this->template->cargar_vista('abm/estudiante/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $estudiante = $this->Estudiante_model->get_estudiante($id);

        if(isset($estudiante['id']))
        {
            if ($this->Estudiante_model->delete_estudiante($id))
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
