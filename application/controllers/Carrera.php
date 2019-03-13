<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrera extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
        $this->load->helper('url');
		$this->load->database(); //Aqui se carga el driver de la bd.
		$this->load->library('Grocery_CRUD'); //grocery_crud, Aqui se hace la carga de la libreria
		$this->load->model('Carrera_model');
    }

	public function index()
	{
		$data['carreras'] = $this->Carrera_model->getAll();
		
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('pages/index_carrera', $data);
		$this->load->view('footer');
	}

	public function verCarrera($idCarrera)
	{
		$data['carrera'] = $this->Carrera_model->getCarrera($idCarrera);
		$data['plan'] = $this->Carrera_model->getPlan($idCarrera);

		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('pages/carreraView', $data);
		$this->load->view('footer');
	}

	public function listar()
	{
		$crud = new Grocery_CRUD(); 
        $crud->set_theme('datatables'); 
        $crud->set_table('carrera'); 
		$crud->set_subject('Carrera');  
		
		$crud->columns('id', 'plan','nombre','presentacion', 'perfil', 'planPdf', 'imagen');

		$crud->display_as('id','id');
		$crud->display_as('plan','Plan N°');
		$crud->display_as('nombre','Nombre');
		$crud->display_as('presentacion','Presentación');
		$crud->display_as('perfil','Perfil');
		$crud->display_as('planPdf','PDF');
		$crud->display_as('imagen','Imagen');

		$crud->set_field_upload('imagen','assets/uploads/images');

		$output = $crud->render();
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('crud',$output);
		$this->load->view('footer');
		
	}

}

?>
