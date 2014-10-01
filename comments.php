
<?php // Check if password protected
    if ( post_password_required() ) return;
?>

<?php $comments_by_type = separate_comments( $comments ); ?>

<?php if ( !empty( $comments_by_type['comment'] ) ) : ?>

	<!--Comments Section-->
	<div class="entry-comments" id="comments">	
		<h3><?php comments_number( __( '0 Replies', 'mighty'), __( '1 Reply', 'mighty' ), __( '% Replies', 'mighty' ) ); ?></h3>      
        <?php if ( !comments_open() && '0' != get_comments_number() ) : ?>
			<p class="comments-closed"><?php _e( 'Reply section is closed.', 'mighty' ) ?></p>
		<?php else : ?>
        	<ol class="comment-list">
            	<?php wp_list_comments( 'type=comment&callback=mighty_comment' ); ?>
        	</ol>
            <?php paginate_comments_links() ?>
    	<?php endif; ?>    	
	</div>

<?php elseif ( !comments_open() && !is_page() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
   
    <p><?php _e( 'Reply section is closed.', 'mighty' ) ?></p>

<?php endif; ?>


<?php if ( comments_open() ) : ?>
    
	<!--Leave Response-->
	<?php
        $fields = array(
            'comment_field'        => '<p class="comment-form-comment"><label>' . __( 'Comment', 'mighty' ) . '</label><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
            'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'mighty' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out</a>', 'mighty' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'title_reply'          => __( 'Reply', 'mighty' ),
            'title_reply_to'       => __( 'Reply to %s', 'mighty' ),
            'cancel_reply_link'    => __( 'X', 'mighty' ),
            'label_submit'         => __( 'Post Reply', 'mighty' )
        );
    ?>
    		    	
    <?php comment_form( $fields ); ?>
    
<?php endif; ?>
