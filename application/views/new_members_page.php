<style>
.popup{
	padding: 3px 40px 17px 19px;
	background-color: #FAFAFA;
	background-image: -moz-linear-gradient(top, white, #F2F2F2);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(white), to(#F2F2F2));
	background-image: -webkit-linear-gradient(top, white, #F2F2F2);
	background-image: -o-linear-gradient(top, white, #F2F2F2);
	background-image: linear-gradient(to bottom, white, #F2F2F2);
	background-repeat: repeat-x;
	border: 1px solid #D4D4D4;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
        width:300px;
}

#delete-topic-title {
	margin-bottom: 19px;
}
.heading{
    font-size: 24px;
}
.credits{
    font-weight: bold;
    font-size: 24px;
    color:green;
}
</style>
<script>
    $(function(){
        var companyVal = $('#select_company').val();
        
        $.ajax({
            url:'<?= base_url()?>csv/get_company_dropdowns?company_id='+companyVal,
            type:'GET',
            success: function(data){
                $('#optional_checkboxes').html(data);
                updateCredits();
               
            } 
        });
        
        $('#escalation_level').live('change',function(){
            updateCredits();
        });
        
        $('#num_of_mails').on('change',function(){
            updateCredits();
        });
        
        $('#select_company').change(function() {
            $.ajax({
                url:'<?= base_url()?>csv/get_company_dropdowns?company_id='+$(this).val(),
                type:'GET',
                success: function(data){
                    $('#optional_checkboxes').html(data);
                    updateCredits();
                } 
            });
        });
        
        
        $('form').live('submit',function(e) {
            e.preventDefault();
            if(userCredits < requiredCredits) {
                $('#not-enough-credits').html('You need <strong> '+requiredCredits+'</strong> Credits for this blast. Consider decreasing your blast size or buy more credits')
                $('#confirm-delete-popup').lightbox_me({
                    centered: true 
                });
                return false;
            }
            
            $('.help-block').remove();
            if($.trim($('#loan_number').val()) == '') {
                e.preventDefault();
                $('#loan_number').after('<div class="help-block error" style="display:block">Loan Number cannot be left empty</span>')
                return
            }
            else {
                var escalation = $('#escalation_level').val();
                var limit = $('#num_of_mails').val();

                $.ajax({
                    url:'<?= base_url()?>template/have_required_credits/'+escalation+'/'+limit,
                    type:'GET',
                    success:function(data) {
                        if(data.code > 0){
                            $('#not-enough-credits').html('You need <strong>'+data.required+'</strong> Credits for this blast. Consider decreasing your blast size or buy more credits');
                            $('#confirm-delete-popup').lightbox_me({
                                centered: true 
                            });
                        }
                        else{
                            var link = $('#blast-form').attr('action');
                            $.ajax({
                                url:link,
                                type:'POST',
                                data:$('#blast-form').serialize(),
                                success:function(data){
                                    $('input').blur();
                                    if(data.code == <?=SUCCESS_CODE?>) {
                                        updateCredits();
                                        $('#success-msg').html(data.msg + "<strong> "+data.credits_consumed+"</strong> credits consumed")
                                        $('#blast-success-popup').lightbox_me({
                                            centered: true 
                                        });
                                    }else if (data.code == <?=NO_CONTACT_CODE?>){
                                        $('#success-msg').html(data.msg)
                                        $('#blast-success-popup').lightbox_me({
                                            centered: true 
                                        });
                                    }else if (data.code == <?=NOT_ENOUGH_CREDITS_CODE?>) {
                                        $('#not-enough-credits').html('You need <strong> '+data.required+'</strong> Credits for this blast. Consider decreasing your blast size or buy more credits')
                                        $('#confirm-delete-popup').lightbox_me({
                                            centered: true 
                                        });
                                    }
                                }
                            });
                        }

                    }
                });
            }
        });
        
        $('.cancel').on('click',function(){
            $('.popup').trigger('close'); 
        });
        
    });
    
    function updateCredits(){
        var escalation = $('#escalation_level').val();
        var limit = $('#num_of_mails').val();
        $.ajax({
            url:'<?= base_url()?>template/getCredits/'+escalation+'/'+limit,
            type:'GET',
            data:'',
            async:false,
            success:function(data){
                userCredits = data.have;
                requiredCredits = data.required;
                $('.my-credits').html(userCredits);
                if(userCredits<= <?= MIN_CREDITS_THRESHOLD ?>) {
                    $('#low-credits-popup').lightbox_me({
                        centered: true 
                    });
                }
                $('.required-credits').html(requiredCredits);
            }
        });
    }
</script>
<div class="row">
    <div class="span7">
        <form action='<?= base_url()?>template/post_email' method="POST" id="blast-form">
            <fieldset>
            <div class="span4">

                <select name="companies" id="select_company">
                <? 
                    foreach($companies as $key=>$value):
                ?>
                        <option value="<?= $value?>"> <?=$key?> </option>
                <?
                    endforeach;
                ?>
                </select>

                <div id="optional_checkboxes">

                </div>
            </div>
            <div class="span4">
                <select name="num_of_mails" id="num_of_mails">
                    <option value="1">1 contact</option>
                    <option value="2">2 contacts</option>
                    <option value="3">3 contacts</option>
                    <option value="5">5 contacts</option>
                    <option value="10">10 contacts</option>
                    <option value="15">15 contacts</option>
                    <option value="20">20 contacts</option>
                    <option value="30">30 contacts</option>
                </select>
                <span class="help-block">Select the number of contacts to send email to</span>
                <input type="text" name="loan_number" placeholder="Loan number" id='loan_number'/> <br/>
                <input type="text" name="date" id="date" placeholder="Date" /> <br/>

                <label class="checkbox">
                    <input type="checkbox" name="lack_of_contact" value="1" />Lack of Contact
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="message_not_return" value="1" /> Left Messages Not Returned
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="manager_not_contact" value="1" /> Escalated To Manager No Contact
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="disagree" value="1" /> Disagree With Decision
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="inaccurate" value="1" /> Decision was Based on Inaccurate Info
                </label>

                <textarea name="comment" placeholder="Enter Your Comments Here......" style="width:254px;height: 66px;resize:none;"></textarea>
            </div>
            <input type="submit" value="submit" class = 'btn btn-inverse pull-right'/>
            </fieldset>
        </form>
    </div>
    <div class="span4">
        <span class="heading">Your Credits :</span>
        <span class="credits my-credits">... </span>
        <br/>
        <br/>
        <span class="heading">This Blast : </span>
        <span class="credits required-credits">... </span>
        <hr/>
        <a href="<?=base_url().'paypal/buy_credits'?>" style="font-size: 2em;text-decoration: underline;"/>Get More Credits</a>
    </div>
</div>
<link href="<?php echo base_url().'../assets/css/jquery-ui.css' ?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url().'../assets/js/jquery.ui.core.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url().'../assets/js/jquery.ui.datepicker.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url().'../assets/js/jquery.ui.widget.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $( "#date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>

<div id="confirm-delete-popup" class="popup" style="display: none;">
    <legend>Not Enough Credits</legend>
    <div id="not-enough-credits" style="margin-bottom: 20px;"></div>
    <a href="<?=base_url().'paypal/buy_credits'?>" class="btn btn-success"/>Buy Credits</a>
    <button class="btn cancel" >Cancel</button>
</div>

<div id="blast-success-popup" class="popup" style="display: none;">
    <legend>Blast Success</legend>
    <div id="success-msg" style="margin-bottom: 20px;"></div>
    <a href="#" class="btn btn-primary cancel"/>Close</a>
    <a href="<?=base_url().'paypal/buy_credits'?>" class="btn btn-success"/>Buy More Credits</a>
</div>
<div id="low-credits-popup" class="popup" style="display: none;">
    <legend>Fuel More Credits</legend>
    <img src="<?php echo base_url().'../assets/img/low_fuel_light.png' ?>"></img>
    <br/>
    <a href="#" class="btn btn-primary cancel"/>Close</a>
    <a href="<?=base_url().'paypal/buy_credits'?>" class="btn btn-success"/>Buy More Credits</a>
</div>