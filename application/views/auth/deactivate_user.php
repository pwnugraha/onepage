<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-user"></i><?php echo lang('deactivate_heading'); ?></h2>
        </div><br>
        <div class="col-sm-12">
            <p><?php echo lang('edit_user_subheading'); ?></p>
            <p><?php echo sprintf(lang('deactivate_subheading'), $user->username); ?></p>

            <?php echo form_open("auth/deactivate/" . $user->id); ?>

            <div class="form-group">
                <label class="checkbox-inline">
                    <?php echo lang('deactivate_confirm_y_label', 'confirm'); ?>
                    <input type="radio" name="confirm" value="yes" checked="checked" />
                </label>
                <label class="checkbox-inline">
                    <?php echo lang('deactivate_confirm_n_label', 'confirm'); ?>
                    <input type="radio" name="confirm" value="no" />
                </label>
            </div>

            <?php echo form_hidden($csrf); ?>
            <?php echo form_hidden(array('id' => $user->id)); ?>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>