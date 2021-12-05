<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transponder extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('transponder_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

    public function new_tranponder()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "tranponder";
		$object['active_tab'] = "new_tranponder";
		$object['title'] = "DFAR | New Tranponder";
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->transponder_Model->add_tranponder($post_data)) {

				$link = "<a href=" . base_url() . "tranponder_list>   Click to Tranponder List</a>";

				$data['msg'] = "Transponder Details (ISN No: " . $post_data['ISN'] . ") Inserted Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('tranponder/new_tranponder', $data);
		$this->load->view('footer');
	}

	public function tranponder_list($msg="")
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "tranponder";
		$object['active_tab'] = "view_tranponder";
		$object['title'] = "DFAR | Tranponders";
		$data['msg'] = $msg;
		$data['tranponder_details'] = $this->generic_Model->get_all('tbltransponder');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('tranponder/tranponder_list', $data);
		$this->load->view('footer');
	}

    public function edit_transponder()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "tranponder";
		$object['active_tab'] = "vessel_list";
		$object['title'] = "DFAR | Edit Transponder";
		$data['msg'] = '';
		$id = $this->input->get('id');
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->generic_Model->update_where($post_data, base64_decode($id), 'tbltransponder')) {

				$link = "<a href=" . base_url() . "tranponder_list>   Click to transponder List</a>";

				$data['msg'] = "Tranponder Details (ISN No: " . $post_data['ISN'] . ") Updated Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}

		$data['old_data'] = $this->generic_Model->get_all_by_id('tbltransponder', base64_decode($id))->row();;
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('tranponder/edit_transponder', $data);
		$this->load->view('footer');
	}

    public function transfers()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "transfers";
		$object['active_tab'] = "transfers";
		$object['title'] = "DFAR | Transfers";
		$data['msg'] = '';
		$data["vessel_list"] = $this->generic_Model->get_all('tblvessel');
		$data["transponder_list"] = $this->generic_Model->get_all('tbltransponder');

		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();
			$post_data["userID"] = $this->session->userdata('user_id');

			if ($this->transponder_Model->add_transponder($post_data)) {

				$link = "<a href=" . base_url() . "transfer_list>   Click to Transfer List</a>";
				$data['msg'] = "Transfered Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('tranponder/transfers', $data);
		$this->load->view('footer');
	}

	public function transfer_list($msg = "", $class_alert = "alert-success")
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "transfers";
		$object['active_tab'] = "transfer_list";
		$object['title'] = "DFAR | Transfers List";
		$data['msg'] = $msg;
		$data['class_alert'] = $class_alert;
		$data["transfer_details"] = $this->transponder_Model->get_transfer_list();

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('tranponder/transfer_list', $data);
		$this->load->view('footer');
	}

    public function uninstall_transfer()
	{

		$id = $this->input->get('id');

		if ($this->generic_Model->update_where(array("jobStatus" => 0), base64_decode($id), "tbltranspondertransfer")) {
			$this->transfer_list("Uninstalled Successfully");
		} else {
			$this->transfer_list("Uninstall Error.", "alert-danger");
		}
	}

	public function inactive_transponder()
	{

		$id = $this->input->get('id');

		if ($this->generic_Model->update_where(array("is_active" => 0), base64_decode($id), "tbltransponder")) {
			$this->tranponder_list("Inactive Successful.");
		} else {
			$this->transfer_list("Inactive Error.", "alert-danger");
		}
	}
} 