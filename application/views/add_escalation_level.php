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
                  $('h4').after('<div class="alert alert-success">Escalation level has been added</div>');
                  $('form').each (function(){
                    this.reset();
                  });
              }
           });
       }) 
    });
</script>
<div class="row">
    <h4>Add New Escalation Level</h4>
<form action='<?=base_url()?>csv/do_add_escalation' method="POST">
    <select name="company_type">
        <?
            foreach($companies as $key=>$value){
                echo "<option value='$value'>$key</option>";
            }
        ?>
    </select>
    <br/>
    <input type="text" name="escalation_level_name" placeholder="Enter Escalation Name Here"/>
    <br/>
    <input type="text" name="points_required" placeholder="Enter Points Required Here"/>
    <br/>
    <input type="text" name="comments" placeholder="Enter Comments Here"/>
    <br/>
    <input type="submit" value="Enter" class="btn btn-primary">
</form>

</div>