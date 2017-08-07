<?php
/**
 * Template Name: View List Search Service
 *
 * @package WordPress
 * @subpackage PDJ
 * @since PDJ 1.0
 */

$context = Timber::get_context();

// Tour Variables
if (isset($_GET['tour_type'])) {
  $tour_type = $_GET['tour_type'];
}
if (isset($_GET['tour_start']) && !empty($_GET['tour_start'])) {
  $date_tour_start = strtotime($_GET['tour_start']);
  $tour_start = date('Ymd', $date_tour_start);
}
if (isset($_GET['tour_destination']) && !empty($_GET['tour_destination'])) {
  $date_tour_destination = strtotime($_GET['tour_destination']);
  $tour_destination = date('Ymd', $date_tour_destination);
}

// Fly Ticket Variables
if (isset($_GET['fly_start'])) {
  $fly_start = $_GET['fly_start'];
}
if (isset($_GET['fly_destination'])) {
  $fly_destination = $_GET['fly_destination'];
}
if (isset($_GET['fly_round_trip'])) {
  $fly_round_trip = $_GET['fly_round_trip'];
}
if (isset($_GET['fly_date_start'])) {
  $fly_date_start = $_GET['fly_date_start'];
}
if (isset($_GET['fly_date_destination'])) {
  $fly_date_destination = $_GET['fly_date_destination'];
}
if (isset($_GET['fly_people'])) {
  $fly_people = $_GET['fly_people'];
}
if (isset($_GET['fly_childs'])) {
  $fly_childs = $_GET['fly_childs'];
}

// Hotel Variables
if (isset($_GET['hotel_area'])) {
  $hotel_area = $_GET['hotel_area'];
}
if (isset($_GET['hotel_date_checkin'])) {
  $hotel_date_checkin = $_GET['hotel_date_checkin'];
}
if (isset($_GET['hotel_date_checkout'])) {
  $hotel_date_checkout = $_GET['hotel_date_checkout'];
}
if (isset($_GET['hotel_room'])) {
  $hotel_room = $_GET['hotel_room'];
}
if (isset($_GET['hotel_people'])) {
  $hotel_people = $_GET['hotel_people'];
}
if (isset($_GET['hotel_childs'])) {
  $hotel_childs = $_GET['hotel_childs'];
}
if (isset($_GET['hotel_childs_age'])) {
  $hotel_childs_age = $_GET['hotel_childs_age'];
}

// List Tours
$tour_ids = [];
$args_tour_filter = array(
  'post_type'   => 'tour',
  's'           => $tour_type,
  'meta_query'      => array(
    'relation'      => 'AND',
    array(
      'key'     => 'tour_for_days_start',
      'value'   => $tour_start,
      'compare' => 'LIKE',
    ),
    array(
      'key'     => 'tour_for_days_end',
      'value'   => $tour_destination,
      'compare' => 'LIKE',
    ),
  )
);
$post_tour = new WP_Query($args_tour_filter);

foreach ($post_tour->posts as $value) {
  array_push($tour_ids, $value->ID);
}

$args_tour = array(
  'post_type'       => 'tour',
  'post_status'     => 'publish',
  'post__in'        => $tour_ids,
  'orderby'         => 'post__in'
);
$posts_tour = Timber::get_posts($args_tour);

$context['page_title'] = __('Search results for: ', 'pdj_theme') . $tour_type;
$context['posts'] = $posts_tour;

Timber::render( 'page-template-list.twig', $context );
?>
