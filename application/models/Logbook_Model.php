<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logbook_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
        $this->load->model('generic_Model');
	}

    public function add_log($data)
	{
		if ($this->db->insert('tbllogbook', $data)) {
			return true;
		}
		return false;
	}

	public function add_death($data)
	{
		if ($this->db->insert('tbldeath', $data)) {
			return true;
		}
		return false;
	}
}