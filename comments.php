<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package timezone
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

$is_comments = have_comments() ? 'have_comments' : 'no_comments';
?>
<?php if (have_comments()) : ?>
	<div class="comments-area">
		<h4><?php comments_number(' ', '1 Comment', '% Comments'); ?></h4>
		<div class="comment-box">
			<?php
			the_comments_navigation();
			wp_list_comments(
				array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 70,
					'type'        => 'all',
					'callback'    => 'timezone_comments',
				),
				get_comments(array(
					'post_id' => get_the_ID(),
				))
			);
			the_comments_navigation();
			?>
		</div>
		<?php
		if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'timezone'); ?></p>
		<?php
		endif;
		?>


	</div>
<?php endif; ?>
<div class="comment-form">
	<h4><?php esc_html_e('Leave a Reply', 'timezone'); ?></h4>
	<?php
	$commenter     = wp_get_current_commenter();
	$req           = get_option('require_name_email');
	$aria_req      = ($req ? " aria-required='true'" : '');
	$fields        = array(
		'author' => '<div class="row-form row"> <div class="col-form col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="author" id="name" value="' . esc_attr($commenter['comment_author']) . '" placeholder="' . esc_attr__('Name *', 'timezone') . '" ' . $aria_req . '>
                        </div>
                    </div>',
		'email'  => '<div class="col-form col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="' . esc_attr__('Email *', 'timezone') . '" ' . $aria_req . '>
                        </div>
                    </div>',
		'url'    => '<div class="col-form col-md-12">
                        <div class="form-group">
                            <input type="url" class="form-control" name="url" id="url" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="' . esc_attr__('Websites *', 'timezone') . '" ' . $aria_req . '>
                        </div>
                    </div> </div>',
	);
	$comments_args = array(
		'fields'               => $fields,
		'class_form'           => 'form-contact comment_form form_edit',
		'id_form'              => 'commentForm',
		'class_submit'         => 'button btn-sm button-contactForm btn_1 boxed-btn',
		'id_submit'            => 'submit-btn',
		'title_reply'          => '',
		'comment_notes_before' => '',
		'label_submit' => esc_html__('Send Message', 'timezone'),
		'comment_field'        => '<textarea name="message" class="form-control w-100 pad-20" id="message" rows="8" placeholder="' . esc_attr__('Write Comment', 'timezone') . '"></textarea>',
		'comment_notes_after'  => '',
	);
	comment_form($comments_args);

	?>
</div>