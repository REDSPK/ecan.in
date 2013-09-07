<script>
    $(function(){
       $('.action').on('click',function(e){
          e.preventDefault();
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
       
       $('.checkout').on('click',function(e){
          e.preventDefault();
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
       
    });
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