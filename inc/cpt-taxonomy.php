<?php
// Staff custom post type 
// Register Staff 
function  register_staff_cpt()
{

    $labels = array(
        'name'               => _x('Staff', 'post type general name'),
        'singular_name'      => _x('Staff', 'post type singular name'),
        'menu_name'          => _x('Staff', 'admin menu'),
        'name_admin_bar'     => _x('Staff', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'Staff'),
        'add_new_item'       => __('Add New Staff'),
        'new_item'           => __('New Staff'),
        'edit_item'          => __('Edit Staff'),
        'view_item'          => __('View Staff'),
        'all_items'          => __('All Staffs'),
        'search_items'       => __('Search Staffs'),
        'parent_item_colon'  => __('Parent Staffs:'),
        'not_found'          => __('No staffs found.'),
        'not_found_in_trash' => __('No staffs found in Trash.'),
        'archives'           => __('Staff Archives'),
        'insert_into_item'   => __('Insert into staff'),
        'uploaded_to_this_item' => __('Uploaded to this staff'),
        'filter_item_list'   => __('Filter staff list'),
        'items_list_navigation' => __('Staff list navigation'),
        'items_list'         => __('Staff list'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array('title'),
        'show_in_rest' => true,
        'has_archive' => true
    );
    register_post_type('school_staff_post', $args);

    // Register student 
    $labels = array(
        'name'               => _x('Student', 'post type general name'),
        'singular_name'      => _x('Student', 'post type singular name'),
        'menu_name'          => _x('Student', 'admin menu'),
        'name_admin_bar'     => _x('Student', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'Student'),
        'add_new_item'       => __('Add New Student'),
        'new_item'           => __('New Student'),
        'edit_item'          => __('Edit Student'),
        'view_item'          => __('View Student'),
        'all_items'          => __('All Students'),
        'search_items'       => __('Search Students'),
        'parent_item_colon'  => __('Parent Students:'),
        'not_found'          => __('No Students found.'),
        'not_found_in_trash' => __('No Students found in Trash.'),
        'archives'           => __('Student Archives'),
        'insert_into_item'   => __('Insert into Student'),
        'uploaded_to_this_item' => __('Uploaded to this Student'),
        'filter_item_list'   => __('Filter Student list'),
        'items_list_navigation' => __('Student list navigation'),
        'items_list'         => __('Student list'),
        'enter_title_here'   => __('Add student name')

    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-network',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
        'has_archive'        => true

    );
    register_post_type('student_data_post', $args);
}
add_action('init', 'register_staff_cpt');



// Register Taxonomy 
function fwd_register_taxonomies()
{
    // Staff Tax
    $labels = array(
        'name'              => _x('Faculty Categories', 'taxonomy general name'),
        'singular_name'     => _x('Faculty Category', 'taxonomy singular name'),
        'search_items'      => __('Search Faculty Categories'),
        'all_items'         => __('All Faculty Category'),
        'parent_item'       => __('Parent Faculty Category'),
        'parent_item_colon' => __('Parent Faculty Category:'),
        'edit_item'         => __('Edit Faculty Category'),
        'view_item'         => __('View Faculty Category'),
        'update_item'       => __('Update Faculty Category'),
        'add_new_item'      => __('Add New Faculty Category'),
        'new_item_name'     => __('New Faculty Category Name'),
        'menu_name'         => __('Faculty Category'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'faculty'),
    );
    register_taxonomy('staff_category', array('school_staff_post'), $args);


    // Student Tax 
    // Add taxonomy
    $labels = array(
        'name'              => _x('Student Categories', 'taxonomy general name'),
        'singular_name'     => _x('Student Category', 'taxonomy singular name'),
        'search_items'      => __('Search Student Categories'),
        'all_items'         => __('All Student Category'),
        'parent_item'       => __('Parent Student Category'),
        'parent_item_colon' => __('Parent Student Category:'),
        'edit_item'         => __('Edit Student Category'),
        'view_item'         => __('View Student Category'),
        'update_item'       => __('Update Student Category'),
        'add_new_item'      => __('Add New Student Category'),
        'new_item_name'     => __('New Student Category Name'),
        'menu_name'         => __('Student Category'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'student')
    );
    register_taxonomy('student_category', array('student_data_post'), $args);
?>
<?php

}

add_action('init', 'fwd_register_taxonomies');


// Flush 

function fwd_rewrite_flush()
{
    // fwd_register_custom_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'fwd_rewrite_flush');
