<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

date_default_timezone_set("Asia/Colombo");

class Muser extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_sys_user_list()
    {
        $this->db->select('sys_user.user_id,sys_user.username,sys_user_group.user_group,sys_user.name,sys_user.email,sys_user.status_id');
        $this->db->from('sys_user');
        $this->db->join('sys_user_group', 'sys_user_group.user_group_id = sys_user.user_group_id');
        return $this->db->get();

    }


    public function get_sys_user_user_group()
    {
        $this->db->select('*');
        $this->db->from('sys_user_group');
        return $this->db->get();
    }
    public function check_valide_username($username_input_text)
    {
        $this->db->select('username');
        $this->db->from('sys_user');
        $this->db->where('username', $username_input_text);

        if ($this->db->get()->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }

    }
    public function addnew_sys_user($post_data)
    {
        if ($this->db->insert('sys_user', $post_data)) {
            return true;
        } else {
            return false;
        }

    }
    public function get_edit_user($edit_user_id)
    {
        $this->db->select('*');
        $this->db->from('sys_user');
        $this->db->where('user_id', $edit_user_id);
        $query = $this->db->get();
        return $query;
    }

    public function update_sys_user($post_data, $edit_user_id)
    {
        $post_data['password'] = md5($post_data['password']);
        $this->db->where('user_id', $edit_user_id);
        $this->db->update('sys_user', $post_data);
        return $this->db->last_query();

        return true;
    }

        public function add_new_group($post_data)
    {
        $this->db->insert('sys_user_group', $post_data);
        $insert_id = $this->db->insert_id();
        $this->db->set('sys_user_group_id', $insert_id);
        $this->db->where('user_group_id', $insert_id);
        $this->db->update('sys_user_group');

    }
    /*
    public function get_user_list()
    {
        $this->db->select('*,0 AS user_details');
        $this->db->from('sys_user');
        $this->db->where('user_group_id', HOTEL_ADMIN);
        $query = $this->db->get()->result();
        foreach ($query as $user) {
            $user->user_details = $this->get_user_summery($user->user_id)[0];
        }
        return $query;
    }*/

	public function query($query)
	{
		return $this->db->query($query);
	}



    public function get_all_order($table, $order)
    {
        $this->db->order_by($order);
        return $this->db->get($table);

    }
    public function get_where($column, $table, $common, $id)
    {
        $this->db->select($column);
        $this->db->from($table);
        $this->db->where($common, $id);
        return $this->db->get();
    }
    public function get_all($table)
    {
        return $this->db->get($table);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function get_where_2($column, $table, $common, $id, $common_2, $id_2)
    {
        $this->db->select($column);
        $this->db->from($table);
        $this->db->where($common, $id);
        $this->db->where($common_2, $id_2);
        return $this->db->get();
    }
    public function delete_where($table, $column, $value)
    {
        $this->db->where($column, $value);
        $this->db->delete($table);
    }
    public function update($column, $id, $table, $data)
    {
        $this->db->where($column, $id);
        $this->db->update($table, $data);
    }


}
