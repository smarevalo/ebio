<?php
 
class Docente extends MX_Controller{
    
    private $name = 'El docente';
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
            $this->load->model('Planes_model');
            $this->load->model('Ciclo_model');
            $this->load->model('Ciclo_materia_model');
            $this->load->model('Docente_categoria_model');
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
            $data['docentes'] = $this->Docente_model->get_all_docente();
            $data['user'] = $this->ion_auth->user()->row();

            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }

            $this->template->cargar_vista('abm/docente/index', $data);
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('apellido',lang('form_last_name'),'required');
        $this->form_validation->set_rules('nombre','1º Nombre','required');
        $this->form_validation->set_rules('cuit',lang('form_cuit'),'alpha_numeric');
        $this->form_validation->set_rules('email1',sprintf(lang('form_email'),'1'),'required|valid_email');
        $this->form_validation->set_rules('email2',sprintf(lang('form_email'),'2'),'valid_email');
        
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

            $persona_id = $this->Persona_model->add_persona($params_persona);

            $params_docente = array(
                'persona_id' => $persona_id,
                'id_docente_categoria' => $this->input->post('id_docente_categoria'),
                'descripcion' => $this->input->post('descripcion')
            );
            
            $docente_id = $this->Docente_model->add_docente($params_docente);

            $params_cvar = array(
                'id_docente' => $docente_id,
                'areas' => '',
                'experticia' => '',
                'grado' => '',
                'especializacion' => '',
                'maestria' => '',
                'doctorado' => '',
            );

            $cvar_id = $this->Docente_model->add_cvar($params_cvar);

            if ($persona_id && $docente_id && $cvar_id)
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
                    
            //$this->index($mensaje);
            redirect('abm/docente/', 'refresh');
        }
        else
        {
            $data['categorias'] = $this->Docente_categoria_model->get_all_categoria(); 
            $data['user'] = $this->ion_auth->user()->row(); 
        
            $this->template->cargar_vista('abm/docente/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['docente'] = $this->Docente_model->get_docente($id);
        $data['persona'] = $this->Persona_model->get_persona($data['docente']['persona_id']);

        $data['docente']=array_merge($data['persona'], $data['docente']); 
        
        if(isset($data['docente']['id']))
        {
            $this->form_validation->set_rules('apellido',lang('form_last_name'),'required');
            $this->form_validation->set_rules('nombre','1º Nombre','required');
            $this->form_validation->set_rules('cuit',lang('form_cuit'),'alpha_numeric');
            $this->form_validation->set_rules('email1',sprintf(lang('form_email'),'1'),'required|valid_email');
            $this->form_validation->set_rules('email2',sprintf(lang('form_email'),'2'),'valid_email');
        
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

                $persona_id = $this->Persona_model->update_persona($id, $params_persona);

                $params_docente = array(
                    'persona_id' => $data['persona']['id'],
                    'id_docente_categoria' => $this->input->post('id_docente_categoria'),
                    'descripcion' => $this->input->post('descripcion'),
                );

                $docente_id = $this->Docente_model->update_docente($id,$params_docente);            

                if ($persona_id && $docente_id)
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                    
                redirect('abm/docente/', 'refresh');
            }
            else
            {
                $data['categorias'] = $this->Docente_categoria_model->get_all_categoria(); 
                $data['user'] = $this->ion_auth->user()->row(); 
        
                $this->template->cargar_vista('abm/docente/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $docente = $this->Docente_model->get_docente($id);

        if(isset($docente['id']))
        {
            if ($this->Docente_model->delete_docente($id))
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
    
    public function asignar_materia($id)
    {
        $data['docente'] = $this->Docente_model->get_docente($id);
        $data['persona'] = $this->Persona_model->get_persona($data['docente']['persona_id']);

        $data['docente']=array_merge($data['persona'], $data['docente']); 
        $data['materias_asignadas'] =$this->Docente_model->get_materias_asignadas($data['docente']['id']);
        
        if(isset($data['docente']['id']))
        {
            $this->form_validation->set_rules('id_materia',lang('form_last_name'),'required');
        
            if($this->form_validation->run())     
            {   

                $params = array(
                    'id_ciclo_materia' => $this->input->post('id_materia'),
                    'id_docente' => $data['docente']['id']
                );          
                
                if ($this->Docente_model->add_materia_docente($params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                    
                redirect('abm/docente/asignar_materia/'.$data['docente']['id'], 'refresh');
            }
            else
            {
                //$data['ciclos'] = $this->Ciclo_model->get_all_ciclos();
                $data['planes'] = $this->Planes_model->get_all_planes();
                $data['ciclo'] = $this->Ciclo_model->get_ciclos_by_plan($data['planes'][0]->id);
                $data['materias'] = $this->Ciclo_materia_model->fetch_materias($data['ciclo'][0]->id, FALSE);
                //var_dump($data['materias']); exit();

                $data['user'] = $this->ion_auth->user()->row(); 
        
                $this->template->cargar_vista('abm/docente/asignar_materia', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }

    public function remove_materia_docente($id)
    {
        $materia = $this->Docente_model->get_materia_asignada($id);

        if(isset($materia['id']))
        {
            if ($this->Docente_model->delete_materia_docente($id))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_remove_success_text'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_remove_error_text'), $this->name));    
                
            redirect('abm/docente/asignar_materia/'.$materia['id_docente'], 'refresh');
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }

}
