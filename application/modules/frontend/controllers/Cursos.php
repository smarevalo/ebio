<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cursos extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Cursos_model');
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->helper(array('language'));
        $this->lang->load('auth');
	}

	public function cronograma()
	{
		$data['meses'] = array(1 => "Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		for ($i=1; $i <= 12; $i++) { 
			$data['cursos'][$i] = $this->Cursos_model->getCursosPorMes($i);
		}

		$data['_view'] = 'pages/cronograma';
		$this->load->view('layouts/main',$data);
	}


}

?>
