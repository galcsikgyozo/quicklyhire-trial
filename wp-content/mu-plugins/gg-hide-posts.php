<?php
/**
 * Plugin Name:  GG - Hide Posts
 * Description:  Hides the basic functionality of creating blog posts.
 * Version:      1.0
 * Author:       Gyozo Galcsik
 */


if(is_blog_installed()){

// Remove posts link from admin dashboard sidebar menu
add_action('admin_menu', function(){
	remove_menu_page('edit.php');
});

// Remove new contents link from admin bar
add_action('admin_bar_menu', function($wp_admin_bar){
	$wp_admin_bar->remove_menu('new-content');
}, 999);

}

?>