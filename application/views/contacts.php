<?php
//    var_dump($deleted);
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
            $.ajax({
               url:link,
               type:'GET',
               success:function(data){
                   $('.popup').trigger('close');
                   
               }
            });
            location.reload();
        });
    });
    
    $('.cancel').on('click',function(){
        $('.popup').trigger('close'); 
    });
    
    $('.search_form').on('submit',function(e){
        $('#pagination').hide();
        e.preventDefault();
        var destUrl = $(this).attr('action');
        $.ajax({
            url: destUrl,
            type: 'POST',
            data: $(this).serialize(),
            success:function(data){
                $('#table-container').html(data);
            }
        });
    });
    
    $('#search_criteria').on('change',function(e){
        var selectedVal = $(this).val();
        var response = '';
        if(selectedVal == 2){
            $('#phrase').html('<input type="text" placeholder="Enter the criteria here" name="phrase" />');
        }
        else if(selectedVal == 3) {
            loadCompanies();
        }
    });
});
function deleteUser(link){
    $.ajax({
       url:link,
       type:'GET',
       success:function(data){
           location.reload();
       }
    });
}

function loadCompanies(){
    $.ajax({
       url:'<?=base_url()?>csv/get_all_companies_dropdowns',
       type:'GET',
       async:false,
       success:function(data){
           $('#phrase').html(data);
       }
    });
}
</script>
<div class ='pagination pagination-centered'>
<form class="form-inline search_form" action="<?=base_url()?>csv/search_contact" method="POST">
    <select name="search_criteria" id="search_criteria" >
        <option value="<?=SEARCH_BY_EMAIL?>">By Email</option>
        <option value="<?=SEARCH_BY_COMPANY?>">By Company</option>
    </select>
    <span id="phrase">
        <input type="text" placeholder="Enter the criteria here" name="phrase" />
    </span>
    <button type='submit' class="btn btn-inverse">Search</button>
</form>
<div id="table-container">
    <table class='table table-striped'>
        <th>First</th>
        <th>Middle</th>
        <th>Last</th>
        <th>Suffix</th>
        <th style="width: 20%;">Job Title</th>
        <th>Email</th>
        <th>Escalation Level</th>
        <th>Company</th>
        <th style="width:8%;">Admin</th>
    <?
    foreach ($record as $r){
    ?>
        <tr>
            <td><?=$r->first_name?></td>
            <td><?=$r->middle_name?></td>
            <td><?=$r->last_name?></td>
            <td><?=$r->suffix?></td>
            <td><?=$r->job_title?></td>
            <td><?=$r->email?></td>
            <td><?=$r->escalation_level?></td>
            <td><?=$r->company_name?></td>
            <td>
                <a href="<?=base_url()?>csv/edit_contact/<?=$r->id?>">Edit</a> |
            <? 
                if(!in_array($r->id,$deleted)){
            ?>
                <a href="<?=base_url()?>csv/delete_contact?id=<?=$r->id?>" class="delete_contact" id="<?=$r->email?>">Delete</a>
            <?
                }
                else {
            ?>
                <i>Delete Requested</i>
            <?
                }
            ?>
            </td>
        </tr>
    <?
    }
    ?>
    </table>
</div>
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