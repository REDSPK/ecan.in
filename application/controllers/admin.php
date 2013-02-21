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
        $this->load->library('pagination');
		$this->load->library('table');
		$config['base_url'] = base_url().'admin/admin_area';
		$config['total_rows'] = $this->db->get('member')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 20;

		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';

		$config['first_link'] = '&larr;First';
		$config['last_link'] = 'Last &rarr;';
		
		$this->pagination->initialize($config);
		
		$data['main_content']='admin_panal';
		$records = $this->db->get('member',$config['per_page'],$this->uri->segment(3));
		$tmpl = array ('table_open'  => '<table class="table table-bordered table-condensed table-hover">');
		$this->table->set_template($tmpl);
		$data['record']= $this->table->generate($records);
		$this->load->view('includes/template',$data);
	}
}