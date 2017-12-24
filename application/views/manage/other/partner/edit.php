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
            <h2 class="page-header"><i class="fa fa-fw fa-edit"></i> Informasi Partner
            </h2>
        </div>
    </div><br>
    <?php echo form_open('manage/other/partner/edit/' . $image['id'], 'style="margin-bottom:50px;"'); ?>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8">
                        <img class="img-responsive" src="<?php echo base_url('') . $image['dir'] . $image['name'] ?>">
                    </div>

                </div>
            </div>
            <div class="col-sm-12" style="margin-top: 20px">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-info-circle"></i><strong>Info</strong></div>
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered" style="display: block;">
                            <thead style="width: 100%">
                                <tr>
                                    <th class="text-center" style="vertical-align: middle">Diupload oleh</th>
                                    <th class="text-center" style="vertical-align: middle">Ukuran file</th>
                                    <th class="text-center" style="vertical-align: middle">Tipe file</th>
                                    <th class="text-center" style="vertical-align: middle">Diupload pada</th>
                                    <th class="text-center" style="vertical-align: middle">Diperbarui pada</th>
                                    <th class="text-center" style="vertical-align: middle">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" style="vertical-align: top"><?php echo $image['first_name'] . ' ' . $image['last_name'] ?></td>
                                    <td class="text-center" style="vertical-align: top"><?php echo $image['size'] ?></td>
                                    <td class="text-center" style="vertical-align: top"><?php echo $image['type'] ?></td>
                                    <td class="text-center" style="vertical-align: top"><?php echo date('d-m-Y', strtotime($image['created'])) ?></td>
                                    <td class="text-center" style="vertical-align: top"><?php echo date('d-m-Y', strtotime($image['modified'])) ?></td>
                                    <td class="text-center" style="vertical-align: top"><a class="btn btn-primary btn-sm" download="<?php echo $image['name'] ?>" href="<?php echo base_url() . $image['dir'] . $image['name'] ?>"><i class="fa fa-download"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-fw fa-link"></i><strong>Source Image</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="" id="source-img1" value="<?php echo base_url() . $image['dir'] . $image['name'] ?>">
                                <a onclick="copyText(this)" data-id="1" tabindex="0" class="input-group-addon btn btn-primary" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Copied"><i class="fa fa-fw fa-copy"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-fw fa-pencil"></i><strong>Detail Image</strong></div>
            <div class="panel-body">
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
                    <a href="<?php echo site_url('manage/other/partner') ?>" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>
