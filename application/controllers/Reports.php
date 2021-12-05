<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
        $this->load->model('reports_Model');
		

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

    public function high_sea_departure_report()
	{

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Reports";
		$object['active_tab'] = "high_sea_departure";
		//$object['title'] = "HIGH SEA DEPARTURE REPORT";
		//$object['title_report'] = "High Sea Departure Report";

		$from = $this->input->get("from");
		$to = $this->input->get("to");		
		
		$object['title_from'] = $from;
		$object['title_to'] = $to;
		$object['name'] = "HIGH SEA DEPARTURE REPORT";
		
		$data["harbour_list"] = $this->generic_Model->get_all('tblharbour');
		$data["report_data"] = $this->reports_Model->high_sea_departure_report($from,$to);
		//$data["report_harbour_data"] = $this->reports_Model->high_sea_departure_harbour($harbour);

		$this->load->view('header', $object);
		$this->load->view('header_report', $object, $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('reports/high_sea_departure', $data);
	}

	public function annual_log_report()
	{

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Reports";
		$object['active_tab'] = "annual_log";
		//$object['title'] = "DISTRESS VESSEL LOG REPORT";

		$from = $this->input->get("from");
		$to = $this->input->get("to");

		$object['title_from'] = $from;
		$object['title_to'] = $to;
		$object['name'] = "DISTRESS VESSEL LOG REPORT";

		$data["report_data"] = $this->reports_Model->annual_log_report($from,$to);

		$this->load->view('header', $object);
		$this->load->view('header_report', $object, $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('reports/annual_log', $data);
	}

	public function annual_death_report()
	{

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Reports";
		$object['active_tab'] = "annual_death";
		//$object['title'] = "DEATH DETAILS REPORT";

		$from = $this->input->get("from");
		$to = $this->input->get("to");		

		$object['title_from'] = $from;
		$object['title_to'] = $to;
		$object['name'] = "DEATH DETAILS REPORT";

		$data["report_data"] = $this->reports_Model->annual_death_report($from,$to);

		$this->load->view('header', $object);
		$this->load->view('header_report', $object, $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('reports/annual_death', $data);
	}

	public function annual_vessel_report()
	{

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Reports";
		$object['active_tab'] = "annual_vessel";
		//$object['title'] = "VESSEL INFORMATION REPORT";

		$from = $this->input->get("from");
		$to = $this->input->get("to");

		$object['title_from'] = $from;
		$object['title_to'] = $to;
		$object['name'] = "VESSELS INFORMATION REPORT";

		$data["report_data"] = $this->reports_Model->annual_vessel_report($from,$to);

		$this->load->view('header', $object);
		$this->load->view('header_report', $object, $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('reports/annual_vessel', $data);
//		$this->load->view('footer');
	}

	public function annual_fisherman_report()
	{

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Reports";
		$object['active_tab'] = "annual_fisherman";
		//$object['title'] = "";

		$from = $this->input->get("from");
		$to = $this->input->get("to");

		$object['title_from'] = $from;
		$object['title_to'] = $to;
		$object['name'] = "FISHERMEN INFORMATION REPORT";

		$data["report_data"] = $this->reports_Model->annual_fisherman_report($from,$to);

		$this->load->view('header', $object);
		$this->load->view('header_report', $object, $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('reports/annual_fisherman', $data);
	}

}