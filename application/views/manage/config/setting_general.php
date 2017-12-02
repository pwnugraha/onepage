<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert alert-success alert-dismissible" style="margin-bottom: 0; margin-top: 20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?>.</strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-cog"></i> General Setting
            </h2>
        </div>
    </div><br>
    <?php echo form_open('manage/config/general/upd_generalconfig', 'class="form-horizontal" style="padding-bottom: 50px; margin-bottom: 50px;"') ?>
    <div class="form-group">
        <label class="col-sm-2 control-label text-align-left">Title</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="site_title" value="<?php echo $set['site_title'] ?>"> 

        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('title_logo') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Tagline</label>
        <div class="col-sm-4">
            <textarea class="form-control text-area-control" rows="4" name="tagline"><?php echo $set['tagline'] ?></textarea> 
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('tagline') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Site Keyword</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="site_keyword" value="<?php echo $set['site_keyword'] ?>"> 
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('site_keyword') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Site Description</label>
        <div class="col-sm-4">
            <textarea class="form-control text-area-control" rows="4" name="site_description"><?php echo $set['site_description'] ?></textarea> 
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('site_description') ?></label>
    </div>
    <hr><h3 class="text-muted">Contact Info</h3>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Alamat</label>
        <div class="col-sm-4">
            <textarea class="form-control text-area-control" rows="5" name="alamat"><?php echo $set['alamat'] ?></textarea>
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('alamat') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Sms (Only)</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telepon" value="<?php echo $set['phone'] ?>">
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('phone') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Email</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $set['email'] ?>">
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('email') ?></label>
    </div>
    <hr><h3 class="text-muted">Social Media</h3>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Whatsapp</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo $set['whatsapp'] ?>">
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('whatsapp') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Facebook</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="facebooka" name="facebook" value="<?php echo $set['facebook'] ?>">
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('facebook') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Twitter</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $set['twitter'] ?>">
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('twitter') ?></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label  text-align-left">Instagram</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $set['instagram'] ?>">
        </div>
        <label style="text-align: left" class="col-sm-3 control-label text-danger"><?php echo form_error('instagram') ?></label>
    </div>
    <div class="col-sm-offset-1 col-sm-3"><br><input type="hidden" id="p_setting" name="p_setting" value="update">
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="btn-publish-image-contest">Simpan</button>
        </div>
    </div>
    <?php echo form_close() ?>
</div>
