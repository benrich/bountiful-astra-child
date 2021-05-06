<?php

if (!defined('ABSPATH')) exit;

require_once('astra-override.php');
require_once('blog.php');

add_action('init', function () {
	new Bountiful();
	new Bountiful_Blog();
});

class Bountiful
{
	function __construct()
	{
		add_action('wp_head', [$this, 'wp_head']);

		// remove 'read more' from excerpt
		add_filter('excerpt_more', '__return_empty_string');

		// remove post navigation
		remove_action('astra_entry_after', 'astra_single_post_navigation_markup');

		// override date/time display to show 'time ago'
		add_filter('get_the_date', [$this, 'convert_to_time_ago'], 10, 1);
		add_filter('the_date', [$this, 'convert_to_time_ago'], 10, 1);
		add_filter('get_the_time', [$this, 'convert_to_time_ago'], 10, 1);
		add_filter('the_time', [$this, 'convert_to_time_ago'], 10, 1);
	}

	public function convert_to_time_ago($orig_time)
	{
		global $post;
		$orig_time = strtotime($post->post_date);
		return human_time_diff($orig_time, current_time('timestamp')) . ' ' . __('ago');
	}

	public function wp_head()
	{
?>
		<link rel="dns-prefetch" href="//fonts.googleapis.com" />
		<link rel="stylesheet" id='astra-google-fonts-css' href="//fonts.googleapis.com/css?family=Pacifico%3A400%2C&#038;display=fallback&#038;ver=3.3.2" media="all" />
<?php
	}
}
