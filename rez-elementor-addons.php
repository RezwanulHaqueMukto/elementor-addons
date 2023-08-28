<?php

/**
 * Plugin Name: Elementor Addon By RWHM
 * Description: Simple Image Addon By RWHM.
 * Version:     1.0.0
 * Author:      Rezwanul Haque Mukto
 * Author URI:  https://developers.elementor.com/
 * Text Domain:rwhm_elementor-addon
 */


// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}


// #######
//##### elementor file and class add#####
// #######

if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Plugin')) {

	function register_rwhm_image_viewer_widget($widgets_manager)
	{
		require_once(__DIR__ . '/widgets/rwhm_image_viewer_widget.php');
		require_once(__DIR__ . '/widgets/rwhm_team_viewer_widget.php');
		require_once(__DIR__ . '/widgets/another_rwhm_team_viewer_widget.php');
		require_once(__DIR__ . '/widgets/rwhm_carousel_viewer_slider_widget.php');
		require_once(__DIR__ . '/widgets/rwhm_accordion_viewer.php');

		require_once(__DIR__ . '/register/register.php');
	}
	add_action('elementor/widgets/register', 'register_rwhm_image_viewer_widget');
} else {

	function check_elementor_activation()
	{
		if (is_plugin_active('elementor/elementor.php')) {

			echo '<div class="notice notice-error"><p>Elementor is not active.</p></div>';
		}
	}
	add_action('admin_notices', 'check_elementor_activation');
}
// #######
//##### loading class for elementor addon#####
// #######

function my_plugin_enqueue_styles()
{
	// Enqueue the Slick Carousel CSS
	wp_enqueue_style('rwhm_slick-carousel-css', plugins_url('/inc/css/rwhm_slick-carousel-css.css', __FILE__), array(), '1.0.0');
	wp_enqueue_style('rwhm_accordion-css', plugins_url('/inc/css/rwhm-accordion.css', __FILE__), array(), '1.0.0');

	// Enqueue the Slick Carousel JS
	wp_enqueue_script('custom-script-accordion ', plugins_url('/inc/js/rez-accordion.js', __FILE__), array('jquery'), '1.0', true);
	wp_enqueue_script('custom-script', plugins_url('/inc/js/rwhm_slick-carousel.js', __FILE__), array('jquery'), '1.0', true);
	wp_enqueue_style('my-plugin-styles', plugins_url('/inc/css/my-plugin-styles.css', __FILE__), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'my_plugin_enqueue_styles');
