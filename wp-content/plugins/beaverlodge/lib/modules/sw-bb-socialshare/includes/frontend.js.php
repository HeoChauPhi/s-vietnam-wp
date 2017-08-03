<?php
$image = $settings->image_src;
$handle = $settings->handle;
$tags = $settings->tags;
$desc = $settings->description;
$title = $settings->title;
?>
(function($) {

	$(function() {

        $('.element').socialShare({
        counts          : false,
        image           : '<?php echo $image; ?>',
        twitterVia      : '<?php echo $handle; ?>',
        twitterHashTags : '<?php echo $tags; ?>',
        description     : '<?php echo $desc; ?>',
        title           : '<?php echo $title; ?>',
        })

        if(window.location.href.indexOf("fl_builder") > -1) {
            $(' .fl-module-bb-sw-socialshare-module').css('position', 'inherit');
        }


	});

})(jQuery);