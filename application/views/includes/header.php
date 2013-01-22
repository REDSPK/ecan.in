<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CodeIgniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    <link href="<?php echo base_url().'assets/css/style.css' ?>" rel="stylesheet">
    <script src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
    <style type="text/css">
    </style>
    <script type="text/javascript">
        $(function(){
            $('#signup_form').on('submit',function(e){
              var flag = true;
              $(':input').each(function(){
                  if($(this).val() == '') {
                    $(this).after('<span class="help-block" style="color:#B94A48">This field cannot be left empty</span>');
                    $(this).css('border-color','#B94A48');
                    flag = false;
                  }
              });    
              if(flag) {
                return true;
              }else {
                e.preventDefault();
                return false;
              }
            });
        });
    </script>
  </head>

  <body>

     <div class="container">
    <!-- Header row start here -->
     
       
        <!-- navigation column-->
      <div class="row">
          <!-- navigation row-->
        <div class="span12 header">
          <ul class="nav nav-pills pull-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contacts</a></li>
            <li><a href="#">Templates</a></li>
          </ul>
        </div> 
          <!-- End navigation row-->
       </div>
        <!--End navigation column-->
    <!-- End of Header row-->

      <hr class="hup"><hr class="hdown">
      <div id="content">
