<?php
/**
 * The comments template.
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area mt-10 pt-10 border-t border-gray-200">

    <?php if ( have_comments() ) : ?>
        <h2 class="text-2xl font-bold text-gray-900 mb-8">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf( esc_html__( '1 Comment', 'rainbow-edu' ) );
            } else {
                printf( esc_html__( '%s Comments', 'rainbow-edu' ), number_format_i18n( $comment_count ) );
            }
            ?>
        </h2>

        <ol class="comment-list space-y-6 mb-10 list-none p-0">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
                'callback'    => 'rainbow_edu_comment_callback',
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(array(
            'prev_text' => '&larr; ' . esc_html__( 'Older Comments', 'rainbow-edu' ),
            'next_text' => esc_html__( 'Newer Comments', 'rainbow-edu' ) . ' &rarr;',
        )); ?>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments text-gray-500 italic"><?php esc_html_e( 'Comments are closed.', 'rainbow-edu' ); ?></p>
    <?php endif; ?>

    <?php
    comment_form( array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title text-2xl font-bold text-gray-900 mb-6">',
        'title_reply_after'  => '</h2>',
        'class_form'         => 'space-y-4',
        'class_submit'       => 'bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl transition-all shadow-md hover:-translate-y-0.5 cursor-pointer',
        'label_submit'       => __( 'Post Comment', 'rainbow-edu' ),
        'comment_field'      => '<p class="comment-form-comment"><label for="comment" class="block text-sm font-semibold text-gray-700 mb-2">' . _x( 'Comment', 'noun', 'rainbow-edu' ) . ' <span class="required text-red-500">*</span></label><textarea id="comment" name="comment" cols="45" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 outline-none transition-shadow text-sm resize-y" required>' . '</textarea></p>',
    ) );
    ?>

</div>

<?php
/**
 * Custom comment callback for styled comments.
 */
function rainbow_edu_comment_callback( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'bg-white rounded-2xl border border-gray-100 shadow-sm p-6', $comment ); ?>>
        <div class="flex items-start gap-4">
            <div class="shrink-0">
                <div class="rounded-full overflow-hidden w-12 h-12 ring-2 ring-indigo-100">
                    <?php echo get_avatar( $comment, 48, '', '', array('class' => 'w-full h-full object-cover') ); ?>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex flex-wrap items-center gap-2 mb-2">
                    <span class="font-bold text-gray-900"><?php comment_author(); ?></span>
                    <span class="text-xs text-gray-400">&middot;</span>
                    <time class="text-xs text-gray-400" datetime="<?php comment_date('c'); ?>"><?php comment_date(); ?></time>
                </div>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="text-sm text-amber-600 bg-amber-50 border border-amber-200 rounded-lg px-3 py-2 mb-3"><?php esc_html_e( 'Your comment is awaiting moderation.', 'rainbow-edu' ); ?></p>
                <?php endif; ?>
                <div class="text-gray-600 text-sm leading-relaxed comment-content">
                    <?php comment_text(); ?>
                </div>
                <div class="mt-3">
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'before'    => '',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text'=> '<span class="text-xs text-indigo-600 font-semibold hover:text-indigo-800 transition-colors">&crarr; Reply</span>',
                    ) ) );
                    ?>
                </div>
            </div>
        </div>
    </<?php echo $tag; ?>>
    <?php
}
