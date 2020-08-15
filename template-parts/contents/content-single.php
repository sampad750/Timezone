<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sampadinfo
 * @since 1.0.0
 */

?>

<div class="single-post">
    <div class="feature-img">
	    <?php the_post_thumbnail('timezone_730x365', array('class' => 'img-fluid')) ?>
    </div>
    <div class="blog_details">
        <h2><?php the_title(); ?></h2>
        <ul class="blog-info-link mt-3 mb-4">
	        <?php if ( has_tag() ): ?>
                <li><i class="ti-user"></i>
			        <?php the_tags( '', ', ', '' ); ?>
                </li>
	        <?php endif; ?>
            <li><a href="<?php comments_link(); ?>"><i class="ti-comments"></i> <?php comments_number( 'No Comment', '1 Comment', '% Comments' ); ?></a></li>
        </ul>
        <?php the_content(); ?>
    </div>
</div>





