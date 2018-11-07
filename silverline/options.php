<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	
	// Styles data
	$styles_array = array("silver" => "Silver","blue" => "Blue","red" => "Red","green" => "Green","purple" => "Purple","turquoise" => "Turquoise","cyan" => "Cyan","orange" => "Orange","pink" => "Pink","white" => "White");
	
	// Texture data
	$texture_array = array("grain" => "Grain","crossed" => "Crossed","grid_1" => "Grid 1","grid_2" => "Grid 2","grid_2" => "Grid 2","grid_3" => "Grid 3","grid_4" => "Grid 4","grid_5" => "Grid 5","lines_1" => "Lines 1","lines_2" => "Lines 2","lines_3" => "Lines 3");
	
	// Display / Hidden
	$display_or_hidden = array("visible" => "Yes","none" => "No");
	
	// Homepage Layout
	$layout_array = array("magazine" => "Magazine","blog" => "Blog");
	
	// Logo Position
	$logo_position = array("left" => "Left","center" => "Center");
	
	// Loop Array
	$loop_array = array("archive" => "Small Posts","medium" => "Medium Posts","large" => "Large Posts");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/admin/images/';
		
	$options = array();
	
	
	$options[] = array( "name" => "General Settings",
						"type" => "heading");	
						
	
	$options[] = array( "name" => "Welcome to Silverline Theme Options.",
						"desc" => "Here you will find an array of different options that control the way your site looks and functions. Each option has a short description on the right explaining it's function. Refer to the documentation for more details.",
						"type" => "info");
						
	$options[] = array( "name" => "Use Text Logo",
						"desc" => "Check this box to show a text logo based on your blog name and tagline, instead of an image logo.",
						"id" => "use_text_logo",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Logo",
						"desc" => "Upload and preview your header logo. Should be no larger than 100x960px. If you have the leader ad enabled it should be no larger than 100x470px",
						"id" => "logo_uploader",
						"type" => "upload");

	$options[] = array( "name" => "Logo Position",
						"desc" => "If there is no leader ad, you have the option to position your logo in the center. By default the logo is positioned to the left.",
						"id" => "logo_position",
						"std" => "left",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $logo_position);
						
	$options[] = array( "name" => "Favicon",
						"desc" => "Your favicon is the small 64x64 image that appears next to the title in your browser. It should be in .ico format.",
						"id" => "favion_uploader",
						"type" => "upload");
						
	$options[] = array( "name" => "Contact Email",
						"desc" => "The email that the contact form sends messages to.",
						"id" => "contact-email",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Enable Widgetized Header Drop Down",
						"desc" => "Enable the header widgets in the drop down panel. Default set to yes.",
						"id" => "enable_header_widgets",
						"std" => "visible",
						"type" => "radio",
						"options" => $display_or_hidden);				
						
	$options[] = array( "name" => "Header Banner Code",
						"desc" => "This is the code for the 468x60 ad in the header. If left blank, no ad will appear.",
						"id" => "leader_ad_code",
						"type" => "textarea"); 
															
	$options[] = array( "name" => "Analytics Code",
						"desc" => "Paste any analytics code here. It will be inserted into the head section.",
						"id" => "analytics_code",
						"type" => "textarea");	
						
						
	$options[] = array( "name" => "Footer Text",
						"desc" => "The copyright text displayed in the footer.",
						"id" => "footer_copyright",
						"std" => "&copy; Copyright 2012 Silverline WordPress Theme <br/>Designed by <a href=\"http://pxlab.co.uk\">PxLab</a>. Powered By WordPress",
						"type" => "textarea");	
						
	
	$options[] = array( "name" => "Enable Widgetized Footer",
						"desc" => "Enable the footer widgets. Default set to yes.",
						"id" => "enable_footer_widgets",
						"std" => "visible",
						"type" => "radio",
						"options" => $display_or_hidden);		
						
	
	$options[] = array( "name" => "Appearance",
						"type" => "heading");						
						
	
	$options[] = array( "name" => "Skin",
						"desc" => "Choose from 10 color skins.",
						"id" => "skin",
						"std" => "silver",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $styles_array);
						
	$options[] = array( "name" => "Texture",
						"desc" => "Choose from 4 background textures.",
						"id" => "texture",
						"std" => "grain",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $texture_array);						


	
	$options[] = array( "name" => "Homepage Settings",
						"type" => "heading");						
						
	$options[] = array( "name" => "Layout",
						"desc" => "Either a traditional blog layout or fully widgetized magazine layout.",
						"id" => "homepage_style",
						"std" => "blog",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $layout_array);
	
	
	$options[] = array( "name" => "Display Slider",
						"desc" => "Display the featured posts slider on homepage.",
						"id" => "slider_show_hide",
						"std" => "visible",
						"type" => "radio",
						"options" => $display_or_hidden);
						
	$options[] = array( "name" => "Show Post Titles In Slider",
						"desc" => "Display the posts title in the featured slider.",
						"id" => "show_slider_post_title",
						"std" => "visible",
						"type" => "radio",
						"options" => $display_or_hidden);
	
											
	$options[] = array( "name" => "Slider Category",
						"desc" => "The category for the homepage slider.",
						"id" => "slider_cat",
						"type" => "select",
						"options" => $options_categories);
						
		
						
	$options[] = array( "name" => "Social",
						"type" => "heading");
						
	$options[] = array( "name" => "Footer Icons",
						"desc" => "Enter links to the social networking websites that you wish to appear with a clickable icon in the lower right of the footer here. If left blank, no icon will appear.",
						"type" => "info");
	
	$options[] = array( "name" => "Facebook",
						"desc" => "Paste a link to your Facebook here.",
						"id" => "facebook_button",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Twitter",
						"desc" => "Paste a link to your Twitter here.",
						"id" => "twitter_button",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Youtube",
						"desc" => "Paste a link to your Youtube here.",
						"id" => "youtube_button",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Vimeo",
						"desc" => "Paste a link to your Vimeo here.",
						"id" => "vimeo_button",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "RSS",
						"desc" => "Paste a link to your RSS here.",
						"id" => "rss_button",
						"std" => "",
						"type" => "text");	
										
	$options[] = array( "name" => "Linkedin",
						"desc" => "Paste a link to your Linkedin here.",
						"id" => "linkedin_button",
						"std" => "",
						"type" => "text");		
																
	$options[] = array( "name" => "Google Plus",
						"desc" => "Paste a link to your Google Plus here.",
						"id" => "googleplus_button",
						"std" => "",
						"type" => "text");			
									
	$options[] = array( "name" => "Wordpress",
						"desc" => "Paste a link to your Wordpress here.",
						"id" => "wordpress_button",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "AIM",
						"desc" => "Paste a link to your AIM here.",
						"id" => "aim_button",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Email",
						"desc" => "Paste a link to your Email here.",
						"id" => "email_button",
						"std" => "",
						"type" => "text");	
						
						
						
	$options[] = array( "name" => "Loop Settings",
						"type" => "heading");	
						
	$options[] = array( "name" => "Category Loop Style",
						"desc" => "Choose from 3 different loop styles to display your posts in the Categories.",
						"id" => "category_loop_style",
						"std" => "small",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $loop_array);	
						
	$options[] = array( "name" => "Archive Loop Style",
						"desc" => "Choose from 3 different loop styles to display your posts in the Archives.",
						"id" => "archive_loop_style",
						"std" => "small",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $loop_array);							
																					
	$options[] = array( "name" => "Display Slider On Category Pages",
						"desc" => "Display the featured posts slider on category pages.",
						"id" => "category_slider_show_hide",
						"std" => "none",
						"type" => "radio",
						"options" => $display_or_hidden);
						
						
						
		
	return $options;
}