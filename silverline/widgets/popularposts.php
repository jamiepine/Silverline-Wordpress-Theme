<?php
/**
  * Recent_Posts widget class
  *
  */
class WP_widget_silverline_popular_posts extends WP_Widget {

    function WP_widget_silverline_popular_posts() {
        $widget_ops = array('classname' => 'widget_my_custom_recent_entries', 'description' => __( "The most popular posts from any category based on comment count.") );
        $this->WP_Widget('popular-posts', __('SILVERLINE Popular Posts'), $widget_ops);
        $this->alt_option_name = 'widget_my_custom_recent_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_silverline_popular_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( isset($cache[$args['widget_id']]) ) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Posts') : $instance['title'], $instance, $this->id_base);
        $category = apply_filters('category', empty($instance['category']) ? __('0') : $instance['category'], $instance, $this->id_base);
        if ( !$number = (int) $instance['number'] )
            $number = 10;
        else if ( $number < 1 )
            $number = 1;
        else if ( $number > 15 )
            $number = 15;
            
        

        $r = new WP_Query(array('orderby' => 'comment_count','showposts' => $number, 'cat' => $category, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'post_type' => array('post', 'custom-post-type')));
        if ($r->have_posts()) :
?>
        <?php echo $before_widget; ?>
        <div class="recent_posts_widget">
       <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul class="widget_ul">
        <?php  while ($r->have_posts()) : $r->the_post(); ?>
        
        <li style="margin-bottom:10px;">
 
    <?php if (has_post_thumbnail()): ?>	
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ‘full’ ); ?>		
   			<a class="recent_posts_list" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img class="thumbnail_image" style="margin-right:10px;" align="left" src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php echo $image[0]; ?>&w=62&h=62&zc=1" />
  		<?php else : ?>
 <a class="recent_posts_list" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', t() ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img class="thumbnail_image" style="margin-right:10px;" align="left"  src="<?php bloginfo('template_directory'); ?>/library/js/timthumb.php?src=<?php bloginfo('template_directory'); ?>/library/images/no-post-image.png&w=62&h=62&zc=1" />
	<?php endif; ?> 

        <span class="recent_posts_widget_info" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php
$tit = the_title('','',FALSE);
echo substr($tit, 0, 45);
if (strlen($tit) > 30) echo "";
?></span></a>
        <span class="recent_posts_widget_date"><p><?php the_time('F j, Y'); ?></p></span>

        </li>
        
        <?php endwhile; ?>
        </ul>
        
        </div>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_silverline_popular_posts', $cache, 'widget');
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
        wp_cache_delete('widget_silverline_popular_posts', 'widget');
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

register_widget('WP_widget_silverline_popular_posts');