<?php
/**
 * Template Name: Course Archive
 */
get_header();
?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <header class="page-header mb-12 flex flex-col md:flex-row md:items-center justify-between">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight"><?php post_type_archive_title(); ?></h1>
            <p class="mt-3 text-lg text-gray-600 max-w-2xl">Explore our wide range of educational courses designed to help you master new skills and advance your career.</p>
        </div>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/course-card' ); ?>
            <?php endwhile; ?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php the_posts_pagination(array(
                'prev_text' => '<span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg font-medium text-sm inline-flex items-center transition-colors shadow-sm">&larr; Previous</span>',
                'next_text' => '<span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg font-medium text-sm inline-flex items-center transition-colors shadow-sm">Next &rarr;</span>',
            )); ?>
        </div>

    <?php else : ?>
        <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center">
            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
               <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
               </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">No courses available</h2>
            <p class="text-gray-500 max-w-md mx-auto"><?php esc_html_e( 'Check back later for new and exciting courses. We are currently preparing fresh content.', 'rainbow-edu' ); ?></p>
        </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
