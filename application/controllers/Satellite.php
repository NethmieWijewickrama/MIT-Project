<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Satellite extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user/mlogin');
		$this->load->model('mloging');
		$this->load->model('generic_Model');
		$this->load->model('user/muser');
		$this->load->model('satellite_Model');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url' => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
	}

    public function new_satellite()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "satellite";
		$object['active_tab'] = "new_satellite";
		$object['title'] = "DFAR | New Satellite";
		$data['msg'] = '';
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->satellite_Model->add_satellite($post_data)) {

				$link = "<a href=" . base_url() . "satellite_list>   Click to View Satellite Data List</a>";

				$data['msg'] = "Satellite Data (" . $post_data['dataType'] . ") Inserted Successfully " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('satellite/add_satellite_master', $data);
		$this->load->view('footer');
	}

	public function satellite_list()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "satellite";
		$object['active_tab'] = "view_satellite";
		$object['title'] = "DFAR | Satellite Data";
		$data['msg'] = '';
		$data['satellite_details'] = $this->generic_Model->get_all('tblsatellitemaster');
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('satellite/satellite_master_list', $data);
		$this->load->view('footer');
	}

    public function edit_satellite_master()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "satellite";
		$object['active_tab'] = "vessel_list";
		$object['title'] = "DFAR | Edit Satellite Data";
		$data['msg'] = '';
		$id = $this->input->get('id');
		if ($this->input->post() != null && sizeof($this->input->post()) > 0) {

			$post_data = $this->input->post();

			if ($this->generic_Model->update_where($post_data, base64_decode($id), 'tblsatellitemaster')) {

				$link = "<a href=" . base_url() . "satellite_list>   Click to Satellite List</a>";

				$data['msg'] = "Satellite (" . $post_data['dataType'] . ") Successfully Updated " . $link . "";
				$data['class_alert'] = "alert-success";
			}
		}

		$data['old_data'] = $this->generic_Model->get_all_by_id('tblsatellitemaster', base64_decode($id))->row();;
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('satellite/edit_satellite_master', $data);
		$this->load->view('footer');
	}

	public function satellite_bill()
	{

		$id = $this->input->get('vessel_id');

		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "satellite";
		$object['active_tab'] = "satellite_bill";
		$object['title'] = "DFAR | Satellite Bill";
		$data['msg'] = '';
		$data["inv_number"] = $this->satellite_Model->generate_invoice_number();
		$data["items"] = $this->satellite_Model->get_satellite_master();
		$data["inv_date"] = date('Y-m-d');
		$data['satellite_details'] = $this->generic_Model->get_all('tblsatellitemaster');
		$data['vessel_details'] = $this->satellite_Model->get_vessel_details(base64_decode($id));
		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('satellite/satellite_bill', $data);
		$this->load->view('footer');
	}

	public function get_unit_price()
	{

		$return = $this->satellite_Model->get_unit_price($this->input->get('data_type'));

		echo json_encode($return);
	}

	public function save_transaction()
	{
		$header['invoiceNumber'] = $this->input->post('invoiceNumber');
		$header['invoiceDate'] = $this->input->post('invoiceDate');
		$header['usageMonthStartDate'] = $this->input->post('usageMonthStartDate');
		$header['usageMonthEndDate'] = $this->input->post('usageMonthEndDate');
		$header['TotalAmtUSD'] = $this->input->post('TotalAmtUSD');
		$header['ExchangeRate'] = Currency::USDLKR;
		//$header['ExchangeRate'] = $this->input->post('exchangeRate');
		$header['TotalAmtLKR'] = $this->input->post('TotalAmtLKR');
		$header['vesselID'] = $this->input->post('vesselID');
		$header['ownerID'] = $this->input->post('ownerID');
		$header['userID'] = $this->session->userdata('user_id');

		$item_list = json_decode($this->input->post('item_list'));

		$line_records = [];

		foreach ($item_list as $item) {
			$line['satMasterID'] = $item[0];
			$line['noOfUnits'] = $item[1];
			$line['Amount'] = $item[3];
			$line_records[] = $line;
		}

		$data['status'] = 0;

		$trans_id = $this->satellite_Model->save_transaction($header, $line_records);

		if ($trans_id) {
			$data['status'] = 1;
			$data['trans_id'] = $trans_id;
		}

		echo json_encode($data);
	}

	public function create_invoice()
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_tab'] = "Invoice";
		$object['title'] = "DFAR | Satellite Invoice";

		$trans_id = $this->input->get("id");

		$data['vessel'] = $this->satellite_Model->get_vessel_details_for_invoice(($trans_id))->row();
		$data['items'] = $this->satellite_Model->get_vessel_details_for_invoice_detail(($trans_id));

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('satellite/invoice', $data);
	}

    public function invoice_list($msg = "", $class_alert = "alert-success")
	{
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "satellite";
		$object['active_tab'] = "invoice_list";
		$object['title'] = "DFAR | Invoice List";
		$data['msg'] = $msg;
		$data['class_alert'] = $class_alert;
		$data["invoice_details"] = $this->satellite_Model->get_invoice_list();
		$data['vessels'] = $this->generic_Model->get_all('tblvessel');

		$this->load->view('header', $object);
		$this->load->view('top_header');
		$this->load->view('side_menu');
		$this->load->view('satellite/invoice_list', $data);
		$this->load->view('footer');
	}
} 