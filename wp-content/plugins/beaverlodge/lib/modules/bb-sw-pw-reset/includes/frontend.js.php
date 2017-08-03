(function($) {

	$(function() {

        $('.sw-pw-reset').attr("href", "<?php echo $settings->password_url; ?>").html('<?php echo $settings->lost_password; ?>');

	});

})(jQuery);