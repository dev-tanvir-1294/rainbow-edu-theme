<?php
/**
 * Template Part: Course Card
 * Usage: get_template_part( 'template-parts/course-card' );
 * Requires the global $post object to be set.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$price    = get_post_meta( get_the_ID(), '_course_price', true );
$duration = get_post_meta( get_the_ID(), '_course_duration', true );
$level    = get_post_meta( get_the_ID(), '_course_level', true );
?>

<div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col group">
    <!-- Thumbnail -->
    <div class="relative overflow-hidden h-56 bg-gray-100">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700', 'alt' => get_the_title() ) ); ?>
        <?php else: ?>
            <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gradient-to-br from-indigo-50 to-gray-100">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        <?php endif; ?>

        <?php if ( $level ) : ?>
            <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-indigo-600 tracking-wide uppercase shadow-sm">
                <?php echo esc_html( $level ); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Card Body -->
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex justify-between items-start mb-4 gap-4">
            <h2 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-indigo-600 transition-colors line-clamp-2">
                <a href="<?php the_permalink(); ?>" class="focus:outline-none focus:underline">
                    <?php the_title(); ?>
                </a>
            </h2>
            <?php if ( $price ) : ?>
                <span class="bg-green-50 text-green-700 font-bold px-3 py-1 rounded-lg text-sm border border-green-200 whitespace-nowrap shrink-0">
                    <?php echo esc_html( $price ); ?>
                </span>
            <?php else : ?>
                <span class="bg-green-50 text-green-700 font-bold px-3 py-1 rounded-lg text-sm border border-green-200 whitespace-nowrap shrink-0">Free</span>
            <?php endif; ?>
        </div>

        <div class="text-gray-500 mb-6 flex-grow line-clamp-3 text-sm leading-relaxed">
            <?php the_excerpt(); ?>
        </div>

        <div class="mt-auto pt-5 border-t border-gray-100 flex items-center justify-between">
            <div class="flex items-center text-gray-500 text-sm font-medium gap-1">
                <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span><?php echo $duration ? esc_html( $duration ) : 'Self-paced'; ?></span>
            </div>
            <a href="<?php the_permalink(); ?>" class="text-indigo-600 font-semibold hover:text-indigo-800 transition-colors text-sm group-hover:translate-x-1 duration-200 inline-flex items-center gap-1" aria-label="View course: <?php the_title_attribute(); ?>">
                View Course
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</div>
