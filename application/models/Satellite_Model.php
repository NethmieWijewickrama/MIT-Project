<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Satellite_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('generic_Model');
	}

    public function add_satellite($data)
	{
		if ($this->db->insert('tblsatellitemaster', $data)) {
			return true;
		}
		return false;
	}

    public function get_vessel_details($id = 0)
	{

		$res = $this->db->query("SELECT
									o.ownerName, 
									o.contactNo, 
									v.ownerID, 
									v.id AS vesselID, 
									v.vesselNo
								FROM
									tblvessel AS v
									INNER JOIN
									tblowner AS o
									ON 
										v.ownerID = o.id
								WHERE
									v.id = $id
								");

		if ($res->num_rows() > 0) {
			return $res->row();
		}

		return null;
	}

	public function generate_invoice_number()
	{
		$invoice_number = "";

		$this->db->select("id");
		$this->db->from("tblinvoiceheader");
		$this->db->limit(1);
		$this->db->order_by('id', "DESC");
		$result = $this->db->get();
		if ($result->num_rows() == 0)
			$rowcount = 0;
		else {
			$rowcount = $result->row()->id;
		}
		$rowcount++;
		if ($rowcount < 10) $invoice_number = "INV0000" . $rowcount;
		else if ($rowcount < 100) $invoice_number = "INV000" . $rowcount;
		else if ($rowcount < 1000) $invoice_number = "INV00" . $rowcount;
		else if ($rowcount < 10000) $invoice_number = "INV0" . $rowcount;
		else $invoice_number = "INV" . $invoice_number;


		return $invoice_number;
	}

	public function get_satellite_master()
	{
		return $this->db->select('*')->from('tblsatellitemaster')->get();
	}

	public function get_unit_price($data_type)
	{

		$res = $this->db->select('*')->from('tblsatellitemaster')->where('id', $data_type)->get();

		if ($res->num_rows() > 0)
			return $res->row();

		return null;
	}

	public function save_transaction($header, $line_records)
	{

		if ($this->db->insert('tblinvoiceheader', $header)) {
			$invoice_id = $this->db->insert_id();

			foreach ($line_records as $lines) {
				$lines['invoiceHeaderID'] = $invoice_id;
				$this->db->insert('tblinvoicedetail', $lines);
			}
			return $invoice_id;
		}
		return false;
	}

    public function get_invoice_details($id)
	{
		$result = $this->db->query(
			"SELECT
                ih.invoice_number, 
                ih.invoice_date, 
                il.item_code, 
                il.unit_price, 
                im.unit_type, 
                im.item_name, 
                sku.sku_code, 
                sku.sku_name, 
                il.discount,
                il.qty,
                il.total_price
            FROM
                invoice_header AS ih
                INNER JOIN
                invoice_lines AS il
                ON 
                    ih.id = il.invoice_id
                INNER JOIN
                item_master AS im
                ON 
                    il.item_code = im.item_code
                INNER JOIN
                item_sku AS sku
                ON 
                    im.item_sku_id = sku.id
                WHERE ih.id=$id"
		);
		return $result;
	}

    public function get_vessel_details_for_invoice($id)
	{
		return $this->db->query("
						SELECT
							h.invoiceDate, 
							h.usageMonthStartDate, 
							h.usageMonthEndDate, 
							h.TotalAmtUSD, 
							h.ExchangeRate, 
							h.TotalAmtLKR, 
							h.invoiceNumber, 
							v.vesselName, 
							v.vesselNo, 
							o.ownerName, 
							o.addressHouse, 
							o.addressStreetName, 
							o.addressCity
						FROM
							tblinvoiceheader AS h
							INNER JOIN
							tblvessel AS v
							ON 
								h.vesselID = v.id
							INNER JOIN
							tblowner AS o
							ON 
								h.ownerID = o.id
						WHERE  h.id =$id
		");
	}

	public function get_vessel_details_for_invoice_detail($id)
	{
		return $this->db->query("
						SELECT
							d.noOfUnits, 
							s.dataType, 
							s.unitPrice, 
							d.Amount
						FROM
							tblinvoiceheader AS h
							INNER JOIN
							tblinvoicedetail AS d
							ON 
								h.id = d.invoiceHeaderID
							INNER JOIN
							tblsatellitemaster AS s
							ON 
								d.satMasterID = s.id
						WHERE  h.id =$id
		");
	}

    public function get_invoice_list(){
		return $this->db->query("
						SELECT
							tblinvoiceheader.id, 
							tblinvoiceheader.invoiceDate,
							tblinvoiceheader.usageMonthStartDate, 
							tblinvoiceheader.TotalAmtUSD, 
							tblinvoiceheader.ExchangeRate, 
							tblinvoiceheader.TotalAmtLKR, 
							tblvessel.vesselName, 
							tblowner.ownerName, 
							tblinvoiceheader.invoiceNumber
						FROM
							tblinvoiceheader
							INNER JOIN
							tblowner
							ON 
								tblinvoiceheader.ownerID = tblowner.id
							INNER JOIN
							tblvessel
							ON 
								tblinvoiceheader.vesselID = tblvessel.id
		");
	}

}