(function($) {

	$(function() {

          $('.sw-<?php echo $settings->graph_style; ?>-chart').visualize({
            height: <?php echo $settings->height; ?>,
<?php if ($settings->graph_style == 'bar') { ?>
            width: <?php echo $settings->width; ?>,
<?php } else { ?>
            width: <?php echo $settings->height; ?>,
<?php } ?>
            type: '<?php echo $settings->graph_style; ?>',
            legend: <?php echo $settings->legend; ?>
          });

        $('.sw-<?php echo $settings->graph_style; ?>-chart div').addClass('sw-legend');

	});

})(jQuery);