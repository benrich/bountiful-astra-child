<?php

require_once('modules/author-box.php');

class Bountiful_Blog
{
	function __construct()
	{
		// add author bio box below content
		$author_box = new Bountiful_Author_Box();
		add_action('astra_template_parts_content', [$author_box, 'display_large_author_bio'], 14);

		// add category & meta around the title
		add_action('astra_single_header_top', [$this, 'before_title']);
		add_action('astra_single_header_bottom', [$this, 'after_title'], 14);

		// add before comment section
		add_action('astra_comments_before', [$this, 'before_comments']);

		// remove Website in comment field
		add_filter('astra_comment_form_default_fields_markup', [$this, 'unset_url_field']);
	}

	public function before_title()
	{
		$cats = get_the_category(get_the_ID());
		if ($cats) {
			echo '<div class="categories">';
			foreach ($cats as $cat) {
				echo $cat->name;
			}
			echo '</div>';
		}
	}

	public function after_title()
	{
		if (!is_singular('post')) return;
?>
		<div class="post-meta">
			<div class="post-date">
				<?php the_date(); ?>
			</div>
			<div class="post-author">
				By <?php the_author(); ?>
			</div>
			<div class="post-tags">
				<?php the_tags('', ''); ?>
			</div>
		</div>
<?php
	}

	public function before_comments()
	{
		echo '<h3 style="text-align:center;">Comments</h3>';
	}

	public function unset_url_field($fields)
	{
		if (isset($fields['url'])) unset($fields['url']);
		return $fields;
	}
}
