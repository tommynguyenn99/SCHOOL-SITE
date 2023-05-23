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
        the_content();
    }
} else {
    // No posts found
    echo 'No posts found.';
}

wp_reset_postdata();
?>
