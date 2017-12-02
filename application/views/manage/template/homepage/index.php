
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
            <h2 class="page-header"><i class="fa fa-fw fa-laptop"></i> Brand
            </h2>
        </div>
    </div>
    <h3 class="text-muted">Background</h3><br>
    <?php
    if (isset($homepage_background_template)) {
        for ($i = 0; $i < $homepage_background_template; $i++) {
            echo form_open('manage/template/homepage/upload', 'class="form-horizontal" style="margin-bottom:20px"');
            ?>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Background <?php echo $i + 1 ?></label>
                <div class="col-sm-5">
                    <div class="row">
                        <?php
                        $not_found = TRUE;
                        if (!empty($theme)) {
                            foreach ($theme as $v) {
                                if (in_array('homepage_background_template_' . $i, $v)) {
                                    $image = base_url('') . $v['dir'] . $v['name'];
                                    $not_found = FALSE;
                                    break;
                                } else {
                                    $not_found = TRUE;
                                }
                            }
                        }
                        if ($not_found) {
                            echo "<p>Belum ada image yang diupload! Silahkan ke halaman Upload dengan klik tombol upload</p>";
                            ?>
                        <?php } else {
                            ?>
                            <div class="col-sm-12">
                                <img class="img-responsive" src="<?php echo $image ?>">
                            </div>

                            <?php
                        }
                        ?>
                        <input type="hidden" name="param" value="<?php echo 'homepage_background_template_' . $i ?>">
                        <div class="col-sm-12">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i>Upload</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
            <hr>
            <?php
        }
    }
    ?>
    <?php
    $i = 1;
    echo form_open('manage/template/homepage/', 'class="form-horizontal" style="margin-bottom:50px"');
    foreach ($theme_contents as $v) {
        $k=$i-1;
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label text-align-left">Judul Konten <?php echo $i ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="<?php echo $theme_contents_title[$k]['define']?>" value="<?php echo $theme_contents_title[$k]['value']?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-align-left">Deskripsi Konten <?php echo $i ?></label>
            <div class="col-sm-6">
                <textarea class="form-control" name="<?php echo $v['define'] ?>" rows="6"><?php echo $v['value'] ?></textarea>
            </div>
        </div>
        <?php $i++;
    } ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Simpan</button>
        </div>
    </div>
<?php echo form_close() ?>
</div>
