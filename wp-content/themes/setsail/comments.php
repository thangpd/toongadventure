<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="qodef-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="qodef-comment-holder-inner">
				<?php if ( ! is_singular( 'tour-item' ) ) { ?>
					<div class="qodef-comments-title">
						<h3><?php esc_html_e( 'Comments', 'setsail' ); ?></h3>
					</div>
				<?php } ?>
				<div class="qodef-comments">
					<ul class="qodef-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'setsail_select_comment' ), apply_filters( 'setsail_select_filter_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'setsail' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$qodef_commenter = wp_get_current_commenter();
		$qodef_req       = get_option( 'require_name_email' );
		$qodef_aria_req  = ( $qodef_req ? " aria-required='true'" : '' );
	    $qodef_consent  = empty( $qodef_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		
		$qodef_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'setsail' ),
			'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h3>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'setsail' ),
			'cancel_reply_link'    => esc_html__( 'cancel reply', 'setsail' ),
			'label_submit'         => esc_html__( 'Submit', 'setsail' ),
			'comment_field'        => apply_filters( 'setsail_select_filter_comment_form_textarea_field', '<div class="qodef-grid-row qodef-grid-tiny-gutter"><div class="qodef-grid-col-12"><span class="qodef-comment-icon qodef-comment-message-icon icon_chat"></span><textarea id="comment" placeholder="' . esc_attr__( 'Comment', 'setsail' ) . '" name="comment" cols="45" rows="6" aria-required="true"></textarea></div></div>' ),
			'comment_notes_before' => '<p class="qodef-comment-notes"></p>',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'setsail_select_filter_comment_form_default_fields', array(
				'author' => '<div class="qodef-grid-row qodef-grid-tiny-gutter"><div class="qodef-grid-col-6"><span class="qodef-comment-icon qodef-comment-name-icon icon_profile"></span><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'setsail' ) . '" type="text" value="' . esc_attr( $qodef_commenter['comment_author'] ) . '"' . $qodef_aria_req . ' /></div>',
				'email'  => '<div class="qodef-grid-col-6"><span class="qodef-comment-icon qodef-comment-email-icon icon_mail_alt"></span><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'setsail' ) . '" type="text" value="' . esc_attr( $qodef_commenter['comment_author_email'] ) . '"' . $qodef_aria_req . ' /></div></div>',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $qodef_consent . ' />' .
					'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'setsail' ) . '</label></p>',
			) )
		);

	$qodef_args = apply_filters( 'setsail_select_filter_comment_form_final_fields', $qodef_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="qodef-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $qodef_show_comment_form = apply_filters('setsail_select_filter_show_comment_form_filter', true);
    if($qodef_show_comment_form) {
    ?>
        <div class="qodef-comment-form">
            <div class="qodef-comment-form-inner">
                <?php comment_form( $qodef_args ); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>	