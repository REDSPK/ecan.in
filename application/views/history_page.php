 <?php
/*
$assistance_type=array(
      'Short Sale'=>'Short Sale',
      'Loan Modification'=>'Loan Modification',
      'Other'=>'Other');
$form_attributes = array('class' => 'form-horizontal', 'id'=>'application_form');
echo form_open('template/post_email', $form_attributes);
?>
 last week, month, and then archived where they can see things by years and months.
 echo form_label('N0 of contacts to send Mail: ');
          echo form_dropdown('limit', $limit,set_value('limit'), 'id="limit"class="span3"');
*/

if(!$history)
echo "You don't have any recorded history";
else{
	foreach ($history as $h){
		echo "<strong>DAte: </strong>".$h['date'];
		echo '<br>';
		echo "<strong>Subject: </strong>".$h['subject'];
		echo '<br>';
		echo "<strong>Template: </strong><br>".$h['template'];
		echo '<hr/>';
		echo '<br>';
	}
}