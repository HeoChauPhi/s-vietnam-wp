<?php
/**
 * Template Name: View List Search Service
 *
 * @package WordPress
 * @subpackage PDJ
 * @since PDJ 1.0
 */

$context = Timber::get_context();

if (isset($_REQUEST['search_type'])) {
  $post_type = $_REQUEST['search_type'];
}

// Tour Variables
if (isset($_REQUEST['tour_feature'])) {
  $term_id = $_REQUEST['tour_feature'];
  $term = new TimberTerm($term_id);
  $term_name = $term->name;
}
if (isset($_REQUEST['tour_start']) && !empty($_REQUEST['tour_start'])) {
  $date_string = $_REQUEST['tour_start'];
  $date_tour_start = strtotime($date_string);
  $tour_start = date('l', $date_tour_start);
}
if (isset($_REQUEST['destination_taxonomy']) && !empty($_REQUEST['destination_taxonomy'])) {
  $destination_taxonomy = $_REQUEST['destination_taxonomy'];
}
if (isset($_REQUEST['administrative_area_level_1']) && !empty($_REQUEST['administrative_area_level_1'])) {
  $administrative_area_level_1 = $_REQUEST['administrative_area_level_1'];
  $tour_area = strtolower(str_replace(' ', '_', vn_convert_to_en($administrative_area_level_1)));
}

// Fly Ticket Variables
if (isset($_REQUEST['fly_start'])) {
  $fly_start = $_REQUEST['fly_start'];
}
if (isset($_REQUEST['fly_destination'])) {
  $fly_destination = $_REQUEST['fly_destination'];
}
if (isset($_REQUEST['fly_round_trip'])) {
  $fly_round_trip = $_REQUEST['fly_round_trip'];
}
if (isset($_REQUEST['fly_date_start'])) {
  $fly_date_start = $_REQUEST['fly_date_start'];
}
if (isset($_REQUEST['fly_date_destination'])) {
  $fly_date_destination = $_REQUEST['fly_date_destination'];
}
if (isset($_REQUEST['fly_people'])) {
  $fly_people = $_REQUEST['fly_people'];
}
if (isset($_REQUEST['fly_childs'])) {
  $fly_childs = $_REQUEST['fly_childs'];
}

// Hotel Variables
if (isset($_REQUEST['hotel_area'])) {
  $hotel_area = $_REQUEST['hotel_area'];
}
if (isset($_REQUEST['hotel_date_checkin'])) {
  $hotel_date_checkin = $_REQUEST['hotel_date_checkin'];
}
if (isset($_REQUEST['hotel_date_checkout'])) {
  $hotel_date_checkout = $_REQUEST['hotel_date_checkout'];
}
if (isset($_REQUEST['hotel_room'])) {
  $hotel_room = $_REQUEST['hotel_room'];
}
if (isset($_REQUEST['hotel_people'])) {
  $hotel_people = $_REQUEST['hotel_people'];
}
if (isset($_REQUEST['hotel_childs'])) {
  $hotel_childs = $_REQUEST['hotel_childs'];
}
if (isset($_REQUEST['hotel_childs_age'])) {
  $hotel_childs_age = $_REQUEST['hotel_childs_age'];
}

/*
 * List posts
*/
$post = new TimberPost();

global $paged;
if (!isset($paged) || !$paged){
  $paged = 1;
}

$per_page = 1;

$args_data = array(
  'post_type'       => '',
  'posts_per_page'  => $per_page,
  'post_status'     => 'publish',
  'offset'          => '',
  'orderby'         => 'title',
  'order'           => 'ASC',
  'paged'           => $paged,
  'meta_query'      => array(
    'relation' => 'AND',
  ),
  'tax_query' => array(
    'relation' => 'AND',
  ),
);

$args_pagination = array(
  'post_type'       => '',
  'posts_per_page'  => $per_page,
  'post_status'     => 'publish',
  'paged'           => $paged
);

switch ($post_type) {
  case 'tour':                          // List Tours
    $args_data['post_type'] = 'tour';
    $args_pagination['post_type'] = 'tour';

    if ( $tour_start ) {
      $args_data['meta_query'][] = array(
        'key'       => 'departure_day',
        'value'     => $tour_start,
        'compare'   => 'REGEXP'
      );
    }

    if ( $term_id ) {
      $args_data['tax_query'][] = array(
        'taxonomy' => $term->taxonomy,
        'field'    => 'term_id',
        'terms'    => array($term_id),
        'operator' => 'IN',
      );
    }

    if ( $tour_area ) {
      $args_data['tax_query'][] = array(
        'taxonomy' => $destination_taxonomy,
        'field'    => 'slug',
        'terms'    => array($tour_area),
        'operator' => 'IN',
      );
    }

    //print_r($args_data);
    query_posts($args_data);
    $tours = Timber::get_posts($args_data);
    $pagination = Timber::get_pagination();
    /*print_r($pagination);*/

    $context['results_data'] = $tours;
    $context['pagination_filter'] = $pagination;
    $context['tour_date'] = $date_string;
    $context['per_page'] = $per_page;
    $context['tour_feature_term'] = $term_id;

    query_posts($args_pagination);
    $pagination_arr = Timber::get_pagination($args_pagination_arr['size'] = 999999999);
    $context['pagination'] = $pagination_arr;
    //print_r($pagination_arr);
    break;
  
  default:
    # code...
    break;
}

$post->title = __('Search results for: ', 'pdj_theme') . $term_name;
$context['post'] = $post;
$context['template_type'] = $post_type;
$context['search_results'] = 1;

//$term = get_term_by('id', $tour_type, 'tour_feature');
/*print_r($term);*/
//die();

Timber::render( 'page-template-list.twig', $context );
?>
