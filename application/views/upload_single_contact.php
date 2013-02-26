<?php
if($success) {
    echo '<div class="alert alert-success">The contact has been added succesfully</div>';
}
?>
    <form method="POST" action="<?= base_url()?>csv/do_enter_contact" enctype='multipart/form-data'>
        <fieldset>
        <select name="escalation_level">
            <? 
                foreach($escalations as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        <br/>
        <select name="companies">
            <? 
                foreach($companies as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        <br/>
        <select name="lien_position">
            <? 
                foreach($lien_position as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        <br/>
        <select name="section">
            <? 
                foreach($section as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        <br/>
        <select name="department">
            <? 
                foreach($department as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        <br/>
        <select name="loan_type">
            <? 
                foreach($loan_type as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        <br/>
        <input type="text" name="first_name" placeholder="First Name" /> <br/>
        <input type="text" name="middle_name" placeholder="Middle Name" /> <br/>
        <input type="text" name="last_name" placeholder="Last Name" /> <br/>
        <input type="text" name="job_title" placeholder="Job Title" /> <br/>
        <input type="text" name="email" placeholder="Email" /> <br/>
        
        <input type="submit" class="btn btn-inverse" style ='margin-left:150px;'>
        </fieldset>
</form>