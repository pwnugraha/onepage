<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title>GOMEID | Admin</title>

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/theme/admin.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/theme/metisMenu.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url() ?>assets/css/theme/style.css" rel="stylesheet">
    </head>
    <!--main content-->
    <body class="fixed-sidebar fixed-nav">
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header navbar-fixed-top">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('kelola') ?>">onePage | Administrator</a>
                    <div class="navbar-fa-right">
                        <ul class="nav navbar-top-links navbar-right">
                            <!-- /.dropdown -->
                            <!-- /.dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left: 10px; padding-right: 10px">
                                    <i class="fa fa-link fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="<?php echo site_url() ?>" target="_blank"><i class="fa fa-link fa-fw"></i> Visit Website</a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-user -->
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left: 10px; padding-right: 10px">
                                    <i class="fa fa-user fa-fw"></i>primawn<label class="label-user"></label>&nbsp;<i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="<?php echo site_url('admin/profil') ?>"><i class="fa fa-user fa-fw"></i> Edit Profil</a>
                                    </li>
                                    <li><a href="<?php echo site_url('bantuan/manual') ?>"><i class="fa fa-question-circle fa-fw"></i> Bantuan</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('auth/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-user -->
                            </li>
                            <!-- /.dropdown -->
                        </ul>
                        <!-- /.navbar-top-links -->
                    </div>
                </div>

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-static-side sidebar">
                    <div id="slimscroll">
                        <div class="collapse navbar-collapse" id="admin-navbar-collapse" aria-expanded="false" style="max-height: 375px;">
                            <ul class="nav in" id="side-menu">
                                <li>
                                    <a <?php if ($this->uri->segment(2) == 'dashboard') { ?>
                                        class="active"<?php } ?>
                                        href="<?php echo site_url('manage/dashboard') ?>"><i class="fa fa-desktop"></i> <span class="nav-label">Dashboard</span></a>
                                </li>
                                <li><a <?php if ($this->uri->segment(2) == 'information') { ?>
                                        class="active"<?php } ?> href="<?php echo site_url('manage/information') ?>"><i class="fa fa-sticky-note-o"></i> <span class="nav-label">Informasi</span></a></li>
                               
                                <label class="navig-group">Settings</label>
                                <li <?php if ($this->uri->segment(2) == 'template') { ?>
                                    class="active"<?php } ?>>
                                    <a href="<?php echo site_url('manage/seting') ?>"><i class="fa fa-laptop"></i> <span class="nav-label">Template</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a <?php if ($this->uri->segment(3) == 'brand') { ?>
                                                class="active"<?php } ?> href="#">Brand</a></li>
                                    </ul>
                                </li>
                                <li <?php if ($this->uri->segment(2) == 'situs') { ?>
                                    class="active"<?php } ?>>
                                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Situs</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a <?php if ($this->uri->segment(3) == 'general') { ?>
                                                class="active"<?php } ?> href="#">General</a></li>                                             
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <?php $this->load->view($child_template) ?>
        </div>
        <!-- /#wrapper -->
        <!--end of footer-->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/theme/metisMenu.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/theme/admin.js"></script>
        <script>
            CKEDITOR.replace( 'ck_description_field' );
        </script>
    </body><!--end of main content-->
</html>
