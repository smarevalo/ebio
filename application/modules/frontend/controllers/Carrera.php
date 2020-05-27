<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrera extends MX_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->model('Carrera_model');
        $this->load->model('Escuela_model');
		$this->load->model('Publicaciones_model');
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->helper(array('language'));
        $this->lang->load('auth');
    }

	public function index($anio=null, $mes=null)
	{
        //Calendario
        if(is_null($anio) || is_null($mes)){
            $anio=date('Y');
            $mes=date('m');
        }
        $prefs = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => site_url().'/calendar'
        );
        $this->load->library('calendar', $prefs);
        $publicaciones = $this->Publicaciones_model->getEventosPorMes($mes, $anio);
        
        if (!empty($publicaciones)) {
            foreach ($publicaciones as $p) {
                if ($p->cantidad == 1) {
                     $fechas[date('d', strtotime($p->fecha))] = base_url('publicacion/'.$p->id);
                 }
                 else{
                    $fechas[date('d', strtotime($p->fecha))] = base_url('publicacion/'.$anio.'/'.$mes.'/'.date('d', strtotime($p->fecha)));
                 }
            }
            $data['calendario'] = $this->calendar->generate($anio, $mes, $fechas);
        }
        else{
            $data['calendario'] = $this->calendar->generate($anio, $mes);
        }

        //Eventos y Articulos
        $data['prox_even'] = $this->Publicaciones_model->getEventosProximos(3);
        $data['ult_art'] = $this->Publicaciones_model->getUltimosArticulos(4);

        //Carreras
        $data['carreras'] = $this->Carrera_model->getAllActivates();
        
		$data['_view'] = 'pages/index_carrera';
		$this->load->view('layouts/main',$data);
	}

	public function verCarrera($idCarrera)
	{
		$data['carrera'] = $this->Carrera_model->getCarrera($idCarrera);
        $data['plan'] = $this->Carrera_model->getPlan($idCarrera);
        
		if (count($data['plan']) == 0){
            $data['alerta'] = lang('undefined_plan');
            $data['_view'] = '404';
			$this->load->view('layouts/main',$data);
        }
        else{
            if (isset($mensaje)) {
                $data['alerta'] = $mensaje;
            }
            $data['orientaciones'] = $this->Carrera_model->getOrientaciones($data['plan'][0]->plan_id);
		  
			if(!empty($data['orientaciones']))
			{
				foreach ($data['orientaciones'] as $orientacion)
				{
					$data['orientacion'][$orientacion->id] = $this->Carrera_model->getPlanPorOrientacion($orientacion->id);
				}
			}

			$data['_view'] = 'pages/carreraView';
			$this->load->view('layouts/main',$data);
        }        
	}

	public function carrera_completa($id_carrera)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            
            $data['carrera'] = $this->Carrera_model->get_carrera_completa($id_carrera);
            $data['user'] = $this->ion_auth->user()->row();
            
            if (count($data['carrera']['data']) == 0){
                $data['alerta'] = lang('undefined_plan');
                $this->template->cargar_vista('abm/404', $data);
            }
            else{

                if (isset($mensaje)) {
                    $data['alerta'] = $mensaje;
                }
                $this->template->cargar_vista('abm/carrera/carrera_completa', $data);
            }            
        }
    }

    private function _setting()
    {
      return array(
       'start_day'   => 'monday',
       'show_next_prev'  => true,
       'next_prev_url'  => site_url('evencal/index'),
       'month_type'     => 'long',
        'day_type'       => 'short',
       
       'template' =>  array('table_open'               => '<table border="0" cellpadding="4" cellspacing="0">',
                        'heading_row_start'         => '<tr>',
                        'heading_previous_cell'     => '<th><a href="{previous_url}">&lt;&lt;</a></th>',
                        'heading_title_cell'        => '<th colspan="{colspan}">{heading}</th>',
                        'heading_next_cell'         => '<th><a href="{next_url}">&gt;&gt;</a></th>',
                        'heading_row_end'           => '</tr>',
                        'week_row_start'            => '<tr>',
                        'week_day_cell'             => '<td>{week_day}</td>',
                        'week_row_end'              => '</tr>',
                        'cal_row_start'             => '<tr>',
                        'cal_cell_start'            => '<td>',
                        'cal_cell_start_today'      => '<td>',
                        'cal_cell_content'          => '<a href="{content}">{day}</a>',
                        'cal_cell_content_today'    => '<a href="{content}"><strong>{day}</strong></a>',
                        'cal_cell_no_content'       => '{day}',
                        'cal_cell_no_content_today' => '<strong>{day}</strong>',
                        'cal_cell_blank'            => '&nbsp;',
                        'cal_cell_end'              => '</td>',
                        'cal_cell_end_today'        => '</td>',
                        'cal_row_end'               => '</tr>',
                        'table_close'               => '</table>
                            '));
    }

}

?>
