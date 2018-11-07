<?php
/**
 * WordPress Template: Page
 * 
 */

get_template_part( 'header' ); ?>


				
				

				<div class="column-8">
				
				<div class="box-loop">
				<h3>
				<?php if ( is_front_page() ) { ?>
				<?php the_title(); ?>
				<?php } else { ?>
				<?php the_title(); ?>
				<?php } ?>
				</h3>
				
				<?php edit_post_link( __( 'Edit', t() ), '<div class="edit_button"><span class="edit-link">', '</span></div>' ); ?>
				</div>
				
				<div id="content" class="content-page">
				
				<?php if (has_post_thumbnail( $post->ID )): ?>		
					<div class="page_thumb_shadow"></div>
						<div id="page_thumb">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
  										 <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=651&h=265&zc=100" /></a> <br/>
  										  
  					</div>
  					<div style="margin-top:270px;"></div>
  					<?php endif; ?>


					<?php do_action( 'content_open' ); ?>

					<?php if ( have_posts() ) : ?>

						<?php do_action( 'loop_open' ); ?>

						<div class="hfeed">

							<?php do_action( 'hfeed_open' ); ?>

								<?php while ( have_posts() ) : the_post(); ?>

									<?php do_action( 'loop_while_before' ); ?>

									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

										<div style="margin-top:-5px;" class="entry-content">
											<?php the_content(); ?>
											<?php wp_link_pages( array( 'before' => '<div class="page-link"><span class="page-link-meta">' . __( 'Pages:', t() ) . '</span>', 'after' => '</div>', 'next_or_number' => 'number' ) ); ?>
										</div><!-- .entry-content -->

										<footer class="entry-meta">
										</footer><!-- .entry-meta -->

										<div style="margin-bottom:-40px;"></div>

									</article><!-- #post-<?php the_ID(); ?> -->

									<?php do_action( 'loop_while_after' ); ?>

								<?php endwhile; ?>

							<?php do_action( 'hfeed_close' ); ?>

						</div><!-- .hfeed -->

						<?php do_action( 'loop_close' ); ?>

					<?php else : ?>

						<?php get_template_part( 'loop-404' ); ?>

					<?php endif; ?>

					<?php do_action( 'content_close' ); ?>
					
				</div><!-- .content-page -->
				</div><!-- #content -->
<?php get_template_part( 'sidebar-page' ); ?>

<?php get_template_part( 'footer' ); ?>