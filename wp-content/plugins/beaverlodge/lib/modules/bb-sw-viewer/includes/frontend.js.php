
(function($) {

	$(function() {

            Iframe = $('.gdoc');

            Iframe.on('load', function(){ 

                IframeInner = Iframe.contents().find('iframe');

                IframeInnerClone = IframeInner.clone();

                IframeInnerClone.on('load', function(){

                    IframeContents = IframeInner.contents();

                    YourNestedEl = IframeContents.find('[data-tooltip="Pop-out"]');

                    $(YourNestedEl).addClass('popout');
         
                });

            });

	});

})(jQuery);