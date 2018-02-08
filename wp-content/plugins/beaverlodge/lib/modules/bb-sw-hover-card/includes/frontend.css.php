.col-xs-<?php echo $settings->mobile_qty_row; ?> {
    background-clip: padding-box;
    border-top: calc(<?php echo $settings->margin; ?>px / 2 ) solid rgba(0,0,0,0);
    border-bottom: calc(<?php echo $settings->margin; ?>px / 2 ) solid rgba(0,0,0,0);
    border-left: calc(<?php echo $settings->gutter; ?>px / 2 ) solid rgba(0,0,0,0);
    border-right: calc(<?php echo $settings->gutter; ?>px / 2 ) solid rgba(0,0,0,0);
    padding: 0;
}

.hover-link-<?php echo $id; ?> .hover-panel {
    height: <?php echo $settings->height; ?>px;
    cursor: pointer;
}

<?php if ( $settings->behaviour == 'crop' ) { ?>
    .hover-link-<?php echo $id; ?> .hover-panel figcaption {
        width: 100%;
        height: 100%;
        background-position: <?php echo $settings->position; ?>;
        background-repeat: no-repeat;
        background-clip: content-box;
        position: absolute;
        overflow: hidden;
    }
<?php } ?>

<?php if ( $settings->behaviour == 'scale-width' ) { ?>
    .hover-link-<?php echo $id; ?> .hover-panel figcaption {
        width: 100%;
        height: 100%;
        background-position: <?php echo $settings->position; ?>;
        background-repeat: no-repeat;
        background-size: 100% auto;
        position: absolute;
        overflow: hidden;
    }
<?php } ?>

<?php if ( $settings->behaviour == 'scale-height' ) { ?>
    .hover-link-<?php echo $id; ?> .hover-panel figcaption {
        width: 100%;
        height: 100%;
        background-position: <?php echo $settings->position; ?>;
        background-repeat: no-repeat;
        background-size: auto 100%;
        position: absolute;
        overflow: hidden;
    }
<?php } ?>

.hover-excerpt { 
    width: 100%;
    position: absolute;
    bottom: 20%;
    text-align: center;    
    background-color: rgba(0,0,0,0);
    transition: all 0.5s;
    padding: 5px;
}

.hover-excerpt a, .hover-excerpt p, .hover-excerpt h1, .hover-excerpt h2,.hover-excerpt h3,.hover-excerpt h4,.hover-excerpt h5, .hover-excerpt h6 {
    color: rgba(0,0,0,0);
    transition: all 0.5s;
}

<?php
$excerptopacity = ($settings->excerpt_background_opacity / 100);
$excerptcolor = '#' . $settings->excerpt_background_color;
$excerptrgb = sw_hover_opacity($excerptcolor);
$excerptrgba = sw_hover_opacity($excerptcolor, $excerptopacity);
?>
.hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt {
    font-family: <?php echo $settings->excerpt_font[family]; ?>; 
    font-weight: <?php echo $settings->excerpt_font[weight]; ?>;
    font-size: <?php echo $settings->excerpt_font_size; ?>px;
    bottom: 40%;
    color: #<?php echo $settings->excerpt_font_color; ?>;
    background-color: <?php echo $excerptrgba; ?>;
}

.hover-link-<?php echo $id; ?> .hover-panel .hover-excerpt {
    font-family: <?php echo $settings->excerpt_font[family]; ?>; 
    font-weight: <?php echo $settings->excerpt_font[weight]; ?>;
    font-size: <?php echo $settings->excerpt_font_size; ?>px;
}

.hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt a, .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt p, .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt h1, .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt h2, .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt h3, .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt h4, .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt h5, .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt h6 {
    color: #<?php echo $settings->excerpt_font_color; ?>;
}

<?php
$titleopacity = ($settings->title_background_opacity / 100);
$titlecolor = '#' . $settings->title_background_color;
$titlergb = sw_hover_opacity($titlecolor);
$titlergba = sw_hover_opacity($titlecolor, $titleopacity);
?>

<?php if($settings->title_hover !='false') {?>
    .hover-link-<?php echo $id; ?> .hover-panel figcaption .hover-title {
        font-family: <?php echo $settings->title_font[family]; ?>;
        font-weight: <?php echo $settings->title_font[weight]; ?>;
        color: #<?php echo $settings->title_font_color; ?>;
        font-size: <?php echo $settings->title_font_size; ?>px;
        line-height: 200%;
        background-color: <?php echo $titlergba; ?>;
        position: absolute;
        bottom: <?php echo $settings->title_hover; ?>px;
        left: 0;
        right: 0;
        margin: 0;
        box-sizing: border-box;
        transition: all 0.5s;  
        <?php if ( $settings->title_align == 'true') { ?>
            text-align: center;
        <?php } ?>
    }
<?php } else { ?>
    .hover-link-<?php echo $id; ?> .hover-panel figcaption h2 {
        display: none;
    }
<?php } ?>

.hover-link-<?php echo $id; ?> .hover-panel figcaption:hover .hover-title {
    bottom: 0;
    transition: all 0.5s;
}

.woo-special {
    position: relative;
}

.woo-special:before {
    position: absolute;
    content: "";
    left: 0;
    top: 50%;
    right: 0;
    border-top: 1px solid;
    border-color: inherit;
    -webkit-transform:rotate(-5deg);
    -moz-transform:rotate(-5deg);
    -ms-transform:rotate(-5deg);
    -o-transform:rotate(-5deg);
    transform:rotate(-5deg);
}

<?php if ( $settings->title_full == 'true') { ?>
    .hover-link-<?php echo $id; ?> .hover-panel figcaption .hover-title {
        height: <?php echo $settings->height; ?>px;
        line-height: <?php echo $settings->height; ?>px;
    }
<?php } ?>

<?php if ( $settings->excerpt_full == 'true') { ?>
    .hover-excerpt { 
        width: 100%;
        position: absolute;
        top: -20%;
        text-align: center;    
        background-color: rgba(0,0,0,0);
        transition: all 0.5s;
    }
    .hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt {
         height: <?php echo $settings->height; ?>px;
        top: 0%;
    }
<?php } ?>

.hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt .team_icon {
    color: #<?php echo $settings->icon_font_color; ?>;
    font-size: <?php echo $settings->icon_font_size; ?>px !important;
    line-height: 140% !important;
}

.hover-link-<?php echo $id; ?> .hover-panel:hover .hover-excerpt .team_icon:hover {
    color: #<?php echo $settings->icon_hover_color; ?>;
}

.hover-link-<?php echo $id; ?> .hover-panel .hover-excerpt .team_icon {
    font-size: <?php echo $settings->icon_font_size; ?>px !important;
    line-height: 140% !important;
}