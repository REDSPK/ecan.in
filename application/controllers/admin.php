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
            $is_logged_in = $this->session->userdata('is_logged_in');
            $admin = $this->session->userdata('admin');
            $employee = $this->session->userdata('employee');
            
            if(!isset($is_logged_in) || $is_logged_in != true || ($admin == False && $employee == False)){
                $data['message'] = 'you dont have permission to this Area.';
                $data['main_content']='mail_error';
                $this->load->view('includes/template',$data);
            }
	}
	function admin_area()
	{
            $this->load->library('pagination');
            $this->load->model('member_model');
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
            $delete_requested = $this->member_model->get_delete_requests();
            $records = $this->db->select('*')->from('member')->order_by('last_name','asc')->limit($config['per_page'],$this->uri->segment(3))->get()->result();
            $data['record']= $records;
            $data['delete_requests'] = $delete_requested;
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
        
        function add_credits($username,$itemID,$comments) {
            $this->load->model('transaction');
            $this->load->model('member_model');
            $num_credits = $this->transaction->getNumberOfCredits($itemID);
            $updateQuery = $this->member_model->updateUserCredits($username,$num_credits);
            $this->updateAdminCredits($username, $itemID,$comments);
        }
       
        function search_user() {
            $this->load->model('member_model');
            $deleteRequests = $this->member_model->get_delete_requests(true);
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
                            <td>";
                        if($this->session->userdata(USERNAME) != $h->username) {
                              if(!in_array($h->username,$deleteRequests)){
                                echo "<a href='delete_user?id=$h->username' class='delete_employee' id='$h->username'>Delete</a> | ";
                              }
                              else if (in_array($h->username,$delete_requests)) {
                                  echo "<i>Delete Requested</i> | ";
                              }
                        }
                        if ($this->session->userdata('employee')) {
                            if($h->username == $this->session->userdata('username')){
                              echo "<a href='add_credits/$h->username' class='award-credits'>Award Credits</a>";
                            }
                        }
                        else if($this->session->userdata('admin')) {
                            if($h->user_type == END_USER_TYPE) {
                                echo "<a href='make_employee/$h->username' class='confirm-employee' id='$h->username'>Make Employee</a> | ";
                            }
                            else {
                                echo "<a href='make_employee/$h->username' class='remove-employee' id='$h->username'>Make End User</a> | ";
                            }
                        echo "<a href='add_credits/$h->username' class='award-credits'>Credits</a>";
                    }
                   echo "
                    </td>
               </tr>
                                        </table>";
            }
            else {
                echo "No User with this criteria exists";
            }
        }
        
        private function updateAdminCredits($toUser,$itemID,$comments) {
            $fromUser = $this->session->userdata('username');
            $data = array('to_user'=>$toUser,'from_user'=>$fromUser,'item_id'=>$itemID);
            $this->db->insert('admin_awarded_credits', $data);
            $this->load->model('member_model');
            $this->member_model->sendCreditsAwardedEmail($toUser,$itemID);
        } 
        
        function user_history($username) {
            $this->load->model('form_model');
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = base_url().'admin/user_history/'.$username;
            
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['full_tag_open'] = '<div id="pagination">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = '&larr;First';
            $config['last_link'] = 'Last &rarr;';
            $data['company_name']=$this->form_model->get_companies_name();
            
            
            $config['total_rows'] = $this->form_model->my_history_rows($this->uri->segment(3));
            $data['total_rows'] = $config['total_rows'];
            $records = $this->form_model->my_history_details($this->uri->segment(3),$this->uri->segment(4),$config['per_page']);
            $data['history'] = $records;
            $this->pagination->initialize($config);
            $data['main_content']='user_history_adminlink';
            $this->load->view('includes/template',$data);
    }
    
    function delete_user(){
        $username = $this->input->get('id');
        if($this->session->userdata(ADMIN)) {
            $this->db->delete(MEMBER_TABLE, array(USERNAME => $username));
        }
        else if ($this->session->userdata(EMPLOYEE)){
            $data = new stdClass();
            $data->user_requested = $username;
            $data->requested_by = $this->session->userdata(USERNAME);
            $this->db->insert(EMPLOYEE_DELETE_TABLE, $data); 
        }else {
            return;
        }
    }
    
    function review_delete_requests() {
        $this->load->model('member_model');
        $data['requests'] = $this->member_model->get_delete_requests(true);
        $data['main_content']='admin_delete_requests';
        $this->load->view('includes/template',$data);
    }
    function delete_action(){
        $username = $this->input->get('user');
        $confirmDelete = $this->input->get('delete');
        if($confirmDelete){
            $this->db->delete(MEMBER_TABLE,array('username'=>$username));
        }
        $this->db->delete(EMPLOYEE_DELETE_TABLE,array('user_requested'=>$username));
        echo "here";
    }
    
}