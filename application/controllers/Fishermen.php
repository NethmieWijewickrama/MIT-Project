<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fishermen extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('fishermen_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}
   
//add new fishermen function

    public function new_fishermen()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "fishermen";
		$object['active_tab'] = "new_fishermen";
		$object['title'] = "DFAR | New Fishermen";
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();
			if (isset($_FILES["medicalFile"]['name'])) {
				$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . "/dfar/uploads/medical/";
				$config['max_size'] = 0;
				$config['allowed_types'] = '*';
				$new_name = time() . $_FILES["medicalFile"]['name'];
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->do_upload('medicalFile');
				$post_data["medicalFile"] = $new_name;
			}
			if (isset($_FILES["cinecFile"]['name'])) {
				$config2['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . "/dfar/uploads/cinec/";
				$config2['max_size'] = 0;
				$config2['allowed_types'] = '*';
				$new_name2 = time() . $_FILES["cinecFile"]['name'];
				$config2['file_name'] = $new_name2;
				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
				$this->upload->do_upload('cinecFile');
				$post_data["cinecFile"] = $new_name2;
			}

			if ($this->fishermen_Model->add_fishermen($post_data)) {

				$link = "<a href=" . base_url() . "fishermen_list>   Click to Fishermen List</a>";

				$data['msg'] = "Fisherman Details (" . $post_data['nameWithInitials'] . ") Inserted Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['districts'] = $this->generic_Model->get_all('tbldistrictoffice');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('fisherman/new_fishermen', $data);
		$this->load->view('footer');
	}

	public function fishermen_list()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "fishermen";
		$object['active_tab'] = "view_fishermen";
		$object['title'] = "DFAR | Fishermen List";
		$data['msg'] = '';
		$data['fisherman_details'] = $this->generic_Model->get_all('tblfishermen');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('fisherman/fishermen_list', $data);
		$this->load->view('footer');
	}

	public function edit_fisherman()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "fisherman";
		$object['active_tab'] = "edit_fisherman";
		$object['title'] = "DFAR | Edit Fisherman";
		$data['msg'] = '';
		$id = $this->input->get('id');
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->fishermen_Model->edit_fishermen($post_data, base64_decode($id))) {

				$link = "<a href=" . base_url() . "fishermen_list>   Click to Fishermen List</a>";

				$data['msg'] = "Fisherman Details (" . $post_data['nameWithInitials'] . ") Updated Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$data['districts'] = $this->generic_Model->get_all('tbldistrictoffice');

		//$data['yards'] = $this->generic_Model->get_all('tblyard');
		//$data['owners'] = $this->generic_Model->get_all('tblowner');
		$data['old_data'] = $this->generic_Model->get_all_by_id('tblfishermen', base64_decode($id))->row();;
		$data['dep_one'] = $this->generic_Model->get_all_where('tbldependent', array("fishermenID"=>base64_decode($id),"row"=>1))->row();;
		$data['dep_two'] = $this->generic_Model->get_all_where('tbldependent', array("fishermenID"=>base64_decode($id),"row"=>2))->row();;
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('fisherman/edit_fishermen', $data);
		$this->load->view('footer');
	}

}