<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="fl-content col-md-12">
                
            <?php if (the_slug_exists('404')) {
                echo do_shortcode('[fl_builder_insert_layout slug="404"]'); 
            } else { ?>

                <article class="fl-post fl-404">

                    <header class="fl-post-header">
                        <h2 class="fl-post-title"><?php _e( "Sorry! That page doesn't seem to exist.", 'fl-automator' ); ?></h2>
                    </header><!-- .fl-post-header -->

                    <div class="fl-post-content clearfix">
                        <?php get_search_form(); ?>
                    </div><!-- .fl-post-content -->

                </article>            

            <?php } ?>
            

		</div>
	</div>
</div>

<?php get_footer(); ?>