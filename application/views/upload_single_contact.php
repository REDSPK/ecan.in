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
           async:false,
            success: function(data){
                $('#companies_names').html(data);
            } 
       });
       
       $('#companies').live('change',function(e){
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
               async:false,
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
                async:false,
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
        <select name="companies" id='companies'>
            <? 
                foreach($companies as $key=>$value):
            ?>
                    <option value="<?=$value?>"> <?=$key?> </option>
            <?
                endforeach;
            ?>
        </select>
        
        <div id="companies_names">
            
        </div>
        <br/>
        <div id="lien_position">
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
        </div>
        <div id="section">
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
        </div>
        <div id="department">
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
        </div>
        <div id="loan_type">
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
        </div>
        <input type="text" name="first_name" placeholder="First Name" /> <br/>
        <input type="text" name="middle_name" placeholder="Middle Name" /> <br/>
        <input type="text" name="last_name" placeholder="Last Name" /> <br/>
        <input type="text" name="job_title" placeholder="Job Title" /> <br/>
        <input type="text" name="email" placeholder="Email" /> <br/>
        
        <input type="submit" class="btn btn-inverse" style ='margin-left:150px;'>
        </fieldset>
</form>