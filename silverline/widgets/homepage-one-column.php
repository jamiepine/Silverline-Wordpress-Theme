<?php
/**
  * Recent_Posts widget class
  *
  */
class homepageonecolumn extends WP_Widget {

    function homepageonecolumn() {
        $widget_ops = array('classname' => 'widget_onecolumn', 'description' => __( "The most recent posts from your blog or from any category with thumbnails.") );
        $this->WP_Widget('silverline-homepage-one-column', __('SILVERLINE Homepage 1 Column'), $widget_ops);
        $this->alt_option_name = 'widget_homepage_one_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_silverline_onecolumn', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( isset($cache[$args['widget_id']]) ) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

		 $title = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title'], $instance, $this->id_base);
        $category = apply_filters('category', empty($instance['category']) ? __('0') : $instance['category'], $instance, $this->id_base);
        if ( !$number = (int) $instance['number'] )
            $number = 10;
        else if ( $number < 1 )
            $number = 1;
        else if ( $number > 15 )
            $number = 15;
            
        

        $r = new WP_Query(array('showposts' => $number, 'cat' => $category, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'post_type' => array('post', 'custom-post-type')));
        if ($r->have_posts()) :
		
						
?>

 <div style="clear: both;" ><?php if ( $title ) echo $before_title . $title . $after_title; ?></div>
       
<?php  while ($r->have_posts()) : $r->the_post(); ?>

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
											<div class="loop_category">					
		<?php $category = get_the_category(); echo $category[0]->cat_name; ?>
	</div>		
					</header><!-- .entry-header -->
					


<?php if (has_post_thumbnail( $post->ID )): ?>
			
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
				
				<?php endwhile; wp_reset_query(); ?>
				
				
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_silverline_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['category'] = (int) $new_instance['category'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_onecolumn']) )
            delete_option('widget_onecolumn');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_silverline_recent_posts', 'widget');
    }

    function form( $instance ) {
    	$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $category = isset($instance['category']) ? esc_attr($instance['category']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
            $number = 5;
            
         
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
     
     	<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('From Category:'); ?></label>  

<?php        
    $id = $this->get_field_id('category');
    $name = $this->get_field_name('category');
    $value = $category;   
    $args = array(
    'show_option_all'   => 'All Categories',
    'orderby'            => 'ID', 
    'order'              => 'ASC',
    'show_count'         => 1,
    'echo'               => 1,
    'selected'           => $value,
    'hierarchical'       => 0, 
    'name'               => $name,
    'id'                 => $id, );
?>
<?php wp_dropdown_categories($args); ?>
</p>
 

<?php
    }
}

register_widget('homepageonecolumn');