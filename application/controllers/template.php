<?php

/**
 * Description of template
 *
 * @author FAIZAN ALI
 */
class template extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function post_email(){
        $this->load->model('template_model');
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
        var_dump($var);
//        echo $this->template_model->selectTemplate($var);
    }
}

?>
