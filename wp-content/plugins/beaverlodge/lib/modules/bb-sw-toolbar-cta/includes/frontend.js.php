(function($) {

	$(function() {

        if(window.location.href.indexOf("fl_builder") > -1) {
            $('.sw-toolbar-cta').removeClass('fixed');
        }
        
        <?php if($settings->location == 'top') { ?>
            $('.sw-toolbar-cta.fixed').prependTo('body');
        <?php } else { ?>
            $('.sw-toolbar-cta.fixed').appendTo('Footer');
        <?php } ?>
	});

})(jQuery);