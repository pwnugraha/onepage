<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-image"></i>Image
            </h2>
        </div><br>
    </div>
    <br>
    <?php if ($media == FALSE) { ?>
        <br>
        <h4 class="text-center">Data kosong.</h4>
    <?php } else { ?>
        <div class="col-lg-12">
            <div class="row">
                <div class = "col-xs-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dtable">
                            <thead>
                                <tr>
                                    <th class="">No</th>
                                    <th class="text-center" style="width: <?php echo ($media_type == 'image') ? '15%' : '35%' ?>">Image</th>
                                    <th class="text-center">Tipe file</th>
                                    <th class="text-center">Tag</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($media as $i) {
                                    ?>

                                    <tr>
                                        <td class=""><?php echo $no ?></td>
                                        <td class="">
                                            <?php if ($media_type == 'image') { ?>
                                                <img class="img-thumbnail img-responsive" src="<?php echo base_url() . $i['dir'] . 'thumbnail/' . $i['name'] ?>">
                                            <?php } else { ?>
                                                <?php echo html_entity_decode($i['description']) ?>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center"><?php echo ($media_type == 'video') ? 'video' : $i['type'] ?></td>
                                        <td class="text-center">
                                            <?php echo form_open(site_url('manage/template/media_tag/show/' . $media_type)) ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="tag" value="<?php echo (!isset($i['tag']) || $i['tag'] == '') ? 'all' : $i['tag'] ?>">
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $i['id'] ?>">
                                                <button type="submit" class="btn btn-primary">Ubah Tag</button>
                                            </div>

                                            <?php echo form_close() ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $no+=1;
                                }
                                ?>
                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="clearfix"></div> 
</div>