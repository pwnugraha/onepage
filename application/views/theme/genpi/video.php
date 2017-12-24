
<section class="engine"><a href="#">bootstrap slider</a></section>
<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-after-navbar" id="header1-l" data-rv-view="265" style="background-image: url(<?php echo base_url('assets/genpi/') ?>assets/images/jumbotron.jpg);">
    <div class="mbr-table-cell">
        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                    <h1 class="mbr-section-title display-1"><?php echo $theme_contents_title[0]['value'] ?></h1>
                    <p class="mbr-section-lead lead"><?php echo $theme_contents[0]['value'] ?></p>
                    <div class="mbr-section-btn"> 
                        <a class="btn btn-lg btn-white-outline btn-white" href="#">DOWNLOAD</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" data-filter="true" id="gallery1-m" data-rv-view="268" style="background-color: rgb(255, 255, 255); padding-top: 1.5rem; padding-bottom: 1.5rem;">
    <!-- Filter -->
    <div class="mbr-gallery-filter container gallery-filter-active">
        <ul>
            <li class="mbr-gallery-filter-all active">Video</li>
        </ul>
    </div>

    <!-- Gallery -->
    <div class="mbr-gallery-row">
        <div class=" mbr-gallery-layout-default">
            <div>
                <div>
                    <?php
                    if (!empty($media)) {
                        foreach ($media as $key => $v) {
                            ?>
                            <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1 video-slide" data-video-url="<?php echo $v['url'] ?>" data-tags="<?php echo (!isset($v['tag']) || $v['tag'] == '') ? ucfirst('no Tag') : ucfirst($v['tag']) ?>">
                                <div href="#lb-gallery1-m" data-slide-to="<?php echo $key; ?>" data-toggle="modal">
                                    <div></div>
                                    <?php echo html_entity_decode($v['description']) ?>
                                    <span class="icon-video"></span>

                                    <span class="mbr-gallery-title"><?php echo $v['caption'] ?></span>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Lightbox -->
    <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery1-m">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <ol class="carousel-indicators">
                        <?php
                        if (!empty($media)) {
                            foreach ($media as $key => $v) {
                                ?>
                                <li data-app-prevent-settings="" data-target="#lb-gallery1-m" class="<?php echo ($key < 1) ? 'active' : '' ?>" data-slide-to="<?php echo $key ?>"></li>
                                <?php
                            }
                        }
                        ?>    
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        if (!empty($media)) {
                            foreach ($media as $key => $v) {
                                ?>
                                <div class="carousel-item <?php echo ($key < 1) ? 'active' : '' ?> video-container">
                                    <img src="<?php echo base_url('assets/genpi/') ?>assets/images/bike.jpg" alt="">
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <a class="left carousel-control" role="button" data-slide="prev" href="#lb-gallery1-m">
                        <span class="icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" role="button" data-slide="next" href="#lb-gallery1-m">
                        <span class="icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                    <a class="close" href="#" role="button" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
