<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <style>
        html { margin-top: 0 !important; }
        body { font-family: 'Inter', sans-serif; margin: 0; padding: 0; } 
        .hero-card { border-top-left-radius: 0 !important; border-top-right-radius: 0 !important; }
        .line-clamp-2{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;} 
        .line-clamp-3{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;}
    </style>
</head>

<body <?php body_class('bg-gray-50 text-gray-800 antialiased'); ?>>
<?php wp_body_open(); ?>

<!-- Global Loading Spinner -->
<div id="loading-overlay" class="fixed inset-0 z-[10000] bg-indigo-900 flex flex-col items-center justify-center transition-opacity duration-500">
    <div class="relative w-20 h-20">
        <!-- Spinner Ring -->
        <div class="absolute inset-0 border-4 border-indigo-400/20 rounded-full"></div>
        <div class="absolute inset-0 border-4 border-t-white rounded-full animate-spin"></div>
        <!-- Center Dot -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-2 h-2 bg-white rounded-full animate-pulse shadow-[0_0_15px_rgba(255,255,255,1)]"></div>
        </div>
    </div>
    <div class="mt-6">
        <span class="text-white text-sm font-bold tracking-[0.2em] uppercase opacity-70 animate-pulse">Loading</span>
    </div>
</div>

<script>
// Logic to hide the spinner when the page finishes loading
window.addEventListener('load', function() {
    var loader = document.getElementById('loading-overlay');
    if (loader) {
        loader.style.opacity = '0';
        setTimeout(function() {
            loader.style.display = 'none';
        }, 500);
    }
});

// Optional: Show the spinner again when navigating away to other internal pages
document.addEventListener('click', function(e) {
    var link = e.target.closest('a');
    if (!link) return;
    
    var url = link.getAttribute('href');
    if (!url || url.startsWith('#') || url.startsWith('javascript:') || link.getAttribute('target') === '_blank') return;
    
    // Ensure it's an internal link
    if (url.indexOf(window.location.host) !== -1 || url.startsWith('/')) {
        // Exclude specific file types (downloads)
        if (url.match(/\.(zip|pdf|docx|xls|png|jpg|jpeg|mp3|mp4)$/i)) return;
        
        var loader = document.getElementById('loading-overlay');
        if (loader) {
            loader.style.display = 'flex';
            setTimeout(function() {
                loader.style.opacity = '1';
            }, 10);
        }
    }
});
</script>

<!-- Accessibility: Skip to Main Content -->
<a href="#primary" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-indigo-600 text-white px-4 py-2 rounded-lg z-[100] font-semibold">
    <?php esc_html_e( 'Skip to content', 'rainbow-edu' ); ?>
</a>

<div id="page" class="min-h-screen flex flex-col">

    <!-- Floating Premium Header (Pill Shape) -->
    <header id="masthead" class="fixed top-6 md:top-8 left-1/2 -translate-x-1/2 w-[calc(100%-2.5rem)] max-w-6xl z-[9999] transition-all duration-500 pointer-events-none font-['Roboto_Condensed']" role="banner">
        <div class="bg-[#F9F7F2] rounded-full shadow-[0_15px_40px_rgba(52,18,83,0.08)] border border-white/60 flex justify-between items-center px-4 md:px-8 h-16 md:h-18 pointer-events-auto">
            
            <!-- Logo area -->
            <div class="flex items-center space-x-3 shrink-0 pl-2">
                <div class="w-8 md:w-9 h-8 md:h-9 bg-[#341253] rounded-full flex items-center justify-center shadow-md shadow-indigo-900/10" aria-hidden="true">
                    <svg class="w-4 md:w-5 h-4 md:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-lg md:text-xl font-black text-[#341253] tracking-tight hover:opacity-80 transition-opacity uppercase" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation -->
            <nav id="site-navigation" class="hidden lg:flex items-center space-x-1" role="navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'items_wrap'     => '<ul id="%1$s" class="flex items-center space-x-1 text-[13px] font-bold uppercase tracking-[0.05em] text-[#341253]">%3$s</ul>',
                ) );
                ?>
                
                <div class="pl-4">
                    <a href="<?php echo esc_url( get_post_type_archive_link('course') ); ?>" class="group flex items-center gap-4 bg-[#9333ea] text-white pl-6 pr-1.5 py-1.5 rounded-full font-bold hover:bg-[#7e22ce] transition-all text-[11px] tracking-widest uppercase shadow-lg shadow-purple-600/20">
                        Get Started
                        <span class="bg-white text-[#9333ea] p-1.5 rounded-full transition-transform group-hover:scale-110">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </a>
                </div>
            </nav>

            <!-- Mobile Actions -->
            <div class="flex lg:hidden items-center gap-2 pr-2">
                <a href="<?php echo esc_url( get_post_type_archive_link('course') ); ?>" class="bg-[#9333ea] text-white p-2.5 rounded-full shadow-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <button id="mobile-menu-btn" type="button" aria-expanded="false" aria-controls="mobile-menu" class="p-2 rounded-full text-[#341253] hover:bg-[#EBE8DF] transition-colors">
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Pill-style Content) -->
        <div id="mobile-menu" class="hidden lg:hidden mt-3 px-2">
            <div class="bg-[#F9F7F2] rounded-[40px] shadow-2xl p-8 border border-white/60">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '<ul class="space-y-6 text-sm font-bold uppercase tracking-widest text-[#341253]">%3$s</ul>',
                ) );
                ?>
                <hr class="my-8 border-[#341253]/10">
                <a href="<?php echo esc_url( get_post_type_archive_link('course') ); ?>" class="block w-full bg-[#9333ea] text-white py-5 rounded-full font-black text-center text-xs tracking-[0.2em] uppercase shadow-xl shadow-purple-600/20">
                    Browse All Courses
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
