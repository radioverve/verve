<!-- begin sidebar -->
 
<div id="sidebar">
	
	<div class="video">
		<h3>Now Playing</h3>
		<ul id="mycarousel" class="jcarousel-skin-tango">
                        <li>Rock<br><small>Thermal and a Quarter - Paper Puli</small><br><small><a href="#">Listen Now</a></small></li>
                        <li>Metal<br><small>Demonic Resurrection - Destruction something</small><br><small><a href="#">Listen Now</a></small></li>
                        <li>Hindi<br><small>Unlucky Ali - Mujhe tumso something hai</small><br><small><a href="#">Listen Now</a></small></li>
                        <li>Devotional<br><small>Raakshash - God makes me blue</small><br><small><a href="#">Listen Now</a></small></li>
                        <li>Classical<br><small>Manasi Prasad - I talk way too much</small><br><small><a href="#">Listen Now</a></small></li>
                        <li>Electronic<br><small>Shaair N Func - Its probably that</small><br><small><a href="#">Listen Now</a></small></li>
		</ul>		
	</div>
	<div class="newsletter">
	
		<!--To enable the eNews &amp; Updates feature, go to your WP dashboard and go to Presentation -> Revolution Music Options and enter your Feedburner ID.-->

		<h3>Login</h3>
		<!--<p>Sign up to receive breaking news <br /> as well as receive other site updates!</p><form id="subscribe" action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p><input type="text" value="Enter your email address..." id="subbox" onfocus="if (this.value == 'Enter your email address...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your email address...';}" name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php $feedburner_id = get_option('revmusic_feedburner_id'); echo $feedburner_id; ?>" name="url"/><input type="hidden" value="eNews Subscribe" name="title"/><input type="submit" value="GO" id="subbutton" /></p></form>-->
		
		<div id="login">
		
			<form name="loginform" id="loginform" action="<?=$blogurl ?>/wp-login.php" method="post">
				<p>
					<label>Username<br />
					<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
				</p>
				<p>
					<label>Password<br />
					<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
			 
				</p>
				<p class="submit">
					<input type="submit" name="wp-submit" id="wp-submit" value="Log In" tabindex="100" />
					<input type="hidden" name="redirect_to" value="<?=$postlink ?>#respond" />
					<input type="hidden" name="testcookie" value="1" />
				</p>
				<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Remember Me</label></p>	
			</form>
		 
			<p>
			<a href="<?=$blogurl ?>/wp-login.php?action=register" title="Register">Register</a>
			<a href="<?=$blogurl ?>/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a>
			</p>
		</div>

	</div>
		
	<div class="video">
	
		<!--To determine what video is shown on the homepage, go to your WP dashboard and go to Presentation -> Revolution Music Options and enter your video code here.-->
	
		<h3>Featured Video</h3>
		<?php $video = get_option('revmusic_video'); echo stripslashes($video); ?>
		
	</div>
	
	<?php include(TEMPLATEPATH."/revolution_music/sidebar_left.php");?>
	
	<?php //include(TEMPLATEPATH."/sidebar_right.php");
	?>
	
</div>

<!-- end sidebar -->