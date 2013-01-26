<div id="send_email">
    <h3>We will mail you the password.You have to enter the email address you used for your registration.</h3>
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
                            'required'=>'required'
                        );
                        echo form_input($data_entry_1);
                        ?>
                        </div>
                </div>
                <?php $btn = array(
                    'class' => 'btn-primary',
                    'id' => 'submit',
                    'name'=>'submit',
                    'value'=>'Send Me Mail',
                    'class'=>'pull-right'
                    );
                ?>
                <?php echo form_submit($btn); ?>
                <?php echo validation_errors('<p class="error">','</p>'); ?>
                <?php echo form_close(); ?>
                
            </div>