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

// https://crm.zoho.com/crm/private/json/Quotes/insertRecords
//echo $zohocrm_author_token;
if ($_POST['subject'] && $_POST['grand_total'] && $_POST['net_total']) {
  $row          = $_POST['row'];
  $subject       = $_POST['subject'];
  $quote_stage  = $_POST['quote_stage'];
  $product_id   = $_POST['product_id'];
  $quantity     = $_POST['quantity'];
  $total     = $_POST['total'];
  $net_total     = $_POST['net_total'];
  $grand_total     = $_POST['grand_total'];

  $xml = "<Quotes><row no='".$row."'><FL val='Subject'>".$subject."</FL><FL val='Quote Stage'>".$quote_stage."</FL><FL val='Grand Total'>".$grand_total."</FL><FL val='Product Details'><product no='1'><FL val='Product Id'>".$product_id."</FL><FL val='Quantity'>".$quantity."</FL><FL val='Total'>".$total."</FL><FL val='Net Total'>".$net_total."</FL></product></FL><FL val='Terms and Conditions'>Test by Zoho</FL><FL val='Description'>Test By Zoho</FL></row></Quotes>";

  do_post_request('https://crm.zoho.com/crm/private/json/Quotes/insertRecords', "authtoken=" . $zohocrm_author_token . "&scope=crmapi&xmlData=" . $xml);
}

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render( 'single.twig', $context );
