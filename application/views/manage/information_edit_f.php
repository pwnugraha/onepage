
<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-sticky-note-o"></i>Perbarui Information
            </h2>
        </div><br>
        <div class="col-sm-12">
            <?php echo form_open('manage/information/edit/' . $id_page, 'class="form-horizontal"'); ?>
                <div class="form-group">
                    <label class="col-sm-1 control-label text-align-left">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-lg" id="title" name="title" value="<?php echo set_value('title') ?>">
                    </div>
                    <div class="col-sm-6 text-danger control-label text-align-left"><?php echo form_error('title') ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label text-align-left">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control text-area-control"  name="ck_description_field" rows="5"><?php echo set_value('ck_description_field') ?></textarea>
                    </div>
                    <div class="col-sm-6 text-danger control-label text-align-left"><?php echo form_error('ck_description_field') ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label text-align-left">Link</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">laundry-in.com/informasi/</span>
                            <input type="text" class="form-control" id="rel_url" name="rel_url" value="<?php echo set_value('rel_url') ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 text-danger control-label text-align-left"><?php echo form_error('rel_url') ?></div>
                </div>
                <input type="hidden" name="act" value="c">
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-9">
                        <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo site_url('manage/information') ?>" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

