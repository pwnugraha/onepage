<!--section section-->
<section class="header8 cid-qBvvGyyO8t mbr-fullscreen" id="header8-i" data-rv-view="1094" style="background-image: <?php echo 'url(' . base_url() . $post['dir'] . $post['name'] . ')'; ?>">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center py-2 mbr-bold mbr-fonts-style display-1">
                    <?php echo ucwords($post['title']) ?>
                </h1>
                <a class="article btn btn-white-outline" href="<?php echo site_url('article') ?>">
                    <p>&nbsp;Kembali ke daftar artikel&nbsp;</p></a>
            </div>
        </div>
    </div>
</section>

<section class="content-article" >
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
