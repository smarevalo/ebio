<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Publicaciones extends MX_Controller{
    
    private $name = 'La publicación';
    function __construct()
    {
        parent::__construct();    
        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library(array('ion_auth', 'form_validation'));
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }else {
            $this->load->module('template');
            $this->load->model('Publicaciones_model');
            $this->load->helper(array('language'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
        }
    } 

    public function index($mensaje=null)
    {
        $data['publicaciones'] = $this->Publicaciones_model->get_all_publicaciones();
        if (isset($mensaje)) {
            $data['alerta'] = $mensaje;
        }
        $this->template->cargar_vista('abm/publicaciones/index', $data);
    }

    public function add()
    {
        $data['user'] = $this->ion_auth->user()->row();
        $this->form_validation->set_rules('titulo','Titulo','required|max_length[100]');
        $this->form_validation->set_rules('imagen',lang('form_image'),'callback_image_file_check[imagen]');
        
		if($this->form_validation->run($this))     
        {   
            $f = getdate();
            $params = array(
				'creador_id' => $data['user']->user_id,
				'modificador_id' => $data['user']->user_id,
				'titulo' => $this->input->post('titulo'),
				'fecha_creacion' => $f['year']."-".$f['mon']."-".$f['mday'],
                'ultima_modificacion' => $f['year']."-".$f['mon']."-".$f['mday'],
                'imagen' => $_FILES['imagen']['name'],
				'contenido' => $this->input->post('contenido'),
                'esta_publicado' => ($this->input->post('esta_publicado')==1)? 1 : 0,
                'fecha' => $this->input->post('fecha'),
                'lugar' => $this->input->post('lugar'),
                'comienzo' => $this->input->post('comienzo'),
                'fin' => $this->input->post('fin'),
                'tipo' => $this->input->post('tipo'),
            );

            $imagen = $this->template->subir_archivo(IMAGES_UPLOAD.'/publicaciones', 'jpg|png', 'imagen');
            
            if ($this->Publicaciones_model->add_publicaciones($params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_add_success_text'), $this->name));    
            else   
                    $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_add_error_text'), $this->name)); 
                    
            redirect('abm/publicaciones/', 'refresh');
        }
        else
        {
			$data['tipos'] = $this->Publicaciones_model->getTipos();
            $this->template->cargar_vista('abm/publicaciones/add', $data);
        }
    }  

    public function edit($id)
    {
        // check if the publicaciones exists before trying to edit it
        $data['publicacion'] = $this->Publicaciones_model->get_publicaciones($id);
        $data['user'] = $this->ion_auth->user()->row();
        
        if(isset($data['publicacion']['id']))
        {
			$this->form_validation->set_rules('titulo','Titulo','required|max_length[100]');
            $this->form_validation->set_rules('imagen',lang('form_image'),'callback_image_file_check[imagen]');			

			if($this->form_validation->run($this))     
            {   
                //var_dump($_FILES['imagen']['name']); exit();
                $f = getdate();
                $params = array(
					'creador_id' => $data['publicacion']['creador_id'],
					'modificador_id' => $data['user']->user_id,
					'titulo' => $this->input->post('titulo'),
					'fecha_creacion' => $data['publicacion']['fecha_creacion'],
					'ultima_modificacion' => $f['year']."-".$f['mon']."-".$f['mday'],
					'contenido' => $this->input->post('contenido'),
                    'esta_publicado' => ($this->input->post('esta_publicado')==1)? 1 : 0,
                    'fecha' => ($this->input->post('fecha')==NULL)?0:$this->input->post('fecha'),
                    'lugar' => $this->input->post('lugar'),
                    'comienzo' => ($this->input->post('comienzo')==NULL)?0:$this->input->post('comienzo'),
                    'fin' => ($this->input->post('fin')==NULL)?0:$this->input->post('fin'),
                    'tipo' => $this->input->post('tipo'),  
                );

                if($_FILES['imagen']['name'] != ''){
                    $imagen = $this->template->subir_archivo(IMAGES_UPLOAD.'/publicaciones', 'jpg|png', 'imagen');
                    $params['imagen']= $imagen['file_name'];
                }
                
                if ($this->Publicaciones_model->update_publicaciones($id,$params))
                    $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                    sprintf(lang('record_edit_success_text'), $this->name));    
                else   
                        $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                    sprintf(lang('record_edit_error_text'), $this->name));    
                    
                redirect('abm/publicaciones/', 'refresh');
            }
            else
            {
                $data['all_users'] = $this->Publicaciones_model->get_users_by_publicacion($id);
                $data['tipos'] = $this->Publicaciones_model->getTipos();
				$data['publicacion'] = $this->Publicaciones_model->get_publicaciones($id);

                $this->template->cargar_vista('abm/publicaciones/edit', $data);
            }
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    } 

    public function remove($id)
    {
        $publicaciones = $this->Publicaciones_model->get_publicaciones($id);

        if(isset($publicaciones['id']))
        {
            if ($this->Publicaciones_model->delete_publicaciones($id))
                $mensaje =  $this->template->cargar_alerta('success', lang('record_success'), 
                                sprintf(lang('record_remove_success_text'), $this->name));    
            else   
                $mensaje = $this->template->cargar_alerta('danger', lang('record_error'),
                                sprintf(lang('record_remove_error_text'), $this->name));    
                
            //$this->index($mensaje);
            redirect('abm/publicaciones/', 'refresh');
        }
        else
            show_error(sprintf(lang('no_existe'), $this->name));
    }

    public function image_file_check($str, $nombre)
    {
        return $this->template->image_file_check($str, $nombre);
    }
    
}
