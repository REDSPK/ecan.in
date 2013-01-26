<?php
/**
* 
*/
class Site extends CI_Controller
{
	function __construct() {
            parent::__construct();
            $this->is_logeed_in();
    }
	function member_area()
	{
		$this->load->model('form_model');
		$data['loan_type']=$this->form_model->get_loan_types();
		$data['level']=$this->form_model->get_level();
                $data['company'] = $this->form_model->getCompanies();
		$data['main_content']='member_area';
		$this->load->view('includes/template',$data);
	}
	function is_logeed_in(){
            $is_logged_in=$this->session->userdata('is_logged_in');
            if(!isset($is_logged_in) || $is_logged_in!=true){
                    echo 'you dont have permission to this Area. <a href="../login">Login</a>';
                    die();
		}
	}
}
?>