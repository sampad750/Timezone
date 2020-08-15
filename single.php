<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package timezone
 * @since 1.0.0
 */

// Theme settings options
$opt          = get_option('timezone_opt');
$blog_layout  = is_active_sidebar('sidebar_widgets') ? 'col-lg-8' : 'col-lg-10 offset-lg-1';
$is_blog_social_icon = isset($opt['is_blog_social_icon']) ? $opt['is_blog_social_icon'] : 1;
$f_f_link = !empty($opt['s_l_f']) ? $opt['s_l_f'] : '';
$f_t_link = !empty($opt['s_l_t']) ? $opt['s_l_t'] : '';
$f_l_link = !empty($opt['s_l_l']) ? $opt['s_l_l'] : '';
$f_p_link = !empty($opt['s_l_p']) ? $opt['s_l_p'] : '';
get_header();
?>

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($blog_layout); ?> posts-list">
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/contents/content', 'single');
                endwhile; // End of the loop.
                ?>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and
                            4
                            people like this</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <?php if ($is_blog_social_icon == '1') { ?>
                            <!-- social -->
                            <ul class="social-icons">
                                <?php if (!empty($f_f_link)) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($f_f_link) ?>"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                <?php } ?>
                                <?php if (!empty($f_t_link)) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($f_t_link) ?>"><i class="fab fa-twitter"></i></a>
                                    </li>
                                <?php } ?>
                                <?php if (!empty($f_l_link)) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($f_l_link) ?>"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                <?php } ?>
                                <?php if (!empty($f_p_link)) { ?>
                                    <li>
                                        <a href="<?php echo esc_url($f_p_link) ?>"><i class="fab fa-pinterest-p"></i></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>


                    <?php
                    if (get_previous_post() || get_next_post()) { ?>
                        <div class="navigation-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <?php
                                    $sampadinfo_prev_post_link = get_previous_post();
                                    if ($sampadinfo_prev_post_link) {
                                        $prevthumbnail = get_the_post_thumbnail($sampadinfo_prev_post_link->ID, array(
                                            60,
                                            60
                                        ), array('class' => 'img-fluid'));
                                    ?>
                                        <div class="thumb">
                                            <a href="<?php echo get_the_permalink($sampadinfo_prev_post_link); ?>">
                                                <?php echo $prevthumbnail; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="arrow">
                                        <a href="<?php echo get_the_permalink($sampadinfo_prev_post_link); ?>">
                                            <span class="ti-arrow-left text-white"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p><?php _e("Prev Post", "sampadinfo") ?></p>
                                        <a href="<?php echo get_the_permalink($sampadinfo_prev_post_link); ?>">
                                            <h4 title="<?php echo get_the_title($sampadinfo_prev_post_link); ?>"><?php echo wp_trim_words(get_the_title($sampadinfo_prev_post_link), 4); ?></h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <?php
                                    $sampadinfo_next_post_link = get_next_post();

                                    ?>
                                    <div class="detials">
                                        <p><?php _e("Next Post", "sampadinfo") ?></p>
                                        <a href="<?php echo get_the_permalink($sampadinfo_next_post_link); ?>">
                                            <h4 title="<?php echo get_the_title($sampadinfo_next_post_link); ?>"><?php echo wp_trim_words(get_the_title($sampadinfo_next_post_link), 4); ?></h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="<?php echo get_the_permalink($sampadinfo_next_post_link); ?>">
                                            <span class="ti-arrow-right text-white"></span>
                                        </a>
                                    </div>
                                    <?php
                                    if ($sampadinfo_next_post_link) {
                                        $nextthumbnail = get_the_post_thumbnail($sampadinfo_next_post_link->ID, array(
                                            60,
                                            60
                                        ), array('class' => 'img-fluid'));
                                    ?>
                                        <div class="thumb">
                                            <a href="<?php echo get_the_permalink($sampadinfo_next_post_link); ?>">
                                                <?php echo $nextthumbnail; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>

                <?php if (get_the_author_meta("description")) : ?>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <?php echo get_avatar(get_the_author_meta("ID")); ?>
                            <div class="media-body">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>">
                                    <h4><?php the_author(); ?></h4>
                                </a>
                                <p><?php the_author_meta("description"); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->

<?php get_footer(); ?>