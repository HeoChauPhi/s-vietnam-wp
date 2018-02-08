<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>

.hero-mask {
    background: url(<?php echo $src[0]; ?> ); 
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: <?php echo $settings->background_pos; ?>;
    height: <?php echo $settings->height; ?>px;
    width: 100%;
}
<?php
$overlayopacity = ($settings->overlay_opacity / 100);
$overlaycolor = '#' . $settings->overlay_color;
$overlayrgba = sw_hero_overlay_opacity($overlaycolor, $overlayopacity);
?>
.entry-content {
    background-color: <?php echo $overlayrgba; ?>;
    content: '';
    width: 100%;
    height: 100%;
    z-index: 1;
}

.breadcrumbs {
    list-style: none;
    display: flex;
    justify-content: flex-end;
}

.breadcrumbs li,
.breadcrumbs li a {
    color: #<?php echo $settings->crumb_color; ?>;
<?php if ($settings->crumb_size == 'custom') { ?>
    font-size: <?php echo $settings->crumb_font_size; ?>px;
<?php } ?>
}

.breadcrumbs li a:hover {
    color: #<?php echo $settings->crumb_hover_color; ?>;
}

.breadcrumbs li:nth-last-child(1) {
    color: #<?php echo $settings->active_crumb_color; ?>;
}

.breadcrumbs li:after {
    content: '/';
    padding: 0 5px;
}

.breadcrumbs li:nth-last-child(1):after {
    content: '';
    padding: 0 5px;
}

.headline {
    text-align: center;
    padding-top: 100px;
}

.entry-title {
    color: #<?php echo $settings->title_color; ?>;
<?php if ($settings->title_size == 'custom') { ?>
    font-size: <?php echo $settings->title_font_size; ?>px;
<?php } ?>
    margin-bottom: 0;
}

.entry-meta {
<?php if ($settings->meta_size == 'custom') { ?>
    font-size: <?php echo $settings->meta_font_size; ?>px;
<?php } ?>
}

.entry-meta li,
.entry-meta li a {
    color: #<?php echo $settings->meta_color; ?>;
    margin: 0 5px;
    display: inline;
}
.entry-meta li a:hover {
    color: #<?php echo $settings->meta_hover_color; ?>;
}
<?php if($settings->page_title =='yes') { ?>
    .fl-post-header { 
        display: none; 
    }
<?php } ?>