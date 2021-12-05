<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Owner_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('generic_Model');
	}

    public function add_owner($data)
	{

		if ($this->db->insert('tblowner', $data)) {
			return true;
		}

		return false;
	}
}