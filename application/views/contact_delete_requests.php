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
.table.table-striped tr th {
	color: #FFF;
	background-color: #849BA6;
}
</style>
<script>
    $(function(){
        $('#approve-user-delete').live('click',function(e){
            e.preventDefault();
            $('#approve-delete-popup').lightbox_me({
                centered: true 
            });
            link =  $(this).attr('href');
            $('#btn-approve-delete').on('click',function(e){
                approve_deny_user(link); 
                $('.popup').trigger('close');
            });
        });
        
        $('#deny-user-delete').live('click',function(e){
            e.preventDefault();
            link = $(this).attr('href');
            $('#deny-delete-popup').lightbox_me({
                centered: true 
            });
            $('#btn-deny-delete').on('click',function(e){
                approve_deny_user(link); 
                $('.popup').trigger('close');
            });
        });
        
        $('.cancel').on('click',function(){
            $('.popup').trigger('close'); 
        });
    });
    
    function approve_deny_user(link) {
        $.ajax({
            url: link,
            type: 'GET',
            success:function(data){
                location.reload();
            }
        });
    }
</script>
<div class="row"><h4>Review Delete Requests</h4>
<? 
if(count($requests) > 0){
?>
<table class='table table-striped'>
    <th>Requested By</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Job Title</th>
    <th>Company</th>
    <th>Date Requested</th>
    <th>Action</th>
    <? 
    foreach ($requests as $req){
    ?>
    <tr>
        <td><?=$req['requested_by']?></td>
        <td><?=$req['first_name']?></td>
        <td><?=$req['last_name']?></td>
        <td><?=$req['job_title']?></td>
        <td><?=$req['email']?></td>
        <td><?=$req['company_name']?></td>
        <td><?=$req['date']?></td>
        <td>
            <a href="delete_action?user=<?=$req['contact_requested_id']?>&delete=1" id="approve-user-delete" ><i class="icon-ok" ></i>Approve</a>
            <a href="delete_action?user=<?=$req['contact_requested_id']?>&delete=0" id="deny-user-delete" ><i class="icon-remove"></i>Deny</a>
        </td>
    </tr>
    <?
    }
    ?>
    
</table>
<?
}
?>
<div id="approve-delete-popup" class="popup" style="display: none;">
    <legend>Approve Delete</legend>
    <button class="btn btn-danger" id="btn-approve-delete">Confirm</button>
    <button class="btn cancel" >Cancel</button>
</div>

<div id="deny-delete-popup" class="popup" style="display: none;">
    <legend>Deny Delete</legend>
    <button class="btn btn-danger" id="btn-deny-delete">Confirm</button>
    <button class="btn cancel" >Cancel</button>
</div></div>