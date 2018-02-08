<?php
/**
 * Template Name: View List
 *
 * @package WordPress
 * @subpackage PDJ
 * @since PDJ 1.0
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( 'page-template-list.twig', $context );
?>
