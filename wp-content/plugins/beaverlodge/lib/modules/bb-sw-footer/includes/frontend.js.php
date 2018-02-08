(function($) {
    
    $(function() {

            var bodyHeight = $("body").height();
            var vwptHeight = $(window).height();

            var footerHeight    = $('.footer').outerHeight();
            var footerHeight    = $('.footer').outerHeight();
            var pushMargin      = ( vwptHeight - footerHeight);

            <?php if ($settings->stickyFooter == 'yes') { ?>
              if (vwptHeight > bodyHeight) {
                $('.push').css({'marginBottom': pushMargin + 'px'});
              }
            <?php } ?>

    });

})(jQuery);