<?php
 
class Proyecto extends MX_Controller{
    
    private $name = 'El proyecto';
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
            $this->load->model('Proyecto_model');
            $this->load->model('Tutor_model');
            $this->load->model('Institucion_model');
            $this->load->model('Estudiante_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    }  

    public function index($tipo, $mensaje=null)
    {
        $data['proyectos'] = $this->Proyecto_model->get_all_proyectos($tipo);
        $data['tipo'] = $this->Proyecto_model->get_tipo_proyecto($tipo);

        if (isset($mensaje)) {
            $data['alerta'] = $mensaje;
        }
        $this->template->cargar_vista('abm/proyecto/index', $data);
    }

    public function add()
    {
        $data['instituciones'] = $this->Proyecto_model->get_instituciones();
        $data['tutores'] = $this->Tutor_model->get_tutores_disponibles();
        $data['tipos_proyecto'] = $this->Proyecto_model->get_tipos_proyecto();
        $data['estudiantes'] = $this->Estudiante_model->get_estudiantes_disponibles();

        $this->form_validation->set_rules('titulo','Titulo','required|max_length[200]');
        $this->form_validation->set_rules('id_tipo','Tipo','required');
        $this->form_validation->set_rules('id_institucion','Institución','required');
        $this->form_validation->set_rules('id_tutor','Tutor','required');
		$this->form_validation->set_rules('observaciones','Observaciones','max_length[500]');
        
		if($this->form_validation->run())     
        {   
            $f = getdate();
            $params_proyecto = array(
				'id_tipo' => $this->input->post('id_tipo'),
                'titulo' => $this->input->post('titulo'),
                'id_institucion' => $this->input->post('id_institucion'),
                'id_tutor' => $this->input->post('id_tutor'),
				'activo' => '1',
                'observaciones' => $this->input->post('observaciones'),
                'creacion' => $f['year']."-".$f['mon']."-".$f['mday'],
            );

            $proyecto_id = $this->Proyecto_model->add_proyecto($params_proyecto);

            $params_proy_estudiante = array(
                'id_proyecto' => $proyecto_id,
                'id_estudiante' => $this->input->post('id_estudiante'),
            );

            $proy_est_id = $this->Proyecto_model->add_proyecto_estudiante($params_proy_estudiante);

            if (!empty($this->input->post('documentos')[0])) {
                foreach ($this->input->post('documentos') as $doc) {
                    $params_documentos = array(
                        'id_proyecto' => $proyecto_id,
                        'documento' => $doc,
                    );
                    $this->Proyecto_model->add_proyecto_documento($params_documentos);
                }
            }

            if ($proyecto_id && $proy_est_id)
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
                    
            $this->index($this->input->post('id_tipo'), $mensaje);
        }
        else
        {   
            $this->template->cargar_vista('abm/proyecto/add', $data);
        }
    }  

    public function edit($id)
    {
        $data['proyecto'] = $this->Proyecto_model->get_proyecto($id);
        $data['proy_est'] = $this->Proyecto_model->get_proy_est($id);
        $data['proyecto']=array_merge($data['proy_est'], $data['proyecto']); 
     
        if(isset($data['proyecto']['id']))
        {
			$this->form_validation->set_rules('titulo','Titulo','required|max_length[200]');
            $this->form_validation->set_rules('id_tipo','Tipo','required');
            $this->form_validation->set_rules('id_institucion','Institución','required');
            $this->form_validation->set_rules('id_tutor','Tutor','required');
            $this->form_validation->set_rules('observaciones','Observaciones','max_length[500]');
		
			if($this->form_validation->run())     
            {   
                $params_proyecto = array(
                    'id_tipo' => $this->input->post('id_tipo'),
                    'titulo' => $this->input->post('titulo'),
                    'id_institucion' => $this->input->post('id_institucion'),
                    'id_tutor' => $this->input->post('id_tutor'),
                    'activo' => '1',
                    'observaciones' => $this->input->post('observaciones'),
                );

                $params_proy_estudiante = array(
                    'id_estudiante' => $this->input->post('id_estudiante'),
                );

                $proyecto_id = $this->Proyecto_model->update_proyecto($id,$params_proyecto);  
                $proy_est_id = $this->Proyecto_model->update_proy_est($id,$params_proy_estudiante);  

                if ($proyecto_id && $proy_est_id)
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
                else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
                    
                $this->index($this->input->post('id_tipo'), $mensaje);
            }
            else
            {
                $data['instituciones'] = $this->Proyecto_model->get_instituciones();
                $data['tutores'] = $this->Tutor_model->get_tutores_disponibles();
                $data['tipos_proyecto'] = $this->Proyecto_model->get_tipos_proyecto();
                $data['estudiantes'] = $this->Estudiante_model->get_estudiantes_disponibles();
				$this->template->cargar_vista('abm/proyecto/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $proyecto = $this->Proyecto_model->get_proyecto($id);

        if(isset($proyecto['id']))
        {
            if ($this->Proyecto_model->delete_proyecto($id) && $this->Proyecto_model->delete_proy_est($id))
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

    public function activate($id)
    {
        $params['activo']= 1;
        $proyecto = $this->Proyecto_model->get_proyecto($id); 
        $this->Proyecto_model->change_status($id, $params);

        redirect('abm/proyecto/'.$proyecto['id_tipo'].'', 'refresh');
    }

    public function deactivate($id)
    {
        $params['activo']= 0;
        $proyecto = $this->Proyecto_model->get_proyecto($id);
        $this->Proyecto_model->change_status($id, $params);
        $this->finalizarProyecto($id);
        
        redirect('abm/proyecto/'.$proyecto['id_tipo'].'', 'refresh');
    }

    public function finalizarProyecto($id)
    {
        $f = getdate();
        $params['finalizacion']= $f['year']."-".$f['mon']."-".$f['mday'];
        $proyecto = $this->Proyecto_model->get_proyecto($id);
        $this->Proyecto_model->change_finalizacion($id, $params);
    }
    
}
