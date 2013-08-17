<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row"><h4>
  <legend><img src="../../assets/img/i-contacts-o.png" width="35" height="35" alt="Contacts" />Edit Company Type</legend>
</h4>
<form class="form form-horizontal" method="post" action="do_edit_company_type?id=<?=$company_type->id?>">
  <div class="control-group">
        <label class="control-label">Name</label>
        <div class="controls">
            <input type="text" name="company_type_name" value="<?=$company_type->name?>"></input>
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
            <select name="is_activated">
                <? if($company_type->is_activated) {?>
                    <option selected="selected"  value="1">Activated</option>
                    <option value="0">Deactivated</option>
                <? } else { ?>
                    <option value="1">Activated</option>
                    <option value="0" selected="selected">Deactivated</option>
                <? } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input type="submit" value="Enter" class="btnGreen">
        </div>
    </div>
</form>

</div>