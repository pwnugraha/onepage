<div class="container-fluid">
    <div class="row">
        <div id="infoMessage"><?php echo $message; ?></div>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-paperclip"></i><?php echo lang('create_group_heading'); ?>
            </h2>
        </div><br>
    </div>
    <p><?php echo lang('create_group_subheading'); ?></p>
    <?php echo form_open("auth/create_group", 'class="form-horizontal" style="margin-bottom:50px;"'); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_group_name_label', 'group_name'); ?></label>
        <div class="col-sm-4">
            <?php echo form_input($group_name, '', 'class="form-control"'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left"><?php echo lang('create_group_desc_label', 'description'); ?></label>
        <div class="col-sm-4">

            <?php echo form_input($description, '', 'class="form-control"'); ?>
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