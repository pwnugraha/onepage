<?php
$post = (isset($post)) ? $post : NULL;
$og = og_data($post_status, $post_type, $brand, $sites, $post);
?>
<meta property="og:site_name"           content="<?php echo $sites['site_title'] ?>" />
<meta property="og:url"           content="<?php echo current_url() ?>" />
<meta property="og:type"           content="<?php echo $og['type'] ?>" />
<meta property="og:title"         content="<?php echo $og['title'] ?>" />
<meta property="og:description"   content="<?php echo $og['description'] ?>" />
<meta property="og:image"         content="<?php echo $og['image'] ?>" />


<?php

function og_data($post_status = FALSE, $post_type = NULL, $brand = NULL, $sites = NULL, $post = NULL) {
    $data['type'] = 'website';
    $data['image'] = base_url() . $brand['dir'] . '' . $brand['name'];
    if (!$post_status) {
        $data['type'] = 'website';
        $data['title'] = $sites['site_title'];
        $data['description'] = $sites['site_description'];
    } else {
        if ($post_type == 'article') {
            $data['type'] = 'article';
            $data['image'] = base_url() . $post['dir'] . '' . $post['name'];
        }
        $data['title'] = $post['title'];
        $data['description'] = $post['description'];
    }
    return $data;
}
