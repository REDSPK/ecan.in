<?php

?>
<script>

$(function(){
    $('form').on('submit',function(e){
        e.preventDefault();
        $('.error').remove();
        $('.alert').remove();
        flag = true;
        $('input').each(function() {
           if($(this).val() == '') {
               flag = false;
               $(this).after('<span class="error">This field cannot be left empty</span>')
           }
        }); 
        if($('#comments').val() == ''){
           $('#comments').after('<span class="error">This field cannot be left empty</span>')
           
       }
       link = $(this).attr('action');
       $.ajax({
          url : link,
          data: $(this).serialize(),
          type:'POST', 
          complete:function(){
            $('legend').after('<div class="alert alert-success">Thanks you for contacting us. We will reach you out via email shortly</div>');
            $('form').each (function(){
                this.reset();
            });
          }
       });
    });
});
</script>
 <div class="row">
  
  <h4> <legend><a href="../../../as"><img src="../../../assets/img/i-contactUS.png" width="35" height="35" alt="Home" /></a>Contact Us  </legend></h4>
  <div class="span11">
    <form action="do_contact_us" method="post" class="form form-horizontal">
      <div class="control-group">
        <label class="control-label" for="Contacter Name">Name*</label>
        <div class="controls">
          <input type="text" name="contact_name" placeholder="Your name here"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="Phone Number">Phone Number*</label>
        <div class="controls">
          <input type="text" name="phone" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="Contacter Name">Email*</label>
        <div class="controls">
          <input type="text" name="email" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="Contacter Name">Additional Comments*</label>
        <div class="controls">
          <textarea name="comments" id="comments" style="resize:none;width:60%;height:100px;"></textarea>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btnGreen">Submit</button>
        </div>
      </div>
    </form>
  </div>

</div>