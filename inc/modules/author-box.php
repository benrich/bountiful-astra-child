<?php

class Bountiful_Author_Box
{
	public function __construct()
	{
	}

	// public function display_small_author_bio()
	// {
	// 	// only show on post post_types
	// 	if (!is_singular('post')) return;

	// 	echo 'by meeee!';
	// }

	public function display_large_author_bio()
	{
		// only show on post post_types
		if (!is_singular('post')) return;

		if (!function_exists('wpsabox_author_box')) return;

		echo wpsabox_author_box();
	}
}
