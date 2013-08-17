<div class="row"><div  class="signup_form">
<h4><img src="../../assets/img/i-about.png" width="35" height="35" alt="Contacts" />Create Account</h4>
<fieldset>
<legend>Personal Information</legend>
<?php 
$form_attributes = array('class' => 'form', 'id'=>'signup_form');
echo form_open('login/create_member',$form_attributes);
$fname = array(
		'name' => 'first_name',
		'id'=> 'first_name',
		'class' => 'span3',
		'value' => set_value('first_name'),
		'required'=>'required',
		'placeholder'=>"Type First Name here..."
		);
echo form_input($fname);
$lname = array(
		'name' => 'last_name',
		'id'=> 'last_name',
		'class' => 'span3',
		'value' => set_value('last_name'),
		'required'=>'required',
		'placeholder'=>"Type Last Name here..."
		);
echo form_input($lname);
$email = array(
		'name' => 'email_address',
		'id'=> 'email_address',
		'class' => 'span3',
		'value' => set_value('email_address'),
		'required'=>'required',
		'placeholder'=>"Type Email Address here..."
		);
echo form_input($email);
?>
</fieldset>
<fieldset>
<legend>Company Information</legend>
<?php
$ctelephone = array(
		'name' => 'company_telephone',
		'id'=> 'company_telephone',
		'class' => 'span3',
		'value' => set_value('company_telephone'),
		'required'=>'required',
		'placeholder'=>"Type Company Telephone here..."
		);
echo form_input($ctelephone);

$dtelephone = array(
		'name' => 'direct_telephone',
		'id'=> 'direct_telephone',
		'class' => 'span3',
		'value' => set_value('direct_telephone'),
		'required'=>'required',
		'placeholder'=>"Type Direct Telephone here..."
		);
echo form_input($dtelephone);

$cfax = array(
		'name' => 'company_fax',
		'id'=> 'company_fax',
		'class' => 'span3',
		'value' => set_value('company_fax'),
		'required'=>'required',
		'placeholder'=>"Type Company Fax here..."
		);
echo form_input($cfax);

$cname = array(
		'name' => 'company_name',
		'id'=> 'company_name',
		'class' => 'span3',
		'value' => set_value('company_name'),
		'required'=>'required',
		'placeholder'=>"Type company name here..."
		);
echo form_input($cname);
$csa = array(
		'name' => 'company_street_address',
		'id'=> 'company_street_address',
		'class' => 'span3',
		'value' => set_value('company_street_address'),
		'required'=>'required',
		'placeholder'=>"Type Company Street Address here..."
		);
echo form_input($csa);
$ca = array(
		'name' => 'company_address_line2',
		'id'=> 'company_address_line2',
		'class' => 'span3',
		'value' => set_value('company_address_line2'),
		'required'=>'required',
		'placeholder'=>"Type Company Address Line 2 here..."
		);
echo form_input($ca);
$ccity = array(
		'name' => 'company_city',
		'id'=> 'company_city',
		'class' => 'span3',
		'value' => set_value('company_city'),
		'required'=>'required',
		'placeholder'=>"Type company city here..."
		);
echo form_input($ccity);

$cstate = array(
		'name' => 'company_state',
		'id'=> 'company_state',
		'class' => 'span3',
		'value' => set_value('company_state'),
		'required'=>'required',
		'placeholder'=>"Type company state here..."
		);
echo form_input($cstate);

$czip = array(
		'name' => 'company_zip_code',
		'id'=> 'company_zip_code',
		'class' => 'span3',
		'value' => set_value('company_zip_code'),
		'required'=>'required',
		'placeholder'=>"Type company zip code here..."
		);
echo form_input($czip);

$cweb = array(
		'name' => 'company_website',
		'id'=> 'company_website',
		'class' => 'span3',
		'value' => set_value('company_website'),
		'required'=>'required',
		'placeholder'=>"Type company website here..."
		);
echo form_input($cweb);

?>
</fieldset>

<fieldset>
    <legend>Affiliate Code</legend>
<?
    $afiliateCode = array(
		'name' => 'affiliate_code',
		'id'=> 'affiliate_code',
		'class' => 'span3',
		'required'=>'required',
		'placeholder'=>"Type your affiliate code here"
		);
    echo form_input($afiliateCode);
?>
</fieldset>
<fieldset>
<legend>Login Information</legend>
<div id="feedback"></div>
<?php
$username = array(
		'name' => 'username',
		'id'=> 'username',
		'class' => 'span3',
		'value' => set_value('username'),
		'required'=>'required',
		'placeholder'=>"Type UserName here..."
		);
echo form_input($username);
$password = array(
		'name' => 'password',
		'id'=> 'password',
		'class' => 'span3',
		'required'=>'required',
		'placeholder'=>"Type password here..."
		);
echo form_password($password);
$password2 = array(
		'name' => 'password2',
		'id'=> 'password2',
		'class' => 'span3',
		'required'=>'required',
		'placeholder'=>"Retype password here..."
		);
echo form_password($password2);
$btn = array(
        'class' => 'btnGreen',
                    'id' => 'create_account',
                    'name'=>'create_account',
                    'value'=>'Create Account'
                    );
echo form_submit($btn);
echo form_close();
?>
<?php echo validation_errors('<p class="error">','</p>'); ?>
</fieldset>
</div></div>
<script type="text/javascript">
$(function(){
	/*check for username*/
	
	$('#username').keyup(function(){
		$.post("<?php echo site_url('login/check_username'); ?>",{username:$('#username').val()},
			function(res){
				$('#feedback').html(res).show();
			});
		/*
	var form_data ={
		username: $('#username').val(),
		is_ajax: '1'
	};
	$.ajax({

		url: "<?php echo site_url('login/check_username'); ?>",
		type: 'POST',
		data: form_data,
		success: function(msg){
			$('#feedback').html(msg);
		}
	}); */
	});//End of keyup function.........

});
</script>