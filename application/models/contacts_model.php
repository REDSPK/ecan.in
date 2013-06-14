<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contacts_model
 *
 * @author FAIZAN ALI
 */
class contacts_model extends CI_Model {
    function getContactsArray(){
            $result = $this->db->query("select first_name,suffix,last_name,job_title,email,company_name,section_name,escalation_level,loan_type,department_name,lien_position
                                        from contact_new inner join companies on companies.id = contact_new.company_id
                                        inner join sections on sections.id = contact_new.section_id
                                        inner join escalation_level on escalation_level.id = contact_new.escalation_level_id
                                        inner join loan_type on loan_type.id = contact_new.loan_type_id
                                        inner join departments on departments.id = contact_new.departmend_id")->result_array();
        return $result;
    }
    
    function get_delete_requests($all = false) {
        $query = $this->db->query('select requested_by,date,first_name,last_name,job_title,email,company_name,contact_requested_id 
                                   from contact_delete_requests d inner join contact_new c on d.contact_requested_id = c.id
                                   inner join companies com on c.company_id = com.id')->result_array();
        $inArr = $query;//This is the 2D array
        if($all){
            return $inArr;
        }
        else {
            $outArr = array();
            for($i=0;$i<count($inArr);$i++){
                    $outArr[$i] = $inArr[$i]['contact_requested_id'];
            }
            return $outArr;
        }  
    }
    
    function getEscalationsToCompanyIdArray(){
        $levels = $this->db->get(ESCALATION_LEVEL_TABLE)->result();
        $output = array();
        foreach($levels as $level){
            $output[$level->escalation_level] = $level->company_type_id; 
        }
        ksort($output);
        return ($output);
       
    }
    
    function getCompaniesTypeToIdArray() {
        $company_type = $this->db->get(COMPANY_TYPE_TABLE)->result();
        $output = array();
        foreach($company_type as $company){
            $output[$company->name] = $company->id;
        }
        ksort($output);
        return $output;
    }
    
    function getEscalationToIdArray() {
        $levels = $this->db->get(ESCALATION_LEVEL_TABLE)->result();
        $output = array();
        foreach($levels as $level){
            $output[$level->escalation_level] = $level->id; 
        }
        ksort($output);
        return $output;
    }
    
    function getDepartmentToidArray(){
        $departments = $this->db->get(DEPARTMENT_TABLE)->result();
        $output = array();
        foreach($departments as $department) {
            $output[$department->department_name] = $department->id;
        }
        ksort($output);
        return $output;
    }
    
    function getLoanTypeToIdHash() {
        $loan_type = $this->db->get(LOAN_TYPE_TABLE)->result();
        $output = array();
        foreach($loan_type as $loan) {
            $output[$loan->loan_type] = $loan->id;
        }
        ksort($output);
        return $output;
    }
    
    function getSectionsToIdHash() {
        $sections = $this->db->get(SECTIONS_TABLE)->result();
        $output = array();
        foreach($sections as $section) {
            $output[$section->section_name] = $section->id;
        }
        ksort($output);
        return $output;
    }
    
    function getLienPositionToIdHash() {
        $lienPositions = $this->db->get(LIEN_POSITION_TABLE)->result();
        $output = array();
        foreach($lienPositions as $position) {
            $output[$position->lien_position] = $position->id;
        }
        ksort($output);
        return $output;
    }
    
    
    function insertEscalationLevel($type,$level,$comments){
        $this->db->insert(ESCALATION_LEVEL_TABLE,array('company_type_id'=>$type,'escalation_level'=>$level,'comments'=>$comments));
        return $this->db->insert_id();
    }
    
    function insertEscalationCredits($id,$credits) {
        $this->db->insert(CREDITS_PER_ESCALATION_TABLE,array('escalation_level_id'=>$id,'num_of_credits'=>$credits));
    }
    
    function insertDepartment($id,$name) {
        $this->db->insert(DEPARTMENT_TABLE,array('company_id'=>$id,'department_name'=>$name));
    }
    
    function companyExists($id,$name){
        $company = $this->db->select('*')->from(COMPANIES_TABLE)->where(array('company_type_id'=>$id,'company_name'=>$name))->get()->result();
        if(count($company) > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function getCompanyByCompanyId($companyId) {
        $company = $this->db->select('*')->from(COMPANIES_TABLE)->where(array('id'=>$companyId))->get()->result();
        return $company[0];
    }
    
    function getAllCompanies() {
        $company = $this->db->select('*')->from(COMPANIES_TABLE)->get()->result();
        return $company;
    }
    
    function getCompanyEscalationLevels($companyTypeId) {
        $escalationLevels = $this->db->select('*')->from(ESCALATION_LEVEL_TABLE)->where(array('company_type_id'=>$companyTypeId))->order_by('escalation_level')->get()->result();
        return $escalationLevels;
    }
    
    function insertLoanType($name){
        $returnDict = array();
        $loanType = $this->db->select('*')->from(LOAN_TYPE_TABLE)->where(array('loan_type'=>$name))->get()->result();
        if(count($loanType) > 0){
            $returnDict[CODE] = COMPANY_ALREADY_EXIST_CODE;
            $returnDict[MSG] = "This Loantype already exist in the system";
        }
        else {
            $this->db->insert(LOAN_TYPE_TABLE,array('loan_type'=>$name));
            $returnDict[CODE] = SUCCESS_CODE;
            $returnDict[MSG] = "Loantype successfully added";
        }
        return $returnDict;
    }
    
    function insertSection($id,$name) {
        $returnDict = array();
        $loanType = $this->db->select('*')->from(SECTIONS_TABLE)->where(array('company_type'=>$id,'section_name'=>$name))->get()->result();
        if(count($loanType) > 0){
            $returnDict[CODE] = COMPANY_ALREADY_EXIST_CODE;
            $returnDict[MSG] = "This Section already exist in the system";
        }
        else {
            $this->db->insert(SECTIONS_TABLE,array('company_type'=>$id,'section_name'=>$name));
            $returnDict[CODE] = SUCCESS_CODE;
            $returnDict[MSG] = "Section successfully added";
        }
        return $returnDict;
    }
    
    function addLienPosition($position){
        $returnDict = array();
        $loanType = $this->db->select('*')->from(LIEN_POSITION_TABLE)->where(array('lien_position'=>$position))->get()->result();
        if(count($loanType) > 0){
            $returnDict[CODE] = COMPANY_ALREADY_EXIST_CODE;
            $returnDict[MSG] = "This Lien Position already exist in the system";
        }
        else {
            $this->db->insert(LIEN_POSITION_TABLE,array('lien_position'=>$position));
            $returnDict[CODE] = SUCCESS_CODE;
            $returnDict[MSG] = "Lien Position successfully added";
        }
        return $returnDict;
    }
    
    function getDepartmentByID($id) {
        $department = $this->db->select('*')->from(DEPARTMENT_TABLE)->where(array('id'=>$id))->get()->result();
        return $department[0]->department_name;
    }
    
    function addCompanyType($name) {
        $returnDict = array();
        $companyType = $this->db->select('*')->from(COMPANY_TYPE_TABLE)->where(array('name'=>$name))->get()->result();
        if(count($companyType) > 0){
            $returnDict[CODE] = COMPANY_ALREADY_EXIST_CODE;
            $returnDict[MSG] = "The Company Type already exists";
        }
        else {
            $data = array();
            $data['name'] = $name;
            $this->db->insert(COMPANY_TYPE_TABLE,$data);
            $returnDict[CODE] = SUCCESS_CODE;
            $returnDict[MSG] = "The Company type added to the system";
        }
        return $returnDict;
    }
    
    function getEscalationLevelsFromDb() {
        $escalationLevels = $this->db->query('select e.id,e.escalation_level,c.name,cr.num_of_credits,e.comments 
                                              from escalation_level e 
                                              INNER JOIN company_type c on e.company_type_id = c.id
                                              INNER JOIN credits_per_escalation cr on e.id = cr.escalation_level_id')->result();
        return $escalationLevels;
        
    }
    
    function getEscalationInfo($id) {
        $escalationInfo = $this->db->query("select e.id,e.escalation_level,c.name,cr.num_of_credits,e.comments,c.id as company_id
                                              from escalation_level e 
                                              INNER JOIN company_type c on e.company_type_id = c.id
                                              INNER JOIN credits_per_escalation cr on e.id = cr.escalation_level_id where e.id = $id")->result();
        return $escalationInfo;
    }
    
    function updateEscalation($id,$name,$type,$numCredits,$comments){
        $data = array();
        $data['company_type_id'] = $type;
        $data['escalation_level'] = $name;
        $data['comments'] = $comments;
        $this->db->where(array('id'=>$id));
        $this->db->update(ESCALATION_LEVEL_TABLE,$data);
        $data2 = array();
        $data2['num_of_credits'] = $numCredits;
        $this->db->where(array('escalation_level_id'=>$id));
        $this->db->update('credits_per_escalation',$data2);
    }
    
    function getAllCompaniesfromDb(){
        $companies = $this->db->query('select c.id,c.company_type_id,c.company_name,c_type.`name` as company_type_name from companies c inner join company_type c_type on c.company_type_id = c_type.id')
                     ->result();
        return $companies;
    }
    
    function getCompanyInfo($id){
        $companies = $this->db->query("select c.id,c.company_type_id,c.company_name,c_type.`name` as company_type_name 
                                       from companies c inner join company_type c_type on c.company_type_id = c_type.id
                                       WHERE c.id = $id")->result();
        return $companies;
    }
    
    function updateCompany($id,$name,$type) {
        $data = array();
        $data['company_name'] = $name;
        $data['company_type_id'] = $type;
        $this->db->where(array('id'=>$id));
        $this->db->update(COMPANIES_TABLE,$data);
    }
}
?>
