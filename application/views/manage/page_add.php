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
            <h2 class="page-header"><i class="fa fa-fw fa-plus"></i>Tambah Halaman
            </h2>
        </div><br>
        <div class="col-sm-12">
            <?php echo form_open('manage/page/add', 'id="fileupload" enctype="multipart/form-data"'); ?>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-pencil"></i><strong>Konten</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Judul</label>
                            <input type="text" class="form-control input-lg" id="title" name="title" value="<?php echo set_value('title') ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Isi</label>
                            <textarea class="form-control text-area-control" rows="80" name="ck_description_field"><?php echo set_value('ck_description_field') ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-fw fa-tags"></i><strong>Tags</strong></div>
                        <div class="panel-body">
                            <input type="text"  class="form-control input-sm" name="tags">
                            Pisahkan tag dengan tanda "," (koma). Contoh: yogyakarta, istimewa, batik
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-info-circle"></i><strong>Info</strong></div>
                    <div class="panel-body">
                        <p><i class="fa fa-fw fa-user"></i><strong>Author :</strong></p>
                        <p><i class="fa fa-fw fa-clock-o"></i><strong>Diposting :</strong></p>
                        <p><i class="fa fa-fw fa-eye"></i><strong>Status :</strong></p>

                    </div>
                </div>
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-fw fa-image"></i><strong> Gambar Utama</strong></div>
                        <div class="panel-body">
                            <?php if (!empty($media_src)) { ?>
                                <div style="margin-bottom: 5px">
                                    <img class="img-responsive img-thumbnail" src="<?php echo base_url() . $media_src['dir'] . 'thumbnail/' . $media_src['name'] ?>">
                                </div>
                                <input type="hidden" name="media_id" value="<?php echo $media_src['id'] ?>">
                            <?php } ?>
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Pilih file</span>
                                        <input type="file" name="files[]" multiple>
                                    </span>
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                            </div>
                            <!-- The table listing the files available for upload/download -->
                            <table role="presentation" class="table table-responsive" style="margin-bottom: 0"><tbody class="files"></tbody></table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-fw fa-save"></i><strong>Simpan sebagai :</strong></div>
                        <div class="panel-body">
                            <input type="radio" <?php echo ((set_value('save_as') == "no") ? "checked" : "") ?> name="save_as" value="no"> Draft<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;atau</span><br>
                            <input type="radio" <?php echo ((set_value('save_as') == "yes") ? "checked" : "") ?> name="save_as" value="yes"> Publish sekarang<br>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="act" value="c">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo site_url('manage/page') ?>" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
    <td>
    <span class="preview"></span>
    <p class="size">Processing...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    {% if (!i && !o.options.autoUpload) { %}
    <button class="btn btn-primary start" disabled>
    <i class="glyphicon glyphicon-upload"></i>
    <span>Upload</span>
    </button>
    {% } %}
    {% if (!i) { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <img src="{%=file.thumbnailUrl%}">
    {% } %}
    </span>
    </td>
    <td>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <i class="glyphicon glyphicon-check"></i>
    <input type="hidden" name="media_update" value="{%=file.id%}">
    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>

