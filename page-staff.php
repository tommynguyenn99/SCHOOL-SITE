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




    <!-- Faculty -->
    <h2>Faculty</h2>
    <?php
    $faculty_args = array(
        'post_type' => 'school_staff_post',
        'tax_query' => array(
            array(
                'taxonomy' => 'staff_category',
                'field'    => 'slug',
                'terms'    => 'faculty',
            ),
        ),
    );

    $faculty_query = new WP_Query($faculty_args);

    if ($faculty_query->have_posts()) :
        while ($faculty_query->have_posts()) : $faculty_query->the_post();
            $name = get_the_title();
            $bio = get_field('staff_bio');
            $courses = get_field('staff_course');
            $website = get_field('staff_link');
    ?>

            <div class="faculty-member">
                <h3><?php echo $name; ?></h3>
                <p><?php echo $bio; ?></p>

                <?php if ($website) : ?>
                    <p><strong>Website:</strong> <a href="<?php echo $website; ?>"><?php echo $website; ?></a></p>
                <?php endif; ?>
            </div>

    <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No faculty members found.</p>';
    endif;
    ?>


    <!-- Admin Staff    -->
    <h2>Administrative Staff</h2>
    <?php
    $admin_args = array(
        'post_type' => 'school_staff_post',
        'tax_query' => array(
            array(
                'taxonomy' => 'staff_category',
                'field'    => 'slug',
                'terms'    => 'administrative',
            ),
        ),
    );

    $admin_query = new WP_Query($admin_args);

    if ($admin_query->have_posts()) :
        while ($admin_query->have_posts()) : $admin_query->the_post();
            $name = get_the_title();
            $bio = get_field('staff_bio');
    ?>

            <div class="admin-member">
                <h3><?php echo $name; ?></h3>
                <p><?php echo $bio; ?></p>
            </div>

    <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No administrative staff found.</p>';
    endif;

    ?>




    <a href="#" class="topbutton"></a>
</main><!-- #primary -->

<?php
get_footer();
