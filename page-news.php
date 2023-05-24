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

<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3, // Specify the number of posts you want to display
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        // Display the post content or any other desired information
        the_title('<h2>', '</h2>');
        the_post_thumbnail('large');
        the_excerpt();
        
    }
} else {
    // No posts found
    echo 'No posts found.';
}

wp_reset_postdata();
?>

<?php
get_footer();
