<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vessel extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('vessel_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
    }

    public function new_vessel()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "vessel";
		$object['active_tab'] = "new_vessel";
		$object['title'] = "DFAR | New Vessel";
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();
			

			if ($this->vessel_Model->add_vessel($post_data)) {

				$link = "<a href=" . base_url() . "vessel_list>   Click to Vessel List</a>";

				$data['msg'] = "Vessel (" . $post_data['vesselName'] . ") Successfully Updated " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['districts'] = $this->generic_Model->get_all('tbldistrictoffice');
		$data['transponder_list'] = $this->generic_Model->get_all('tbltransponder');
		$data['yard_list'] = $this->generic_Model->get_all('tblyard');

		$data['yards'] = $this->generic_Model->get_all('tblyard');
		$data['owners'] = $this->generic_Model->get_all('tblowner');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('vessel/new_vessel', $data);
		$this->load->view('footer');
	}

	public function vessel_list()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "vessel";
		$object['active_tab'] = "view_vessel";
		$object['title'] = "DFAR | Vessel List";
		$data['msg'] = '';
		$data['owner_details'] = $this->vessel_Model->get_vessel_list();
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('vessel/vessel_list', $data);
		$this->load->view('footer');
	}

    public function edit_vessel()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "vessel";
		$object['active_tab'] = "vessel_list";
		$object['title'] = "DFAR | Edit Vessel";
		$data['msg'] = '';
		$id = $this->input->get('id');
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->generic_Model->update_where($post_data, base64_decode($id), 'tblvessel')) {

				$link = "<a href=" . base_url() . "vessel_list>   Click to Vessels List</a>";

				$data['msg'] = "Vessel (" . $post_data['vesselName'] . ") Successfully Updated " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['districts'] = $this->generic_Model->get_all('tbldistrictoffice');
		$data['transponder_list'] = $this->generic_Model->get_all('tbltransponder');
		$data['yard_list'] = $this->generic_Model->get_all('tblyard');

		$data['yards'] = $this->generic_Model->get_all('tblyard');
		$data['owners'] = $this->generic_Model->get_all('tblowner');
		$data['old_data'] = $this->generic_Model->get_all_by_id('tblvessel', base64_decode($id))->row();;
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('vessel/edit_vessel', $data);
		$this->load->view('footer');
	}

/*
	public function vessel_owner_identity()
	{
		$id = $this->input->get('id');
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "vessel";
		$object['active_tab'] = "vessel_list";
		$object['title'] = "Operations License";
		$data['msg'] = "";
		$data['vessel'] = $this->generic_Model->get_all_by_id("tblvessel", base64_decode($id))->row();
		$this->load->view('header', $object);
		$this->load->view('common/vessel_owner_identity', $data);
	}*/

}