<div class="row">
<?php
$form_attributes = array('class' => 'form-horizontal', 'id'=>'edit_form');
echo form_open('user/save_profile',$form_attributes);
$fname = array(
		'name' => 'first_name',
		'id'=> 'first_name',
		'value' => $member['first_name'],
		'maxlength'=> '20',
		'required'=>'required'
		);

$lname = array(
		'name' => 'last_name',
		'id'=> 'last_name',
		'value' => $member['last_name'],
		'maxlength'=> '20',
		'required'=>'required'
		);
$username = array(
		'name' => 'username',
		'id'=> 'username',
		'disabled' => 'disabled',
		'value' => $member['username']
		);
$email = array(
		'name' => 'email_address',
		'id'=> 'email_address',
		'value' => $member['email_address'],
		'required'=>'required',
		'disabled'=>'disabled'
		);

$ctelephone = array(
		'name' => 'company_telephone',
		'id'=> 'company_telephone',
		'value' => $member['company_telephone'],
		'required'=>'required',
		'maxlength'=> '20'
		);
$dtelephone = array(
		'name' => 'direct_telephone',
		'id'=> 'direct_telephone',
		'value' => $member['direct_telephone'],
		'required'=>'required',
		'maxlength'=> '20'
		);
$cfax = array(
		'name' => 'company_fax',
		'id'=> 'company_fax',
		'value' => $member['company_fax'],
		'required'=>'required',
		'maxlength'=> '20'
		);
$cname = array(
		'name' => 'company_name',
		'id'=> 'company_name',
		'value' => $member['company_name'],
		'required'=>'required',
		'maxlength'=> '40'
		);
$csa = array(
		'name' => 'company_street_address',
		'id'=> 'company_street_address',
		'value' => $member['company_street_address'],
		'maxlength'=> '250',
		'required'=>'required'
		);
$ca = array(
		'name' => 'company_address_line2',
		'id'=> 'company_address_line2',
		'value' => $member['company_address_line2'],
		'maxlength'=> '250',
		'required'=>'required'
		);
$ccity = array(
		'name' => 'company_city',
		'id'=> 'company_city',
		'value' => $member['company_city'],
		'maxlength'=> '50',
		'required'=>'required'
		);
$cstate = array(
		'name' => 'company_state',
		'id'=> 'company_state',
		'value' => $member['company_state'],
		'maxlength'=> '50',
		'required'=>'required'
		);
$czip = array(
		'name' => 'company_zip_code',
		'id'=> 'company_zip_code',
		'value' => $member['company_zip_code'],
		'maxlength'=> '20',
		'required'=>'required'
		);
$cweb = array(
		'name' => 'company_website',
		'id'=> 'company_website',
		'value' => $member['company_website'],
		'maxlength'=> '50',
		'required'=>'required'
		);

?><h4><img src="../../assets/img/i-edit-o.png" width="35" height="35" alt="Buy Credits" />My Personal Information</h4>
<div class="span6">
	
      <a href="#" style="float:left">
        <img src="http://placehold.it/150x150" /><br><br>
        </a>

<div class="control-group">
	<label class="control-label" for="first_name">Name: </label>
		<div class="controls"><?php echo form_input($fname)." ".form_input($lname); ?>
		</div>
</div>
<div class="control-group">
	<label class="control-label" for="Username">Username: </label>
     <div class="controls"><?php echo form_input($username); ?>
     </div>
</div>
<div class="control-group">
	<label class="control-label" for="email_address">Email: </label>
	<div class="controls"><?php echo form_input($email); ?>
	</div>
</div><br><br>

	<h4>My Company Information</h4>
<div class="control-group">
	<label class="control-label" for="company_telephone">Company Telephone: </label>
    <div class="controls"><?php
	echo form_input($ctelephone); ?>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="direct_telephone">Direct Telephone: </label>
    <div class="controls"><?php
	echo form_input($dtelephone); ?>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="company_fax">Company Fax: </label>
    <div class="controls"><?php
	echo form_input($cfax); ?>
</div>
</div>

<div class="control-group">
	<label class="control-label" for="company_name">Company Name: </label>
    <div class="controls"><?php
	echo form_input($cname); ?>
</div>
</div>

<div class="control-group">
	<label class="control-label inline" for="company_street_address">Street Address: </label>
    <div class="controls"><?php
	echo form_input($csa); ?>
	</div>
</div>

<div class="control-group">
	<label class="control-label inline" for="company_address_line2">Company Address Line2: </label>
    <div class="controls"><?php
	echo form_input($ca); ?>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="company_city">Company City: </label>
    <div class="controls"><?php
	echo form_input($ccity); ?>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="company_state">Company State: </label>
    <div class="controls"><?php
	echo form_input($cstate); ?>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="company_zip_code">Company Zip Code: </label>
    <div class="controls"><?php
	echo form_input($czip); ?>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="company_website">Company Website: </label>
    <div class="controls"><?php
	echo form_input($cweb); ?>
	</div>
</div>

<?php
$btn = array(
        'class' => 'btnGreen',
                    'id' => 'save_account',
                    'name'=>'save_account',
                    'value'=>'Save Account',
                    'style' =>'margin-left:280px;'
                    );
echo form_submit($btn);
echo form_close();
?>
<?php echo validation_errors('<p class="error">','</p>'); ?><br /><br />

</div><!-- 2nd span4 close here-->

<div class="span6" style="text-align:right">
    <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #00AE08; width:90%">
      <br />
      
    </div>
  </div>
<div class="span6" style="text-align:right; ">
  <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #849BA6; width:90%">
    <table width="100%" border="0" cellpadding="5" cellspacing="0" style="background-color:#ECF0F2">
      <tr>
        <td width="39%" align="left"><h3>Your Credits:</h3></td>
        <td width="61%" align="left"><span class="credits my-credits"><?=$member['credits'];?> </span></td>
      </tr>
      <tr>
        <td colspan="2" align="left" bgcolor="#FFFFFF"><a href="<?=base_url().'paypal/buy_credits'?>" class="btnGreen"/>Get More Credits</a><br />
  <br />
  <?php echo anchor('user/change_password','Change Password'); ?><br></td>
        </tr>
    </table>
  </div>
</div>
<div class="span6" style="text-align:right">
  <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #00AE08; width:90%; height: 650px"> <br />
  </div>
</div>
<!-- 3rd span4 close here-->
</div>

<script type="text/javascript">
$(function(){
	/*validaion check*/
	$('#edit_form').validate({
	   /* rules: {
	    	first_name: {
	        minlength: 2,
	        required: true
	      },
	      last_name: {
	        minlength: 2,
	        required: true
	      },
	      username: {
	        minlength: 2,
	        required: true
	      },
	      email_address: {
	        required: true,
	        email: true
	      },
	      company_name: {
	      	minlength: 2,
	        required: true
	      },
	      company_website: {
	        minlength: 2,
	        required: true
	      }
	    },*/
	    highlight: function(label) {
	    	$(label).closest('.control-group').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
	    }
	  });
});
</script>

