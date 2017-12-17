<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3><?php echo lang('forgot_password_heading'); ?></h3>
                    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-question-circle-o"></i>
                </div>
            </div>
             
            <div class="form-bottom" style="padding-top: 1px">
               <div id="infoMessage"><?php echo $message; ?></div>
                <?php echo form_open("auth/forgot_password", 'class="login-form"'); ?>
                <div class="form-group">
                    <label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label> <br />
                    <?php echo form_input($identity, '', 'class="form-control"'); ?>
                </div>
                <button type="submit" class="btn">Kirim</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
