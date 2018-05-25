<?php
	$staff_type = get_faculty_or_staff();
	$sidebar = determine_sidebar($post->ID);
?>

<?php if ($staff_type !== 'faculty'): ?>
	<div class="left-sidebar">
<?php endif; ?>

 <article class="facultystaff <?php echo $staff_type; ?> content clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part('content'); ?>
		
			
	<?php endwhile;endif; ?>
</article>

<?php if ($staff_type !== 'faculty'): ?>
	</div>			
	<aside class="left">
		<?php get_template_part('info-box'); ?>	
	</aside>
<?php endif; ?>	
