<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Vessel_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('generic_Model');
	}

 	public function add_vessel($data)
	{
		//IMUL-A-0140NBO
		$vesselNo = $this->generic_Model->generate_vessel_number('tblvessel',$data["districtOffice"], 'IMUL-A-0');

		$data["vesselNo"] = $vesselNo;

		if ($this->db->insert('tblvessel', $data)) {

			$transfers = array(
				"transponderID"=>$data["transponderID"],
				"vesselID"=>$this->db->insert_id(),
				"jobDate"=>$data["registrationDate"]
			);

			$this->db->insert('tbltranspondertransfer', $transfers);
			return true;
		}
		return false;
	}

    public function get_vessel_list()
	{
		return $this->db->query("
								SELECT
									tblvessel.*, 
									tblyard.yardName, 
									tblyard.location, 
									tblowner.ownerName
								FROM
									tblyard
									INNER JOIN
									tblvessel
									ON 
										tblyard.id = tblvessel.yardID
									INNER JOIN
									tblowner
									ON 
										tblvessel.ownerID = tblowner.id
		");
	}

}