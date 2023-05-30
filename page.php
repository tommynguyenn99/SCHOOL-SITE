<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fwd-school-theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

    <!-- Add the recent posts code here -->
    <div class="recent-posts">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
        );

        $recent_posts = new WP_Query($argsx);

        if ($recent_posts->have_posts()) {
            while ($recent_posts->have_posts()) {
                $recent_posts->the_post();
        ?>
                <div class="recent-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <a class="thumbnail-link" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                </div>
        <?php
            }
            wp_reset_postdata();
        }
        ?>
    </div><!-- .recent-posts -->

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
