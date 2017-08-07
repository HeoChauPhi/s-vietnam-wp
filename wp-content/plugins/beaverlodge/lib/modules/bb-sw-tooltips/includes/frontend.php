<?php 

$width = $settings->height;
$height = $settings->width;
$position = $settings->position;
$size = $settings->size;
$color = $settings->color;
$top = $settings->top_padding;
$left = $settings->left_padding;
$font = $settings->font;
$url = $settings->url;

if ( $settings->photo_source == 'library' ) {
    $image = $settings->photo_src;
} else {
    $image = $settings->photo_url;
}

?>
<div class="tooltip-layout">
    
<a href="<?php echo $url; ?>" class="tooltips" title="<?php echo $settings->excerpt; ?>"><?php echo $settings->title; ?></a>

</div>