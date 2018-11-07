<?php

/**
 * Youtube Video Widget Class
 */
class youtube_video extends WP_Widget {
	/** constructor */
	function youtube_video() {
		$widget_ops = array('classname' => 'youtube_video', 'description' => 'Display a YouTube video.');

		$control_ops = array('id_base' => 'youtube_video');

		$this->WP_Widget('youtube_video', 'SILVERLINE YouTube Video', $widget_ops, $control_ops);

		
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$id = apply_filters( 'id', $instance['id'] );
		$show = apply_filters( 'show', $instance['show'] );

	// start

       echo '<div class="widget-container-video">';
       echo $before_title .$title. $after_title;		
 ?>



<iframe class="video_shadow" width="293" height="164" src="http://www.youtube.com/embed/<?php echo $id ?>?rel=0&amp;&autohide=1" frameborder="0" allowfullscreen></iframe>

</div>
		<?php 

	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = strip_tags($new_instance['id']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$id = esc_attr( $instance[ 'id' ] );
			
		}
		else {
			$title = __( 'YouTube Video', 'text_domain' );
			$id = __( '0qX7ZsxD3Ik', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		
		<label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Video ID:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" />
		</p>
		
		<?php 
	}

} // class youtube_video



// register youtube_video widget
add_action( 'widgets_init', create_function( '', 'return register_widget("youtube_video");' ) );
