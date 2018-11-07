<?php
/**
 * socialwidget Class
 */
class socialwidget extends WP_Widget {
	/** constructor */
	function socialwidget() {
		$widget_ops = array('classname' => 'socialwidget', 'description' => 'Show number of RSS subscribers, Twitter followers and Facebook fans.');

		$control_ops = array('id_base' => 'socialwidget');

		$this->WP_Widget('socialwidget', 'SILVERLINE Social Counter', $widget_ops, $control_ops);

		
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$twitterid = apply_filters( 'twittered', $instance['twitterid'] );
		echo('<div id="widget-container-social">');
		
		
		
		



 ?>
 
<div class="rss_sub">	
<a href="/feed/"><img class="rss_icon" src="<?php bloginfo('template_directory'); ?>/library/images/icons/rss.png" alt="rss" width="32px" height="32px" />
 <span align="left" class="sub-text">RSS<br/><i style="font-size:9pt; color:#999999;">Subscribe</i></span>
 </a>
</div>


<div class="twitter_counter">
<a href="http://twitter.com/<?php echo $twitterid ?>"><img class="twitter_counter_icon" src="<?php bloginfo('template_directory'); ?>/library/images/icons/twitter_32.png" alt="twitter" width="32px" height="32px" />
  <span align="left" class="sub-text"> <?php echo my_followers_count($twitterid);?><br/><i style="font-size:9pt; color:#999999; margin-top:-13px;">Followers</i></span>
</div>
</a>
<br/><br/></div>
		
		<?php 
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitterid'] = strip_tags($new_instance['twitterid']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$twitterid = esc_attr( $instance[ 'twitterid' ] );
		}
		else {
			$title = __( '', 'text_domain' );
		}
		?>
		<p>

		<label for="<?php echo $this->get_field_id('twitterid'); ?>"><?php _e('Twitter ID:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitterid'); ?>" name="<?php echo $this->get_field_name('twitterid'); ?>" type="text" value="<?php echo $twitterid; ?>" />
				</p>
		<?php 
	}

} // class socialwidget



// register socialwidget widget
add_action( 'widgets_init', create_function( '', 'return register_widget("socialwidget");' ) );