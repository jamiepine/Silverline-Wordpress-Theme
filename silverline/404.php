<?php
/**
 * WordPress Template: 404
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_template_part( 'header' ); ?>



				<div  class="column-8">
			
				<div class="not-found-page" id="content">

					<?php do_action( 'content_open' ); ?>

					<div class="hfeed">

						<?php do_action( 'hfeed_open' ); ?>

						<article id="post-0" class="hentry error404 not-found">
<h3><?php _e( 'Oops! We can\'t find what you are looking for.', t() ); ?></h3>

							<div class="entry-content">
							
				
								<p><?php _e( 'It seems that the content you are looking for has either moved or never existed. Instead, you can check out some of the recent posts below or use the search form!', t() ); ?></p>

								<div style="margin-left:-10px;"><?php get_search_form( $echo ); ?></div>
								<br/>
								
								<!-- Recent POSTS-->
<div style="margin-bottom:-115px; border-top:0;" class="related_container">
<h3 style="margin-bottom:5px;" class="related-posts-title">Recent Posts</h3>

<ul style="margin-bottom:232px;" class="related_posts">					
							<?php
      $catposts = get_posts('numberposts=6');
      foreach($catposts as $post) :
   ?>
    

    <li style="border:0;">
  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">  
        <img class="thumbnail_image" style="margin-right:10px;" align="left" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php if (has_post_thumbnail()) { 
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_name'); echo $thumb[0]; // thumbnail url
} ?>&w=62&h=62&zc=1" />

        <span class="related_posts_title" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
 <?php
$tit = the_title('','',FALSE);
echo substr($tit, 0, 25);
if (strlen($tit) > 25) echo "";
?>

</span>
        <span class="related_posts_date"><p><?php the_time('F j, Y'); ?>  </p></span>
    </a>
</li>  

      
     <?php endforeach; ?>
</ul>
</div>



<!-- END Recent POSTS-->
							</div><!-- .entry-content -->
							
						

						</article><!-- #post-0 -->

						<?php do_action( 'hfeed_close' ); ?>

					</div><!-- .hfeed -->

					<?php do_action( 'content_close' ); ?>
					
				</div>
				</div><!-- #content -->

				<?php get_template_part( 'sidebar' ); ?>

<?php get_template_part( 'footer' ); ?>