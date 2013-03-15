<?php 
$attributes = array(
  'id' => 'search_form',
    'name'=> 'search_form',
   'class'=>'form-inline');
echo form_open('site/admin_search',$attributes);
$loan_no = array(
    'name' => 'loan_no',
    'id'=> 'loan_no',
    'class' => 'span2',
    'value' => set_value('loan_no'),
    'placeholder'=>"Type loan_no here...",
    'style'=>'margin-left:9px;margin-right:9px;'
    );
echo form_label('Loan Number: ');
echo form_input($loan_no);

echo form_label('Company Name: ');
echo form_dropdown('company_name', $company_name,set_value('company_name'), 'id="company_name"');

echo form_submit(array('name'=>'search','class'=>'btn btn-primary','value'=>'Search','style'=>'margin-left:9px;'));
echo validation_errors('<p class="error">','</p>');
echo form_close();
?>
<script>
$(function(){
   $('#search_form').submit(function(e){
       if($('#loan_no').val() == '' && $('#company_name').val() == '') {
           e.preventDefault();
           alert('You must specify atleast 1 search criteria');
           return false;
       }
   });
});
</script>
<div class ='pagination pagination-centered'>
<?php
if(!$history)
echo "You don't have any recorded history";
else{
        echo "<table class='table table-striped'>";
        echo "<th>Last Name</th>
              <th>Suffix</th>
              <th>Company Name</th>
              <th>Loan Number</th>
              <th>Escalation Level</th>
              <th>Department</th>
              <th>Job Title</th>
              <th>Sent</th>
                        ";
	foreach ($history as $h){
           echo "<tr>
                    <td>".substr($h->last_name, 0,1)."</td>
                    <td>$h->suffix</td>
                    <td>$h->company_name</td>
                    <td>$h->loan_no</td>
                    <td>$h->escalation_level</td>
                    <td>$h->department_name</td>
                    <td>$h->job_title</td>
                    <td>$h->date</td>
               </tr>";
	}
        echo "</table>";
        echo $this->pagination->create_links();
}
?>
</div>