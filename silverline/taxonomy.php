<?php
/**
 * WordPress Template: Taxonomy
 */

get_template_part( 'header' ); ?>
<div class="column-8">
					<?php do_action( 'content_open' ); ?>
					
				<div style="width:590px;" class="box-loop">
					<span>
					<h3>
					
			<?php if (is_tag()) {?>
			Tagged: <?php single_cat_title(); ?>
			<?php } ?>

					</h3>
					</span>
				</div>

					<?php get_template_part( 'loop', 'archive' ); ?>

					<?php do_action( 'content_close' ); ?>

				</div>
				<?php get_template_part( 'sidebar' ); ?>

<?php get_template_part( 'footer' ); ?>