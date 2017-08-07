<?php

$imgborder = $settings->img_border;
$outline = $settings->border_outline;
$bordercolor = '"#' . $settings->border_color . '"';
$outlinecolor = '"#' . $settings->outline_color . '"';
$overlaycolor = '"#' . $settings->overlay_color . '"';
$overlayopacity = $settings->overlay_opacity;
$borderwidth = $settings->border_width;
$borderradius = $settings->border_radius;
$imgeffects = $settings->image_effects;
$reveffects = $settings->reverse_effects;
$imgresult = '"' . $settings->effect_result . '"';
$layout = '"' . $settings->format . '"';

$textbgcolor = '"#' . $settings->text_bg_color . '"';
$textbgopacity = $settings->text_bg_opacity;
$textpadtop = $settings->text_bg_padding_top;
$textpadright = $settings->text_bg_padding_right;
$textpadbottom = $settings->text_bg_padding_bottom;
$textpadleft = $settings->text_bg_padding_left;

$lightboxopacity = $settings->lightbox_opacity;
$spinner = '"#' . $settings->spinner . '"';
$lightbox = $settings->lightbox;
$loop = $settings->loop;
$arrows = $settings->arrows;
$height = '"' . $settings->height . 'px"';
$width = '"' . $settings->width . '%"';
$easing = '"' . $settings->easing . '"';
$links = $settings->links;
?>

(function($) {

	$(function() {
    
        $(".<?php echo $id; ?>-sw-masonry-gallery").unitegallery({
        tile_enable_textpanel:<?php echo $settings->captions; ?>,
        tile_enable_icons:<?php echo $settings->icons; ?>,
        tiles_type:<?php echo $layout; ?>,
		tile_enable_action:	<?php echo $settings->lightbox; ?>,
        tile_show_link_icon:<?php echo $links; ?>,
        tile_enable_border:<?php echo $imgborder; ?>,
        tile_border_color:<?php echo $bordercolor; ?>,
        tile_border_width:<?php echo $borderwidth; ?>,
        tile_border_radius:<?php echo $borderradius; ?>,
        
        tile_enable_outline:<?php echo $outline; ?>,
        tile_outline_color:<?php echo $outlinecolor; ?>,

        tile_overlay_color:<?php echo $overlaycolor; ?>,
        tile_overlay_opacity:<?php echo $overlayopacity; ?>,

        tile_enable_image_effect:<?php echo $imgeffects; ?>,
        tile_image_effect_type:<?php echo $imgresult; ?>,
        tile_image_effect_reverse:<?php echo $reveffects; ?>,

        tile_textpanel_padding_top:<?php echo $textpadtop; ?>,
        tile_textpanel_padding_bottom:<?php echo $textpadbottom; ?>,
        tile_textpanel_padding_right:<?php echo $textpadright; ?>,
        tile_textpanel_padding_left:<?php echo $textpadleft; ?>,
        tile_textpanel_bg_opacity:<?php echo $textbgopacity; ?>,
        tile_textpanel_bg_color:<?php echo $textbgcolor; ?>,

        tiles_justified_row_height: <?php echo $settings->rowHeight; ?>,
        tiles_col_width: <?php echo $settings->rowHeight; ?>,
        tiles_justified_space_between:<?php echo $settings->padding; ?>,
        tiles_space_between_cols:<?php echo $settings->padding; ?>,
	   });

     $('.carousel').slick({
            lazyLoad: 'ondemand',
            dots: false,
            infinite: <?php echo $settings->loop; ?>,
            speed: 300,
            slidesToShow: 5,
            centerMode: false,
            autoplay: <?php echo $settings->autoplay; ?>,
            autoplaySpeed: <?php echo $settings->autoplay_speed; ?>,
            variableWidth: true,
            pauseOnHover: <?php echo $settings->pause; ?>,
            prevArrow: '<span class="panLeft"><i class="fa <?php echo $settings->left_arrow_icon; ?>"></i></span>',
            nextArrow: '<span class="panRight"><i class="fa <?php echo $settings->right_arrow_icon; ?>"></i></span>',
        });

             $( '.swipebox' ).swipebox();

	});

})(jQuery);