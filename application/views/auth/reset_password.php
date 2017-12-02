<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3><?php echo lang('reset_password_heading'); ?></h3>
                    <div id="infoMessage"><span class="text-danger"><?php echo $message; ?></span></div>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-key"></i>
                </div>
            </div>
            <div class="form-bottom">
                <?php echo form_open('auth/reset_password/' . $code, 'class="login-form"'); ?>
                <div class="form-group">
                    <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length); ?></label> <br />
                    <?php echo form_input($new_password, '', 'class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                    <?php echo form_input($new_password_confirm, '', 'class="form-control"'); ?>
                </div>
                <?php echo form_input($user_id); ?>
                <?php echo form_hidden($csrf); ?>

                <button type="submit" class="btn">Ubah</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>