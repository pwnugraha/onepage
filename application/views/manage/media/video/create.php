<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?></strong>
            </div>
        <?php } ?>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo validation_errors() ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-plus"></i>Tambahkan Video 
            </h2>
        </div><br>
        <div class="col-sm-12">
            <?php echo form_open('manage/media/video/create'); ?>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-pencil"></i><strong>Konten</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title') ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Embed Code</label><br>
                            <code style="word-break: break-all">
                                Contoh: &lt;iframe width="100%" height="100%" src="https://www.youtube.com/embed/LSElrAJcm9s" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen>&lt;/iframe&gt;
                            </code><br>
                            <samp>
                                <strong>Catatan</strong>: Gunakan width="100%" dan height="100%" agar ukuran frame video otomatis menyesuaikan layout.
                            </samp>
                            <textarea class="form-control text-area-control" rows="3" name="embed"><?php echo set_value('embed') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Url Video (optional)</label><br>
                            <code style="word-break: break-all">Contoh: https://www.youtube.com/watch?v=LSElrAJcm9s</code>
                            <input type="text" class="form-control" id="url" name="url" value="<?php echo set_value('url') ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Caption</label>
                            <textarea class="form-control text-area-control" rows="3" name="caption"><?php echo set_value('caption') ?></textarea>
                        </div>
                        <input type="hidden" name="act" value="c">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo site_url('manage/media/video') ?>" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
