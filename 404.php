<main role="main">
	<div class="wrap">
		<article class="content">
			
			<?php if ($page = get_page_by_title("404")): ?>
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
					<?php get_template_part( 'content' ); ?>
				<?php endwhile;endif; ?>
			
			<?php else: ?>
		
				<h1>Page not found</h1>
				<p class="intro-text">We're sorry, but the page you requested was not found.</p>
				<h2>Available options</h2>
				<ul>
					<li><a href="<?php bloginfo('url'); ?>">Return to homepage</a></li>
				</ul>
			
			<?php endif; ?>
		</article>
	</div>
</main>