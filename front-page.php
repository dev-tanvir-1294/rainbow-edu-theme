<?php
/**
 * The template for displaying the front page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- 1. Hero Section -->
    <section class="relative bg-indigo-900 overflow-hidden py-24 md:py-32 flex items-center min-h-[70vh]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.png" alt="" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900 via-indigo-900/80 to-transparent"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight mb-6">
                    Unlock Your Potential with <span class="text-indigo-400">Rainbow Edu</span>
                </h1>
                <p class="text-xl text-indigo-100 mb-10 leading-relaxed max-w-xl">
                    Master new skills with our expert-led courses. From technology to business, we provide the tools you need to succeed in the modern world.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-4 px-8 rounded-xl transition-all shadow-lg hover:shadow-indigo-500/25 flex items-center gap-2">
                        Browse Courses
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="#features" class="bg-white/10 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-xl backdrop-blur-sm transition-all border border-white/20">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Stat Highlights -->
    <section class="py-12 bg-white relative z-20 -mt-10 mx-4 max-w-7xl lg:mx-auto rounded-3xl shadow-xl border border-gray-100">
        <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-around items-center gap-8 md:gap-4">
            <div class="text-center">
                <div class="text-4xl font-black text-indigo-600 mb-1">10k+</div>
                <div class="text-gray-500 font-semibold uppercase tracking-widest text-xs">Active Students</div>
            </div>
            <div class="hidden md:block w-px h-12 bg-gray-100"></div>
            <div class="text-center">
                <div class="text-4xl font-black text-indigo-600 mb-1">150+</div>
                <div class="text-gray-500 font-semibold uppercase tracking-widest text-xs">Expert Courses</div>
            </div>
            <div class="hidden md:block w-px h-12 bg-gray-100"></div>
            <div class="text-center">
                <div class="text-4xl font-black text-indigo-600 mb-1">98%</div>
                <div class="text-gray-500 font-semibold uppercase tracking-widest text-xs">Satisfaction Rate</div>
            </div>
        </div>
    </section>

    <!-- 3. Recent Courses Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Latest Courses</h2>
                    <p class="text-gray-600 mt-2">Start learning something new today</p>
                </div>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>" class="text-indigo-600 font-bold hover:text-indigo-800 transition-colors flex items-center gap-1 group">
                    View All <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <?php
            $args = array(
                'post_type' => 'course',
                'posts_per_page' => 3,
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <?php get_template_part( 'template-parts/course-card' ); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <p class="text-center text-gray-500 py-12">More courses coming soon. Check back later!</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- 4. Why Choose Us Section -->
    <section id="features" class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-4">Why Learn with Rainbow Edu?</h2>
                <p class="text-gray-600 text-lg">We provide a premium learning experience designed to help you succeed in your career goals.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Lifetime Access</h3>
                    <p class="text-gray-500 leading-relaxed">Once you enroll, you have access to the course material forever. Learn at your own pace, anytime.</p>
                </div>
                <!-- Feature 2 -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Instructors</h3>
                    <p class="text-gray-500 leading-relaxed">Learn from industry professionals who bring real-world experience and insights into every lesson.</p>
                </div>
                <!-- Feature 3 -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Certificates</h3>
                    <p class="text-gray-500 leading-relaxed">Earn a industry-recognized certificate upon completion to showcase your skills and boost your resume.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Final CTA Section -->
    <section class="py-20 bg-indigo-600">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Ready to take the next step in your career?</h2>
            <p class="text-indigo-100 text-lg mb-10">Join thousands of students and start learning today with the best instructors in the world.</p>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>" class="inline-block bg-white text-indigo-600 font-black py-4 px-10 rounded-xl hover:bg-indigo-50 transition-colors shadow-xl">
                Get Started Now
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
