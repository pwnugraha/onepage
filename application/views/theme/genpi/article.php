<section classa="features3 cid-qCxgpS6PlX" id="features3-1h" data-rv-view="1141" style="padding-top: 150px; background-color: #f7f7f7">
    <div class="container" id="tourpackages-carousel">

        <div class="row"><?php
            if (!empty($articles)) {
                $ads = FALSE;
                foreach ($articles as $key => $article) {
                    ?>
                    <div class="col-xs-18 col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo base_url() . $article['dir'] . 'thumbnail/' . $article['name'] ?>" alt="<?php echo $article['alt_text'] ?>" style="height: 250px">
                            <div class="caption" style="height: 300px; background-color: #ffffff">
                                <h4 style="height: 70px; margin: 5px 0px 25px; text-align: center; line-height: 1.25em"><?php echo (strlen($article['title']) > 55) ? mb_substr(ucwords($article['title']), 0, 55) . '...' : $article['title'] ?></h4>
                                <div style="height: 105px; padding: 20px 5px 0px; margin-bottom: 20px; text-align: center">
                                    <?php echo (strlen($article['description']) > 120) ? mb_substr(ucwords($article['description']), 0, 120) . '...' : $article['description'] ?>
                                </div>
                                <p style="text-align: center"><a href="<?php echo site_url('article/read/' . $article['rel_url']) ?>" class="btn btn-info btn-xs text-center" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>
                    <?php if ($key == 1) { ?>
                        <div class="col-xs-18 col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="http://placehold.it/500x1200" alt="" style="height: 555px;">
                            </div>
                        </div>
                        <?php
                        $ads = TRUE;
                    }
                }
            }
            ?>
        </div>
        <!-- End row -->

    </div><!-- End container -->
</section>
