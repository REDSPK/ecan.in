<?php

?>
<div class="row"><style>
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
.table.table-striped tr th {
	background-color: #849BA6;
	color: #FFF;
}
</style>
<script>
$(function(){
    $('.delete_level').live('click',function(e){
        e.preventDefault();
        $('#confirm-delete-popup').lightbox_me({
            centered: true 
        });
        var link = $(this).attr('href');
        $('#btn-confirm-delete').on('click',function(e){
            $.ajax({
               url:link,
               type:'GET',
               success:function(data) {
                    console.log(data);  
               },
               complete:function(){
                    location.reload();
               }
            });
        });
    });
    
    $('.cancel').on('click',function(){
        $('.popup').trigger('close'); 
    });
});
</script>
<h4>
  <legend><img src="../../assets/img/i-contacts-o.png" width="35" height="35" alt="Manage Companies" />Manage Companies</legend>
</h4>
<table class="table table-striped">
    <th>Id</th>
    <th>Company Name</th>
    <th>Company Type</th>
    <th>Operations</th>
    <?
    foreach($companies as $company){
    ?>
    <tr>
        <td><?=$company->id?></td>
        <td><?=$company->company_name?></td>
        <td><?=$company->company_type_name?></td>
        <td>
            <a href="edit_company?id=<?=$company->id?>" >Edit</a> | 
            <a href="delete_company?id=<?=$company->id?>" class="delete_level">Delete</a>
        
        </td>
    </tr>
    <?
    }
    ?>
</table>

<div id="confirm-delete-popup" class="popup" style="display: none;">
    <legend>Confirm Delete</legend>
    <div id="delete-topic-title"></div>
    <button class="btn btn-danger" id="btn-confirm-delete">Confirm</button>
    <button class="btn cancel" >Cancel</button>
</div></div>