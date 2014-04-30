<link href="<?php echo base_url().'../assets/css/jquery.jqplot.min.css' ?>" rel="stylesheet">
<script src="<?php echo base_url().'../assets/js/jquery.jqplot.js' ?>"></script>
<script src="<?php echo base_url().'../assets/js/jqplot.dateAxisRenderer.min.js' ?>"></script>
<script>
    $(function(){
        
       $.ajax({
         url : 'get_all_code_graph',
         type:'GET',
         success:function(data)
         {
             bigArray = new Array()
             var count = 0;
             data.forEach(function(object)
             {
                 if(object.points.length > 0)
                 {
                    bigArray[count] = object.points;
                 }
                 else
                 {
                     bigArray[count] = [0,0];
                 }
                 count++;
             });
             var plot2 = $.jqplot('chartdiv', bigArray, {
                axes:{
                    xaxis:{renderer:$.jqplot.DateAxisRenderer},
                    yaxis: {tickOptions:{prefix: '$'}}
                },
                series:[{lineWidth:3, markerOptions:{style:'circle'}}] 
             });
         }
      });
       
       $('.checkout').on('click',function(e){
          $('.alert').remove();
          e.preventDefault();
          link = $(this).attr('href');
          var amount = $.trim($('.dollarAmount').html());
          amount = amount.substring(1,amount.length);
          amount = parseFloat(amount);
          if(amount < 20)
          {
              $('h4').after('<div class="alert alert-error">'+' <strong>$20</strong> minimum required for checkout requests'+'</div>');
          }
          else{
              $.ajax({
                 url : link+"?amount="+amount,
                 type:'GET',
                 success:function()
                 {
                     location.reload();
                 }
              });
          }
       });
       
       $('.action').on('click',enableDisableCode);
       
    });
    
    function enableDisableCode(event)
    {
        event.preventDefault();
        var link = $(this).attr('href');
        $.ajax({
            url : link,
            type:'GET',
            success:function()
            {
                location.reload();
            }
        });
    }
</script>
<style>
    .dollarAmountInTable
    {
        color: green;
        font-weight: bold;
    }
    .dollarAmount
    {
        color: green;
        font-weight: bold;
        font-size: 25px;
    }
</style>
<h4>My Referral Codes</h4>
<?
if(!$checkoutRequested)
{
?>
<span>Current Balance: </span><span class="dollarAmount">$<?=$userTotalBalance?></span>  <span> <a href="add_checkout_request" class="btn btn-success checkout">Checkout</a></span>
<?
}
else
{
    echo "<i>Checkout Requested</i>";
}
?>

<br/><br/>
<div id="chartdiv" style="height:250px;width:100%; "> </div>
<div id="table-container">
    <table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped'>
        <th width="7%" align="center" bgcolor="#39396C"><p>Code</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Pending Transaction</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Total Transactions</p></th>
        <th width="9%" align="center" bgcolor="#39396C"><p>Actions</p></th>
        <th width="9%" align="center" bgcolor="#39396C"><p>Details</p></th>
    <?
    foreach($codes as $code)
    {
    ?>
    <tr>
        <td><strong><?=$code->referal_code?></strong></td>
        <td><span class="dollarAmountInTable">$<?=$code->pending_transactions?></span></td>
        <td><span class="dollarAmountInTable">$<?=$code->paid_transactions?></span></td>
        <td><?
        if($code->status == 1)
        {
        ?>
            <a href="enable_disable_code?id=<?=$code->id?>&status=0" class="action">Disable</a>
        <?
        }
        else
        {
        ?>
            <a href="enable_disable_code?id=<?=$code->id?>&status=1" class="action">Enable</a>
        <?
        }
        ?></td>
        <td><a href="affiliate_code_financials?code_id=<?=$code->id?>">view details</a></td>
    </tr>
    <?
    }
    ?>
    </table>
</div>