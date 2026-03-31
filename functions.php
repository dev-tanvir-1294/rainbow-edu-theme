<?php
/**
 * Rainbow Edu functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ---------------------------------------------------------
// Theme Setup
// ---------------------------------------------------------
function rainbow_edu_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'rainbow-edu' ),
        'footer'  => esc_html__( 'Footer Menu', 'rainbow-edu' ),
    ) );
}
add_action( 'after_setup_theme', 'rainbow_edu_setup' );

// ---------------------------------------------------------
// Content Width
// ---------------------------------------------------------
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

// ---------------------------------------------------------
// Enqueue Scripts & Styles
// ---------------------------------------------------------
function rainbow_edu_scripts() {
    // Fonts: Inter (body) and Roboto Condensed (headings)
    wp_enqueue_style( 'rainbow-edu-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap', array(), null );
    
    // Tailwind Output
    wp_enqueue_style( 'rainbow-edu-tailwind', get_template_directory_uri() . '/output.css', array(), wp_get_theme()->get( 'Version' ) );

    // GSAP for Animations
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true );
    wp_enqueue_script( 'rainbow-edu-hero-animations', get_template_directory_uri() . '/assets/js/hero-animations.js', array('gsap', 'gsap-scrolltrigger'), '1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'rainbow_edu_scripts' );

// ---------------------------------------------------------
// SEO: Open Graph & Twitter Meta Tags
// ---------------------------------------------------------
function rainbow_edu_seo_meta_tags() {
    global $post;
    if ( is_singular() && isset( $post ) ) {
        $description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_trim_words( $post->post_content, 30 );
        $image       = has_post_thumbnail( $post->ID ) ? get_the_post_thumbnail_url( $post->ID, 'large' ) : get_template_directory_uri() . '/screenshot.png';
        $title       = get_the_title( $post->ID ) . ' | ' . get_bloginfo( 'name' );
        $url         = get_permalink( $post->ID );
    } else {
        $description = get_bloginfo( 'description' );
        $image       = get_template_directory_uri() . '/screenshot.png';
        $title       = get_bloginfo( 'name' );
        $url         = home_url( '/' );
    }
    ?>
    <!-- SEO Open Graph -->
    <meta property="og:locale" content="<?php echo esc_attr( get_locale() ); ?>">
    <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $url ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
    <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
    <?php
}
add_action( 'wp_head', 'rainbow_edu_seo_meta_tags' );

// ---------------------------------------------------------
// Custom Nav Walker: Add Tailwind classes to nav <li> and <a>
// ---------------------------------------------------------
function rainbow_edu_nav_link_attrs( $atts, $item, $args ) {
    if ( $args->theme_location === 'primary' ) {
        $atts['class'] = 'px-4 py-2 rounded-full text-[#341253] font-bold tracking-[0.05em] hover:bg-[#EBE8DF] transition-all duration-300 pointer-events-auto leading-none';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rainbow_edu_nav_link_attrs', 10, 3 );

// ---------------------------------------------------------
// Require Core Theme Modules
// ---------------------------------------------------------
require get_template_directory() . '/inc/course-cpt.php';
require get_template_directory() . '/inc/enrollment.php';
