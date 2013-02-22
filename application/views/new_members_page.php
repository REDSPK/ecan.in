<script>
    $(function(){
        $('#select_company').change(function(){
            $.ajax({
                url:'<?= base_url()?>CSV/get_company_dropdowns?company_id='+$(this).val(),
                type:'GET',
                success: function(data){
                    $('#optional_checkboxes').html(data);
                } 
            });
        });
    });
</script>
<div class="row">
    <form action='<?= base_url()?>template/post_email' method="POST">
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
            <input type="text" name="loan_number" placeholder="Loan number" /> <br/>
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
<link href="<?php echo base_url().'../assets/css/jquery-ui.css' ?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url().'../assets/js/jquery.ui.core.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url().'../assets/js/jquery.ui.datepicker.js' ?>" type="text/javascript"></script>
<script src="<?php echo base_url().'../assets/js/jquery.ui.widget.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
        $( "#date" ).datepicker({ dateFormat: 'yy-mm-dd' });
      });
</script>