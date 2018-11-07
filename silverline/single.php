<?php
/**
 * WordPress Template: Single
 */

get_template_part( 'header' ); ?>

				<div style="width:653px;" class="column-8 ">
				
				<div id="content">

					<?php do_action( 'content_open' ); ?>

					<?php if ( have_posts() ) : the_post(); ?>

						<?php do_action( 'loop_open' ); ?>

						<div class="hfeed">

							<?php do_action( 'hfeed_open' ); ?>
							
					<header style="overflow:hidden;" class="entry-header">
						
						
						
					</header><!-- .entry-header -->


							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
								<?php if (has_post_thumbnail( $post->ID )): ?>
								<div class="page_thumb_shadow"></div>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
  										 <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left"  class="single-image" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=651&h=265&zc=100" /></a> 
  										 
<?php endif; ?>  

					 <div style="clear:both"></div>
								
<?php if (has_post_thumbnail( $post->ID )): ?>								
<div style="margin-bottom:30px;"></div>
<?php else : ?>
<style type="text/css"> 
.single-meta-facebook {
top:40px;
}
.single-meta-twitter {
top:70px;
}
</style>
<?php endif; ?> 
						<div class="single-meta-facebook">								
							<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;
width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;">
							</iframe>
						</div><!-- .single-meta-facebook -->

						<div class="single-meta-twitter">	
								<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
   									<a href="http://twitter.com/share" class="twitter-share-button"
     								data-url="<?php the_permalink(); ?>"
        							data-via="wpbeginner"
        							data-text="<?php the_title(); ?>"
       							    data-related="syedbalkhi:Founder of WPBeginner"
       							    data-count="horizontal">Tweet</a>   
 						</div><!-- .single-meta-twitter -->   

								<h1 class="entry-title-header"><?php the_title(); ?></h1>
								
								
											<div class="single-entry-meta">
										<?php
											printf( __( '<span class="sep">Posted on </span><a href="%1$s" rs="bookmark"><time datetime="%2$s" pubdate>%3$s</time></a> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', t() ),
												get_permalink(),
												get_the_date( 'c' ),
												get_the_date(),
												get_author_posts_url( get_the_author_meta( 'ID' ) ),
												sprintf( esc_attr__( 'View all posts by %s', t() ), get_the_author() ),
												get_the_author()
											);
										?>
		
									
									<span style="color:#979797;">| <?php comments_popup_link( __( 'Leave a comment', t() ), __( '1 Comment', t() ), __( '% Comments', t() ) ); ?></span>  <?php edit_post_link(' - (Edit)'); ?>
									
									
								 </div>	
								<hr>
								
 									
								<div class="entry-content">
									<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', t() ) ); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-link"><span class="page-link-meta">' . __( 'Pages:', t() ) . '</span>', 'after' => '</div>', 'next_or_number' => 'number' ) ); ?>
								</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->							

<div style="clear:both;"></div>

<div class="artical-footer"></div>

<?php if( has_tag()): ?>

								
<div class="tags_container">								
<span class="single-tags-lable">Tagged:</span>							
<ul class="single-tags">

<?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
  echo('<li><a href="'. get_tag_link($tag) .'">');
    echo $tag->name . ' '; 
    echo('</li></a>');
  }
}
?>

</ul>
</div>
							
<!-- RELATED POSTS-->
<div class="related_container">
<h2 class="related-posts-title">Related Posts</h2>
<h4 class="related-posts-desc">Check out other posts related to this topic below.</h4>	

<ul style="margin-bottom:232px;" class="related_posts">					
							<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
