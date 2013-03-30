<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
                  $('h4').after('<div class="alert alert-success">Department has been added</div>');
                  $('form').each (function(){
                    this.reset();
                  });
              }
           });
       }) 
    });
</script>
<div class="row">
    <h4>Add New Department</h4>
<form action='<?=base_url()?>csv/do_add_department' method="POST">
    <select name="company_type">
        <?
            foreach($companies as $key=>$value){
                echo "<option value='$value'>$key</option>";
            }
        ?>
    </select>
    <br/>
    <input type="text" name="department_name" placeholder="Enter Department Name Here"/> <br/>
    <input type="submit" value="Enter" class="btn btn-primary">
</form>

</div>