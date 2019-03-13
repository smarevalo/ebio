<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class AsignaturaTest extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library(array('session'));
            $this->load->library('unit_test');
            $this->load->database(); 
            $this->load->model("Asignatura_model");
        }

        public function index()
        {        
            $data['titulo'] = "Pruebas Unitarias Asignaturas";

            $this->unit->run($this->asignaturaIdNombre(1), 
                            "1 - Análisis Matemático I", 
                            "Nombre de asignatura");

            $this->unit->run($this->asignaturaIdEquipoDocente(8), 
                            "Asignatura 8 - Chade, Pablo - Barros Olivera, Ruy Enio - Gómez, Fabian",
                            "Equipo docente de una asignatura");

            $this->load->view('head');
            $this->load->view('nav');
            $this->load->view('tests/tests', $data);
            $this->load->view('footer');
        }


        //Asignatura
        private function asignaturaIdNombre($idAsignatura){
            $data =  $this->Asignatura_model->getAsignatura($idAsignatura);
            return $data[0]->id." - ".$data[0]->nombre;
        }


        private function asignaturaIdEquipoDocente($idAsignatura){
            $data =  $this->Asignatura_model->getEquipo($idAsignatura);
            
            $string="Asignatura ".$idAsignatura;
            foreach($data as $valor){
                $string.=" - ".$valor->apellido.", ";
                $string.=$valor->nombre;
            }
            return $string;
        }

    }

?>