$temp = $post;
if ($tags) {
  $first_tag = $tags[0]->term_id;
  $args=array(
    'tag__in' => array($first_tag),
    'post__not_in' => array($post->ID),
    'showposts'=>6,
    'caller_get_posts'=>1
   );
  $my_query = new WP_Query($args);
  if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
    

    <li>
  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">  
        <img class="thumbnail_image" style="margin-right:10px;" align="left" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php if (has_post_thumbnail()) { 
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_name'); echo $thumb[0]; // thumbnail url
} ?>&w=62&h=62&zc=1" />

        <span class="related_posts_title" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
 <?php
$tit = the_title('','',FALSE);
echo substr($tit, 0, 30);
if (strlen($tit) > 25) echo "";
?>

</span>
        <span class="related_posts_date"><p><?php the_time('F j, Y'); ?>  </p></span>
    </a>
</li>  

      
      <?php
      wp_reset_query(); $post = $temp;
    endwhile;
  }
}
?>
</ul>
</div>
<!-- END RELATED POSTS-->

<?php else : ?>
<?php endif; ?> 

<!-- AUTHOR -->
<div class="author_container">






<div class="author_box">

				<div  id="author_avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 75 ) ); ?>
					</div><!-- #author-avatar -->
					<div id="author-meta">
						<h3><?php printf( __( '%s', 'twentyeleven' ), get_the_author() ); ?> - Post Author</h3>
						
						

						
					</div><!-- #author-description	-->
<div class="author-description">
						<?php the_author_meta( 'description' ); ?>
						<br/>
						<div style="font-weight:bold; padding-top:10px;"><a href=""><?php  printf( __( 'More posts from %s &raquo;', 'twentyeleven' ), get_the_author() ); ?></a></div>
						</div>
</div>


					
</div>
<!-- Author -->


<div class="share_container">
<span class="single-share-lable">Share This Post </span>	

<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/facebook_32.png" alt="Share this post on Facebook" /></a>
<a href="http://twitthis.com/twit?url=<?php echo get_permalink(); ?>" title="Share this post on Twitter"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/twitter_32.png" alt="Share this post on Twitter" /></a>
<a href="http://google.com/bookmarks/mark?op=edit&bkmk=<?php echo get_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Share this post on Google"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/google_32.png" alt="Share this post on Google" /></a>
<a href="http://del.icio.us/post?url=<?php echo get_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Share this post on Delicious"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/delicious_32.png" alt="Share this post on Delicious" /></a>
<a href="http://www.stumbleupon.com/submit?url=<?php echo get_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Share this post on StumbleUpon"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/stumbleupon_32.png" alt="Share this post on StumbleUpon" /></a>
<a href="http://digg.com/submit?phase=2?url=<?php echo get_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Share this post on Digg"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/digg_32.png" alt="Share this post on Digg" /></a>
<a href="http://technorati.com/faves?add=<?php echo get_permalink(); ?>" title="Share this post on Technorati"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/technorati_32.png" alt="Share this post on Technorati" /></a>
<a href="http://newsvine.com/_tools/seed&save?u=<?php echo get_permalink(); ?>&amp;h=<?php the_title(); ?>" title="Share this post on ShareThis"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/newsvine_32.png" alt="Share this post on NewsVine" /></a>
<a href="http://reddit.com/submit?url=<?php echo get_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Share this post on Reddit"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/reddit_32.png" alt="Share this post on Reddit" /></a>
<a href="http://linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Share this post on LinkedIn"><img src="<?php bloginfo('template_directory'); ?>/library/images/icons/linkedin_32.png" alt="Share this post on LinkedIn" /></a>
</div>	





							<?php comments_template( '', true ); ?>
							<div style="margin-bottom:-40px;"></div>

							

							<?php do_action( 'hfeed_close' ); ?>

						</div><!-- .hfeed -->

						<?php do_action( 'loop_close' ); ?>

					<?php else : ?>

						<?php get_template_part( 'loop-404' ); ?>

					<?php endif; ?>

					<?php do_action( 'content_close' ); ?>

				</div><!-- #content -->
				</div>
				<?php get_template_part( 'sidebar-page' ); ?>

<?php get_template_part( 'footer' ); ?>