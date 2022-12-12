<?php
/**
 * Plugin Name:  GG - AutoLoad
 * Description:  Basic safety measures for the WordPress environment.
 * Version:      1.0
 * Author:       Gyozo Galcsik
 */

if(is_blog_installed()){

// DISABLE UPDATING AND DOWNLOADING OF DEFAULT WORDPRESS THEMES
function gg_disable_wp_default_themes(){
	remove_action('load-update-core.php', 'wp_update_themes');
	add_filter('pre_site_transient_update_themes', '__return_null');
}
add_action('wp_loaded', 'gg_disable_wp_default_themes');

// DISABLE THEME FILE EDITING
define('DISALLOW_FILE_EDIT', true);

// DISABLE REMOVE THEME EDITOR FROM TOOLS MENU
function gg_remove_theme_editor_submenu(){
	remove_submenu_page('tools.php', 'theme-editor.php');
}
add_action('admin_menu', 'gg_remove_theme_editor_submenu');

// REMOVE CUSTOMIZE LINK FROM THE ADMIN MENU BAR
function gg_remove_customize_admin_menu($wp_admin_bar){
	$wp_admin_bar->remove_menu('customize');
}
add_action('admin_bar_menu', 'gg_remove_customize_admin_menu', 999);

// DISABLE CUSTOM CSS
function gg_disable_custom_css($wp_customize){
	$wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'gg_disable_custom_css', 15);

// REMOVE ADMIN PERMISSIONS TO CHANGE THEMES
function gg_remove_admin_theme_permissions(){
	$admin = get_role('administrator');
	
	$caps = array(
		'install_themes',
		'update_themes',
		'delete_themes',
		'edit_themes',
		'switch_themes',
		//'edit_theme_options',
	);
	
	foreach($caps as $cap){
		$admin->remove_cap($cap);
	}
}
add_action('init', 'gg_remove_admin_theme_permissions');

// DISABLE SITE HEALTH WIDGET ON DASHBOARD
add_action('wp_dashboard_setup', function(){
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
});

// REMOVE SITE HEALTH SUBMENU FROM TOOLS
add_action( 'admin_menu', 'remove_site_health_submenu', 999 );
function remove_site_health_submenu() {
        $page = remove_submenu_page( 'tools.php', 'site-health.php' );
}

// REMOVE TOOLS MENU ALLTOGETHER
add_action('admin_menu', function(){
	remove_menu_page('tools.php');
});

}

?>