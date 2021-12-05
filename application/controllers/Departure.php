<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Departure extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('departure_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

    public function high_sea_departure()
	{

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "high_sea";
		$object['active_tab'] = "high_sea_departure";
		$object['title'] = "DFAR | New Departure";
		$data['msg'] = '';

		$data["active_code"] = $this->departure_Model->get_active_code();
		$data["vessel_list"] = $this->generic_Model->get_all('tblvessel');
		$data["harbour_list"] = $this->generic_Model->get_all('tblharbour');
		$data["fisherman_list"] = $this->generic_Model->get_all('tblfishermen');


		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('departure/new_departure', $data);
		$this->load->view('footer');
	}

	public function high_sea_form()
	{

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "high_sea";
		$object['active_tab'] = "high_sea_form";
		$object['title'] = "DFAR | Departure List";
		$data['msg'] = '';
		$data['departures'] = $this->generic_Model->get_all("tbldepartureheader");

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('departure/departure_form', $data);
		$this->load->view('footer');
	}

	public function get_fishermen_details()
	{

		$id = $this->input->get_post('id');

		$data = $this->generic_Model->get_all_by_id("tblfishermen", $id);

		echo json_encode($data->row());
	}

	public function save_departure()
	{
		$header['activeCode'] = $this->input->post('activeCode');
		$header['vesselID'] = $this->input->post('vesselID');
		$header['harbour'] = $this->input->post('harbour');
		$header['departureDate'] = $this->input->post('departureDate');
		$header['fishingGear'] = $this->input->post('fishingGear');
		$header['skipperID'] = $this->input->post('skipperID');

		$item_list = json_decode($this->input->post('crew_list'));

		$line_records = [];

		foreach ($item_list as $item) {
			$line['fishermenID'] = $item[0];
			$line_records[] = $line;
		}

		$data['status'] = 0;

		$trans_id = $this->departure_Model->save_departure($header, $line_records);

		if ($trans_id) {
			$data['status'] = 1;
			$data['trans_id'] = $trans_id;
		}

		echo json_encode($data);
	}

    public function vessel_departure_form()
	{
		$id = $this->input->get('id');
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "transfer_list";
		$object['active_tab'] = "transfer_list";
		$object['title'] = "DFAR | Departure Form";
		$data['msg'] = "";
		$data['departure'] = $this->departure_Model->get_departure_print_header(base64_decode($id));
		$data['fishermans'] = $this->departure_Model->get_departure_print_details(base64_decode($id));
		$this->load->view('header', $object);
		$this->load->view('common/vessel_departure_form', $data);
	}

} 