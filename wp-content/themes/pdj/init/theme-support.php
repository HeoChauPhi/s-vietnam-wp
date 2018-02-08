<?php
/*
**
** Enable Function
**
*/
function do_post_request($url, $data, $optional_headers = null)
{
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

// Pagination action.
add_action( 'wp_ajax_pagination', 'pagination_callback' );
add_action( 'wp_ajax_nopriv_pagination', 'pagination_callback' );
function pagination_callback() {
  $values = $_REQUEST;
  //$content = do_shortcode ('[view_list name="'.$values['name'].'" post_type="news" per_page="2" custom_fields=""]');
  $content = do_shortcode ('[view_list name="'.$values['name'].'" post_type="'.$values['post_type'].'" per_page="'.$values['per_page'].'" cat_id="'.$values['cat_id'].'" custom_fields="'.$values['custom_fields'].'" current_paged="'.$values['paged_index'].'" use_pagination="'.$values['use_pagination'].'" filter_select="0" ]');
  $result = json_encode(array('markup' => $content));
  echo $result;
  wp_die();
}

// Tour Ajax action.
add_action( 'wp_ajax_pagelistpagination', 'pagelistpaginationajax_callback' );
add_action( 'wp_ajax_nopriv_pagelistpagination', 'pagelistpaginationajax_callback' );
function pagelistpaginationajax_callback() {
  $values = $_REQUEST;

  //$content = do_shortcode('[template_list_page_item post_type="'.$values['page_post_type'].'" per_page="'.$values['per_page'].'" offset="'.$values['offset'].'" sort_layout="'.$values['sort_layout'].'" tour_date="'.$values['tour_date'].'" sort_by_price="'.$values['sort_by_price'].'"]');

  ob_start();
  global $paged;
  if (!isset($paged) || !$paged){
    $paged = 1;
  }

  $context    = Timber::get_context();

  $post_type          = $values['page_post_type'];
  //$per_page           = -1;
  $per_page           = $values['per_page'];
  $offset             = $values['offset'];
  $sort_layout        = $values['sort_layout'];
  $sort_by_price      = $values['sort_by_price'];
  $sidebar_filter_tax = $values['data_sidebar_filter']['taxonomy'];
  $sidebar_filter_cf  = $values['data_sidebar_filter']['custom_field'];

  $args = array(
    'post_type'       => $post_type,
    'posts_per_page'  => $per_page,
    'post_status'     => 'publish',
    'offset'          => $offset,
    'paged'           => $paged,
    'meta_query'      => array(
      'relation' => 'AND',
    ),
    'tax_query' => array(
      'relation' => 'AND',
    ),
  );

  switch ($post_type) {
    case 'tour':
      foreach ($sidebar_filter_tax as $tax_name => $tax) {
        if ( $tax != '' and $tax != null ) {
          $terms = explode("|", $tax);
          $terms = array_filter($terms);
          $args['tax_query'][] = array(
            'taxonomy' => $tax_name,
            'field'    => 'term_id',
            'terms'    => $terms,
            'operator' => 'IN',
          );
        }
      }

      foreach ($sidebar_filter_cf as $cf_name => $cf_value) {
        if ( $cf_value != '' and $cf_value != null ) {
          switch ($cf_name) {
            case 'tour_price':
              $cf_values = explode(",", $cf_value);
              $min_price = $cf_values[0];
              $max_price = $cf_values[1];

              $args['meta_query'][] = array(
                'key'       => 'tour_price',
                'value'     => $cf_values,
                'type'      => 'numeric',
                'compare'   => 'BETWEEN'
              );
              break;

            case 'departure_day':
              $date = strtotime($cf_value);
              $day_of_date = date('l', $date);

              $args['meta_query'][] = array(
                'key'       => 'departure_day',
                'value'     => $day_of_date,
                'compare'   => 'REGEXP'
              );
              break;
            
            default:
              $cf_values = explode("|", $cf_value);
              $cf_values = array_filter($cf_values);
              
              $args['meta_query'][] = array(
                'key'       => $cf_name,
                'value'     => $cf_values,
                'compare'   => 'IN'
              );
              break;
          }
        }
      }

      if ($sort_by_price == 'lth') {
        $meta_query = array(
          'key' => 'tour_price',
          'compare'   => 'EXISTS',
        );

        $orderby = array(
          'tour_price_clause' => 'ASC',
        );

        $args['meta_query']['tour_price_clause'] = $meta_query;
        $args['orderby'] = $orderby;
        
      } else if ($sort_by_price == 'htl') {
        $meta_query = array(
          'key' => 'tour_price',
          'compare'   => 'EXISTS',
        );

        $orderby = array(
          'tour_price_clause' => 'DESC',
        );

        $args['meta_query']['tour_price_clause'] = $meta_query;
        $args['orderby'] = $orderby;

      } else {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
      }

      break;
    
    default:
      # code...
      break;
  }

  //print_r($args);
  query_posts($args);
  $posts                        = Timber::get_posts($args);
  $context['posts']             = $posts;
  $context['sort_layout']       = $sort_layout;
  $pagination                   = Timber::get_pagination();
  $context['pagination_total']  = $pagination['total'];

  $context['data_test'] = $values;
  $context['data_post'] = $args;

  try {
    Timber::render( array( 'shortcode-list-page-item.twig'), $context );
  } catch (Exception $e) {
    echo __('Could not find a shortcode-list-page-item.twig file for Shortcode.', 'pdj_theme');
  }


  $content = ob_get_contents();
  ob_end_clean();
  
  $result = json_encode($content);
  echo $result;
  wp_die();
}

// Tour Ajax action.
add_action( 'wp_ajax_price', 'priceajax_callback' );
add_action( 'wp_ajax_nopriv_price', 'priceajax_callback' );
function priceajax_callback() {
  $values = $_REQUEST;
  //$content = do_shortcode ('[view_list name="'.$values['name'].'" post_type="news" per_page="2" custom_fields=""]');
  $content_form = do_shortcode('[price_update post_id="'.$values['post_id'].'" date_include="'.$values['date'].'"]');
  $content_hotel = do_shortcode('[hotel_update hotel_id="'.$values['hotel_id'].'" date_include="'.$values['date'].'"]');
  $result = json_encode(array('markup_form' => $content_form, 'markup_hotel' => $content_hotel));
  echo $result;
  wp_die();
}

// Date Filter Ajax action.
add_action( 'wp_ajax_sidebarfilter', 'sidebarfilterajax_callback' );
add_action( 'wp_ajax_nopriv_sidebarfilter', 'sidebarfilterajax_callback' );
function sidebarfilterajax_callback() {
  $values = $_REQUEST;
  $content = do_shortcode('[template_list_page_item post_type="'.$values['page_post_type'].'" per_page="'.$values['per_page'].'" sort_layout="'.$values['sort_layout'].'" sort_by_price="'.$values['sort_by_price'].'" tour_date="'.$values['tour_date'].'"]');
  //$content_form = "HeoChauA";
  $result = json_encode(array('markup_form' => $content));
  echo $result;
  wp_die();
}

// Date Filter Ajax action.
add_action( 'wp_ajax_filtertest', 'filtertest_callback' );
add_action( 'wp_ajax_nopriv_filtertest', 'filtertest_callback' );
function filtertest_callback() {
  $values = $_REQUEST;
  /*$data_filter = $values['data_test'];
  $content = '';
  foreach ($data_filter as $key_filters => $filters) {
    $content .= '<div class="filters"><label>' . $key_filters . '</label>';
    foreach ($filters as $key_filter => $filter) {
      $content .= '<div class="filter-by">' . $key_filter . ' - ' . $filter . '</div>';
    }
    $content .= '</div>';
  }*/
  ob_start();
  global $paged;
  if (!isset($paged) || !$paged){
    $paged = 1;
  }

  $context    = Timber::get_context();

  $post_type          = $values['page_post_type'];
  //$per_page           = -1;
  $per_page           = $values['per_page'];
  $offset             = '';
  $sort_layout        = $values['sort_layout'];
  $sort_by_price      = $values['sort_by_price'];
  $sidebar_filter_tax = $values['data_sidebar_filter']['taxonomy'];
  $sidebar_filter_cf  = $values['data_sidebar_filter']['custom_field'];

  $args = array(
    'post_type'       => $post_type,
    'posts_per_page'  => $per_page,
    'post_status'     => 'publish',
    'offset'          => $offset,
    'paged'           => $paged,
    'meta_query'      => array(
      'relation' => 'AND',
    ),
    'tax_query' => array(
      'relation' => 'AND',
    ),
  );

  switch ($post_type) {
    case 'tour':
      foreach ($sidebar_filter_tax as $tax_name => $tax) {
        if ( $tax != '' and $tax != null ) {
          $terms = explode("|", $tax);
          $terms = array_filter($terms);
          $args['tax_query'][] = array(
            'taxonomy' => $tax_name,
            'field'    => 'term_id',
            'terms'    => $terms,
            'operator' => 'IN',
          );
        }
      }

      foreach ($sidebar_filter_cf as $cf_name => $cf_value) {
        if ( $cf_value != '' and $cf_value != null ) {
          switch ($cf_name) {
            case 'tour_price':
              $cf_values = explode(",", $cf_value);
              $min_price = $cf_values[0];
              $max_price = $cf_values[1];

              $args['meta_query'][] = array(
                'key'       => 'tour_price',
                'value'     => $cf_values,
                'type'      => 'numeric',
                'compare'   => 'BETWEEN'
              );
              break;

            case 'departure_day':
              $date = strtotime($cf_value);
              $day_of_date = date('l', $date);

              $args['meta_query'][] = array(
                'key'       => 'departure_day',
                'value'     => $day_of_date,
                'compare'   => 'REGEXP'
              );
              break;
            
            default:
              $cf_values = explode("|", $cf_value);
              $cf_values = array_filter($cf_values);
              
              $args['meta_query'][] = array(
                'key'       => $cf_name,
                'value'     => $cf_values,
                'compare'   => 'IN'
              );
              break;
          }
        }
      }

      if ($sort_by_price == 'lth') {
        $meta_query = array(
          'key' => 'tour_price',
          'compare'   => 'EXISTS',
        );

        $orderby = array(
          'tour_price_clause' => 'ASC',
        );

        $args['meta_query']['tour_price_clause'] = $meta_query;
        $args['orderby'] = $orderby;
        
      } else if ($sort_by_price == 'htl') {
        $meta_query = array(
          'key' => 'tour_price',
          'compare'   => 'EXISTS',
        );

        $orderby = array(
          'tour_price_clause' => 'DESC',
        );

        $args['meta_query']['tour_price_clause'] = $meta_query;
        $args['orderby'] = $orderby;

      } else {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
      }

      break;
    
    default:
      # code...
      break;
  }

  //print_r($args);
  query_posts($args);
  $posts                        = Timber::get_posts($args);
  $context['posts']             = $posts;
  $context['sort_layout']       = $sort_layout;
  $pagination                   = Timber::get_pagination();
  $context['pagination_total']  = $pagination['total'];

  $context['data_test'] = $values;
  $context['data_post'] = $args;

  try {
    Timber::render( array( 'shortcode-list-page-item.twig'), $context );
  } catch (Exception $e) {
    echo __('Could not find a shortcode-list-page-item.twig file for Shortcode.', 'pdj_theme');
  }


  $content = ob_get_contents();
  ob_end_clean();

  $result = json_encode($content);
  echo $result;
  wp_die();
}

// menu
add_theme_support( 'menus' );
add_action('init', 'rhm_menu');
function rhm_menu() {
  register_nav_menus(array (
    'main' => 'Main Menu',
    'footer' => 'Footer Menu'
  ));
}

// Theme support custom logo
add_action( 'after_setup_theme', 'pdj_setup' );
function pdj_setup() {
  add_theme_support( 'custom-logo', array(
    'flex-width' => true,
  ) );
}

// Theme support custom logo
add_theme_support( 'post-thumbnails' );

add_action( 'admin_init', 'pdj_remove_default_field' );
function pdj_remove_default_field() {
  remove_post_type_support( 'page', 'thumbnail' );
  remove_post_type_support( 'post', 'thumbnail' );
}

// Unset URL from comment form
add_filter( 'comment_form_fields', 'pdj_move_comment_form_below' );
function pdj_move_comment_form_below( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

// Set per page on each page
add_action( 'pre_get_posts',  'pdj_set_posts_per_page'  );
function pdj_set_posts_per_page( $query ) {
  global $wp_the_query;
  if ( (!is_admin()) && ( $query === $wp_the_query ) && ( $query->is_archive() ) ) {
    $query->set( 'posts_per_page', 1 );
  }
  return $query;
}

add_filter( 'body_class', 'pdj_body_class' );
function pdj_body_class( $classes ) {
  return $classes;
}

add_filter('upload_mimes', 'pdj_theme_support_files_type', 1, 1);
function pdj_theme_support_files_type($mime_types){
  $mime_types['svg'] = 'image/svg+xml';
  return $mime_types;
}


/*
**
** Support Widget Layout
**
*/


/* Add Dynamic Siderbar */
if (function_exists('register_sidebar')) {
  // Define Sidebar
  register_sidebar(array(
    'name' => __('Sidebar'),
    'description' => __('Description for this widget-area...'),
    'id' => 'sidebar-1',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  // Define Header block
  register_sidebar(array(
    'name' => __('Header block'),
    'description' => __('Description for this widget-area...'),
    'id' => 'header-block',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  // Define Footer
  register_sidebar(array(
    'name' => __('Footer block'),
    'description' => __('Description for this widget-area...'),
    'id' => 'footer-block',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}

// Theme support get widget ID
function pdj_get_widget_id($widget_instance) {
  if ($widget_instance->number=="__i__"){
    echo "<p><strong>Widget ID is</strong>: Pls save the widget first!</p>"   ;
  } else {
    echo "<p><strong>Widget ID is: </strong>" .$widget_instance->id. "</p>";
  }
}
add_action('in_widget_form', 'pdj_get_widget_id');

// Sidebar widget arena
add_action( 'widgets_init', 'pdj_create_sidebar_Widget' );
function pdj_create_sidebar_Widget() {
  register_widget('sidebar_Widget');
}

class sidebar_Widget extends WP_Widget {
  public function __construct() {
    $widget_ops = array(
      'classname' => 'sidebar_widget',
      'description' => __( 'Sidebar widget.', 'pdj_theme'),
      'customize_selective_refresh' => true,
    );
    $control_ops = array( 'width' => 400, 'height' => 350 );
    parent::__construct( 'sidebar_widget', __( 'Sidebar Widget', 'pdj_theme' ), $widget_ops, $control_ops );
  }

  public function widget( $args, $instance ) {
    $title    = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    if ( $title ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
    echo $args['after_widget'];
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }

  function form( $instance ) {
    $title      = esc_attr( $instance['title'] );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <?php
  }
}

// Header widget arena
add_action( 'widgets_init', 'pdj_create_header_Widget' );
function pdj_create_header_Widget() {
  register_widget('header_Widget');
}

class header_Widget extends WP_Widget {
  public function __construct() {
    $widget_ops = array(
      'classname' => 'header_widget',
      'description' => __( 'Custom widget.', 'pdj_theme'),
      'customize_selective_refresh' => true,
    );
    $control_ops = array( 'width' => 400, 'height' => 350 );
    parent::__construct( 'header_widget', __( 'Header Widget', 'pdj_theme' ), $widget_ops, $control_ops );
  }

  public function widget( $args, $instance ) {
    $title    = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    if ( $title ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
    echo $args['after_widget'];
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }

  function form( $instance ) {
    $title      = esc_attr( $instance['title'] );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <?php
  }
}

// Footer widget arena
add_action( 'widgets_init', 'pdj_create_footer_Widget' );
function pdj_create_footer_Widget() {
  register_widget('footer_Widget');
}

class footer_Widget extends WP_Widget {
  public function __construct() {
    $widget_ops = array(
      'classname' => 'footer_Widget',
      'description' => __( 'Custom widget.', 'pdj_theme'),
      'customize_selective_refresh' => true,
    );
    $control_ops = array( 'width' => 400, 'height' => 350 );
    parent::__construct( 'footer_Widget', __( 'Footer Widget', 'pdj_theme' ), $widget_ops, $control_ops );
  }

  public function widget( $args, $instance ) {
    $title        = apply_filters( 'widget_title', $instance['title'] );
    $widget_class = $instance['widget_class'];
    echo $args['before_widget'];
    if ( $title ) {
      echo $args['before_title'] . $title . $args['after_title'];
      echo $widget_class;
    }
    echo $args['after_widget'];
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['widget_class'] = strip_tags($new_instance['widget_class']);
    return $instance;
  }

  function form( $instance ) {
    $title          = esc_attr( $instance['title'] );
    $widget_class   = esc_attr( $instance['widget_class'] );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('widget_class'); ?>"><?php _e('Widget Class:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('widget_class'); ?>" name="<?php echo $this->get_field_name('widget_class'); ?>" type="text" value="<?php echo $widget_class; ?>" />
    </p>
    <?php
  }
}
