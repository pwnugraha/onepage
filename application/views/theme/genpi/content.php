<!--section section-->
<section class="header8 cid-qBvvGyyO8t mbr-fullscreen" id="header8-i" data-rv-view="1094" style="min-height: 100vh; background-size: cover; background-image: <?php echo 'url(' . base_url() . $post['dir'] . $post['name'] . ')'; ?>">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
    <div class="container align-center" style="text-align: center; padding-top: 150px">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-12">
                <h1 class="mbr-section-title align-center py-2 mbr-bold mbr-fonts-style display-1" style="color: #ffffff; text-align: center">
                    <?php echo ucwords($post['title']) ?>
                </h1>
                <a class="article btn btn-white-outline" href="<?php echo site_url('article') ?>">
                    <p style="font-size: 15px; padding-top: 10px; font-weight: bold">&nbsp;Kembali ke daftar artikel&nbsp;</p></a>
            </div>
        </div>
    </div>
</section>

<section class="content-article" style="padding-top: 50px; padding-bottom: 50px; background-color: #ffffff; word-wrap: break-word">
    <div class="container" >
        <div class="row">
            <div class="col-xs-12 col-sm-11">

                <div class="thumbnail">
                    <div class="text-justify">
                        <?php echo $post['description'] ?>
                    </div>
                </div> 
            </div>
            <div class="col-sm-1" id="share-on">
                <div class="col-sm-12" style="padding-bottom: 5px">
                    <div class="fb-share-button" data-href="<?php echo current_url() ?>" data-layout="box_count" data-size="small" data-mobile-iframe="true">
                        <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(current_url()) ?>&amp;src=sdkpreparse">
                            Bagikan
                        </a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(ucwords($post['title'])) ?>&url=<?php echo urlencode(current_url()) ?>">Tweet</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="col-sm-12">
                    <div class="g-plus" data-action="share" data-href="<?php echo urlencode(current_url()) ?>"></div>
                    <script src="https://apis.google.com/js/platform.js" async defer></script>
                </div>
            </div>
        </div>
    </div>
</section>
