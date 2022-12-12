<?php
/**
 * WordPress Basics
 */

 // HTML <head> <title> tag support 
add_theme_support('title-tag');

// Post thumbnail support
add_theme_support('post-thumbnails');

/**
 * Nav Menus
 */

add_theme_support('menus');
register_nav_menus(
	array(
		'header-navigation' => __('Header navigation', 'theme'),
		'footer-navigation' => __('Footer navigation', 'theme'),
	)
);

/**
 * Enqueue Styles & Scripts
 */

$quicklyhire_theme = wp_get_theme();

function qh_load_stylesheets(){
	global $quicklyhire_theme;
	/*!* ********** BOOTSTRAP 5.2.3 ********** *!*/
	wp_register_style('bootstrap', get_template_directory_uri() . '/app/bootstrap@5.2.3/css/bootstrap.min.css', array(), esc_html('5.2.0-beta1'), 'all');
	wp_enqueue_style('bootstrap');

	/*!* ********** APPLICATION STYLING ********** *!*/
	wp_register_style('app', get_template_directory_uri() . '/app/app.min.css', array(), esc_html($ggwp_theme->get('Version')), 'all');
	wp_enqueue_style('app');
}
add_action('wp_enqueue_scripts', 'qh_load_stylesheets');

function qh_load_scripts(){
	/*!* ********** BOOTSTRAP 5.2.3 ********** *!*/
	wp_register_script('bootstrap', get_template_directory_uri() . '/app/bootstrap@5.2.3/js/bootstrap.bundle.min.js', '', esc_html('5.2.3'), true);
	wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'qh_load_scripts');