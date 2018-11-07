<?php

/**
 * twitter_show Class
 */
class twitter_show extends WP_Widget {
	/** constructor */
	function twitter_show() {
		$widget_ops = array('classname' => 'twitter_show', 'description' => 'Twitter update list.');

		$control_ops = array('id_base' => 'twitter_show');

		$this->WP_Widget('twitter_show', 'SILVERLINE Twitter', $widget_ops, $control_ops);

		
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$username = apply_filters( 'username', $instance['username'] );
		$show = apply_filters( 'show', $instance['show'] );

		
		    // Output
		echo ('<div id="widget-container-twitter">');

		// start
		echo '<div class="twitter_show">';
		echo '<h3 class="widget-title-twitter">'
              .$title;
        echo '</h3>';
		echo '<ul id="twitter_update_list"></ul></div>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$username.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';
		 
		

		// echo widget closing tag
		echo ('</div>');
 ?>

 
		
		<?php 
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['show'] = strip_tags($new_instance['show']);

		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$username = esc_attr( $instance[ 'username' ] );
			$show = esc_attr( $instance[ 'show' ] );
			
		}
		else {
			$title = __( 'Twitter Updates', 'text_domain' );
			$show = __( '5', 'number_domain' );
			$username = __( 'envato', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		
		<h4>Username</h4>
		<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('show'); ?>"><?php _e('Number of updates to show:'); ?></label>
		<input size="3" id="<?php echo $this->get_field_id('show'); ?>" name="<?php echo $this->get_field_name('show'); ?>" type="text" value="<?php echo $show; ?>" />
						</p>
		<?php 
	}

} // class twitter_show



// register twitter_show widget
add_action( 'widgets_init', create_function( '', 'return register_widget("twitter_show");' ) );
