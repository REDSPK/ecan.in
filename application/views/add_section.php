<?php

?>
<script>
    $(function(){
       $('form').on('submit',function(e){
           e.preventDefault();
           $('.alert').remove();
           link = $(this).attr('action');
           $.ajax({
              url : link,
              data: $(this).serialize(),
              type:'POST',
              success:function(data){
                if(data.code == <?=SUCCESS_CODE?>){
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
       }) 
    });
</script>
<div class="row">
    <h4>Add new Section</h4>
<form action='<?=base_url()?>csv/do_add_section' method="POST">
    <select name="company_type">
        <?
            foreach($companies as $key=>$value){
                echo "<option value='$value'>$key</option>";
            }
        ?>
    </select>
    <br/>
    <input type="text" name="section_name" placeholder="Enter Section Name Here"/> <br/>
    <input type="submit" value="Enter" class="btn btn-primary">
</form>

</div>