<?php

// Theme settings options
$opt = get_option('timezone_opt');
$is_preloader = !empty($opt['is_preloader']) ? $opt['is_preloader'] : '';
$is_pre_img = isset($opt['pre_logo']['url']) ? $opt['pre_logo']['url'] : '';
$main_logo = isset($opt['main_logo']['url']) ? $opt['main_logo']['url'] : '';
$is_search = isset($opt['is_search']) ? $opt['is_search'] : '';

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package timezone
 */
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if ($is_preloader == '1') { ?>
		<!--? Preloader Start -->
		<div id="preloader-active">
			<div class="preloader d-flex align-items-center justify-content-center">
				<div class="preloader-inner position-relative">
					<div class="preloader-circle"></div>
					<div class="preloader-img pere-text">
						<img src="<?php echo esc_url($is_pre_img); ?>" alt="<?php echo bloginfo('name'); ?>">
					</div>
				</div>
			</div>
		</div>
		<!-- Preloader Start -->
	<?php } ?>
	<header>
		<!-- Header Start -->
		<div class="header-area">
			<div class="main-header header-sticky">
				<div class="container-fluid">
					<div class="menu-wrapper">
						<!-- Logo -->
						<div class="logo">
							<a href="<?php echo esc_url(home_url('/')) ?>">
								<?php
								if (!empty($main_logo)) {
									echo '<img src="' . esc_url($main_logo) . '" alt="' . get_bloginfo('name') . '">';
								} else {
									echo '<h3>' . get_bloginfo('name') . '</h3>';
								}
								?>
							</a>
						</div>
						<!-- Main-menu -->
						<div class="main-menu d-none d-lg-block">
							<?php
							if (has_nav_menu('main_menu')) {
								wp_nav_menu(array(
									'menu'           => 'main_menu',
									'theme_location' => 'main_menu',
									'container'      => 'nav',
									'menu_id'        => 'navigation',
									'walker'         => new Timezone_Nav_Navwalker(),
									'depth'          => 2
								));
							}
							?>
						</div>
						<!-- Header Right -->
						<div class="header-right">
							<ul>
								<?php if ($is_search == '1') { ?>
									<li>
										<div class="nav-search search-switch">
											<span class="flaticon-search"></span>
										</div>
									</li>
								<?php } ?>
								<?php if (class_exists('WooCommerce')) { ?>
									<li><a href="<?php echo esc_url(home_url('/')) ?>my-account/"><span class="flaticon-user"></span></a></li>
									<li><a href="<?php echo esc_url(home_url('/')) ?>cart/"><span class="flaticon-shopping-cart"></span></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php
					if (has_nav_menu('main_menu')) : ?>
						<!-- Mobile Menu -->
						<div class="col-12">
							<div class="mobile_menu d-block d-lg-none"></div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- Header End -->
	</header>
	<!--? Hero Area Start-->
	<div class="slider-area ">
		<div class="single-slider slider-height2 d-flex align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="hero-cap text-center">
							<h2><?php timezone_banner_title(); ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--? Hero Area End-->