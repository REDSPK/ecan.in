<?php


?>
<h4>Transactions by your affiliates</h4>

<div class="moneyDiv" style="font-size: 35px;padding-top: 20px;">
    <span>Current Balance :</span>
    <span style="color:#00AE08"><strong>$<?=$current_balance?></strong></span>
</div>

<div id="table-container" style="margin-top: 29px">
    <table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped'>
        <th width="7%" align="center" bgcolor="#39396C"><p>User Id</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Product ID</p></th>
        <th width="7%" align="center" bgcolor="#39396C"><p>Your Cut</p></th>
        <th width="9%" align="center" bgcolor="#39396C"><p>affiliate Code </p></th>
    
        <?
        foreach ($transaction_history as $transaction)
        {
        ?>
    <tr>
        <td><?=$transaction->user_id?></td>
        <td><?=$transaction->product_id?></td>
        <td><?=$transaction->affiliate_percentage_from_transaction?></td>
        <td><?=$transaction->user_id?></td>
    </tr>
    
    
        <?
        }
        ?>
    </table>
</div>