<?php

class FacebookLikeBoxWidget extends WP_Widget
{
	/**
	* Declares the FacebookLikeBoxWidget class.
	*
	*/
	function FacebookLikeBoxWidget(){
		$widget_ops = array('classname' => 'widget_FacebookLikeBox', 'description' => __( "A small Facebook like box for your Facebook page.") );
		$control_ops = array('width' => 300, 'height' => 300);
		$this->WP_Widget('FacebookLikeBox', __('SILVERLINE Facebook Like Box'), $widget_ops, $control_ops);
	}
	
	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		
		$pluginDisplayType = empty($instance['pluginDisplayType']) ? 'like_box' : $instance['pluginDisplayType'];
		$layoutMode = empty($instance['layoutMode']) ? 'iframe' : $instance['layoutMode'];
                //example of Page URL : http://www.facebook.com/envato
		$pageURL = empty($instance['pageURL']) ? '' : $instance['pageURL'];
		$fblike_button_style = empty($instance['fblike_button_style']) ? 'standard' : $instance['fblike_button_style'];
		$fblike_button_showFaces = empty($instance['fblike_button_showFaces']) ? 'no' : $instance['fblike_button_showFaces'];
		$fblike_button_verb_to_display = empty($instance['fblike_button_verb_to_display']) ? 'recommend' : $instance['fblike_button_verb_to_display'];
		$fblike_button_font = empty($instance['fblike_button_font']) ? 'lucida grande' : $instance['fblike_button_font'];
		$fblike_button_width = empty($instance['fblike_button_width']) ? '292' : $instance['fblike_button_width'];
		$fblike_button_colorScheme = empty($instance['fblike_button_colorScheme']) ? 'light' : $instance['fblike_button_colorScheme'];
		
		//example of Page ID : 123456789987
		$pageID = empty($instance['pageID']) ? '' : $instance['pageID'];
		$connection = empty($instance['connection']) ? '10' : $instance['connection'];
		$width = empty($instance['width']) ? '272' : $instance['width'];
		$height = empty($instance['height']) ? '332' : $instance['height'];
		$streams = empty($instance['streams']) ? 'no' : $instance['streams'];
		$colorScheme = empty($instance['colorScheme']) ? 'light' : $instance['colorScheme'];
		$borderColor = empty($instance['borderColor']) ? 'AAAAAA' : $instance['borderColor'];
		$showFaces = empty($instance['showFaces']) ? 'yes' : $instance['showFaces'];
		$header = empty($instance['header']) ? 'no' : $instance['header'];
		$creditOn = empty($instance['creditOn']) ? 'yes' : $instance['creditOn'];
		$sharePlugin = "http://vivociti.com";
		
		if ($fblike_button_showFaces == "yes") {
			$fblike_button_showFaces == "true";			
		} else {
			$fblike_button_showFaces == "false";
		}		
		if ($showFaces == "yes") {
			$showFaces = "true";			
		} else {
			$showFaces = "false";
		}
		if ($streams == "yes") {
			$streams = "true";
			$height = $height + 300;
		} else {
			$streams = "false";
		}
		if ($header == "yes") {
			$header = "true";
			$height = $height + 32;
		} else {
			$header = "false";
		}

		# Before the widget
		echo $before_widget;
		
		# The title
		if ( $title )
			echo $before_title . $title . $after_title;
		
		//this is to check for backward compatibility, previous version all is using Page ID instead of Page URL
		//If Page URL is filled, we will use it
		$isUsingPageURL = false;
		if (strlen($pageURL) > 23) {	
			$isUsingPageURL = true;  //flag to be used for backward
			$like_box_iframe = "<div id=\"likebox-frame\" style=\"margin-left:-20px; margin-top:-23px;\"><iframe src=\"http://www.facebook.com/plugins/likebox.php?href=$pageURL&amp;width=$width&amp;colorscheme=$colorScheme&amp;border_color=$borderColor&amp;show_faces=$showFaces&amp;connections=$connection&amp;stream=$streams&amp;header=$header&amp;height=$height\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:" . $width . "px; height:" . $height . "px;\" allowTransparency=\"true\"></iframe></div>";
			$like_box_xfbml = "<script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like-box href=\"$pageURL\" width=\"$width\" show_faces=\"$showFaces\" border_color=\"$borderColor\" stream=\"$streams\" header=\"$header\"></fb:like-box>";
		} else {
			$like_box_iframe = "<iframe src=\"http://www.facebook.com/plugins/likebox.php?id=$pageID&amp;width=$width&amp;colorscheme=$colorScheme&amp;border_color=$borderColor&amp;show_faces=$showFaces&amp;connections=$connection&amp;stream=$streams&amp;header=$header&amp;height=$height\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:" . $width . "px; height:" . $height . "px;\" allowTransparency=\"true\"></iframe>";
			$like_box_xfbml = "<script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like-box id=\"$pageID\" width=\"$width\" show_faces=\"$showFaces\" border_color=\"$borderColor\" stream=\"$streams\" header=\"$header\"></fb:like-box>";		
		}
		$like_button_xfbml  = "<script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like layout=\"$fblike_button_style\" show_faces=\"$fblike_button_showFaces\" width=\"$fblike_button_width\" action=\"$fblike_button_verb_to_display\" font=\"$fblike_button_font\" colorscheme=\"$fblike_button_colorScheme\"></fb:like>";
		$html = ""; 
		$img_live_dir = '';
		$html = ""; 

