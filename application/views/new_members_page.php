<style>
.popup
{
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

#delete-topic-title 
{
	margin-bottom: 19px;
}
.heading
{
    font-size: 24px;
}
.credits
{
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
        
        $('.partial-blast-button').live('click',function(e){
            e.preventDefault();
            $.ajax({
               url:$('form').attr('action'),
               type: 'POST',
               data:$('form').serialize(),
               success:function() {
                   $('.popup').trigger('close');
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
                var escalation = $('#escalation_level').val();
                var limit = $('#num_of_mails').val();
                $.ajax({
                    url:'<?= base_url()?>template/check_partial_credits?escalation='+escalation+'&limit='+limit,
                    type:'GET',
                    async:false,
                    success:function(data){
                        if(data.code == 2){
                            $('#partial-blast-popup-message').html('You dony have enough credits, however you can send it to '+data.limit+' contacts for '+data.required+' credits');
                            $('#num_of_mails').val(data.limit);
                            $('#partial-blast-popup').lightbox_me({
                                centered: true 
                            });
                            return false;
                        }
                        else
                        {
                            $('#not-enough-credits').html('You need <strong> '+requiredCredits+'</strong> Credits for this blast. Consider decreasing your blast size or buy more credits')
                            $('#confirm-delete-popup').lightbox_me({
                                centered: true 
                            });
                            return false;
                        }
                    }
                });
            }
            else {
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
<div class="row"> <h4>
<img src="../../assets/img/i-home.png" width="35" height="35" alt="Buy Credits" />HOME</h4>
    <div class="span6">
        <form action='<?= base_url()?>template/post_email' method="POST" id="blast-form">
            <fieldset>
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

<div>
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
    <input type="submit" value="submit" class="btnGreen"/>
          </fieldset>
        </form>
    </div>
    <div class="span6" style="text-align:right">
      <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #00AE08; width:90%"> <br />
      </div>
    </div>
    <div class="span6" style="text-align:right; ">
      <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #849BA6; width:90%">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" style="background-color:#ECF0F2">
          <tr>
            <td width="46%" align="left"><h3>Your Credits:
             </h3></td>
            <td width="54%" align="left"><span class="credits my-credits">
              <?=$member['credits'];?>
            </span></td>
          </tr>
          <tr>
            <td align="left"><h3>This Blast: </h3></td>
            <td align="left"><span class="credits required-credits">...</span></td>
          </tr>
          <tr>
            <td align="left" bgcolor="#FFFFFF"> </td>
            <td align="left" bgcolor="#FFFFFF"><a class="btnGreen" href="<?=base_url().'paypal/buy_credits'?>" />Get More Credits                         </a></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="span6">
      <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #00AE08;">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
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
    <h4>Low on fuel?</h4>
    <img src="<?php echo base_url().'../assets/img/low_fuel_light.png' ?>"></img>
    <br/>
    <h4>Fuel up and Keep Blasting!</h4>
    <a href="#" class="btn btn-primary cancel"/>Close</a>
    <a href="<?=base_url().'paypal/buy_credits'?>" class="btn btn-success"/>Buy More Credits</a>
</div>
<div id="partial-blast-popup" class="popup" style="display: none;">
    <legend>Not Enough Credits - Make a partial blast</legend>
    <div id="partial-blast-popup-message" style="margin-bottom: 20px;"></div>
    <a href="#" class="btn btn-success partial-blast-button"/>Make Partial Blast</a>
    <button class="btn cancel" >Cancel</button>
</div>
  <div style="clear:both"></div></div>