<?php
/*
Template Name: Contact
*/

get_template_part( 'header' ); ?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
	
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = of_get_option('contact-email', 'no entry');
		}
		$subject = 'Contact Email From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>

		<div style="width:653px;" class="column-8 ">
		
		<div class="box-loop">
		<h3><?php the_title(); ?></h3>
		</div>

		<div id="content" class="content-page">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
					<div style="margin-top:-2px;" class="entry-content">
			
							<?php the_content(); ?>
							
						<form style="margin-top:-22px;"  action="<?php the_permalink(); ?>" id="contactForm" method="post">
							<ul id="contact_form" style="list-style:none;  margin-left:0;" class="contactform">
							<li>
								
								<input type="text" style="margin-left:0px; width:400px;" name="contactName" id="contactName" value="Name*<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" onfocus="if(this.value=='Name*')this.value='';" onblur="if(this.value=='')this.value='Name*';" />
								<?php if($nameError != '') { ?>
									<span class="error"><?=$nameError;?></span>
								<?php } ?>
							</li>

							<li>
								
								<input type="text" style="margin-left:0px; width:400px;" name="email" id="email" value="Email*<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" onfocus="if(this.value=='Email*')this.value='';" onblur="if(this.value=='')this.value='Email*';"/>
								<?php if($emailError != '') { ?>
									<span class="error"><?=$emailError;?></span>
								<?php } ?>
							</li>

							<li>
								<textarea style="margin-left:-0px; height:100px; min-height:100px; min-width:558px; max-width:558px; width:558px;" name="comments" id="commentsText" rows="10" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
								<?php if($commentError != '') { ?>
									<span class="error"><?=$commentError;?></span>
								<?php } ?>
							</li>

							<li><br/>
	
								<input style="margin:-25px 0px 0px 0px;" type="submit" class="submit" name="submit" value="Send Message" />
							</li>
						</ul>
						<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>
								<?php if(isset($emailSent) && $emailSent == true) { ?>
							<div class="thanks">
								<p style="margin-top:-10px; color:green;">Thanks, your email was sent successfully.</p>
								<div style="margin-bottom:-30px;"></div>
							</div>
						<?php } else { ?>
						<?php if(isset($hasError) || isset($captchaError)) { ?>
								<p style="color:red;" class="error">Sorry, an error occurred.<p>
							<?php } ?>
					<div style="margin-bottom:-60px;"></div>
				<?php } ?>
				</div><!-- .entry-content -->
			</div><!-- .post -->

				<?php endwhile; endif; ?>
				</div><!-- #content -->
				</div><!-- #content -->
<?php get_template_part( 'sidebar-page' ); ?>

<?php get_template_part( 'footer' ); ?>