<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Colombo");
class Mloging extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }

	public function login($username='',$password='')
	{
		if($username=='') return false;
		if($password=='') return false;
		
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('status_id', 1);	
		$this->db->from('sys_user');	
		$query = $this->db->get();

		if ($query->num_rows() == 1){
		   $row = $query->row();
		
		 if($row->password==md5($password)){
		   date_default_timezone_set('Asia/Colombo');
			   $login_info = array(
				   'user_id'  => $row->user_id,	
				   'user_group_id'  => $row->user_group_id,
				   'email' =>$row->email,
				   'name'=>$row->name,                              
				   'login' => TRUE
				);
			   
			   $this->session->set_userdata($login_info);
			   
			    $data = array(
				   'timestamp' => date("m/d/Y g:i:s A") ,
				   'user_id' => $row->user_id ,
				   'ip' => $this->input->ip_address()
				);

				$this->db->insert('sys_user_login_history', $data); 
				
				return true;
			 }else{
				return false;	
			 }
		 }else{
			return false;	
		}
	}
	
	public function get_permission($module_id=0)
	{
		
		$user_group_id = $this->session->userdata('user_group_id');
		
		$this->db->select('*');
		$this->db->where('user_group_id',$user_group_id);
		$this->db->where('module_id',$module_id);	
		$this->db->from('sys_user_group_module');	
		$query = $this->db->get();

		if ($query->num_rows() == 1)
			return true;
		else
			return false;
	}
}