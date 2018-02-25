<?php
$timber = new \Timber\Timber();

use Timber\Timber;
use Timber\Menu;

// load the theme's framework
require_once dirname( __FILE__ ) . '/theme-support.php';

// Get custom function template with Timber
Timber::$dirname = array('templates', 'templates/blocks', 'templates/shortcode', 'templates/pages', 'templates/layouts', 'templates/views');

/**
 *
 * View Related Post by Taxonomy.
 * @param type $custom_cat String slug of vocabulary.
 * @param type $showpost Int number post want show.
 *
 * @return type $loop_custom Object for post.
 *
 */
function related($custom_cat, $showpost = -1) {
  global $post;
  $argss = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'ids');
  $terms = wp_get_post_terms( $post->ID, $custom_cat, $argss );
  $myposts = array(
    'showposts' => $showpost,
    'post_type' => 'any',
    'post__not_in' => array($post->ID),
    'tax_query' => array(
      array(
      'taxonomy' => $custom_cat,
      'field' => 'term_id',
      'terms' => $terms
      )
    )
  );
  $loop_custom = Timber::get_posts($myposts);
  return $loop_custom;
}

/**
 *
 * View Related Post by Custom Fields.
 * @param type $post_type String slug of Post Type.
 * @param type $custom_field String Slug of Custom field.
 * @param type $showpost Int like post_per_page.
 *
 * @return type $related Object for post.
 *
 */
function related_by_acf_ref($postID, $custom_field, $showpost = -1) {
  global $post;

  if ($postID) {
    $post_id = $postID;
  } else {
    $post_id = $post->ID;
  }

  $obj_field = get_field($custom_field, $post_id);
  $post_type = get_post_type($post_id);

  $args_return = array(
    'numberposts'   => $showpost,
    'post_type'     => $post_type,
    'post__not_in'  => array($post_id),
    'meta_query'    => array(
      'relation'    => 'OR',
      array(
        'key'       => $custom_field,
        'value'     => $obj_field->ID,
        'compare'   => '=',
      )
    )
  );
  $related = Timber::get_posts($args_return);

  return $related;
}


/**
 *
 * Disable Dynamic Sidebar.
 * @param type $name String slug of Dynamic Sidebar.
 *
 * @return Dynamic Sidebar.
 *
 */
function sidebar($name) {
  if ( is_active_sidebar( $name ) ) {
    dynamic_sidebar($name);
  }
  return;
}

/**
 *
 * Disable shortcode.
 * @param type $name String shortcode form.
 *
 * @return Shortcode.
 *
 */
function shortcode($name) {
  echo do_shortcode($name);
  return;
}

/**
 *
 * ACF in Widget.
 * @param type $name String Slug of ACF field.
 * @param type $widgetid String Slug of Widget.
 *
 * @return type $acffield String, Array Value of ACF field in Widget.
 *
 */
function acfwidget($name, $widgetid) {
  $acffield = get_field($name, 'widget_' . $widgetid);
  //print_r($acffield);

  if ( !empty( $acffield ) ) {
    foreach ($acffield as $field) {
      //print_r($field);
      $layout = $field['acf_fc_layout'];

      switch ($layout) {
        case 'sidebar_filter_by_customfields':
        case 'sidebar_price_block':
          $arg = array(
            'post_type'       => $field['post_types'],
            'post_status'     => 'publish',
            'posts_per_page'  => -1
          );
          $post = Timber::get_posts($arg);
          $field['post_types_' . $field['post_types']] = $post;

          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }
          break;
        
        default:
          //print_r($field);

          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }
          break;
      }

      //print_r($field);
    }
  }
  return;
}

/**
 *
 * ACF Object Return.
 * @param type $name String Slug of ACF field.
 * @param type $object String Slug of Widget.
 *
 * @return Object of ACF fields.
 *
 */
function acfobject($name, $object) {
  $field = get_field_object($name);
  $field_object = $field[$object];
  if (is_array($field_object)) {
    return $field_object;
  } else {
    echo $field_object;
  }
  return;
}

/**
 *
 * View List Taxonomy.
 * @param type $tax String Slug of Taxonomy.
 *
 * @return HTML Template for all term of taxonomy.
 *
 */
