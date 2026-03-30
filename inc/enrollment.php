<?php
/**
 * Register Enrollment Custom Post Type and Logic
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ---------------------------------------------------------
// 1. Register Enrollment CPT (Private, Backend Only)
// ---------------------------------------------------------
function rainbow_edu_register_enrollment_cpt() {
    register_post_type( 'enrollment', array(
        'label'           => __( 'Enrollments', 'rainbow-edu' ),
        'labels'          => array(
            'name'          => _x( 'Enrollments', 'Post Type General Name', 'rainbow-edu' ),
            'singular_name' => _x( 'Enrollment', 'Post Type Singular Name', 'rainbow-edu' ),
            'menu_name'     => __( 'Enrollments', 'rainbow-edu' ),
        ),
        'supports'        => array( 'title' ),
        'public'          => false,
        'show_ui'         => true,
        'show_in_menu'    => 'edit.php?post_type=course',
        'capability_type' => 'post',
        'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
        'map_meta_cap'    => true,
    ) );
}
add_action( 'init', 'rainbow_edu_register_enrollment_cpt', 0 );

// ---------------------------------------------------------
// 2. Process Enrollment Form (with security hardening)
// ---------------------------------------------------------
function rainbow_edu_process_enrollment() {
    if ( ! isset( $_POST['rainbow_enroll_action'] ) || $_POST['rainbow_enroll_action'] !== 'enroll_student' ) {
        return;
    }

    // 2a. Nonce Verification
    if ( ! isset( $_POST['rainbow_enroll_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rainbow_enroll_nonce'] ) ), 'enroll_course' ) ) {
        wp_die( esc_html__( 'Security check failed. Please go back and try again.', 'rainbow-edu' ), 403 );
    }

    $course_id     = isset( $_POST['course_id'] ) ? absint( $_POST['course_id'] ) : 0;
    $student_name  = isset( $_POST['student_name'] ) ? sanitize_text_field( wp_unslash( $_POST['student_name'] ) ) : '';
    $student_email = isset( $_POST['student_email'] ) ? sanitize_email( wp_unslash( $_POST['student_email'] ) ) : '';
    $student_phone = isset( $_POST['student_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['student_phone'] ) ) : '';
    $redirect_url  = get_permalink( $course_id );

    // 2b. Validate required fields
    if ( ! $course_id || empty( $student_name ) || ! is_email( $student_email ) ) {
        wp_safe_redirect( add_query_arg( 'enroll', 'error', $redirect_url ) );
        exit;
    }

    // 2c. Verify the post is actually a course
    if ( get_post_type( $course_id ) !== 'course' ) {
        wp_safe_redirect( add_query_arg( 'enroll', 'error', $redirect_url ) );
        exit;
    }

    // 2d. Duplicate Check: Prevent same email from enrolling in the same course twice
    $existing = get_posts( array(
        'post_type'   => 'enrollment',
        'post_status' => 'publish',
        'numberposts' => 1,
        'meta_query'  => array(
            'relation' => 'AND',
            array( 'key' => '_course_id', 'value' => $course_id, 'compare' => '=' ),
            array( 'key' => '_student_email', 'value' => $student_email, 'compare' => '=' ),
        ),
    ) );

    if ( ! empty( $existing ) ) {
        wp_safe_redirect( add_query_arg( 'enroll', 'duplicate', $redirect_url ) );
        exit;
    }

    // 2e. Create Enrollment Post
    $course_title  = get_the_title( $course_id );
    $enrollment_id = wp_insert_post( array(
        'post_title'  => sprintf( 'Enrollment: %s — %s', $student_name, $course_title ),
        'post_type'   => 'enrollment',
        'post_status' => 'publish',
    ) );

    if ( is_wp_error( $enrollment_id ) ) {
        wp_safe_redirect( add_query_arg( 'enroll', 'error', $redirect_url ) );
        exit;
    }

    // 2f. Save Metadata
    update_post_meta( $enrollment_id, '_course_id',        $course_id );
    update_post_meta( $enrollment_id, '_student_name',     $student_name );
    update_post_meta( $enrollment_id, '_student_email',    $student_email );
    update_post_meta( $enrollment_id, '_student_phone',    $student_phone );
    update_post_meta( $enrollment_id, '_enrollment_date',  current_time( 'mysql' ) );

    // 2g. Send admin notification email
    rainbow_edu_send_enrollment_email( $enrollment_id, $course_id, $student_name, $student_email, $student_phone );

    wp_safe_redirect( add_query_arg( 'enroll', 'success', $redirect_url ) );
    exit;
}
add_action( 'template_redirect', 'rainbow_edu_process_enrollment' );

// ---------------------------------------------------------
// 3. Admin Email Notification on Enrollment
// ---------------------------------------------------------
function rainbow_edu_send_enrollment_email( $enrollment_id, $course_id, $student_name, $student_email, $student_phone ) {
    $admin_email  = get_option( 'admin_email' );
    $site_name    = get_bloginfo( 'name' );
    $course_title = get_the_title( $course_id );
    $course_url   = get_permalink( $course_id );

    // Email to admin
    $admin_subject = sprintf( '[%s] New Enrollment: %s', $site_name, $course_title );
    $admin_message = sprintf(
        "A new student has enrolled in a course on %s.\n\n" .
        "Course: %s\n" .
        "URL: %s\n\n" .
        "Student Details:\n" .
        "  Name:  %s\n" .
        "  Email: %s\n" .
        "  Phone: %s\n\n" .
        "View Enrollment: %s\n",
        $site_name,
        $course_title,
        $course_url,
        $student_name,
        $student_email,
        $student_phone ?: 'N/A',
        admin_url( 'post.php?post=' . $enrollment_id . '&action=edit' )
    );
    wp_mail( $admin_email, $admin_subject, $admin_message );

    // Confirmation email to student
    $student_subject = sprintf( '[%s] Your Enrollment Confirmation — %s', $site_name, $course_title );
    $student_message = sprintf(
        "Hi %s,\n\n" .
        "Thank you for enrolling in \"%s\" on %s!\n\n" .
        "We are thrilled to have you on board. Our team will be in touch shortly with further details.\n\n" .
        "Course Link: %s\n\n" .
        "Best regards,\n" .
        "The %s Team",
        $student_name,
        $course_title,
        $site_name,
        $course_url,
        $site_name
    );
    wp_mail( $student_email, $student_subject, $student_message );
}

// ---------------------------------------------------------
// 4. Custom Admin Columns for Enrollment List View
// ---------------------------------------------------------
add_filter( 'manage_enrollment_posts_columns', function( $columns ) {
    unset( $columns['date'] );
    return array_merge( $columns, array(
        'student_name'    => __( 'Student Name', 'rainbow-edu' ),
        'student_email'   => __( 'Email', 'rainbow-edu' ),
        'student_phone'   => __( 'Phone', 'rainbow-edu' ),
        'course_enrolled' => __( 'Course', 'rainbow-edu' ),
        'enroll_date'     => __( 'Date', 'rainbow-edu' ),
    ) );
} );

add_action( 'manage_enrollment_posts_custom_column', function( $column, $post_id ) {
    switch ( $column ) {
        case 'student_name':
            echo esc_html( get_post_meta( $post_id, '_student_name', true ) );
            break;
        case 'student_email':
            $email = get_post_meta( $post_id, '_student_email', true );
            echo '<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>';
            break;
        case 'student_phone':
            echo esc_html( get_post_meta( $post_id, '_student_phone', true ) ?: 'N/A' );
            break;
        case 'course_enrolled':
            $course_id = get_post_meta( $post_id, '_course_id', true );
            echo $course_id ? '<a href="' . esc_url( get_edit_post_link( $course_id ) ) . '">' . esc_html( get_the_title( $course_id ) ) . '</a>' : 'N/A';
            break;
        case 'enroll_date':
            echo esc_html( get_post_meta( $post_id, '_enrollment_date', true ) ?: get_the_date() );
            break;
    }
}, 10, 2 );
