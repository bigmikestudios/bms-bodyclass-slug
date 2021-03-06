<?php
/**
 * @author Mike Lathrop
 * @version 0.0.1
 */
/*
Plugin Name: BMS Bodyclass Slug
Plugin URI: http://bigmikestudios.com
Description: adds slug-[slug] and decendant-slug-[slug] to the bodyclass. Credit also belongs to the author of this post: http://www.wpbeginner.com/wp-themes/how-to-add-page-slug-in-body-class-of-your-wordpress-themes/
Version: 0.0.1
Author URI: http://bigmikestudios.com
*/
// =============================================================================

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post->post_name ) ) {
		$classes[] = 'slug-' . $post->post_name;
	}
	$parent = (isset($post->post_parent)) ? $post->post_parent : NULL;
	while ($parent > 0)  {
		$parent_post = get_post($parent);
		$classes[]= 'descendant-slug-'.$parent_post->post_name;
		$parent = $parent_post->post_parent;
	}
		
	return $classes;
	}
add_filter( 'body_class', 'add_slug_body_class' );