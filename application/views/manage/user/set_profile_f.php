
<div class="container-fluid">
    <div class="row"><br>
        <?php if ($this->session->flashdata('msg')) { ?>
            <div class="alert <?php echo $this->session->flashdata('alert') ?>  alert-dismissible" style="margin-bottom: 0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $this->session->flashdata('msg') ?></strong>
            </div>
        <?php } ?>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-user"></i>Profil
            </h2>
        </div><br>
        <div class="col-sm-12">
            <?php echo form_open('manage/user/profile', 'class="form-horizontal"') ?>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">User</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control disabled" id="userlogin" name="userlogin" value="<?php echo $user['user_login'] ?>" disabled="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Nama</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" maxlength="100" id="name" name="name" value="<?php echo $user['name'] ?>">
                </div>
                <div class="col-sm-6 text-danger control-label text-align-left"><?php echo form_error('name') ?></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Email</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" maxlength="100" id="email" name="email" value="<?php echo $user['email'] ?>">
                </div>
                <div class="col-sm-6 text-danger control-label text-align-left"><?php echo form_error('email') ?></div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Role</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control disabled" id="role" name="role" value="<?php echo $user['role'] ?>" disabled="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Status</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control disabled" id="status" name="status" value="<?php echo (($user['status']) == 1 ? "Aktif" : "Nonaktif") ?>" disabled="">
                </div>
            </div>
            <input type="hidden" name="act" value="c">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

