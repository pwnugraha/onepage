<div class="container-fluid">
    <div class="row">
        <div id="infoMessage"><?php echo $message; ?></div>
        <div class="col-lg-12">
            <h2 class="page-header"><i class="fa fa-fw fa-users"></i> <?php echo lang('index_heading'); ?></h2>
        </div><br>
        <div class="col-lg-12">
            <?php
            $page = false;
            if ($page) {
                ?>
                <div class="float-left">
                    <button type="submit" class="btn btn-default" id="delete_all"><i class="fa fa-fw fa-trash"></i></button>
                </div>
            <?php } ?>
            <div class="text-right">
                <?php
                echo anchor('auth/create_user', '<i class="fa fa-fw fa-user-plus"></i> Pengguna Baru', 'class="btn btn-default"') . '&nbsp;&nbsp;&nbsp;';
                echo anchor('auth/create_group', '<i class="fa fa-fw fa-group"></i> Grup Baru', 'class="btn btn-default"')
                ?>
            </div>
        </div><br>
        <div class="col-lg-12">
            <table class="table table-responsive table-hover" id="dtable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th><?php echo lang('index_fname_th'); ?></th>
                        <th><?php echo lang('index_lname_th'); ?></th>
                        <th><?php echo lang('index_email_th'); ?></th>
                        <th><?php echo lang('index_groups_th'); ?></th>
                        <th><?php echo lang('index_status_th'); ?></th>
                        <th class="no-sort"><?php echo lang('index_action_th'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($users as $user):
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php foreach ($user->groups as $group): ?>
                                    <?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
                                <?php endforeach ?>
                            </td>
                            <td><?php echo ($user->active) ? '<label class="label label-success">Aktif</label>' : '<label class="label label-danger">Tidak aktif</label>'?></td>
                            <td>
                                <?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, '<i class="fa fa-unlock text-success"></i>', 'class="btn btn-default btn-sm" title="Nonaktifkan"') : anchor("auth/activate/" . $user->id, '<i class="fa fa-lock text-danger"></i>', 'class="btn btn-default btn-sm" title="Aktifkan"'); ?>
                                <?php echo anchor("auth/edit_user/" . $user->id, '<i class="fa fa-edit text-primary"></i>', 'class="btn btn-default btn-sm" title="Edit"'); ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>