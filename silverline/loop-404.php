<?php
/**
 * Custom Template: Loop 404
 */
?>

			<?php do_action( 'loop_404_before' ); ?>
			<div id="content"> 

			<article id="post-0" class="hentry error404 not-found">

				<header class="entry-header">
					<h4>No results found for<b> <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">"'); echo $key; _e('"</span>'); wp_reset_query(); ?></b></h4>
					
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php _e( 'No results have been found using this criteria, please try to change the keywords and search again below:', t() ); ?>
						<br/><br/>
							<div style="margin-left:-10px; position:absolute;">
					<?php get_search_form(); ?>
					</div>
				</div><!-- .entry-content -->
				
				<br/>
			</article><!-- #post-0 -->
			
			</div>
			<?php do_action( 'loop_404_after' ); ?>