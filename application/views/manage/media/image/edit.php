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
            <h2 class="page-header"><i class="fa fa-fw fa-edit"></i> Edit Informasi Image
            </h2>
        </div>
    </div><br>
    <?php echo form_open('manage/media/image/edit/' . $image['id'], 'style="margin-bottom:50px;"'); ?>
    <div class="col-sm-6">
        <img class="img-responsive" src="<?php echo base_url('') . $image['dir'] . $image['name'] ?>">
    </div>
    <div class="col-sm-2">

    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $image['title'] ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Caption</label>
           <textarea class="form-control" name="caption" rows="3"><?php echo $image['caption'] ?></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">Alt text</label>
            <input type="text" class="form-control" name="alt_text" value="<?php echo $image['alt_text'] ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Deskripsi (optional)</label>
            <textarea class="form-control" name="description" rows="3"><?php echo $image['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">Link ke halaman lain(opsional)</label>
            <input type="text" class="form-control" name="url" value="<?php echo $image['url'] ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Simpan</button>
            <a href="<?php echo site_url('manage/media/image') ?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
    <?php echo form_close() ?>
</div>
