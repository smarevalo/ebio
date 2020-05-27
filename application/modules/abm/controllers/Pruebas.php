<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pruebas extends MX_Controller 
{
    function __construct(){
		parent::__construct();    
        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library(array('ion_auth', 'form_validation', 'unit_test'));
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            $this->load->module('template');
            $this->load->model('Pruebas_model');
            $this->load->model('Carrera_model');
            $this->load->model('Docente_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    }

	public function index()
    {    
        echo "PRUEBAS UNITARIAS";
        
        //$s = $this->Pruebas_model->hay_planes_activos_en_todas_carreras();
        //var_dump($s);

        $this->unit->run(
                    $this->Carrera_model->get_carrera(1),
                    'is_array',
                    'Existe carrera 1'
        );

        $this->unit->run(
            $this->Pruebas_model->hay_carreras_activas(),
            true,
            'Hay carreras activas'
        );

        $this->unit->run(
            $this->Pruebas_model->hay_planes_activos_en_todas_carreras(),
            true,
            'Hay planes activos para todas las carreras'
        );

        $this->unit->run(
            $this->Pruebas_model->hay_docentes_registrados(),
            true,
            'Hay docentes registrados'
        );

        $this->unit->run(
            $this->Pruebas_model->hay_publicaciones_activas(),
            true,
            'Hay publicaciones activas'
        );

        
        
        echo $this->unit->report();
    }

    

}

?>
