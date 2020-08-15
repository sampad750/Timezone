<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package timezone
 */
$opt = get_option('timezone_opt');
$copyright_text = !empty($opt['copyright_txt']) ? $opt['copyright_txt'] : esc_html__('Copyright © 2020 Sampadinfo. All rights reserved.', 'timezone');
$f_f_link = !empty($opt['s_l_f']) ? $opt['s_l_f'] : '';
$f_t_link = !empty($opt['s_l_t']) ? $opt['s_l_t'] : '';
$f_l_link = !empty($opt['s_l_l']) ? $opt['s_l_l'] : '';
$f_p_link = !empty($opt['s_l_p']) ? $opt['s_l_p'] : '';
$is_footer_social = isset($opt['is_footer_social']) ? $opt['is_footer_social'] : 1;
?>

<footer>
	<!-- Footer Start-->
	<div class="footer-area footer-padding">
		<div class="container">
			<?php if (is_active_sidebar('footer_widgets')) { ?>
				<div class="row d-flex justify-content-between">
					<?php dynamic_sidebar('footer_widgets') ?>
				</div>
			<?php } ?>
			<!-- Footer bottom -->
			<div class="row align-items-center">
				<div class="col-xl-7 col-lg-8 col-md-7">
					<div class="footer-copy-right">
						<?php echo wp_kses_post(wpautop($copyright_text)); ?>
					</div>
				</div>
				<?php if ($is_footer_social == '1') { ?>
					<div class="col-xl-5 col-lg-4 col-md-5">
						<div class="footer-copy-right f-right">
							<!-- social -->
							<div class="footer-social">
								<?php if (!empty($f_f_link)) { ?>
									<a href="<?php echo esc_url($f_f_link) ?>"><i class="fab fa-facebook-f"></i></a>
								<?php } ?>
								<?php if (!empty($f_t_link)) { ?>
									<a href="<?php echo esc_url($f_t_link) ?>"><i class="fab fa-twitter"></i></a>
								<?php } ?>
								<?php if (!empty($f_l_link)) { ?>
									<a href="<?php echo esc_url($f_l_link) ?>"><i class="fab fa-linkedin"></i></a>
								<?php } ?>
								<?php if (!empty($f_p_link)) { ?>
									<a href="<?php echo esc_url($f_p_link) ?>"><i class="fab fa-pinterest-p"></i></a>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- Footer End-->
</footer>
<!--? Search model Begin -->
<div class="search-model-box">
	<div class="h-100 d-flex align-items-center justify-content-center">
		<div class="search-close-btn">+</div>
		<form class="search-model-form">
			<input type="search" placeholder="Searching key....." name="s" id="search-input">
		</form>
	</div>
</div>
<!-- Search model end -->

<?php wp_footer(); ?>

</body>

</html>