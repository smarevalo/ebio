<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materia extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
		$this->load->model('Materia_model');
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->helper(array('language'));
        $this->lang->load('auth');
    }

	public function verMateria($idMateria)
	{
		$data['materia'] = $this->Materia_model->getMateria($idMateria);
		
		if (count($data['materia']) == 0){
            $data['alerta'] = lang('undefined_course');
            $data['_view'] = '404';
			$this->load->view('layouts/main',$data);
        }
        else{
        	if($data['materia'][0]->id_tipo == '2')
			{
				$data['optativas'] = $this->Materia_model->getOptativas($idMateria);
			}
			else
			{	
				$data['pr'] = $this->Materia_model->getProgramaResumido($idMateria);

				if ($data['materia'][0]->id_tipo == '3') {
					$data['generica'] = $this->Materia_model->get_generica_by_optativa($idMateria);
					$data['pr'][0]->regimen = $data['generica']['regimen'];
					$data['pr'][0]->anio = $data['generica']['anio'];
					$data['pr'][0]->hs_total = $data['generica']['hs_total'];
				}
				$data['equipo'] = $this->Materia_model->getEquipo($idMateria);

				$data['regulCursar'] = $this->Materia_model->getCorrelatividades($idMateria, 1);
				$data['aprobadaCursar'] = $this->Materia_model->getCorrelatividades($idMateria, 2);
				$data['aprobadaRendir'] = $this->Materia_model->getCorrelatividades($idMateria, 3);	
			}

			$data['_view'] = 'pages/materiaView';
			$this->load->view('layouts/main',$data);
        }
	}
	
}

?>
