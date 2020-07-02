<?php
function my_login_logo_one() { 
	?> 
	<style type="text/css"> 
		body.login div#login h1 a {
			background-image: url(<?= get_template_directory_uri();?>/images/logo.png);
			background-size: 100%;
			width: 100%;
			height: 120px;
			padding-bottom: 30px; 
		} 
	</style>
	<?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
// remove toolbar item
function remove_toolbar_node($wp_admin_bar) {
	
	$wp_admin_bar->remove_node('wp-logo');
	
}
add_action('admin_bar_menu', 'remove_toolbar_node', 999);
// change footer text 
function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed by <a href="https://3conn.net" target="_blank">3conn</a></span>';
}
 
add_filter('admin_footer_text', 'remove_footer_admin');
// Remove Admin dashboard widgets
function isa_disable_dashboard_widgets() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');// Remove "At a Glance"
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');// Remove "Activity" which includes "Recent Comments"
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');// Remove Quick Draft
    remove_meta_box('dashboard_primary', 'dashboard', 'core');// Remove WordPress Events and News
}
add_action('admin_menu', 'isa_disable_dashboard_widgets');
remove_action('welcome_panel', 'wp_welcome_panel');