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
              <th>Email Template</th>
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
                    <td>$h->template</td>
                    <td>$h->job_title</td>
                    <td>$h->date</td>
               </tr>";
	}
        echo "</table>";
        echo $this->pagination->create_links();
}
?>
</div>