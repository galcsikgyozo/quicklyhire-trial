<?php
/**
 * WordPress Basics
 */

 // HTML <head> <title> tag support 
add_theme_support('title-tag');

// Post thumbnail support
add_theme_support('post-thumbnails');

// Editor styles support
add_theme_support('editor-styles');
add_editor_style();

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
	/*!* -- BOOTSTRAP 5.2.3 -- *!*/
	// wp_register_style('bootstrap', get_template_directory_uri() . '/app/bootstrap@5.2.3/css/bootstrap.min.css', array(), esc_html('5.2.0-beta1'), 'all');
	wp_register_style('bootstrap-grid', '/app/bootstrap@5.2.3/css/bootstrap-grid.min.css', array(), esc_html('5.2.0-beta1'), 'all');
	// wp_register_style('bootstrap', '/app/bootstrap@5.2.3/css/bootstrap.min.css', array(), esc_html('5.2.0-beta1'), 'all');
	wp_enqueue_style('bootstrap-grid');

	/*!* -- WEB APP STYLING -- *!*/
	// wp_register_style('app', get_template_directory_uri() . '/app/app.css', array(), esc_html($quicklyhire_theme->get('Version')), 'all');
	wp_register_style('app', '/app/app.min.css', array(), esc_html($quicklyhire_theme->get('Version')), 'all');
	wp_enqueue_style('app');
}
add_action('wp_enqueue_scripts', 'qh_load_stylesheets');

// function qh_load_scripts(){
// 	/*!* -- BOOTSTRAP 5.2.3 -- *!*/
// 	// wp_register_script('bootstrap', get_template_directory_uri() . '/app/bootstrap@5.2.3/js/bootstrap.bundle.min.js', '', esc_html('5.2.3'), true);
// 	wp_register_script('bootstrap', '/app/bootstrap@5.2.3/js/bootstrap.bundle.min.js', '', esc_html('5.2.3'), true);
// 	wp_enqueue_script('bootstrap');
// }
// add_action('wp_enqueue_scripts', 'qh_load_scripts');

/**
 * Theme Customizers API
 */

class theme_customizer {
	public function __construct(){
		add_action('customize_register', array($this, 'register_customize_section'));
	}
	
	public function register_customize_section($wp_customize){
		// Initialize datas
		$this->header_section($wp_customize);
		$this->footer_section($wp_customize);
	}
	 
	// Footer section settings
	private function header_section($wp_customize){
		 
		// New header section
		$wp_customize->add_section('header-section', array(
			'title' => 'Header',
			'description' => __('Here you can modify the settings regarding the header.'),
			// "priority" => 20, // before menus
		));
		
		// Add header logo
		$wp_customize->add_setting('header-logo-setting', array(
			'default' => ''
		));

		$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'header-logo-control', array(
			'label'      => __( 'Header logo', 'theme_name' ),
			'section'    => 'header-section',
			'settings'   => 'header-logo-setting'
		)));
		
		// Add button label
		$wp_customize->add_setting('button-label-setting', array(
			'default' => ''
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'button-label-control', array(
			'label' => 'Button label',
			'section' => 'header-section',
			'settings' => 'button-label-setting',
			'type' => '<input>'
		)));
		
		// Add button URL
		$wp_customize->add_setting('button-url-setting', array(
			'default' => ''
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'button-url-control', array(
			'label' => 'Button URL',
			'section' => 'header-section',
			'settings' => 'button-url-setting',
			'type' => '<input>'
		)));
	}
	 
	// Footer section settings
	private function footer_section($wp_customize){

		// New footer section
		$wp_customize->add_section('footer-section', array(
			'title' => 'Footer',
			'description' => __('Here you can modify the settings regarding the footer.'),
		));
		
		// Add footer logo
		$wp_customize->add_setting('footer-logo-setting', array(
			'default' => ''
		));

		$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'footer-logo-control', array(
			'label'      => __( 'Footer logo', 'theme_name' ),
			'section'    => 'footer-section',
			'settings'   => 'footer-logo-setting'
		)));
		
		// Add copyright input
		$wp_customize->add_setting('copyright-setting', array(
			'default' => ''
		));
		
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'copyright-control', array(
			'label' => 'Copyright label',
			'section' => 'footer-section',
			'settings' => 'copyright-setting',
			'type' => '<input>'
		)));
	}
}
new theme_customizer();

/**
 * Advanced Custom Fields
 */

// Hide custom fields from admin menu
add_action('admin_menu', function(){
	remove_menu_page('edit.php?post_type=acf-field-group');
});

// Include field group files (all .php files in the 'acf' folder)
foreach(glob(get_template_directory() . "/acf/*.php") as $filename){
	include $filename;
}