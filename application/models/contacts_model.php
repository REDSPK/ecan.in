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
       return $output;
    }
    
    function getCompaniesTypeToIdArray() {
        $company_type = $this->db->get(COMPANY_TYPE_TABLE)->result();
        $output = array();
        foreach($company_type as $company){
            $output[$company->name] = $company->id;
        }
        return $output;
    }
    
    function getEscalationToIdArray() {
        $levels = $this->db->get(ESCALATION_LEVEL_TABLE)->result();
        $output = array();
        foreach($levels as $level){
            $output[$level->escalation_level] = $level->id; 
        }
       return $output;
    }
    
    function getDepartmentToidArray(){
        $departments = $this->db->get(DEPARTMENT_TABLE)->result();
        $output = array();
        foreach($departments as $department) {
            $output[$department->department_name] = $department->id;
        }
        return $output;
    }
    
    function getLoanTypeToIdHash() {
        $loan_type = $this->db->get(LOAN_TYPE_TABLE)->result();
        $output = array();
        foreach($loan_type as $loan) {
            $output[$loan->loan_type] = $loan->id;
        }
        return $output;
    }
    
    function getSectionsToIdHash() {
        $sections = $this->db->get(SECTIONS_TABLE)->result();
        $output = array();
        foreach($sections as $section) {
            $output[$section->section_name] = $section->id;
        }
        return $output;
    }
    
    function getLienPositionToIdHash() {
        $lienPositions = $this->db->get(LIEN_POSITION_TABLE)->result();
        $output = array();
        foreach($lienPositions as $position) {
            $output[$position->lien_position] = $position->id;
        }
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
        $escalationLevels = $this->db->select('*')->from(ESCALATION_LEVEL_TABLE)->where(array('company_type_id'=>$companyTypeId))->get()->result();
        return $escalationLevels;
    }
    
}
?>
