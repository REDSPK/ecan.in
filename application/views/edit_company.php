<?php

?>
<legend>Edit Escalation Level</legend>
<form class="form form-horizontal" method="post" action="do_edit_company?id=<?=$company->id?>">
    <div class="control-group">
        <label class="control-label">Name</label>
        <div class="controls">
            <input type="text" name="company_name" value="<?=$company->company_name?>"></input>
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label">Company Type</label>
        <div class="controls">
            <select name="company_type">
            <?
            foreach ($company_type as $key=>$val):
                if($company->company_type_id == $val){
            ?>
                <option value="<?=$val?>" selected="selected"><?=$key?></option>
            <?
                }
                else{
            ?>
                    <option value="<?=$val?>"><?=$key?></option>
            <?
                }
            endforeach;
            ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input type="submit" value="Enter" class="btn btn-primary">
        </div>
    </div>
</form>
