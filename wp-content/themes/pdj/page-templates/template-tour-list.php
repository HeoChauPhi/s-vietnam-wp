<?php
/**
 * Template Name: View Tour List
 *
 * @package WordPress
 * @subpackage PDJ
 * @since PDJ 1.0
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['template_type'] = 'tour';
Timber::render( 'page-template-list.twig', $context );
?>
