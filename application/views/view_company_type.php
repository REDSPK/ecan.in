<?php

?>
<div class="row"><h4>
  <legend><img src="../../assets/img/i-contacts-o.png" width="35" height="35" alt="Contacts" />Edit Company Type</legend>
</h4>
    <table class="table table-striped">
        <th>ID</th>
        <th>Name</th>
        <th>Edit</th>
        
        <? foreach ($company_type as $company) { ?>
        <tr>
            <td><?=$company->id?></td>
            <td><?=$company->name?></td>
            <? if ($company->is_activated) {?>
                <td><span style="color:green;"><strong>Activated</strong></span></td>
            <? }else{ ?>
                <td><span style="color:red;"><strong>De Activated</strong></span></td>
            <? } ?>
                <td><a href="edit_company_type?company_type_id=<?=$company->id?>" class="btnGreen">Edit</a></td>
        </tr>
        
        <? }?>
    </table>
</div>