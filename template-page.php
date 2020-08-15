<?php
/*
 * Template Name: Default Page
 *
 * */
get_header('tzpage');
    while ( have_posts() ) : the_post();
    ?>
    <main>
        <?php
            the_content();
            wp_link_pages(array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'timezone' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'timezone' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ));
            ?>
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        ?>
    </main>
<?php
endwhile; // End of the loop.

get_footer();