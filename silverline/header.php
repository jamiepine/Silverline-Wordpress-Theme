<?php
/**
 * Template: Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php do_action( 'pre_wp_head' ); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo of_get_option('favion_uploader', ''); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
<?php wp_head(); ?> 

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
      
<! -- CUSTOM STYLES -->

	<style type="text/css">
	body {background: url(<?php bloginfo('template_directory'); ?>/library/textures/<?php echo of_get_option('texture', 'grain'); ?>.png);}
	h1#logo a {background: url(<?php echo of_get_option('logo_uploader', '' ); ?>) <?php echo of_get_option('logo_position', 'left' ); ?> no-repeat;}
	</style>
	
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/style-switcher.js"></script> <!-- JS Script for the demo skin switcher -->
	<link rel="stylesheet" title="silver" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/<?php echo of_get_option('skin', 'silver'); ?>/style.css" />
	<!-- Variables for the demo skin switcher -->
	<link rel="stylesheet" title="red"type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/red/style.css" />
	<link rel="stylesheet" title="blue"type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/blue/style.css" />
	<link rel="stylesheet" title="cyan" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/cyan/style.css" />
	<link rel="stylesheet" title="green" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/green/style.css" />
	<link rel="stylesheet" title="orange" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/orange/style.css" />
	<link rel="stylesheet" title="pink" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/pink/style.css" />
	<link rel="stylesheet" title="purple" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/purple/style.css" />
	<link rel="stylesheet" title="turquoise" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/turquoise/style.css" />
	<link rel="stylesheet" title="white" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/styles/white/style.css" />

<! -- END CUSTOM STYLES -->


<!-- SLIDE PANEL -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/slide-jquery.js"></script> 
<script type="text/javascript"> 
$(document).ready(function(){
 
	$(".btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});	
	 
});
		</script> 

<!-- POST SLIDER -->
	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_enqueue_script('jquery-ui-core'); ?>
	<?php wp_enqueue_script('jquery-ui-tabs'); ?>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> 
	<script type="text/javascript">
	jQuery(document).ready(function($){
  	  $("#photo-rotator").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 4000);
	});
	</script>

	<!-- TABS -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/tab/fading-tabs.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#tabwrap').tabs({ fx: { opacity: 'toggle', duration:'fast'} });
	 });
	</script>

<!-- SLIDER FADE EFFECT -->
	<script type="text/javascript">
			jQuery(document).ready(function($){
			$('#slider_fade').fadeIn(400);
			});
	</script>

<! -- PAGINATION -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/css/pagenavi-css.css" />

<! -- TWITTER WIDGET -->
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
	
<!-- DROPDOWN CODE -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/css/nav.css" />
	<script src="<?php bloginfo('template_directory'); ?>/library/js/nav/hoverIntent.js"></script> 
	<script src="<?php bloginfo('template_directory'); ?>/library/js/nav/superfish.js"></script> 
	<script type="text/javascript"> 
    $(document).ready(function() { 
        $('ul.topnav').superfish({ 
            delay:       100,                            // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
            speed:       'fast',                          // faster animation speed 
            autoArrows:  false,                           // disable generation of arrow mark-up 
            dropShadows: false                            // disable drop shadows 
        }); 
    });  
	</script>

<!-- CONTACT CODE -->
<?php if( is_page('contact') ){ ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/verif.js"></script>
<?php }?>


<?php echo of_get_option('analytics_code', ''); ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="panel">
<div id="colophon" class="wrap">
				<?php do_action( 'colophon_open' ); ?>
				
		<div style="display:<?php echo of_get_option('enable_footer_widgets', 'visible' ); ?>;" id="footer-widgets-wrap">
				
				<div style="width: 293px; float: left;">
				<?php get_template_part( 'header-widgets-1' ); ?>
				</div>
				
				<div style="width: 293px; float: left; margin-left:44px;">
				<?php get_template_part( 'header-widgets-2' ); ?>
				</div>
				
				<div style="width: 293px; float: left; margin-left:44px;">
				<?php get_template_part( 'header-widgets-3' ); ?>
		      	</div>

				
		</div>
				<?php do_action( 'colophon_close' ); ?>
			</div><!--#colophon-->
</div>

<div id="header-banner"> </div>

<div class="body-bg">
<div class="headerbg">

	<?php do_action( 'body_open' ); ?>

	<div id="container" class="wrap">

		<?php do_action( 'container_open' ); ?>
	
 <!-- Demo style switcher -->		
 		<div style="display:visible;" id="demo_style_switcher"><!-- Change the display to "visible" to display the demo skin switcher -->
 		Skins<br/><br/>
 		<a onclick="switch_style('silver');return false;" name="theme" id="silver">Silver</a> <br/>
 		<a onclick="switch_style('red');return false;" name="theme" id="red">Red</a> <br/>
 		<a onclick="switch_style('blue');return false;" name="theme" id="blue">Blue</a> <br/>
 		<a onclick="switch_style('cyan');return false;" name="theme" id="cyan">Cyan</a> <br/>
 		<a onclick="switch_style('green');return false;" name="theme" id="green">Green</a> <br/>
 		<a onclick="switch_style('orange');return false;" name="theme" id="orange">Orange</a> <br/>
 		<a onclick="switch_style('pink');return false;" name="theme" id="pink">Pink</a> <br/>
 		<a onclick="switch_style('purple');return false;" name="theme" id="purple">Purple</a> <br/>
 		<a onclick="switch_style('turquoise');return false;" name="theme" id="turquoise">Turquoise</a> <br/>
 		<a onclick="switch_style('white');return false;" name="theme" id="black">White</a>
 		</div>	

			<ul class="topnav">
  				<?php wp_nav_menu( array('menu' => 'header' )); ?>
			</ul>
					<a style="display:<?php echo of_get_option('enable_header_widgets', 'visible'); ?>;" href="#" class="arrow_trigger btn-slide"></a>
				
				
	<header id="header" role="banner">
	
		<?php do_action( 'header_open' ); ?>
									
			<?php $text_logo = of_get_option('use_text_logo', '1'); ?>
		
				<?php if ( $text_logo ): ?>
					<div id="header-container">
						<h1 id="text_logo"><a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?><p class="logo_tag_line"><?php bloginfo('description'); ?></p></a></h1>
					</div>
				<?php else: ?>
					<div id="header-container">
						<h1 style="text-indent:-9999px;" id="logo"><a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?><p class="logo_tag_line"><?php bloginfo('description'); ?></p></a></h1>
					</div>
				<?php endif; ?>
							
	
		<div id="leaderad">
				<?php echo of_get_option('leader_ad_code', ''); ?>
		</div>
			
			
		<?php do_action( 'header_close' ); ?>
			
	</header></div><!--header-->
		

		<?php do_action( 'between_header_main' ); ?>

		<div id="main" role="main">
			
			<?php do_action( 'main_open' ); ?>

			<div class="wrap">
				
				<?php do_action( 'main_wrap_open' ); ?>