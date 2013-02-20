<?php

/**
 * Description of template
 *
 * @author FAIZAN ALI
 */
class Template extends CI_Controller {
    
   function __construct() {
        parent::__construct();
    }
    
    public function post_email(){
        var_dump($_POST);
//        $this->load->model('template_model');
//        $var = array(
//		'assistance_type'    =>	$this->input->post('assistance_type'),
//		'subject'            =>	$this->input->post('subject'),
//		'loan_no'            =>	$this->input->post('loan_no'),
//		'client_name'        =>	$this->input->post('client_name'),
//		'date'		     =>	$this->input->post('date'),
//		'level'              =>	$this->input->post('level'),
//		'loan_type'          =>	$this->input->post('loan_type'),
//		'companies'          =>	$this->input->post('companies'),
//		'departments'        =>	$this->input->post('departments'),
//		'sections'           =>	$this->input->post('sections'),
//		'lack_of_contact'    =>	$this->input->post('lack_of_contact'),
//		'message_not_return' =>	$this->input->post('message_not_return'),
//		'manager_not_contact'=>	$this->input->post('manager_not_contact'),
//		'disagree'           =>	$this->input->post('disagree'),
//		'inaccurate'         =>	$this->input->post('inaccurate'),
//		'comment'            =>	$this->input->post('comment')
//        );
//        //var_dump($var);
//        $is_logged_in=$this->session->userdata('is_logged_in');
//        $username=$this->session->userdata('username');
//        if(!isset($is_logged_in) || $is_logged_in!=true)
//        {
//            $data['message'] = 'you dont have permission to this Area.';
//            $data['main_content']='mail_error';
//            $this->load->view('includes/template',$data);
//        }
//        else
//        {
//            $contacts =$this->template_model->get_contacts($this->input->post('limit'));
//            echo "logged in user is ".$username;
//
//            $this->load->model('member_model');
//            $this->load->model('template_model');
//            $name=$this->member_model->get_member_name($username);
//            $signature=$this->member_model->get_signature($username);
//            foreach ($contacts as $key => $contact) 
//            {
//                /*template*/
//                $template=$this->template_model->selectTemplate($contact,$name,$signature);
//
//                echo "<h3>mail to " .$contact['name']." his email: ". $contact['email']."</h3><br>";
//
//                $subject ="SALE DATE: ".$this->input->post('date')." - ".$this->input->post('subject')." - LN#:".$this->input->post('loan_no')."-".$this->input->post('client_name');
//                echo $subject."<br>";
//
//                /*--save_history for admin*/
//                $history = array(
//                'template' =>$template,
//                'subject' =>$subject,
//                'username' =>$username);
//                $this->template_model->save_history($history);
//                print_r($template);
//            }
//        }
    }
}

?>
