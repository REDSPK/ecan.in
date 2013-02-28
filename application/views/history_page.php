<?php 
$attributes = array(
  'id' => 'search_form',
  'name'=> 'search_form');
echo form_open('site/admin_search',$attributes);
$loan_no = array(
    'name' => 'loan_no',
    'id'=> 'loan_no',
    'class' => 'span3',
    'value' => set_value('loan_no'),
    'placeholder'=>"Type loan_no here..."
    );
echo form_label('Loan Number: ');
echo form_input($loan_no);

echo form_label('Company Name: ');
echo form_dropdown('company_name', $company_name,set_value('company_name'), 'id="company_name"');

echo form_submit('search', 'Search');
echo validation_errors('<p class="error">','</p>');
echo form_close();
?>


<h3>Total number of records are <?php echo $total_rows;?>.</h3>
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
               </tr>";
	}
        echo "</table>";
        echo $this->pagination->create_links();
}
?>
</div>