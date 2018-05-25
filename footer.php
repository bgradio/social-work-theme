<footer>
	<div class="decor">
		<div class="wrap">
			 <ul>
			 	<li>Educating</li>
			 	<li>Innovating</li>
			 	<li>Transforming</li>
			 	<li>Advocating</li>
			 	<li>Strengthening Vulnerable Families</li>
			 </ul>
		</div>
	</div>
	<div class="footer-content">
		<div class="wrap">
			<div class="row-fluid">
				<div class="span4">
					<img class="footer-logo" src="<?php bloginfo('template_url'); ?>/img/ssw_footer_logo.png" alt="School of Social Work logo" width="275" height="68">
					<div class="contact">
						<p class="address">1010 W. Nevada Street | Urbana, IL 61801</p>
						<a href="mailto:socialwork@illinois.edu" class="email">socialwork@illinois.edu</a>
						<a href="tel:217-333-2261" aria-label="Phone number" class="phone">217-333-2261</a>
						<a href="tel:217-244-5220" aria-label="Fax number" class="fax">217-244-5220</a>
					</div>
				</div>
				<div class="span2">
					<div class="socialmedia">
						<?php
							if (is_active_sidebar('constant-widget')) {
								dynamic_sidebar('constant-widget');
							}
						?>
						<a class="fb" aria-label="facebook" href="https://www.facebook.com/socialwork.illinois">Like us</a>
            <a class="tw" aria-label="twitter" href="https://twitter.com/UofISocialWork">Follow us</a>
						<a class="in" aria-label="linkedin" href="https://www.linkedin.com/school/15094839">Connect with us</a>
						<a class="yt" aria-label="youtube" href="http://www.youtube.com/user/socialworkillinois">Watch us</a>
            <a class="ig" aria-label="instagram" href="http://instagram.com/illinois_socialwork">Follow us</a>
					</div>
					<div class="mailinglist">
						<?php //input field for mailing list ?>
					</div>
				</div>
				<div class="span2">
					<?php
						if (has_nav_menu('footer-menu')) {
							wp_nav_menu(array('theme_location'  => 'footer-menu'));
						}
					?>
				</div>
				<div class="span4">
					<?php
						if (is_active_sidebar('footer-widget')) {
							dynamic_sidebar('footer-widget');
						}
						
					?>
				</div>
			</div>
			<p class="copyright">&copy;<?php echo date('Y'); ?> University of Illinois School of Social Work</p>
			<div class="ses-logo-container">
				<a class="ses-logo" href="http://150.illinois.edu"></a>
			</div>
		</div>
	</div>

    <!-- OneTrust Cookies Settings button start -->
    <a class="optanon-show-settings">Cookie Settings</a>
	<!-- OneTrust Cookies Settings button end -->
</footer>
</div> <!-- end container -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23585451-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php wp_footer(); ?>
</body>
</html>
