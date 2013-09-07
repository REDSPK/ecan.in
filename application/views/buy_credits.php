<?php
?>
<div class="row">
  
  <h4>
  <img src="../../assets/img/i-buy.png" width="35" height="35" alt="Buy Credits" />information about credits    </h4>
<div class="span6">
<h4 class="credit-heading">WELCOME</h4>
<p>Thank you for your participation in the Escalation Cannon (eCan.in) Beta. We are not done with our improvements and we encourage the user base to give us feedback as we develop the system further. We do rely on the support of the industry to continue to maintain and update our customer experience. </p>

<h4 class="credit-heading">HOW DOES THIS WORK?</h4>
<p>
    The theory behind this tool came from the need to reach out to the lenders, often without out knowledge about a loan, and with little time on our hands. We would dig through hundreds if not thousands of contacts to try to find someone that could help. We decided it was time to create a tool where we could chose a company and any additional particulars we could find. There was a need to be precise if possible but have the flexibility to open it up to finding the help of anyone that could.  
    We start our system at what we call the CL1 which would be a general contact at the lowest level. For best results start with the lowest level of management (ML1) before jumping to hirer level or even all the way up to the CEO. The ML1 are generally the managers and supervisors to the people that work the phones. To reach their management you take it to the next level and so on. When you reach out to an ML4 you are generally reaching out to AVPs, VPs and key players in the management at the processing levels. If this is a highly escalate matter you can attempt to contact the Office of the President (OOP). Not all banks will have this department but the option will show available for every bank. There are many banks that may have a general box escalation inbox for the OOP which we call OOPG. OOP1 will generally be the lower level phone representatives while OOP5 will general include highest ranking C-Suite Executive and other high ranking executives. Remember that to get the best results escalate through the ranks.
    Additionally some companies will have an Escalation Department that focuses on these types of matters. ES1-ES4 will manage the hierarchy of those escalation contacts. BKs also fallow the same rules as set by the other types. 
</p>
<h4 class="credit-heading">BUYING CREDITS</h4>
<p>
    To avoid repeat transactions and getting the best bang for your buck you should 
    establish what levels of management you believe you will need to 
    escalate to. Keep in mind that the tool is effectively used for 
    escalating files to a large amount of people in a short amount of time.
</p>
<h4 class="credit-heading">DISCLOSURE</h4>
<p>In this industry we found that often we need to reach out to anyone we can get a hold of, which at many times means reaching out to people that might not be necessarily in the same department you are trying to work with, but they will in some cases forward along the complaint to their counterpart in the department that does. Therefore when you choose specifics at the bank you are trying to reach and a specific level.</p>
<p>NOTE: Contacts begin to burn out from time to time so we may also limit the amount of emails allowed to go to a specific contact. If all the contacts at that level have become no longer available you will receive a message that no contacts were found. If no contacts are found we suggest attempting another escalation level or waiting 24-48 hours and trying again. We cannot guarantee any specific results as those largely rely on the response times (if responses are sent at all) by your lender. Check with your lender regularly for updates. This should only be considered supplemental to whatever actions you are already taking. This site does not guarantee any foreclosure postponements. This should be a tool to used simultaneously along with any other avenues you are pursuing with your lender to find their assistance.
****NO REFUNDS**** ****USE AT YOUR OWN RISK**** ****WE ARE NOT (AND ARE NOT AFFILIATED WITH) YOUR LENDER/SERVICER/MORTGAGE HOLDER**</p>
  </div>
  
  
  <div class="span6" style="text-align:right">
    <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #00AE08; width:90%">
      <br />
      
    </div>
  </div>
  
  
  <div class="span6" style="text-align:right; ">
    <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #849BA6; width:90%">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" style="background-color:#ECF0F2">
        <tr>
          <td width="39%" align="left">
            <h3>Your Credits:</h3>
          </td>
          <td width="61%" align="left">
              <span>
                <h3><span class="credits my-credits">
                    <?=$member['credits'];?> 
                </span>
              </span>
          </td>
          </tr>
      </table>
    </div>
