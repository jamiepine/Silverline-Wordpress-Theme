<?php
/**
 * WordPress Template: Search
 */

get_template_part( 'header' ); ?>

				<div class="column-8">
				
				<div style="width:590px;" class="box-loop">
					<h3>Search Results <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e(); _e(' - '); echo $count . ' '; _e('articles'); wp_reset_query(); ?></h3>
					</div>

					<?php do_action( 'content_open' ); ?>
					
					
					<?php get_template_part( 'loop', 'archive' ); ?>
					

					<?php do_action( 'content_close' ); ?>

				</div><!-- #column -->

				<?php get_template_part( 'sidebar' ); ?>

<?php get_template_part( 'footer' ); ?>