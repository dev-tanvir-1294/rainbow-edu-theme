<?php
/**
 * The template for displaying the front page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <style>
        #primary.site-main {
            padding: 0 !important;
            margin: 0 !important;
            max-width: none !important;
        }

        .hero-card {
            border-top-left-radius: 0 !important;
            border-top-right-radius: 0 !important;
            margin-top: -32px !important;
        }

        @media (min-width: 768px) {
            .hero-card {
                margin-top: -46px !important;
            }
        }
    </style>

    <!-- 1. Hero Section (Bradford-inspired Card Layout) -->
    <section id="hero" class="relative z-0 pt-0 px-0 pb-0">
        <div
            class="hero-card relative w-full mx-auto h-[100svh] min-h-[600px] rounded-b-[40px] md:rounded-b-[30px] overflow-hidden bg-indigo-950 shadow-2xl flex items-end pb-20 md:pb-32">

            <!-- Video Background (Pexels) -->
            <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
                <video class="hero-video w-full h-full object-cover opacity-60 scale-105" autoplay muted loop
                    playsinline poster="<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.png">
                    <source src="https://www.pexels.com/download/video/7661446/" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="absolute inset-0 bg-gradient-to-t from-indigo-950 via-indigo-950/40 to-transparent"></div>
            </div>

            <!-- Content Area (Split-Side Layout inspired by Bradford) -->
            <div class="relative container mx-auto z-10 w-full px-8 md:px-20 pb-16 md:pb-24">
                <div
                    class="max-w-[1600px] mx-auto flex flex-col md:flex-row items-end justify-between gap-12 md:gap-24">

                    <!-- Left Column: Massive Heading (60%) -->
                    <div class="w-full md:w-[60%]">
                        <h1
                            class="text-6xl md:text-[120px] font-black text-white leading-[0.85] tracking-tight uppercase font-['Roboto_Condensed']">
                            <div class="overflow-hidden mb-2">
                                <span class="reveal-line block">SHAPING OUR</span>
                            </div>
                            <div class="overflow-hidden">
                                <span class="reveal-line block text-indigo-400">OWN FUTURE</span>
                            </div>
                        </h1>
                    </div>

                    <!-- Right Column: Pills & Subtext (40%) -->
                    <div class="w-full md:w-[35%] flex flex-col items-start gap-8">
                        <!-- Lavender Pills side-by-side -->
                        <div class="reveal-buttons flex flex-wrap gap-3">
                            <div class="flex flex-wrap gap-4">
                                <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>"
                                    class="bg-white/10 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-xl backdrop-blur-sm transition-all border border-white/20">
                                    Browse Courses

                                </a>
                                <a href="#features"
                                    class="bg-white/10 hover:bg-white/20 text-white font-bold py-4 px-8 rounded-xl backdrop-blur-sm transition-all border border-white/20">
                                    Learn More
                                </a>
                            </div>
                        </div>

                        <!-- Subtext paragraph -->
                        <div class="overflow-hidden">
                            <p class="reveal-text text-lg md:text-xl text-indigo-100/80 leading-relaxed font-medium">
                                With one of the world's most diverse populations, Rainbow Edu offers significant
                                opportunities for students and innovators.
                            </p>
                        </div>

                        <!-- Refined Action (if desired) -->
                        <div class="overflow-hidden">
                            <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>"
                                class="reveal-buttons inline-flex items-center gap-3 text-white font-bold uppercase tracking-[0.2em] text-xs hover:text-indigo-300 transition-colors group">
                                Learn More
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 2. Stat Highlights -->
    <section
        class="py-12 bg-white relative z-20 mt-10 mx-4 max-w-7xl lg:mx-auto rounded-3xl shadow-xl border border-gray-100">
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
                <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>"
                    class="text-indigo-600 font-bold hover:text-indigo-800 transition-colors flex items-center gap-1 group">
                    View All <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <?php
            $args = array(
                'post_type' => 'course',
                'posts_per_page' => 3,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while ($query->have_posts()):
                        $query->the_post(); ?>
                        <?php get_template_part('template-parts/course-card'); ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php else: ?>
                <p class="text-center text-gray-500 py-12">More courses coming soon. Check back later!</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- 4. Why Choose Us Section -->
    <section id="features" class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-4">Why Learn with Rainbow Edu?</h2>
                <p class="text-gray-600 text-lg">We provide a premium learning experience designed to help you succeed
                    in your career goals.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="flex flex-col items-center text-center group">
                    <div
                        class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Lifetime Access</h3>
                    <p class="text-gray-500 leading-relaxed">Once you enroll, you have access to the course material
                        forever. Learn at your own pace, anytime.</p>
                </div>
                <!-- Feature 2 -->
                <div class="flex flex-col items-center text-center group">
                    <div
                        class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Instructors</h3>
                    <p class="text-gray-500 leading-relaxed">Learn from industry professionals who bring real-world
                        experience and insights into every lesson.</p>
                </div>
                <!-- Feature 3 -->
                <div class="flex flex-col items-center text-center group">
                    <div
                        class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Certificates</h3>
                    <p class="text-gray-500 leading-relaxed">Earn a industry-recognized certificate upon completion to
                        showcase your skills and boost your resume.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4.5. Our Ambition Section -->
    <section class="py-24 md:py-32 bg-[#F9F7F2] relative z-10 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

                <!-- Left Column: Content -->
                <div class="flex flex-col items-start">
                    <!-- Pill -->
                    <div
                        class="bg-[#EBE8DF] text-gray-600 text-[11px] font-bold uppercase tracking-[0.15em] px-4 py-1.5 rounded-full mb-8">
                        Our ambition
                    </div>

                    <!-- Massive Heading -->
                    <h2
                        class="text-5xl md:text-[80px] font-black text-[#341253] leading-[0.9] tracking-tighter uppercase font-['Roboto_Condensed'] mb-10">
                        DRIVING<br>
                        FORWARD AS<br>
                        A CORE CITY
                    </h2>

                    <!-- Text Paragraphs -->
                    <div class="space-y-6 text-[#4A3B52] font-medium text-lg leading-relaxed mb-10 pr-0 lg:pr-10">
                        <p>
                            Core Cities are the UK's major urban centres, places that drive regional economies, shape
                            national growth, and anchor investment, jobs, and innovation.
                        </p>
                        <p class="font-bold text-[#341253]">
                            If Rainbow Edu matched Core City averages across key metrics, productivity would rise to
                            £37.80 per hour, the business base would grow to nearly 20,000, and the working-age
                            population would increase.
                        </p>
                        <p>
                            Becoming a Core City is a realistic next step and a powerful way to draw in more investment,
                            back innovation, and grow higher-value jobs &ndash; playing a bigger role in the economy.
                            Growth built on skills, innovation, and quality of life. Growth that sticks and spreads.
                        </p>
                    </div>

                    <!-- CTA Button -->
                    <a href="#"
                        class="inline-flex bg-[#4ade80] hover:bg-[#22c55e] transition-colors text-white font-bold py-3.5 pl-6 pr-2 rounded-full items-center gap-4 text-sm tracking-[0.2em] uppercase group shadow-xl shadow-green-500/20">
                        View the plan
                        <span
                            class="bg-white text-[#22c55e] rounded-full p-2 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                    </a>
                </div>

                <!-- Right Column: Masonry Grid -->
                <!-- We use columns-2 for a seamless masonry layout mimicking the reference -->
                <div class="w-full relative px-4 lg:px-0 mt-8 lg:mt-0">
                    <div class="ambition-images-grid columns-2 gap-4 space-y-4">

                        <!-- Image 1: Top Left (landscape) -->
                        <div class="ambition-image break-inside-avoid relative rounded-3xl overflow-hidden group mb-4">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=600&auto=format&fit=crop"
                                alt="Campus"
                                class="w-full h-auto object-cover aspect-[4/3] group-hover:scale-105 transition-transform duration-700">
                        </div>

                        <!-- Image 2: Middle Left (tall) -->
                        <div class="ambition-image break-inside-avoid relative rounded-3xl overflow-hidden group mb-4">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=600&auto=format&fit=crop"
                                alt="Students"
                                class="w-full h-auto object-cover aspect-[3/4] group-hover:scale-105 transition-transform duration-700">
                        </div>

                        <!-- Image 3: Bottom Left (square) -->
                        <div class="ambition-image break-inside-avoid relative rounded-3xl overflow-hidden group">
                            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=600&auto=format&fit=crop"
                                alt="Lecture"
                                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform duration-700">
                        </div>

                        <!-- Image 4: Top Right (tall, tech focus) -->
                        <div class="ambition-image break-inside-avoid relative rounded-3xl overflow-hidden group mb-4 mt-6 md:mt-12">
                            <img src="https://images.unsplash.com/photo-1622979135225-d2ba269cf1ac?q=80&w=600&auto=format&fit=crop"
                                alt="VR Tech"
                                class="w-full h-auto object-cover aspect-[9/16] group-hover:scale-105 transition-transform duration-700">
                            <!-- Overlay effect mirroring the reference VR image lighting -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#341253]/60 via-transparent to-[#341253]/20 pointer-events-none">
                            </div>
                        </div>

                        <!-- Image 5: Middle Right (square, activities) -->
                        <div class="ambition-image break-inside-avoid relative rounded-3xl overflow-hidden group mb-4">
                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=600&auto=format&fit=crop"
                                alt="Group Activities"
                                class="w-full h-auto object-cover aspect-square group-hover:scale-105 transition-transform duration-700">
                        </div>

                        <!-- Image 6: Bottom Right (landscape) -->
                        <div class="ambition-image break-inside-avoid relative rounded-3xl overflow-hidden group">
                            <img src="https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?q=80&w=600&auto=format&fit=crop"
                                alt="Library"
                                class="w-full h-auto object-cover aspect-[4/3] group-hover:scale-105 transition-transform duration-700">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. Final CTA Section -->

    <section class="py-20 bg-indigo-600">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Ready to take the next step in your career?
            </h2>
            <p class="text-indigo-100 text-lg mb-10">Join thousands of students and start learning today with the best
                instructors in the world.</p>
            <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>"
                class="inline-block bg-white text-indigo-600 font-black py-4 px-10 rounded-xl hover:bg-indigo-50 transition-colors shadow-xl">
                Get Started Now
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>