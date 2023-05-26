<?php

/**
 * The template for displaying schedule
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
    echo "<h1>Course Schedule</h1>";
    the_field('table_information');
    ?>
    <table>
        <caption><?php the_field('schedule_heading'); ?></caption>
        <!-- Table Head -->
        <thead>
            <tr>
                <th><?php the_field('table_head_date'); ?></th>
                <th><?php the_field('table_course_head'); ?></th>
                <th><?php the_field('table_instructor_head'); ?></th>
            </tr>
        </thead>

        <!-- Date  -->
        <tbody>
            <?php
            if (have_rows('table_data')) {
                while (have_rows('table_data')) {
                    the_row();
            ?>
                    <tr>
                        <td><?php the_sub_field('course_date'); ?></td>
                        <td><?php the_sub_field('course_name_program'); ?></td>
                        <td><?php the_sub_field('instructor_name_program'); ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <a href="#" class="topbutton"></a>
</main><!-- #primary -->

<?php
get_footer();
