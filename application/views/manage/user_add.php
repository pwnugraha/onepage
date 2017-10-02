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
                <h2 class="page-header"><i class="fa fa-user-plus fa-fw"></i> Tambah User
                </h2>
            </div>
        </div><br>
        <div class="">
            <form class="form-horizontal" method="post" action="<?php echo site_url('manage/user/create') ?>" onsubmit="">
                <h4 class="text-muted">Data User <?php echo $this->session->flashdata('msg')?></h4>
                <div class="form-group">
                    <label class="col-sm-offset-1 col-sm-2 control-label text-align-left">Username </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" maxlength="20" id="username" name="username" placeholder="Username" value="<?php echo set_value('username') ?>">
                    </div>
                    <span class="col-sm-4 text-danger"><?php echo form_error('username') ?></span>
                </div>
                <div class="form-group">
                    <label class="col-sm-offset-1 col-sm-2 control-label text-align-left">Nama </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" maxlength="50" id="name" name="name" placeholder="Nama" value="<?php echo set_value('nama') ?>">
                    </div>
                    <span class="col-sm-4 text-danger"><?php echo form_error('nama') ?></span>
                </div>
                <div class="form-group">
                    <label class="col-sm-offset-1 col-sm-2 control-label text-align-left">Password </label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <span class="col-sm-4 text-danger"><?php echo form_error('password') ?></span>
                </div>
                <div class="form-group">
                    <label class="col-sm-offset-1 col-sm-2 control-label text-align-left">Confirm Password </label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="repass" name="repass">
                    </div>
                    <span class="col-sm-4 text-danger"><?php echo form_error('repass') ?></span>
                </div>
                <div class="form-group">
                    <label class="col-sm-offset-1 col-sm-2 control-label text-align-left">Role </label>
                    <div class="col-sm-2">
                        <select class="form-control" name="role"  id="role">
                            <option value="">Pilih...</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <span class="col-sm-4 text-danger"><?php echo form_error('role') ?></span>
                </div><hr>
                <h4 class="text-muted">Contact Info</h4>
                <div class="form-group">
                    <label  class="col-sm-offset-1 col-sm-2 control-label text-align-left">Email </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>">
                    </div>
                    <span class="col-sm-4 text-danger"><?php echo form_error('email') ?></span>
                </div>
                <div class="form-group">
                    <label  class="col-sm-offset-1 col-sm-2 control-label text-align-left">Telp </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone') ?>">
                    </div>
                    <span class="col-sm-4 text-danger"><?php echo form_error('phone') ?></span>
                </div><br>
                <div class="form-group">
                    <label  class="col-sm-3 control-label"></label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-success" id="save-user-new">Simpan</button>
                    </div>
                </div>
            </form>
        </div><hr>
    </div>
</div>