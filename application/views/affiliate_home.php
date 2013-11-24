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
<a href="export_users_csv" class="btn btnGreen" style="float:right;margin-bottom: 1%;">download csv</a>
<div id="table-container">
<table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped' style="margin-top: 1%;">
    <th width="7%" align="center" bgcolor="#39396C"><p>First</p></th>
    <th width="7%" align="center" bgcolor="#39396C"><p>Last</p></th>
    <th width="9%" align="center" bgcolor="#39396C"><p>Email</p></th>
    <th width="9%" align="center" bgcolor="#39396C"><p>Username</p></th>
    <th width="11%" align="center" bgcolor="#39396C"><p>Credits</p></th>
    <th width="11%" align="center" bgcolor="#39396C"><p>Code</p></th>
    <th width="11%" align="center" bgcolor="#39396C"><p>Joined</p></th>
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
        
    </tr>
<?
}
?>
</table>
</div>