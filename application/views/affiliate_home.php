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
    $('.award-credits').live('click',function(e){
        e.preventDefault();
        $('#add-credits-popup').lightbox_me({
            centered: true 
        });
        link3 = $(this).attr('href');
        $('#btn-award-credits').live('click',function(){
            var comments = $('#credits_comments').val();
            awardCredits(link3,$('.item_type').val(),comments);
        });
    });
    
    $('.cancel').on('click',function(){
        $('.popup').trigger('close'); 
    });
});
function awardCredits(link,numCredits,comments){
    $.ajax({
        url: link+'/'+numCredits+'/'+comments,
        type: 'GET',
        complete:function(data){
            location.reload();
        }
    });
}
</script>
<h4> You have <strong><?=count($record)?></strong> Member(s) </h4> 
<div id="table-container">
<table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped'>
    <th width="7%" align="center" bgcolor="#39396C"><p>First</p></th>
    <th width="7%" align="center" bgcolor="#39396C"><p>Last</p></th>
    <th width="9%" align="center" bgcolor="#39396C"><p>Email</p></th>
    <th width="9%" align="center" bgcolor="#39396C"><p>Username</p></th>
    <th width="11%" align="center" bgcolor="#39396C"><p>Credits</p></th>
    <th width="11%" align="center" bgcolor="#39396C"><p>Code</p></th>
    <th width="11%" align="center" bgcolor="#39396C"><p>Joined</p></th>
    <th width="11%" align="center" bgcolor="#39396C"><p>Actions</p></th>
<?
foreach($record as $row)
{
?>
    <tr>
        <td><?=$row->first_name?></td>
        <td><?=$row->last_name?></td>
        <td><?=$row->email_address?></td>
        <td><?=$row->username?></td>
        <td><?=$row->credits?></td>
        <td><?=$row->referal_code?></td>
        <td><?=$row->created_at?></td>
        <td>
            <a href="../admin/add_credits/<?=$row->username?>" class="award-credits">Award Credits</a>
        </td>
    </tr>
<?
}
?>
</table>
</div>
<div id="add-credits-popup" class="popup" style="display: none;width: 27%;">
    <legend>Add Credits</legend>
    <div id="add-credits-title"></div>
    <form class="form-inline">
        <select name="item_type" class="item_type">
            <option value="<?=ECAN275_PRODUCT_NAME?>"><?=ECAN275_PRODUCT_NAME?></option>
            
        </select>
        <br/>
        <textarea name="credits_comments" id="credits_comments" placeholder="Enter any additional comments here......" style="resize:none;width: 100%;"></textarea> <br/>
    </form>
    <button class="btn btn-primary" id="btn-award-credits"> Add Credits </button>
    <button class="btn cancel"> Cancel </button>
</div>    