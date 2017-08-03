<?php

$trigger = $settings->trigger;
$animation = $settings->mc-animation;
$delay = $settings->delay;

?>


(function($) {

	$(function() {

      $(".fl-node-<?php echo $id; ?> .subscribe-me").subscribeBetter({
        trigger: "<?php echo $trigger; ?>", 
        animation: "<?php echo $animation; ?>",
        delay: <?php echo $delay; ?>,
    });

	});

})(jQuery);