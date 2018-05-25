
	<article class="content">
		<?php 
			echo '<h1>'; 
			single_cat_title();
			echo '</h1>'; 
		?>
		<section class="content-feed news-feed">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				<?php get_template_part('loop'); ?>
		<?php endwhile; endif; ?>
		</section>
	</article>