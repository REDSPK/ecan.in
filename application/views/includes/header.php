<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ecan.in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    <link href="<?php echo base_url().'../assets/css/style.css' ?>" rel="stylesheet">
    <script src="<?php echo base_url().'../assets/js/jquery.js' ?>"></script>
    <script src="<?php echo base_url().'../assets/js/jquery.validate.min.js' ?>"></script>
    <script src="<?php echo base_url().'../assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url().'../assets/js/lightbox_me.js' ?>"></script>
    <style>
        #overlay {
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 999;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: none;
        }
    </style>
    <script>
        $(function() {
            $(document).ajaxStart(function(){ 
                $('#ajax-loader').show();
                $('#overlay').show(); 
                
            });
            $(document).ajaxStop(function(){ 
                $('#overlay').hide(); 
                $('#ajax-loader').hide();
            });
        });
    </script>
  </head>

  <body>
    <div class="ajax-loader" style="position:absolute;top:50%;left:50%;z-index:999;display:none;"><img src="<?php echo base_url().'../assets/img/ajax-loader.gif'?>"></img></div>
    <div id="overlay"></div>
     <div class="container">
    <!-- Header row start here -->
       
        <!-- navigation column-->
      <div class="row">
          <!-- navigation row-->
        <div class="span12 header">
          <ul class="nav nav-pills pull-right">
            <?php
                if ($this->session->userdata('is_logged_in')): ?>
                      <li><?php echo anchor('site/member_area','Home'); ?></li>
                      <li><?php echo anchor('edit_profile','Edit Profile'); ?></li>
                      <li><?php echo anchor('site/history_detail','History'); ?></li>
                      <li><?php echo anchor('paypal/buy_credits','Buy Credits'); ?></li>
                      <?php
                else: ?>
                      <li><?php echo anchor('login','Home'); ?></li><?php
                endif ?>
            <?php
                if($this->session->userdata('admin')):?>
                      <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                      <li><?php echo anchor('admin/admin_area','Admin Panel'); ?></li>
                      <li><?php echo anchor('csv/all_contacts','Contacts'); ?></li>
                      <li><?php echo anchor('csv/upload_csv','Upload CSV'); ?></li>
                      <li><?php echo anchor('csv/enter_contact','Add Contact'); ?></li>
                    </ul></li>
                      <?php 
                endif ?>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact Us</a></li>
            <?php
                if ($this->session->userdata('is_logged_in')):
                      $username=$this->session->userdata('username'); ?>
                      <li><?php echo anchor('signout','signout ('.$username.')'); ?></li><?php
                endif ?>
          </ul>
        </div> 
          <!-- End navigation row-->
       </div>
        <!--End navigation column-->
    <!-- End of Header row-->

      <hr class="hup"><hr class="hdown">
      <div id="content">