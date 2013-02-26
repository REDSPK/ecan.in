<?php

/**
 * Description of template
 *
 * @author FAIZAN ALI
 */
class Template extends CI_Controller {
   function __construct() {
        parent::__construct();
        $this->is_logeed_in();
    }
   function is_logeed_in(){
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in!=true){
			$data['message'] = 'you dont have permission to this Area.';
		    $data['main_content']='mail_error';
            $this->load->view('includes/template',$data);
		}
	}
    public function post_email(){
        $this->load->model('template_model');
       
        $loan_no = $this->input->post('loan_no');
        $date =	$this->input->post('date');
        $limit = $this->input->post('num_of_mails');
        $subject="";
        $username = $this->session->userdata('username');
        $this->load->model('member_model');
        $this->load->model('template_model');
        $name=$this->member_model->get_member_name($username);
        $signature=$this->member_model->get_signature($username);
        $contacts = $this->template_model->get_contacts_new($limit);
        
        if($contacts) {
            foreach ($contacts as $contact) 
            {
                $template=$this->template_model->selectTemplate($contact,$name,$signature);
                echo "<h3>mail to " .$contact['name']." his email: ". $contact['email']."</h3><br>";
                $subject ="SALE DATE: ".$this->input->post('date')." - ".$this->input->post('subject')." - LN#:".$this->input->post('loan_no')."-".$this->input->post('client_name');
                echo $subject."<br>";
                /*--save_history for admin*/
                $element = array(
                'template' => $template,
                'subject' => $subject,
                'username' => $username,
                'receiver_id' => $contact['id']);
                $this->template_model->save_history($element);
                print_r($template);
            }
        }
        else {
            echo "No Contacts With this criteria found";
        }
    }
}

?>
