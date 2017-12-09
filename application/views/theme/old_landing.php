<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Laundry-in</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">    

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>assets/bootstrap4/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>assets/laundry-in/css/style.min.css" rel="stylesheet">
    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: #059087">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="img-responsive" src="<?php echo base_url().$brand['dir'].'/thumbnail/'.$brand['name']?>"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#article">Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#download">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Intro Header -->
        <header class="masthead" style="background-image: <?php echo 'url(' . base_url() . $theme[0]['dir'] . $theme[0]['name'] . ')'; ?>">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h1 class="brand-heading"><?php echo $theme_contents_title[0]['value'] ?></h1>
                            <p class="intro-text"><?php echo $theme_contents[0]['value'] ?></p>
                            <a href="#about" class="btn btn-circle js-scroll-trigger">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                            <div class="text-center">
                                <a class="button-img" href="https://itunes.apple.com/pl/genre/ios/id36?mt=8" target="_blank">
                                    <img src="<?php echo base_url() ?>assets/laundry-in/img/icon-btn/button-app-store.png" alt="App Store" width="175" height="60" />
                                </a> 
                                <a class="button-img" href="https://play.google.com/store/apps" target="_blank">
                                    <img src="<?php echo base_url() ?>assets/laundry-in/img/icon-btn/button-google-play.png" alt="Google Play" width="175" height="60" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section id="about" class="content-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2><?php echo $theme_contents_title[1]['value'] ?></h2>
                        <p><?php echo $theme_contents[1]['value'] ?></p>

                        <!-- Craousel -->
                        <div id="carouselControlsAbout" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php foreach ($banner_section_1 as $k => $v) { ?>
                                    <div class="carousel-item <?php echo $k == 0 ? "active" : ""; ?>">
                                        <img class="d-block img-fluid" src="<?php echo base_url().$v['dir'].$v['name'] ?>" alt="slide">
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselControlsAbout" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselControlsAbout" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Article Section -->
        <section id="article" class="content-section text-center" style="background-color: #58cbc4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2><?php echo $theme_contents_title[2]['value'] ?></h2>
                        <p><?php echo $theme_contents[2]['value'] ?></p>

                        <!-- Craousel -->
                        <div id="carouselControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                               <?php foreach ($banner_section_2 as $k => $v) { ?>
                                    <div class="carousel-item <?php echo $k == 0 ? "active" : ""; ?>">
                                        <img class="d-block img-fluid" src="<?php echo base_url().$v['dir'].$v['name'] ?>" alt="slide">
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Download Section -->
        <section id="download" class="download-section content-section text-center" style="background-image: <?php echo 'url(' . base_url() . $theme[1]['dir'] . $theme[1]['name'] . ')'; ?>">
            <div class="container">
                <div class="col-lg-8 mx-auto">
                    <h2>Download Aplikasi Laundry-in</h2>
                    <p>You can download Laundry-in for free on the preview page at Start Bootstrap.</p>
                    <a href="#" class="btn btn-default btn-lg">Visit Download Page</a>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section content-section text-center" style="background-image: <?php echo 'url(' . base_url() . $theme[2]['dir'] . $theme[2]['name'] . ')'; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Contact Laundry-in</h2>
                        <p>Feel free to leave us a comment on the
                            <a href="#">Laundry-in template overview page</a>
                            on Start Bootstrap to give some feedback about this theme!</p>
                        <ul class="list-inline banner-social-buttons">
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-default btn-lg">
                                    <i class="fa fa-twitter fa-fw"></i>
                                    <span class="network-name">Twitter</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-default btn-lg">
                                    <i class="fa fa-github fa-fw"></i>
                                    <span class="network-name">Github</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-default btn-lg">
                                    <i class="fa fa-google-plus fa-fw"></i>
                                    <span class="network-name">Google+</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Laundry-in 2017</p>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/laundry-in/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap4/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo base_url() ?>assets/laundry-in/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="<?php echo base_url() ?>assets/laundry-in/js/style.min.js"></script>

    </body>

</html>
