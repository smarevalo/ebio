<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends MX_Controller { 
   
	public function __construct()
	{
		parent::__construct();
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->helper(array('language'));
        $this->lang->load('auth');
	}

	public function index()
	{

   		$data['alerta'] = lang('undefined_page');
      	$data['_view'] = '404';
		$this->load->view('layouts/main',$data);
   	}
}