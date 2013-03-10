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
            $records = $this->db->get('member',$config['per_page'],$this->uri->segment(3))->result();
            $data['record']= $records;
            $this->load->view('includes/template',$data);
	}
        
        function make_employee($username,$isUser) {
            if($isUser){
                $data = array('user_type'=>EMPLOYEE_TYPE);
            }
            else{
                $data = array('user_type'=>END_USER_TYPE);
            }
            $this->db->where('username', $username);
            $this->db->update('member',$data);
        }
        
        function add_credits($username,$itemID) {
            $this->load->model('transaction');
            $this->load->model('member_model');
            $num_credits = $this->transaction->getNumberOfCredits($itemID);
            $updateQuery = $this->member_model->updateUserCredits($username,$num_credits);
            $this->updateAdminCredits($username, $itemID);
        }
       
        function search_user() {
            $this->load->model('member_model');
            $result = $this->member_model->searchUser();
            if($result) {
                $h = $result;
                    echo "<table class='table table-striped'>";
                    echo "<th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Credits</th>
                      <th>Type</th>
                      <th>Joined</th>
                      <th>Admin</th>";
    
                     echo "<tr id='$h->username'>
                        <td>$h->first_name</td>
                        <td>$h->last_name</td>
                        <td>$h->username</td>
                        <td>$h->email_address</td>
                        <td>$h->credits</td>
                        <td>";
                            if($h->user_type)
                                echo "Employee";
                            else
                                echo "End User";
                      echo "</td>
                            <td>$h->date_joined</td>
                            <td>
                              <a href='delete_user?id=$h->username' class='delete_employee' id='$h->username'>Delete</a> | ";
                                if($h->user_type == END_USER_TYPE){
                                    echo "<a href='make_employee/$h->username' class='confirm-employee' id='$h->username'>Make Employee</a> | ";
                                }
                                else {
                                    echo "<a href='make_employee/$h->username' class='remove-employee' id='$h->username'>Make End User</a> | ";
                                 }
                                echo "<a href='add_credits/$h->username' class='award-credits'>Credits</a>
                    </td>
               </tr>
                                        </table>";
            }
            else {
                echo "No User with this criteria exists";
            }
        }
        
        private function updateAdminCredits($toUser,$itemID) {
            $fromUser = $this->session->userdata('username');
            $data = array('to_user'=>$toUser,'from_user'=>$fromUser,'item_id'=>$itemID);
            $this->db->insert('admin_awarded_credits', $data); 
        } 
}