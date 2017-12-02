
<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert alert-success alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?>.</strong>
            </div>
        <?php } ?>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo validation_errors() ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-laptop"></i> Brand
            </h2>
        </div>
    </div><br>
    <?php echo form_open('manage/template/brand/', 'class="form-horizontal" style="margin-bottom:50px"'); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left">Logo</label>
        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    if (!$brand) {
                        echo "<p>Belum ada logo yang diupload! Silahkan ke halaman Upload dengan klik tombol upload</p>";
                    } else {
                        ?>
                        <img class="img-responsive" src="<?php echo base_url('') . $brand['dir'] . $brand['name'] ?>">
                    <?php } ?>
                </div>
                <div class="col-sm-12">
                    <a style="margin-top: 10px;" class="btn btn-primary" href="<?php echo site_url('manage/template/brand/upload') ?>"><i class="fa fa-fw fa-upload"></i>Upload</a>
                </div>
            </div>
        </div>
    </div>
    <?php if ($brand): ?>
        <div class="form-group">
            <label class="col-sm-2 control-label text-align-left">Nama Logo</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" value="<?php echo $brand['title'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-align-left">Deskripsi (optional)</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="description" rows="5"><?php echo $brand['description'] ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Simpan</button>
            </div>
        </div>
    <?php endif; ?>
    <?php echo form_close() ?>
</div>
