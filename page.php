<?php get_header(); ?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-3xl mx-auto">
        <?php
        while ( have_posts() ) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden'); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="overflow-hidden max-h-80">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'w-full object-cover', 'alt' => get_the_title() ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="p-8 md:p-12">
                    <header class="entry-header mb-8 border-b border-gray-100 pb-8">
                        <?php the_title( '<h1 class="entry-title text-4xl font-extrabold text-gray-900 tracking-tight leading-tight mb-3">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content prose prose-indigo max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-a:text-indigo-600 prose-img:rounded-xl leading-relaxed">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    wp_link_pages( array(
                        'before'    => '<div class="page-links mt-8 pt-8 border-t border-gray-100 font-semibold text-gray-700">' . __( 'Pages:', 'rainbow-edu' ),
                        'after'     => '</div>',
                        'link_before' => '<span class="px-3 py-1 border rounded-lg text-indigo-600 border-indigo-200 text-sm mr-2 hover:bg-indigo-50 transition-colors">',
                        'link_after'  => '</span>',
                    ) );
                    ?>
                </div>
            </article>

            <?php comments_template(); ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
