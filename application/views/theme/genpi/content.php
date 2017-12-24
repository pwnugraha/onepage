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
            <div class="col-xs-12 col-sm-12">
                <div class="thumbnail">
                    <div class="text-justify">
                        <?php echo $post['description'] ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
