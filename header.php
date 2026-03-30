<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <style>body { font-family: 'Inter', sans-serif; } .line-clamp-2{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;} .line-clamp-3{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;}</style>
</head>

<body <?php body_class('bg-gray-50 text-gray-800 antialiased'); ?>>
<?php wp_body_open(); ?>

<!-- Accessibility: Skip to Main Content -->
<a href="#primary" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-indigo-600 text-white px-4 py-2 rounded-lg z-[100] font-semibold">
    <?php esc_html_e( 'Skip to content', 'rainbow-edu' ); ?>
</a>

<div id="page" class="min-h-screen flex flex-col">

    <!-- Sticky Header -->
    <header id="masthead" class="bg-white shadow-sm sticky top-0 z-50" role="banner">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center space-x-2 shrink-0">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center" aria-hidden="true">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-xl font-bold text-gray-900 hover:text-indigo-600 transition-colors" rel="home" aria-label="<?php bloginfo('name'); ?> - Home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <nav id="site-navigation" class="hidden md:flex items-center space-x-8" role="navigation" aria-label="<?php esc_attr_e('Primary navigation', 'rainbow-edu'); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'fallback_cb'    => 'wp_page_menu',
                        'container'      => false,
                        'items_wrap'     => '<ul id="%1$s" class="flex items-center space-x-8">%3$s</ul>',
                    ) );
                    ?>
                    <a href="<?php echo esc_url( get_post_type_archive_link('course') ); ?>" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition-colors text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                        Browse Courses
                    </a>
                </nav>

                <!-- Mobile Hamburger Button -->
                <button id="mobile-menu-btn" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="<?php esc_attr_e('Toggle navigation menu', 'rainbow-edu'); ?>" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition-colors">
                    <!-- Hamburger Icon -->
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!-- Close Icon -->
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100" role="navigation" aria-label="<?php esc_attr_e('Mobile navigation', 'rainbow-edu'); ?>">
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-2">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'fallback_cb'    => 'wp_page_menu',
                    'container'      => false,
                    'menu_class'     => 'space-y-1',
                    'items_wrap'     => '<ul class="space-y-1">%3$s</ul>',
                ) );
                ?>
                <a href="<?php echo esc_url( get_post_type_archive_link('course') ); ?>" class="block w-full bg-indigo-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition-colors text-sm text-center mt-4 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    Browse Courses
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Wrapper -->
    <div id="content" class="flex-grow">

<script>
// Mobile nav toggle
(function() {
    var btn = document.getElementById('mobile-menu-btn');
    var menu = document.getElementById('mobile-menu');
    var iconOpen = document.getElementById('icon-open');
    var iconClose = document.getElementById('icon-close');
    if (btn && menu) {
        btn.addEventListener('click', function() {
            var isOpen = !menu.classList.contains('hidden');
            menu.classList.toggle('hidden', isOpen);
            iconOpen.classList.toggle('hidden', !isOpen);
            iconClose.classList.toggle('hidden', isOpen);
            btn.setAttribute('aria-expanded', String(!isOpen));
        });
    }
})();
</script>
