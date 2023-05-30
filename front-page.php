<?php

/**
 * The template for displaying the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();
    ?>

        <h1><?php the_title(); ?></h1>

        <section class="home-intro">
            <?php
            // Load intro section from seperate page using WP_Query 
            // Page ID is the id of the about page where we added text 

            // If front page is not displaying, make sure this is the correct id 
            $args = array('page_id' => 11);


            $intro_query = new WP_Query($args);


            if ($intro_query->have_posts()) {
                while ($intro_query->have_posts()) {
                    $intro_query->the_post();

                    the_content();
                }
                wp_reset_postdata();
            }
            ?>
        </section>

        <section class="home-work">
            <h2>Recent News</h2>
            <?php
            $args = array(
                // grab me a max of 4 post, in the work category, only if they are marked with featured front page
                'post_type'      => 'fwd-work',
                'posts_per_page' => 4,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'fwd-featured',
                        'field'    => 'slug',
                        'terms'    => 'front-page'
                    ),
                ),
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
            ?>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
            <?php
                }
                wp_reset_postdata();
            }
            ?>
        </section>
        <!-- Do we need this code?  -->

        <section class="home-work"></section>

        <section class="home-left">
            <?php
            if (function_exists('get_field')) {
                if (get_field('left_section_heading_')) {
                    echo '<h2>';
                    the_field('left_section_heading_');
                    echo '</h2>';
                }

                if (get_field('left_section_content')) {
                    echo '<p>';
                    the_field('left_section_content');
                    echo '</p>';
                }
            }

            ?>
        </section>

        <section class="home-right">
            <?php
            if (function_exists('get_field')) {
                if (get_field('right_section_heading_')) {
                    echo '<h2>';
                    the_field('right_section_heading_');
                    echo '</h2>';
                }

                if (get_field('right_section_content')) {
                    echo '<p>';
                    the_field('right_section_content');
                    echo '</p>';
                }
            }

            ?>
        </section>

        <section class="home-slider">
            <?php
            $args = array(
                'post_type'      => 'fwd-testimonial',
                'posts_per_page' => -1
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) : ?>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="swiper-slide">
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php
                wp_reset_postdata();
            endif;
            ?>
        </section>
        <!-- Do we need this code?  -->

        <section class="home-blog">
            <?php
            $args = array(
                // get post type
                'post_type'      => 'post',
                // grab two posts per page 
                'posts_per_page' => 3

            );
            $blog_query = new WP_Query($args);

            // if blog query have post 
            if ($blog_query->have_posts()) {
                // if did, run function 
                while ($blog_query->have_posts()) {
                    // have the post below singlular or else will loop 
                    $blog_query->the_post();
            ?>
                    <article>
                        <a href="<?php the_permalink(); ?>">
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                                <div class="post-details">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </div>
                        </a>
                    </article>
            <?php
                }

                wp_reset_postdata();
            }

            ?>
        </section>



    <?php
    endwhile; // End of the loop.
    ?>

    <a href="#" class="topbutton"></a>

    <a class="all-news" href="https://tommynguyen.ca/school/news/">See All News</a>
</main><!-- #primary -->

<?php
get_footer();
