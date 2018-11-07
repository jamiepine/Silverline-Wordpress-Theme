<?php
/**
 * WordPress Template: Category
 */

get_template_part( 'header' ); ?>

<div class="column-8">
					<?php do_action( 'content_open' ); ?>
					
					
					
					<div style="width:590px;" class="box-loop">
					<h3>Posts in <?php if (is_category()) { single_cat_title(); } ?></h3>
					</div>
					
					
					<div style="display:<?php echo of_get_option('category_slider_show_hide', 'no entry' ); ?>;" id="photo-rotator">
<div id="slider_fade"  style="display:none;">
    <?php $slide_id=1; ?>
<?php
 $x = the_category_ID( $echo );
 $featuredPosts = new WP_Query();
 $featuredPosts->query("showposts=5&cat=$x");
  while ($featuredPosts->have_posts()) : $featuredPosts->the_post();
 ?>


    <div id="slide-<?php echo $slide_id; $slide_id++;?>">
     <a href="<?php the_permalink() ?>" class="post-image">
     
				<?php if (has_post_thumbnail( $post->ID )): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
 				<img align="left"  class="attachment-rotator-post-image wp-post-image" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=634&h=300&zc=100" /> 
				<?php endif; ?> 
				
				
				 
         <span class="title"><?php the_title(); ?></span>
     </a>
     </div>

    <?php endwhile; ?><!--/close loop-->

    <ul id="slide-nav">
        <?php $nav_id=1; ?>
        <?php while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); ?>
            <li>
                <a href="#slide-<?php echo $nav_id; ?>">
                    <span class="thumbnail">
                    
                       	<?php if (has_post_thumbnail( $post->ID )): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
 						<img align="left"  class="attachment-nav-image wp-post-image" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=126&h=65&zc=100" /> 
						<?php endif; ?> 
                    </span>
                    
                    <? $nav_id++;?>
                </a>
            </li>
        <?php endwhile; ?><!--/close loop-->
    </ul>
</div><!--/fade-->
</div><!--/Photo Rotator-->

					<?php
					$y = of_get_option('category_loop_style', 'archive');
					get_template_part( 'loop', $y ); 
					?>

					<?php do_action( 'content_close' ); ?>
</div>

				<?php get_template_part( 'sidebar-page' ); ?>

<?php get_template_part( 'footer' ); ?>