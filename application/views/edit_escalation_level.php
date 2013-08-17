<?php


?>
<div class="row"><h4>
  <legend><img src="../../assets/img/i-contacts-o.png" width="35" height="35" alt="Contacts" />Edit Escalation Level</legend>
</h4>
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
            <input type="submit" value="Enter" class="btnGreen">
        </div>
    </div>
</form>

</div>