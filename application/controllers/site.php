<?php
/**
* 
*/
require_once('csv.php');
class Site extends CI_Controller
{
	var $member;
	function __construct() {
        parent::__construct();
        $this->is_logeed_in();
    }
	function member_area()
	{
		$member= new CSV();
		$member->new_members_page();
		//$this->load->('form_model');
		/*$data['loan_type']=$this->form_model->get_loan_types();
		$data['level']=$this->form_model->get_level();
		$data['companies']=$this->form_model->get_companies();
		$data['departments']=$this->form_model->get_departments();
		$data['sections']=$this->form_model->get_sections();
		$data['main_content']='member_area';
		$this->load->view('includes/template',$data);*/
	}
	function is_logeed_in(){
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in!=true){
			$data['message'] = 'you dont have permission to this Area.';
		    $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
		}
	}
	function form_values(){
		$var = array(
		'assistance_type'    =>	$this->input->post('assistance_type'),
		'subject'            =>	$this->input->post('subject'),
		'loan_no'            =>	$this->input->post('loan_no'),
		'client_name'        =>	$this->input->post('client_name'),
		'date'		         =>	$this->input->post('date'),
		'level'              =>	$this->input->post('level'),
		'loan_type'          =>	$this->input->post('loan_type'),
		'companies'          =>	$this->input->post('companies'),
		'departments'        =>	$this->input->post('departments'),
		'sections'           =>	$this->input->post('sections'),
		'lack_of_contact'    =>	$this->input->post('lack_of_contact'),
		'message_not_return' =>	$this->input->post('message_not_return'),
		'manager_not_contact'=>	$this->input->post('manager_not_contact'),
		'disagree'           =>	$this->input->post('disagree'),
		'inaccurate'         =>	$this->input->post('inaccurate'),
		'comment'            =>	$this->input->post('comment')
		);
	}
	function history_detail() {
		$this->load->model('form_model');
		if($this->session->userdata('admin')){
			 	$this->load->library('pagination');
				$this->load->library('table');
				$config['base_url'] = base_url().'site/history_detail';
				$config['total_rows'] = $this->db->get('history')->num_rows();
				$config['per_page'] = 5;
				$config['uri_segment'] = 3;
				$config['num_links'] = 20;

				$config['full_tag_open'] = '<div id="pagination">';
				$config['full_tag_close'] = '</div>';

				$config['first_link'] = '&larr;First';
				$config['last_link'] = 'Last &rarr;';
				
				$this->pagination->initialize($config);
				
				$data['main_content']='admin_history_page';
				$records = $this->db->get('history',$config['per_page'],$this->uri->segment(3));
				$tmpl = array ('table_open'  => '<table class="table table-bordered table-condensed table-hover">');
				$this->table->set_template($tmpl);
				$data['record']= $this->table->generate($records);
				$this->load->view('includes/template',$data);

			//$data['history']=$this->form_model->admin_history_details();
		}
		else
		{
			$data['history']=$this->form_model->my_history_details($this->session->userdata('username'));
			$data['main_content']='history_page';
			$this->load->view('includes/template',$data);
		}
	}
}
?>