<?php
/**
 * Register Course Custom Post Type and Taxonomies
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function rainbow_edu_register_course_cpt() {
	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', 'rainbow-edu' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'rainbow-edu' ),
		'menu_name'             => __( 'Courses', 'rainbow-edu' ),
		'name_admin_bar'        => __( 'Course', 'rainbow-edu' ),
		'archives'              => __( 'Course Archives', 'rainbow-edu' ),
		'attributes'            => __( 'Course Attributes', 'rainbow-edu' ),
		'parent_item_colon'     => __( 'Parent Course:', 'rainbow-edu' ),
		'all_items'             => __( 'All Courses', 'rainbow-edu' ),
		'add_new_item'          => __( 'Add New Course', 'rainbow-edu' ),
		'add_new'               => __( 'Add New', 'rainbow-edu' ),
		'new_item'              => __( 'New Course', 'rainbow-edu' ),
		'edit_item'             => __( 'Edit Course', 'rainbow-edu' ),
		'update_item'           => __( 'Update Course', 'rainbow-edu' ),
		'view_item'             => __( 'View Course', 'rainbow-edu' ),
		'view_items'            => __( 'View Courses', 'rainbow-edu' ),
		'search_items'          => __( 'Search Course', 'rainbow-edu' ),
		'not_found'             => __( 'Not found', 'rainbow-edu' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'rainbow-edu' ),
	);
	$args = array(
		'label'                 => __( 'Course', 'rainbow-edu' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'course_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
        'show_in_rest'          => true, // Enable Gutenberg editor
	);
	register_post_type( 'course', $args );

    // Register Taxonomy
    $tax_labels = array(
        'name'              => _x( 'Course Categories', 'taxonomy general name', 'rainbow-edu' ),
        'singular_name'     => _x( 'Course Category', 'taxonomy singular name', 'rainbow-edu' ),
        'search_items'      => __( 'Search Categories', 'rainbow-edu' ),
        'all_items'         => __( 'All Categories', 'rainbow-edu' ),
        'parent_item'       => __( 'Parent Category', 'rainbow-edu' ),
        'parent_item_colon' => __( 'Parent Category:', 'rainbow-edu' ),
        'edit_item'         => __( 'Edit Category', 'rainbow-edu' ),
        'update_item'       => __( 'Update Category', 'rainbow-edu' ),
        'add_new_item'      => __( 'Add New Category', 'rainbow-edu' ),
        'new_item_name'     => __( 'New Category Name', 'rainbow-edu' ),
        'menu_name'         => __( 'Course Category', 'rainbow-edu' ),
    );

    $tax_args = array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'course-category' ),
        'show_in_rest'      => true,
    );
    register_taxonomy( 'course_category', array( 'course' ), $tax_args );
}
add_action( 'init', 'rainbow_edu_register_course_cpt', 0 );

/**
 * Add Meta Boxes for Course Details
 */
function rainbow_edu_add_course_meta_boxes() {
    add_meta_box(
        'course_details',
        __( 'Course Details', 'rainbow-edu' ),
        'rainbow_edu_course_meta_box_callback',
        'course',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'rainbow_edu_add_course_meta_boxes' );

function rainbow_edu_course_meta_box_callback( $post ) {
    wp_nonce_field( 'course_details_nonce', 'course_details_nonce_field' );

    $price = get_post_meta( $post->ID, '_course_price', true );
    $duration = get_post_meta( $post->ID, '_course_duration', true );
    $level = get_post_meta( $post->ID, '_course_level', true );

    echo '<p><label for="course_price">' . __( 'Price (e.g. $49.99 or Free)', 'rainbow-edu' ) . '</label><br/>';
    echo '<input type="text" id="course_price" name="course_price" value="' . esc_attr( $price ) . '" style="width:100%;" /></p>';

    echo '<p><label for="course_duration">' . __( 'Duration (e.g. 4 Weeks)', 'rainbow-edu' ) . '</label><br/>';
    echo '<input type="text" id="course_duration" name="course_duration" value="' . esc_attr( $duration ) . '" style="width:100%;" /></p>';

    echo '<p><label for="course_level">' . __( 'Skill Level (e.g. Beginner)', 'rainbow-edu' ) . '</label><br/>';
    echo '<input type="text" id="course_level" name="course_level" value="' . esc_attr( $level ) . '" style="width:100%;" /></p>';
}

function rainbow_edu_save_course_meta( $post_id ) {
    if ( ! isset( $_POST['course_details_nonce_field'] ) || ! wp_verify_nonce( $_POST['course_details_nonce_field'], 'course_details_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['course_price'] ) ) {
        update_post_meta( $post_id, '_course_price', sanitize_text_field( $_POST['course_price'] ) );
    }
    if ( isset( $_POST['course_duration'] ) ) {
        update_post_meta( $post_id, '_course_duration', sanitize_text_field( $_POST['course_duration'] ) );
    }
    if ( isset( $_POST['course_level'] ) ) {
        update_post_meta( $post_id, '_course_level', sanitize_text_field( $_POST['course_level'] ) );
    }
}
add_action( 'save_post', 'rainbow_edu_save_course_meta' );
