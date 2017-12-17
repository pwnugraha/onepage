<div class="container-fluid">
    <div class="row">
        <div id="infoMessage"><?php echo $message; ?></div>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-paperclip"></i><?php echo lang('create_user_heading'); ?>
            </h2>
        </div><br>
    </div>
    <p><?php echo lang('create_user_subheading'); ?></p>

    <?php echo form_open("auth/create_user", 'class="form-horizontal" style="margin-bottom:50px;"'); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_user_fname_label', 'first_name'); ?></label>
        <div class="col-sm-4">
            <?php echo form_input($first_name, '', 'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_user_lname_label', 'last_name'); ?></label>
        <div class="col-sm-4">
            <?php echo form_input($last_name, '', 'class="form-control"'); ?>
        </div>
    </div>
    <?php
    if ($identity_column !== 'email') {
        echo '<p>';
        echo lang('create_user_identity_label', 'identity');
        echo '<br />';
        echo form_error('identity');
        echo form_input($identity);
        echo '</p>';
    }
    ?>

    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_user_company_label', 'company'); ?> </label>
        <div class="col-sm-4">
            <?php echo form_input($company, '', 'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_user_email_label', 'email'); ?></label>
        <div class="col-sm-4">
            <?php echo form_input($email, '', 'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_user_phone_label', 'phone'); ?></label>
        <div class="col-sm-4">

            <?php echo form_input($phone, '', 'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_user_password_label', 'password'); ?></label>
        <div class="col-sm-4">

            <?php echo form_input($password, '', 'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?></label>
        <div class="col-sm-4">
            <?php echo form_input($password_confirm, '', 'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo site_url('auth') ?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
