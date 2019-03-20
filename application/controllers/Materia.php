<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materia extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
		$this->load->library('Grocery_CRUD'); ////grocery_crud, Aqui se hace la carga de la libreria
		$this->load->model('Materia_model');
    }


	public function verMateria($idMateria)
	{
		$this->load->view('head');
		$this->load->view('nav');
		
		//Se obtienen datos del modelo
		$data['materia'] = $this->Materia_model->getMateria($idMateria);
		
		if($data['materia'][0]->id_tipo == '2')
		{
			$data['optativas'] = $this->Materia_model->getOptativas($idMateria);
		}
		else
		{
			$data['pr'] = $this->Materia_model->getProgramaResumido($idMateria);
			$data['equipo'] = $this->Materia_model->getEquipo($idMateria);

			$data['regulCursar'] = $this->Materia_model->getCorrelatividades($idMateria, 1);
			$data['aprobadaCursar'] = $this->Materia_model->getCorrelatividades($idMateria, 2);
			$data['aprobadaRendir'] = $this->Materia_model->getCorrelatividades($idMateria, 3);	
		}

		//Se cargan datos en la vista
		$this->load->view('pages/materiaView', $data);
		$this->load->view('footer');
	}

	
	function listar()
	{
		$crud = new Grocery_CRUD(); //grocery_crud
        $crud->set_theme('datatables'); //Aqui se selecciona la vista del crud. 
        $crud->set_table('Materia'); //Se hace la seleccion de la tabla
		$crud->set_subject('Materia'); //Se le asigna un alias al crud    
		
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
