<?php
/**
 * The template for displaying all single courses
 */
get_header();
?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <?php
    while ( have_posts() ) :
        the_post();
        
        $price = get_post_meta( get_the_ID(), '_course_price', true );
        $duration = get_post_meta( get_the_ID(), '_course_duration', true );
        $level = get_post_meta( get_the_ID(), '_course_level', true );
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <header class="bg-indigo-900 text-white rounded-3xl p-8 md:p-12 mb-12 shadow-xl relative overflow-hidden">
                <!-- Abstract Background SVG -->
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <svg class="absolute w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <polygon fill="currentColor" points="0,100 100,0 100,100"/>
                    </svg>
                </div>
                
                <div class="relative z-10 max-w-3xl">
                    <div class="flex flex-wrap gap-3 mb-6">
                        <?php if ( $level ) : ?>
                            <span class="bg-indigo-800 text-indigo-100 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide shadow-sm flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <?php echo esc_html( $level ); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ( $duration ) : ?>
                            <span class="bg-white/10 text-white px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide backdrop-blur-sm shadow-sm flex items-center border border-white/20">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <?php echo esc_html( $duration ); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                
                    <?php the_title( '<h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">', '</h1>' ); ?>
                    
                    <div class="text-indigo-200 text-lg md:text-xl font-medium max-w-2xl leading-relaxed">
                        Learn everything you need to know to master this topic from scratch.
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 prose prose-indigo max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-a:text-indigo-600 prose-img:rounded-xl leading-relaxed">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">Course Description</h2>
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Sidebar / Enrollment -->
                <div class="lg:col-span-1 lg:sticky lg:top-24 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <div class="text-center mb-8">
                            <h3 class="text-gray-500 font-semibold uppercase tracking-wider text-sm mb-2">Enrollment Fee</h3>
                            <div class="text-4xl font-extrabold text-indigo-600">
                                <?php echo $price ? esc_html( $price ) : __( 'Free', 'rainbow-edu' ); ?>
                            </div>
                        </div>

                        <?php 
                        $enroll_status = isset($_GET['enroll']) ? sanitize_key($_GET['enroll']) : '';
                        if ( $enroll_status === 'success' ) {
                            echo '<div role="alert" class="bg-green-50 text-green-800 border-l-4 border-green-500 p-4 rounded-md mb-8 flex items-start gap-3">
                                    <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    <div><p class="font-bold">Enrolled Successfully!</p><p class="text-sm mt-1">A confirmation email has been sent to you. We will be in touch shortly!</p></div>
                                  </div>';
                        } elseif ( $enroll_status === 'duplicate' ) {
                            echo '<div role="alert" class="bg-amber-50 text-amber-800 border-l-4 border-amber-500 p-4 rounded-md mb-8 flex items-start gap-3">
                                    <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div><p class="font-bold">Already Enrolled</p><p class="text-sm mt-1">You are already enrolled in this course with that email address.</p></div>
                                  </div>';
                        } elseif ( $enroll_status === 'error' ) {
                            echo '<div role="alert" class="bg-red-50 text-red-800 border-l-4 border-red-500 p-4 rounded-md mb-8 flex items-start gap-3">
                                    <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div><p class="font-bold">Error</p><p class="text-sm mt-1">Something went wrong. Please check your details and try again.</p></div>
                                  </div>';
                        }
                        ?>

                        <div class="enrollment-form border-t border-gray-100 pt-8 mt-4">
                            <h3 class="text-lg font-bold text-gray-900 mb-6">Start Your Journey Today</h3>
                            <form action="" method="POST" class="space-y-5">
                                <input type="hidden" name="course_id" value="<?php echo get_the_ID(); ?>">
                                <input type="hidden" name="rainbow_enroll_action" value="enroll_student">
                                <?php wp_nonce_field( 'enroll_course', 'rainbow_enroll_nonce' ); ?>

                                <div>
                                    <label for="student_name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                                    <input type="text" id="student_name" name="student_name" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition-shadow outline-none text-sm placeholder-gray-400" placeholder="John Doe" required>
                                </div>

                                <div>
                                    <label for="student_email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                                    <input type="email" id="student_email" name="student_email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition-shadow outline-none text-sm placeholder-gray-400" placeholder="john@example.com" required>
                                </div>

                                <div>
                                    <label for="student_phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" id="student_phone" name="student_phone" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition-shadow outline-none text-sm placeholder-gray-400" placeholder="+1 (555) 000-0000">
                                </div>

                                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 px-6 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 flex justify-center items-center">
                                    <span>Enroll Now</span>
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                                
                                <p class="text-xs text-center text-gray-500 mt-4 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    Secure Registration Process
                                </p>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Additional Info Widget -->
                    <div class="bg-indigo-50 rounded-2xl border border-indigo-100 p-6 flex items-start space-x-4">
                        <div class="bg-indigo-100 p-3 rounded-xl text-indigo-600 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1 leading-tight">100% Satisfaction</h4>
                            <p class="text-sm text-gray-600 leading-snug">Our curriculum is designed by industry experts to ensure the highest quality education for our students.</p>
                        </div>
                    </div>
                </div>
            </div>

        </article>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
