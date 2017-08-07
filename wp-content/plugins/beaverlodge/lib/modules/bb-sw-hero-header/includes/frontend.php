<div class="hero-mask">
    <div class="entry-content">
        <?php if ($settings->breadcrumbs == 'yes') { ?>
            <div class="breadcrumbs-mask">
                <div class="breadcrumbs-container">
                    <?php the_breadcrumb(); ?>
                </div> 
            </div> 
        <?php } ?>
        <div class="headline">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <ul class="entry-meta">
                <?php
                    $theme = wp_get_theme(); // gets the current theme

                    if ('Beaver Builder Theme' == $theme->name || 'Beaver Builder Theme' == $theme->parent_theme) {
                        if ($settings->default_bb == 'yes') { ?>
                            <li class="entry-category"><?php FLTheme::post_top_meta(); ?> </li>
                        <?php } else { ?>
                            <li class="entry-category"><?php the_category( ', ' ); ?></li>
                            <li><a href="#<?php echo $settings->comments; ?>"> <?php comments_number( 'No Responses', 'One Response', '% Responses' ); ?></a></li>
                        <?php }
                    } else { ?>
                            <li class="entry-category"><?php the_category( ', ' ); ?></li>
                            <li><a href="#<?php echo $settings->comments; ?>"> <?php comments_number( 'No Responses', 'One Response', '% Responses' ); ?></a></li>
                            <li><?php the_date( 'F j, Y' ); ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>