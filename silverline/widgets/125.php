<?php

/**
 * square_ad Class
 */
class square_ad extends WP_Widget {
	/** constructor */
	function square_ad() {
		$widget_ops = array('classname' => 'square_ad', 'description' => 'Up to 6 125px by 125px ads for your sidebar.');

		$control_ops = array('id_base' => 'square_ad');

		$this->WP_Widget('square_ad', 'SILVERLINE 125 Ad', $widget_ops, $control_ops);

		
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$adone_img = apply_filters( 'adone', $instance['adone_img'] );
		$adone_link = apply_filters( 'adone', $instance['adone_link'] );
		
		$adtwo_img = apply_filters( 'adtwo', $instance['adtwo_img'] );
		$adtwo_link = apply_filters( 'adtwo', $instance['adtwo_link'] );	
		
		$adthree_img = apply_filters( 'adthree', $instance['adthree_img'] );
		$adthree_link = apply_filters( 'adthree', $instance['adthree_link'] );
		
		$adfour_img = apply_filters( 'adfour', $instance['adfour_img'] );
		$adfour_link = apply_filters( 'adfour', $instance['adfour_link'] );
		
		$adfive_img = apply_filters( 'adfive', $instance['adfive_img'] );
		$adfive_link = apply_filters( 'adfive', $instance['adfive_link'] );
		
		$adsix_img = apply_filters( 'adsix', $instance['adsix_img'] );
		$adsix_link = apply_filters( 'adsix', $instance['adsix_link'] );
		
		
		echo('<div id="widget-container-125">');
		
		echo $before_title .$title. $after_title;
 ?>

<div class="ad-box">
<center>
 <?php if ( $adone_img ) echo '<a href="'.$adone_link.'"><img class="box-container" style="margin-right:8px;"  src="'.$adone_img.'" width="125" height="125" /></a>'; ?>
 <?php if ( $adtwo_img ) echo '<a href="'.$adtwo_link.'"><img class="box-container" src="'.$adtwo_img.'" width="125" height="125" /></a>'; ?><div style="clear:both;"></div>
 <?php if ( $adthree_img ) echo '<a href="'.$adthree_link.'"><img class="box-container small-ad-margin" style="margin-right:8px;" src="'.$adthree_img.'" width="125" height="125" /></a>'; ?>
 <?php if ( $adfour_img ) echo '<a href="'.$adfour_link.'"><img class="box-container small-ad-margin" src="'.$adfour_img.'" width="125" height="125" /></a>'; ?><div style="clear:both;"></div>
 <?php if ( $adfive_img ) echo '<a href="'.$adfive_link.'"><img class="box-container small-ad-margin" style="margin-right:8px;" src="'.$adfive_img.'" width="125" height="125" /></a>'; ?>
 <?php if ( $adsix_img ) echo '<a href="'.$adsix_link.'"><img class="box-container small-ad-margin" src="'.$adsix_img.'" width="125" height="125" /></a>'; ?>
 </center>
</div> 

</div>
		
		<?php 
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['adone_img'] = strip_tags($new_instance['adone_img']);
		$instance['adone_link'] = strip_tags($new_instance['adone_link']);
		
		$instance['adtwo_img'] = strip_tags($new_instance['adtwo_img']);
		$instance['adtwo_link'] = strip_tags($new_instance['adtwo_link']);
		
		$instance['adthree_img'] = strip_tags($new_instance['adthree_img']);
		$instance['adthree_link'] = strip_tags($new_instance['adthree_link']);
		
		$instance['adfour_img'] = strip_tags($new_instance['adfour_img']);
		$instance['adfour_link'] = strip_tags($new_instance['adfour_link']);
		
		$instance['adfive_img'] = strip_tags($new_instance['adfive_img']);
		$instance['adfive_link'] = strip_tags($new_instance['adfive_link']);
		
		$instance['adsix_img'] = strip_tags($new_instance['adsix_img']);
		$instance['adsix_link'] = strip_tags($new_instance['adsix_link']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$adone_img = esc_attr( $instance[ 'adone_img' ] );
			$adone_link = esc_attr( $instance[ 'adone_link' ] );
			
			$adtwo_img = esc_attr( $instance[ 'adtwo_img' ] );
			$adtwo_link = esc_attr( $instance[ 'adtwo_link' ] );
			
			$adthree_img = esc_attr( $instance[ 'adthree_img' ] );
			$adthree_link = esc_attr( $instance[ 'adthree_link' ] );
			
			$adfour_img = esc_attr( $instance[ 'adfour_img' ] );
			$adfour_link = esc_attr( $instance[ 'adfour_link' ] );
			
			$adfive_img = esc_attr( $instance[ 'adfive_img' ] );
			$adfive_link = esc_attr( $instance[ 'adfive_link' ] );
			
			$adsix_img = esc_attr( $instance[ 'adsix_img' ] );
			$adsix_link = esc_attr( $instance[ 'adsix_link' ] );
		}
		else {
			$title = __( '', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		
		
		<h4>Ad One</h4>
		<label for="<?php echo $this->get_field_id('adone_img'); ?>"><?php _e('Image URL:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adone_img'); ?>" name="<?php echo $this->get_field_name('adone_img'); ?>" type="text" value="<?php echo $adone_img; ?>" />
		<label for="<?php echo $this->get_field_id('adone_link'); ?>"><?php _e('AD Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adone_link'); ?>" name="<?php echo $this->get_field_name('adone_link'); ?>" type="text" value="<?php echo $adone_link; ?>" />
		
		<h4>Ad Two</h4>
		<label for="<?php echo $this->get_field_id('adtwo_img'); ?>"><?php _e('Image URL:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adtwo_img'); ?>" name="<?php echo $this->get_field_name('adtwo_img'); ?>" type="text" value="<?php echo $adtwo_img; ?>" />
		<label for="<?php echo $this->get_field_id('adtwo_link'); ?>"><?php _e('AD Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adtwo_link'); ?>" name="<?php echo $this->get_field_name('adtwo_link'); ?>" type="text" value="<?php echo $adtwo_link; ?>" />
		
		<h4>Ad Three</h4>
		<label for="<?php echo $this->get_field_id('adthree_img'); ?>"><?php _e('Image URL:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adthree_img'); ?>" name="<?php echo $this->get_field_name('adthree_img'); ?>" type="text" value="<?php echo $adthree_img; ?>" />
		<label for="<?php echo $this->get_field_id('adthree_link'); ?>"><?php _e('AD Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adthree_link'); ?>" name="<?php echo $this->get_field_name('adthree_link'); ?>" type="text" value="<?php echo $adthree_link; ?>" />
		
		<h4>Ad Four</h4>
		<label for="<?php echo $this->get_field_id('adfour_img'); ?>"><?php _e('Image URL:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adfour_img'); ?>" name="<?php echo $this->get_field_name('adfour_img'); ?>" type="text" value="<?php echo $adfour_img; ?>" />
		<label for="<?php echo $this->get_field_id('adfour_link'); ?>"><?php _e('AD Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adfour_link'); ?>" name="<?php echo $this->get_field_name('adfour_link'); ?>" type="text" value="<?php echo $adfour_link; ?>" />
		
		<h4>Ad Five</h4>
		<label for="<?php echo $this->get_field_id('adfive_img'); ?>"><?php _e('Image URL:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adfive_img'); ?>" name="<?php echo $this->get_field_name('adfive_img'); ?>" type="text" value="<?php echo $adfive_img; ?>" />
		<label for="<?php echo $this->get_field_id('adfive_link'); ?>"><?php _e('AD Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adfive_link'); ?>" name="<?php echo $this->get_field_name('adfive_link'); ?>" type="text" value="<?php echo $adfive_link; ?>" />
		
		<h4>Ad Six</h4>
		<label for="<?php echo $this->get_field_id('adsix_img'); ?>"><?php _e('Image URL::'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adsix_img'); ?>" name="<?php echo $this->get_field_name('adsix_img'); ?>" type="text" value="<?php echo $adsix_img; ?>" />
		<label for="<?php echo $this->get_field_id('adsix_link'); ?>"><?php _e('AD Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('adsix_link'); ?>" name="<?php echo $this->get_field_name('adsix_link'); ?>" type="text" value="<?php echo $adsix_link; ?>" />
				</p>
		<?php 
	}

} // class square_ad



// register square_ad widget
add_action( 'widgets_init', create_function( '', 'return register_widget("square_ad");' ) );