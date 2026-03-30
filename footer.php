    </div><!-- #content -->

    <!-- Footer -->
    <footer id="colophon" class="bg-gray-900 text-gray-300 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <span class="text-white font-bold text-lg"><?php bloginfo('name'); ?></span>
                    </div>
                    <p class="text-sm text-gray-400"><?php bloginfo('description'); ?></p>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-indigo-400 transition-colors">Home</a></li>
                        <li><a href="<?php echo esc_url( get_post_type_archive_link('course') ); ?>" class="hover:text-indigo-400 transition-colors">All Courses</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Get in Touch</h3>
                    <p class="text-sm text-gray-400">Have questions? Feel free to reach out to us.</p>
                </div>

            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-500">
                &copy; <?php echo date('Y'); ?> <span class="text-gray-300 font-medium"><?php bloginfo('name'); ?></span>. All Rights Reserved. | Theme by <a href="#" class="text-indigo-400 hover:text-indigo-300"><?php bloginfo('name'); ?></a>.
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
