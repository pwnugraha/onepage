<!DOCTYPE html>
<html >
    <head>
        <!-- Site made with Mobirise Website Builder v4.5.1,  -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v4.5.1, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <meta name="description" content="">

        <title>Genpi</title>

        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/et-line-font-plugin/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/bootstrap-material-design-font/css/material.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/tether/tether.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/dropdown/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/theme/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/mobirise-gallery/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/genpi/') ?>assets/mobirise/css/mbr-additional.css" type="text/css">

    </head>
    <body>
        <section id="menu-a" data-rv-view="19">
            <nav class="navbar navbar-dropdown transparent navbar-fixed-top bg-color" style="<?php echo ($this->uri->segment(1) == NULL || $this->uri->segment(2)) ? '' : 'background: #2969b0 !important;' ?>">
                <div class="container">
                    <div class="mbr-table">
                        <div class="mbr-table-cell">
                            <div class="navbar-brand">
                                <a class="navbar-caption" href="<?php echo site_url() ?>">GENPI</a>
                            </div>
                        </div>
                        <div class="mbr-table-cell">
                            <button class="navbar-toggler pull-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                                <div class="hamburger-icon"></div>
                            </button>
                            <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-xl" id="exCollapsingNavbar">
                                <li class="nav-item">
                                    <a class="nav-link link" href="#">OVERVIEW</a>
                                </li>
                                <li class="nav-item"><a class="nav-link link" href="<?php echo site_url('article') ?>">Artikel</a></li>
                                <li class="nav-item"><a class="nav-link link" href="<?php echo site_url('demo/image') ?>">Image</a></li>
                                <li class="nav-item"><a class="nav-link link" href="<?php echo site_url('demo/video') ?>">Video</a></li>
                                <?php foreach ($pages as $page) { ?>
                                    <li class="nav-item"><a class="nav-link link" href="<?php echo site_url('informasi/read/') . $page['rel_url'] ?>" class="text-white"><?php echo $page['title'] ?></a></li>
                                <?php } ?>
                            </ul>
                            <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                                <div class="close-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
        <?php $this->load->view($child_template)?>

        <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-g" data-rv-view="36" style="background-color: rgb(41, 105, 176); padding-top: 1.75rem; padding-bottom: 1.75rem;">

            <div class="container text-xs-center">
                <p>Copyright (c) 2017. Gomeid</p>
            </div>
        </footer>


        <script src="<?php echo base_url('assets/genpi/') ?>assets/web/assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/tether/tether.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/viewport-checker/jquery.viewportchecker.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/dropdown/js/script.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/touch-swipe/jquery.touch-swipe.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/smooth-scroll/smooth-scroll.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/jarallax/jarallax.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/masonry/masonry.pkgd.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/theme/js/script.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/mobirise-gallery/player.min.js"></script>
        <script src="<?php echo base_url('assets/genpi/') ?>assets/mobirise-gallery/script.js"></script>


        <input name="animation" type="hidden">
    </body>
</html>