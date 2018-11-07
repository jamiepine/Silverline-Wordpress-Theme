<?php include'framework/shortcodes.php';


add_action( 'wpf_init', 'register_parent_theme_classes', 5 );
function register_parent_theme_classes() {
	wpf_register_class( 'theme', 'Parent_Theme' );
}

class Parent_Theme extends WPF {

	function Parent_Theme() {
		parent::WPF( array(
			// Set the content width based on the theme's design and stylesheet.
			'content_width' => 640,
			// Sets the text domain for your theme. Use the t() in your template files.
			'textdomain' => get_stylesheet(),
		) );
	}

	function after_setup_theme() {
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /library/languages/ directory.
		 */
		wpf_load_theme_translations();

		// Navigation Menu support.
		register_nav_menus( array(
			'header' => __( 'Primary Navigation', t() ),
		) );

		// Enable dynamically generated css classes to your markup
		add_theme_support( 'semantic-markup' );

		// Enable the Roll Your Own Grid System - CSS Framework
		add_theme_support( 'css-grid-framework' );

		// Post thumbnails support.
		add_theme_support( 'post-thumbnails' );
		
		// Post Format support.
		add_theme_support( 'post-formats', array( 'aside', 'sidebar-2', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );

		// Automatic Feed Links support.
		add_theme_support( 'automatic-feed-links' );
		
		// Uncomment the following line to enable the Theme Options page within the WordPress admin.
		// add_theme_support( 'theme-options' );

		// Editor Styles support.
		add_editor_style( THEME_CSS . '/editor-style.css' );

		// Custom Background support.

	}

	/**
	 * Register widgetized areas.
	 *
	 * This is a magic method which is automatically called
	 * on the 'widgets_init' action hook.
	 */
	function widgets_init() {
	
	
		
		register_sidebar( array(
			'name' => __( 'Main Sidebar', t() ),
			'id' => 'aside-widget-area',
			'description' => __( 'Main widget area.', t() ),
			'before_widget' => '<div class="widget-container"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title"><span class="widget-title-text">',
			'after_title' => '</span></h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Page/Post Sidebar', t() ),
			'id' => 'sidebar-page',
			'description' => __( 'Page widget area.', t() ),
			'before_widget' => '<div class="widget-container"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title"><span class="widget-title-text">',
			'after_title' => '</span></h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Homepage', t() ),
			'id' => 'homepage-widgets',
			'description' => __( 'Homepage main area.', t() ),
			'before_widget' => '<div class="widget-container"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => ' <div class="box-loop-2" position:relative;"><h3 style="margin:0;" class="homepage-title">',
			'after_title' => '</h3></div>',
		) );
		
		
		
