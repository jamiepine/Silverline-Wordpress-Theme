<?php

/**
 * large_ad Class
 */
class large_ad extends WP_Widget {
	/** constructor */
	function large_ad() {
		$widget_ops = array('classname' => 'large_ad', 'description' => 'One 250px by 250px ad.');

		$control_ops = array('id_base' => 'large_ad');

		$this->WP_Widget('large_ad', 'SILVERLINE Large Ad', $widget_ops, $control_ops);

		
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$ad_img = apply_filters( 'adone', $instance['ad_img'] );
		$ad_link = apply_filters( 'adone', $instance['ad_link'] );
		
		
		echo('<div id="widget-container-125">');
		
		echo $before_title .$title. $after_title;
 ?>

<div class="ad-box">
<center>
 <?php if ( $ad_img ) echo '<a href="'.$ad_link.'"><img class="box-container" style="margin-right:8px;"  src="'.$ad_img.'" width="250" height="250" /></a>'; ?>
 </center>
</div> 

</div>
		
		<?php 
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['ad_img'] = strip_tags($new_instance['ad_img']);
		$instance['ad_link'] = strip_tags($new_instance['ad_link']);
		

		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$ad_img = esc_attr( $instance[ 'ad_img' ] );
			$ad_link = esc_attr( $instance[ 'ad_link' ] );
			
					}
		else {
			$title = __( '', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		
		
		<h4>Ad One</h4>
		<label for="<?php echo $this->get_field_id('ad_img'); ?>"><?php _e('Image URL:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('ad_img'); ?>" name="<?php echo $this->get_field_name('ad_img'); ?>" type="text" value="<?php echo $ad_img; ?>" />
		<label for="<?php echo $this->get_field_id('ad_link'); ?>"><?php _e('AD Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('ad_link'); ?>" name="<?php echo $this->get_field_name('ad_link'); ?>" type="text" value="<?php echo $ad_link; ?>" />
		
	
				</p>
		<?php 
	}

} // class large_ad



// register large_ad widget
add_action( 'widgets_init', create_function( '', 'return register_widget("large_ad");' ) );