<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-edit"></i>Edit Halaman
            </h2>
        </div><br>
        <div class="col-sm-12">
            <?php echo form_open('manage/page/edit/' . $id_page, 'id="fileupload" enctype="multipart/form-data"'); ?>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-pencil"></i><strong>Konten</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Judul</label>
                            <input type="text" class="form-control input-lg" id="title" name="title" value="<?php echo $page['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Isi</label>
                            <textarea class="form-control text-area-control" name="ck_description_field" rows="5"><?php echo $page['description'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-fw fa-tags"></i><strong>Tags</strong></div>
                        <div class="panel-body">
                            <?php
                            $tag = "";
                            if (!empty($tags)) {
                                $arrayKeys = array_keys($tags);
                                $lastKey = array_pop($arrayKeys);
                                foreach ($tags as $k => $v) {
                                    if ($k == $lastKey) {
                                        $tag.=$v['name'];
                                    } else {
                                        $tag.=$v['name'] . ', ';
                                    }
                                }
                            }
                            ?>
                            <input type="text"  class="form-control input-sm" name="tags" value="<?php echo $tag ?>">
                            Pisahkan tag dengan tanda "," (koma). Contoh: yogyakarta, istimewa, batik
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-fw fa-link"></i><strong>Link</strong></div>
                        <div class="panel-body">
                            <div class="input-group">
                                <span class="input-group-addon">laundry-in.com/</span>
                                <input type="text" class="form-control" id="rel_url" name="rel_url" value="<?php echo $page['rel_url'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-info-circle"></i><strong>Info</strong></div>
                    <div class="panel-body">
                        <p><i class="fa fa-fw fa-user"></i><strong>Author :</strong><br><i class="fa fa-fw"></i><?php echo $author['first_name'] . " " . $author['last_name'] ?></p>
                        <p><i class="fa fa-fw fa-calendar"></i><strong>Diposting :</strong><br><i class="fa fa-fw"></i><?php echo 'Tanggal : ' . date('d-m-Y', strtotime($page['created'])) . '<br><i class="fa fa-fw"></i>Jam : ' . date('H:i', strtotime($page['created'])) ?></p>
                        <p><i class="fa fa-fw fa-clock-o"></i><strong>Terakhir diperbarui :</strong><br><i class="fa fa-fw"></i><?php echo 'Tanggal : ' . date('d-m-Y', strtotime($page['modified'])) . '<br><i class="fa fa-fw"></i>Jam : ' . date('H:i', strtotime($page['modified'])) ?></p>
                        <p><i class="fa fa-fw fa-eye"></i><strong>Status : </strong><br><i class="fa fa-fw"></i><?php echo (($page['publish'] == 'yes') ? "Publish" : "Draft") ?></p>

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
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-camera"></i><strong> Media</strong></div>
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item" data-toggle="modal" data-target="#gallery-modal" data-backdrop="static" data-keyboard="false">
                                Image Gallery
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-fw fa-save"></i><strong>Simpan sebagai :</strong></div>
                        <div class="panel-body">
                            <input type="radio" <?php echo (($page['publish'] == "no") ? "checked" : "") ?> name="save_as" value="no"> Draft<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;atau</span><br>
                            <input type="radio" <?php echo (($page['publish'] == "yes") ? "checked" : "") ?> name="save_as" value="yes"> Publish sekarang<br>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $page['id'] ?>">
                <input type="hidden" name="act" value="u">
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
<?php $this->load->view('manage/media/image/gallery')?>