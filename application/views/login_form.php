<?php /*?><center><img src="<?php echo base_url().'../assets/img/ecanlogo600200.png'?>"></img></center><?php */?>
<div id='login_form'>
	<?php 
	$attributes = array('class' => 'well span4', 'id' => 'login_form');
	echo form_open('login/validate_cradentials',$attributes);
        echo "<div>";
	$username = array(
		'name' => 'username',
		'id'=> 'username',
		'class' => 'span3',
		'placeholder'=>"Type Username here...",
                'required'=>'required'
		);
		echo form_input($username);
     
	$password = array(
		'name' => 'password',
		'id'=>'password',
		'class' =>'span3',
		'placeholder' => 'Type Password here...',
        'required'=>'required' );
	echo form_password($password);
        echo "</div>";
	$btn = array(
                    'class' => 'btnGreen',
                    'id' => 'submit',
                    'name'=>'submit',
                    'value'=>'Login'
                    );
	echo form_submit($btn);

	$anchor_attributes = array('id' => 'signup_anchor',
                                   'class' => 'btn btn-success'
                                    );
	echo anchor('login/signup','Create Account',$anchor_attributes);

  $anchor_attr = array(
    'id' => 'pass_recover_anchor',
    'class'=>'span3');
  echo anchor('login/recover_password','Forgot Password?',$anchor_attr);
	echo form_close();
?>
</div>