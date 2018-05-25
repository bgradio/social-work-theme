<div class="left-sidebar">
	<article class="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content'); ?>
		<?php endwhile;endif; ?>
		
		<?php if (is_single()): ?>
			<div class="clearfix"></div>
			<div class="stories-carousel-wrapper">
				<div class="stories-carousel">
					<h2>More Testimonials</h2>
                			<?php display_story_carousel(); ?>
				</div>
        		</div>
			<div class="stories-mobile">
                        	<h2>More Testimonials</h2>
                                <?php display_random_story(); ?>
                        </div>
		<?php endif; ?>
	</article>

	<aside class="left">
		<?php 
			if (has_nav_menu('stories-menu')) {
				wp_nav_menu(array('theme_location'  => 'stories-menu')); 
			}
		?>
	</aside>
</div>
