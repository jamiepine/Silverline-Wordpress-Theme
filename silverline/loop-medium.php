<?php
/**
 * Custom Template: Archive
 */

if ( have_posts() ) : ?>



	<?php do_action( 'loop_open' ); ?>

		<div class="hfeed">

			<?php do_action( 'hfeed_open' ); ?>


<ul class="homepage_two_column">


			<?php while ( have_posts() ) : the_post(); ?>


<li id="content" class="column-3">
<div style="margin-left: -110px; margin-top:-40px;" class="meta-container">	
<div class="date-container">
<div class="day"><?php the_time('d'); ?></div>
<div class="month"><?php the_time('M'); ?></div>
<div class="year"><?php the_time('Y'); ?></div>
</div>
</div>		
<?php if (has_post_thumbnail( $post->ID )): ?>			
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
   <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left" style="margin-left: -15px;
margin-top: -25px; margin-bottom:20px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=306&h=150&zc=1" /> </a>
<?php endif; ?>  
	
			

<?php if (has_post_thumbnail( $post->ID )): ?>
<?php else : ?>
<div style="margin-top:-10px;"></div>
<?php endif; ?>  
<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php
$tit = the_title('','',FALSE);
echo substr($tit, 0, 90);
if (strlen($tit) > 90) echo "…";
?></a></h4>

<div class="medium-post-meta">
<span> <?php
											printf( __( '<a href="%1$s" rel="bookmark"><time datetime="%2$s" pubdate>%3$s</time></a> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', t() ),
												get_permalink(),
												get_the_date( 'c' ),
												get_the_date(),
												get_author_posts_url( get_the_author_meta( 'ID' ) ),
												sprintf( esc_attr__( 'View all posts by %s', t() ), get_the_author() ),
												get_the_author()
											);
										?> | <?php comments_popup_link( __( 'Leave a comment', t() ), __( '1 Comment', t() ), __( '% Comments', t() ) ); ?></span> <?php edit_post_link(' - (Edit)'); ?>
</div>


<div class="entry-content">
                       <?php if (has_post_thumbnail( $post->ID )): ?>		
						<?php echo excerpt(38); ?>
						<?php else : ?>
						<?php echo excerpt(90); ?>
						<?php endif; ?>  
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><span class="page-link-meta">' . __( 'Pages:', t() ) . '</span>', 'after' => '</div>', 'next_or_number' => 'number' ) ); ?>
					</div><!-- .entry-content -->

	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">		
	<div class="read_more_button">
	<span>Read More</span> 
	</div>				
	</a>
	
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