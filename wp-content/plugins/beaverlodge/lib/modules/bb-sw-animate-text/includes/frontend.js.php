
(function($) {

	$(function() {
    
       $(".<?php echo $id; ?>_head_title").typed({

            <?php $sentences = $settings->sentence; ?>
            strings: [<?php
                foreach ( $sentences as $sentence ) {
                    echo '" ' . $sentence . ' ",';   
                }?>],

            startDelay: <?php echo $settings->startDelay; ?>,

            typeSpeed: <?php echo $settings->typeSpeed; ?>,

            backSpeed: <?php echo $settings->backSpeed; ?>,

            backDelay: <?php echo $settings->backDelay; ?>,

            <?php if ($settings->loop == 'true' ) { ?>
                        loop: true,
            <?php } ?>

            showCursor: <?php echo $settings->cursor; ?>,

            <?php if ($settings->loop_count != null) { ?>
                loopCount: <?php echo $settings->loop_count; ?>,
            <?php } else { ?>
                loopCount: false,
            <?php } ?>
        
        }); 

        $('span.typed-cursor').append('<?php echo $settings->cursor_char; ?>');

	});

})(jQuery);