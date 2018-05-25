<?php
/***********************************************************************************
Helper functions is included in functions.php and handles functions relating to
creating shortcodes for stories, etc and their widgets. 
Functions included in this are:

display_back_link:		     Returns to the first found feed page of a given type
is_news_template:            For determining if you're on the all news page
************************************************************************************/


function display_back_link( $template_name ) {
	
	$args = array(
		'post_type'  => 'page', 
		'post_per_page' => 1,
		'meta_query' => array( 
			array(
				'key'   => '_wp_page_template', 
				'value' => 'templates/' . $template_name . '.php',
			)
		)
	);
	$template_query = new WP_Query( $args );
	if ($template_query->have_posts()) : while ($template_query->have_posts()) : $template_query->the_post();
		$back_link = get_permalink();
	endwhile;
	else:
		$back_link = "#";
	endif;
	wp_reset_query();


	return $back_link;
}

function get_job_board_post_id() {
	
	$job_id = false;
	
	$args = array(
		'post_type'  => 'page', 
		'post_per_page' => 1,
		'meta_query' => array( 
			array(
				'key'   => '_wp_page_template', 
				'value' => 'templates/job-template.php',
			)
		)
	);
	
	$template_query = new WP_Query( $args );
	if ($template_query->have_posts()) { 
		while ($template_query->have_posts()) { $template_query->the_post();
			$job_id = get_the_id();
		}
	}
	wp_reset_postdata();	
	return $job_id;
}

function get_field_placement_post_id() {
	$field_id = false;
	
	$args = array(
		'post_type'  => 'page', 
		'post_per_page' => 1,
		'meta_query' => array( 
			array(
				'key'   => '_wp_page_template', 
				'value' => 'templates/field-placement-template.php',
			)
		)
	);
	
	$template_query = new WP_Query( $args );
	if ($template_query->have_posts()) { 
		while ($template_query->have_posts()) { $template_query->the_post();
			$field_id = get_the_id();
		}
	}


	return $field_id;
}

function get_page_template_id( $template_name ) {

	$id = false;
	
	$args = array(
		'post_type'  => 'page', 
		'post_per_page' => 1,
		'meta_query' => array( 
			array(
				'key'   => '_wp_page_template', 
				'value' => 'templates/' . $template_name . '.php',
			)
		)
	);
	
	$template_query = new WP_Query( $args );
	if ($template_query->have_posts()) { 
		while ($template_query->have_posts()) { $template_query->the_post();
			$id = get_the_id();
		}
	}
	wp_reset_postdata();

	return $id;
	
}

function get_formatted_concentration($post_id) {
	$concentration = array();
	$string = "";
	$terms = get_the_terms($post_id, 'concentration');
	
	if ($terms) {
		foreach ($terms as $t) {
			$concentration[] = $t->name;
		}
		$string = implode(", ", $concentration);
	}
	
	return $string;
}