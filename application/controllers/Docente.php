<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Docente extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->library('Grocery_CRUD'); //grocery_crud, Aqui se hace la carga de la libreria
		$this->load->library('table');
		$this->load->model('Docente_model');
	}

	public function index()
	{	
		//Se carga el head y barra
		$this->load->view('head');
		$this->load->view('nav');

		//Se obtienen datos del modelo
		$data['listado'] = $this->Docente_model->datosLista();

		//Se cargan datos en la vista
		$this->load->view('pages/docentesList', $data);
		$this->load->view('footer');
	}

	public function verDocente($idDocente)
	{
		$this->load->helper('html');
		$this->load->view('head');
		$this->load->view('nav');
		
		//Se obtienen datos del modelo
		$data['docente'] = $this->Docente_model->getPerfil($idDocente);

		//Se cargan datos en la vista
		$this->load->view('pages/docenteView', $data);
		$this->load->view('footer');
	}

	
	function listar()
	{
		$crud = new Grocery_CRUD(); //grocery_crud
        $crud->set_theme('datatables'); //Aqui se selecciona la vista del crud. 
        $crud->set_table('docente'); //Se hace la seleccion de la tabla
		$crud->set_subject('Docente'); //Se le asigna un alias al crud    
		
		$crud->columns('id', 'persona_id','categoria', 'descripcion');
		
		//Nombrar Columnas
		$crud->display_as('id','id');
		$crud->display_as('nombre','Nombre');
		$crud->display_as('apellido','Apellido');
		$crud->display_as('categoria','Categoria');
		$crud->display_as('email1','E-mail 1');
		$crud->display_as('email2','E-mail 2');
		$crud->display_as('descripcion','Descripción');

		//Relaciones de campos
		
		//$crud->set_relation('persona_id','persona','apellido', 'nombre');
		//$crud->set_relation('persona_id','persona','nombre');
		//$crud->set_relation('categoria','categoria','descripcion');
		

		$output = $crud->render();
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('crud',$output);
		$this->load->view('footer');
		
	}	
	

}

?>
