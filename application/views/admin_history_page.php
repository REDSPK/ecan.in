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


$username = array(
    'name' => 'username',
    'id'=> 'username',
    'class' => 'span2',
    'value' => set_value('username'),
    'placeholder'=>"Type username here..."
    );
echo form_label('username: ');
echo form_input($username);
echo form_submit(array('name'=>'search','class'=>'btn btn-primary','value'=>'Search','style'=>'margin-left:9px;'));
echo validation_errors('<p class="error">','</p>');
echo form_close();
?>
<script>
$(function(){
   $('#search_form').submit(function(e){
       if($('#loan_no').val() == '' && $('#username').val() == '') {
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
        echo "<th>First Name</th>
              <th>Suffix</th>
              <th>Last Name</th>
              <th>Company Name</th>
              <th>Loan Number</th>
              <th>Escalation Level</th>
              <th>Department</th>
              <th>Job Title</th>
              <th>Sent</th>
              <th>Receiver Email</th>
              <th>sender Username</th>
                        ";
	foreach ($history as $h){
           echo "<tr>
                    <td>$h->first_name</td>
                    <td>$h->suffix</td>
                    <td>$h->last_name</td>
                    <td>$h->company_name</td>
                    <td>$h->loan_no</td>
                    <td>$h->escalation_level</td>
                    <td>$h->department_name</td>
                    <td>$h->job_title</td>
                    <td>$h->date</td>
                    <td>$h->email</td>
                    <td>$h->username</td>

               </tr>";
	}
        echo "</table>";
        echo $this->pagination->create_links();
}
?>
</div>