<?php
get_header();
?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="page-header mb-12 text-center">
            <h1 class="page-title text-4xl font-extrabold text-gray-900 tracking-tight"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 flex flex-col'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden relative group">
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500' ) ); ?>
                            <div class="absolute inset-0 bg-indigo-900 bg-opacity-0 group-hover:bg-opacity-10 transition-opacity duration-300"></div>
                        </a>
                    <?php endif; ?>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <header class="entry-header mb-4">
                            <?php the_title( '<h2 class="entry-title text-xl font-bold text-gray-900 mb-2 leading-tight hover:text-indigo-600 transition-colors"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            <div class="text-sm text-gray-500 font-medium">
                                <?php echo get_the_date(); ?>
                            </div>
                        </header>
                        <div class="entry-summary text-gray-600 mb-6 flex-grow line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="mt-auto">
                           <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-indigo-600 font-semibold hover:text-indigo-800 transition-colors">
                               Read More
                               <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                           </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div class="mt-12 flex justify-center">
            <?php the_posts_navigation(array(
                'prev_text' => '<span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg font-medium text-sm inline-flex items-center transition-colors shadow-sm">&larr; Older posts</span>',
                'next_text' => '<span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg font-medium text-sm inline-flex items-center transition-colors shadow-sm">Newer posts &rarr;</span>',
            )); ?>
        </div>
        
    <?php else : ?>
        <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">No posts found</h2>
            <p class="text-gray-500 max-w-md mx-auto"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rainbow-edu' ); ?></p>
        </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
