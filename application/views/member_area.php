<div id="left_part">
<?php
$continent=array(
	'value1'=>'value1',
  'value2'=>'value2'
	);
$form_attributes = array('class' => 'form-horizontal', 'id'=>'application_form');
echo form_open('url', $form_attributes);
echo form_label('Type of Assistance : ');
echo form_dropdown('continent', $continent,set_value('continent'), 'id="continent"');

echo form_label('Template : ');
echo form_dropdown('continent', $continent,set_value('continent'), 'id="continent"');

echo form_label('Subject  : ');
echo form_input('name', 'value');

echo form_label('Loan # : ');
echo form_input('name', 'value');

echo form_label('Client Name : ');
echo form_input('name', 'value');

echo form_label('Sale Date : ');
echo form_input('name', 'value');

?>
</div>
<div id="right_part">
<?php
echo form_label('Escalation : ');
echo form_dropdown('level', $level,set_value('level'), 'id="level"');

echo form_label('Loan Type : ');
echo form_dropdown('loan_type', $loan_type,set_value('loan_type'), 'id="loan_type"');

$data = array(
    'name'        => 'newsletter',
    'id'          => 'newsletter',
    'value'       => 'accept',
    'checked'     => FALSE
    );
echo form_label('Complaints : ');
?>
<label class="checkbox">
      <?php echo form_checkbox($data); ?> Lack of Contact
</label>
<label class="checkbox">
      <?php echo form_checkbox($data); ?> Left Messages Not Returned
</label>
<label class="checkbox">
      <?php echo form_checkbox($data); ?> Escalated To Manager No Contact
</label>
<label class="checkbox">
      <?php echo form_checkbox($data); ?> Disagree With Decision
</label>
<label class="checkbox">
      <?php echo form_checkbox($data); ?> Decision was Based on Inaccurate Info
</label>
</div>
<div>
    <?php
echo form_label('additional Comments: ');
echo form_textarea('name', 'Comments..', 'attributs');
echo form_submit('submit', 'Submit');
echo form_close();
?>
</div>
