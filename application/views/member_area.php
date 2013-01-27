<?php
$continent=array(
	'value1'=>'value1',
  'value2'=>'value2'
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

          echo form_label('Template : ');
          echo form_dropdown('continent', $continent,set_value('continent'), 'id="continent"class="span3"');

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
              'type' =>'date',
              'format'=>'yy-mm-dd',
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
              'value'       => 'accept',
              'checked'     => FALSE
              );
          $manager_not_contact = array(
              'name'        => 'manager_not_contact',
              'id'          => 'manager_not_contact',
              'value'       => 'accept',
              'checked'     => FALSE
              );
          $disagree = array(
              'name'        => 'disagree',
              'id'          => 'disagree',
              'value'       => 'accept',
              'checked'     => FALSE
              );
          $inaccurate = array(
              'name'        => 'inaccurate',
              'id'          => 'inaccurate',
              'value'       => 'accept',
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
<div class="span12">
    <?php
    $comment = array(
              'name' => 'comment',
              'id'=> 'comment',
              'class' => 'span6',
              'value' => set_value('comment'),
              'placeholder'=>"Type your comments here..."
              );
    echo form_label('Additional Comments: ');
    echo form_textarea($comment);
?>
</div>
<div class="span8">
<?php
    $btn = array(
            'class' => 'btn-inverse pull-right',
                        'id' => 'submit',
                        'name'=>'submit',
                        'value'=>'Submit'
                        );
    echo form_submit($btn);
    ?>
</div>
<?php
echo form_close();