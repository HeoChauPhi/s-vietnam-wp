<?php
$background = plugin_dir_path( __FILE__ ) . 'plugins/img/search.png';
?>

a.p52-gallery-image.swipebox:hover { 
opacity: <?php echo $settings->lightbox_opacity; ?>;
}

a.p52-gallery-image.swipebox {
background: url('<?php echo $background; ?>') no-repeat cover center center;
}


.slick-list::-webkit-scrollbar {
	width: 12px;
	background-color: #F5F5F5;
}

.slick-list::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

.slick-list::-webkit-scrollbar-thumb {
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #<?php echo $settings->scrollcolor; ?>;
}

.draggable {
    cursor: pointer;
    cursor: hand;
}

.contentBlock {
    height: <?php echo $settings->height; ?>px;
}
.contentBlock img{
    height: <?php echo $settings->height; ?>px;
    width: auto;
}

@media screen and (max-width: 768px) {
    .contentBlock {
        height: <?php echo $settings->mob_height;?>px;
    }
    .contentBlock img{
        height: <?php echo $settings->mob_height;?>px;
        max-width: 100%;
    }
}

<?php if ($settings->arrows == 'true') { ?>
span.panLeft.slick-arrow {
    font-size: <?php echo $settings->arrow_size; ?>px;
    color: #<?php echo $settings->arrow_color; ?>;
    position: absolute;
    top: calc(<?php echo $settings->height;?>px / 2);
    left: 20px;
    z-index: 999;
}

span.panRight.slick-arrow {
    font-size: <?php echo $settings->arrow_size; ?>px;
    color: #<?php echo $settings->arrow_color; ?>;
    position: absolute;
    top: calc(<?php echo $settings->height;?>px / 2);
    right: 20px;
    z-index: 999;
}

@media screen and (max-width: 768px) {
    span.panLeft.slick-arrow {
        font-size: calc(<?php echo $settings->arrow_size; ?>px / 2);
        color: #<?php echo $settings->arrow_color; ?>;
        position: absolute;
        top: calc(<?php echo $settings->mob_height;?>px / 2);
        left: 20px;
        z-index: 999;
    }

    span.panRight.slick-arrow {
        font-size: calc(<?php echo $settings->arrow_size; ?>px / 2);
        color: #<?php echo $settings->arrow_color; ?>;
        position: absolute;
        top: calc(<?php echo $settings->mob_height;?>px / 2);
        right: 20px;
        z-index: 999;
    }
}
<?php } else { ?>
.slick-arrow {
display: none !important;
}
<?php } ?>

<?php if ($settings->scrollbar == 'true') { ?>
.slick-list {
    overflow-x: scroll;
}
<?php } ?>
