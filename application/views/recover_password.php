<div id="send_email">
    <p style="text-align:center"><br />
    <strong>We will mail you the password.You have to enter the email address you used for your registration.</strong></p>
                <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); ?>
                <?php echo form_open('login/send', $attributes); ?>
              <div class="control-group">
                    <label class="control-label" for="email">Email Address: </label>
                        <div class="controls">
                        <?php
                        $data_entry_1=array(
                            'id'=>'email',
                            'name'=>'email',
                            'value'=>set_value('email'),
                            'placeholder'=>"Type your Email Adress here...",
                            'type' =>'email',
                            'required'=>'required'
                        );
                        echo form_input($data_entry_1);
                        ?> <br /><br />
<?php $btn = array(
                    'class' => 'btnGreen',
                    'id' => 'submit',
                    'name'=>'submit',
                    'value'=>'Send Me Mail',
                    'class'=>'btnGreen'
                    );
                ?>
                <?php echo form_submit($btn); ?>
                <?php echo validation_errors('<p class="error">','</p>'); ?>
                <?php echo form_close(); ?>
                        </div>
                </div>
               
                
            </div>