<?php
/**
 * WordPress Template: Sidebar Footer Column 3
 */
do_action( 'sidebar_before' ); ?>

					<?php do_action( 'sidebar_open' ); ?>

					<aside role="complementary">

						<?php do_action( 'aside_open' ); ?>
						
						<ul class="footer-widget-align">
						<?php
						/* When we call the dynamic_sidebar() function, it'll spit out
						 * the widgets for that widget area. If it instead returns false,
						 * then the sidebar simply doesn't exist, so we'll hard-code in
						 * some default sidebar stuff just in case.
						 */
						if ( !is_active_sidebar( 'footer-widgets-3' ) ) : ?>
</ul>
						
									<?php else : ?>
							<?php dynamic_sidebar( 'footer-widgets-3' ); ?>
						<?php endif; ?>

						<?php do_action( 'aside_close' ); ?>

					</aside><!--aside-->

					<?php do_action( 'sidebar_close' ); ?>

<?php do_action( 'sidebar_after' ); ?>