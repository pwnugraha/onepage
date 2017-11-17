<div class="container-fluid">
    <div class="row"><br>
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-key"></i>Ubah Password
            </h2>
        </div><br>
        <div class="col-sm-12">
            <?php echo form_open('manage/user/set_pass', 'class="form-horizontal"') ?>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Password Lama</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="oldpassword" name="oldpassword" value="">
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Password Baru</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="password" name="password" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Ulangi Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="repass" name="repass" value="">
                </div>
            </div>
            <input type="hidden" name="act" value="u">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