		register_sidebar( array(
			'name' => __( 'Footer Widgets Column 1', t() ),
			'id' => 'footer-widgets-1',
			'description' => __( 'The widgets displayed in the footer', t() ),
			'before_widget' => '<div class="widget-container-footer"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title-footer"><span class="widget-title-text-footer">',
			'after_title' => '</span></h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Footer Widgets Column 2', t() ),
			'id' => 'footer-widgets-2',
			'description' => __( 'The widgets displayed in the footer', t() ),
			'before_widget' => '<div class="widget-container-footer"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title-footer"><span class="widget-title-text-footer">',
			'after_title' => '</span></h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Footer Widgets Column 3', t() ),
			'id' => 'footer-widgets-3',
			'description' => __( 'The widgets displayed in the footer', t() ),
			'before_widget' => '<div class="widget-container-footer"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title-footer"><span class="widget-title-text-footer">',
			'after_title' => '</span></h3>',
		) );
		
		
		
		
		register_sidebar( array(
			'name' => __( 'Header Widgets Column 1', t() ),
			'id' => 'header-widgets-1',
			'description' => __( 'The widgets displayed in the header drop down', t() ),
			'before_widget' => '<div class="widget-container-footer"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title-footer"><span class="widget-title-text-footer">',
			'after_title' => '</span></h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Header Widgets Column 2', t() ),
			'id' => 'header-widgets-2',
			'description' => __( 'The widgets displayed in the header drop down', t() ),
			'before_widget' => '<div class="widget-container-footer"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title-footer"><span class="widget-title-text-footer">',
			'after_title' => '</span></h3>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Header Widgets Column 3', t() ),
			'id' => 'header-widgets-3',
			'description' => __( 'The widgets displayed in the header drop down', t() ),
			'before_widget' => '<div class="widget-container-footer"><section id="%1$s" class="widget %2$s">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widget-title-footer"><span class="widget-title-text-footer">',
			'after_title' => '</span></h3>',
		) );


	
		
	
		}

	/**
	 * Enqueue Assets.
	 *
	 * Stylesheets:
	 * - reset.css		: resets default browser styling.
	 * - master.css		: blank css file, ready for you to edit.
	 * - default.css	: default styles for this theme.
	 * - grid.css		: custom css grid generator.
	 *
	 * Scripts:
	 * - html5shiv.js	: Adds support for HTML5 elements.
	 * - scripts.js		: Sample js script for rapid theme development.
	 * - hoverIntent/superfish/sf-options: Adds nice transitions to your menus.
	 *
	 * BuddyPress:
	 * - wpf-bp-admin-bar: Styles the BuddyPress admin bar.
	 * - wpf-bp			: Styles BuddyPress component pages.
	 * - wpf-bp-ajax-js	: Adds AJAX support to BuddyPress pages.
	 */
	function enqueue_assets() {
		wp_enqueue_style( 'reset', get_theme_part( THEME_CSS . '/reset.css' ), null, null );
		wp_enqueue_style( 'default', get_theme_part( THEME_CSS . '/default.css' ), array( 'reset' ), null );
		wp_enqueue_style( 'master', get_theme_part( THEME_CSS . '/master.css' ), array( 'reset' ), null );

		// Custom CSS Framework genereated from RYOGS, see comments below.
		wp_enqueue_style( 'grid', get_theme_part( THEME_CSS . '/grid.css' ), null, null );

		// FYI: For production sites, it's best to hardcode the generated into a static grid.css file for a performance boast.
		// Parameters: column - width - gutter - line-height: examples: 12-54-30-22 or 24-30-10-20
		// wp_enqueue_style( 'grid', get_theme_part( WPF_EXT_URI . '/ryogs.php' ), null, '12-54-30-22' );

		wp_enqueue_script( 'html5shiv', get_theme_part( THEME_JS . '/html5shiv.js' ), null, null );
		wp_enqueue_script( 'scripts', get_theme_part( THEME_JS . '/scripts.js' ), array( 'jquery' ), null, true );

		// Superfish Menus
		wp_enqueue_script( 'hoverIntent', includes_url( 'js/hoverIntent.js' ), array( 'jquery' ), null, true );
		wp_enqueue_script( 'superfish', get_theme_part( THEME_JS . '/superfish.js' ), null, null );

		// BuddyPress Styles
		if ( is_bp_active() )
			wp_enqueue_style( 'wpf-bp-admin-bar', get_theme_part( THEME_CSS .'/bp-admin-bar.css' ), null, null );

		if ( is_bp_component_page() ) {
			wp_enqueue_style( 'wpf-bp', get_theme_part( THEME_CSS . '/buddypress.css' ), null, null );
			wp_enqueue_script( 'wpf-bp-ajax-js', get_theme_part( THEME_JS . '/buddypress.js' ), array( 'jquery' ), null );
		}
	}

	/**
	 * This is the callback method for registering metaboxes and options
	 * in the Theme Options page.
	 */
	function theme_options() {
		//
	}
}

add_theme_support( 'post-thumbnails' );


add_filter('wp_list_categories', 'cat_count_inline');
function cat_count_inline($links) {
$links = str_replace('</a> (', '<span class="cat-count-sidebar">', $links);
$links = str_replace(')', '</span></a>', $links);
return $links;
}

add_filter('get_archives_link', 'archive_count_inline');
function archive_count_inline($links) {
$links = str_replace('</a>&nbsp;(', '<span class="cat-count-sidebar">', $links);
$links = str_replace(')', '</span></a>', $links);

return $links;
}


function mysitemyway_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target'	=> '',
    'variation'	=> '',
    'size'	=> '',
    'align'	=> '',
    ), $atts));

	$style = ($variation) ? ' '.$variation. '_gradient' : '';
	$align = ($align) ? ' align'.$align : '';
	$size = ($size == 'large') ? ' large_button' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="button_link' .$style.$size.$align. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'mysitemyway_button');


function webtreats_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'webtreats_formatter', 99);
add_filter('widget_text', 'webtreats_formatter', 99);

//Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553
@ini_set('pcre.backtrack_limit', 500000);

