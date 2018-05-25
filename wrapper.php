<?php get_header( my_template_base() ); ?>
<?php $type = get_post_type(); ?>

<?php if (is_front_page()): ?>
	<?php get_template_part('front-page'); ?>
<?php elseif (is_404()): ?>
	<?php get_template_part('404'); ?>
<?php else: ?>
	<?php 
		$subnav = get_subnav();
	?>
	<main class="<?php  if ($subnav) { echo 'left-sidebar'; } ?>" role="main">
		<div class="wrap">
			<?php if ($subnav) { display_submenu_toggle(); } ?>
 			<?php if ( (is_page() || is_single() || is_archive()) && ($type != 'staff') ) { generate_breadcrumbs(); } ?>
 			
			<?php include my_template_path(); ?>
			
			<?php if ($subnav): ?>
				<aside class="left">
					<nav role="navigation">
						<?php echo $subnav; ?>
					</nav>
				</aside>
			<?php endif; ?>
		</div>
	</main>
<?php endif; ?>

<?php get_footer( my_template_base() ); ?>