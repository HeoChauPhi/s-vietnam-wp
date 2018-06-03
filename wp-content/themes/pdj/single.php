<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

/*$instagram_url = 'https://api.instagram.com/v1/users/nam.niem.no/media/recent?access_token=1985704956.1677ed0.84af8e8b80854a55a022bbea72c13fc5';
$instagram_request = file_get_contents($instagram_url);
$instagram_arr = json_decode($instagram_request);
echo 'ok';
print_r($instagram_arr);

die();*/

// https://crm.zoho.com/crm/private/json/Quotes/insertRecords
// 04929aee313e8ca2e632e8dcc9fbe0f3

/*$get_ip_url = 'https://api.ipify.org?format=json';
$ip_contents = file_get_contents($get_ip_url);
$ip_decode = json_decode($ip_contents);
$client_ip = $ip_decode->ip;
$get_info_url = 'http://ipinfo.io/' . $client_ip . '/json';
$get_ip_contents = file_get_contents($get_info_url);
$ip_info = json_decode($get_ip_contents);
$ip_timzone = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $ip_info->country);*/

date_default_timezone_set("Asia/Ho_Chi_Minh");
$current_time = date('l d-m-Y H:i:s A, e P');
$current_day = date('l');
$post_type = get_post_type();

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['current_time'] = $current_time;
$context['current_day'] = $current_day;

// Tour Post type
if ( $post_type && $post_type === "tour" ) {
  $tour_filters = $_GET;
  $context['tour_filters'] = $tour_filters;
}

// Hotel Post type
if ( $post_type && $post_type === "hotel" ) {
  $address = get_field('address_coordinates', $post->ID);
  $address_arr = explode(',', $address);

  //$context['hotel_address'] = Get_Address_From_Google_Maps(10.3509168, 107.0982344);
}

Timber::render( 'single.twig', $context );

/*$fields = acf_get_fields("group_59829e22ab6e2");
print_r($fields);
die;*/
/*$reference_number = "WEB-0000004";

$invoice = '{"customer_id":765126000000276050,"date":2018-10-13,"reference_number":'.$reference_number.',"line_items":[{"item_id":765126000000269149,"item_custom_fields":[{"label":"NightQly","value":1}],"rate":4500000,"quantity":1.0,"description": "acf"},{"item_id":765126000000269221,"item_custom_fields":[{"label":"NightQly","value":2}],"rate":1550000,"quantity":1.0,"description": "abc"}],"custom_fields":[{"index":1,"value":"Payment Finished","label":"Status","show_in_pdf":true}]}';

//$url = 'https://invoice.zoho.com/api/v3/invoices/';
$url = 'https://invoice.zoho.com/api/v3/estimates/';

$data = array(
  'authtoken'     => 'd863578a6488191640945f4b5729c8cc',
  "organization_id"   => '654389817',
  'JSONString'    => $invoice
);
$ch = curl_init($url);
curl_setopt_array($ch, array(
  CURLOPT_POST => 1,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_POSTFIELDS => http_build_query($data),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => array("Content-Type:application/x-www-form-urlencoded")
));

$response = curl_exec($ch);
$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

var_dump($response);

$estimate_url = 'https://invoice.zoho.com/api/v3/estimates?authtoken=d863578a6488191640945f4b5729c8cc&organization_id=654389817';
$estimate_request = file_get_contents($estimate_url);
$estimate_arr = json_decode($estimate_request);
print_r($estimate_arr);
echo '<br>';
$estimate_id = '';
foreach ($estimate_arr->estimates as $key => $value) {
  if ( $value->reference_number == $reference_number ) {
    $estimate_id = $value->estimate_id;
  }
}

echo $estimate_id;*/

//$estimate_sent = 'https://invoice.zoho.com/api/v3/estimates/'.$estimate_id.'/status/sent/';
/*$json_string = '{"send_from_org_email_id":false,"to_mail_ids":["linhthuy.hanu@gmail.com"]}';

$estimate_sent = 'https://invoice.zoho.com/api/v3/estimates/765126000000276231/email';

$data_estimate_sent = array(
  'authtoken'     => 'd863578a6488191640945f4b5729c8cc',
  "organization_id"   => '654389817',
  'JSONString'    => $json_string
);
$ch_estimate_sent = curl_init($estimate_sent);
curl_setopt_array($ch_estimate_sent, array(
  CURLOPT_POST => 1,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_POSTFIELDS => http_build_query($data_estimate_sent),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => array("Content-Type:application/x-www-form-urlencoded")
));

$response_estimate_sent = curl_exec($ch_estimate_sent);
$response_estimate_sent = curl_getinfo($ch_estimate_sent, CURLINFO_HTTP_CODE);
curl_close($ch_estimate_sent);

var_dump($response_estimate_sent);*/