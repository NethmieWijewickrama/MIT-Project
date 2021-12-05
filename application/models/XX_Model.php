<?php

defined('BASEPATH') or exit('No direct script access allowed');

class XX_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('generic_Model');
	}

    public function add_xx($data)
	{
        /*
        $data = array(
        'title' => 'My title',
        'name' => 'My Name',
        'date' => 'My date'
        );

        $this->db->insert('mytable', $data);
        // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date') */
        /*
        $data = array(
            'xxType' =>'xt',
            'xxName' => 'xna',
            'xxNo' => 'xn'
        );
        $this->db->insert('tblxx',$data);*/

        
		if ($this->db->insert('tblxx', $data)) {
			return true;
		}

		return false;
     
	}

    public function update_xx($post_data, $xxID, $table)
	{
		$this->db->set($post_data);
		$this->db->where('xxID', $xxID);
		$this->db->update($table);

		return true;
	}

    public function get_all_by_idxx($table, $xxID)
	{
		$result = $this->db
			->select("*")
			->from($table)
			->where('xxID', $xxID)
			->get();

		return $result;
	}

}