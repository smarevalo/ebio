<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class DocenteTest extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library(array('session'));
            $this->load->library('unit_test');
            $this->load->database(); 
            $this->load->model("Docente_model");
        }

        public function index()
        {                    
            $data['titulo'] = "Pruebas Unitarias Docentes";

            $this->unit->run($this->docenteListado3Primeros(), 
                            "2 - Albrieu, Eliana 3 - Alvarez, Jonatan 4 - Anzalaz, Fernando Alejandro ", 
                            "Listado de docentes");
                            
            $this->unit->run($this->docenteIdPerfilDocente(2), 
                            "2- Albrieu, Eliana - Jefe de Trabajos Practicos", 
                            "Perfil Docente");
 
            $this->load->view('head');
            $this->load->view('nav');
            $this->load->view('tests/tests', $data);
            $this->load->view('footer');
        }


        //Docentes
        private function docenteIdPerfilDocente($idDocente){
            $data =  $this->Docente_model->getPerfil($idDocente);
            return $data[0]->id."- ".$data[0]->apellido.", ".$data[0]->nombre." - ".$data[0]->categoria;
        }

        private function docenteListado3Primeros(){
            $data =  $this->Docente_model->datosLista();
            
            $string="";
            for($i = 0; $i < 3; $i++){
                $string.=$data[$i]->id." - ".$data[$i]->apellido.", ".$data[$i]->nombre." ";
            }
            return $string; 
        }
    }

?>