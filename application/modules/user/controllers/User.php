<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller
{
	public $data;
	function __construct()
	{
		parent::__construct();
		$this->load->module('template');
		$this->load->model('user_model','m_user');
		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	// redirect if needed, otherwise display the user list
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
		$data['user'] = $this->ion_auth->user()->row();
		$this->template->commonHeader();
		$this->template->adminHeader();
		$this->load->view('profile', $data);
		$this->template->footer();
		$this->template->commonFooter();
	}

	public function form()
	{
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
		$data['formlink'] = 'admin/add';
		$data['user'] = $this->ion_auth->user()->row();
		$this->template->commonHeader();
		$this->template->adminHeader();
		$this->load->view('form1', $data);
		$this->template->footer();
		$this->template->commonFooter();
	}

	//get data from registration from
	public function registration()
	{
		$data['full_name'] = $this->input->post('distributor-name');
		$data['phone'] = $this->input->post('distributor-mobile');
		$data['email'] = $this->input->post('distributor-email');
		$data['company_name'] = $this->input->post('distributor-company-name');
		$data['business_nature'] = $this->input->post('distributor-business-nature');
		$data['website'] = $this->input->post('distributor-website');	
		$data['address'] = $this->input->post('distributor-address');
		$data['city'] = $this->input->post('distributor-city');
		$data['state'] = $this->input->post('distributor-state');
		$data['pincode'] = $this->input->post('distributor-pin');
		$data['company_reg_number'] = $this->input->post('distributor-reg-number');
		$data['years'] = $this->input->post('distributor-year');
		$data['message'] = $this->input->post('distributor-message');
		$data['experience'] = $this->input->post('distributor-be-year');
		$data['groups'] = $this->input->post('distributor-be-group');
		$data['available_capital'] = $this->input->post('distributor-be-capital');
		$data['borrowed_capital'] = $this->input->post('distributor-be-borrow');
		$data['finance_source'] = $this->input->post('distributor-be-finance');
		$data['reg_mode'] = $this->input->post('distributor-reg-mode');

		if($this->m_admin->insert_distributor($data))
		{
			$response="Congratulation! Your are successfully registered. Please confirm the mail sent to your Email-ID!";
			header('Location: http://localhost/true-target/distributor-form.php?response='.$response);
		}
		else
		{
			$response = "Sorry! This Sponsor ID has been deactivated. Please insert new sponsor ID.";
			header('Location: http://localhost/true-target/distributor-form.php?response='.$response);
			exit;
		}
	}

	public function add_distributor()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$data['formlink'] = 'admin/add_distributor';
			$this->template->commonHeader($data);
			$this->template->adminHeader();

			if ($this->input->post('submit'))
			{
				# on Submit
				$this->form_validation->set_rules(
					'full_name',//field_name
					'full name',//error
					'required|trim'
				);
				$this->form_validation->set_rules(
					'phone_no',//field_name
					'phone no.',//error
					'required|trim'
				);
				$this->form_validation->set_rules(
					'email',
					'email id',
					'required|trim'
				);
				$this->form_validation->set_rules(
					'company_name',
					'company name',
					'required|trim'
				);
				$this->form_validation->set_rules(
					'address',
					'address',
					'required|trim'
				);
				$this->form_validation->set_rules(
					'city',
					'city',
					'required|trim'
				);
				$this->form_validation->set_rules(
					'state',
					'state',
					'required|trim'
				);
				$this->form_validation->set_rules(
					'pincode',
					'pincode',
					'required|trim'
				);
				$this->form_validation->set_message(array(
					'required'=>'You have to fill %s.'
				));
				if ($this->form_validation->run())
				{
					# Form check completed
					$userData['full_name'] = $this->input->post('full_name');
					$userData['phone'] = $this->input->post('phone_no');
					$userData['email'] = $this->input->post('email');
					$userData['company_name'] = $this->input->post('company_name');
					$userData['business_nature'] = $this->input->post('business_nature');
					$userData['website'] = $this->input->post('website');
					$userData['address'] = $this->input->post('address');
					$userData['city'] = $this->input->post('city');
					$userData['state'] = $this->input->post('state');
					$userData['pincode'] = $this->input->post('pincode');
					$userData['company_reg_number'] = $this->input->post('company_reg_number');
					$userData['years'] = $this->input->post('years');
					$userData['message'] = $this->input->post('message');
					$userData['experience'] = $this->input->post('experience');
					$userData['groups'] = $this->input->post('groups');
					$userData['available_capital'] = $this->input->post('available_capital');
					$userData['borrowed_capital'] = $this->input->post('borrowed_capital');
					$userData['finance_source'] = $this->input->post('finance_source');
					$userData['reg_mode'] = 'admin';
					$userData['status'] = 1;
					//$data['userData'] = array_merge($userData,$adminData);
					if($this->m_admin->insert_distributor($userData))
					{
						# Added success
						$this->session->set_flashdata('msg_success', 'Added '.$userData['full_name'].' to database.');
						redirect('admin', 'referesh');
					}
					else
					{
						# Failed
						$this->session->set_flashdata('msg_error', 'Something went wrong. Can not add '.$userData['full_name'].'.');
						redirect('admin', 'referesh');
					}
				}
				else
				{
					// Set user data form
					$data['userData'] = array(
						'username' => $this->input->post('username'),
						'name' => $this->input->post('fname'),
						'lname' => $this->input->post('surname'),
						'email' => $this->input->post('email'),
					);
					$data['msg_error'] = 'Check the accuracy of the data.';
					$this->load->view('distributor-form', $data);
				}
			}
			else
			{
				// Set user data form
				$data['userData'] = array(
					'full_name' => set_value('full_name'),
					'phone' => set_value('phone'),
					'email' => set_value('email'),
					'company_name' => set_value('company_name'),
					'business_nature' => set_value('business_nature'),
					'website' => set_value('website'),
					'address' => set_value('address'),
					'city' => set_value('city'),
					'state' => set_value('state'),
					'pincode' => set_value('pincode'),
					'company_reg_number' => set_value('company_reg_number'),
					'years' => set_value('years'),
					'message' => set_value('message'),
					'experience' => set_value('experience'),
					'groups' => set_value('groups'),
					'available_capital' => set_value('available_capital'),
					'borrowed_capital' => set_value('borrowed_capital'),
					'finance_source' => set_value('finance_source')
				);
				$this->load->view('distributor-form', $data);
			}
			$this->template->footer();
			$this->template->commonFooter();
		}
	}

	public function edit_distributor($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			// fetching user
			$data['userData']=$this->m_admin->get_user($id);
			$data['formlink']='admin/edit_distributor/'.$id;
			$this->template->commonHeader($data);
			$this->template->adminHeader();
			if ($this->input->post('submit'))
			{
				$this->update($id, $data);
			}
			else
			{
				if ($id == '')
				{
					redirect('admin', 'referesh');
				}
				else
				{
					$this->load->view('distributor-form', $data);
				}
			}
			$this->template->footer();
			$this->template->commonFooter();
		}
	}

	public function update($id, $viewData)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		#on submit
		$this->form_validation->set_rules(
			'full_name',//field_name
			'full name',//error
			'required|trim'
		);
		$this->form_validation->set_rules(
			'phone_no',//field_name
			'phone no.',//error
			'required|trim'
		);
		$this->form_validation->set_rules(
			'email',
			'email id',
			'required|trim'
		);
		$this->form_validation->set_rules(
			'company_name',
			'company name',
			'required|trim'
		);
		$this->form_validation->set_rules(
			'address',
			'address',
			'required|trim'
		);
		$this->form_validation->set_rules(
			'city',
			'city',
			'required|trim'
		);
		$this->form_validation->set_rules(
			'state',
			'state',
			'required|trim'
		);
		$this->form_validation->set_rules(
			'pincode',
			'pincode',
			'required|trim'
		);
		$this->form_validation->set_message(array(
			'required'=>'You have to fill %s.'
		));
		if ($this->form_validation->run())
		{
			# Form check completed
			$userData['full_name'] = $this->input->post('full_name');
			$userData['phone'] = $this->input->post('phone_no');
			$userData['email'] = $this->input->post('email');
			$userData['company_name'] = $this->input->post('company_name');
			$userData['business_nature'] = $this->input->post('business_nature');
			$userData['website'] = $this->input->post('website');
			$userData['address'] = $this->input->post('address');
			$userData['city'] = $this->input->post('city');
			$userData['state'] = $this->input->post('state');
			$userData['pincode'] = $this->input->post('pincode');
			$userData['company_reg_number'] = $this->input->post('company_reg_number');
			$userData['years'] = $this->input->post('years');
			$userData['message'] = $this->input->post('message');
			$userData['experience'] = $this->input->post('experience');
			$userData['groups'] = $this->input->post('groups');
			$userData['available_capital'] = $this->input->post('available_capital');
			$userData['borrowed_capital'] = $this->input->post('borrowed_capital');
			$userData['finance_source'] = $this->input->post('finance_source');

			if ($this->m_admin->update_distributor($id, $userData))
			{
				# Added success
				$this->session->set_flashdata('msg_success', 'Added '.$userData['full_name'].' to database.');
				redirect('admin', 'referesh');
			}
			else
			{
				# Failed
				$this->session->set_flashdata('msg_error', 'Something went wrong. Can not add '.$userData['full_name'].'.');
				redirect('admin', 'referesh');
			}
		}
		else
		{
			$data['msg_error'] = 'Check the accuracy of the data.';
			$this->load->view('distributor-form', $data);
		}
	}

	//view profile
	public function view_profile($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		$data['userData']=$this->m_admin->get_user($id);
		$this->template->commonHeader();
		$this->template->adminHeader();
		//$this->_render_page('user_list');
		$this->load->view('profile', $data);
		$this->template->footer();
		$this->template->commonFooter();
	}

	//deactivate user
	public function deactivate($id)
	{
		if ($this->m_admin->deactivate_distributor($id))
		{
			# Add success
			$this->session->set_flashdata('msg_success', 'Updated distributor status.(Deactivated)');
			redirect('admin', 'referesh');
		}
		else
		{
			# Failed
			$this->session->set_flashdata('msg_error', 'Can\'t update distributor status.');
			redirect('admin', 'referesh');
		}
	}

	//activate user
	public function activate($id)
	{
		if ($this->m_admin->activate_distributor($id))
		{
			# Add success
			$this->session->set_flashdata('msg_success', 'Updated distributor status(Activated).');
			redirect('admin', 'referesh');
		}
		else
		{
			# Failed
			$this->session->set_flashdata('msg_error', 'Can\'t update distributor status.');
			redirect('admin', 'referesh');
		}
	}

	public function remove_user($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
			if($this->m_admin->delete_distributor($id))
			{
				# Add success
				$this->session->set_flashdata('msg_success', 'Distributor deleted.');
				redirect('admin', 'referesh');
			}
			else
			{
				# Failed
				$this->session->set_flashdata('msg_error', 'Can\'t delete distributor.');
				redirect('admin', 'referesh');
			}
		}
	}

    function error()
	{
		$this->load->view('404.html');
	}
}