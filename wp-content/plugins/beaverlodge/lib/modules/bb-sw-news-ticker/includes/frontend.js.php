(function($) {

	$(function() {

        $('.sw-news-ticker').easyTicker({
            direction: '<?php echo $settings->direction; ?>',
            easing: 'swing',
            speed: '<?php echo $settings->speed; ?>',
            interval: <?php echo $settings->interval; ?>,
            <?php if ($settings->height_select == 'auto') { ?>
            height: 'auto',
            <?php } else { ?>
            height: '<?php echo $settings->height; ?>px',
            <?php } ?>
            visible: <?php echo $settings->visible; ?>,
            mousePause: <?php echo $settings->mouse; ?>,
        });

	});

})(jQuery);