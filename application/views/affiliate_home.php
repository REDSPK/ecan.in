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
            <a href="#">Award Credits</a>
        </td>
    </tr>
<?
}
?>
</table>
</div>