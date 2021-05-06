<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if (astra_page_layout() == 'left-sidebar') : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class('full-width-title'); ?>>

	<?php astra_primary_content_top(); ?>

	<?php astra_content_page_loop(); ?>

	<?php $orig_query = $wp_query; ?>
	<?php query_posts('posts_per_page=' . get_option('posts_per_page')); ?>

	<div class="post-list">
		<?php if (have_posts()) :
			global $wp_query;
		?>
			<div class="list-intro">
				<?php echo $wp_query->post_count; ?> Tutorials
			</div>

			<?php while (have_posts()) :
				the_post();
				$cats = get_the_category($id);
			?>
				<article <?php post_class(); ?>>
					<?php if ($cats) : ?>
						<div class="categories">
							<?php foreach ($cats as $cat) : ?>
								<!-- <a href="<?php echo get_category_link($cat->cat_ID); ?>"> -->
								<?php echo $cat->name; ?>
								<!-- </a> -->
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>

					<?php astra_the_excerpt(); ?>

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
				</article>
		<?php
			endwhile;
		else :
			do_action('astra_template_parts_content_none');
		endif;
		?>
	</div>

	<?php $wp_query = $orig_query; ?>

	<?php astra_primary_content_bottom(); ?>

</div> <!-- #primary -->

<?php if (astra_page_layout() == 'right-sidebar') : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
