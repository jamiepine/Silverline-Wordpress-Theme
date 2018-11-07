<?php
/**
  * Recent_Posts widget class
  *
  */
class homepagetwocolumn extends WP_Widget {

    function homepagetwocolumn() {
        $widget_ops = array('classname' => 'homepage_two_column', 'description' => __( "Only for the homepage. One big post and 4 small posts, in two columns.") );
        $this->WP_Widget('silverline-homepage-two-column', __('SILVERLINE Homepage 2 Column'), $widget_ops);
        $this->alt_option_name = 'widget_homepage_two_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('homepage_two_column', 'widget');

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
       
       <div><?php if ( $title ) echo $before_title . $title . $after_title; ?></div>
       
      
     					
<ul class="homepage_two_column">


<?php while ($r->have_posts()) : $r->the_post(); ?>


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
						<?php echo excerpt(38); ?><?php if (has_post_thumbnail( $post->ID )): ?>		
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

<?php endwhile; wp_reset_query(); ?>

</ul>




			

			
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
        if ( isset($alloptions['widget_my_custom_recent_entries']) )
            delete_option('widget_my_custom_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_silverline_recent_posts', 'widget');
    }

    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $category = isset($instance['category']) ? esc_attr($instance['category']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
            $number = 4;
            
         
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

register_widget('homepagetwocolumn');