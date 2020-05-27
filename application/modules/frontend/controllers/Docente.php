<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Docente_model');
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->helper(array('language'));
        $this->lang->load('auth');
	}

	public function index()
	{
		$data['listado'] = $this->Docente_model->datosLista();

		$data['_view'] = 'pages/docentesList';
		$this->load->view('layouts/main',$data);
	}

	public function verDocente($idDocente)
	{
		$data['docente'] = $this->Docente_model->getPerfil($idDocente);

		if (count($data['docente']) == 0){
            $data['alerta'] = lang('undefined_teacher');
            $data['_view'] = '404';
			$this->load->view('layouts/main',$data);
        }
        else{

			$data['_view'] = 'pages/docenteView';
			$this->load->view('layouts/main',$data);
		}	
	}

}

?>
