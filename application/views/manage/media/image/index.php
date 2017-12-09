<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-camera"></i>Image
            </h2>
        </div><br>
    </div>
    <div class="text-right">
        <a href="<?php echo site_url('manage/media/image/upload') ?>" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i>&nbsp;Upload</a>
    </div>
    <?php if ($image == FALSE) { ?>
        <h4 class="text-center">Data Banner kosong. Klik 'Upload' untuk menambahkan banner.</h4>
    <?php } else { ?>
        <div class="col-lg-12">
            <div class="row">
                <div class = "col-xs-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-responsive" id="dimgtable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($image as $i) {
                                    $no+=1;
                                    if ($no % 5 == 1) {
                                        ?>

                                        <tr>
                                            <td class="text-center" style="border: none"><img class="img-thumbnail" style="height: auto" src="<?php echo base_url() . $i['dir'] . 'thumbnail/' . $i['name'] ?>"><div class="clearfix" style="margin-top: 5px"></div>
                                                <a href="<?php echo site_url('manage/media/image/edit/' . $i['id']) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-edit text-primary"></i></a>
                                                <button id="delete" type="button" class="btn btn-default btn-sm" data-url="<?php echo site_url('manage/media/image/delete/' . $i['id']) ?>" data-toggle="modal" data-target="#delete-modal" data-backdrop="static" data-keyboard="false" title="Hapus"><i class="fa fa-close text-danger"></i></button>
                                            </td>
                                        <?php } else if ($no % 5 == 0) { ?>
                                            <td class="text-center" style="border: none"><img class="img-thumbnail" src="<?php echo base_url() . $i['dir'] . 'thumbnail/' . $i['name'] ?>"><div class="clearfix" style="margin-top: 5px"></div>
                                                <a href="<?php echo site_url('manage/media/image/edit/' . $i['id']) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-edit text-primary"></i></a>
                                                <button id="delete" type="button" class="btn btn-default btn-sm" data-url="<?php echo site_url('manage/media/image/delete/' . $i['id']) ?>" data-toggle="modal" data-target="#delete-modal" data-backdrop="static" data-keyboard="false" title="Hapus"><i class="fa fa-close text-danger"></i></button>
                                            </td>

                                        </tr>
                                    <?php } else { ?>
                                    <td class="text-center" style="border: none"><img class="img-thumbnail" src="<?php echo base_url() . $i['dir'] . 'thumbnail/' . $i['name'] ?>"><div class="clearfix" style="margin-top: 5px"></div>
                                        <a href="<?php echo site_url('manage/media/image/edit/' . $i['id']) ?>" class="btn btn-default btn-sm" title="Edit"><i class="fa fa-edit text-primary"></i></a>
                                        <button id="delete" type="button" class="btn btn-default btn-sm" data-url="<?php echo site_url('manage/media/image/delete/' . $i['id']) ?>" data-toggle="modal" data-target="#delete-modal" data-backdrop="static" data-keyboard="false" title="Hapus"><i class="fa fa-close text-danger"></i></button>
                                    </td>

                                    <?php
                                }
                            }
                            $mod = $no % 5;
                            if ($mod != 0) {
                                for ($a = 0; $a < 5 - $mod; $a++) {
                                    ?>
                                    <td style="border: none"></td>
                                    <?php
                                }
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table><br>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <div class="clearfix"></div> 
</div>
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-confirm">
            <div class="modal-body text-center text-semi-bold">
                <p><i class="fa fa-info-circle text-warning fa-2x"></i></p>
                <p>Image ini akan dihapus. Lanjutkan ?</p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary btn-sm" id="btn-modal-delete">Ya</a>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>           
                </div>
            </div>
        </div>
    </div>
</div>