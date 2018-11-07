<?php
/*
 * The template for displaying search forms in Silverline
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label style="display:none;" for="s" class="assistive-text"><?php _e( 'Search' ); ?></label>
		<input type="text" class="field" size="40" name="s" id="s" value="type and hit enter to search" onfocus="if(this.value=='type and hit enter to search')this.value='';" onblur="if(this.value=='')this.value='type and hit enter to search';" />
		
		
		<input style="display:none;" type="submit" class="submit" name="submit" id="searchsubmit"  value="" />
	</form>
