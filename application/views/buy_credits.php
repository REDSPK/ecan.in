<?php
?>
<div class="span12">
    <div class="hero-unit">
        <h3>Buy Credits</h3>
        <table class="table-bordered">
            <tr>
                <td>
                    500 credits for <span style="color:green">$<?=ECAN500_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN500_BUTTON_ID;?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </td>
            </tr>
            <tr>
                <td>
                    1500 credits for <span style="color:green">$<?=ECAN1500_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN1500_BUTTON_ID;?>">
                        <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    2500 credits for <span style="color:green">$<?=ECAN2500_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN2500_BUTTON_ID;?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    5000 credits for <span style="color:green">$<?=ECAN5000_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN5000_BUTTON_ID;?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    10000 credits for <span style="color:green">$<?=ECAN10000_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN10000_BUTTON_ID;?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </td>
            </tr>
            <tr>
                <td>
                    25000 credits for <span style="color:green">$<?=ECAN25000_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN25000_BUTTON_ID;?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="hidden" name="notify_url" value="<?=PAYPAL_CALLBACK_URL?>">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </td>
            </tr>
            <tr>
                <td>
                    50000 credits for <span style="color:green">$<?=ECAN50000_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN50000_BUTTON_ID;?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="hidden" name="notify_url" value="<?PAYPAL_CALLBACK_URL?>">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </td>
            </tr>
            <tr>
                <td>
                    100000 credits for <span style="color:green">$<?=ECAN100000_PRICE;?>.00</span>
                </td>
                <td>
                    <form action="<?=PAYPAL_URL?>" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="<?=ECAN100000_BUTTON_ID;?>">
                        <input type="hidden" name="custom" value="<?=$this->session->userdata('username');?>">
                        <input type="hidden" name="return" value="<?= PAYPAL_RETURN_URL?>">
                        <input type="hidden" name="payment_type" value="1">
                        <input type="hidden" name="ipn_type" value="4">
                        <input type="hidden" name="notify_url" value="<?= PAYPAL_CALLBACK_URL?>">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </td>
            </tr>
        </table>
    </div>
</div>