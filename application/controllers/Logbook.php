<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logbook extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('logbook_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

    public function log_book()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "distress_log";
		$object['active_tab'] = "log";
		$object['title'] = "DFAR | Distress Log";
		$data['msg'] = '';

		$data["vessel_list"] = $this->generic_Model->get_all('tblvessel');

		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->logbook_Model->add_log($post_data)) {

				$link = "<a href=" . base_url() . "log_list>   Click to View Log List</a>";
				//$link = "";
				$data['msg'] = "Log Entry Inserted Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
        
		}

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('distress_log/log', $data);
		$this->load->view('footer');
	}

	public function log_list()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "distress_log";
		$object['active_tab'] = "log_list";
		$object['title'] = "DFAR | Distress Log";
		$data['msg'] = '';
		$data["report_data"] = $this->generic_Model->annual_log_report("","");
        //$data['fisherman_details'] = $this->generic_Model->get_all('tbllogbook');
		//$data['fisherman_details'] = $this->generic_Model->get_all('tbllogbook');

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('distress_log/log_list', $data);
		$this->load->view('footer');
	}

	public function death_details()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "distress_log";
		$object['active_tab'] = "death";
		$object['title'] = "DFAR | Distress Log";
		$data['msg'] = '';

		$id = $this->input->get_post('id');
		$data["log_list"] = $this->generic_Model->get_all_by_id('tbllogbook',base64_decode($id));
		$data["fisherman_list"] = $this->generic_Model->get_all('tblfishermen');

		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->logbook_Model->add_death($post_data)) {

//				$link = "<a href=" . base_url() . "log_book>   Click to Log List</a>";
				$link = "";
				$data['msg'] = "Deceased Details (" . $post_data['date'] . ") Inserted Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('distress_log/death', $data);
		$this->load->view('footer');
	}

}