		switch ($pluginDisplayType) {
			case 'like_box' :
				if (strcmp($layoutMode, "iframe") == 0) {
					$renderedHTML = $like_box_iframe;
				} else {
					$renderedHTML = $like_box_xfbml;
				}
				break;
			case 'like_button' :
				$renderedHTML = $like_button_xfbml;
				break;
			case 'both':
				if (strcmp($layoutMode, "iframe") == 0) {
					$renderedHTML = $like_box_iframe;
				} else {
					$renderedHTML = $like_box_xfbml;
				}
				$renderedHTML = $renderedHTML . "\n" . $like_button_xfbml;
				break;
		}
		echo $renderedHTML;
		
	if ($creditOn == "yes") {
            echo $html;
        }
	
	//end of creditOn is yes

		# After the widget
		echo $after_widget;
	}
	
	/**
	* Saves the widgets settings.
	*
	*/
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['pageID'] = strip_tags(stripslashes($new_instance['pageID']));
		$instance['connection'] = strip_tags(stripslashes($new_instance['connection']));
		$instance['width'] = strip_tags(stripslashes($new_instance['width']));
		$instance['height'] = strip_tags(stripslashes($new_instance['height']));
		$instance['creditOn'] = strip_tags(stripslashes($new_instance['creditOn']));
		$instance['header'] = strip_tags(stripslashes($new_instance['header']));
		$instance['streams'] = strip_tags(stripslashes($new_instance['streams']));   //thanks to : Krzysztof Piech <chrisx29a@gmail.com>
		$instance['colorScheme'] = strip_tags(stripslashes($new_instance['colorScheme']));
		$instance['borderColor'] = strip_tags(stripslashes($new_instance['borderColor']));
		$instance['showFaces'] = strip_tags(stripslashes($new_instance['showFaces']));
		
		$instance['pluginDisplayType'] = strip_tags(stripslashes($new_instance['pluginDisplayType']));
		$instance['layoutMode'] = strip_tags(stripslashes($new_instance['layoutMode']));
		$instance['pageURL'] = strip_tags(stripslashes($new_instance['pageURL']));
		$instance['fblike_button_style'] = strip_tags(stripslashes($new_instance['fblike_button_style']));
		$instance['fblike_button_showFaces'] = strip_tags(stripslashes($new_instance['fblike_button_showFaces']));
		$instance['fblike_button_verb_to_display'] = strip_tags(stripslashes($new_instance['fblike_button_verb_to_display']));
		$instance['fblike_button_font'] = strip_tags(stripslashes($new_instance['fblike_button_font']));
		$instance['fblike_button_width'] = strip_tags(stripslashes($new_instance['fblike_button_width']));
		$instance['fblike_button_colorScheme'] = strip_tags(stripslashes($new_instance['fblike_button_colorScheme']));
		
		return $instance;
	}
	
	/**
	* Creates the edit form for the widget.
	*
	*/
	function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'', 'pageID'=>'', 'height'=>'255', 'width'=>'310', 'connection'=>'10', 'streams'=>'yes', 'colorScheme'=>'light', 'showFaces'=>'yes', 'borderColor'=>'AAAAAA','header'=>'yes', 'creditOn'=>'yes', 'pluginDisplayType'=>'like_box', 'layoutMode'=>'iframe', 'pageURL'=>'http://www.facebook.com/envato', 'fblike_button_style'=>'standard', 'fblike_button_showFaces'=>'false','fblike_button_verb_to_display'=>'recommend','fblike_button_font'=>'arial', 'fblike_button_width'=>'292','fblike_button_colorScheme'=>'light') );
		
		
		$title = htmlspecialchars($instance['title']);		
		$pluginDisplayType = empty($instance['pluginDisplayType']) ? 'like_box' : $instance['pluginDisplayType'];
		$layoutMode = empty($instance['layoutMode']) ? 'iframe' : $instance['layoutMode'];
		$pageURL = empty($instance['pageURL']) ? 'http://www.facebook.com/pages/...' : $instance['pageURL'];
		$fblike_button_style = empty($instance['fblike_button_style']) ? 'standard' : $instance['fblike_button_style'];
		$fblike_button_showFaces = empty($instance['fblike_button_showFaces']) ? 'no' : $instance['fblike_button_showFaces'];
		$fblike_button_verb_to_display = empty($instance['fblike_button_verb_to_display']) ? 'recommend' : $instance['fblike_button_verb_to_display'];
		$fblike_button_font = empty($instance['fblike_button_font']) ? 'lucida grande' : $instance['fblike_button_font'];
		$fblike_button_width = empty($instance['fblike_button_width']) ? '292' : $instance['fblike_button_width'];
		$fblike_button_colorScheme = empty($instance['fblike_button_colorScheme']) ? 'light' : $instance['fblike_button_colorScheme'];		
		$pageID = empty($instance['pageID']) ? '' : $instance['pageID'];
		$connection = empty($instance['connection']) ? '10' : $instance['connection'];
		$width = empty($instance['width']) ? '282' : $instance['width'];
		$height = empty($instance['height']) ? '255' : $instance['height'];
		$streams = empty($instance['streams']) ? 'no' : $instance['streams'];
		$colorScheme = empty($instance['colorScheme']) ? 'yes' : $instance['colorScheme'];
		$borderColor = empty($instance['borderColor']) ? 'AAAAAA' : $instance['borderColor'];
		$showFaces = empty($instance['showFaces']) ? 'yes' : $instance['showFaces'];
		$header = empty($instance['header']) ? 'yes' : $instance['header'];
		$creditOn = empty($instance['creditOn']) ? 'yes' : $instance['creditOn'];
		$sharePlugin = "http://vivociti.com";
		
		$pageID = htmlspecialchars($instance['pageID']);
		$connection = htmlspecialchars($instance['connection']);
		$streams = htmlspecialchars($instance['streams']);
		$colorScheme = htmlspecialchars($instance['colorScheme']);
		$borderColor = htmlspecialchars($instance['borderColor']);
		$showFaces = htmlspecialchars($instance['showFaces']);
		$header = htmlspecialchars($instance['header']);
		$creditOn = htmlspecialchars($instance['creditOn']);
		
		$pluginDisplayType = htmlspecialchars($instance['pluginDisplayType']);
		$layoutMode = htmlspecialchars($instance['layoutMode']);
		$pageURL = htmlspecialchars($instance['pageURL']);
		$fblike_button_style = htmlspecialchars($instance['fblike_button_style']);
		$fblike_button_showFaces = htmlspecialchars($instance['fblike_button_showFaces']);
		$fblike_button_verb_to_display = htmlspecialchars($instance['fblike_button_verb_to_display']);
		$fblike_button_font = htmlspecialchars($instance['fblike_button_font']);
		$fblike_button_width = htmlspecialchars($instance['fblike_button_width']);
		$fblike_button_colorScheme = htmlspecialchars($instance['fblike_button_colorScheme']);
		
		
				
		# Output the options
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title:') . ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
		
				echo '<hr/><p style="text-align:left;"><b>Like Box Setting</b></p>';
		echo '<p style="text-align:left;"><i>Fill Page ID Or Page URL below:</i></p>';
		# Fill Page ID
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('pageID') . '">' . __('Facebook Page ID:') . ' <input style="width: 150px;" id="' . $this->get_field_id('pageID') . '" name="' . $this->get_field_name('pageID') . '" type="text" value="' . $pageID . '" /></label></p>';
		# Fill Page URL
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('pageURL') . '">' . __('Facebook Page URL:') . ' <input style="width: 150px;" id="' . $this->get_field_id('pageURL') . '" name="' . $this->get_field_name('pageURL') . '" type="text" value="' . $pageURL . '" /></label></p>';
		
		

				# Fill Like Button Font Selection
		echo '<p style="text-align:right;"><label for="' . $this->get_field_name('fblike_button_font') . '">' . __('Font:') . ' <select name="' . $this->get_field_name('fblike_button_font')  . '" id="' . $this->get_field_id('fblike_button_font')  . '">"';
?>
		<option value="arial" <?php if ($fblike_button_font == 'arial') echo 'selected="yes"'; ?> >arial</option>
		<option value="lucida grande" <?php if ($fblike_button_font == 'lucida grande') echo 'selected="yes"'; ?>>lucida grande</option>	
		<option value="segoe ui" <?php if ($fblike_button_font == 'segoe ui') echo 'selected="yes"'; ?> >segoe ui</option>
		<option value="tahoma" <?php if ($fblike_button_font == 'tahoma') echo 'selected="yes"'; ?> >tahoma</option>	
		<option value="trebuchet ms" <?php if ($fblike_button_font == 'trebuchet ms') echo 'selected="yes"'; ?> >trebuchet ms</option>
		<option value="verdana" <?php if ($fblike_button_font == 'verdana') echo 'selected="yes"'; ?> >verdana</option>	
<?php
		echo '</select></label>';
		
		
		
		
	
	} //end of form

}// END class
	
	/**
	* Register  widget.
	*
	* Calls 'widgets_init' action after widget has been registered.
	*/
	function FacebookLikeBoxInit() {
	register_widget('FacebookLikeBoxWidget');
	}	
	add_action('widgets_init', 'FacebookLikeBoxInit');
?>