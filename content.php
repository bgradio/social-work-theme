<?php
	$sidebar = determine_sidebar($post->ID);
	$type = get_post_type();
	$faculty = false;
	
	if ($type === 'staff') {
		$staff_type = get_faculty_or_staff();
		
		if ($staff_type === 'faculty') {
			$faculty = true;
		}
	}
?>

<section>
<div <?php if ($faculty) { echo 'class="content-left"';} ?>>
	
	<?php 
		// Page title 
		if ($type === 'testimonial'): 
			echo '<h1 class="staff-name">' . get_the_title() . ', ' . rwmb_meta( '_pixsosw_byline' ) . '</h1>'; 
		else: 
	?>
		<h1><?php the_title(); ?> </h1>
	<?php endif; ?>
	
	<?php 
		// Faculty and Staff byline
		if ($type === 'staff'):
			if ($byline = rwmb_meta('_pixsosw_title')):
	?>
				<p class="byline"><?php echo $byline; ?></p>
	<?php 			
			endif;
		endif;
	?>
	
	<?php if ($intro_text = get_post_meta($post->ID, '_pageintro', true)): ?>
		<p class="intro-text"><?php echo $intro_text ?></p>
	<?php endif; ?>
</div>
</section>

<div class="<?php echo ($sidebar || $faculty) ? 'content-left' :  'content-full'; ?>">
	<div class="content-body">

	<?php
		if ($type === 'job' || $type === 'field-placement' || ($type === 'staff' && $faculty)) {
			get_template_part('info-box'); 	
		}
	?>
	
	<?php 
		
		if ($type === 'field-placement') {
			if ($mission = rwmb_meta('_pixsosw_mission')) {
				echo '<h2>Mission</h2>';
				echo '<p>' . $mission . '</p>';
			}
		}
		
		if ($type === 'job' || $type === 'field-placement') {
			echo '<h2>Description</h2>';
		}
		
		/*
		 *  Main Content
		 */
		
		the_content(); 
		
		if ($type === 'job'): ?>
		
			<h2>Contact Info</h2>
			
			<?php if ($contact_name = rwmb_meta('_pixsosw_contact_name')): ?>
				<p><?php echo $contact_name; ?></p>
			<?php endif; ?>
			
			<?php if ($contact_address = rwmb_meta('_pixsosw_contact_address')): ?>
				<p><?php echo $contact_address; ?></p>
			<?php endif; ?>
			
			<?php if ($contact_phone = rwmb_meta('_pixsosw_contact_phone')): ?>
				<p><?php echo $contact_phone; ?></p>
			<?php endif; ?>
			
			<?php if ($contact_email = rwmb_meta('_pixsosw_contact_email')): ?>
				<p><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></p>
			<?php endif; ?>
			
			<?php if ($salary = rwmb_meta('_pixsosw_salary')): ?>
				<h2>Salary</h2>
				<p><?php echo $salary; ?></p>
			<?php endif; ?>
			
			<?php if ($additional = rwmb_meta('_pixsosw_additional_info')): ?>
				<h2>Additional Information</h2>
				<p><?php echo $additional; ?></p>
			<?php endif; ?>
			
		<?php endif; ?>
	<?php 
		// Return link
		if ($type === 'staff') :
		?>
			<a class="return" href="<?php echo display_back_link('staff-template'); ?>">Back to Faculty & Staff Directory</a>
		<?php
		endif;
		
		if ($type === 'field-placement'): ?>
			<a class="return" href="<?php echo display_back_link('field-placement-template'); ?>">Back to All Field Placement Opprotunities</a>
		<?php endif; 
	?>
	
	
	<?php
		// Page templates
		$page_template = get_post_meta( $post->ID, '_wp_page_template', true );
				
		if ($page_template !== ''): 
			switch ($page_template) {
				case 'templates/field-education-template.php': ?>
					<section class="content-feed field-education-feed">
						<?php display_field_education(); ?>
					</section>
				<?php
					break;
				case 'templates/field-placement-template.php': ?>
					<section class="content-feed placement-feed">
						<?php display_field_placement_feed(); ?>
					</section>
				<?php
					break;
				case 'templates/job-template.php': ?>
					<section class="content-feed job-feed">
						<?php display_job_feed(); ?>
					</section>
				<?php
					break;
				case 'templates/news-template.php': ?>
					<section class="content-feed news-feed">
						<?php display_news_feed(); ?>
					</section>
				<?php
					break;
				case 'templates/news-events-template.php': ?>
					<section class="content-feed mini-news-feed">
						<header>
							<h2>Recent News</h2>
							<a class="view-all" href="<?php echo display_back_link('news-template'); ?>">all news</a>
						</header>
						<?php display_mini_news(); ?>
					</section>
					<section class="event-feed">
						<header>
							<h2>Upcoming Events</h2>
							<a class="view-all" href="<?php echo get_calender_url(); ?>">all events</a>
						</header>
						<script type='text/javascript' src='http://illinois.edu/calendar/pc/935/1.js'></script>
					</section>	
				<?php
					break;
				case 'templates/staff-template.php': ?>
					<section class="content-feed staff-feed">
						<?php display_staff_feed(); ?>
					</section>
				<?php
					break;
				case 'templates/testimonial-template.php': ?>
					<section class="content-feed testimonial-feed">
						<?php display_story_feed(); ?>
					</section>	
				<?php
					break;
			}
		endif; 
	?>
	</div> <?php // content-body ?>
</div>  <?php // content-full or content-left ?>

<?php if ( $sidebar ) : ?>
	<aside class="right">
		<?php
			if ($sidebar === 'widgets') {
				dynamic_sidebar('blank_sidebar');
			}
			else {
				$sidebar = shortcode_empty_paragraph_fix($sidebar);
				$sidebar = do_shortcode($sidebar);
				echo $sidebar;
			}
		?>
	</aside>
<?php endif; ?>

	
