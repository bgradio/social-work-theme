<?php

/***********************************************************************************
Shortcode functions, for use within the wysiwyg or widget areas.

Functions included in this are:

ssw_row_handler - Creates a row for displaying content within columns
ssw_column_handler - Defines the columns and column size for content, must be contained within [row]
ssw_button_handler - Creates a styled button for links
display_story_widget - Displays a random testimonial based on category provided
display_application_widget - Displays the apply now links
************************************************************************************/

/**
 * [row] 
 *
 * wraps the column shortcode
 **/ 
 
function ssw_row_handler( $atts, $content = null ) {
	
	$results = '<div class="row-fluid">';
	$results .= $content;
	$results .= '</div>';
	
	return do_shortcode( $results );
}

add_shortcode( 'row', 'ssw_row_handler' );

/**
 * [column size=""]   
 *
 * sizes 1-12 column
 **/ 
 
function ssw_column_handler( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'size' => 0,
	), $atts ) );
	
	$results = '<div class="span' . $size . '">';
	$results .= $content;
	$results .= '</div>';
	
	return do_shortcode( $results );
}

add_shortcode( 'column', 'ssw_column_handler' );


/**
 * [button link="#" type="" target=""]
 *
 * type relates to css classes, currently the only css class is 'wide'.
 * target relates to where the link will open, whether the current window or a new one. Common options are: _blank, _parent, _self and _top.
 **/ 

function ssw_button_handler( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'link' => "#",
		'type' => '',
		'target' => ''
	), $atts ) );
	
	$results = '<p><a class="button ';
	
	if ($type != '')
		$results .= $type;
			
	$results .= '" href="' . esc_url($link) . '" ';

	if ($target != '')
		$results .= 'target="' . $target . '">';
	else
		$results .= 'target="_self">';

	$results .= $content;
	$results .= '</a></p>';
	
	return do_shortcode( $results );
}

add_shortcode( 'button', 'ssw_button_handler' );

/**
 * Widgets as shortcodes
 **/

function display_story_widget( $atts ) {  
	extract( $atts );
	
	if ($cat == 'Any') {
		remove_all_filters('posts_orderby');
		remove_all_filters('posts_order');
		$args = array( 'post_type' => 'testimonial', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'rand' );
	} else {
		$tax_args = array ( array ('taxonomy' => 'testimonial-category',
							'field' => 'slug',
							'terms' => $cat ) );
		$args = array( 'post_type' => 'testimonial', 'posts_per_page' => -1, 'orderby' => 'rand', 'tax_query' => $tax_args );
	}
		
	$loop = new WP_Query( $args );
	
	$widget_string = '';
	
	if ( $loop->have_posts() ):
		global $is_widget;
		$is_widget = true; //This is used for the custom excerpt read more.		
		
			while ( $loop->have_posts() ): $loop->the_post();
				$widget_string .= '<div class="testimonial-widget group">';
					$widget_string .= '<div class="thumbnail">';
                                                $widget_string .= '<a href="' . get_permalink() . '">';

                                                if (is_front_page())
                                                        $widget_string .= get_the_post_thumbnail( get_the_ID(), 'widget-front' );
                                                else
                                                        $widget_string .= get_the_post_thumbnail( get_the_ID(), 'widget-thumbnail' );

                                                $widget_string .= '</a>';
                                        $widget_string .= '</div>';

					$widget_string .= '<div class="title">';
						$widget_string .= '<p>' . get_the_title() . ', ' . rwmb_meta( '_pixsosw_byline' ) . '</p>'; 
					$widget_string .= '</div>';

					$widget_string .= '<p class="excerpt">';
					$widget_string .= '"' . get_the_excerpt() . '" ' . '<a href="' . get_permalink() . '">See full story</a>';
					$widget_string .= '</p>';
				$widget_string .= '</div>';
			endwhile;
			wp_reset_postdata();		

	endif;
	
	return $widget_string;
}

add_shortcode( 'story', 'display_story_widget' );

function display_application_widget() {
	$widget_string = '';
	$permalink = get_site_url();
	
	$widget_string .= '<div class="application-widget">';
			$widget_string .= '<p class="title">Apply now</p>';
			$widget_string .= '<ul>';
				$widget_string .= '<li class="first"><a href="' . $permalink . '/academics/bachelor-of-social-work/admissions-information/">BSW Program</a></li>';
				$widget_string .= '<li class="second"><a href="' . $permalink . '/academics/master-of-social-work/admissions-information/">MSW Program</a></li>';
				$widget_string .= '<li class="third"><a href="' . $permalink . '/academics/doctoral-program-ph-d/admissions-information/">PHD Program</a></li>';
			$widget_string .= '</ul>';
		$widget_string .= '</div>';
		
		return $widget_string;
}

add_shortcode( 'apply-links', 'display_application_widget' );

/**
 * Shortcode empty paragraph fix 
 **/
 
function shortcode_empty_paragraph_fix($content)
{   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);

	return $content;
}

add_filter('the_content', 'shortcode_empty_paragraph_fix');
