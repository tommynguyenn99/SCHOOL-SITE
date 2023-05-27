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
 * @package FWD_Starter_Theme
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

    <!-- Dev -->
    <section class="students">
        <?php
        $admin_args = array(
            'post_type' => 'student_data_post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'student_category',
                    'field'    => 'slug',
                    'terms'    => 'developer',
                ),
            ),
            'orderby'   => 'title',
            'order'     => 'ASC',
        );
        ?>
        <?php
        $admin_query = new WP_Query($admin_args);

        if ($admin_query->have_posts()) {
            while ($admin_query->have_posts()) {
                $admin_query->the_post();
        ?>

                <article class="single-student">
                    <?php
                    // display content and other info
                    the_title('<h2>', '</h2>');
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium');
                    }
                    echo '<p>' . wp_trim_words(get_the_excerpt(), 25) . '</p>';

                    // Get Taxonomy
                    $terms = get_the_terms(get_the_ID(), 'student_category');
                    if ($terms && !is_wp_error($terms)) {
                        echo '<p><strong>Specialty:</strong> ';
                        $term_names = array();
                        foreach ($terms as $term) {
                            $term_names[] = '<a href="' . get_term_link($term->term_id) . '">' . $term->name . '</a>';
                        }
                        echo implode(', ', $term_names);
                        echo '</p>';
                    }


                    // Display the button
                    $button_url = get_permalink();
                    $button_label = 'Read More About This Student...';
                    ?>
                    <a class="student-btn" href="<?php echo $button_url; ?>" class="button"><?php echo $button_label; ?></a>
                </article>

        <?php
            }
        } else {
            // No posts found
            echo 'No Designers Found.';
        }

        wp_reset_postdata();

        ?>

        <!-- Designer -->
        <?php
        $admin_args = array(
            'post_type' => 'student_data_post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'student_category',
                    'order'    => 'ASC',
                    'orderby'  => 'title',
                    'field'    => 'slug',
                    'terms'    => 'designer',
                ),
            ),
            'orderby'   => 'title',
            'order'     => 'ASC',
        );
        ?>
        <?php
        $admin_query = new WP_Query($admin_args);
        if ($admin_query->have_posts()) {
            while ($admin_query->have_posts()) {
                $admin_query->the_post();
        ?>
                <article class="single-student">
                    <?php
                    // Display the post content or any other desired information
                    the_title('<h2>', '</h2>');
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium');
                    }
                    echo '<p>' . wp_trim_words(get_the_excerpt(), 25) . '</p>';

                    // Get Taxonomy
                    $terms = get_the_terms(get_the_ID(), 'student_category');
                    if ($terms && !is_wp_error($terms)) {
                        echo '<p><strong>Specialty:</strong> ';
                        $term_names = array();
                        foreach ($terms as $term) {
                            $term_names[] = '<a href="' . get_term_link($term->term_id) . '">' . $term->name . '</a>';
                        }
                        echo implode(', ', $term_names);
                        echo '</p>';
                    }


                    // Display the button
                    $button_url = get_permalink();
                    $button_label = 'Read More About This Student...';
                    ?>
                    <a href="<?php echo $button_url; ?>" class="button"><?php echo $button_label; ?></a>
                </article>
        <?php
            }
        } else {
            // No posts found
            echo 'No Designers Found.';
        }

        wp_reset_postdata();

        ?>
    </section>
    <a href="#" class="topbutton"></a>
</main><!-- #primary -->

<?php
get_footer();
