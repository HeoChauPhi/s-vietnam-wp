(function($) {
    
	$(function() {

       $('#<?php echo $id; ?>-bb-modal').on('hidden.bs.modal', function (e) {
          jQuery('#<?php echo $id; ?>-bb-modal iframe').attr("src", jQuery("#<?php echo $id; ?>-bb-modal  iframe").attr("src"));
        });


	});

})(jQuery);