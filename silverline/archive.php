<?php
/**
 * WordPress Template: Archive
 */

get_template_part( 'header' ); ?>

<div class="column-8">
					<?php do_action( 'content_open' ); ?>
					
				<div style="width:590px;" class="box-loop">
					<h3>
					
					
					<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', '' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', '' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', '' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', '' ); ?>
						<?php endif; ?>

					
					</h3>
				</div>
				
					
					<?php
					$y = of_get_option('archive_loop_style', 'archive');
					get_template_part( 'loop', $y ); 
					?>

					<?php do_action( 'content_close' ); ?>
</div>

				<?php get_template_part( 'sidebar-page' ); ?>

<?php get_template_part( 'footer' ); ?>