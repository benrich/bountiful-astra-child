<?php

function astra_comment_form_default_fields_markup($fields)
{
	$commenter = wp_get_current_commenter();
	$req       = get_option('require_name_email');
	$aria_req  = ($req ? " aria-required='true'" : '');

	$fields['author'] = '<div class="ast-comment-formwrap ast-row"><p class="comment-form-author ast-grid-common-col ast-width-lg-50 ast-width-md-4 ast-float">' .
		'<label for="author" class="screen-reader-text">' . esc_html(astra_default_strings('string-comment-label-name', false)) . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
		'" placeholder="' . esc_attr(astra_default_strings('string-comment-label-name', false)) . '" size="30"' . $aria_req . ' /></p>';
	$fields['email']  = '<p class="comment-form-email ast-grid-common-col ast-width-lg-50 ast-width-md-4 ast-float">' .
		'<label for="email" class="screen-reader-text">' . esc_html(astra_default_strings('string-comment-label-email', false)) . '</label><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
		'" placeholder="' . esc_attr(astra_default_strings('string-comment-label-email', false)) . '" size="30"' . $aria_req . ' /></p>';

	return apply_filters('astra_comment_form_default_fields_markup', $fields);
}
