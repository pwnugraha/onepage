<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <br>
            <?php if ($this->session->flashdata('msg')) { ?>
                <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><?php echo $this->session->flashdata('msg') ?></strong>
                </div>
            <?php } ?>
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-fw fa-external-link"></i>Themes
                </h2>
            </div><br>
        </div>
        <div class="text-right">
            <a href="<?php echo site_url('manage/works/themes/add') ?>" class="btn btn-default"><i class="fa fa-fw fa-plus"></i>&nbsp;New Theme</a>
        </div><br>
        <?php if ($themes == FALSE) { ?>
            <h4 class="text-center">Data Themes kosong. Klik 'New Theme' untuk menambahkan themes</h4>
        <?php } else { ?>
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($themes as $i) { ?>
                        <div class = "col-xs-6 col-sm-4">
                            <figure class="img-thumbnail figure-thumb">
                                <img src = "<?php echo base_url() . $i['src'] ?>" width="100%" height="200" alt="<?php echo $i['name'] ?>">
                                <figcaption class="text-center">
                                    <h4><?php echo ucfirst($i['type']) ?></h4>
                                    <p><a class="text-muted text-bold" href="<?php echo $i['url'] ?>" target="_blank"><?php echo ucwords($i['name']) ?></a></p>
                                    <span>
                                        <a class="btn btn-default btn-sm" href="<?php echo site_url('manage/works/themes/edit/') . $i['id'] ?>"><i class="fa fa-edit text-primary"></i></a>
                                        <button id="delete" type="button" class="btn btn-default btn-sm" data-url="<?php echo site_url('manage/works/themes/themes_delete/' . $i['id']) ?>" data-toggle="modal" data-target="#delete-modal" data-backdrop="static" data-keyboard="false" title="Hapus"><i class="fa fa-close text-danger"></i></button>
                                    </span>
                                </figcaption>
                            </figure>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="clearfix"></div> 
    </div>
</div>
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-confirm">
            <div class="modal-body text-center text-semi-bold">
                <p><i class="fa fa-info-circle text-warning fa-2x"></i></p>
                <p>Theme ini akan dihapus. Lanjutkan ?</p>
                <div class="text-center">
                    <a href="#" class="btn btn-primary btn-sm" id="btn-modal-delete">Ya</a>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>           
                </div>
            </div>
        </div>
    </div>
</div>