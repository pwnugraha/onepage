<!DOCTYPE html>
<html >
    <head>

        <title>Home</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v4.5.1, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <meta name="description" content="">

        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/web/assets/mobirise-icons/mobirise-icons.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/tether/tether.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/dropdown/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/animatecss/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/socicon/css/styles.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/theme/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/mobirise/css/mbr-additional.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url('assets/laundry-in/') ?>assets/mobirise/css/font-awesome.min.css" type="text/css">

    </head>
    <body id="page-top">

        <!--Navigation-->
        <section class="menu cid-qBvtuOByMs" once="menu" id="menu1-e" data-rv-view="1092">
            <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top collapsed bg-color <?php echo ($this->uri->segment(1) == NULL || $this->uri->segment(2)) ? 'transparent' : '' ?>">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="menu-logo">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="<?php echo site_url() ?>">
                                <img src="<?php echo base_url() . $brand['dir'] . '' . $brand['name'] ?>" alt="Laundry" media-simple="true" style="height: 4.5rem;">
                            </a>
                        </span>
                        <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="#">Laundry-in</a></span>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="<?php echo site_url() ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="<?php echo site_url('article') ?>">Artikel</a></li>
                        <?php foreach ($pages as $page) { ?>
                            <li class="nav-item"><a class="nav-link link text-white display-4" href="<?php echo site_url('informasi/read/') . $page['rel_url'] ?>" class="text-white"><?php echo $page['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </section>
        <?php $this->load->view($child_template) ?>
        <!-- -->
        <section class="footer4 cid-qCDfxIcFne" id="footer4-1l" data-rv-view="1130">
            <div class="container">
                <div class="media-container-row content mbr-white">
                    <div class="col-md-3 col-sm-4">
                        <div class="mb-3 img-logo">
                            <a href="#">
                                <img src="<?php echo base_url() . $brand['dir'] . $brand['name'] ?>" alt="Laundry" media-simple="true" style="height: 4.5rem;">
                            </a>
                        </div>
                        <p class="mb-3 mbr-fonts-style foot-title display-7">LAUNDRY-IN</p>
                        <p class="mbr-text mbr-fonts-style mbr-links-column display-7"><a href="<?php echo site_url() ?>" class="text-white">Home</a><br>
                            <a href="<?php echo site_url('article') ?>" class="text-white">Artikel</a>
                            <?php foreach ($pages as $page) { ?>
                                <br><a href="<?php echo site_url('informasi/read/') . $page['rel_url'] ?>" class="text-white"><?php echo $page['title'] ?></a>
                            <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-8">
                        <p class="mb-4 foot-title mbr-fonts-style display-7">Artikel Terbaru</p>
                        <a style="color: #ffffff" href="<?php echo site_url('article/read/' . $article['rel_url']) ?>"><?php echo (strlen($article['description']) > 200) ? mb_substr(ucwords($article['description']), 0, 200) . '...' : $article['description'] ?></a>
                    </div>
                    <div class="col-md-4 offset-md-1 col-sm-12">
                        <p class="mb-4 foot-title mbr-fonts-style display-7">Contact Us</p>
                        <p><i class="fa fa-home mr-3"></i> <?php echo $sites['alamat'] ?></p>
                        <p><i class="fa fa-envelope mr-3"></i> <?php echo $sites['email'] ?></p>
                        <p><i class="fa fa-phone mr-3"></i> <?php echo $sites['phone'] ?></p>

                        <p class="mb-4 mbr-fonts-style foot-title display-7">CONNECT WITH US</p>
                        <div class="social-list pl-0 mb-0">
                            <div class="soc-item">
                                <a href="<?php echo $sites['twitter'] ?>" target="_blank">
                                    <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="<?php echo $sites['facebook'] ?>" target="_blank">
                                    <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="<?php echo $sites['instagram'] ?>" target="_blank">
                                    <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                                </a>
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="footer-lower">
                    <div class="media-container-row">
                        <div class="col-sm-12">
                            <hr>
                        </div>
                    </div>
                    <div class="media-container-row mbr-white">
                        <div class="col-sm-12 copyright">
                            <p class="mbr-text mbr-fonts-style display-7">© Copyright 2017 - All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/web/assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/tether/tether.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/popper/popper.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/dropdown/js/script.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/touchswipe/jquery.touch-swipe.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/viewportchecker/jquery.viewportchecker.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/playervimeo/vimeo_player.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/parallax/jarallax.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/smoothscroll/smooth-scroll.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/sociallikes/social-likes.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/theme/js/script.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/slidervideo/script.js"></script>
        <script src="<?php echo base_url('assets/laundry-in/') ?>assets/formoid/formoid.min.js"></script>

    </body>
</html>