function taxvalue($tax) {
  $args = array(
    'parent' => 0,
    'orderby' => 'slug',
    'hide_empty' => false
  );

  $terms = get_terms( $tax, $args);
  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    echo '<ul class="listcat listcat-'.$tax.'">';
    foreach ( $terms as $term ) {
      $subterms1 = get_terms($tax, array('parent' => $term->term_id, 'orderby' => 'slug', 'hide_empty' => false));

      if (sizeof($subterms1) > 0) {
        echo '<li class="listcat-item"><a href="'.esc_url( get_term_link( $term ) ).'">' . $term->name . '</a>';

        // sub term 1
        echo '<ul class="subterm">';
          foreach ($subterms1 as $term) {
            $subterms2 = get_terms($tax, array('parent' => $term->term_id, 'orderby' => 'slug', 'hide_empty' => false));

            if (sizeof($subterms2) > 0) {
              echo '<li class="listcat-item has-subterm"><a href="'.esc_url( get_term_link( $term ) ).'">' . $term->name . '</a>';

              // sub term 2
              echo '<ul class="subterm">';
              foreach ($subterms2 as $term) {
                echo '<li class="listcat-item"><a href="'.esc_url( get_term_link( $term ) ).'">' . $term->name . '</a></li>';
              }
              echo '</ul></li>';
            } else {
              echo '<li class="listcat-item"><a href="'.esc_url( get_term_link( $term ) ).'">' . $term->name . '</a></li>';
            }
          }
        echo '</ul></li>';
      } else {
        echo '<li class="listcat-item"><a href="'.esc_url( get_term_link( $term ) ).'">' . $term->name . '</a></li>';
      }
    }
    echo '</ul>';
  }
}

/**
 *
 * Get Term name.
 * @param type $slug String Slug of Term.
 * @param type $tax String Slug of Taxonomy.
 *
 * @return type $term_name String Name of the term.
 *
 */
function get_term_name($slug, $tax){
  $term = get_term_by('slug', $slug, $tax);
  $term_name = array(
    array(
      'name' => $term->name,
      'slug' => $term->slug,
      'link' => esc_url( get_term_link( $term ) ),
    )
  );
  return $term_name;
}

/**
 *
 * Get Term By Post ID.
 * @param type $post_id Int ID of post.
 * @param type $tax_slug Sring Slug of Taxonomy.
 *
 * @return type $terms Array, Object all terms.
 *
 */
function get_post_terms($post_id, $tax_slug, $return = 'all'){
  $terms = wp_get_post_terms($post_id, $tax_slug, array( 'fields' => $return ));

  return $terms;
}

/**
 *
 * Get Avatar Author.
 * @param type $size String (150x150) Size of Image.
 *
 * @return type $avatar String URL for Avatar Author.
 *
 */
function avatar_author($size = '') {
  $avatar = get_avatar( get_the_author_meta( 'ID' ), $size );
  return $avatar;
}

/**
 *
 * Get Post Link.
 * @param type $id Int Post ID.
 *
 * @return type $post_link String URL for Post.
 *
 */
function get_post_link($id) {
  $post_link = get_post_permalink($id);
  return $post_link;
}

/**
 *
 * Custom ACF Field Object Post.
 * @param type $field Object fields ACF on flexible_content Function.
 * @param type $type String Slug of list_type field.
 * @param type $post_obj String Slug of object_post field.
 * @param type $post_type String Slug of Post Type need get.
 * @param type $taxonomy String Slug of Taxonomy need get.
 *
 * @return type $field Object push list Post object into $field.
 *
 */
function acf_return_item($field, $type = 0, $post_obj, $post_type, $taxonomy = '') {
  if($type) {
    $list_type = $field[$type];
  } else {
    $list_type == 0;
  }

  if($list_type == 0){ // Type = Custom
    $ids = array();
    $acf_post_obj = $field[$post_obj];
    foreach ($acf_post_obj as $value) {
      array_push($ids, $value->ID);
    }

    $posts = Timber::get_posts($ids);
    $field['return_items'] = $posts;

  } else { // Type = Latest
    $custom_post = explode(", ",$post_type);
    $args = array(
      'post_type'       => $custom_post,
      'posts_per_page'  => 5,
      'post_status'     => 'publish',
    );
    if (!empty($taxonomy) && $field[$taxonomy]) {
      $args['tax_query'] = array(
        'relation'  => 'AND',
        array(
          'taxonomy'  => $field[$taxonomy]->taxonomy,
          'field'     => 'term_id',
          'terms'     => array($field[$taxonomy]->term_id)
        ),
      );
    }

    $posts = Timber::get_posts($args);
    $field['return_items'] = $posts;
  }

  return $field;
}

