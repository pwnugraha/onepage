<section class="engine"><a href="#">how to create a website for free</a></section>
<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-after-navbar" id="header1-0" data-rv-view="2" <?php echo (isset($theme[0]['dir']) && isset($theme[0]['name'])) ? 'style="background-image: url(' . base_url() . $theme[0]['dir'] . $theme[0]['name'] . ')"' : '' ?>>
    <div class="mbr-table-cell">
        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                    <h1 class="mbr-section-title display-1"><?php echo $theme_contents_title[0]['value'] ?></h1>
                    <p class="mbr-section-lead lead"><?php echo $theme_contents[0]['value'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-parallax-background" id="content5-7" data-rv-view="5" <?php echo (isset($theme[0]['dir']) && isset($theme[0]['name'])) ? 'style="background-image: url(' . base_url() . $theme[1]['dir'] . $theme[1]['name'] . '); padding-top:120px; padding-bottom:120px;"' : '' ?>>

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container">
        <h3 class="mbr-section-title display-2"><?php echo $theme_contents_title[1]['value'] ?></h3>
        <div class="lead"><p><?php echo $theme_contents[1]['value'] ?></p></div>
    </div>

</section>

<section class="mbr-section article" id="article" style="background-color: rgb(242, 242, 242);">
    <div class="container">
        <div class="text-center">    

            <div class="row">
                <div class="col-sm-12 col-md-8">

                    <div class="row">
                        <?php if (!empty($articles[0])) { ?>
                        <div class="col-xs-18 col-sm-6 col-md-8">
                            <div class="thumbnail">
                                <img src="<?php echo base_url($articles[0]['dir'] . $articles[0]['name']) ?>" alt="<?php echo $articles[0]['alt_text'] ?>" height="260px">

                                <a href="<?php echo site_url($articles[0]['rel_url'])?>"><span class="mbr-gallery-title"><?php echo (strlen($articles[0]['title']) > 20) ? mb_substr(ucwords($articles[0]['title']), 0, 20) . '...' : $articles[0]['title'] ?></span></a>
                            </div>
                        </div>
                        <?php } if (!empty($articles[1])) { ?>
                        <div class="col-xs-18 col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo base_url($articles[1]['dir'] . 'thumbnail/' . $articles[1]['name']) ?>"  alt="<?php echo $articles[1]['alt_text'] ?>">
                                <div class="caption">
                                    <h4><a style="color: #333333; text-decoration: none" href="<?php echo site_url($articles[1]['rel_url'])?>"><?php echo (strlen($articles[1]['title']) > 20) ? mb_substr(ucwords($articles[1]['title']), 0, 20) . '...' : $articles[1]['title'] ?></a></h4>
                                    <?php echo (strlen($articles[1]['description']) > 63) ? mb_substr(ucwords($articles[1]['description']), 0, 63) . '...' : $articles[1]['description'] ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <?php if (!empty($articles[2])) { ?>
                        <div class="col-xs-18 col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo base_url($articles[2]['dir'] . 'thumbnail/' . $articles[2]['name']) ?>"  alt="<?php echo $articles[2]['alt_text'] ?>">
                               <div class="caption">
                                   <h4><a style="color: #333333; text-decoration: none" href="<?php echo site_url($articles[2]['rel_url'])?>"><?php echo (strlen($articles[2]['title']) > 20) ? mb_substr(ucwords($articles[2]['title']), 0, 20) . '...' : $articles[2]['title'] ?></a></h4>
                                    <?php echo (strlen($articles[2]['description']) > 63) ? mb_substr(ucwords($articles[2]['description']), 0, 63) . '...' : $articles[2]['description'] ?>
                                </div>
                            </div>
                        </div>
                        <?php } if (!empty($articles[3])) { ?>
                        <div class="col-xs-18 col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo base_url($articles[3]['dir'] . 'thumbnail/' . $articles[3]['name']) ?>"  alt="<?php echo $articles[3]['alt_text'] ?>">
                                <div class="caption">
                                   <h4><a style="color: #333333; text-decoration: none" href="<?php echo site_url($articles[3]['rel_url'])?>"><?php echo (strlen($articles[3]['title']) > 20) ? mb_substr(ucwords($articles[3]['title']), 0, 20) . '...' : $articles[3]['title'] ?></a></h4>
                                    <?php echo (strlen($articles[3]['description']) > 63) ? mb_substr(ucwords($articles[3]['description']), 0, 63) . '...' : $articles[3]['description'] ?>
                                </div>
                            </div>
                        </div>
                        <?php } if (!empty($articles[4])) { ?>
                        <div class="col-xs-18 col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo base_url($articles[4]['dir'] . 'thumbnail/' . $articles[4]['name']) ?>"  alt="<?php echo $articles[4]['alt_text'] ?>">
                                <div class="caption">
                                   <h4><a style="color: #333333; text-decoration: none" href="<?php echo site_url($articles[4]['rel_url'])?>"><?php echo (strlen($articles[4]['title']) > 20) ? mb_substr(ucwords($articles[4]['title']), 0, 20) . '...' : $articles[4]['title'] ?></a></h4>
                                    <?php echo (strlen($articles[4]['description']) > 63) ? mb_substr(ucwords($articles[4]['description']), 0, 63) . '...' : $articles[4]['description'] ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>     
                </div>

                <div class="col-xs-18 col-sm-12 col-md-4 thumbnail">
                    <div class="thumbnail">
                        <?php if(!empty($event)){ ?>
                        <img src="<?php echo base_url($event['dir'].$event['name']) ?>" alt="<?php echo $event['alt_text'] ?>" height="580px">
                        <?php } ?>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section" id="msg-box5-4" data-rv-view="8" style="background-color: rgb(255, 255, 255); padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="mbr-table-md-up">
                <div class="mbr-table-cell col-md-5 text-xs-center text-md-right content-size">
                    <h3 class="mbr-section-title display-2">IMAGE</h3>
                    <div class="lead">
                        <p>Solid color intro with an image on the right side. Also this block has no paddings.</p>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="<?php echo site_url('demo/image') ?>">MORE</a>
                    </div>
                </div>

                <div class="mbr-table-cell mbr-left-padding-md-up mbr-valign-top col-md-7 image-size" style="width: 60%;">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php
                            if (!empty($image)) {
                                foreach ($image as $k => $v) {
                                    ?>
                                    <div class="carousel-item <?php echo $k == 0 ? "active" : ""; ?>">
                                        <img class="d-block img-fluid" src="<?php echo base_url() . $v['dir'] . $v['name'] ?>" alt="slide">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section" id="msg-box4-5" data-rv-view="11" style="background-color: rgb(242, 242, 242); padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="mbr-table-md-up">
                <div class="mbr-table-cell mbr-right-padding-md-up mbr-valign-top col-md-7 image-size" style="width: 60%;">
                    <div class="mbr-figure mbr-embedded-video">
                        <?php echo html_entity_decode($video['description']) ?>
                    </div>
                </div>
                <div class="mbr-table-cell col-md-5 text-xs-center text-md-left content-size">
                    <h3 class="mbr-section-title display-2">VIDEO</h3>
                    <div class="lead">
                        <p>Online video and Youtube particularly is now more popular than cable television.</p>
                    </div>
                    <div><a class="btn btn-primary" href="<?php echo site_url('demo/video') ?>">MORE</a></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article" id="msg-box3-9" data-rv-view="14" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">SUPPORT BY</h3>
                <div class="py-5">
                    <div class="row">
                        <?php
                        if (!empty($partners)) {
                            foreach ($partners as $partner) {
                                ?>
                                <div class="col-md-3 col-sm-6">
                                    <a href="<?php echo $partner['url'] ?>">
                                        <img class="img-fluid d-block mx-auto" src="<?php echo base_url($partner['dir'] . $partner['name']) ?>" alt="<?php echo $partner['alt_text'] ?>">
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
















