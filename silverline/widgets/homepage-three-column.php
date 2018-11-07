<?php
/**
  * Recent_Posts widget class
  *
  */
class homepagethreecolumn extends WP_Widget {

    function homepagethreecolumn() {
        $widget_ops = array('classname' => 'homepage_three_column', 'description' => __( "Only for the homepage. One big post and 4 small posts, in three columns.") );
        $this->WP_Widget('silverline-homepage-three-column', __('SILVERLINE Homepage 3 Column'), $widget_ops);
        $this->alt_option_name = 'widget_homepage_three_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('homepage_three_column', 'widget');

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
            
        $r = new WP_Query(array('showposts' => 5, 'cat' => $category, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'post_type' => array('post', 'custom-post-type')));
        if ($r->have_posts()) :
		
						
?>
       
       <div style="clear: both;" ><?php if ( $title ) echo $before_title . $title . $after_title; ?></div>
       
      
     					
<ul style="clear: both; position:relative; height:520px;" class="homepage_three_column">


<?php $counter = 1;  while ($r->have_posts()) : $r->the_post(); ?>

<?php
						$big_count = round(4 / 4);
						if(!$big_count) { $big_count = 1; }
						?>

<?php if($counter <= $big_count): ?>

<li style="padding: 30px 20px; margin-right:17px; margin-top:-14px; height:470px;" id="content" class="column-3">
<div style="margin-left: -110px; margin-top:-40px;" class="meta-container">	
<div class="date-container">
<div class="day"><?php the_time('d'); ?></div>
<div class="month"><?php the_time('M'); ?></div>
<div class="year"><?php the_time('Y'); ?></div>
</div>
</div>		

<?php if (has_post_thumbnail( $post->ID )): ?>			
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
   <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left" class="loop_post_image" style="margin-left: -15px;
margin-top: -25px; margin-bottom:20px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=252&h=150&zc=1" /> </a>
 <?php else : ?>
 <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left" class="loop_post_image" style="margin-left: -15px;
margin-top: -25px; margin-bottom:20px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php bloginfo('template_directory'); ?>/library/images/no-post-image.png&w=252&h=150&zc=1" /></a>
<?php endif; ?> 
 
<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php
$tit = the_title('','',FALSE);
echo substr($tit, 0, 30);
if (strlen($tit) > 30) echo "…";
?></a></h2>

<div class="medium-post-meta">
<?php printf( __( '<a href="%1$s" rel="bookmark"><time datetime="%2$s" pubdate>%3$s</time></a>', t() ),
get_permalink(),
get_the_date( 'c' ),
get_the_date()	
); ?>
</div>

<div class="entry-content">
						<?php echo excerpt(40); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><span class="page-link-meta">' . __( 'Pages:', t() ) . '</span>', 'after' => '</div>', 'next_or_number' => 'number' ) ); ?>
					</div><!-- .entry-content -->
					
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<div align="right" class="read_more_button_2">
					<span>Read More</span> 
					</div>
					</a>



<?php else: ?>



<li id="content" class="three_column_content">
	
					
<?php if (has_post_thumbnail( $post->ID )): ?>			
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>
   <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left" class="loop_post_image" style="margin-left:-10px; margin-top:-15px; margin-bottom:10px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=166&h=130&zc=1" /></a> 
<?php else : ?>
  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img align="left" class="loop_post_image" style="margin-left:-10px; margin-top:-15px; margin-bottom:10px;" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php bloginfo('template_directory'); ?>/library/images/no-post-image.png&w=166&h=130&zc=1" /></a>
<?php endif; ?>  
 
 
	<h2 style="margin-top: 128px;" class="column_title">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php
			$tit = the_title('','',FALSE);
			echo substr($tit, 0, 30);
			if (strlen($tit) > 30) echo "…";
			?>
		</a>
	</h2>

						

<div style="position:absolute; margin-top:171px;" class="medium-post-meta">
<?php printf( __( '<a href="%1$s" rel="bookmark"><time datetime="%2$s" pubdate>%3$s</time></a>', t() ),
get_permalink(),
get_the_date( 'c' ),
get_the_date()	
); ?>
</div>

	<a href="<?php the_permalink(); ?>">					
	<div style="margin-top:79px; width:100%;" class="read_more_button_3">
	<span>Read More</span> 
	</div>					
	</a>					

				

<?php endif; ?>
</li>

<?php $counter++; endwhile; wp_reset_query(); ?>
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
            $number = 5;
            
         
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
     
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

register_widget('homepagethreecolumn');