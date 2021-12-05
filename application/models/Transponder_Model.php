<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Transponder_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('generic_Model');
	}

    public function add_tranponder($data)
	{
		if ($this->db->insert('tbltransponder', $data)) {
			return true;
		}
		return false;
	}

    public function add_transponder($data)
	{
		if ($this->db->insert('tbltranspondertransfer', $data)) {
			return true;
		}
		return false;
	}

    public function get_transfer_list()
	{
		return $this->db->query("
									SELECT
										tbltransponder.VMS, 
										tbltransponder.VMS, 
										tblvessel.vesselName, 
										tblvessel.vesselNo, 
										tbltranspondertransfer.id, 
										tbltranspondertransfer.jobDate, 
										tbltranspondertransfer.uninstallDate, 
										tbltranspondertransfer.jobStatus
									FROM
										tbltranspondertransfer
										INNER JOIN
										tbltransponder
										ON 
											tbltranspondertransfer.transponderID = tbltransponder.id
										INNER JOIN
										tblvessel
										ON 
											tbltranspondertransfer.vesselID = tblvessel.id
		");
	}

} 