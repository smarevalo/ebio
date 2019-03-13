<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->library('Grocery_CRUD'); ////grocery_crud, Aqui se hace la carga de la libreria
    }

	public function index()
	{
		echo 'Esto es la portada de Plan';
	}

	
	function listar()
	{
		$crud = new Grocery_CRUD(); //grocery_crud
        $crud->set_theme('datatables'); //Aqui se selecciona la vista del crud. 
        $crud->set_table('plan'); //Se hace la seleccion de la tabla
		$crud->set_subject('Plan'); //Se le asigna un alias al crud    
		
		$crud->columns('id', 'id_carrera', 'id_asignatura','anio', 'codigo', 'regimen', 'horas_primer_cuat', 'horas_segundo_cuat', 'horas_anuales', 'programa');

		$crud->display_as('id','id');
		$crud->display_as('id_carrera','Carrera');
		$crud->display_as('id_asignatura','Asignatura');
		$crud->display_as('anio','Año');
		$crud->display_as('codigo','Codigo');
		$crud->display_as('regimen','Regimen');
		$crud->display_as('horas_primer_cuat','Hs 1C');
		$crud->display_as('horas_segundo_cuat','Hs 2C');
		$crud->display_as('horas_anuales','Hs Anual');
		$crud->display_as('programa','Programa');
		
		//Relaciones de campos
		$crud->set_relation('id_carrera','carrera','nombre');
		$crud->set_relation('id_asignatura','asignatura','nombre');
		
		$output = $crud->render();
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('crud',$output);
		$this->load->view('footer');
		
	}	
	

}

?>
