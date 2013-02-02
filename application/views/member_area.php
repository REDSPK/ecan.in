<?php
$limit=array(
	'1'=>1,
  '2'=>2,
  '3'=>3,
  '4'=>4,
  '5'=>5,
  'all'=>'all'
	);
$assistance_type=array(
      'Short Sale'=>'Short Sale',
      'Loan Modification'=>'Loan Modification',
      'Other'=>'Other');
$form_attributes = array('class' => 'form-horizontal', 'id'=>'application_form');
echo form_open('template/post_email', $form_attributes);
?>
<div class="row">
    <div class="span6">
          <?php
          echo form_label('Type of Assistance : ');
          echo form_dropdown('assistance_type', $assistance_type,set_value('assistance_type'), 'id="assistance_type" class="span3"');

          echo form_label('N0 of contacts to send Mail: ');
          echo form_dropdown('limit', $limit,set_value('limit'), 'id="limit"class="span3"');

          $subject = array(
              'name' => 'subject',
              'id'=> 'subject',
              'class' => 'span3',
              'value' => set_value('subject'),
              'placeholder'=>"Type subject here..."
              );
          echo form_label('Subject  : ');
          echo form_input($subject);
          $loan_no = array(
              'name' => 'loan_no',
              'id'=> 'loan_no',
              'class' => 'span3',
              'value' => set_value('loan_no'),
              'required'=>'required',
              'placeholder'=>"Type Loan # here..."
              );
          echo form_label('Loan # : ');
          echo form_input($loan_no);

          $client_name = array(
              'name' => 'client_name',
              'id'=> 'client_name',
              'class' => 'span3',
              'value' => set_value('client_name'),
              'required'=>'required',
              'placeholder'=>"Type name here..."
              );
          echo form_label('Client Name : ');
          echo form_input($client_name);

          $date = array(
              'name' => 'date',
              'id'=> 'date',
              'class' => 'span3',
              'placeholder'=>"year-month-day",
              'required'=>'required');
          echo form_label('Sale Date : ');
          echo form_input($date);

          echo form_label('Escalation : ');
          echo form_dropdown('level', $level,set_value('level'), 'id="level" class="span3"');
          ?>
    </div>
    <div class="span6">
          <?php
          echo form_label('Loan Type : ');
          echo form_dropdown('loan_type', $loan_type,set_value('loan_type'), 'id="loan_type"class="span3"');

          echo form_label('company : ');
          echo form_dropdown('companies', $companies,set_value('companies'), 'id="companies"class="span3"');

          echo form_label('department : ');
          echo form_dropdown('departments', $departments,set_value('departments'), 'id="departments"class="span3"');

          echo form_label('section : ');
          echo form_dropdown('sections', $sections,set_value('sections'), 'id="sections"class="span3"');

          $lack_of_contact = array(
              'name'        => 'lack_of_contact',
              'id'          => 'lack_of_contact',
              'value'       => '1',
              'checked'     => FALSE
              );
          $message_not_return = array(
              'name'        => 'message_not_return',
              'id'          => 'message_not_return',
              'value'       => '1',
              'checked'     => FALSE
              );
          $manager_not_contact = array(
              'name'        => 'manager_not_contact',
              'id'          => 'manager_not_contact',
              'value'       => '1',
              'checked'     => FALSE
              );
          $disagree = array(
              'name'        => 'disagree',
              'id'          => 'disagree',
              'value'       => '1',
              'checked'     => FALSE
              );
          $inaccurate = array(
              'name'        => 'inaccurate',
              'id'          => 'inaccurate',
              'value'       => '1',
              'checked'     => FALSE
              );
          echo form_label('Complaints : ');
          ?>
          <label class="checkbox">
                <?php echo form_checkbox($lack_of_contact); ?> Lack of Contact
          </label>
          <label class="checkbox">
                <?php echo form_checkbox($message_not_return); ?> Left Messages Not Returned
          </label>
          <label class="checkbox">
                <?php echo form_checkbox($manager_not_contact); ?> Escalated To Manager No Contact
          </label>
          <label class="checkbox">
                <?php echo form_checkbox($disagree); ?> Disagree With Decision
          </label>
          <label class="checkbox">
                <?php echo form_checkbox($inaccurate); ?> Decision was Based on Inaccurate Info
          </label>
    </div>
</div><!--row-->
<div class="row">
    <?php
    $comment = array(
              'name' => 'comment',
              'id'=> 'comment',
              'rows'        => '5',
              'cols'        => '10',
              'class'       => 'span10',
              'style'=>'margin-left:25px;',
              'value' => set_value('comment'),
              'placeholder'=>"Type your comments here..."
              );?>

    <div style='margin:25px;'><?php echo form_label('Additional Comments: '); ?></div>
   <?php echo form_textarea($comment);
?>
</div>
<div class="span9">
<?php
    $btn = array(
            'class' => 'btn-large btn-inverse pull-right',
                        'id' => 'submit',
                        'name'=>'submit',
                        'style'=>'margin-top:30px;',
                        'value'=>'Submit'
                        );
    echo form_submit($btn);
    ?>
</div>
<?php
echo form_close();
?>
<br/><br/><br/>
<link href="<?php echo base_url().'assets/css/jquery-ui.css' ?>" rel="stylesheet" type="text/css">
<script language="JavaScript" src="<?php echo base_url().'assets/js/jquery.ui.core.js' ?>" type="text/javascript"></script>
<script language="JavaScript" src="<?php echo base_url().'assets/js/jquery.ui.datepicker.js' ?>" type="text/javascript"></script>
<script language="JavaScript" src="<?php echo base_url().'assets/js/jquery.ui.widget.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
        $( "#date" ).datepicker({ dateFormat: 'yy-mm-dd' });
      });
</script>