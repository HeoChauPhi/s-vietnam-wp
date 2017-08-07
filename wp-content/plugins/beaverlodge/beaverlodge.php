<?php
/**
 * Plugin Name: Beaver Lodge Modules
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Extensive modules for using with Beaver Builder
 * Version: 1.2.4
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

// Check BB is active
if ( class_exists( 'FLBuilder' ) ) {
    
define( 'EDD_BEAVERLODGE_VERSION', '1.2.4' );

define( 'EDD_BEAVERLODGE_STORE_URL', 'https://beaverlodgehq.com/' );

define( 'EDD_BEAVERLODGE_ITEM_NAME', 'Beaverlodge Plugin' );


function edd_beaverlodge_plugin_updater() {

	$license_key = trim( get_option( 'edd_beaverlodge_license_key' ) );

	$edd_updater = new EDD_SL_Plugin_Updater( EDD_BEAVERLODGE_STORE_URL, __FILE__, array(
			'version' 	=> EDD_BEAVERLODGE_VERSION,
			'license' 	=> $license_key,
			'item_name' => EDD_BEAVERLODGE_ITEM_NAME,
			'author' 	=> 'Jon Mather',
            'url'       => home_url(),
		)
	);

}
add_action( 'admin_init', 'edd_beaverlodge_plugin_updater', 0 );

// Add version to head
function bl_version_head() {
	echo '<meta name="generator" content="Beaverlodge v' . EDD_BEAVERLODGE_VERSION . '"/>' ;
}
add_action('wp_head', 'bl_version_head');


// Define plugin url
define( 'BL_BEAVER_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'BL_BEAVER_MODULE_URL', plugins_url( '/', __FILE__ ) );

// Branding name
$labels = get_option( 'bl_options' ); 
$field_name = 'label_name';
if ( $labels[$field_name] != '' )  {
    define( 'BRANDING', $labels[$field_name] );
} else {
    define( 'BRANDING', 'Beaverlodge Modules' );
}

require_once dirname( __FILE__ ) . '/bl-modules.php';

// EDD
if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	include( dirname( __FILE__ ) . '/lib/resources/EDD_SL_Plugin_Updater.php' );
}
include( dirname( __FILE__ ) . '/lib/resources/bl-setup.php' );


if ( file_exists( FL_BUILDER_DIR . 'includes/admin-settings-branding.php' ) ) {
    include( dirname( __FILE__ ) . '/lib/resources/beaverlodge-settings/beaverlodge-settings.php' );
}

// Include MetaBoxes
function bl_add_meta() {
    
    if( !class_exists( 'RW_Meta_Box' ) ) {
        include( plugin_dir_path( __FILE__ ) . '/lib/resources/meta-box/meta-box.php');
    }
    
}
add_action( 'init', 'bl_add_meta' );
    
// Register the required plugins.
function bl_register_required_plugins() {

    $options = get_option( 'bl_beaverlodge_settings' );

    // Include the 404 module.
    if ($options['bl_404_page'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-404page/bb-sw-404page.php';
    }

    // Include the animate text module.
    if ($options['bl_animate_text'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-animate-text/bb-sw-animate-text.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-animate-text/includes/bb-sw-animate-text-module.php';
    }
            
    // Include the breadcrumbs module.
    if ($options['bl_breadcrumb'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-breadcrumbs/bb-sw-breadcrumbs.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-breadcrumbs/includes/bb-sw-breadcrumbs-module.php';
    }
            
    // Include the bar chart module.
    if ($options['bl_bar_chart'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-bar-chart/bb-sw-bar-chart.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-bar-chart/includes/bb-sw-bar-chart-module.php';
    }
                
    // Include the onclick module.
    if ($options['bl_bootstrap_modal'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-bootstrap-modal/bb-sw-bootstrap-modal.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-bootstrap-modal/includes/bb-sw-bootstrap-modal-module.php';
    }
                
    // Include the caldera forms module.
    if(class_exists('Caldera_Forms')) {
        if ($options['bl_caldera'] == '2') {
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-caldera/bb-sw-caldera.php';
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-caldera/includes/bb-sw-caldera-module.php';
        }
    }
                
    // Include the contactform7 module.
    if(class_exists('WPCF7_ContactForm')) {
        if ($options['bl_cf7'] == '2') {
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-contactform7/bb-sw-contactform7.php';
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-contactform7/includes/bb-sw-contactform7-module.php';
        }
    }
                
    // Include the countdown module.
    if ($options['bl_countdown'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-countdown/bb-sw-counter.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-countdown/includes/bb-sw-counter-module.php';
    }
                
    // Include the dual callout module.
    if ($options['bl_dual_callout'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-dualcallout/bb-sw-dualcallout.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-dualcallout/includes/bb-sw-dualcallout-module.php';
    }
                
    // Include the ecommerce menu module.
    if ($options['bl_ecommerce_menu'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-ecommerce-menu/bb-sw-ecommerce-menu.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-ecommerce-menu/includes/bb-sw-ecommerce-menu-module.php';
    }
                
    // Include the flip module.
    if ($options['bl_flip'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-flip-card/bb-sw-flip-card.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-flip-card/includes/bb-sw-flip-card-module.php';
    }
                
    // Include the facebook module.
    if ($options['bl_facebook'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-facebook/bb-sw-facebook.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-facebook/includes/bb-sw-facebook-module.php';
    }
                
    // Include the footer module.
    if ($options['bl_footer'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-footer/bb-sw-footer.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-footer/includes/bb-footer-module.php';
    }
                
    // Include the gmap module.
    if ($options['bl_gmap'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-gmap/bb-sw-gmap.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-gmap/includes/bb-sw-gmap-module.php';
    }
                
    // Include the gmap module.
    if ($options['bl_heading'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-heading/bb-sw-heading.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-heading/includes/bb-sw-heading-module.php';
    }
                
    // Include the hero header module.
    if ($options['bl_hero_header'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-hero-header/bb-sw-hero-header.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-hero-header/includes/bb-sw-hero-header-module.php';
    }
                
    // Include the hover card module.
    if ($options['bl_hover_card'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-hover-card/sw-bb-hover-card.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-hover-card/includes/bb-hover-card-module.php';
    }
                
    // Include the hover effects module.
    if ($options['bl_hover_effects'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-hover-effects/bb-sw-hover-effects.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-hover-effects/includes/bb-sw-hover-effects-module.php';
    }
                
    // Include the instagram module.
    if ($options['bl_instagram'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-instagram/bb-sw-instagram.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-instagram/includes/bb-sw-instagram-module.php';
    }
                
    // Include the lists module.
    if ($options['bl_list'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-lists/bb-sw-lists.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-lists/includes/bb-sw-lists-module.php';
    }
                
    // Include the login module.
    if ($options['bl_login'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-login/bb-sw-login.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-login/includes/bb-sw-login-module.php';
    function sw_redirect_login_page() {
        $login_page  = home_url( '/login/' );
        $page_viewed = basename($_SERVER['REQUEST_URI']);

        if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
            wp_redirect($login_page);
            exit;
        }
    }
    add_action('init','sw_redirect_login_page');

    function sw_redirect_admin_page() {
        $login_page  = home_url( '/login/' );
        $page_viewed = basename($_SERVER['REQUEST_URI']);

        if( $page_viewed == "wp-admin.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
            wp_redirect($login_page);
            exit;
        }
    }
    add_action('init','sw_redirect_admin_page');

    function sw_login_failed() {
        $login_page  = home_url( '/login/' );
        wp_redirect( $login_page . '?login=failed' );
        exit;
    }
    add_action( 'wp_login_failed', 'sw_login_failed' );

    function sw_verify_username_password( $user, $username, $password ) {
        $login_page  = home_url( '/login/' );
        if( $username == "" || $password == "" ) {
            wp_redirect( $login_page . "?login=empty" );
            exit;
        }
    }
    add_filter( 'authenticate', 'sw_verify_username_password', 1, 3);

    function sw_logout_page() {
        $login_page  = home_url( '/login/' );
        wp_redirect( $login_page . "?login=false" );
        exit;
    }
    add_action('wp_logout','sw_logout_page');

    function sw_login_page() {

        $title = 'Login';

        if (!get_page_by_title($title, 'OBJECT', 'page') ){

            $login_page = array(

                'post_title'    => $title,
                'post_content'  => 'Use this page to customise the Login Page.',
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            wp_insert_post( $login_page );

        }

    }
    add_action('init','sw_login_page');        
    }
                
    // Include the masonry module.
    if ($options['bl_masonry'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-masonry-module/bb-sw-gallery.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-masonry-module/includes/bb-sw-masonry.php';
    }
                
    // Include the news ticker module.
    if ($options['bl_news_ticker'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-news-ticker/bb-sw-news-ticker.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-news-ticker/includes/bb-sw-news-ticker-module.php';
    }
                
    // Include the next page module.
    if ($options['bl_next_page'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-nextpage/bb-sw-nextpage.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-nextpage/includes/bb-sw-nextpage-module.php';
    }
                
    // Include the pw reset module.
    if ($options['bl_password'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-pw-reset/bb-sw-pw-reset.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-pw-reset/includes/bb-sw-pw-reset-module.php';
    }
                
    // Include the pinterest layout module.
    if ($options['bl_pinterest'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-pinterest-layout/bb-sw-pinterest-layout.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-pinterest-layout/includes/bb-sw-pinterest-layout-module.php';
    }
                
    // Include the popup module.
    if ($options['bl_popup'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-popup/bb-sw-popup.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-popup/includes/bb-sw-popup-module.php';
    }
                
    // Include the portfolio module.
    if ($options['bl_portfolio'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-portfolio/bb-sw-portfolio.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-portfolio/includes/bb-sw-portfolio-module.php';
    }
                
    // Include the resizer module.
    if ($options['bl_resizer'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-resizer/bb-sw-resizer.php';
    }
                
    // Include the social module.
    if ($options['bl_social'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/sw-bb-socialshare/sw-bb-socialshare.php';
        require_once dirname( __FILE__ ) . '/lib/modules/sw-bb-socialshare/includes/bb-sw-socialshare-module.php';
    }
                
    // Include the tables module.
    if ($options['bl_tables'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-tables/bb-sw-tables.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-tables/includes/bb-sw-tables-module.php';
    }
                
    // Include the toolbar module.
    if ($options['bl_toolbar_cta'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-toolbar-cta/bb-sw-toolbar-cta.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-toolbar-cta/includes/bb-sw-toolbar-cta-module.php';
    }
                
    // Include the tooltips module.
    if ($options['bl_tooltips'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-tooltips/bb-sw-tooltip.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-tooltips/includes/bb-sw-tooltip-module.php';
    }
                
    // Include the turbotabs module.
    if ($options['bl_turbotabs'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-turbotabs/bb-sw-turbotabs.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-turbotabs/includes/bb-sw-turbotabs-module.php';
    }
                
    // Include the timeline module.
    if ($options['bl_vert_timeline'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-vert-timeline/bb-sw-vert-timeline.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-vert-timeline/includes/bb-sw-vert-timeline-module.php';
    }
                
    // Include the viewer module.
    if ($options['bl_viewer'] == '2') {
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-viewer/bb-sw-viewer.php';
        require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-viewer/includes/bb-sw-viewer-module.php';
    }
                
    // Include the woo featured module.
    if ( class_exists( 'woocommerce' ) ) {
        if ($options['bl_woo_featured'] == '2') {
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-woofeatured/bb-sw-woofeatured.php';
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-woofeatured/includes/bb-sw-woofeatured-module.php';
        }
    }
                
    // Include the woo recent module.
    if ( class_exists( 'woocommerce' ) ) {
        if ($options['bl_woo_recent'] == '2') {
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-woorecent/bb-sw-woorecent.php';
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-woorecent/includes/bb-sw-woorecent-module.php';
        }
    }
                
    // Include the woo sale module.
    if ( class_exists( 'woocommerce' ) ) {
        if ($options['bl_woo_sale'] == '2') {
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-woosale/bb-sw-woosale.php';
            require_once dirname( __FILE__ ) . '/lib/modules/bb-sw-woosale/includes/bb-sw-woosale-module.php';
        }
    }
    
}
add_action('init', 'bl_register_required_plugins');

// Register custom post types
$options = get_option( 'bl_beaverlodge_settings' );
if ($options['bl_masonry'] == '2') {
    require_once dirname( __FILE__ ) . '/lib/cpt/gallery-cpt.php';
}
if ($options['bl_hover_card'] == '2') {
    require_once dirname( __FILE__ ) . '/lib/cpt/team-cpt.php';
}
if ($options['bl_portfolio'] == '2') {
    require_once dirname( __FILE__ ) . '/lib/cpt/portfolio-cpt.php';
}

function bl_excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function bl_content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
} // End if BB is active

// if BB is not active
if( !class_exists( 'FLBuilder' ) ) {
    
function bl_no_bb_active() {

    ?>
        <script type="text/javascript">
            (function($) {

                $(function() {
                    
                    $('[data-slug=beaver-lodge-modules] td.column-description.desc').append('<div style="background-color: #5ec198; color: #ffffff; padding: 10px 20px; text-transform: uppercase; letter-spacing: 3px; font-weight: 900;">Please activate <a href="https://www.wpbeaverbuilder.com/?fla=283" style="color: #b20022; text-decoration: underline; font-style: italic;">Beaver Builder</a></div>');
                 

                });

            })(jQuery);
        </script>
    <?php
}
add_action( 'admin_head', 'bl_no_bb_active');

} // End if BB is not active