<?php
// Raw Shortcode
function my_formatter($content) {
$new_content = '';
$pattern_full = '{(\[raw\].*?\[/raw\])}is';
$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

foreach ($pieces as $piece) {
	if (preg_match($pattern_contents, $piece, $matches)) {
		$new_content .= $matches[1];
	} else {
		$new_content .= wptexturize(wpautop($piece));
	}
}
return $new_content;
}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);



// Youtube shortcode
add_shortcode('youtube', 'shortcode_youtube');
function shortcode_youtube($atts) {
$atts = shortcode_atts(
	array(
		'id' => '',
		'width' => 600,
		'height' => 360
	), $atts);
		
		return '<div class="video-shortcode"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe></div>';
	}
	
// Vimeo shortcode
add_shortcode('vimeo', 'shortcode_vimeo');
function shortcode_vimeo($atts) {
	$atts = shortcode_atts(
		array(
		'id' => '',
		'width' => 600,
		'height' => 360
		), $atts);
		
	return '<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div>';
	}
	
// SoundCloud shortcode
add_shortcode('soundcloud', 'shortcode_soundcloud');
function shortcode_soundcloud($atts) {
	$atts = shortcode_atts(
		array(
			'url' => '',
			'width' => '100%',
			'height' => 81,
			'comments' => 'true',
			'auto_play' => 'true',
			'color' => 'ff7700',
			), $atts);
		
			return '<object height="' . $atts['height'] . '" width="' . $atts['width'] . '"><param name="movie" value="http://player.soundcloud.com/player.swf?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '"></param><param name="allowscriptaccess" value="always"></param><embed allowscriptaccess="always" height="' . $atts['height'] . '" src="http://player.soundcloud.com/player.swf?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '" type="application/x-shockwave-flash" width="' . $atts['width'] . '"></embed></object>';
	}
	
// Button shortcode
add_shortcode('button', 'shortcode_button');
function shortcode_button($atts, $content = null) {
$atts = shortcode_atts(
	array(
		'color' => 'red',
		'link' => '#',
	), $atts);
		
	return '[raw]<span class="btn ' . $atts['color'] . '"><a href="' . $atts['link'] . '" >' .do_shortcode($content). '</a></span>[/raw]';
	}
	
// Message Box shortcode
add_shortcode('message_box', 'shortcode_message_box');
function shortcode_message_box($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'color' => 'red',
		), $atts);
		
	return '[raw]<div class="message_box ' . $atts['color'] . '">' .do_shortcode($content). '</div>[/raw]';
	}
	
// Check list shortcode
add_shortcode('checklist', 'shortcode_checklist');
function shortcode_checklist( $atts, $content = null ) {	
	$content = str_replace('<ul>', '<ul class="checklist">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));	
return $content;	
}
// Arrow shortcode
add_shortcode('arrow', 'shortcode_arrow');
function shortcode_arrow( $atts, $content = null ) {	
	$content = str_replace('<ul>', '<ul class="arrow">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));	
return $content;	
}
// Folder shortcode
add_shortcode('folder', 'shortcode_folder');
function shortcode_folder( $atts, $content = null ) {	
	$content = str_replace('<ul>', '<ul class="folder">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));	
return $content;	
}
// Download shortcode
add_shortcode('download', 'shortcode_download');
function shortcode_download( $atts, $content = null ) {	
	$content = str_replace('<ul>', '<ul class="download">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));	
return $content;	
}
// News shortcode
add_shortcode('news', 'shortcode_news');
function shortcode_news( $atts, $content = null ) {	
	$content = str_replace('<ul>', '<ul class="news">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));	
return $content;	
}
// Attachment shortcode
add_shortcode('attachment', 'shortcode_attachment');
function shortcode_attachment( $atts, $content = null ) {	
	$content = str_replace('<ul>', '<ul class="attachment_sc">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));	
return $content;
}

// Bad list shortcode
add_shortcode('badlist', 'shortcode_badlist');
function shortcode_badlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="badlist">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));
return $content;	
}
	
// one_half shortcode
add_shortcode('one_half', 'shortcode_one_half');
function shortcode_one_half($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'last' => 'no',
		), $atts);
			
		if($atts['last'] == 'yes') {
			return '<div class="one_half last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
		} else {
			return '<div class="one_half">' .do_shortcode($content). '</div>';
		}

}	
// one_third shortcode
add_shortcode('one_third', 'shortcode_one_third');
function shortcode_one_third($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'last' => 'no',
		), $atts);
			
		if($atts['last'] == 'yes') {
			return '<div class="one_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
		} else {
			return '<div class="one_third">' .do_shortcode($content). '</div>';
		}

	}
// two_third shortcode
add_shortcode('two_third', 'shortcode_two_third');
function shortcode_two_third($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'last' => 'no',
		), $atts);
		
		if($atts['last'] == 'yes') {
			return '<div class="two_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
		} else {
			return '<div class="two_third">' .do_shortcode($content). '</div>';
		}

}
	
// one_fourth shortcode
add_shortcode('one_fourth', 'shortcode_one_fourth');
function shortcode_one_fourth($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'last' => 'no',
		), $atts);
			
		if($atts['last'] == 'yes') {
			return '<div class="one_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
		} else {
			return '<div class="one_fourth">' .do_shortcode($content). '</div>';
		}

}
	
// three_fourth shortcode
add_shortcode('three_fourth', 'shortcode_three_fourth');
function shortcode_three_fourth($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'last' => 'no',
		), $atts);
		
		if($atts['last'] == 'yes') {
			return '<div class="three_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
		} else {
			return '<div class="three_fourth">' .do_shortcode($content). '</div>';
		}

	}	
// Add buttons to tinyMCE
add_action('init', 'add_button');
function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button');  
   }  
}  
function register_button($buttons) {  
   array_push($buttons, "youtube", "vimeo", "soundcloud", "button", "message_box", "dropcap", "highlight", "checklist", "arrow", "folder", "download","news","attachment", "badlist", "one_half", "one_third", "two_third", "one_fourth", "three_fourth");  
   return $buttons;  
}  
function add_plugin($plugin_array) {  
   $plugin_array['youtube'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['vimeo'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['soundcloud'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['button'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['message_box'] = get_template_directory_uri().'/tinymce/customcodes.js';
     $plugin_array['checklist'] = get_template_directory_uri().'/tinymce/customcodes.js';
     $plugin_array['arrow'] = get_template_directory_uri().'/tinymce/customcodes.js';
     $plugin_array['folder'] = get_template_directory_uri().'/tinymce/customcodes.js';
     $plugin_array['download'] = get_template_directory_uri().'/tinymce/customcodes.js';
     $plugin_array['news'] = get_template_directory_uri().'/tinymce/customcodes.js';
     $plugin_array['attachment'] = get_template_directory_uri().'/tinymce/customcodes.js';
     $plugin_array['badlist'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['one_half'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['one_third'] = get_template_directory_uri().'//tinymce/customcodes.js';
   $plugin_array['two_third'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['one_fourth'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['three_fourth'] = get_template_directory_uri().'/tinymce/customcodes.js';
   
   return $plugin_array;  
}  