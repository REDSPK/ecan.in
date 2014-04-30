<?php

?>
<script>
    $(function(){
       $('form').on('submit',function(e){
           e.preventDefault();
           $('.alert').remove();
           var flag = true;
           if($('#code').val() == '')
           {
                $('h4').after('<div class="alert alert-error">'+'Code cannot be left empty'+'</div>');
                flag = false;
           }
           else if($('#code').val().length != 6)
           {
                $('h4').after('<div class="alert alert-error">'+'Code must be exactly 6 characters'+'</div>');
                flag = false;
           }
           
           if($('#credits').val() == '')
           {
                $('h4').after('<div class="alert alert-error">'+'Credits cannot be left empty'+'</div>');
                flag = false;
           }
           else 
           {
               var intRegex = /^\d+$/;
               if(!intRegex.test($('#credits').val())) {
                    $('h4').after('<div class="alert alert-error">'+'Credits must be integer'+'</div>');
                    flag = false;
               }
               if($('#credits').val() > 275){
                   $('h4').after('<div class="alert alert-error">'+'Credits must be less than 276'+'</div>');
                    flag = false;
               }
           }
           
           if(flag)
           {
               link = $(this).attr('action');
               $.ajax({
                  url : link,
                  data: $(this).serialize(),
                  type:'POST',
                  success:function(data){
                    if(data.code == <?=SUCCESS_CODE?>){
                        window.location.href = '<?php echo base_url('affiliate/codes_financials');?>';
                        $('h4').after('<div class="alert alert-success">'+data.message+'</div>');
                        $('form').each (function(){
                            this.reset();
                        });
                    }
                    else {
                        $('h4').after('<div class="alert alert-error">'+data.message+'</div>');
                    }
                  }
               });
           }
       }); 
    });
    
</script>
<div class="row">
    <h4><img src="../../assets/img/i-contacts-o.png" width="35" height="35" alt="Contacts" />Generate a new Referal code</h4>
<div class="span11"><fieldset><form action='<?=base_url()?>affiliate/do_generate_referal_code' method="POST">
    <input type="text" name="code" placeholder="Enter referal code here" id="code"/> <br/>
    <input type="text" name="num_points" placeholder="Enter the number of points here" id="credits"/> <br/>
    <input type="submit" value="Enter" class="btnGreen">
</form>
</fieldset>

</div></div>