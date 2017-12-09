<section class="engine"><a href="#">bootstrap themes</a></section>
<section class="header9 cid-qCxg9N3Pfm mbr-fullscreen mbr-parallax-background" id="header9-1g" data-rv-view="1133">
    <div class="container">
        <div class="media-container-column mbr-white col-md-8">
            <h1 class="mbr-section-title align-left mbr-bold pb-3 mbr-fonts-style display-1">FULL SCREEN INTRO</h1>
            <h3 class="mbr-section-subtitle align-left mbr-light pb-3 mbr-fonts-style display-2">Beautiful mobile websites</h3>
            <p class="mbr-text align-left pb-3 mbr-fonts-style display-5">Click any text to edit or style it. Select text to insert a link. Click blue "Gear" icon in the top right corner to hide/show buttons, text, title and change the block background. Click red "+" in the bottom right corner to add a new block. Use the top left menu to create new pages, sites and add themes.</p>
            <div class="mbr-section-btn align-left">
                <a class="btn btn-md btn-primary display-4" href="#">LEARN MORE</a>
                <a class="btn btn-md btn-black-outline display-4" href="#">LIVE DEMO</a>
            </div>
        </div>
    </div>

    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>
<?php
if (!empty($articles)) {
    $arrayKeys = array_keys($articles);
    $lastKey = array_pop($arrayKeys);
    foreach ($articles as $key => $article) {
        if (($key + 1) % 3 == 1) {
            echo '<section class="features3 cid-qCxgpS6PlX" style="padding-top: 50px;padding-bottom: 50px;">'
            . '<div class="container">'
            . '<div class="media-container-row">';
        }
        ?>

        <div class="card p-3 col-12 col-md-6 col-lg-4">
            <div class="card-wrapper">
                <div class="card-img">
                    <img src="<?php echo base_url().$article['dir'].'thumbnail/'.$article['name']?>" alt="Laundry" media-simple="true">
                </div>
                <div class="card-box">
                    <h4 class="card-title mbr-fonts-style display-7"><?php echo $article['title']?></h4>
                    <p class="mbr-text mbr-fonts-style display-7"><?php echo $article['description']?></p>
                </div>
                <div class="mbr-section-btn text-center">
                    <a href="<?php echo site_url('article/read'.$article['rel_url'])?>" class="btn btn-primary display-4">Learn More</a>
                </div>
            </div>
        </div>

        <?php
        if (($key + 1) % 3 == 0 || $key == $lastKey) {
            echo '</div>'
            . '</div>'
            . '</section>';
        }
    }
}
?>
