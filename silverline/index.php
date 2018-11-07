<?php
/**
 * WordPress Template: Index
 */

get_template_part( 'header' ); ?>

				<div class="column-8">

					<?php do_action( 'content_open' ); ?>
					
						
<div style="display:<?php echo of_get_option('slider_show_hide', 'visible' ); ?>;" id="photo-rotator">

<div id="slider_fade"  style="display:none;">
    <?php $slide_id=1; ?>
<?php
 $x = of_get_option('slider_cat', '1' );
 $featuredPosts = new WP_Query();
 $featuredPosts->query("showposts=5&cat=$x");
  while ($featuredPosts->have_posts()) : $featuredPosts->the_post();
 ?>

    <div id="slide-<?php echo $slide_id; $slide_id++;?>">
     <a href="<?php the_permalink() ?>" class="post-image">
     
				<?php if (has_post_thumbnail( $post->ID )): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
 				<img align="left"  class="attachment-rotator-post-image wp-post-image" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=653&h=300&zc=100" /> 
				<?php endif; ?> 
				
				
				 
         <div style="display:<?php echo of_get_option('show_slider_post_title', 'none' ); ?>;" class="title"><?php the_title(); ?></div>
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
 						<img align="left"  class="attachment-nav-image wp-post-image" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=127&h=65&zc=100" /> 
						<?php endif; ?> 
                    </span>
                    
                    <? $nav_id++;?>
                </a>
            </li>
        <?php endwhile; ?><!--/close loop-->
    </ul>
</div><!--/fade-->
</div><!--/Photo Rotator-->

  
					<?php if(of_get_option('homepage_style') == 'magazine'): ?>
					
					
					<?php get_template_part( 'homepage-widgets' ); ?>
					
					
					<?php endif; ?>
					
					
					
					
					
					
					
					<?php if(of_get_option('homepage_style') == 'blog'): ?>
					
					<?php get_template_part( 'loop' ); ?>
					<div style="margin-bottom:-45px;"></div>
					
					<?php endif; ?>
					

					<?php do_action( 'content_close' ); ?>

				</div><!-- #content -->
				
			
			
			<?php get_template_part( 'sidebar' ); ?>
				

<?php get_template_part( 'footer' ); ?>