/**
 *
 * ACF Custom Function.
 *
 */

/* Function Hot Tours */
function hot_tours($fieldobj) {
  $field = $fieldobj;
  $layout = $field['acf_fc_layout'];
  $type = $field['hot_tours_type'];

  if ($type == 'custom') {
    $tour_ids = [];
    $tour_obj = $field['hot_tours_list_custom'];
    if ( $tour_obj ) {
      foreach ($tour_obj as $value) {
        array_push($tour_ids, $value->ID);
      }
    }
    
    $arg_tour = array(
      'post_type'       => 'tour',
      'post_status'     => 'publish',
      'post__in'        => $tour_ids,
      'orderby'         => 'post__in'
    );
    $tour_posts = Timber::get_posts($arg_tour);
    $field['hot_tours_list_custom'] = $tour_posts;
  } else {
    $arg_tour = array(
      'post_type'       => 'tour',
      'post_status'     => 'publish',
      'posts_per_page'  => $field['hot_tours_per_page'],
    );
    $tour_posts = Timber::get_posts($arg_tour);
    $field['hot_tours_list_custom'] = $tour_posts;
  }

  return $field;
}

/* Function Post List  */
function posts_list($fieldobj) {
  $field = $fieldobj;
  $layout = $field['acf_fc_layout'];
  $type = $field['posts_list_type'];

  if ($type == 'custom') {
    $post_ids = [];
    $post_obj = $field['posts_list_custom'];
    foreach ($post_obj as $value) {
      array_push($post_ids, $value->ID);
    }
    
    $arg_post = array(
      'post_type'       => 'post',
      'post_status'     => 'publish',
      'post__in'        => $post_ids,
      'orderby'         => 'post__in'
    );
    $posts = Timber::get_posts($arg_post);
    $field['posts_list_custom'] = $posts;
  } else {
    $arg_post = array(
      'post_type'       => 'post',
      'post_status'     => 'publish',
      'posts_per_page'  => $field['posts_list_per_page'],
    );
    $posts = Timber::get_posts($arg_post);
    $field['posts_list_custom'] = $posts;
  }
  //print_r($field);
  return $field;
}

/* Function Hot Areas  */
function hot_areas($fieldobj) {
  $field = $fieldobj;
  $layout = $field['acf_fc_layout'];
  $current_locate = json_decode(file_get_contents("http://ipinfo.io/"));
  $field['current_locate'] = $current_locate;
  
  return $field;
}

/* Function Hotels List  */
function hotels_list($fieldobj) {
  $field = $fieldobj;
  $layout = $field['acf_fc_layout'];
  $type = $field['hotels_filter_by'];

  if ($type == 'custom') {
    $post_ids = [];
    $post_obj = $field['hotels_custom'];
    foreach ($post_obj as $value) {
      array_push($post_ids, $value->ID);
    }
    
    $arg_post = array(
      'post_type'       => 'hotel',
      'post_status'     => 'publish',
      'post__in'        => $post_ids,
      'orderby'         => 'post__in'
    );
    $posts = Timber::get_posts($arg_post);
    $field['posts_list_custom'] = $posts;
  } elseif ($type == 'price') {
    $posts_list = [];
    $arg_post = array(
      'post_type'       => 'hotel',
      'post_status'     => 'publish',
      'posts_per_page'  => $field['hotels_per_page'],
    );
    $posts = Timber::get_posts($arg_post);
    foreach ($posts as $post) {
      $room_prices = [];
      $rooms = get_field('room_type', $post->ID);
      //print_r($rooms);

      foreach ($rooms as $room) {
        $room_price = get_field('hotel_price_public', $room->ID);
        array_push($room_prices, array(
          'room_id' => $room->ID,
          'room_price' => $room_price
        ));
      }

      usort($room_prices, function($a, $b) {
        return (int) $a['room_price'] - (int) $b['room_price'];
      });

      $post->room_id_min = $room_prices[0]['room_id'];
      $post->room_price_min = $room_prices[0]['room_price'];
      array_push($posts_list, $post);
    }

    usort($posts_list, function($a, $b) {
      return (int) $a->room_price_min - (int) $b->room_price_min;
    });
    $field['posts_list_custom'] = $posts_list;

    //print_r($field);
  } else {
    $arg_post = array(
      'post_type'       => 'hotel',
      'post_status'     => 'publish',
      'posts_per_page'  => $field['hotels_per_page'],
    );
    $posts = Timber::get_posts($arg_post);
    $field['posts_list_custom'] = $posts;
  }
  //print_r($field);
  return $field;
}

