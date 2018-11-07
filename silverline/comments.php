<?php
/**
 * WordPress Template: Comments
 */

if ( !post_type_supports( get_post_type(), 'comments' ) )
	return;
?>

<div id="comments">
	<?php do_action( 'commentsdiv_open' ); ?>

	<?php
	// Make sure comments.php doesn't get loaded directly
	if ( post_password_required() ) {
		do_action( 'post_password_required' ); ?>
		<p class="password-required"><?php _e( 'This post is password protected. Enter the password to view comments.', t() ); ?></p>
		</div><!-- #comments -->
	<?php return; } ?>





	<?php if ( have_comments() ) : ?>

		<?php do_action( 'have_comments_before' ); ?>
	
<h2>Discussion - <?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?> </h2>
		<h5 id="comments-title"><?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), t() ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h5>
<br/>
		
		<!-- comments title -->
		<ol class="comment-list">
			<?php
			/**
			 * talk about wpf_list_comment_args();
			 */
			wp_list_comments( wpf_list_comment_args() );
			?>
		</ol><!-- .comment-list -->

		<?php get_template_part( 'pagination', 'comments' ); ?>

		<?php do_action( 'have_comments_after' ); ?>

	<?php else : ?>

		<?php if ( pings_open() && !comments_open() ) : ?>

			<p class="comments-closed pings-open">
				<?php printf( __( 'Comments are closed, but <a href="%1$s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', t() ), get_trackback_url() ); ?>
			</p><!-- .comments-closed .pings-open -->

			<?php do_action( 'comments_closed_pings_open' ); ?>

		<?php elseif ( !comments_open() ) : ?>
			
			<p class="comments-closed">
				<?php _e( 'Comments are closed.', t() ); ?>
			</p><!-- .comments-closed -->

			<?php do_action( 'comments_closed' ); ?>

		<?php elseif ( comments_open() ) : ?>

			<p class="no-comments">



				<?php _e( '', t() ); ?>
			</p><!-- .no-comments -->

			<?php do_action( 'no_comments' ); ?>

		<?php endif; ?>
	
	<?php endif; ?>

	<?php $comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<p class="comment-form-author">' .
                
                '<input onfocus="if(this.value==\'Name*\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Name*\';" id="author" name="author" type="text"  value="Name*' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
                
               
                '</p><!-- #form-section-author .form-section -->',
                
    'email'  => '<p class="comment-form-email">' .
                
                '<input onfocus="if(this.value==\'Email*\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Email*\';" id="email" name="email" type="text" value="Email*' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
                		'</p><!-- #form-section-email .form-section -->',
    'url'    => '' ) ),
    'comment_field' => '<p class="comment-form-comment">' .
                
                '<textarea id="comment" name="comment" cols="45" rows="8" style="max-width:561px;" aria-required="true"></textarea>' .
                
                '</p><!-- #form-section-comment .form-section -->',
    'comment_notes_after' => '',
);
comment_form($comment_args); ?>

	<?php do_action( 'commentsdiv_close' ); ?>
</div><!-- #comments -->