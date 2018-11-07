<?php
/**
 * WordPress Template: Attachment
 */

get_template_part( 'header' ); ?>

				<div id="content" class="column-7">

					<?php do_action( 'content_open' ); ?>

					<?php the_post(); ?>

					<?php do_action( 'loop_open' ); ?>

					<div class="hfeed">

						<?php do_action( 'hfeed_open' ); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


						<div style="margin-left:480px;margin-top:45px;" class="single-meta-facebook">								
							<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;
width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;">
							</iframe>
						</div><!-- .single-meta-facebook -->

						<div style="margin-left:480px;margin-top:15px;" class="single-meta-twitter">	
								<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
   									<a href="http://twitter.com/share" class="twitter-share-button"
     								data-url="<?php the_permalink(); ?>"
        							data-via="wpbeginner"
        							data-text="<?php the_title(); ?>"
       							    data-related="syedbalkhi:Founder of WPBeginner"
       							    data-count="horizontal">Tweet</a>   
 						</div><!-- .single-meta-twitter -->   

								<h1 class="entry-title-header"><?php the_title(); ?></h1>
								
								
											<div class="single-entry-meta">
										<?php
											$metadata = wp_get_attachment_metadata();
											printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> %2$s at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%7$s</a>', 'toolbox' ),
												esc_attr( get_the_time() ),
												get_the_date(),
												wp_get_attachment_url(),
												$metadata['width'],
												$metadata['height'],
												get_permalink( $post->post_parent ),
												get_the_title( $post->post_parent )
											);
										?>

									
									
								 </div>	

								
								</header><!-- .entry-header -->

								<div class="entry-content">
									
									<div class="entry-attachment">
										<div class="attachment">
											<?php
												/**
												 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
												 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
												 */
												$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
												foreach ( $attachments as $k => $attachment ) {
													if ( $attachment->ID == $post->ID )
														break;
												}
												$k++;
												// If there is more than 1 attachment in a gallery
												if ( count( $attachments ) > 1 ) {
													if ( isset( $attachments[ $k ] ) )
														// get the URL of the next image attachment
														$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
													else
														// or get the URL of the first image attachment
														$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
												} else {
													// or, if there's only 1 image, get the URL of the image
													$next_attachment_url = wp_get_attachment_url();
												}
											?>
											<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
											$attachment_size = apply_filters( 'theme_attachment_size',  500 );
											echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
											?></a>
										</div><!-- .attachment -->

										<?php if ( ! empty( $post->post_excerpt ) ) : ?>
										<div class="entry-caption">
											<?php the_excerpt(); ?>
										</div>
										<?php endif; ?>
									</div><!-- .entry-attachment -->
									
									<br/>

									<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', t() ) ); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-link"><span class="page-link-meta">' . __( 'Pages:', t() ) . '</span>', 'after' => '</div>', 'next_or_number' => 'number' ) ); ?>
								</div><!-- .entry-content -->

								<footer class="entry-meta">
									<span class="taxonomy-lists"><?php wpf_the_taxonomies(); ?></span>
									<?php edit_post_link( __( 'Edit', t() ), '<span class="meta-sep"></span> <span class="edit-link">', '</span>' ); ?></span>
								</footer><!-- .entry-meta -->


							</article><!-- #post-<?php the_ID(); ?> -->

						<?php get_template_part( 'pagination' ); ?>

						<?php do_action( 'hfeed_close' ); ?>

					</div><!-- .hfeed -->

					<?php do_action( 'loop_close' ); ?>

					<?php do_action( 'content_close' ); ?>
<div style="margin-bottom:-100px;"></div>
				</div><!-- #content -->

				<?php get_template_part( 'sidebar' ); ?>

<?php get_template_part( 'footer' ); ?>