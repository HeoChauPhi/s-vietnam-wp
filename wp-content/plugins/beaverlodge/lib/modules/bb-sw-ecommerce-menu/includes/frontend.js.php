(function($) {

	$(function() {
    
       $( '.sw-ecommmerce-menu-<?php echo $id; ?>' ).catslider();

        var maxHeight = -1;

        $('.mi-slider ul li img').each(function() {
          maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
        });

        $('.mi-slider ul li img').each(function() {
          $(this).height(maxHeight);
        });

	});

})(jQuery);