<!--section section-->
<section class="header8 cid-qBvvGyyO8t mbr-fullscreen mbr-parallax-background" id="header8-i" data-rv-view="1094" <?php echo (isset($theme[0]['dir']) && isset($theme[0]['name'])) ? 'style="background-image: url(' . base_url() . $theme[0]['dir'] . $theme[0]['name'] . ')"' : '' ?>>
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center py-2 mbr-bold mbr-fonts-style display-1">
                    <?php echo (isset($theme_contents_title[0]['value'])) ? $theme_contents_title[0]['value'] : ''; ?>
                </h1>
                <p class="mbr-text align-center py-2 mbr-fonts-style display-5">
                    <?php echo (isset($theme_contents[0]['value'])) ? $theme_contents[0]['value'] : ''; ?>
                </p>
                <div class="mbr-media show-modal align-center py-2">
                    <span class="mbri-play mbr-iconfont" media-simple="true" data-modal=".modalWindow"></span>
                </div>
                <div class="icon-description align-center font-italic pb-3 mbr-fonts-style display-7">
                    Watch Video</div>
                <div class="mbr-section-btn text-center">
                    <a class="btn btn-img btn-white-outline display-4" href="#" target="_blank">
                        <img src="<?php echo base_url('assets/laundry-in/') ?>assets/images/button-app-store.png" alt="App Store" width="175" height="60">
                    </a> 
                    <a class="btn btn-img btn-white-outline display-4" href="#" target="_blank">
                        <img src="<?php echo base_url('assets/laundry-in/') ?>assets/images/button-google-play.png" alt="Google Play" width="175" height="60">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="modalWindow" style="display: none;">
            <div class="modalWindow-container">
                <div class="modalWindow-video-container">
                    <div class="modalWindow-video">
                        <iframe width="100%" height="100%" frameborder="0" allowfullscreen="1" data-src="<?php echo (isset($theme_homepage_video[0]['value'])) ? $theme_homepage_video[0]['value'] : ''; ?>"></iframe>
                    </div>
                    <a class="close" role="button"  data-dismiss="modal">
                        <span aria-hidden="true" class="mbri-close mbr-iconfont closeModal"></span>
                        <span class="sr-only">Close</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- carousel 1-->
<section class="carousel slide cid-qCwJr9lnOZ" data-interval="false" id="slider2-12" data-rv-view="1097">
    <div class="container content-slider">
        <div class="content-slider-wrap">
            <div class="media-container-row" >
                <div class="title col-12 col-md-8">
                    <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2" style="color: #333;"><?php echo (isset($theme_contents_title[1]['value'])) ? $theme_contents_title[1]['value'] : ''; ?></h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5" style="color: #333;"><?php echo (isset($theme_contents[1]['value'])) ? $theme_contents[1]['value'] : ''; ?></h3>
                    <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner" role="listbox">
                            <?php
                            if (!empty($banner_section_1)) {
                                foreach ($banner_section_1 as $k => $v) {
                                    ?>
                                    <div class="carousel-item slider-fullscreen-image <?php echo $k == 0 ? "active" : ""; ?>" data-bg-video-slide="false">
                                        <div class="container container-slide">
                                            <div class="image_wrapper">
                                                <img src="<?php echo base_url() . $v['dir'] . $v['name'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider2-12">
                            <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider2-12">
                            <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>

<!-- carousel 2-->
<article id="personalizacja" class="section section-3">
    <div class="bg-container js--bg-personalizacja">
        <?php
        if (!empty($banner_section_2)) {
            foreach ($banner_section_2 as $k => $v) {
                ?>
                <div class="bg-personalizacja <?php echo $k == 0 ? "active" : ""; ?>" <?php echo 'style="background-image: url(' . base_url() . $v['dir'] . $v['name'] . '); background-position: center bottom;"'; ?>></div>
                <?php
            }
        }
        ?>
    </div>
    <div class="wrapper">
        <h2 style="text-align: center;"><?php echo (isset($theme_contents_title[2]['value'])) ? $theme_contents_title[2]['value'] : ''; ?></h2>
        <p style="text-align: center;"><?php echo (isset($theme_contents[2]['value'])) ? $theme_contents_title[2]['value'] : ''; ?></p>
    </div>
    <ul class="slider slider-personalizacja">
        <?php
        if (!empty($banner_section_2)) {
            foreach ($banner_section_2 as $k => $v) {
                ?>
                <li class="text-center <?php echo $k == 0 ? "active" : ""; ?>">
                    <div class="" style="max-width: 640px; margin: 0 auto">
                        <img class="img-responsive" src="<?php echo base_url() . $v['dir'] . $v['name'] ?>" alt="tablet-personalization" />
                    </div>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</article>

<!-- -->
<section class="mbr-section content5 cid-qCx2LPmB9O mbr-parallax-background" id="content5-14" data-rv-view="1121" <?php echo (isset($theme[1]['dir']) && isset($theme[1]['name'])) ? 'style="background-image: url(' . base_url() . $theme[1]['dir'] . $theme[1]['name'] . ')"' : '' ?>>
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2"><?php echo (isset($theme_contents_title[3]['value'])) ? $theme_contents_title[3]['value'] : ''; ?></h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5"><?php echo (isset($theme_contents[3]['value'])) ? $theme_contents[3]['value'] : ''; ?></h3>
            </div>
        </div>
    </div>
</section>

<!-- -->
<section class="mbr-section info3 cid-qCwLKeHaak mbr-parallax-background" id="info3-13" data-rv-view="1124" <?php echo (isset($theme[2]['dir']) && isset($theme[2]['name'])) ? 'style="background-image: url(' . base_url() . $theme[2]['dir'] . $theme[2]['name'] . ')"' : '' ?>>
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column title col-12 col-md-10">
                <h2 class="align-left mbr-bold mbr-white pb-3 mbr-fonts-style display-2"><?php echo (isset($theme_contents_title[4]['value'])) ? $theme_contents_title[4]['value'] : ''; ?></h2>
                <h3 class="mbr-section-subtitle align-left mbr-light mbr-white pb-3 mbr-fonts-style display-5">S<?php echo (isset($theme_contents[4]['value'])) ? $theme_contents[4]['value'] : ''; ?></h3>
                <div class="mbr-section-btn align-left py-4">
                    <a class="btn btn-img btn-white-outline display-4" href="#" target="_blank">
                        <img src="<?php echo base_url('assets/laundry-in/') ?>assets/images/button-app-store.png" alt="App Store" width="175" height="60">
                    </a> 
                    <a class="btn btn-img btn-white-outline display-4" href="#" target="_blank">
                        <img src="<?php echo base_url('assets/laundry-in/') ?>assets/images/button-google-play.png" alt="Google Play" width="175" height="60">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>