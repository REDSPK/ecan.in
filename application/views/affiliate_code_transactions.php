<h4></h4>
<div id="table-container">
    <table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped'>
        <th width="7%" align="center" bgcolor="#39396C"><p>User Id</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Product</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Your Cut</p></th>
    <?
    foreach($transactions as $transaction)
    {
    ?>
    <tr>
        <td><?=$transaction->user_id?></td>
        <td><?=$transaction->product_id?></td>
        <td><?=$transaction->affiliate_percentage_from_transaction?></td>
        
    </tr>
    <?
    }
    ?>
    </table>
</div>