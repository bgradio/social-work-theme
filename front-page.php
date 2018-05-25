<main>
	<div class="carousel">
		<?php display_carousel(); ?>
	</div>
	<div class="s1">
		<div class="wrap">
			<div class="row-fluid">
				<div class="span8">
					<?php dynamic_sidebar('frontpage-1'); ?>
					<?php dynamic_sidebar('frontpage-2'); ?>
				</div>
				<div class="span4 testimonial">
                                       	<?php dynamic_sidebar('frontpage-3'); ?>
                                </div>
			</div>
		</div>
	</div>

	<?php $announcement_args = array( 'post_type' => 'announcement', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1, 'meta_key' => '_pixsosw_active', 'meta_value' => 1 ); ?>
	<?php $announcement_query = new WP_Query( $announcement_args );	?>
	<?php if( $announcement_query->have_posts() ): ?>
		<?php while( $announcement_query->have_posts() ): $announcement_query->the_post();  ?>
			<div class="announcement-banner">
				<div class="wrap">
					<div class="announcement">
						<div class="announcement-flag"></div>
						
						<div class="announcement-content">
							<?php echo '<p class="announcement-title">' . get_the_title() . '</p>'; ?>
							<?php echo '<a class="announcement-url" href="' . get_post_meta( get_the_ID(), '_pixsosw_url', true ) . '">' . get_the_content() . '</a>'; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

	<div class="s2">
		<div class="wrap">
			<div class="row-fluid">
				<div class="span8">
					<section class="content-feed mini-news-feed">
						<header>
							<h2>Recent News</h2>
							<a class="view-all" href="<?php echo display_back_link('news-template'); ?>">all news</a>
						</header>
						<?php display_mini_news(); ?>
					</section>
				</div>
				<div class="span4">
					<section class="event-feed">
						<header>
							<h2>Upcoming Events</h2>
							<a class="view-all" href="<?php echo get_calender_url();  ?>">all events</a>
						</header>
						<script type='text/javascript' src='http://illinois.edu/calendar/pc/935/1.js'></script>
						<!-- <?php echo get_rss_calendar(); ?> -->
					</section>
				</div>
			</div>
		</div>
	</div>
</main>
