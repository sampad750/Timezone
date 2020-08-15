<?php
get_header();
$blog_layout = is_active_sidebar( 'sidebar_widgets' ) ? 'col-lg-8 mb-5 mb-lg-0' : 'col-lg-10 offset-lg-1 mb-5 mb-lg-0';
?>
<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $blog_layout ); ?>">
                <div class="blog_left_sidebar">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/contents/content', get_post_format() );
					endwhile;
					?>
                    <nav class="blog-pagination justify-content-center d-flex">
						<?php
						if ( function_exists( 'timezone_pagination' ) ) {
							timezone_pagination();
						}
						?>
                    </nav>
                </div>
            </div>
			<?php get_sidebar(); ?>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<?php get_footer(); ?>

