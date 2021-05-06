<?php

define('CHILD_THEME_VERSION', '1.0.0');

require_once('inc/index.php');

add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

// Enqueue styles & scripts
function child_enqueue_styles()
{
	wp_enqueue_style('bountiful-theme', get_stylesheet_directory_uri() . '/style.css', ['astra-theme-css']);
	wp_enqueue_style('bountiful-theme-css', get_stylesheet_directory_uri() . '/assets/compiled/style.css', ['bountiful-theme'], CHILD_THEME_VERSION);

	// wp_enqueue_script('child-retro', get_stylesheet_directory_uri() . '/assets/compiled/index.js', ['jquery'], '0.0.3', true);
}
