<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OfflineAccess
 *
 * @author FAIZAN ALI
 */
class static_pages extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function disclaimer(){
        $data['main_content']='disclaimer';
        $this->load->view('includes/template',$data);
    }
    
    function contact_us() {
        $data['main_content']='contact_us';
        $this->load->view('includes/template',$data);
    }
    
    function do_contact_us() {
        $name = $this->input->post('contact_name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $comments = $this->input->post('comments');
        $contents = "
          Name  : $name
          Phone : $phone
          E-mail: $email
          comment: $comments
        ";
        
        $to = CONTACT_US_EMAIL;
        $subject = 'Ecan.in | Contact us page';
        $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" ;
        mail($to,$subject,$contents,$headers);
    }
}

?>
