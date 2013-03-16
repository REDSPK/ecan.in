<div id="message">
	<div id="popup">
		<h4><?php echo $message ?></h4>
		<p>You can Resend activation link. <?php echo anchor('login/resend_activation_link/'.$username,'Resend activation link');?></p>
	</div>
</div>