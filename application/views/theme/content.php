<!--section section-->
<section class="header8 cid-qBvvGyyO8t mbr-fullscreen" id="header8-i" data-rv-view="1094" style="background-image: <?php echo 'url(' . base_url() . $post['dir'] . $post['name'] . ')'; ?>">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center py-2 mbr-bold mbr-fonts-style display-1">
                    <?php echo ucwords($post['title']) ?>
                </h1>
                <div class="text-justify">
                    <?php echo $post['description'] ?>
                </div>
                <a class="article btn btn-white-outline" href="<?php echo site_url('article') ?>">
                    <p>Kembali ke daftar artikel</p></a>
            </div>
        </div>
    </div>
</section>

<!-- artikel -->