/**
 *
 * ACF Flexible Content Fielld.
 * @param type $name String Slug ACF flexible_content field.
 *
 * @return Array all sub_fields in flexible_content field.
 *
 */
function flexible_content($name) {
  $fc_type = array();

  global $post;
  $fc = get_field( $name, $post->ID );
  $fc_ob = get_field_object( $name, $post->ID );

  if ( !empty( $fc ) ) {
    foreach ($fc as $field) {
      $layout = $field['acf_fc_layout'];
      $fc_type[$layout] = array();

      $default_bg = get_template_directory_uri().'/dist/images/no-image.jpg';
      $field['default_bg'] = new TimberImage($default_bg);

      switch ($layout) {
        case 'hot_tours':
          $field = hot_tours($field);

          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }
          break;

        case 'posts_list':
          $field = posts_list($field);

          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }
          break;

        case 'hot_areas':
          $field = hot_areas($field);

          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }
          break;

        case 'hotels_list':
          $field = hotels_list($field);

          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }
          break;

        case 'content_sidebar':
          $conntent_layouts = $field['content_layout_group_component'];
          $sidebar_layouts = $field['sidebar_layout_group_component'];
          $field['content_layout_group_component_resuft'] = [];
          $field['sidebar_layout_group_component_resuft'] = [];

          foreach ($conntent_layouts as $subfield_content) {
            $content_layout = $subfield_content['acf_fc_layout'];

            switch ($content_layout) {
              case 'hot_tours':
                //$subfield_content = hot_tours($subfield_content);
                array_push($field['content_layout_group_component_resuft'], hot_tours($subfield_content));
                break;

              case 'posts_list':
                //$field['content_layout_group_component_resuft'] = posts_list($subfield_content);
                array_push($field['content_layout_group_component_resuft'], posts_list($subfield_content));
                break;

              case 'hot_areas':
                //$subfield_content = hot_areas($subfield_content);
                array_push($field['content_layout_group_component_resuft'], hot_areas($subfield_content));
                break;

              case 'hotels_list':
                //$subfield_content = hot_areas($subfield_content);
                array_push($field['content_layout_group_component_resuft'], hotels_list($subfield_content));
                break;

              case 'content_sidebar':
                echo __('Content - Sidebar field don\'t work in this layout.', 'pdj_theme');
                break;

              default:
                array_push($field['content_layout_group_component_resuft'], $subfield_content);
            }
          }

          foreach ($sidebar_layouts as $subfield_sidebar) {
            $sidebar_layout = $subfield_sidebar['acf_fc_layout'];

            switch ($sidebar_layout) {
              case 'hot_tours':
                array_push($field['sidebar_layout_group_component_resuft'], hot_tours($subfield_sidebar));
                break;

              case 'posts_list':
                array_push($field['sidebar_layout_group_component_resuft'], posts_list($subfield_sidebar));
                break;

              case 'hot_areas':
                array_push($field['sidebar_layout_group_component_resuft'], hot_areas($subfield_sidebar));
                break;

              case 'hotels_list':
                array_push($field['sidebar_layout_group_component_resuft'], hotels_list($subfield_sidebar));
                break;

              case 'content_sidebar':
                echo __('Content - Sidebar field don\'t work in this layout.', 'pdj_theme');
                break;

              default:
                array_push($field['sidebar_layout_group_component_resuft'], $subfield_sidebar);
            }
          }
          //print_r($field);
          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }

          break;

        default:
          //print_r($field);
          try {
            Timber::render($layout . '.twig', $field);
          } catch (Exception $e) {
            echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
          }
      }
    }
  }

  return;
}

/**
 *
 * ACF Clone Field.
 * @param type $name String Slug of clone field type.
 *
 * @return Array or Object ò all field cloned.
 *
 */
function sub_flexible_content($name) {
  foreach ($name as $field) {
    $layout = $field['acf_fc_layout'];

    switch ($layout) {
      case 'content_sidebar':
        echo __('Content - Sidebar field don\'t work in this layout.', 'pdj_theme');
        break;
      
      default:
        try {
          Timber::render($layout . '.twig', $field);
        } catch (Exception $e) {
          echo __('Could not find a twig file for layout type: ', 'pdj_theme') . $layout . '<br>';
        }
        break;
    }
  }

  return;
}

