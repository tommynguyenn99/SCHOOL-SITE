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


        <section class="home-left">
            <?php
            if (function_exists('get_field')) {
                if (get_field('left_section_heading')) {
                    echo '<h2>';
                    the_field('left_section_heading');
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
                if (get_field('right_section_heading')) {
                    echo '<h2>';
                    the_field('right_section_heading');
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






    <?php
    endwhile; // End of the loop.
    ?>

    <a href="#" class="topbutton"></a>

</main><!-- #primary -->

<?php
get_footer();
