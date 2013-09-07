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
            background-color: rgba(0, 0, 0, 0.2);
            z-index: 999;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: none;
        }
        .credit-heading{
            padding-left: 0px;
        }
</style>
    </style>
    <script>
        $(function() {
            $('#overlay').height($('body').height())
            
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
    <div id="ajax-loader" style="position:absolute;top:50%;left:50%;z-index:999;display:none;"><img src="<?php echo base_url().'../assets/img/ajax-loader.gif'?>"></img></div>
    <div id="overlay"></div>
<div id="bar1"> </div> 
<div class="container">
<div id="ecanL"></div>  
    <!-- Header row start here -->
       
        <!-- navigation column-->
      <div class="row">
          <!-- navigation row-->
        <div class="span12 header">
          <ul class="nav nav-pills pull-left">
            <?php
                if ($this->session->userdata('is_logged_in'))
                {
            ?>
              <li><a href="<?php echo base_url('site/member_area'); ?>"><img src="<? echo site_url();?>../assets/img/i-home.png" width="35" height="35" alt="Home" />Home</a></li>
                  <li><a href="<?php echo base_url('user/edit_profile'); ?>"><img src="<? echo site_url();?>../assets/img/i-edit.png" width="80" height="35" alt="Edit Profile" />Edit Profile</a></li>
                  <li><a href="<?php echo base_url('site/history_detail'); ?>"><img src="<? echo site_url();?>../assets/img/i-history.png" width="35" height="35" alt="History" />History</a></li>
                  <li><a href="<?php echo base_url('paypal/buy_credits'); ?>"><img src="<? echo site_url();?>../assets/img/i-buy.png" width="75" height="35" alt="Buy Credits" />Buy Credits</a></li>
                  
          <?php
                }
          else
          {
          ?>
                  <li><a href="<?php echo base_url('login'); ?>"><img src="<? echo site_url();?>../assets/img/i-home.png" width="35" height="35" alt="Home" />Home</a></li>
          <?php
          }
          ?>
          <?php
          if($this->session->userdata('admin'))
          {
          ?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<? echo site_url();?>../assets/img/i-admin.png" width="35" height="35" alt="Admin" />Admin<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('admin/admin_area','Users Table'); ?></li>
                <li><?php echo anchor('admin/review_delete_requests','Member Delete Requests'); ?></li>
                <li><?php echo anchor('csv/review_delete_requests','Contact Delete Requests'); ?></li>
                <li><?php echo anchor('csv/all_contacts','Contacts'); ?></li>
                <li><?php echo anchor('csv/upload_csv','Upload CSV'); ?></li>
                <li><?php echo anchor('csv/enter_contact','Add Contact'); ?></li>
                <li><?php echo anchor('csv/export_contacts','Export Contacts'); ?></li>
                <li><?php echo anchor('admin/export_user_table','Export Users'); ?></li>
                <li><?php echo anchor('admin/get_checkout_requests','Affiliate Checkouts'); ?></li>
                      
              </ul>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<? echo site_url();?>../assets/img/i-contacts.png" width="75" height="35" alt="Contacts" />Contacts <br>
                    Management<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><?php echo anchor('csv/add_escalation_level','Add Escalation Level'); ?></li>
                      <li><?php echo anchor('csv/add_department','Add Department'); ?></li>
                      <li><?php echo anchor('csv/add_company_type','Add Company Type'); ?></li>
                      <li><?php echo anchor('csv/add_company','Add Company'); ?></li>
                      <li><?php echo anchor('csv/add_loantype','Add Loan Type'); ?></li>
                      <li><?php echo anchor('csv/add_section','Add Section'); ?></li>
                      <li><?php echo anchor('csv/add_lien_position','Add Lien Position'); ?></li>
                      <li><?php echo anchor('csv/manage_escalation_levels','Manage Escalation Levels'); ?></li>
                      <li><?php echo anchor('csv/view_company_type','Manage Company Types'); ?></li>
                      <li><?php echo anchor('csv/manage_companies','Manage Companies'); ?></li>
</ul></li>
            <?php 
            }
            else if ($this->session->userdata('employee'))
            {
            ?>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><img src="<? echo site_url();?>../assets/img/i-about.png" width="35" height="35" alt="Home" />Employee <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><?php echo anchor('admin/admin_area','Users Table'); ?></li>
                  <li><?php echo anchor('csv/all_contacts','Contacts'); ?></li>
                  <li><?php echo anchor('csv/enter_contact','Add Contact'); ?></li>
                </ul></li>
            <?    
            }
            else if ($this->session->userdata('affiliate'))
            {    
            ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><img src="<? echo site_url();?>../assets/img/i-about.png" width="35" height="35" alt="Home" />Affiliate <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><?php echo anchor('affiliate/home','Home'); ?></li>
                      <li><?php echo anchor('affiliate/generate_referal_code','Generate Referal Code'); ?></li>
                      <li><?php echo anchor('affiliate/my_referal_codes','My Referal Code'); ?></li>
                      <li><?php echo anchor('affiliate/codes_financials','Financials'); ?></li>
                    </ul>
                </li>
            <?
            }
            ?>
            <li><a href="#"><img src="<? echo site_url();?>../assets/img/i-about.png" width="35" height="35" alt="Home" />About</a></li>
            <li><a href="<?php echo base_url('static_pages/disclaimer');?>"><img src="<? echo site_url();?>../assets/img/i-disclamer.png" width="65" height="35" alt="Home" />Disclaimer</a></li>
            <li><a href="<?php echo base_url('static_pages/contact_us');?>"><img src="<? echo site_url();?>../assets/img/i-contactUs.png" width="70" height="35" alt="Home" />Contact Us</a></li>
            <?php
                if ($this->session->userdata('is_logged_in'))
                {
                  $username=$this->session->userdata('username'); ?>
                  <li><a style="white-space: normal;" href="<?php echo base_url('signout') ?>"><img src="<? echo site_url();?>../assets/img/i-logout.png" width="50" height="35" alt="Home" /><? echo "signout ($username)"?></a></li>
            <?php
               }
           ?>
          </ul>
        </div> 
          <!-- End navigation row-->
       </div> <div class="barbot"></div>
        <!--End navigation column-->
    <!-- End of Header row-->

    <!--  <hr class="hup"><hr class="hdown">-->
      <div id="content"> <div class="row">