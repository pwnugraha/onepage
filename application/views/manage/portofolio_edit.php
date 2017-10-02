<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row"><br>
            <?php if ($this->session->flashdata('msg')) { ?>
                <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><?php echo $this->session->flashdata('msg') ?></strong>
                </div>
            <?php } ?>
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-fw fa-external-link"></i>Update Portofolio
                </h2>
            </div><br>
            <div class="col-sm-12">
                <form class="form-horizontal form-syntesa" method="post" action="<?php echo site_url('manage/portofolio/edit/'.$id_portofolio) ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-1 control-label text-align-left">Title</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $portofolio['name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label text-align-left">Url</label>
                        <div class="col-sm-5">
                            <input type="url" class="form-control" id="url" name="url" value="<?php echo $portofolio['url'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label text-align-left">Tipe</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="type">
                                <option value="">Pilih...</option>
                                <option value="company" <?php echo (($portofolio['type']==="company")?"selected":"")?>>Company Profile</option>
                                <option value="shop" <?php echo (($portofolio['type']==="shop")?"selected":"")?>>Online Shop</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label text-align-left">Image</label>
                        <div class="col-sm-5">
                            <img class="img-responsive img-thumbnail" src="<?php echo base_url() . $portofolio['src'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label text-align-left">Ubah Image</label>
                        <div class="col-sm-5">
                            <input type="file" name="fimage" id="fimage" style="padding-top: 7px;">
                        </div>
                    </div>
                    <input type="hidden" name="act" value="u">
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-9">
                            <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo site_url('manage/portofolio') ?>" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

