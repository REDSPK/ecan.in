<div id='login_form'>
	<h2>Login Here</h2>
	<?php 
	$attributes = array('class' => 'well span4', 'id' => 'login_form');
	echo form_open('login/validate_cradentials',$attributes);

	$username = array(
		'name' => 'username',
		'id'=> 'username',
		'class' => 'span3',
		'placeholder'=>"Type UserName here..."
		);
		echo form_input($username);

	$password = array(
		'name' => 'password',
		'id'=>'password',
		'class' =>'span3',
		'placeholder' => 'Type password here...' );
	echo form_password($password);

	$btn = array(
                    'class' => 'btn-primary',
                    'id' => 'submit',
                    'name'=>'submit',
                    'value'=>'login'
                    );
	echo form_submit($btn);

	$anchor_attributes = array('id' => 'signup_anchor');
	echo anchor('login/signup','Create Account',$anchor_attributes);

  $anchor_attr = array(
    'id' => 'pass_recover_anchor',
    'class'=>'span3');
  echo anchor('login/recover_password','Forget PassWord',$anchor_attr);
	echo form_close();
?>
<script type="text/javascript">
        $(function(){
            $('#login_form').on('submit',function(e){
              var flag = true;
              $(':input').each(function(){
                  if($(this).val() == '') {
                    $(this).after('<span class="help-block" style="color:#B94A48">This field cannot be left empty</span>');
                    $(this).css('border-color','#B94A48');
                    flag = false;
                  }
              });    
              if(flag) {
                return true;
              }else {
                e.preventDefault();
                return false;
              }
            });
        });
    </script>
</div>