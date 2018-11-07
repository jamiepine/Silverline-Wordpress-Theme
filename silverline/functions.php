<?php 
/**
 * Template: Functions
 * 
 * This file is automatically loaded by WordPress.
 * functions.php bootstraps and initialization Framework.
 *
 */

// Bootstrap and Initialise Framework.
require_once( TEMPLATEPATH . '/framework/init.php' );

// Update Notifier
include ( TEMPLATEPATH . '/update_notifier.php');

// Shortcodes
include_once('shortcodes.php');

// Call The Custom Widget Files
include ( TEMPLATEPATH . '/widgets/socialcounter.php' );
include ( TEMPLATEPATH . '/widgets/facebook.php' );
include ( TEMPLATEPATH . '/widgets/recentposts.php' );
include ( TEMPLATEPATH . '/widgets/recentpostspictures.php' );
include ( TEMPLATEPATH . '/widgets/popularposts.php' );

include ( TEMPLATEPATH . '/widgets/homepage-one-column.php' );
include ( TEMPLATEPATH . '/widgets/homepage-two-column.php' );
include ( TEMPLATEPATH . '/widgets/homepage-three-column.php' );
include ( TEMPLATEPATH . '/widgets/homepage-four-column.php' );

include ( TEMPLATEPATH . '/widgets/twitter.php' );
include ( TEMPLATEPATH . '/widgets/125.php' );
include ( TEMPLATEPATH . '/widgets/large-ad.php' );
include ( TEMPLATEPATH . '/widgets/youtube.php' );
include ( TEMPLATEPATH . '/widgets/vimeo.php' );
include ( TEMPLATEPATH . '/widgets/tabs.php' );


// Lightbox
include ( TEMPLATEPATH . '/library/js/lightbox/lightbox.php' );



// Unregister default WordPress widgets
add_action( 'widgets_init', 'my_unregister_widgets' );

function my_unregister_widgets() {

	unregister_widget( 'WP_Widget_Search' );
		
}


// Registers Thumbnail Support
add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add support for posts
add_image_size( 'nav-image', 130, 40, true ); // nav thumbnail size, hard crop mode
add_image_size( 'rotator-post-image', 615, 280, true ); // large size, hard crop mode

    
/*-----------------------------------------------------------------------------------*/
/* Options Framework Theme
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'optionsframework_init' ) ) {

/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */

if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');
} else {
	define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/admin/');
}

require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>

<?php
}

/* 
 * Turns off the default options panel from Twenty Eleven
 */
 
add_action('after_setup_theme','remove_twentyeleven_options', 100);

function remove_twentyeleven_options() {
	remove_action( 'admin_menu', 'twentyeleven_theme_options_add_page' );
}


// Sets excerpt length
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
 

add_filter('the_excerpt', 'fix_the_excerpt');

function my_excerpt_length($length) {
  return 200; // Or whatever you want the length to be.
}
add_filter('excerpt_length', 'my_excerpt_length');



// Trim end of excerpt
function silverline_trim_excerpt($text) {
	return rtrim($text, '[...]');
}
add_filter('get_the_excerpt', 'silverline_trim_excerpt');




function orz_tag_cloud_filter($args = array()) {
   $args['smallest'] = 9;
   $args['largest'] = 9;
   $args['unit'] = 'pt';
   return $args;
}

add_filter('widget_tag_cloud_args', 'orz_tag_cloud_filter', 90);



// TWITTER COUNTER 
    
// Use this function to retrieve the followers count
function my_followers_count($screen_name = '')
{
	$key = 'my_followers_count_' . $screen_name;

	// Let's see if we have a cached version
	$followers_count = get_transient($key);
	if ($followers_count !== false)
		return $followers_count;
	else
	{
		// If there's no cached version we ask Twitter
		$response = wp_remote_get("http://api.twitter.com/1/users/show.json?screen_name={$screen_name}");
		if (is_wp_error($response))
		{
			// In case Twitter is down we return the last successful count
			return get_option($key);
		}
		else
		{
			// If everything's okay, parse the body and json_decode it
			$json = json_decode(wp_remote_retrieve_body($response));
			$count = $json->followers_count;

			// Store the result in a transient, expires after 1 day
			// Also store it as the last successful using update_option
			set_transient($key, $count, 60*60*24);
			update_option($key, $count);
			return $count;
			wp_reset_query();
		}
	}
}
