<?php
if($success) {
    echo '<div class="alert alert-success">The contact has been added succesfully</div>';
}
?>
<script>
    $(function(){
        var company_type_selected = $('#companies').val();
        if(company_type_selected != 1){
            $('#lien_position').hide();
            $('#section').hide();
            $('#department').hide();
            $('#loan_type').hide();
        }
        else {
            $('#lien_position').show();
            $('#section').show();
            $('#department').show();
            $('#loan_type').show();

        }
        $('#companies').live('change',function(e) {
            company_type_selected = $('#companies').val();
            if(company_type_selected != 1){
                $('#lien_position').hide();
                $('#section').hide();
                $('#department').hide();
                $('#loan_type').hide();
            }
            else {
                $('#lien_position').show();
                $('#section').show();
                $('#department').show();
                $('#loan_type').show();

            }
            $.ajax({
               url:'<?= base_url()?>csv/get_company_name_dropdowns?company_type='+company_type_selected,
               type:'GET',
                success: function(data){
                    $('#companies_names').html(data);
                } 
            }); 
       });
       
       $('form').on('submit',function(e){
            $('.alert').remove();
            e.preventDefault();
            $.ajax({
            url:$(this).attr('action'),
            type:'POST',
            data:$(this).serialize(),
            success: function(data){
                if(data == 1){
                    window.location.href = '<?= base_url()?>csv/all_contacts';
                    console.log('here');
                }
                else {
                    msg = '<div class="alert alert-error">Duplicate E-mail. Another contact with this email already exist</div>'; 
                }
                $('form').before(msg)
            }
            });
       });
    });
</script>
    <form method="POST" action="<?= base_url()?>csv/do_edit_contact/<?=$contact->id?>" enctype='multipart/form-data'>
        <fieldset>
        
        <select name="company_id" id='companies'>
            <?
                foreach ($company_types as $key=>$value):
                    if($value == $selected_company->company_type_id){
            ?>
                        <option value="<?=$value?>" selected="selected"> <?=$key?> </option>
            <?
                    }else {
            ?>
                        <option value="<?=$value?>"> <?=$key?> </option>
            <?
                    }
                endforeach;
            ?>
        </select>
        
        
        <div id="companies_names">
        <select name="escalation_level" id='companies'>
            <? 
                foreach($escalations as $escalation):
                    if($escalation->id == $contact->escalation_level_id){
            ?>
                        <option value="<?=$escalation->id?>" selected="selected"> <?=$escalation->escalation_level?> </option>
            <?
                    }else {
            ?>
                        <option value="<?=$escalation->id?>" > <?=$escalation->escalation_level?> </option>
            <?    
                    }
                endforeach;
            ?>
        </select>
        <br/>
        <select name="companies" id='company_name'>
            <? 
                foreach($companies as $company):
                    if($company->id == $selected_company->id){
            ?>
                        <option value="<?=$company->id?>" selected="selected"> <?=$company->company_name?> </option>
            <?
                    }
                    else
                    {
            ?>
                        <option value="<?=$company->id?>"> <?=$company->company_name?> </option>
            <?
                    }
                endforeach;
            ?>
        </select>
        <br/>
        </div>
        <div id="lien_position">
            <select name="lien_position">
                <? 
                    foreach($lien_position as $key=>$value):
                        if($value == $contact->lien_position){
                ?>
                        <option value="<?=$value?>" selected="selected"> <?=$key?> </option>
                <?
                        }
                        else {
                ?>
                        <option value="<?=$value?>"> <?=$key?> </option>
                <?
                        }
                    endforeach;
                ?>
            </select>
            <br/>
        </div>
        <div id="section">
            <select name="section">
                <? 
                    foreach($section as $key=>$value):
                        if($value == $contact->section_id){
                ?>
                        <option value="<?=$value?>" selected="selected"> <?=$key?> </option>
                <?
                        }
                        else{
                ?>
                        <option value="<?=$value?>"> <?=$key?> </option>
                <?
                        }
                    endforeach;
                ?>
            </select>
            <br/>
        </div>
        <div id="department">
            <select name="department">
                <? 
                    foreach($department as $key=>$value):
                        if ( $value == $contact->departmend_id){
                ?>
                            <option value="<?=$value?>" selected="selected"> <?=$key?> </option>
                <?
                        }
                        else {
                ?>
                            <option value="<?=$value?>"> <?=$key?> </option>      
                <?   
                        }
                    endforeach;
                ?>
            </select>
            <br/>
        </div>
        <div id="loan_type">
            <select name="loan_type">
                <? 
                    foreach($loan_type as $key=>$value):
                        if($value == $contact->loan_type_id){
                ?>
                            <option value="<?=$value?>" selected="selected"> <?=$key?> </option>
                <?
                        }
                        else {
                ?>
                            <option value="<?=$value?>"> <?=$key?> </option>
                <?            
                        }
                    endforeach;
                ?>
            </select>
            <br/>
        </div>
        <input type="text" name="first_name" placeholder="First Name" value="<?=$contact->first_name?>"/> <br/>
        <input type="text" name="middle_name" placeholder="Middle Name" value="<?=$contact->suffix?>" /> <br/>
        <input type="text" name="last_name" placeholder="Last Name" value="<?=$contact->last_name?>" /> <br/>
        <input type="text" name="job_title" placeholder="Job Title" value="<?=$contact->job_title?>" /> <br/>
        <input type="text" name="email" placeholder="Email" value="<?=$contact->email?>"/> <br/>
        
        <input type="submit" class="btn btn-inverse" style ='margin-left:150px;'>
        </fieldset>
</form>

