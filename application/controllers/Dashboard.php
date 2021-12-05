<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

	public function index()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_tab'] = "Dashboard";
		$object['title'] = "DFAR | Dashboard";
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function identity_cart()
	{
		$id = $this->input->get('id');
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "transfer_list";
		$object['active_tab'] = "transfer_list";
		$object['title'] = "Fishermen ID";
		$data['msg'] = "";
		$data['fisherman'] = $this->generic_Model->get_all_by_id("tblfishermen", base64_decode($id))->row();
		$this->load->view('header', $object);
		$this->load->view('common/identity_cart', $data);
	}

	public function vessel_owner_identity()
	{
		$id = $this->input->get('id');
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "transfer_list";
		$object['active_tab'] = "transfer_list";
		$object['title'] = "Operations License";
		$data['msg'] = "";
		$data['vessel'] = $this->generic_Model->get_all_by_id("tblvessel", base64_decode($id))->row();
		$this->load->view('header', $object);
		$this->load->view('common/vessel_owner_identity', $data);
	}

}
