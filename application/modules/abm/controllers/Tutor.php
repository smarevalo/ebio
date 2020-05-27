<?php
 
class Tutor extends MX_Controller{
    
    private $name = 'El tutor';
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
            $this->load->model('Tutor_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    }

    public function index($mensaje=null)
    {
        $data['tutores'] = $this->Tutor_model->get_all_tutores();
        $data['user'] = $this->ion_auth->user()->row();

        if (isset($mensaje)) {
            $data['alerta'] = $mensaje;
        }

        $this->template->cargar_vista('abm/tutor/index', $data);
    }

    public function detalle($id)
    {
        $data['tipos_proyecto'] =$this->Tutor_model->get_tipos_proyectos();
        
        foreach ($data['tipos_proyecto'] as $key => $tipos) {
            $data['proyectos'][] = $this->Tutor_model->get_proyectos_by_tutor($id, $tipos->id, 1);
            $data['proyectos'][$key]['tipo'] = new stdClass();;
            $data['proyectos'][$key]['tipo']->titulo = $tipos->nombre;
        }

        $data['id_docente'] = $id;

        $this->template->cargar_vista('abm/tutor/detalle', $data);
    }
    
}
