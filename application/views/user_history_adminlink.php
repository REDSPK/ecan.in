<div class ='pagination pagination-centered'>
<script>
$(function(){
    $('a.view-history').on('click',function(e){
        e.preventDefault();
        var historyText = $(this).parent('td').siblings('.history-detail').html();
        var subjectText = $(this).parent('td').siblings('.subject').html();
        $('#historyDetail').html(historyText);
        $('#subject-text').html(subjectText);
        $('#blast-success-popup').lightbox_me({
            centered: true 
        });
    })
    $('.cancel').on('click',function(){
        $('.popup').trigger('close'); 
    });
});
</script>
<style>
    
    .history-detail{
        display: none;
    }
    .subject{
        display: none;
    }
    .popup{
	padding: 3px 40px 17px 19px;
	background-color: #FAFAFA;
	background-image: -moz-linear-gradient(top, white, #F2F2F2);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(white), to(#F2F2F2));
	background-image: -webkit-linear-gradient(top, white, #F2F2F2);
	background-image: -o-linear-gradient(top, white, #F2F2F2);
	background-image: linear-gradient(to bottom, white, #F2F2F2);
	background-repeat: repeat-x;
	border: 1px solid #D4D4D4;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
        width:600px;
    }
</style>    
<?php
if(!$history)
echo "You don't have any recorded history";
else{
        echo "<table class='table table-striped'>";
        echo "
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th>
              <th>Suffix</th>
              <th>Company Name</th>
              <th>Loan Number</th>
              <th>Escalation Level</th>
              <th>Department</th>
              <th>Email Template</th>
              <th>Job Title</th>
              <th>Sent</th>
              <th>Credits</th>
                        ";
	foreach ($history as $h){
           echo "<tr>
                    <td>$h->first_name</td>
                    <td>$h->middle_name</td>
                    <td>$h->last_name</td>
                    <td>$h->suffix</td>
                    <td>$h->company_name</td>
                    <td>$h->loan_no</td>
                    <td>$h->escalation_level</td>
                    <td>$h->department_name</td>
                    <td class='view-history'><a href='#' class='view-history'>View Sent</a></td>
                    <td>$h->job_title</td>
                    <td>$h->date</td>
                    <td>$h->credits_consumed</td>
                    <td class='history-detail'>$h->template</td>
                    <td class='subject'>$h->subject</td>
               </tr>";
	}
        echo "</table>";
        echo $this->pagination->create_links();
}
?>
</div>
<div id="blast-success-popup" class="popup" style="display: none;">
    <legend id="subject-text"></legend>
    <div id="historyDetail" style="margin-bottom: 20px;"></div>
    <a href="#" class="btn btn-primary cancel"/>Close</a>
</div>