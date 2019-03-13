<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class CarreraTest extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library(array('session'));
            $this->load->library('unit_test');
            $this->load->database();
            $this->load->model("Carrera_model");
        }

        public function index()
        {                    
            $data['titulo'] = "Pruebas Unitarias Carreras";

            $this->unit->run($this->carreraIdNombre(3), 
                            "3 - TUDAW - Plan: 2009", 
                            "Datos de una carrera");

            $this->unit->run($this->carreraIdPrimeras3Materias(3), 
                            "Carrera 3 - Cód: 1 - Matemática I - Cód: 2 - Matemática Discreta - Cód: 3 - Estructura de Datos y Algoritmos I", 
                            "Listado de carreras");

            $this->load->view('head');
            $this->load->view('nav');
            $this->load->view('tests/tests', $data);
            $this->load->view('footer');
        }


        //Carreras
        private function carreraIdNombre($idCarrera){
            $data =  $this->Carrera_model->getCarrera($idCarrera);
            return $data[0]->id." - ".$data[0]->nombre." - Plan: ".$data[0]->plan;
        }

        private function carreraIdPrimeras3Materias($idCarrera){
            $data =  $this->Carrera_model->getPlan($idCarrera);
            
            $string="Carrera ".$idCarrera;
            for($i = 0; $i < 3; $i++){
                $string.=" - Cód: ".$data[$i]->codigo." - ";
                $string.=$data[$i]->nombre;
            }
            return $string; 
        }

    }

?>