</div>


<div class="span6">
    <div style="border-left-width: 3px;	border-left-style: solid;	border-left-color: #00AE08;">
      <table width="92%" border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2"><h3>Buy Credits </h3></td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" align="left"><img src="../../assets/img/cards.png" width="186" height="21" /></td>
        </tr>
        <tr>
          <td width="7%" bgcolor="#ECF0F2">&nbsp;</td>
          <td width="50%" align="left" bgcolor="#ECF0F2">500 credits for <span style="color:#00AE08">$<?=rtrim(ECAN500_PRICE,"0");?>.00</span></td>
          <td width="43%" align="left" bgcolor="#ECF0F2"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN500_BUTTON_ID;?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
        <tr>
          <td bgcolor="#F7F7F7">&nbsp;</td>
          <td align="left" bgcolor="#F7F7F7">1500 credits for <span style="color: #00AE08">$<?=ECAN1500_PRICE;?>
          </span></td>
          <td align="left" bgcolor="#F7F7F7"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd2" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN1500_BUTTON_ID;?>" />
            <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
        <tr>
          <td bgcolor="#ECF0F2">&nbsp;</td>
          <td bgcolor="#ECF0F2">2500 credits for <span style="color:#00AE08">$<?=ECAN2500_PRICE;?>0</span></td>
          <td align="left" bgcolor="#ECF0F2"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd2" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN2500_BUTTON_ID;?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
        <tr>
          <td bgcolor="#F7F7F7">&nbsp;</td>
          <td bgcolor="#F7F7F7">5000 credits for <span style="color:#00AE08">$<?=ECAN5000_PRICE;?>0</span></td>
          <td align="left" bgcolor="#F7F7F7"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd2" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN5000_BUTTON_ID;?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
        <tr>
          <td bgcolor="#ECF0F2">&nbsp;</td>
          <td bgcolor="#ECF0F2">10000 credits for <span style="color:#00AE08">$<?=ECAN10000_PRICE;?>0</span></td>
          <td align="left" bgcolor="#ECF0F2"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd2" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN10000_BUTTON_ID;?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
        <tr>
          <td bgcolor="#F7F7F7">&nbsp;</td>
          <td bgcolor="#F7F7F7">25000 credits for <span style="color:#00AE08">$<?=ECAN25000_PRICE;?>0</span></td>
          <td align="left" bgcolor="#F7F7F7"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd2" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN25000_BUTTON_ID;?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
        <tr>
          <td bgcolor="#ECF0F2">&nbsp;</td>
          <td align="left" bgcolor="#ECF0F2">50000 credits for <span style="color:#00AE08">$<?=ECAN50000_PRICE;?>.00</span></td>
          <td align="left" bgcolor="#ECF0F2"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd2" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN50000_BUTTON_ID;?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="hidden" name="notify_url" value="<?PAYPAL_CALLBACK_URL?>" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
        <tr>
          <td bgcolor="#F7F7F7">&nbsp;</td>
          <td bgcolor="#F7F7F7">100000 credits for <span style="color:#00AE08">$<?=ECAN100000_PRICE;?>.00</span></td>
          <td align="left" bgcolor="#F7F7F7"><form action="<?=PAYPAL_URL?>" method="post">
            <input type="hidden" name="cmd2" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="<?=ECAN100000_BUTTON_ID;?>" />
            <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>" />
            <input type="hidden" name="return" value="<?= PAYPAL_RETURN_URL?>" />
            <input type="hidden" name="payment_type" value="1" />
            <input type="hidden" name="ipn_type" value="4" />
            <input type="hidden" name="notify_url" value="<?= PAYPAL_CALLBACK_URL?>" />
            <input type="image" src="../../assets/img/BuyNow.png" border="0"  wname="submit" alt="PayPal - The safer, easier way to pay online!" width="98" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form></td>
        </tr>
      </table>
    </div>
</div>
      
      
<div style="clear:both"></div></div>