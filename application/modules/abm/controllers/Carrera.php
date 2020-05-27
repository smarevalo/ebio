<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrera extends MX_Controller {

    private $name = 'La carrera';
	function __construct(){
		parent::__construct();    
        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library(array('ion_auth', 'form_validation'));
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            $this->load->module('template');
            $this->load->model('Carrera_model');
            $this->load->model('Planes_model');
            $this->load->model('Ciclo_materia_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    }

	public function index($mensaje=null)
    {    
        $data['carreras'] = $this->Carrera_model->get_all_carrera();
        $data['user'] = $this->ion_auth->user()->row();
        if (isset($mensaje)) {
            $data['alerta'] = $mensaje;
        }

        $this->template->cargar_vista('abm/carrera/index', $data);
    }

    public function add()
    {   
        $this->form_validation->set_rules('nombre',lang('form_name'),'required');
        $this->form_validation->set_rules('plan_pdf',lang('form_plan_pdf'),'callback_pdf_file_check[plan_pdf]');
        $this->form_validation->set_rules('imagen',lang('form_image'),'callback_image_file_check[imagen]');

        if($this->form_validation->run($this))     
        {   
            $params = array(
                'nombre' => $this->input->post('nombre'),
                'imagen' => $_FILES['imagen']['name'],
                'plan_pdf' => $_FILES['plan_pdf']['name'],
                'presentacion' => $this->input->post('presentacion'),
                'perfil' => $this->input->post('perfil'),
            );

            $pdf = $this->template->subir_archivo(CARRERAS_UPLOAD, 'pdf', 'plan_pdf');
            $imagen = $this->template->subir_archivo(IMAGES_UPLOAD, 'jpg|png', 'imagen');
         
            if ($this->Carrera_model->add_carrera($params))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_edit_success_text'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_edit_error_text'), $this->name));  

            $this->index($mensaje);
        }
        else
        {            
            $data['user'] = $this->ion_auth->user()->row();

            $this->template->cargar_vista('abm/carrera/add', $data);
        }
    }  

    public function edit($id)
    {       
        $data['carrera'] = $this->Carrera_model->get_carrera($id);
        
        if(isset($data['carrera']['id']))
        {
            $this->form_validation->set_rules('nombre',lang('form_name'),'required');
            $this->form_validation->set_rules('plan_pdf',lang('form_plan_pdf'),'callback_pdf_file_check[plan_pdf]');
            $this->form_validation->set_rules('imagen',lang('form_image'),'callback_image_file_check[imagen]');
            
            if($this->form_validation->run($this))     
            {                       
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    'presentacion' => $this->input->post('presentacion'),
                    'perfil' => $this->input->post('perfil'),
                );

                if($_FILES['plan_pdf']['name'] != ''){
                    $pdf = $this->template->subir_archivo(CARRERAS_UPLOAD, 'pdf', 'plan_pdf');
                    $params['plan_pdf'] = $pdf['file_name'];
                }
                
                if($_FILES['imagen']['name'] != ''){
                    $imagen = $this->template->subir_archivo(IMAGES_UPLOAD, 'jpg|png', 'imagen');
                    $params['imagen']= $imagen['file_name'];
                }

                if ($this->Carrera_model->update_carrera($id, $params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                        $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));  

                $this->index($mensaje);
            }
            else
            {
                $data['user'] = $this->ion_auth->user()->row();
                $this->template->cargar_vista('abm/carrera/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $carrera = $this->Carrera_model->get_carrera($id);

        if(isset($carrera['id']))
        {
            if ($this->Carrera_model->delete_carrera($id))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_remove_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_remove_error_text'), $this->name));    
                
            $this->index($mensaje);
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }

    public function activate($id)
	{
		if ($this->ion_auth->is_admin())
		{
            $params['activo']= true;
            $this->Carrera_model->change_status($id, $params);
		}

		redirect('abm/carrera/', 'refresh');
	}

    public function deactivate($id = NULL)
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
		{
            $params['activo']= false;
			$this->Carrera_model->change_status($id, $params);
		}
	   redirect('abm/carrera/', 'refresh');
	}

    public function pdf_file_check($str, $nombre)
    {
        return $this->template->pdf_file_check($str, $nombre);
    }

    public function image_file_check($str, $nombre)
    {
        return $this->template->image_file_check($str, $nombre);
    }

    public function carrera_completa($id_plan)
    {   
        $data['carrera'] = $this->Carrera_model->get_data_carrera($id_plan);
        if (!empty($data['carrera'])) {
            $data['ciclo_materia'] = $this->Ciclo_materia_model->get_all_ciclo_materia_by_plan($data['carrera'][0]->plan_id);
        }

        if (isset($mensaje)) {
            $data['alerta'] = $mensaje;
        }
        $this->template->cargar_vista('abm/carrera/carrera_completa', $data);            
    }

}

?>
