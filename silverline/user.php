<?php
/**
 * WordPress Template: User
 */

get_template_part( 'header' ); ?>

				<div class="column-8">

					<?php do_action( 'content_open' ); ?>
					
				<!-- AUTHOR -->
				<div style="padding:25px;" class="box-loop">

						<h3>Articles By <?php printf( __( '%s', 'twentyeleven' ), get_the_author() ); ?></h3>
						
							<div class="author-description-single">
								
								<?php the_author_meta( 'description' ); ?>
								
							</div>

					<div style="position:absolute; top:10px; right:30px;"  id="author_avatar">
					
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 70 ) ); ?>
						
					</div><!-- #author-avatar -->
				
				</div>
				<!-- Author -->

					<?php get_template_part( 'loop', 'archive' ); ?>

						<?php do_action( 'content_close' ); ?>

				</div><!-- #content -->

				<?php get_template_part( 'sidebar' ); ?>

		<?php get_template_part( 'footer' ); ?>