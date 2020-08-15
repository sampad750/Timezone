<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sampadinfo
 * @since 1.0
 * @version 1.0
 */

if (!is_active_sidebar('sidebar_widgets') || is_shop()) {
	return;
}
?>
<div class="col-lg-4">
	<div class="blog_right_sidebar">
		<?php dynamic_sidebar('sidebar_widgets'); ?>
	</div>
</div>