<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Fishermen_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('generic_Model');
	}

//fishermen data insert function	
    public function add_fishermen($data)
	{

		$fisheriesIDNo = $this->generic_Model->generate_number('tblfishermen', 'FI', $data["districtOffice"]);

		$data["fisheriesIDNo"] = $fisheriesIDNo;

		$dependent1 =
			array(
				"Name" => $data["d1name"],
				"NIC" => $data["d1nic"],
				"Relationship" => $data["d1relationship"],
				"contactNo" => $data["d1tp"],
				"row" => 1,
			);
		$dependent2 = array(
			"Name" => $data["d2name"],
			"NIC" => $data["d2nic"],
			"Relationship" => $data["d2relationship"],
			"contactNo" => $data["d2tp"],
			"row" => 2,
		);

		unset($data["d1name"]);
		unset($data["d1nic"]);
		unset($data["d1relationship"]);
		unset($data["d1tp"]);
		unset($data["d2name"]);
		unset($data["d2nic"]);
		unset($data["d2relationship"]);
		unset($data["d2tp"]);

		if ($this->db->insert('tblfishermen', $data)) {

			$last_id = $this->db->insert_id();
			$dependent1["fishermenID"] = $last_id;
			$dependent2["fishermenID"] = $last_id;
			$this->db->insert('tbldependent', $dependent1);
			$this->db->insert('tbldependent', $dependent2);

			return true;
		}

		return false;
	}

	public function edit_fishermen($data,$id)
	{

		$dependent1 =
			array(
				"Name" => $data["d1name"],
				"NIC" => $data["d1nic"],
				"Relationship" => $data["d1relationship"],
				"contactNo" => $data["d1tp"],
				"row" => 1,
			);
		$dependent2 = array(
			"Name" => $data["d2name"],
			"NIC" => $data["d2nic"],
			"Relationship" => $data["d2relationship"],
			"contactNo" => $data["d2tp"],
			"row" => 2,
		);

		unset($data["d1name"]);
		unset($data["d1nic"]);
		unset($data["d1relationship"]);
		unset($data["d1tp"]);
		unset($data["d2name"]);
		unset($data["d2nic"]);
		unset($data["d2relationship"]);
		unset($data["d2tp"]);

		if($this->generic_Model->update_where($data,$id,'tblfishermen')) {

			$this->db->set($dependent1);
			$this->db->where('fishermenID', $id);
			$this->db->where('row', 1);
			$this->db->update("tbldependent");

			$this->db->set($dependent2);
			$this->db->where('fishermenID', $id);
			$this->db->where('row', 2);
			$this->db->update("tbldependent");

			return true;
		}

		return false;
	}

}