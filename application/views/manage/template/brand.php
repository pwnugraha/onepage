<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row"><br>
            <?php if ($this->session->flashdata('msg')) { ?>
                <div class="alert alert-success alert-dismissible" style="margin-bottom: 0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><?php echo $this->session->flashdata('msg') ?>.</strong>
                </div>
            <?php } ?>
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-fw fa-laptop"></i> Brand
                </h2>
            </div>
        </div><br>
        <label class="col-sm-1 control-label text-align-left">Logo</label>
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-12">
                    <?php if ($set['site_logo'] != "") { ?>
                        <figure class="img-thumbnail">
                            <img class="img-responsive" src="<?php echo base_url('/') . $set['site_logo'] ?>">
                        </figure>
                    <?php }
                    ?>
                </div>
                <div class="col-sm-12">
                    <a style="margin-top: 10px;" class="btn btn-default" href="<?php echo site_url('manage/template/brand/logo') ?>">Upload</a>
                </div>
            </div>
        </div>
    </div>
</div>

