<?php 
	$type = get_post_type();
	$faculty = false;
	
	if ($type === 'staff') {
		$staff_type = get_faculty_or_staff();
		
		if ($staff_type === 'faculty') {
			$faculty = true;
		}
	}
?>
<div class="info-box">

	<?php 
		if ($type === 'staff' && has_post_thumbnail()) {
			if ($faculty)
				the_post_thumbnail( array(530, 9999) );
			else 
				the_post_thumbnail( array(210, 9999) );
		}
	?>
	
	<div class="content">
	
		<?php if ($type === 'staff'): ?>
	
			<?php if ($office = rwmb_meta( '_pixsosw_office_location' )): ?>
				<p class="staff-office">Office: <?php echo $office ?></p> 
			<?php endif; ?>
				
			<?php if ($phone = rwmb_meta( '_pixsosw_phone_number' )): ?>
				<p class="staff-phone"><?php echo $phone; ?></p>
			<?php endif; ?>	
			
			<?php if ($email = rwmb_meta( '_pixsosw_email' )): ?>
				<p class="staff-email">
					<a href="mailto:<?php echo rwmb_meta( '_pixsosw_email' ); ?>">
						<?php echo $email; ?>
					</a>
				</p>
			<?php endif; ?>
			
			<?php if ($vita = rwmb_meta( 'staff-vita', 'type=file')): ?>
				<p class="staff-vita">
					<?php 
						foreach ( $vita as $info ) {
							echo "<a class='button' href='{$info['url']}' title='{$info['title']}'>Full Vita</a>";
						 } 
					?>
				</p>
			<?php endif; ?>
			
			<?php if ($google_scholar = rwmb_meta( '_pixsosw_goo_sch_url')): ?>
				<p class="google-scholar">
					<a href="<?php echo $google_scholar; ?>">Google Scholar Page</a>
				</p>
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php if ($type === 'field-placement'): ?>
			<?php
				
				$concentration = get_formatted_concentration($post->ID);
				
				if ($program = rwmb_meta( '_pixsosw_degree_program' )):
					
					switch ($program) {
						case 'MSW': 
							$program_text = "MSW Program";
							break;
						case "BSW":
							$program_text = "BSW Program";
							break;
						default: 
							$program_text = "Any Program";
							break;
					}
			?>
					<p class="italic"><?php echo $program_text; ?></p>
			<?php endif; ?>
			
			<?php if ($address = rwmb_meta('_pixsosw_address_short')): ?>
				<p><span class="bold">Location:</span> <?php echo $address; ?></p>
			<?php endif; ?>
			
			<?php if ($concentration): ?>
				<p><span class="bold">Concentration:</span> <?php echo $concentration; ?></p>
			<?php endif; ?>
			
			<?php if ($url = rwmb_meta('_pixsosw_info_url')): ?>
				<p><a href="<?php echo $url; ?>"><?php echo $url; ?></a></p>
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php if ($type === 'job'): ?>
			<?php if ($organization = rwmb_meta('_pixsosw_organization')): ?>
				<p class="italic"><?php echo $organization; ?></p>
			<?php endif; ?>
			
			<?php if ($location = rwmb_meta('_pixsosw_location')): ?>
				<p><span class="bold">Location:</span> <?php echo $location; ?></p>
			<?php endif; ?>
			
			<?php if ($end_date = rwmb_meta('_pixsosw_end_date')): ?>
				<p><span class="bold">End date:</span> <?php echo $end_date; ?></p>
			<?php endif; ?>			
						
			<?php if ($contact_website = rwmb_meta('_pixsosw_contact_website')): ?>
				<p><a href="<?php echo $contact_website; ?>"><?php echo $contact_website; ?></a></p>
			<?php endif; ?>
			
		<?php endif; ?>
		
	</div>
	
</div>
