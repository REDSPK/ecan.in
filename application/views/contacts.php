<?php
//    var_dump($record);
//    die();
?>
<style>
.popup{
	padding: 3px 40px 17px 19px;
	background-color: #FAFAFA;
	background-image: -moz-linear-gradient(top, white, #F2F2F2);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(white), to(#F2F2F2));
	background-image: -webkit-linear-gradient(top, white, #F2F2F2);
	background-image: -o-linear-gradient(top, white, #F2F2F2);
	background-image: linear-gradient(to bottom, white, #F2F2F2);
	background-repeat: repeat-x;
	border: 1px solid #D4D4D4;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
}
#delete-topic-title {
	margin-bottom: 19px;
}
</style>
<script>
$(function(){
    $('.delete_contact').live('click',function(e){
        e.preventDefault();
        $('#confirm-delete-popup').lightbox_me({
            centered: true 
        });
        var email = $(this).attr('id')
        $('#delete-topic-title').html('<strong> Delete '+email+' ?? </strong>');
        link = $(this).attr('href');
        $('#btn-confirm-delete').on('click',function(e){
            deleteUser(link,email);
            $('.popup').trigger('close');
            location.reload();
        });
    });
    
    $('.cancel').on('click',function(){
        $('.popup').trigger('close'); 
    });   
});
function deleteUser(link,email){
    console.log(link);
    $.ajax({
       url:link,
       type:'POST',
       data:'email='+email,
       success:function(data){
           console.log(data);
       }
    });
}
</script>
<div class ='pagination pagination-centered'>
<table class='table table-striped'>
    <th>First Name</th>
    <th>Last Name</th>
    <th style="width: 20%;">Job Title</th>
    <th>Email</th>
    <th>Escalation Level</th>
    <th>Company</th>
    <th>Admin</th>
<?
foreach ($record as $r){
?>
    <tr>
        <td><?=$r->first_name?></td>
        <td><?=$r->last_name?></td>
        <td><?=$r->job_title?></td>
        <td><?=$r->email?></td>
        <td><?=$r->escalation_level?></td>
        <td><?=$r->company_name?></td>
        <td>
            <a href="<?=base_url()?>csv/edit_contact/<?=$r->id?>">Edit</a> |
            <a href="<?=base_url()?>csv/delete_contact" class="delete_contact" id="<?=$r->email?>">Delete</a>
        </td>
    </tr>
<?
}
?>
</table>`
<?
if(isset($this->pagination)) {
    echo $this->pagination->create_links();
}
?>
</div>

<div id="confirm-delete-popup" class="popup" style="display: none;">
        <legend>Confirm Delete</legend>
        <div id="delete-topic-title"></div>
        <button class="btn btn-danger" id="btn-confirm-delete">Confirm</button>
        <button class="btn cancel" >Cancel</button>
</div>