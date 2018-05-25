<?php 

	$type = get_post_type(); 
	$thumb = null;
	$thumbs = null;
	
	if ($type == 'staff')
		$thumbs = rwmb_meta( 'staff-thumbnail', 'type=image' );
	elseif (($type == 'testimonial' || $type == 'post') && is_single())
                $thumb = get_the_post_thumbnail($post->ID, 'carousel-thumbnail', array( 'class' => 'thumbnail' ));
	elseif ($type == 'testimonial' || $type == 'post')
		$thumb = get_the_post_thumbnail($post->ID, 'large-thumbnail', array( 'class' => 'thumbnail' ));
	else
		$thumb = get_the_post_thumbnail($post->ID, array( 'class' => 'thumbnail' ));
?>

<article class="clearfix">
	<?php 
		if ($thumb) {
			echo $thumb;
		}
		elseif ($thumbs) {
			foreach ( $thumbs as $t )
			  echo "<img class='thumbnail' src='{$t['url']}' width='{$t['width']}' height='{$t['height']}' alt='{$t['alt']}'>";
		}

	?>
	<?php if ($thumb || $thumbs): ?>
		<div class="content-wrap">
		<div class="content">
	<?php endif ?>
		
			<?php 
				if ($type === 'testimonial') {
					 $title = get_the_title() . ", " . rwmb_meta( '_pixsosw_byline' ); 
				}
				else {
					$title = get_the_title();
				}	
			?>
			
			<?php if ($type == 'field-placement'): ?>
                                <?php if ($url = rwmb_meta('_pixsosw_info_url')) ?>
                                        <h2 class="title"><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h2>
                        <?php elseif ($type == 'staff' && ( has_term( 'staff', 'classification' ) || has_term( 'faculty', 'classification' ) )): ?>
                                <?php if ($ext_url = rwmb_meta('_pixsosw_ext_url')): ?>
                                        <h2 class="title"><a href="<?php echo $ext_url; ?>"><?php echo $title; ?></a></h2>
                                <?php else: ?>
                                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>
                                <?php endif; ?>
                        <?php elseif ($type == 'staff' && has_term( 'research', 'classification' )): ?>
                                <?php if ($ext_url = rwmb_meta('_pixsosw_ext_url')): ?>
                                        <h2 class="title"><a href="<?php echo $ext_url; ?>"><?php echo $title; ?></a></h2>
                                <?php else: ?>
                                        <h2 class="title"><?php echo $title; ?></h2>
                                <?php endif; ?>
                        <?php elseif ($type == 'staff' && has_term( 'adjunct', 'classification' )): ?>
                                <h2 class="title"><?php echo $title; ?></h2>
                        <?php else: ?>
                                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>
                        <?php endif; ?>

			<?php if ($type == 'post'): ?>
                                <p class="date"><?php the_time('F j, Y') ?></p>
                        <?php endif; ?>
	
			<?php if ($type === 'testimonial' || $type === 'post'): ?>
					<?php ($type === 'testimonial') ? $more = 'See full story' : $more = "Read more"; ?>
					
					<p>
						<?php echo get_the_excerpt(); ?> 
						... <a class="readmore" href="<?php the_permalink($post->ID); ?>"><?php echo $more; ?></a>
					</p>
				
			<?php elseif ($type == 'staff'): ?>
			
				<?php
				if ( $title = rwmb_meta( '_pixsosw_title' ) )
					echo '<p class="faculty-staff-title">' . $title . '</p>';
					
				if ( $office = rwmb_meta( '_pixsosw_office_location' ) )
					echo '<p class="faculty-staff-office">Office: ' . $office . '</p>';
					
				if ( $phone = rwmb_meta( '_pixsosw_phone_number' ) )
					echo '<p class="faculty-staff-phone">' . $phone . '</p>';
					
				if ( $email = rwmb_meta( '_pixsosw_email' ) )
					echo '<p class="faculty-staff-email"><a href="mailto:' . $email . '">' . $email . '</a></p>';
					
				?>
			
			<?php elseif ($type == 'field-placement'): ?>
				<?php
					$concentration = get_formatted_concentration($post->ID);
					
					if ($program = rwmb_meta( '_pixsosw_degree_program' )):
						switch ($program) {
							case "MSW": 
								$program_text = "MSW Program";
								break;
							case "BSW":
								$program_text = "BSW Program";
								break;
							default: 
								$program_text = "Any Program";
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
				
				<?php if ($mission = rwmb_meta('_pixsosw_mission')): ?>
					<p><span class="bold">Mission: </span><?php echo $mission; ?></p>
				<?php endif; ?>
				
				<?php if ($url = rwmb_meta('_pixsosw_info_url')): ?>
					<p><a href="<?php echo $url; ?>"><?php echo $url; ?></a></p>
				<?php endif; ?>
						
			<?php elseif ($type === 'job'): ?>
				
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

				<?php if ($salary = rwmb_meta('_pixsosw_salary')): ?>
					<p><span class="bold">Salary: </span><?php echo $salary; ?></p>
				<?php endif; ?>
				
				<?php if ($additional = rwmb_meta('_pixsosw_additional_info')): ?>
					<p><span class="bold">Additional information: </span><?php echo $additional; ?></p>
				<?php endif; ?>	
				
			<?php endif; ?>
			
			
	<?php if ($thumb || $thumbs): ?>
		</div>
		</div>
	<?php endif; ?>
	
</article>
