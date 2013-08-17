<?php


?>
<h3>My Referal Codes</h3>
<div id="table-container">
<table width="100%" border="0" cellpadding="5" cellspacing="5" class='table table-striped'>
    <th width="7%" align="center" bgcolor="#39396C"><p>Code</p></th>
    <th width="7%" align="center" bgcolor="#39396C"><p>Credits</p></th>
    <th width="9%" align="center" bgcolor="#39396C"><p>Created at</p></th>
<?
foreach($codes as $code)
{
?>
<tr>
    <td><?=$code->referal_code?></td>
    <td><?=$code->num_of_credits?></td>
    <td><?=$code->created_at?></td>
</tr>
<?
}
?>
</table>
</div>