<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package timezone
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog_item'); ?> >
	<?php if (has_post_thumbnail()){ ?>
		<div class="blog_item_img">
			<?php the_post_thumbnail('timezone_730x365', array('class' => 'card-img rounded-0')) ?>
			<a href="<?php the_permalink() ?>" class="blog_item_date">
				<h3><?php the_time('j') ?></h3>
				<p><?php the_time('M') ?></p>
			</a>
		</div>
	<?php } ?>
	<div class="blog_details">
		<a class="d-inline-block" href="<?php the_permalink(); ?>">
			<h2><?php the_title(); ?></h2>
		</a>
		<p><?php echo wp_trim_words( get_the_content(), 27, '' ); ?></p>
		<ul class="blog-info-link">
			<?php if ( has_tag() ): ?>
				<li><i class="fa fa-user"></i>
					<?php the_tags( '', ', ', '' ); ?>
				</li>
			<?php endif; ?>
			<li><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number( 'No Comment', '1 Comment', '% Comments' ); ?></a></li>
		</ul>
	</div>

</article>