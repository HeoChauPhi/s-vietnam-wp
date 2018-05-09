<?php
/**
 * Template Name: View Hotel List
 *
 * @package WordPress
 * @subpackage PDJ
 * @since PDJ 1.0
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['template_type'] = 'hotel';
Timber::render( 'page-template-list.twig', $context );
?>
