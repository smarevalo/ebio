<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asignatura extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
		$this->load->library('Grocery_CRUD'); ////grocery_crud, Aqui se hace la carga de la libreria
		$this->load->model('Asignatura_model');
    }

	public function verAsignatura($idAsignatura)
	{
		$this->load->view('head');
		$this->load->view('nav');
		
		//Se obtienen datos del modelo
		$data['asignatura'] = $this->Asignatura_model->getAsignatura($idAsignatura);
		$data['pr'] = $this->Asignatura_model->getProgramaResumido($idAsignatura);
		$data['programa'] = $this->Asignatura_model->getPrograma($idAsignatura);
		$data['equipo'] = $this->Asignatura_model->getEquipo($idAsignatura);
		$data['regulCursar'] = $this->Asignatura_model->getCorrelatividades($idAsignatura, 1);
		$data['aprobadaCursar'] = $this->Asignatura_model->getCorrelatividades($idAsignatura, 2);
		$data['aprobadaRendir'] = $this->Asignatura_model->getCorrelatividades($idAsignatura, 3);

		//Se cargan datos en la vista
		$this->load->view('pages/asignaturaView', $data);
		$this->load->view('footer');
	}

	
	function listar()
	{
		$crud = new Grocery_CRUD(); //grocery_crud
        $crud->set_theme('datatables'); //Aqui se selecciona la vista del crud. 
        $crud->set_table('asignatura'); //Se hace la seleccion de la tabla
		$crud->set_subject('Asignatura'); //Se le asigna un alias al crud    
		
		$crud->columns('id','nombre');

		$crud->display_as('id','id');
		$crud->display_as('nombre','Nombre');
		
		
		$output = $crud->render();
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('crud',$output);
		$this->load->view('footer');
		
	}	
}

?>
