<?php


?>
<legend>Edit Escalation Level</legend>
<form class="form form-horizontal" method="post" action="do_edit_escalation?id=<?=$escalationLevel->id?>">
    <div class="control-group">
        <label class="control-label">Name</label>
        <div class="controls">
            <input type="text" name="escalation_name" value="<?=$escalationLevel->escalation_level?>"></input>
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label">Company Type</label>
        <div class="controls">
            <select name="company_type">
            <?
            foreach ($company_type as $key=>$val):
                if($escalationLevel->company_id == $val){
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
        <label class="control-label">Number Of Credits</label>
        <div class="controls">
            <input type="text" name="num_of_credits" value="<?=$escalationLevel->num_of_credits?>"></input>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Comments</label>
        <div class="controls">
            <input type="text" name="comments" value="<?=$escalationLevel->comments?>"></input>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input type="submit" value="Enter" class="btn btn-primary">
        </div>
    </div>
</form>
