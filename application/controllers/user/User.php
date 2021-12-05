<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/muser');
        $this->load->model('mloging');
		$this->load->model('user/mlogin');

		if (is_login() == '') {
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$login_info = array(
				'last_url'  => $actual_link);
			$this->session->set_userdata($login_info);
			redirect(base_url());
		}
    }

    public function index()
    {
        $object['title'] = "DFAR | User Management";
		$this->load->view('header',$object);
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Administration";
		$object['active_tab'] = "user_list";        
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');


		if ($this->mloging->get_permission(SYS_USER_LIST_VIWE)) {

            $data['user_list'] = $this->muser->get_sys_user_list();
            $data['msg'] = "";
			$data['class_alert'] = "alert-success";
            $data['user_group'] = $this->muser->get_sys_user_user_group();
            $this->load->view('user/sys_user',$data);

        } else {
            $this->load->view('no_permission');
        }
        $this->load->view('footer');
    }

    public function add_new_sys_user_page()
    {
        $object['title'] = "DFAR | User Management";
		$this->load->view('header',$object);
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_tab'] = "user_list";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');

        if ($this->mloging->get_permission(SYS_USER_ADD_NEW_PAGE)) {
            $data['msg'] = "";
            

            if ($this->input->post() != null && sizeof($this->input->post()) > 0) {
                $post_data = $this->input->post();
                $password = $this->input->post('password');
                $post_data['password'] = md5($this->input->post('password'));

                if ($this->inner_check_valide_username($post_data['username']) == 1) {
                    $data['msg'] = "Username Already Exists...!";
                    $data['class_alert'] = "alert-danger";
                    $data['user_list'] = $this->muser->get_sys_user_list();
                } else {
                    if ($this->muser->addnew_sys_user($post_data)) {
                        $data['msg'] = "User (" . $post_data['name'] . ") Successfully Registered";
                        $data['class_alert'] = "alert-success";
						$data['user_list'] = $this->muser->get_sys_user_list();
                        // $post_data['admin_email']  = $this->session->userdata('email');
                        // $post_data['password']  = $password;
                        // $this->sleatra_email->send_email($post_data);
                    }
                }
            }

            $data['user_group'] = $this->muser->get_sys_user_user_group();
            $this->load->view('user/sys_user', $data);

        } else {
            $this->load->view('no_permission');
        }
        $this->load->view('footer');
    }

    public function check_valide_username()
    {
        $username_input_text = $this->input->get_post('username_input_text');
			echo $this->muser->check_valide_username($username_input_text);
    }

    public function inner_check_valide_username($username_text)
    {
        return $this->muser->check_valide_username($username_text);
    }

    public function edit_user()
    {
        $object['title'] = "DFAR | User Management";
        $this->load->view('header',$object);
		//$this->load->view('header');
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_tab'] = "user_list";
		$object['active_main_tab'] = "Administration";        
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');

//		var_dump($this->input->post());
//		die();


		if ($this->mloging->get_permission(SYS_USER_EDIT)) {
            $edit_user_id = base64_decode($this->input->get_post('user_id'));
            $data['msg'] = "";

//			var_dump(sizeof($this->input->post()));
//			die();

            if ($this->input->post() != null && sizeof($this->input->post()) > 0) {
                $post_data = $this->input->post();
                if ($this->muser->update_sys_user($post_data, $edit_user_id)) {
                    $link = "<a href=" . base_url() . "user/user>   Click to User List</a>";

                    $data['msg'] = "User (" . $post_data['name'] . ") Successfully Updated " . $link . "";
                    $data['class_alert'] = "alert-success";
                }
            }

            $data['user_info'] = $this->muser->get_edit_user($edit_user_id);

            if ($data['user_info']->num_rows() <= 0) {
                $data['msg'] = "User Does not exist....!";
                $data['class_alert'] = "alert-danger";
            }



            $data['user_group'] = $this->muser->get_sys_user_user_group();
            $this->load->view('user/sys_user_edit', $data);

        } else {
            $this->load->view('no_permission');
        }
        $this->load->view('footer');
    }

    public function user_group_list()
    {
        $object['title'] = "DFAR | User Management";
		$this->load->view('header',$object);
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Administration";
		$object['active_tab'] = "group_list";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');

        if ($this->mloging->get_permission(SYS_USER_GROUP)) {

            if ($this->input->get_post('msge') != null) {
                $group_data['message'] = "User Group successfully Added";
            } else {
                $group_data['message'] = "";
            }

            $group_data['user_groups'] = $this->muser->get_all_order("vw_user_count_group", "user_group");
            $this->load->view('user/sys_user_group', $group_data);
        } else {
            $this->load->view('no_permission');
        }
        $this->load->view('footer');
    }

    public function user_group()
    {
        $object['title'] = "DFAR | User Management";
		$this->load->view('header',$object);
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_main_tab'] = "Administration";
		$object['active_tab'] = "group_list";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');

        if ($this->mloging->get_permission(SYS_USER_GROUP_SET_PERMISSION)) {
            $edit_usergroup_id = base64_decode($this->input->get_post('group_id'));

            if ($this->input->get_post('msg') != null) {
                $new_data['message'] = "Permission successfully updated";
            } else {
                $new_data['message'] = "";
            }

            $new_data['user_group_name'] = $this->muser->get_where("user_group,user_group_id", "sys_user_group", "user_group_id", $edit_usergroup_id);
            $new_data['query_parent'] = $this->muser->get_where("module, module_id, parent_module_id", "sys_module", "parent_module_id", "0");
            $new_data['query_module'] = $this->muser->get_all("sys_module");
            $new_data['query_check'] = $this->muser->get_where("module, module_id", "vw_user_group_module", "user_group_id", $edit_usergroup_id);

            $this->load->view('user/user_group', $new_data);

        } else {
            $this->load->view('no_permission');
        }
        $this->load->view('footer');
    }

    public function save_user_group()
    {
        if ($this->mloging->get_permission(SYS_USER_GROUP_SET_PERMISSION_SAVE)) {
            $group_id = $_GET['edit'];
            $group_name = $_POST['user_group_name'];
            //$prev_group_name = $_POST['prev_group_name'];

            $group_data['user_group'] = $group_name;

            $group_data['sys_user_group_id'] = $group_id;
            $group_data['user_group_id'] = $group_id;

            $query = $this->muser->get_where("user_group", "sys_user_group", "user_group", $group_data['user_group']);
            if ($query->num_rows() >= 1) {
                //$this->muser->delete_where("sys_user_group_module", "user_group_id", $group_id);
                //$this->muser->update("user_group_id", $group_id, "sys_user_group", $group_data);
                $this->muser->delete_where("sys_user_group_module", "user_group_id", $group_id);
                // $this->muser->update("user_group_id", $group_id, "sys_user_group", $group_data);
            }

            $checked_modules = array_keys($_POST, 'on');
            foreach ($checked_modules as $module_id) {
                $group_module_data['module_id'] = $module_id;
                $group_module_data['user_group_id'] = $group_id;
                $this->muser->insert("sys_user_group_module", $group_module_data);
            }

            // Explicit permission for the dashboard:
            $dashboard_query = $this->muser->get_where_2("*", "sys_user_group_module", "user_group_id", $group_id, "module_id", "6");
            if ($dashboard_query->num_rows() == 0) {
                $dash_data['module_id'] = 6;
                $dash_data['user_group_id'] = $group_id;
                $this->muser->insert("sys_user_group_module", $dash_data);
            }

            Redirect(base_url() . 'user/user/user_group?group_id=' . base64_encode($group_id) . "&msg=1", false);
        } else {
            $object['title'] = "DFAR | User Management";
            $this->load->view('header',$object);
            $this->load->view('top_header');
            $object['controller'] = $this;
			$object['permission_list'] = $this->mlogin->get_all_permission_models();
            $object['active_tab'] = "user_group";
            $this->load->view('top_menu',$object);
            $this->load->view('no_permission');
            $this->load->view('footer');
        }
    }

    public function add_new_group()
    {
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_tab'] = "user_group";
        $object['title'] = "DFAR | User Management";
		$this->load->view('header',$object);
		$this->load->view('top_header');
		$this->load->view('side_menu');

        if ($this->mloging->get_permission(SYS_USER_GROUP_ADD)) {
            if ($this->input->post() != null && sizeof($this->input->post()) > 0) {
                $post_data = $this->input->post();
                $post_data['sys_user_group_id'] = 0;
                $post_data['company_id'] = 0;
                //    $post_data['const']="";
                $this->muser->add_new_group($post_data);

                Redirect(base_url() . 'user/user/user_group_list?msge=1', false);
            }

            $this->load->view('user/new_user_group');

        } else {
            $this->load->view('no_permission');
        }
        $this->load->view('footer');
    }

    public function view_user_details()
    {
        $user_id = base64_decode($this->input->get('id'));
        $object['title'] = "DFAR | User Management";
        $this->load->view('header',$object);
        $this->load->view('top_header');
        $object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
        $object['active_tab'] = "user_list";
        $this->load->view('top_menu',$object);
        $data['user_details'] = $this->muser->get_user_details($user_id)[0];
        $this->load->view('user/view_user', $data);
        $this->load->view('footer');
    }


    public function check_add_user_permission(){
        // $module = $this->input->get_post('module');

        if ($this->mloging->get_permission( SYS_USER_GROUP_ADD)) {
            echo true;
        }
        else {
            echo false;
        }
    }


    public function no_permission(){

        $object['title'] = "DFAR | User Management";
		$this->load->view('header');
		$object['controller'] = $this;
		$object['permission_list'] = $this->mlogin->get_all_permission_models();
		$object['active_tab'] = "no_permission";
		$this->load->view('top_header',$object);
		$this->load->view('side_menu');
		$this->load->view('no_permission');
        $this->load->view('footer');
    }

}
