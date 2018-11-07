<?php
/**
 * Custom Template: Archive
 */

if ( have_posts() ) : ?>



	<?php do_action( 'loop_open' ); ?>

		<div class="hfeed">

			<?php do_action( 'hfeed_open' ); ?>


<ul class="homepage_four_column">


			<?php while ( have_posts() ) : the_post(); ?>


<li id="content" class="four_column_content">
	
					
<?php if (has_post_thumbnail( $post->ID )): ?>			
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
   <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left" class="loop_post_image" style="margin-left:-10px; margin-top:-15px; margin-bottom:10px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=142&h=155&zc=1" /></a> 
  <?php else : ?>
<img align="left" class="loop_post_image" style="margin-left:-10px; margin-top:-15px; margin-bottom:10px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php bloginfo('template_directory'); ?>/library/images/no-post-image.png&w=143&h=155&zc=1" />
  
<?php endif; ?> 
 
 
<h2 style="margin-top: 150px;" class="column_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php
$tit = the_title('','',FALSE);
echo substr($tit, 0, 30);
if (strlen($tit) > 30) echo "…";
?></a></h2>

<div style="position:absolute; margin-top:193px;" class="medium-post-meta">

<?php printf( __( '<a href="%1$s" rel="bookmark"><time datetime="%2$s" pubdate>%3$s</time></a>', t() ),
get_permalink(),
get_the_date( 'c' ),
get_the_date()	
); ?>
</div>



<div  class="entry-content">
						
						
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">					
	<div style="margin-top:74px;" class="read_more_button_3">
	<span>Read More</span> 
	</div>	
	</a>
	
</div><!-- .entry-content -->
						
</li>

<?php endwhile; ?>
<div class="light">
			<?php get_template_part( 'pagination' ); ?>
</div>
</ul>

			<?php do_action( 'hfeed_close' ); ?>

		</div><!-- .hfeed -->

	<?php do_action( 'loop_close' ); ?>

<?php else : ?>

	<?php get_template_part( 'loop-404' ); ?>

<?php endif; ?>