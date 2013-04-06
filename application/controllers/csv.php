<?php
class CSV extends CI_Controller
{
    var $escalationToCompanyHash;
    var $departmentsHash;
    var $loanTypeHash;
    var $sectionsHash;
    var $escalationToIDHash;
    var $companiesToIDHash;
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('contacts_model');
        
        $this->escalationToCompanyHash = $this->contacts_model->getEscalationsToCompanyIdArray();
        $this->companiesToIDHash = $this->contacts_model->getCompaniesTypeToIdArray();
        $this->escalationToIDHash = $this->contacts_model->getEscalationToIdArray();
        $this->departmentsHash = $this->contacts_model->getDepartmentToidArray();
        $this->loanTypeHash = $this->contacts_model->getLoanTypeToIdHash();
        $this->sectionsHash = $this->contacts_model->getSectionsToIdHash();
        $this->lienToIDHash = $this->contacts_model->getLienPositionToIdHash();
    }
    
    function upload_csv(){
        $data['main_content']='uploadCSV';
        $this->load->view('includes/template',$data);
        
    }
    
    function do_upload_csv() {
        if ($_FILES['csv_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['csv_file']['tmp_name'])) { //checks that file is uploaded
            $csv = array_map("str_getcsv", file($_FILES['csv_file']['tmp_name'],FILE_SKIP_EMPTY_LINES));
            $keys = array_shift($csv);
            foreach ($csv as $i=>$row) {
                $csv[$i] = array_combine($keys, $row);
            }
            foreach ($csv as $contact) {
                $data = array();
                $data['first_name'] = $contact['First Name'];
                $data['middle_name'] = $contact['Middle Name'];
                $data['suffix'] = $contact['Suffix'];
                $data['last_name'] = $contact['Last Name'];
                $data['job_title'] = $contact['Job Title'];
                $data['email'] = $contact['E-mail Address'];
                $data['escalation_level_id'] = $this->getEscalationLevelID(trim($contact['Level']));
                $data['section_id'] = $this->getSectionID(trim($contact['Section']));
                $data['loan_type_id'] = $this->getLoanTypeID(trim($contact['Loan Type']));
                $data['departmend_id'] = $this->getDepartmentID(trim($contact['Department']));
                $data['lien_position'] = $this->getLientPositionID(trim($contact['Lien Position']));
                $data['company_id'] = $this->getCompanyID($contact['Company'], $this->getCompanyTypeFromEscalation(trim($contact['Level'])));
                if(!$this->isDuplicate($data['email'])) {
                    $this->insertContact($data);
                }
            }
            echo "<h4>Contacts uploaded succesfully</h4>";
        }
        else {
            echo "error occured";
            var_dump($_FILES['csv_file']['error']);
        }
    }
    
    function export_contacts(){
        $this->load->model('contacts_model');
        $contacts = $this->contacts_model->getContactsArray();
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=file.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        $keys = array_keys($contacts[0]);
        echo implode(",", $keys);
        echo "\n";
        foreach($contacts as $contact) {
            echo implode(",", $contact);
            echo "\n";
        }
    }
    
    function enter_contact($success = null){
        $data['escalations'] = $this->escalationToIDHash;
        $data['companies'] = $this->companiesToIDHash;
        $data['lien_position'] = $this->lienToIDHash;
        $data['section'] = $this->sectionsHash;
        $data['department'] = $this->departmentsHash;
        $data['loan_type'] = $this->loanTypeHash;
        if($success) {
           $data['success'] = 1;
        }
        else {
            $data['success'] = null;
        }
        $data['main_content'] = 'upload_single_contact';
        $this->load->view('includes/template',$data);
    }
    
    function do_enter_contact() {
        $data = array();
        $companyType = $this->input->post('companies');
        $companyID = $this->input->post('company_id');
        $data['first_name'] = $this->input->post('first_name');
        $data['suffix'] = $this->input->post('suffix');
        $data['middle_name'] = $this->input->post('middle_name');
        $data['last_name'] = $this->input->post('last_name');
        $data['job_title'] = $this->input->post('job_title');
        $data['email'] = $this->input->post('email');
        $data['escalation_level_id'] = $this->input->post('escalation_level');
        $data['section_id'] = $this->input->post('section');
        $data['loan_type_id'] = $this->input->post('loan_type');
        $data['departmend_id'] = $this->input->post('department');
        $data['lien_position'] = $this->input->post('lien_position');
        $data['company_id'] = $companyID;
        $data['added_by'] = $this->session->userdata('username');
        if(!$this->isDuplicate($this->input->post('email'))) {
            if($this->insertContact($data)) {
                echo 1;
            }
            else {
                echo "error Adding the contact";
            }
        }
        else {
            echo 0;
        }
        
    }
    
    function new_members_page() {
        $data['companies'] = $this->companiesToIDHash;
        $data['main_content']='new_members_page';
        $this->load->view('includes/template',$data);
    }
    
    function get_all_companies_dropdowns(){
        $companies = $this->db->order_by("company_name", "asc")->get('companies')->result();
        if($companies){
            $returnHTML = "<select name='phrase'>";
            foreach($companies as $company) {
                $returnHTML .= "<option value=$company->id>$company->company_name</option>";
            }
            $returnHTML .= "</select>";
            echo $returnHTML;
        }
    }
    
    function get_company_name_dropdowns() {
        $companyID = $this->input->get('company_type');
        
        $returnHTML = "<select name='escalation_level' id='escalation_level' >";
        foreach($this->escalationToCompanyHash as $key=>$value):
              if($value == $companyID) {
                $returnHTML .= '<option value='.$this->getEscalationLevelID($key).'>'.$key.'</option>';
            }
        endforeach;
        $returnHTML.= "</select>";
        
        $companies = $this->db->where('company_type_id',$companyID)->order_by("company_name", "asc")->get('companies')->result();
        if($companies){
            $returnHTML .= "<select name='company_id' id='company_id'>";
            foreach($companies as $company) {
                if($companyID == $company->id){
                    $returnHTML .= "<option value=$company->id selected='selected'>$company->company_name</option>";
                }
                else {
                    $returnHTML .= "<option value=$company->id>$company->company_name</option>";
                }
            }
            $returnHTML .= "</select>";
            echo $returnHTML;
        }
        else {
            //still to figure what to do here
            $returnHTML .= "<select name='company_id' id='company_id'><option value=''>no company found</option></select>";
            echo $returnHTML;
        }
    }
    
    function get_company_dropdowns() {
        $companytypeID = $this->input->get('company_id');
        
        $returnHTML = "<select name='escalation_level' id='escalation_level'>";
        foreach($this->escalationToCompanyHash as $key=>$value):
              if($value == $companytypeID) {
                $returnHTML .= '<option value='.$this->getEscalationLevelID($key).'>'.$key.'</option>';
            }
        endforeach;
        $returnHTML.= "</select>";
        
        $companies = $this->getCompaniesFromCompanyType($companytypeID);
        
        if($companies):
            $returnHTML .= "<br/>";
            $returnHTML .= "<select name='company_id'>";
            foreach($companies as $company):
                $returnHTML .= "<option value=$company->id>$company->company_name</option>";
            endforeach;
            $returnHTML.= "</select>";
        endif;
        
        if($companytypeID == 1 ) {
            $returnHTML .= "<br/>";
            
            $returnHTML .= "<select name='lien_position'>";
            foreach($this->lienToIDHash as $key=>$value):
                $returnHTML .= "<option value=$value>$key</option>";
            endforeach;
            $returnHTML.= "</select>";
            
            $returnHTML .= "<br/>";
            
            $returnHTML .= "<select name='department'>";
            foreach($this->departmentsHash as $key=>$value):
                $returnHTML .= "<option value=$value>$key</option>";
            endforeach;
            $returnHTML.= "</select>";
            
            $returnHTML .= "<br/>";
            
            $returnHTML .= "<select name='section'>";
            foreach($this->sectionsHash as $key=>$value):
                $returnHTML .= "<option value=$value>$key</option>";
            endforeach;
            $returnHTML.= "</select>";
            
            $returnHTML .= "<br/>";
            
            $returnHTML .= "<select name='loan_type'>";
            foreach($this->loanTypeHash as $key=>$value):
                $returnHTML .= "<option value=$value>$key</option>";
            endforeach;
            $returnHTML.= "</select>";
            
        }
        
        echo $returnHTML;
    } 
    
    function getCompanyTypeFromEscalation($escalation) {
        return $this->escalationToCompanyHash[$escalation];
    }
    
    function getEscalationLevelID($escalation) {
        return $this->escalationToIDHash[$escalation];
    }
    
    function getDepartmentID($departmentName) {
        return $this->departmentsHash[$departmentName];
    }
    
    function getLoanTypeID($loanCode) {
        return $this->loanTypeHash[$loanCode];
    }
    
    function getSectionID($section) {
        if (!$section || $section == '') {
            return 5;
        }else {
            return $this->sectionsHash[$section];
        }
    }
    
    function getCompanyID($companyName,$companyType) {
        $companies = $this->db->where('company_name',$companyName)->get('companies')->result();
        if($companies){
            foreach ($companies as $company):
                return $company->id;
            endforeach;
        }
        else {
            $this->db->insert('companies',array('company_type_id'=>$companyType,'company_name'=>$companyName));
            return $this->db->insert_id();
        }
    }
    
    function insertCompany($companyName,$companyType) {
        $this->db->insert('companies',array('company_type_id'=>$companyType,'company_name'=>$companyName));
        return $this->db->insert_id();
    }
    
    private function insertContact($data) {
        return $this->db->insert('contact_new',$data);
    }
    
    function getLientPositionID($lienPosition){
        if($lienPosition == 'Sr. Lien') {
            return 1;
        }
        elseif($lienPosition == 'Jr. Lien') {
            return 2;
        }
        else {
            return 3;
        }
    }
    
    function getCompaniesFromCompanyType($companyTypeID) {
        $companies = $this->db->where('company_type_id',$companyTypeID)->order_by("company_name", "asc")->get('companies')->result();
        if($companies){
            return $companies;
        }
        else {
            //still to figure what to do here
            return;
        }
    }
    
    private function isDuplicate($email) {
        $contacts = $this->db->where('email',$email)->get('contact_new')->result();
        if($contacts):
            return true;
        else:
            return false;
        endif;
    }
    
    public function all_contacts(){
        $this->load->library('pagination');
        $this->load->model('contacts_model');
        $config['base_url'] = base_url().'csv/all_contacts';
        $config['total_rows'] = $this->db->count_all('contact_new');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = '&larr;First';
        $config['last_link'] = 'Last &rarr;';
        $this->pagination->initialize($config);
        
        $records = $this->db->select('contact_new.id,first_name,last_name,suffix,middle_name,job_title,email,company_name,escalation_level')
                ->from('contact_new')
                ->join('companies','contact_new.company_id = companies.id','inner')
                ->join('escalation_level','escalation_level.id = contact_new.escalation_level_id','inner')->order_by('last_name','ASC')->limit($config['per_page'],$this->uri->segment(3))
                ->get()->result();
        $data['record'] = $records;
        $data['deleted'] = $this->contacts_model->get_delete_requests();
        $data['main_content']='contacts';
        $this->load->view('includes/template',$data);
    }
    
    function delete_contact(){
        $username = $this->input->get('id');
        if($this->session->userdata(ADMIN)) {
            $this->db->where('id', $username);
            $this->db->delete(CONTACTS_TABLE); 
        }
        else if ($this->session->userdata(EMPLOYEE)){
            $data = new stdClass();
            $data->contact_requested_id = $username;
            $data->requested_by = $this->session->userdata(USERNAME);
            $this->db->insert(CONTACTS_DELETE_TABLE, $data); 
        }else {
            return;
        }
        
    }
    
    function edit_contact($id,$success = null){
        $this->load->model('contacts_model');
        if($success) {
           $data['success'] = 1;
        }
        else {
            $data['success'] = null;
        }
        $result = $this->db->select('*')->from('contact_new')->where(array('id'=>$id))->get()->result();
        $contact = $result[0];
        $data['contact'] = $contact;
        $data['selected_company'] = $this->contacts_model->getCompanyByCompanyId($contact->company_id);
        $data['companies'] = $this->contacts_model->getAllCompanies();
        $data['escalations'] = $this->contacts_model->getCompanyEscalationLevels($data['selected_company']->company_type_id);
        $data['company_types'] = $this->companiesToIDHash;
        $data['lien_position'] = $this->lienToIDHash;
        $data['section'] = $this->sectionsHash;
        $data['department'] = $this->departmentsHash;
        $data['loan_type'] = $this->loanTypeHash;
        $data['main_content']='edit_contact';
        $this->load->view('includes/template',$data);
        
    }
    
    function do_edit_contact($contactId){
        $data = array();
        $companyID = $this->input->post('company_id');
        $data['first_name'] = $this->input->post('first_name');
        $data['suffix'] = $this->input->post('middle_name');
        $data['last_name'] = $this->input->post('last_name');
        $data['job_title'] = $this->input->post('job_title');
        $data['email'] = $this->input->post('email');
        $data['escalation_level_id'] = $this->input->post('escalation_level');
        $data['section_id'] = $this->input->post('section');
        $data['loan_type_id'] = $this->input->post('loan_type');
        $data['departmend_id'] = $this->input->post('department');
        $data['lien_position'] = $this->input->post('lien_position');
        $data['company_id'] = $companyID;
        if($this->editContact($contactId,$data)) {
            echo 1;
        }
        else {
            echo "error Adding the contact";
        }
    }
    
    private function editContact($contactID,$data){
        $this->db->where(array('id'=>$contactID));
        $this->db->update('contact_new',$data);
        return true;
    }
    
    function search_contact(){
        $phrase = $this->input->post('phrase');
        $criteria = $this->input->post('search_criteria');
        $this->load->model('contacts_model');
        if($criteria == SEARCH_BY_EMAIL){
            $records = $this->db->select('contact_new.id,first_name,last_name,middle_name,suffix,job_title,email,company_name,escalation_level')
                        ->from('contact_new')
                        ->join('companies','contact_new.company_id = companies.id','inner')
                        ->join('escalation_level','escalation_level.id = contact_new.escalation_level_id','inner')->where('email',$phrase)
                        ->order_by('last_name','ASC')->get()->result();
            
        }
        else if($criteria == SEARCH_BY_COMPANY) {
            $records = $this->db->select('contact_new.id,first_name,last_name,middle_name,suffix,job_title,email,company_name,escalation_level')
                        ->from('contact_new')
                        ->join('companies','contact_new.company_id = companies.id','inner')
                        ->join('escalation_level','escalation_level.id = contact_new.escalation_level_id','inner')->where('company_id',$phrase)
                        ->order_by('last_name','ASC')->get()->result();
        }
        $deleted = $this->contacts_model->get_delete_requests();
        if($records){
            echo "<table class='table table-striped'>";
            echo '  <th>First</th>
                    <th>Middle</th>
                    <th>Last</th>
                    <th>Suffix</th>
                    <th style="width: 20%;">Job Title</th>
                    <th>Email</th>
                    <th>Escalation Level</th>
                    <th>Company</th>
                    <th style="width:8%;">Admin</th>';
            foreach($records as $r){
                echo "<tr>
                        <td>$r->first_name</td>
                        <td>$r->middle_name</td>
                        <td>$r->last_name</td>
                        <td>$r->suffix</td>
                        <td>$r->job_title</td>
                        <td>$r->email</td>
                        <td>$r->escalation_level</td>
                        <td>$r->company_name</td>
                        <td><a href='edit_contact/$r->id'>Edit</a> |";
                        if(!in_array($r->id,$deleted)) {
                            echo "<a href='delete_contact?id=$r->id' class='delete_contact' id='$r->email'>Delete</a></td>";
                        }
                        else {
                            echo " <i>Delete Requested</i>";
                        }
                        echo "</tr>";
            }
        }
        else {
            echo "<strong>No records were found against this criteria</strong>";
        }
    }
    
    function review_delete_requests(){
        $this->load->model('contacts_model');
        $data['requests'] = $this->contacts_model->get_delete_requests(true);
        $data['main_content']='contact_delete_requests';
        $this->load->view('includes/template',$data);
    }
    
    function delete_action(){
        $username = $this->input->get('user');
        $confirmDelete = $this->input->get('delete');
        if($confirmDelete){
            $this->db->delete(CONTACTS_TABLE,array('id'=>$username));
        }
        $this->db->delete(CONTACTS_DELETE_TABLE,array('contact_requested_id'=>$username));
        echo "here";
    }
    
    function test(){
        $this->load->model('contacts_model');
        var_dump($this->contacts_model->getLienPositionToIdHash());
    }
    
    function add_escalation_level(){
        $data['companies'] = $this->companiesToIDHash;
        $data['main_content']='add_escalation_level';
        $this->load->view('includes/template',$data);
    }
    
    function do_add_escalation() {
        $this->load->model('contacts_model');
        $companyType = $this->input->post('company_type');
        $escalationName = $this->input->post('escalation_level_name');
        $creditsRequired = $this->input->post('points_required');
        $comments = $this->input->post('comments');
        $escalationID = $this->contacts_model->insertEscalationLevel($companyType,$escalationName,$comments);
        $this->contacts_model->insertEscalationCredits($escalationID,$creditsRequired);
    }
    
    function add_department() {
        $data['companies'] = $this->companiesToIDHash;
        $data['main_content']='add_department';
        $this->load->view('includes/template',$data);
    }
    
    function do_add_department() {
        $this->load->model('contacts_model');
        $companyType = $this->input->post('company_type');
        $departmentName = $this->input->post('department_name');
        $this->contacts_model->insertDepartment($companyType,$departmentName);
    }
    
    function add_company(){
        $data['companies'] = $this->companiesToIDHash;
        $data['main_content']='add_company';
        $this->load->view('includes/template',$data);
    }
    
    function do_add_company(){
        $returnDict = array();
        $returnDict[CODE] = SUCCESS_CODE;
        $this->load->model('contacts_model');
        $companyType = $this->input->post('company_type');
        $companyName = $this->input->post('company_name');
        if($this->contacts_model->companyExists($companyType,$companyName)) {
            $returnDict[CODE] = COMPANY_ALREADY_EXIST_CODE;
            $returnDict[MSG] = "Another company with this name already exists";
        }
        else{
            $this->insertCompany($companyName,$companyType);
            $returnDict[MSG] = "Company Succesfully added";
        }
        $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($returnDict));
    }
    
    function add_loantype(){
        $data['main_content'] = 'add_loantype';
        $this->load->view('includes/template',$data);
    }
    
    function do_add_loantype(){
        $this->load->model('contacts_model');
        $loanType = $this->input->post('loan_type');
        $returnDict = $this->contacts_model->insertLoanType($loanType);
        $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($returnDict));
    }
    
    function add_section(){
        $data['companies'] = $this->companiesToIDHash;
        $data['main_content'] = 'add_section';
        $this->load->view('includes/template',$data);
    }
    
    function do_add_section(){
        $this->load->model('contacts_model');
        $companyType = $this->input->post('company_type');
        $sectionName = $this->input->post('section_name');
        $returnDict = $this->contacts_model->insertSection($companyType,$sectionName);
        $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($returnDict));
    }
    
    function add_lien_position(){
        $data['main_content'] = 'add_lien_position';
        $this->load->view('includes/template',$data); 
    }
    
    function do_add_lien_position(){
        $this->load->model('contacts_model');
        $lienPosition = $this->input->post('lien_position');
        $returnDict = $this->contacts_model->addLienPosition($lienPosition);
        $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode($returnDict));
    }
}
?>
