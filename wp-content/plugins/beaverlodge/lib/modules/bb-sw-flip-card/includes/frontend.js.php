(function($) {

	$(function() {

        $(".flip-<?php echo $id; ?> .card").flip({
            axis: "<?php echo $settings->direction; ?>",
            reverse: <?php echo $settings->reverse; ?>,
            trigger: "<?php echo $settings->trigger; ?>",
            speed: <?php echo $settings->speed; ?>,
        });

	});

})(jQuery);