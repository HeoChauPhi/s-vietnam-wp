<div class="push"></div>

<footer class="footer">

    <p class="copyright">

        <?php
        if ( $settings->copyright == 'custom') {

            echo $settings->customcopyright;

        } else {

            $bloginfo = bloginfo('name');
            $date = date("Y");

            echo '&nbsp;&copy;&nbsp;' . $bloginfo . '&nbsp;' . $date . '&nbsp;| Powered by <a href="http://www.wpbeaverbuilder.com/?utm_source=external&amp;utm_medium=builder-theme&amp;utm_campaign=footer" target="_blank" title="WordPress Page Builder Plugin">Beaver Builder</a>';

        } 
        $scroll = $settings->showscroll;
        
        if ($scroll == 'yes') {
            
        ?>

        <span class="toTop">

            <?php

                if ( $settings->scrollicon == '') {

                    echo '<a href="#" class="scrollup">Top</a>';

                } else {
                    echo '<a href="#" class="scrollup"><i class="' . $settings->scrollicon . '"></i></a>';

                }
            ?>

        </span>
        
       <?php } ?>
    </p>
    
</footer>