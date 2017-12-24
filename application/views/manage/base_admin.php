<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title>Onepage | Admin</title>

        <link href="<?php echo base_url() ?>assets/onepage/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url() ?>assets/onepage/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/onepage/css/theme/admin.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/onepage/css/theme/metisMenu.css" rel="stylesheet"> 
        <link href="<?php echo base_url() ?>assets/onepage/css/theme/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <?php
        if (!empty($assets_header)) {
            foreach ($assets_header as $asset) {
                echo $asset;
            }
        }
        ?>
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
                    <a class="navbar-brand" href="#">onePage</a>
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
                                    <i class="fa fa-users fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="<?php echo site_url('auth') ?>"><i class="fa fa-users fa-fw"></i> Kelola Pengguna</a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-user -->
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left: 10px; padding-right: 10px">
                                    <i class="fa fa-user fa-fw"></i><?php echo $this->ion_auth->user()->row()->username ?><label class="label-user"></label>&nbsp;<i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#"><?php echo $this->ion_auth->user()->row()->first_name . " " . $this->ion_auth->user()->row()->last_name ?></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('auth/edit_user') ?>"><i class="fa fa-user fa-fw"></i> Edit Profil</a>
                                    </li>
                                    <li><a href="<?php echo site_url('auth/change_password') ?>"><i class="fa fa-key fa-fw"></i> Ubah Password</a>
                                        <!--                                    </li>
                                                                            <li><a href="#"><i class="fa fa-question-circle fa-fw"></i> Bantuan</a>
                                                                            </li>-->
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
                                <label class="navig-group">Contents</label>
                                <li <?php if ($this->uri->segment(4) == 'article' || $this->uri->segment(4) == 'event') { ?>
                                        class="active"<?php } ?>>
                                    <a href="<?php echo site_url('manage/information#') ?>"><i class="fa fa-sticky-note-o"></i> <span class="nav-label">Informasi</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a <?php if ($this->uri->segment(4) == 'article') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/post/show/article') ?>">Artikel</a></li>
                                        <li><a <?php if ($this->uri->segment(4) == 'event') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/post/show/event') ?>">Event</a></li>
                                    </ul>
                                </li>
                                <li <?php if ($this->uri->segment(2) == 'media') { ?>
                                        class="active"<?php } ?>>
                                    <a href="<?php echo site_url('manage/media#') ?>"><i class="fa fa-camera"></i> <span class="nav-label">Media</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a <?php if ($this->uri->segment(3) == 'image') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/media/image') ?>">Image</a></li>
                                        <li><a <?php if ($this->uri->segment(3) == 'video') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/media/video') ?>">Video</a></li>
                                    </ul>
                                </li>
                                <li><a <?php if ($this->uri->segment(4) == 'page') { ?>
                                            class="active"<?php } ?> href="<?php echo site_url('manage/post/show/page') ?>"><i class="fa fa-paperclip"></i> <span class="nav-label">Halaman</span></a></li>  
                                <li <?php if ($this->uri->segment(2) == 'other') { ?>
                                        class="active"<?php } ?>>
                                    <a href="<?php echo site_url('manage/other#') ?>"><i class="fa fa-align-justify"></i> <span class="nav-label">Lainnya</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a <?php if ($this->uri->segment(3) == 'portofolio') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/other/portofolio') ?>">Portofolio</a></li>
                                        <li><a <?php if ($this->uri->segment(3) == 'service') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/other/service') ?>">Service</a></li>
                                        <li><a <?php if ($this->uri->segment(3) == 'partner') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/other/partner') ?>">Partner</a></li>
                                    </ul>
                                </li>

                                <label class="navig-group">Settings</label>
                                <li <?php if ($this->uri->segment(2) == 'template') { ?>
                                        class="active"<?php } ?>>
                                    <a href="<?php echo site_url('manage/template#') ?>"><i class="fa fa-laptop"></i> <span class="nav-label">Template</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a <?php if ($this->uri->segment(3) == 'brand') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/template/brand') ?>">Brand</a></li>
                                        <li><a <?php if ($this->uri->segment(3) == 'banner') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/template/banner') ?>">Banner</a></li>
                                        <li><a <?php if ($this->uri->segment(3) == 'homepage') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/template/homepage') ?>">Homepage</a></li>
                                        <li><a <?php if ($this->uri->segment(3) == 'media_tag' && $this->uri->segment(5) == 'image') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/template/media_tag/show/image') ?>">Image Tag</a></li>
                                        <li><a <?php if ($this->uri->segment(3) == 'media_tag' && $this->uri->segment(5) == 'video') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/template/media_tag/show/video') ?>">Video Tag</a></li>
                                    </ul>
                                </li>
                                <li <?php if ($this->uri->segment(2) == 'config') { ?>
                                        class="active"<?php } ?>>
                                    <a href="<?php echo site_url('manage/config#') ?>"><i class="fa fa-cog"></i> <span class="nav-label">Situs</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a <?php if ($this->uri->segment(3) == 'general') { ?>
                                                    class="active"<?php } ?> href="<?php echo site_url('manage/config/general') ?>">General</a></li>                                             
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <?php
                if ($this->uri->segment(1) != 'auth') {
                    $this->load->view($child_template);
                } else {
                    echo $child_template;
                }
                ?>
                <div class="footer" style="position: fixed; bottom: 0; background-color: #e7eaec; border-top: 1px solid #d7d6dc; width: 100%; margin-left: -25px; padding: 7.5px 30px; z-index: 999;">
                    <div class="float-left">onePage Admin by gomeid.com v1.2.1
                    </div>
                </div>
            </div>

            <!-- /#wrapper -->
            <!--end of footer-->
            <script type="text/javascript" src="<?php echo base_url() ?>assets/onepage/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/onepage/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/onepage/js/jquery.slimscroll.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/onepage/js/theme/metisMenu.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/datatables/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/onepage/js/theme/admin.js"></script>
            <?php
            if (!empty($assets_footer)) {
                foreach ($assets_footer as $asset) {
                    echo $asset;
                }
            }
            ?>
            <script>

            </script>

    </body><!--end of main content-->
</html>
