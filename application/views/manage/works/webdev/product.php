<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row"><br>
            <?php if ($this->session->flashdata('msg')) { ?>
                <div class="alert <?php echo $this->session->flashdata('alert')?>  alert-dismissible" style="margin-bottom: 0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><?php echo $this->session->flashdata('msg') ?>.</strong>
                </div>
            <?php } ?>
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-fw fa-external-link"></i><?php echo ucfirst($type)?> <small>Product</small>
                </h2>
            </div><br>
            <?php if ($features === FALSE) { ?>
                <h4 class="text-center">Data kosong. Silahkan "Tambah Fitur" untuk menambahkan Fitur/Spesifikasi.</h4>
            <?php } else {
                ?>
                <div class="col-lg-12">
                    <form method="post" action="<?php echo site_url('manage/works/webdev/product_upd/' . $type) ?>">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 27%"><h4><span class="label label-default">Fitur/Spesifikasi</span></h4></th>
                                        <th class="text-center" style="width: 21%"><h4><span class="label label-warning">Paket Bronze</span></h4></th>
                                        <th class="text-center" style="width: 21%"><h4><span class="label label-warning">Paket Silver</span></h4></th>
                                        <th class="text-center" style="width: 21%"><h4><span class="label label-warning">Paket Gold</span></h4></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($features as $v) {
                                        $i+=1;
                                        ?>
                                        <tr>
                                            <td><label class="control-label"><?php echo $v['spec'] ?></label><input type="hidden" name="id_fts_<?php echo $i ?>" value="<?php echo $v['id'] ?>"></td>
                                            <td><input class="form-control text-center input-sm" name="bronze_<?php echo $i ?>" type="text" value="<?php echo $v['bronze'] ?>"></td>
                                            <td><input class="form-control text-center input-sm" name="silver_<?php echo $i ?>" type="text" value="<?php echo $v['silver'] ?>"></td>
                                            <td><input class="form-control text-center input-sm" name="gold_<?php echo $i ?>" type="text" value="<?php echo $v['gold'] ?>"></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-default btn-sm" id="edit" data-id="<?php echo $v['id']?>" data-fts="<?php echo $v['spec']?>" data-toggle="modal" data-target="#edit-modal" data-backdrop="static" data-keyboard="false" title="Edit"><i class="fa fa-edit text-primary"></i></button>
                                                <button id="delete" type="button" class="btn btn-default btn-sm" data-url="<?php echo site_url('manage/works/webdev/feature_delete/' . $v['id'] . '/' . $type . '/' . $v['spec']) ?>" data-toggle="modal" data-target="#delete-modal" data-backdrop="static" data-keyboard="false" title="Hapus"><i class="fa fa-close text-danger"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <input type="hidden" name="c_fts" value="<?php echo $i ?>">
                            <input type="hidden" name="upd_fts" value="u">
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
            <hr>
            <div class="col-sm-10">
                <h4>Fitur/Spesifikasi Baru :</h4>
                <form method="get" action="<?php echo site_url('manage/works/webdev/product/' . $type) ?>">
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nama&nbsp;</label>
                                    <input type="text" class="form-control" name="new_feature" placeholder="Fitur" value="<?php echo set_value('new_feature') ?>">
                                    <span class="text-danger"><?php echo form_error('new_feature') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Bronze&nbsp;</label>
                                    <input type="text" class="form-control" name="bronze_feature" value="<?php echo set_value('bronze_feature') ?>">
                                    <span class="text-danger"><?php echo form_error('bronze_feature') ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label>Silver&nbsp;</label>
                                    <input type="text" class="form-control" name="silver_feature" value="<?php echo set_value('silver_feature') ?>">
                                    <span class="text-danger"><?php echo form_error('silver_feature') ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label>Gold&nbsp;</label>
                                    <input type="text" class="form-control" name="gold_feature" value="<?php echo set_value('gold_feature') ?>">
                                    <span class="text-danger"><?php echo form_error('gold_feature') ?></span>
                                </div>
                                <input type="hidden" name="act" value="c">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="margin-top: 10%;">
        <div class="modal-content modal-confirm">
            <div class="modal-body text-center text-semi-bold">
                <h3 class="text-center">Fitur/Spesifikasi</h3><br>
                <form class="form-horizontal" id="form-uraian-edit" method="post" action="<?php echo site_url('manage/works/webdev/feature_edit/'. $type) ?>" onsubmit="return qvalidate_edit()">
                    <div id="warn-swot-edit" style="display: none" class="alert alert-danger" role="alert"><strong>Isikan data pertanyaan!</strong></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fts-edit" name="fts_edit" value="">
                            <input type="hidden" class="form-control" id="fts-id" name="fts_id" value="">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="btn-modal-edit">Simpan</button>&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>           
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-confirm">
            <div class="modal-body text-center text-semi-bold">
                <p><i class="fa fa-info-circle text-warning fa-2x"></i></p>
                <p>Fitur/Spesifikasi ini akan dihapus. Lanjutkan ?</p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary btn-sm" id="btn-modal-delete">Ya</a>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>           
                </div>
            </div>
        </div>
    </div>
</div>

