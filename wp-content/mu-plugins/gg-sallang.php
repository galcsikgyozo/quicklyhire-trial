<?php
/**
 * Plugin Name:  GG - Stop The WP Madness
 * Description:  Disables WP REST API and removes the followings: default emoji support, RSS feed links, WP embed libraries, block library CSS, global WP styles, comment reply, duotone support for Gutenberg blocks, wlmanifest.xml, xmlrpc, WP version numbers, shortlinks.
 * Version:      1.0
 * Author:       Gyozo Galcsik
 */

if(is_blog_installed()){

/* *!* ******************************************************** *!* */
/* *!* ************** STOP THE WORDPRESS MADNESS ************** *!* */
/* *!* ******************************************************** *!* */

// Remove WordPress.org Dns-prefetch
remove_action('wp_head', 'wp_resource_hints', 2);

// Remove Emoji Support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove RSS feed links
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

// Remove WP-Embed
add_action('wp_footer', function(){
	wp_dequeue_script('wp-embed');
});

// Remove Classic Theme Styles
add_action( 'wp_enqueue_scripts', 'gg_theme_child_deregister_styles', 20 );
function gg_theme_child_deregister_styles() {
    wp_dequeue_style( 'classic-theme-styles' );

}

// Remove Block Library CSS, Global Styles and Comment Reply
add_action('wp_enqueue_scripts', function(){

	wp_dequeue_script('wp-block-library');
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style');

	wp_dequeue_style('global-styles');

	wp_dequeue_script('comment-reply');
});
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

// Remove Duotone support for Gutenberg blocks
add_filter('wp_lazy_loading_enabled', '__return_false');
add_action('init', function(){
	// remove duotone support for Gutenberg blocks
	remove_filter('render_block', 'wp_render_duotone_support');
});

// Disable WP API
add_filter('rest_authentication_errors', function($result){
	// If a previous authentication check was applied, pass that result along without modification.
	if(true === $result || is_wp_error($result)){
		return $result;
	}

	// No authentication has been performed yet.
	// Return an error if user is not logged in.
	if(!is_user_logged_in()){
		return new WP_Error(
			'rest_not_logged_in',
			__('You are not currently logged in.'),
			array('status' => 401)
		);
	}

	// Our custom authentication check should have no effect on logged-in requests
	return $result;
});
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Remove wlwmanifest.xml
remove_action('wp_head', 'wlwmanifest_link');

// Remove xmlrpc
remove_action('wp_head', 'rsd_link');

// Remove WordPress version number
function crunchify_remove_version(){
	return '';
}
add_filter('the_generator', 'crunchify_remove_version');

function crunchify_cleanup_query_string($src){ 
	$parts = explode('?ver=', $src); 
	return $parts[0]; 
} 
add_filter('script_loader_src', 'crunchify_cleanup_query_string', 15, 1); 
add_filter('style_loader_src', 'crunchify_cleanup_query_string', 15, 1);

// Remove Shortlink
remove_action('wp_head', 'wp_shortlink_wp_head');

// Remove HTML comments from source output
function callback($buffer) {
	$buffer = preg_replace('/<!--(.|s)*?-->/', '', $buffer);
	$buffer = preg_replace('/\/wp-content\/uploads\/fbrfg/', site_url(), $buffer);
	$buffer = preg_replace('/\/wp-content\/themes\/quicklyhire\/app/', '/app', $buffer);
	$buffer = preg_replace('/\/wp-content\/uploads/', '/static', $buffer);
	$buffer = preg_replace('/[\s+]\n/', '', $buffer);
	return $buffer;
}
function buffer_start() {
	ob_start("callback");
}
function buffer_end() {
	ob_end_flush();
}
add_action('get_header', 'buffer_start');
add_action('wp_footer', 'buffer_end');

}

?>