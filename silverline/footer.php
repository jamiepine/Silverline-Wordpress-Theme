<?php
/**
 * WordPress Template: Footer
 */
?>
				<?php do_action( 'main_wrap_close' ); ?>
				
			
				
			</div><!--#main.wrap-->

			<?php do_action( 'main_close' ); ?>

		</div><!--#main-->
			</div><!--#container-->

		<?php do_action( 'between_main_footer' ); ?>

		<footer id="footer" role="contentinfo">
		
		
						<div class="footer_shadow"></div><!--footer-shadow-->

			<?php do_action( 'footer_open' ); ?>

			<div id="colophon" class="wrap">
				<?php do_action( 'colophon_open' ); ?>
				
		<div style="display:<?php echo of_get_option('enable_footer_widgets', 'visible' ); ?>;" id="footer-widgets-wrap">
				
				<div style="width: 293px; float: left;">
				<?php get_template_part( 'footer-widgets-1' ); ?>
				</div>
				
				<div style="width: 293px; float: left; margin-left:44px;">
				<?php get_template_part( 'footer-widgets-2' ); ?>
				</div>
				
				<div style="width: 293px; float: left; margin-left:44px;">
				<?php get_template_part( 'footer-widgets-3' ); ?>
		      	</div>

				
		</div>
				<?php do_action( 'colophon_close' ); ?>
			</div><!--#colophon-->

			<?php do_action( 'footer_close' ); ?>
			
				
				
		
		</footer><!--footer-->
		
		
			<div id="footer_bottom">
				<div class="footer_shadow"></div><!--footer-shadow-->
				
					<div id="footer_bottom_content" class="wrap">
				
						<div class="copyright_text">
						<?php echo of_get_option('footer_copyright', 'Copyright Text Goes Here' ); ?>
						</div>

						<div class="footer_icons" align="right">
<?php
$facebook =  of_get_option('facebook_button', '');
$twitter =  of_get_option('twitter_button', '');
$youtube =  of_get_option('youtube_button', '');
$vimeo =  of_get_option('vimeo_button', '');
$rss =  of_get_option('rss_button', '');
$linkedin =  of_get_option('linkedin_button', '');
$googleplus =  of_get_option('googleplus_button', '');
$wordpress =  of_get_option('wordpress_button', '');
$aim =  of_get_option('aim_button', '');
$email =  of_get_option('email_button', '');
?>						
<?php if ( $facebook ) echo '<a href="'.$facebook.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/facebook_32.png" alt="facebook_32" width="32" height="32" /></a>'; ?>
<?php if ( $twitter ) echo '<a href="'.$twitter.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/twitter_32.png" alt="twitter" width="32" height="32" /></a>'; ?>
<?php if ( $youtube ) echo '<a href="'.$youtube.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/youtube_32.png" alt="youtube" width="32" height="32" /></a>'; ?>
<?php if ( $vimeo ) echo '<a href="'.$vimeo.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/vimeo_32.png" alt="vimeo" width="32" height="32" /></a>'; ?>
<?php if ( $rss ) echo '<a href="'.$rss.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/rss.png" alt="rss" width="32" height="32" /></a>'; ?>
<?php if ( $linkedin ) echo '<a href="'.$linkedin.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/linkedin_32.png" alt="linkedin" width="32" height="32" /></a>'; ?>
<?php if ( $googleplus ) echo '<a href="'.$googleplus.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/google_plus_32.png" alt="googleplus" width="32" height="32" /></a>'; ?>
<?php if ( $wordpress ) echo '<a href="'.$wordpress.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/wordpress_32.png" alt="wordpress" width="32" height="32" /></a>'; ?>
<?php if ( $aim ) echo '<a href="'.$aim.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/aim_32.png" alt="aim_32" width="32" height="32" /></a>'; ?>
<?php if ( $email ) echo '<a href="'.$email.'"><img src="'.get_bloginfo('template_directory').'/library/images/icons/email_32.png" alt="email" width="32" height="32" /></a>'; ?>
						
						</div>
				
				
					</div>
				
			</div>
				

		<?php do_action( 'container_close' ); ?>



	<?php do_action( 'body_close' ); ?>
	<?php wp_footer(); ?>
	
</div><!--.CustomBG-->
</div><!--.BodyBG-->
</body>
</html>