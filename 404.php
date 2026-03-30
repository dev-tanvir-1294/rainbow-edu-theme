<?php get_header(); ?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 min-h-[60vh] flex items-center justify-center">
    <div class="text-center max-w-lg">
        <div class="text-indigo-200 font-black text-9xl leading-none mb-6 select-none" aria-hidden="true">404</div>
        <div class="w-16 h-1 bg-indigo-600 rounded-full mx-auto mb-8"></div>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-4 tracking-tight">
            <?php esc_html_e( 'Page Not Found', 'rainbow-edu' ); ?>
        </h1>
        <p class="text-gray-500 mb-10 text-lg leading-relaxed">
            <?php esc_html_e( 'Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'rainbow-edu' ); ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-8 py-3.5 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <?php esc_html_e( 'Back to Home', 'rainbow-edu' ); ?>
            </a>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>" class="bg-white hover:bg-gray-50 text-indigo-600 font-bold px-8 py-3.5 rounded-xl border-2 border-indigo-200 hover:border-indigo-400 transition-all inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <?php esc_html_e( 'Browse Courses', 'rainbow-edu' ); ?>
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
