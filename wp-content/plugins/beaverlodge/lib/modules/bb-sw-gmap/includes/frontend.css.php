.sw-gmap {
    height: <?php echo $settings->height; ?>px;
<?php if ($settings->set_width == 'true' ) { ?>
    width: 100%;
<?php } else { ?>
    width: <?php echo $settings->map_width; ?>px;
<?php } ?>
}