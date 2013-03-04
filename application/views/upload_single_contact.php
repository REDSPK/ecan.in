<?php
if($success) {
    echo '<div class="alert alert-success">The contact has been added succesfully</div>';
}
?>
<script>
    $(function(){
       var company_type_selected = $('#companies').val();
       $.ajax({
           url:'<?= base_url()?>csv/get_company_name_dropdowns?company_type='+company_type_selected,
           type:'GET',
            success: function(data){
                $('#companies_names').html(data);
            } 
       });
       
       $('#companies').live('change',function(e){
           console.log('here');
            company_type_selected = $('#companies').val();
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
                var msg;
                if(data == 1){
                    msg = '<div class="alert alert-success">The contact has been added succesfully</div>';
                }
                else {
                    msg = '<div class="alert alert-error">Duplicate E-mail. Another contact with this email already exist</div>'; 
                }
                $('form').before(msg)
            }
            });
       })
    });
</script>
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
        <select name="companies" id='companies'>
            <? 
                foreach($companies as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        <br/>
        <div id="companies_names">
            
        </div>
        OR
        <br/>
        <input type="text" name="company_name_text" placeholder="Type the company name here" /> <br/>
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