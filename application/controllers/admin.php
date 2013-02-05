<?php
/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->is_logeed_in();
	}
	function is_logeed_in(){
		$is_logged_in=$this->session->userdata('is_logged_in');
		$admin=$this->session->userdata('admin');
		if(!isset($is_logged_in) || $is_logged_in!=true || $admin==False){
			$data['message'] = 'you dont have permission to this Area.';
		    $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
		}
	}
	function admin_area()
	{
			$data['main_content']='admin_panal';
            $this->load->view('includes/template',$data);
	}
}