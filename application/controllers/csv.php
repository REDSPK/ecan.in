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
        $this->escalationToCompanyHash = array
        ('CL1'=>1,'ML1'=>1,'ML2'=>1,'ML3'=>1,'ML4'=>1,'OOPG'=>1,'OOP1'=>1,'OOP2'=>1,'OOP3'=>1,'OOP4'=>1,'OOP5'=>1,
         'INVG'=>2,'INV1'=>2,'INV2'=>2,'INV3'=>2,   
         'MIG'=>3,'MI1'=>3,'MI2'=>3,'MI3'=>3,
         'SAT'=>4,'USAG'=>4,
          'ATTG'=>5,'ATT1'=>5,'ATT2'=>5,'ATT3'=>5
        );
        
        $this->companiesToIDHash = array('Bank'=>1,'Investor'=>2,'Insurer'=>3,'Government'=>4,'Attorney/Trustee'=>5);
        
        $this->escalationToIDHash = array
        ('CL1'=>1,'ML1'=>2,'ML2'=>3,'ML3'=>4,'ML4'=>5,'OOPG'=>6,'OOP1'=>7,'OOP2'=>8,'OOP3'=>9,'OOP4'=>10,'OOP5'=>11,
         'INVG'=>12,'INV1'=>13,'INV2'=>14,'INV3'=>15,   
         'MIG'=>16,'MI1'=>17,'MI2'=>18,'MI3'=>19,
         'SAT'=>20,'USAG'=>21,
          'ATTG'=>22,'ATT1'=>23,'ATT2'=>24,'ATT3'=>25
        );
        
        $this->departmentsHash = array('Short Sale' => 1,'Loan Modification'=>2,'ALL'=>3);
        
        $this->loanTypeHash = array('Conventional'=>1,'FHA'=>2,'HELOC'=>3,'FNMA'=>4,'VA'=>5,'FHLMC'=>6,'ALL'=>7);
        
        $this->sectionsHash = array('Operations Management'=>1,'Closing Department'=>2,'Processing Department'=>3,'Setup Department'=>4,'ALL'=>5);
        
        $this->lienToIDHash = array('Sr. Lien' => 1,'Jr. Lien'=> 2,'ALL' =>3);
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
                $data['suffix'] = $contact['Middle Name'];
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
        }
        else {
            echo "error occured";
            var_dump($_FILES['csv_file']['error']);
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
        $companyName =  $this->input->post('company_name_text');
        $companyType = $this->input->post('companies');
        if(!empty($companyName)) {
            $companyID = $this->insertCompany($companyName, $companyType);
        }else {
            $companyID = $this->input->post('company_id');
        }
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
    
    function get_company_dropdowns() {
        $companytypeID = $this->input->get('company_id');
        
        $returnHTML = "<select name='escalation_level'>";
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
    
    function get_company_name_dropdowns() {
        $companyTypeID = $this->input->get('company_type');
        $companyID = $this->input->get('company_id');
        $companies = $this->db->where('company_type_id',$companyTypeID)->order_by("company_name", "asc")->get('companies')->result();
        if($companies){
            $returnHTML = "<select name='company_id' id='company_id'>";
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
            echo "<select name='company_id' id='company_id'><option value=''>no company found</option></select>";
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

            $data['main_content']='contacts';
            $records = $this->db->select('contact_new.id,first_name,last_name,job_title,email,company_name,escalation_level')->from('contact_new')->join('companies','contact_new.company_id = companies.id','inner')
                        ->join('escalation_level','escalation_level.id = contact_new.escalation_level_id','inner')->limit($config['per_page'],$this->uri->segment(3))
                        ->get()->result();
            $data['record']= $records;
            $this->load->view('includes/template',$data);
    }
    
    public function delete_contact(){
        $email = $this->input->post('email');
        $this->db->delete(CONTACTS_TABLE, array('email' => $email));
//        echo $this->db->last_query();
    }
    
    public function edit_contact($id,$success = null){
        if($success) {
           $data['success'] = 1;
        }
        else {
            $data['success'] = null;
        }
        $result = $this->db->select('*')->from('contact_new')->where(array('id'=>$id))->get()->result();
        $data['contact'] = $result[0];
        $data['escalations'] = $this->escalationToIDHash;
        $data['companies'] = $this->companiesToIDHash;
        $data['lien_position'] = $this->lienToIDHash;
        $data['section'] = $this->sectionsHash;
        $data['department'] = $this->departmentsHash;
        $data['loan_type'] = $this->loanTypeHash;
        $data['main_content']='edit_contact';
        $this->load->view('includes/template',$data);
        
    }
    
    function do_edit_contact($contactId){
        $data = array();
        $companyName =  $this->input->post('company_name_text');
        $companyType = $this->input->post('companies');
        if(!empty($companyName)) {
            $companyID = $this->insertCompany($companyName, $companyType);
        }else {
            $companyID = $this->input->post('company_id');
        }
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
        if(!$this->isDuplicate($this->input->post('email'))) {
            if($this->editContact($contactId,$data)) {
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
    private function editContact($contactID,$data){
        $this->db->where(array('id'=>$contactID));
        $this->db->update('contact_new',$data);
        echo $this->db->last_query();
        die();
        return true;
    }
}
?>
