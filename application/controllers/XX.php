<?php

defined('BASEPATH') or exit('No direct script access allowed');

class XX extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('fishermen_Model');
		$this->load->model('xX_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

	public function add_xxv()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "XX";
		$object['active_tab'] = "add_xxv";
		$object['title'] = "New XX";
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			//$post_data = $this->input->post();

			/*$data = array('db_column_name1' => $this->input->post('first_name'),
              'db_column_name2' => $this->input->post('last_name'),
              'db_column_name3' => $this->input->post('email'),
              'db_column_name4' => $this->input->post('phone'),
              'db_column_name5' => $this->input->post('city'),
              'db_column_name6' => $this->input->post('address')); */

			$post_data= array('xxType' => $this->input->post('xxtype'),
							'xxName' => $this->input->post('xxname'),
							'xxNo' => $this->input->post('xxno'));

			if ($this->xX_Model->add_xx($post_data)) {

				$link = "<a href=" . base_url() . "xx_list>   Click to XX List</a>";

				$data['msg'] = "XX Details (" . $post_data['xxName'] . ") Inserted Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['harbours'] = $this->generic_Model->get_all('tblharbour');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('add_xxv', $data);
		$this->load->view('footer');
	}

	public function xx_list()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "XX";
		$object['active_tab'] = "xx_list";
		$object['title'] = "XX List";
		$data['msg'] = '';
		$data['xx_details'] = $this->generic_Model->get_all_XX('tblxx');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('xx_list', $data);
		$this->load->view('footer');
	}

	public function edit_xxv()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "XX";
		$object['active_tab'] = "edit_xxv";
		$object['title'] = "Edit XX";
		$data['msg'] = '';
		$xxID = $this->input->get('xxID');
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			//$post_data = $this->input->post();
			$post_data= array('xxType' => $this->input->post('xxType'),
							'xxName' => $this->input->post('xxName'),
							'xxNo' => $this->input->post('xxNo'));

			if ($this->xX_Model->update_xx($post_data, base64_decode($xxID), 'tblxx')) {

				$link = "<a href=" . base_url() . "xx_list>   Click to XX List</a>";

				$data['msg'] = "XX Details (" . $post_data['xxName'] . ") Updated Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['old_data'] = $this->generic_Model->get_all_by_idxx('tblxx', base64_decode($xxID))->row();;
		$data['harbours'] = $this->generic_Model->get_all('tblharbour');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('edit_xxv', $data);
		$this->load->view('footer');
	}
}