/**
 *
 * Preg Match URL.
 * @param type $amount Number need convert.
 * @param type $from Current Currency unit.
 * @param type $to Currency unit you nedd convert.
 *
 * @return type $converted Rounded to the 3 decimal.
 *
 */
function convertCurrency($amount, $from, $to){
  $url  = "https://finance.google.com/finance/converter?a=$amount&from=$from&to=$to";
  $data = file_get_contents($url);
  preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
  $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
  return round($converted, 3);
}

/**
 *
 * Preg Match URL.
 * @param type $field String URL Youtube, Vimeo.
 *
 * @return type $src.
 *
 */
function preg_match_url($field, $extend = '') {
  preg_match('/src="(.+?)"/', $field, $matches);
  $full_src = $matches[1];
  $src = explode("?", $full_src);

  if($extend) {
    $src = $src[0] . $extend;
  } else {
    $src = $src[0];
  }
  return $src;
}

/**
 *
 * Get ID from oEmbed.
 * @param type $url String HTML Iframe video.
 *
 * @return type $result String ID video from frame.
 *
 */
function get_id_embed($url) {
  $video_url = preg_match_url($url);
  $parsed = parse_url($video_url);

  if (strpos($parsed['host'], 'youtube') !== false) {
    $pattern =
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;

    $result       = preg_match($pattern, $video_url, $matches);

    $video_type   = 'youtube';
    $video_id     = $matches[1];
    $json_code    = file_get_contents('https://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $video_id . '&format=json');
    $video_thumb  = json_decode($json_code)->thumbnail_url;
  } else {
    $pattern = '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([‌​0-9]{6,11})[?]?.*/';
    $result = preg_match($pattern, $video_url, $matches);

    $video_type   = 'vimeo';
    $video_id     = $matches[5];
    $json_code    = file_get_contents('http://vimeo.com/api/v2/video/' . $video_id . '.json');
    $video_thumb  = json_decode($json_code)[0]->thumbnail_large;
  }

  if ($video_id) {
    return array(
      'video_type'  => $video_type,
      'video_id'    => $video_id,
      'video_thumb' => $video_thumb
    );
  }
  return false;
}

/**
 *
 * Get ID from Youtube URL.
 * @param type $url String Youtube URL.
 *
 * @return type $result String ID from Youtube URL.
 *
 */
function get_id_youtube($url) {
  $video_id = $url;
  $pattern =
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
  $result = preg_match($pattern, $video_id, $matches);
  if ($result) {
    return $matches[1];
  }
  return false;
}

/**
 *
 * Get exchange rate today.
 * @param type $from String Exchange code.
 * @param type $to String Exchange code.
 *
 * @return type $result array Exchange rate information.
 *
 */
function get_exchange_rate($from, $to) {
  $from_ex = $from;
  $to_ex = $to;
  $url = 'http://finance.yahoo.com/d/quotes.csv?f=l1d1t1&s='.$from_ex.$to_ex.'=X';
  $handle = fopen($url, 'r');

  if ($handle) {
    $result = fgetcsv($handle);
    fclose($handle);
  }

  return $result;
}

/**
 *
 * Convert String to Int.
 * @param type $value String want convert to int.
 *
 * @return type $result Int type.
 *
 */
function intConvert($value) {
  $result = (int) $value;

  return $result;
}

/**
 *
 * Call Array Filter PHP Function.
 * @param type $value Array.
 * @param type $callback Flag determining what arguments are sent to callback.
 *
 * @return type $result.
 *
 */
function arrayFilter($value) {
  $result = array_filter($value);

  return $result;
}

/**
 * Returns every date between two dates as an array
 * @param string $startDate the start of the date range
 * @param string $endDate the end of the date range
 * @param string $format DateTime format, default is d/m/Y
 * @return array returns every date between $startDate and $endDate, formatted as "Y-m-d"
 */
function createDateRange($startDate, $endDate, $format = "d/m/Y") {
  $begin = new DateTime($startDate);
  $end = new DateTime($endDate);
  $end = $end->modify( '+1 day' ); 

  $interval = new DateInterval('P1D'); // 1 Day
  $dateRange = new DatePeriod($begin, $interval, $end);

  $range = [];
  foreach ($dateRange as $date) {
    $range[] = $date->format($format);
  }

  return $range;
}

/**
 * Returns every date between two dates as an array
 * @param string $string of all date
 * @return array returns every date
 */
function date_range_by_string($date_include) {
  $all_date = [];
  $date_arr = explode(';', $date_include);
  foreach ($date_arr as $value) {
    $date_item_arr = explode('-', $value);

    if ( count($date_item_arr) > 1 ) {
      //array_push($all_date, trim($date_item_arr[0]), trim($date_item_arr[1]));
      $date_start = trim($date_item_arr[0]);
      $date_end   = trim($date_item_arr[1]);

      $date_start_arr   = explode('/', $date_start);
      $date_start_day   = $date_start_arr[0];
      $date_start_month = $date_start_arr[1];
      $date_start_year  = $date_start_arr[2];

      $date_end_arr   = explode('/', $date_end);
      $date_end_day   = $date_end_arr[0];
      $date_end_month = $date_end_arr[1];
      $date_end_year  = $date_end_arr[2];

      $date_start_replace = $date_start_month . '/' .$date_start_day . '/' . $date_start_year;
      $date_end_replace   = $date_end_month . '/' .$date_end_day . '/' . $date_end_year;

      $date_range = createDateRange($date_start_replace, $date_end_replace);
      $all_date = array_merge($all_date, $date_range);

    } else {
      array_push($all_date, trim($value));
    }
  }

  return array_unique($all_date);
}

/**
 *
 * Get Lat Lng from Google Maps.
 * @param type $addr String your Address.
 *
 * @return type $result array Address information.
 *
 */
function get_google_map($addr) {
  $address = $addr; // Google HQ
  $prepAddr = str_replace(' ','+',$address);
  $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
  $output= json_decode($geocode);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;

  $address_components = $output->results[0]->address_components;

  $city_name = '';
  if ($address_components) {
    foreach ($address_components as $key => $value) {
      $types = $value->types[0];
      if ( $types == "administrative_area_level_1" ) {
        $city_name = $value->long_name;
      }
    }
  }

  $results = array(
    'lat'   => $latitude,
    'lng'   => $longitude,
    'city'  => $city_name
  );
  
  return $results;
}

/**
 *
 * Add data value into Timber.
 *
 * @return type $data String, Object, Array Global value in Timber template.
 *
 */
add_filter('timber_context', 'pdj_twig_data');
function pdj_twig_data($data){
  // Theme setting
  $logo = get_template_directory_uri().'/dist/images/logo.png';
  $logo_scroll = $logo;
  $favicon = get_template_directory_uri().'/dist/images/favicon.ico';

  $data['site_logo_scroll'] = new TimberImage($logo_scroll);
  $data['site_favicon'] = new TimberImage($favicon);
  
  if (has_custom_logo()) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $custom_logo_attachment = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $custom_logo = $custom_logo_attachment[0];

    $data['site_logo'] = new TimberImage($custom_logo);
  } else {
    $data['site_logo'] = new TimberImage($logo);
  }

  // menu
  $data['menu']['main'] = new TimberMenu('main');
  $data['menu']['footer'] = new TimberMenu('footer');

  // Dynamic Sidebar
  $widget_data_sidebar = get_option('widget_sidebar_Widget');
  $widget_data_header = get_option('widget_header_Widget');
  $widget_data_footer = get_option('widget_footer_Widget');
  $data['sidebar_widget'] = $widget_data_sidebar;
  $data['header_widget'] = $widget_data_header;
  $data['footer_widget'] = $widget_data_footer;

  // Theme option
  $theme_options                = get_option('pdj_board_settings');
  $google_api_key               = $theme_options['pdj_google_api_key'];
  $pdj_facebook_url             = $theme_options['pdj_facebook_url'];
  $tour_canellation_policy      = $theme_options['pdj_tour_canellation_policy'];
  $tour_attention               = $theme_options['pdj_tour_attention'];

  $data['google_api_key']               = $google_api_key;
  $data['facebook_fanpage']             = $pdj_facebook_url;
  $data['tour_canellation_policy']      = $tour_canellation_policy;
  $data['tour_attention']               = $tour_attention;

  // Data Export
  if(is_tax()){
    $term_id = get_queried_object_id();
    $data['term_link'] = get_term_link($term_id);
  }

  $default_bg = get_template_directory_uri().'/dist/images/no-image.jpg';
  $data['default_bg'] = new TimberImage($default_bg);

  return $data;
}