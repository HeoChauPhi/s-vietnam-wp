<?php 

$width = $settings->height;
$height = $settings->width;
$position = $settings->position;
$size = $settings->size;
$color = $settings->color;
$top = $settings->top_padding;
$left = $settings->left_padding;
$font = $settings->font;
if ( $settings->photo_source == 'library' ) {
    $image = $settings->photo_src;
} else {
    $image = $settings->photo_url;
}

?>

.fl-node-<?php echo $id; ?> .tooltip-layout {
    background-image:url('<?php echo $image; ?>'); 
    width: <?php echo $width; ?>px; 
    height: <?php echo $height; ?>px; 
    background-position: <?php echo $position; ?>; 
    background-size: <?php echo $size; ?>; 
    padding-top: <?php echo $top; ?>px; 
    padding-left: <?php echo $left; ?>px; 
    background-repeat: no-repeat;
}

.fl-node-<?php echo $id; ?> .tooltip-layout a { 
    color:#<?php echo $color; ?>;
    font-size:<?php echo $font; ?>px;
}