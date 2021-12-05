<?php
if ( !defined( 'BASEPATH' ) )exit( 'No direct script access allowed' );

class sleatra_email extends CI_Model {
	public

	function __construct() {
		parent::__construct();
		$this->load->model( 'user/mlogin' );
	}

	public

	function send_email( $message ) {
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com', 
			'smtp_port' => 465, //587
			'smtp_user' => '', 
			'smtp_pass' => '', 
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'newline' => "\r\n"
		);
		$data[ 'userName' ] = $message[ 'username' ];
		$data[ 'password' ] = $message[ 'password' ];
		$template = $this->load->view('template/new_user_welcome',$data,TRUE);
		$this->load->library( 'email', $config );
		$this->email->from( $message[ 'admin_email' ], 'Sleatra.com' );		
		$this->email->to( $message[ 'email' ] );
		$this->email->subject( 'Email Test' );
		$this->email->message($template);
		$this->email->send();
	}

}

?>