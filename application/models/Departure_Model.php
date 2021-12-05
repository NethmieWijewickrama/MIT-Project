<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Departure_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('generic_Model');
    }

    public function get_active_code()
	{
		$this->db->select("id");
		$this->db->from("tbldepartureheader");
		$this->db->limit(1);
		$this->db->order_by('id', "DESC");
		$result = $this->db->get();
		if ($result->num_rows() == 0)
			$rowcount = 0;
		else {
			$rowcount = $result->row()->id;
		}
		$rowcount++;
		$date = date('Y-m-d');
		$code = "VMS/$date/" . $rowcount;

		return $code;
	}

    public function save_departure($header, $line_records)
	{

		if ($this->db->insert('tbldepartureheader', $header)) {
			$id = $this->db->insert_id();

			foreach ($line_records as $lines) {
				$lines['departureHeaderID'] = $id;
				$this->db->insert('tbldeparturedetail', $lines);
			}
			return $id;
		}
		return false;
	}

    public function get_departure_print_header($id)
	{
		return $this->db->query("
								SELECT
									dh.activeCode, 
									dh.harbour, 
									v.vesselNo, 
									dh.departureDate, 
									dh.fishingGear, 
									f.nic, 
									f.fisheriesIDNo, 
									f.nameWithInitials
								FROM
									tbldepartureheader AS dh
									INNER JOIN
									tblvessel AS v
									ON 
										dh.vesselID = v.id
									INNER JOIN
									tbldeparturedetail AS dd
									ON 
										dh.id = dd.departureHeaderID
									INNER JOIN
									tblfishermen AS f
									ON 
										dh.skipperID = f.id
								WHERE dh.id=$id
		")->row();
	}

	public function get_departure_print_details($id)
	{
		return $this->db->query("
				SELECT
					tblfishermen.nameWithInitials, 
					tblfishermen.nic, 
					tblfishermen.fisheriesIDNo
				FROM
					tbldeparturedetail
					INNER JOIN
					tblfishermen
					ON 
						tbldeparturedetail.fishermenID = tblfishermen.id
				WHERE departureHeaderID= $id
		");
	}

}