<?php

?>
<style>
    .subject{
        display: none;
    }
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
        width:600px;
    }
</style> 
<script>
$(function(){
    $('a.mark-paid').on('click',function(e){
        e.preventDEfault();
        link = $(this).attr('href');
          $.ajax({
             url : link,
             type:'GET',
             success:function()
             {
                 location.reload();
             }
          });
    });
    
    $('a.view-detail').on('click',function(e){
        e.preventDefault();
        var historyText = $(this).parent('td').siblings('.hidden').html();
        $('#historyDetail').html(historyText);
        $('#blast-success-popup').lightbox_me({
            centered: true 
        });
        
    })
    $('.cancel').on('click',function(){
        $('.popup').trigger('close'); 
    });
});
</script>
<h4>Checkout Requests</h4>

<?
if(count($requests > 0) && $requests[0]->checkoutId) 
{
    
?>
<div id="table-container">
    <table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped'>
        <th width="7%" align="center" bgcolor="#39396C"><p>Name</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Amount</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Date Requested</p></th>
        <th width="9%" align="center" bgcolor="#39396C"><p>Actions</p></th>
    <?
    foreach($requests as $request)
    {
    ?>
    <tr>
        <td><a href='#' class="view-detail"><?=$request->first_name." ".$request->last_name?></a></td>
        <td><?=$request->amount?></td>
        <td><?=date('F/j/Y',strtotime($request->date_requested));?></td>
        <td><a href="mark_transaction_paid?id=<?=$request->checkoutId?>" class="mark-paid btn btn-primary" id="<?=$request->checkoutId?>">Mark Paid</a></td>
        <td class='hidden'>
            <b>Name:</b> <?=$request->first_name." ".$request->last_name?> <br/>
            <b>Email:</b><?=$request->email_address?> <br/>
            <b>Address:</b> <?=$request->company_street_address." ".$request->company_address_line2?> <br/>
            <b>City:</b> <?=$request->company_city?> <br/>
            <b>State:</b> <?=$request->company_state?> <br/>
            <b>Zip Code:</b> <?=$request->company_zip_code?> <br/>
            
        </td>
    </tr>
    <?
    }
    ?>
    </table>
</div>

<?
}
else
{
    echo "No checkout Requests yet";
}
?>
<div id="blast-success-popup" class="popup" style="display: none;width: 13%;">
    <legend id="subject-text">Affiliate Info</legend>
    <hr/>
    <div id="historyDetail" style="margin-bottom: 20px;"></div>
    <a href="#" class="btn btn-primary cancel"/>Close</a></div>
</div>