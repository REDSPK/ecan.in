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
            $('#confirm-delete-popup').lightbox_me({
                centered: true 
            });
            link =  $(this).attr('href');
            $('#btn-confirm-delete').on('click',function(e){
                var notes = $('#notes').val();
                if(notes == "")
                { 
                    alert("Please Enter some delete notes");
                }
                else
                {
                    approve_deny_user(link,notes); 
                    $('.popup').trigger('close');
                }
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
    
    function approve_deny_user(link,notes) {
        $.ajax({
            url: link,
            type: 'GET',
            data: 'notes='+notes,
            success:function(data){
                location.reload();
            }
        });
    }
</script>
<div class="row"><h4></a>Review Delete Requests</h4>
<? 
if(count($requests) > 0){
?>
<table class='table table-striped'>
    <th>Username</th>
    <th>Requested By</th>
    <th>Date Requested</th>
    <th>Action</th>
    <? 
    foreach ($requests as $req){
    ?>
    <tr>
        <td><?=$req['user_requested']?></td>
        <td><?=$req['requested_by']?></td>
        <td><?=$req['date']?></td>
        <td>
            <a href="delete_action?id=<?=$req['user_requested']?>&delete=1" id="approve-user-delete" ><i class="icon-ok" ></i>Approve</a>
            <a href="delete_action?id=<?=$req['user_requested']?>&delete=0" id="deny-user-delete" ><i class="icon-remove"></i>Deny</a>
        </td>
    </tr>
    <?
    }
    ?>
    
</table>
<?
}
?>
<div id="confirm-delete-popup" class="popup" style="display: none;">
    <legend>Confirm Delete</legend>
    <div id="delete-topic-title"></div>
    <textarea id="notes" placeholder="Enter Delete Notes Here"></textarea>
    <br/>
    <button class="btn btn-danger" id="btn-confirm-delete">Confirm</button>
    <button class="btn cancel" >Cancel</button>
</div>

<div id="deny-delete-popup" class="popup" style="display: none;">
    <legend>Deny Delete</legend>
    <button class="btn btn-danger" id="btn-deny-delete">Confirm</button>
    <button class="btn cancel" >Cancel</button>
</div>

</div>