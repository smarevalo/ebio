<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicaciones extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('table');
		$this->load->model('Publicaciones_model');
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->helper(array('language'));
        $this->lang->load('auth');
	}

	public function index($tipo)
	{
		$data['listado'] = $this->Publicaciones_model->datosLista($tipo);
		$data['_view'] = 'pages/publicacionesList';
		$this->load->view('layouts/main',$data);
	}

	public function verPublicacion($idPublicacion)
	{
		$data['publicacion'] = $this->Publicaciones_model->getPublicacion($idPublicacion);
		
		if (count($data['publicacion']) == 0 ||  $data['publicacion'][0]->esta_publicado != 1){
            $data['alerta'] = lang('undefined_publication');
            $data['_view'] = '404';
			$this->load->view('layouts/main',$data);
        }
        else{
			$data['_view'] = 'pages/publicacionView';
			$this->load->view('layouts/main',$data);
		}	
	}

	public function verPublicacionesPorDia($anio, $mes, $dia)
	{
		$data['listado'] = $this->Publicaciones_model->getPublicacionesPorDia($anio, $mes, $dia);
		$data['_view'] = 'pages/publicacionesList';
		$this->load->view('layouts/main',$data);	
	}


}

?>
