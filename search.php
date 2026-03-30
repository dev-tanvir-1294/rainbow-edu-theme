<?php get_header(); ?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <header class="page-header mb-10">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            <?php
            /* translators: %s = the search query */
            printf( esc_html__( 'Search Results for: %s', 'rainbow-edu' ), '<span class="text-indigo-600">' . get_search_query() . '</span>' );
            ?>
        </h1>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col group'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden h-48">
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500' ) ); ?>
                        </a>
                    <?php endif; ?>

                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-xs font-bold text-indigo-500 uppercase tracking-widest mb-2"><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></span>
                        <?php the_title( '<h2 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-indigo-600 transition-colors"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                        <div class="text-gray-500 text-sm mb-4 flex-grow line-clamp-3"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="text-indigo-600 font-semibold text-sm hover:text-indigo-800 transition-colors inline-flex items-center gap-1 mt-auto">
                            Read More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php the_posts_pagination(array(
                'prev_text' => '<span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">&larr; Previous</span>',
                'next_text' => '<span class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">Next &rarr;</span>',
            )); ?>
        </div>

    <?php else : ?>
        <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <h2 class="text-2xl font-bold text-gray-900 mb-2"><?php esc_html_e( 'No Results Found', 'rainbow-edu' ); ?></h2>
            <p class="text-gray-500 max-w-md mx-auto mb-8"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rainbow-edu' ); ?></p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
