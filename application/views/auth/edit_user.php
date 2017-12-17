<div class="container-fluid">
    <div class="row">
        <div id="infoMessage"><?php echo $message; ?></div>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-user"></i><?php echo lang('edit_user_heading');?></h2>
        </div><br>
        <div class="col-sm-12">
            <p><?php echo lang('edit_user_subheading'); ?></p>
            <?php echo form_open('auth/edit_user/'.$user->id, 'class="form-horizontal" style="margin-bottom:50px;"'); ?>

            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left">Username:</label>
                <div class="col-sm-4">
                    <?php echo form_input('', $this->ion_auth->user()->row()->username, 'class="form-control disabled" disabled'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left"><?php echo lang('edit_user_fname_label', 'first_name'); ?></label>
                <div class="col-sm-4">
                    <?php echo form_input($first_name, '', 'class="form-control"'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left"><?php echo lang('edit_user_lname_label', 'last_name'); ?></label>
                <div class="col-sm-4">
                    <?php echo form_input($last_name, '', 'class="form-control"'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left"> <?php echo lang('edit_user_company_label', 'company'); ?></label>
                <div class="col-sm-4">
                    <?php echo form_input($company, '', 'class="form-control"'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-align-left"> <?php echo lang('edit_user_phone_label', 'phone'); ?></label>
                <div class="col-sm-4">
                    <?php echo form_input($phone, '', 'class="form-control"'); ?>
                </div>
            </div>

            <?php if ($this->ion_auth->is_admin()): ?>

                <h4><?php echo lang('edit_user_groups_heading'); ?></h4>
                <?php foreach ($groups as $group): ?>
                    <label class="checkbox checkbox-inline">
                        <?php
                        $gID = $group['id'];
                        $checked = null;
                        $item = null;
                        foreach ($currentGroups as $grp) {
                            if ($gID == $grp->id) {
                                $checked = ' checked="checked"';
                                break;
                            }
                        }
                        ?>
                        <input type="checkbox" name="groups[]"  value="<?php echo $group['id']; ?>"<?php echo $checked; ?>>
                        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                    </label>
                <?php endforeach ?>

            <?php endif ?>

            <?php echo form_hidden('id', $user->id); ?>
            <?php echo form_hidden($csrf); ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4"><br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
                
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
