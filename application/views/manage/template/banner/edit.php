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
            <h2 class="page-header"><i class="fa fa-fw fa-laptop"></i>Pengaturan Banner
            </h2>
        </div><br>
        <div class="col-sm-12">
            <div class="col-sm-8">
                <img class="img-thumbnail img-responsive" src="<?php echo base_url() . $banner['dir'] . $banner['name'] ?>">
            </div>
            <div class="col-sm-4">
                <?php echo form_open('manage/template/banner/edit/' . $id_banner); ?>
                <div class="form-group">
                    <label class="control-label">Tampilkan</label>
                    <select class="form-control" name="autoload" id="autoload">
                        <option value="yes" <?php echo ((set_value('autoload') == "yes") ? "selected" : (($banner['autoload'] == "yes" && set_value('autoload') !="no") ? "selected" : "")) ?>>Ya</option>
                        <option value="no" <?php echo ((set_value('autoload') == "no") ? "selected" : (($banner['autoload'] == "no" && set_value('autoload')!= "yes") ? "selected" : "")) ?>>Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Tampil di halaman</label>
                    <select class="form-control" name="page" id="page">
                        <option value="">Pilih...</option>
                        <?php
                        $set = false;
                        $gap1 = $gap2 = 0;
                        foreach ($banner_page as $key => $value):
                            if (set_value('page') == $key) {
                                $set = TRUE;
                            }
                            if ($gap1 == $gap2) {
                                if ($banner['page'] == $key && set_value('page')) {
                                    $gap2+=1;
                                } else {
                                    $gap1+=1;
                                    $gap2+=1;
                                }
                            }
                            ?>
                            <option value="<?php echo $key ?>" <?php echo ((form_error('page')) ? ((set_value('page') == $key) ? "selected" : "") : ((set_value('page') == $key) ? "selected" : (($banner['page'] == $key && !$set && ($gap1 == $gap2)) ? "selected" : ""))) ?>><?php echo $key ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Bagian</label>
                    <select class="form-control" name="section" id="section">
                        <?php
                        $set = false;
                        $gap1 = $gap2 = 0;
                        foreach ($banner_page as $k => $v) {
                            $kpage = ((set_value('page')) ? set_value('page') : $banner['page']);
                            if ($kpage == $k && !form_error('page')) {
                                for ($i = 1; $i <= $v; $i++) {
                                    if (set_value('section') == $i) {
                                        $set = TRUE;
                                    }
                                    if ($gap1 == $gap2 && set_value('section')) {
                                        if ($banner['section'] == $i) {
                                            $gap2+=1;
                                        } else {
                                            $gap1+=1;
                                            $gap2+=1;
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $i ?>"<?php echo ((form_error('section')) ? ((set_value('section') == $i) ? "selected" : "") : ((set_value('section') == $i) ? "selected" : (($banner['section'] == $i && !$set && ($gap1 == $gap2)) ? "selected" : ""))) ?>><?php echo "Section " . $i ?></option>
                                    <?php
                                }
                                break;
                            }
                        }u
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Urutan</label>
                    <select class="form-control" name="sort" id="sort">

                        <option value="">Pilih...</option>
                        <?php
                        $set = false;
                        $gap1 = $gap2 = 0;
                        for ($i = 1; $i <= $max_banner; $i++):
                            if (set_value('sort') == $i) {
                                $set = TRUE;
                            }
                            if ($gap1 == $gap2 && set_value('sort')) {
                                if ($banner['section'] == $i) {
                                    $gap2+=1;
                                } else {
                                    $gap1+=1;
                                    $gap2+=1;
                                }
                            }
                            ?>
                            <option value="<?php echo $i ?>" <?php echo ((form_error('sort')) ? ((set_value('sort') == $i) ? "selected" : "") : ((set_value('sort') == $i) ? "selected" : (($banner['sort'] == $i && !$set && ($gap1 == $gap2)) ? "selected" : ""))) ?>><?php echo $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo site_url('manage/template/banner') ?>" class="btn btn-default">Kembali</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

