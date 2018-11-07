<?php
/**
 * Custom Template: Loop
 */

if ( have_posts() ) : ?>



	<?php do_action( 'loop_open' ); ?>

		<div class="hfeed">

			<?php do_action( 'hfeed_open' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php do_action( 'loop_while_before' ); ?>
				
				

<div class="meta-container">
		
<div class="date-container">
<div class="day"><?php the_time('d'); ?></div>
<div class="month"><?php the_time('M'); ?></div>
<div class="year"><?php the_time('Y'); ?></div>
</div>

</div>			

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="content-frame">	
<div id="content" class="column-loop">
					<header class="entry-header">
	
					</header><!-- .entry-header -->
					


<?php if (has_post_thumbnail( $post->ID )): ?>

	<div class="loop_category">					
		<?php $category = get_the_category(); echo $category[0]->cat_name; ?>
	</div>	
	

	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
   		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left" style="margin-left:-30px; margin-top:-31px; margin-bottom:20px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=650&h=200&zc=1" /></a> 
<?php endif; ?>  
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="entry-content">
						<?php echo excerpt(47); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><span class="page-link-meta">' . __( 'Pages:', t() ) . '</span>', 'after' => '</div>', 'next_or_number' => 'number' ) ); ?>
					</div><!-- .entry-content --><a class="read-more-loop" href="<?php the_permalink(); ?>" >Continue reading &raquo;</a>
					
		<footer class="entry-date">
					<?php
								printf( __( '<span class="sep">Posted on </span><a href="%1$s" rel="bookmark"><time class="" datetime="%2$s" pubdate>%3$s</time></a> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'toolbox' ),
									get_permalink(),
									get_the_date( 'c' ),
									get_the_date(),
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', t() ), get_the_author() ),
									get_the_author()
								);
							?>&nbsp;
						<div class="meta-left">
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', t() ), __( '1 Comment', t() ), __( '% Comments', t() ) ); ?></span>
						<?php edit_post_link( __( 'Edit', t() ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
						</div>
					</footer><!-- .entry-meta -->


	</div><!-- #content -->	
</div>	<!-- content -->



				</article><!-- #post-<?php the_ID(); ?> -->

				<?php do_action( 'loop_while_after' ); ?>

			<?php endwhile; ?>
<div class="light">
			<?php get_template_part( 'pagination' ); ?>
</div>
			<?php do_action( 'hfeed_close' ); ?>

		</div><!-- .hfeed -->

	<?php do_action( 'loop_close' ); ?>

<?php else : ?>

	<?php get_template_part( 'loop-404' ); ?>

<?php endif; ?>