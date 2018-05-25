<div class="left-sidebar">
	<article class="content">
		<?php 
			echo '<h1>'; 
			single_cat_title();
			echo '</h1>'; 
		?>
		<section class="content-feed testimonial-feed">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				<?php get_template_part('loop'); ?>
		<?php endwhile; endif; ?>
		
		<?php
		 global $wp_query;
		echo '<div class="nav-next alignright">';
			echo get_previous_posts_link( 'Previous' );
		echo '</div>';
		echo '<div class="nav-previous alignleft">';
			echo get_next_posts_link( 'Next', $wp_query->max_num_pages );
		echo '</div>';
		?>
		</section>
	</article>
	<aside class="left">
		<?php 
			if (has_nav_menu('stories-menu')) {
				wp_nav_menu(array('theme_location'  => 'stories-menu')); 
			}
		?>
	</aside>
</div>