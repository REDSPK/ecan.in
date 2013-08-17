</div>
</div>

</div>


<div id="bottom"><div class="LineFooter"></div><div class="footerlinks">
<ul>   <li><a href="<?php echo base_url('static_pages/contact_us');?>">Contact Us</a></li>
            <?php
                if ($this->session->userdata('is_logged_in')):
                      $username=$this->session->userdata('username'); ?>
                      <li><a style="white-space: normal;" href="<?php echo base_url('signout') ?>"><? echo "signout ($username)"?></a></li><?php
                endif ?></ul></div></div>
  </body>
</html>
