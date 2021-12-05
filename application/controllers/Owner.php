<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		//$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('owner_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

    public function new_owner()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "owner";
		$object['active_tab'] = "new_owner";
		$object['title'] = "DFAR | New Owner";
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->owner_Model->add_owner($post_data)) {

				$link = "<a href=" . base_url() . "owners_list>   Click to Owners List</a>";

				$data['msg'] = "Vessel Owner Details (" . $post_data['ownerName'] . ") Inserted Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['districts'] = $this->generic_Model->get_all('tbldistrictoffice');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('owner/new_owner', $data);
		$this->load->view('footer');
	}

	public function owners_list()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "owner";
		$object['active_tab'] = "view_owner";
		$object['title'] = "DFAR | Owner List";
		$data['msg'] = '';
		$data['owner_details'] = $this->generic_Model->get_all_order_by('tblowner');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('owner/owner_list', $data);
		$this->load->view('footer');
	}

	public function edit_owner()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "owner";
		$object['active_tab'] = "new_owner";
		$object['title'] = "DFAR | Edit Owner";
		$data['msg'] = '';
		$id = $this->input->get('id');
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->generic_Model->update_where($post_data, base64_decode($id), 'tblowner')) {

				$link = "<a href=" . base_url() . "owners_list>   Click to Owners List</a>";

				$data['msg'] = "Vessel Owner Details (" . $post_data['ownerName'] . ") Updated Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['old_data'] = $this->generic_Model->get_all_by_id('tblowner', base64_decode($id))->row();;
		$data['districts'] = $this->generic_Model->get_all('tbldistrictoffice');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('owner/edit_owner', $data);
		$this->load->view('footer');
	}

}