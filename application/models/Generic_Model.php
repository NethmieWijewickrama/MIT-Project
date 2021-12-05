<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Generic_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function query($query)
	{
		return $this->db->query($query);
	}

	public function get_all($table)
	{
		return $this->db->select('*')->from($table)->get();
	}

	public function get_all_where($table, $where)
	{
		return $this->db->select('*')->from($table)->where($where)->get();
	}

	public function get_count($table)
	{
		return $this->db->select('*')->from($table)->get()->num_rows();
	}

	public function get_all_order_by($table)
	{
		return $this->db->select('*')->from($table)->order_by('id','DESC')->get();
	}

	public function update_where($post_data, $id, $table)
	{
		$this->db->set($post_data);
		$this->db->where('id', $id);
		$this->db->update($table);

		return true;
	}

	public function generate_number($table, $role, $prefix)
	{
		$this->db->select("id");
		$this->db->from($table);
		$this->db->limit(1);
		$this->db->order_by('id', "DESC");
		$result = $this->db->get();
		if ($result->num_rows() == 0)
			$rowcount = 0;
		else {
			$rowcount = $result->row()->id;
		}
		$rowcount++;
		$group_number = "$role/$prefix/" . $rowcount;

		return $group_number;
	}

	public function generate_vessel_number($table, $role, $prefix)
	{
		$this->db->select("id");
		$this->db->from($table);
		$this->db->limit(1);
		$this->db->order_by('id', "DESC");
		$result = $this->db->get();
		if ($result->num_rows() == 0)
			$rowcount = 0;
		else {
			$rowcount = $result->row()->id;
		}
		$rowcount++;
		$group_number = "$prefix" . $rowcount.$role;

		return $group_number;
	}

	public function get_all_by_id($table, $id)
	{
		$result = $this->db
			->select("*")
			->from($table)
			->where('id', $id)
			->get();

		return $result;
	}

	public function annual_log_report($from,$to)
	{
		if($from==''){
			$from="2020-01-01";
		}
		if($to==''){
			$to="2100-01-01";
		}
		return $this->db->query("
						SELECT
							tblvessel.vesselNo, 
							tblvessel.vesselName, 
							tbllogbook.id, 
							tbllogbook.dateTime, 
							tbllogbook.description, 
							tbllogbook.latitude, 
							tbllogbook.longitude
						FROM
							tbllogbook
							INNER JOIN
							tblvessel
							ON 
								tbllogbook.vesselID = tblvessel.id
						WHERE dateTime BETWEEN '$from' AND '$to'
		");
	}

	public function get_all_XX($table)
	{
		return $this->db->select('*')->from($table)->order_by('xxID','desc')->get();

		/*$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('xxID', 'desc');
		$query = $this->db->get();
		return $query->result();*/


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
