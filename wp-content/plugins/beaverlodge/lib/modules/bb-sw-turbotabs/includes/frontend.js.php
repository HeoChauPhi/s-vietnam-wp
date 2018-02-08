(function($) {

	$(function() {    
       
    <?php if ($settings->full_width == 'true') { ?>
            var tabwidth=$('.tabs-<?php echo $id; ?> > li').length;
            $('.tab-menu-<?php echo $id; ?>').css('width', 100 / tabwidth + '%');
    <?php } ?>

        $(".tab_content-<?php echo $id; ?>").hide();
        $(".tabs-<?php echo $id; ?> li:first").addClass("active");
        $(".tab_content-<?php echo $id; ?>:first").show();

      /* if in tab mode */
        $(".tabs-<?php echo $id; ?> li").click(function() {

          $(".tab_content-<?php echo $id; ?>").hide();
          var activeTab = $(this).attr("rel"); 
          $("#"+activeTab).fadeIn();		

          $(".tabs-<?php echo $id; ?> li").removeClass("active");
          $(this).addClass("active");

          $(".tab_drawer_heading-<?php echo $id; ?>").removeClass("d_active");
          $(".tab_drawer_heading-<?php echo $id; ?>[rel^='"+activeTab+"']").addClass("d_active");

        });
        /* if in drawer mode */
        $(".tab_drawer_heading-<?php echo $id; ?>").click(function() {

          $(".tab_content-<?php echo $id; ?>").hide();
          var d_activeTab = $(this).attr("rel"); 
          $("#"+d_activeTab).fadeIn();

          $(".tab_drawer_heading-<?php echo $id; ?>").removeClass("d_active");
          $(this).addClass("d_active");

          $(".tabs-<?php echo $id; ?> li").removeClass("active");
          $(".tabs-<?php echo $id; ?> li[rel^='"+d_activeTab+"']").addClass("active");
        });


        /* Extra class "tab_last" 
           to add border to right side
           of last tab */
        $('.tabs-<?php echo $id; ?> li').last().addClass("tab_last");

	});

})(jQuery);