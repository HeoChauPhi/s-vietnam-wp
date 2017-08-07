<?php

function new_settings_pages( $settings_pages )
{
	$settings_pages[] = array(
		'id'            => 'bl-options',
		'option_name'   => 'bl_options',
		'parent'        => 'beaverlodge_modules',
		'menu_title'    => __( 'Settings', 'fl-builder' ),
	);
	return $settings_pages;
}
add_filter( 'mb_settings_pages', 'new_settings_pages' );
function new_options_meta_boxes( $meta_boxes )
{
	$meta_boxes[] = array(
		'id'             => 'new-fotoplugins',
		'title'          => __( 'Label Settings', 'fl-builder' ),
		'settings_pages' => 'bl-options',
		'fields'         => array(
            
			array(
				'name'      => __( 'Password', 'fl-builder' ),
				'id'        => 'password',
				'type'       => 'text',
			),
            
			array(
				'name'      => __( 'Branding Name', 'fl-builder' ),
				'id'        => 'label_name',
				'type'      => 'text',
                'std'       => 'Beaverlodge Modules',
                'hidden'    => array( 'password', '!=', 'unbeaveral' )
			),
            
			array(
				'name'      => __( 'Branding Image', 'fl-builder' ),
				'id'        => 'label_logo',
				'type'      => 'select',
                'options'   => array(
                    'dashicons-menu' =>         'dashicons-menu',
                    'dashicons-dashboard' =>         'dashicons-dashboard',
                    'dashicons-admin-site' =>         'dashicons-admin-site',
                    'dashicons-admin-media' =>         'dashicons-admin-media',
                    'dashicons-admin-page' =>         'dashicons-admin-page',
                    'dashicons-admin-comments' =>         'dashicons-admin-comments',
                    'dashicons-admin-appearance' =>         'dashicons-admin-appearance',
                    'dashicons-admin-plugins' =>         'dashicons-admin-plugins',
                    'dashicons-admin-users' =>         'dashicons-admin-users',
                    'dashicons-admin-tools' =>         'dashicons-admin-tools',
                    'dashicons-admin-settings' =>         'dashicons-admin-settings',
                    'dashicons-admin-network' =>         'dashicons-admin-network',
                    'dashicons-admin-generic' =>         'dashicons-admin-generic',
                    'dashicons-admin-home' =>         'dashicons-admin-home',
                    'dashicons-admin-collapse' =>         'dashicons-admin-collapse',
                    'dashicons-admin-links' =>         'dashicons-admin-links',
                    'dashicons-admin-post' =>         'dashicons-admin-post',
                    'dashicons-format-standard' =>         'dashicons-format-standard',
                    'dashicons-format-image' =>         'dashicons-format-image',
                    'dashicons-format-gallery' =>         'dashicons-format-gallery',
                    'dashicons-format-audio' =>         'dashicons-format-audio',
                    'dashicons-format-video' =>         'dashicons-format-video',
                    'dashicons-format-links' =>         'dashicons-format-links',
                    'dashicons-format-chat' =>         'dashicons-format-chat',
                    'dashicons-format-status' =>         'dashicons-format-status',
                    'dashicons-format-aside' =>         'dashicons-format-aside',
                    'dashicons-format-quote' =>         'dashicons-format-quote',
                    'dashicons-welcome-write-blog' =>         'dashicons-welcome-write-blog',
                    'dashicons-welcome-edit-page' =>         'dashicons-welcome-edit-page',
                    'dashicons-welcome-add-page' =>         'dashicons-welcome-add-page',
                    'dashicons-welcome-view-site' =>         'dashicons-welcome-view-site',
                    'dashicons-welcome-widgets-menus' =>         'dashicons-welcome-widgets-menus',
                    'dashicons-welcome-comments' =>         'dashicons-welcome-comments',
                    'dashicons-welcome-learn-more' =>         'dashicons-welcome-learn-more',
                    'dashicons-image-crop' =>         'dashicons-image-crop',
                    'dashicons-image-rotate-left' =>         'dashicons-image-rotate-left',
                    'dashicons-image-rotate-right' =>         'dashicons-image-rotate-right',
                    'dashicons-image-flip-vertical' =>         'dashicons-image-flip-vertical',
                    'dashicons-image-flip-horizontal' =>         'dashicons-image-flip-horizontal',
                    'dashicons-undo' =>         'dashicons-undo',
                    'dashicons-redo' =>         'dashicons-redo',
                    'dashicons-editor-bold' =>         'dashicons-editor-bold',
                    'dashicons-editor-italic' =>         'dashicons-editor-italic',
                    'dashicons-editor-ul' =>         'dashicons-editor-ul',
                    'dashicons-editor-ol' =>         'dashicons-editor-ol',
                    'dashicons-editor-quote' =>         'dashicons-editor-quote',
                    'dashicons-editor-alignleft' =>         'dashicons-editor-alignleft',
                    'dashicons-editor-aligncenter' =>         'dashicons-editor-aligncenter',
                    'dashicons-editor-alignright' =>         'dashicons-editor-alignright',
                    'dashicons-editor-insertmore' =>         'dashicons-editor-insertmore',
                    'dashicons-editor-spellcheck' =>         'dashicons-editor-spellcheck',
                    'dashicons-editor-distractionfree' =>         'dashicons-editor-distractionfree',
                    'dashicons-editor-expand' =>         'dashicons-editor-expand',
                    'dashicons-editor-contract' =>         'dashicons-editor-contract',
                    'dashicons-editor-kitchensink' =>         'dashicons-editor-kitchensink',
                    'dashicons-editor-underline' =>         'dashicons-editor-underline',
                    'dashicons-editor-justify' =>         'dashicons-editor-justify',
                    'dashicons-editor-textcolor' =>         'dashicons-editor-textcolor',
                    'dashicons-editor-paste-word' =>         'dashicons-editor-paste-word',
                    'dashicons-editor-paste-text' =>         'dashicons-editor-paste-text',
                    'dashicons-editor-removeformatting' =>         'dashicons-editor-removeformatting',
                    'dashicons-editor-video' =>         'dashicons-editor-video',
                    'dashicons-editor-customchar' =>         'dashicons-editor-customchar',
                    'dashicons-editor-outdent' =>         'dashicons-editor-outdent',
                    'dashicons-editor-indent' =>         'dashicons-editor-indent',
                    'dashicons-editor-help' =>         'dashicons-editor-help',
                    'dashicons-editor-strikethrough' =>         'dashicons-editor-strikethrough',
                    'dashicons-editor-unlink' =>         'dashicons-editor-unlink',
                    'dashicons-editor-rtl' =>         'dashicons-editor-rtl',
                    'dashicons-editor-break' =>         'dashicons-editor-break',
                    'dashicons-editor-code' =>         'dashicons-editor-code',
                    'dashicons-editor-paragraph' =>         'dashicons-editor-paragraph',
                    'dashicons-align-left' =>         'dashicons-align-left',
                    'dashicons-align-right' =>         'dashicons-align-right',
                    'dashicons-align-center' =>         'dashicons-align-center',
                    'dashicons-align-none' =>         'dashicons-align-none',
                    'dashicons-lock' =>         'dashicons-lock',
                    'dashicons-calendar' =>         'dashicons-calendar',
                    'dashicons-visibility' =>         'dashicons-visibility',
                    'dashicons-post-status' =>         'dashicons-post-status',
                    'dashicons-edit' =>         'dashicons-edit',
                    'dashicons-post-trash' =>         'dashicons-post-trash',
                    'dashicons-trash' =>         'dashicons-trash',
                    'dashicons-external' =>         'dashicons-external',
                    'dashicons-arrow-up' =>         'dashicons-arrow-up',
                    'dashicons-arrow-down' =>         'dashicons-arrow-down',
                    'dashicons-arrow-left' =>         'dashicons-arrow-left',
                    'dashicons-arrow-right' =>         'dashicons-arrow-right',
                    'dashicons-arrow-up-alt' =>         'dashicons-arrow-up-alt',
                    'dashicons-arrow-down-alt' =>         'dashicons-arrow-down-alt',
                    'dashicons-arrow-left-alt' =>         'dashicons-arrow-left-alt',
                    'dashicons-arrow-right-alt' =>         'dashicons-arrow-right-alt',
                    'dashicons-arrow-up-alt2' =>         'dashicons-arrow-up-alt2',
                    'dashicons-arrow-down-alt2' =>         'dashicons-arrow-down-alt2',
                    'dashicons-arrow-left-alt2' =>         'dashicons-arrow-left-alt2',
                    'dashicons-arrow-right-alt2' =>         'dashicons-arrow-right-alt2',
                    'dashicons-leftright' =>         'dashicons-leftright',
                    'dashicons-sort' =>         'dashicons-sort',
                    'dashicons-randomize' =>         'dashicons-randomize',
                    'dashicons-list-view' =>         'dashicons-list-view',
                    'dashicons-exerpt-view' =>         'dashicons-exerpt-view',
                    'dashicons-hammer' =>         'dashicons-hammer',
                    'dashicons-art' =>         'dashicons-art',
                    'dashicons-migrate' =>         'dashicons-migrate',
                    'dashicons-performance' =>         'dashicons-performance',
                    'dashicons-universal-access' =>         'dashicons-universal-access',
                    'dashicons-universal-access-alt' =>         'dashicons-universal-access-alt',
                    'dashicons-tickets' =>         'dashicons-tickets',
                    'dashicons-nametag' =>         'dashicons-nametag',
                    'dashicons-clipboard' =>         'dashicons-clipboard',
                    'dashicons-heart' =>         'dashicons-heart',
                    'dashicons-megaphone' =>         'dashicons-megaphone',
                    'dashicons-schedule' =>         'dashicons-schedule',
                    'dashicons-wordpress' =>         'dashicons-wordpress',
                    'dashicons-wordpress-alt' =>         'dashicons-wordpress-alt',
                    'dashicons-pressthis,' =>         'dashicons-pressthis,',
                    'dashicons-update,' =>         'dashicons-update,',
                    'dashicons-screenoptions' =>         'dashicons-screenoptions',
                    'dashicons-info' =>         'dashicons-info',
                    'dashicons-cart' =>         'dashicons-cart',
                    'dashicons-feedback' =>         'dashicons-feedback',
                    'dashicons-cloud' =>         'dashicons-cloud',
                    'dashicons-translation' =>         'dashicons-translation',
                    'dashicons-tag' =>         'dashicons-tag',
                    'dashicons-category' =>         'dashicons-category',
                    'dashicons-archive' =>         'dashicons-archive',
                    'dashicons-tagcloud' =>         'dashicons-tagcloud',
                    'dashicons-text' =>         'dashicons-text',
                    'dashicons-media-archive' =>         'dashicons-media-archive',
                    'dashicons-media-audio' =>         'dashicons-media-audio',
                    'dashicons-media-code' =>         'dashicons-media-code',
                    'dashicons-media-default' =>         'dashicons-media-default',
                    'dashicons-media-document' =>         'dashicons-media-document',
                    'dashicons-media-interactive' =>         'dashicons-media-interactive',
                    'dashicons-media-spreadsheet' =>         'dashicons-media-spreadsheet',
                    'dashicons-media-text' =>         'dashicons-media-text',
                    'dashicons-media-video' =>         'dashicons-media-video',
                    'dashicons-playlist-audio' =>         'dashicons-playlist-audio',
                    'dashicons-playlist-video' =>         'dashicons-playlist-video',
                    'dashicons-yes' =>         'dashicons-yes',
                    'dashicons-no' =>         'dashicons-no',
                    'dashicons-no-alt' =>         'dashicons-no-alt',
                    'dashicons-plus' =>         'dashicons-plus',
                    'dashicons-plus-alt' =>         'dashicons-plus-alt',
                    'dashicons-minus' =>         'dashicons-minus',
                    'dashicons-dismiss' =>         'dashicons-dismiss',
                    'dashicons-marker' =>         'dashicons-marker',
                    'dashicons-star-filled' =>         'dashicons-star-filled',
                    'dashicons-star-half' =>         'dashicons-star-half',
                    'dashicons-star-empty' =>         'dashicons-star-empty',
                    'dashicons-flag' =>         'dashicons-flag',
                    'dashicons-share' =>         'dashicons-share',
                    'dashicons-share1' =>         'dashicons-share1',
                    'dashicons-share-alt' =>         'dashicons-share-alt',
                    'dashicons-share-alt2' =>         'dashicons-share-alt2',
                    'dashicons-twitter' =>         'dashicons-twitter',
                    'dashicons-rss' =>         'dashicons-rss',
                    'dashicons-email' =>         'dashicons-email',
                    'dashicons-email-alt' =>         'dashicons-email-alt',
                    'dashicons-facebook' =>         'dashicons-facebook',
                    'dashicons-facebook-alt' =>         'dashicons-facebook-alt',
                    'dashicons-networking' =>         'dashicons-networking',
                    'dashicons-googleplus' =>         'dashicons-googleplus',
                    'dashicons-location' =>         'dashicons-location',
                    'dashicons-location-alt' =>         'dashicons-location-alt',
                    'dashicons-camera' =>         'dashicons-camera',
                    'dashicons-images-alt' =>         'dashicons-images-alt',
                    'dashicons-images-alt2' =>         'dashicons-images-alt2',
                    'dashicons-video-alt' =>         'dashicons-video-alt',
                    'dashicons-video-alt2' =>         'dashicons-video-alt2',
                    'dashicons-video-alt3' =>         'dashicons-video-alt3',
                    'dashicons-vault' =>         'dashicons-vault',
                    'dashicons-shield' =>         'dashicons-shield',
                    'dashicons-shield-alt' =>         'dashicons-shield-alt',
                    'dashicons-sos' =>         'dashicons-sos',
                    'dashicons-search' =>         'dashicons-search',
                    'dashicons-slides' =>         'dashicons-slides',
                    'dashicons-analytics' =>         'dashicons-analytics',
                    'dashicons-chart-pie' =>         'dashicons-chart-pie',
                    'dashicons-chart-bar' =>         'dashicons-chart-bar',
                    'dashicons-chart-line' =>         'dashicons-chart-line',
                    'dashicons-chart-area' =>         'dashicons-chart-area',
                    'dashicons-groups' =>         'dashicons-groups',
                    'dashicons-businessman' =>         'dashicons-businessman',
                    'dashicons-id' =>         'dashicons-id',
                    'dashicons-id-alt' =>         'dashicons-id-alt',
                    'dashicons-products' =>         'dashicons-products',
                    'dashicons-awards' =>         'dashicons-awards',
                    'dashicons-forms' =>         'dashicons-forms',
                    'dashicons-testimonial' =>         'dashicons-testimonial',
                    'dashicons-portfolio' =>         'dashicons-portfolio',
                    'dashicons-book' =>         'dashicons-book',
                    'dashicons-book-alt' =>         'dashicons-book-alt',
                    'dashicons-download' =>         'dashicons-download',
                    'dashicons-upload' =>         'dashicons-upload',
                    'dashicons-backup' =>         'dashicons-backup',
                    'dashicons-clock' =>         'dashicons-clock',
                    'dashicons-lightbulb' =>         'dashicons-lightbulb',
                    'dashicons-microphone' =>         'dashicons-microphone',
                    'dashicons-desktop' =>         'dashicons-desktop',
                    'dashicons-tablet' =>         'dashicons-tablet',
                    'dashicons-smartphone' =>         'dashicons-smartphone',
                    'dashicons-smiley' =>         'dashicons-smiley',
                ),
                'placeholder' => __( 'Select an Icon', 'your-prefix' ),
                'hidden'    => array( 'password', '!=', 'unbeaveral' )
			),
            
		),
	);
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'new_options_meta_boxes' );

function custom_label() {
    $branding = 'Beaverlodge Modules'; 
    define( 'BRANDING', $branding );
}
add_action( 'initi', 'custom_label' );

function custom_plugin() {
    $labels = get_option( 'bl_options' );
    $field_name = 'label_name';
    
    $name = $labels[$field_name];
    $beaver = 'Beaverlodge Settings';
    if ( $name != '' )  {
        $brand = $name;
    } else {
        $brand = $beaver;
    }
    
    $version = EDD_BEAVERLODGE_VERSION;
    ?>
        <script type="text/javascript">
            (function($) {

                $(function() {
                    <?php if ( $name != '' )  { ?>
                    $('#beaver-lodge-modules td.plugin-title strong').html('<?php echo $brand; ?>');
                    $('#beaver-lodge-modules td.desc .plugin-version-author-uri').html('Version <?php echo $version; ?>');
                    <?php } ?>

                });

            })(jQuery);
        </script>
    <?php
}
add_action( 'admin_head', 'custom_plugin');