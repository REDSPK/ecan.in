<div class="row-fluid">
<?php
$form_attributes = array('class' => 'form-horizontal', 'id'=>'password_form');
echo form_open('edit_profile/save_password',$form_attributes);
$old_password = array(
		'name' => 'old_password',
		'id'=> 'old_password',
		'maxlength'=> '20',
		'required'=>'required'
		);

$new_password = array(
		'name' => 'new_password',
		'id'=> 'new_password',
		'maxlength'=> '20',
		'required'=>'required'
		);
$new_password_confirm = array(
		'name' => 'new_password_confirm',
		'id'=> 'new_password_confirm',
		'maxlength'=> '20',
		'required'=>'required'
		);
?>
<div class="control-group">
	<label class="control-label" for="old_password">Old Password: </label>
		<div class="controls"><?php echo form_password($old_password); ?>
		</div>
</div>
<div class="control-group">
	<label class="control-label" for="new_password">New Password: </label>
     <div class="controls"><?php echo form_password($new_password); ?>
     </div>
</div>
<div class="control-group">
	<label class="control-label" for="new_password_confirm">Re-type New Password: </label>
	<div class="controls"><?php echo form_password($new_password_confirm); ?>
	</div>
</div><br>
<?php $btn = array(
        'class' => 'btn-inverse',
                    'id' => 'change',
                    'name'=>'change',
                    'value'=>'Change',
                    'style'=>'margin-left:300px;'
                    );
echo form_submit($btn);
echo form_close();?>
<?php echo validation_errors('<p class="error">','</p>'); ?>
</div><!--End row-->