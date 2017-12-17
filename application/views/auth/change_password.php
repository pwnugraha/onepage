<div class="container-fluid">
    <div class="row">
        <div id="infoMessage"><?php echo $message; ?></div>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-key"></i>Ubah Password
            </h2>
        </div><br>
        <div class="col-sm-12">

            <div id="infoMessage"><?php echo $message; ?></div>

            <?php echo form_open("auth/change_password", 'class="form-horizontal"'); ?>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Password Lama</label>
                <div class="col-sm-4">
                    <?php echo form_input($old_password, '', 'class="form-control"'); ?>
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Password Baru </label>
                <div class="col-sm-4">
                    <?php echo form_input($new_password, '', 'class="form-control" placeholder="minimal ' . $min_password_length . ' karakter"'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Ulangi Password</label>
                <div class="col-sm-4">
                    <?php echo form_input($new_password_confirm, '', 'class="form-control"'); ?>
                </div>
            </div>

            <?php echo form_input($user_id); ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>