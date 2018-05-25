<?php
/********************************************************************************
Feed functions is included in functions.php and handles the posting and filtering
of uiuc-ssw feeds. Functions included in this are:

display_staff_feed:           Faculty and Staff
display_story_feed:           Stories
display_news_feed:            News
display_field_placement_feed: Field Placement
display_job_feed:             Jobs
display_field_education:      Faculty and Staff -> Field Education taxonomy
get_rss_calendar:             Returns a formatted calendar feed
display_mini_news:            Mini News Feed
display_story_carousel:       Story Carousel Slider
display_random_story:	      Displays a random testimonial for mobile
*********************************************************************************/

function display_staff_feed() {
	echo '<div class="filter-position-label">';
		echo '<label>Filter by position</label>';
	echo '</div>';
	
	echo '<ul class="filter-buttons">';
		if( isset( $_GET['c'] ) && $_GET['c'] == 'faculty' ):
			echo '<li class="active"><a href="?c=faculty">Faculty</a></li>';
		else:
			echo '<li><a href="?c=faculty">Faculty</a></li>';
		endif;
		if( isset( $_GET['c'] ) && $_GET['c'] == 'adjunct' ):
			echo '<li class="active"><a href="?c=adjunct-faculty">Adjunct</a></li>';
		else:
			echo '<li><a href="?c=adjunct">Adjunct</a></li>';
		endif;
		if( isset( $_GET['c'] ) && $_GET['c'] == 'staff' ):
			echo '<li class="active"><a href="?c=staff">Staff</a></li>';
		else:
			echo '<li><a href="?c=staff">Staff</a></li>';
		endif;
		if( isset( $_GET['c'] ) && $_GET['c'] == 'research' ):
			echo '<li class="active"><a href="?c=research">CFRC</a></li>';
		else:
			echo '<li><a href="?c=research">CFRC</a></li>';
		endif;
		if( isset( $_GET['c'] ) && $_GET['c'] == 'prevention' ):
                        echo '<li class="active"><a href="?c=prevention">CPRD</a></li>';
                else:
                        echo '<li><a href="?c=prevention">CPRD</a></li>';
                endif;
	echo '</ul>';

	echo '<div class="filter-last-name-label">';
		echo '<label>Or, filter by last name</label>';
	echo '</div>';

	$hardlink = get_permalink();
	echo '<div class="filter-last-name">';
		echo '<ul class="last-name-list">';
			if( isset( $_GET['l'] ) && $_GET['l'] == 'A' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=A">A</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=A">A</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'B' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=B">B</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=B">B</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'C' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=C">C</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=C">C</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'D' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=D">D</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=D">D</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'E' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=E">E</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=E">E</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'F' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=F">F</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=F">F</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'G' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=G">G</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=G">G</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'H' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=H">H</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=H">H</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'I' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=I">I</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=I">I</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'J' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=J">J</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=J">J</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'K' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=K">K</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=K">K</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'L' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=L">L</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=L">L</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'M' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=M">M</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=M">M</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'N' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=N">N</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=N">N</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'O' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=O">O</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=O">O</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'P' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=P">P</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=P">P</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'Q' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=Q">Q</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=Q">Q</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'R' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=R">R</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=R">R</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'S' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=S">S</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=S">S</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'T' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=T">T</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=T">T</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'U' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=U">U</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=U">U</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'V' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=V">V</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=V">V</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'W' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=W">W</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=W">W</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'X' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=X">X</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=X">X</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'Y' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=Y">Y</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=Y">Y</a></li>';
			endif;
			if( isset( $_GET['l'] ) && $_GET['l'] == 'Z' ):
				echo '<li><a class="active" href="' . $hardlink . '?l=Z">Z</a></li>';
			else:
				echo '<li><a href="' . $hardlink . '?l=Z">Z</a></li>';
			endif;
		echo '</ul>';
	echo '</div>';

	if( ( isset( $_GET['c'] ) && $_GET['c'] == 'faculty' ) || ( isset( $_GET['r'] ) ) ){
		echo '<form method="get" id="faculty-listing-research">';
			echo '<div class="filter-research-label">';
				echo '<label for="r">Search Faculty by Research Interest</label>';
			echo '</div>';

			echo '<div class="filter-dropdown">';
				echo '<select name="r" onchange="this.form.submit()">';
					echo '<option value="">Choose Research Interest</option>';
					$terms = get_terms( 'research-interest' ); // Fix: 'Classification' is one taxonomy. Alternatively, there is 'research-interest'. Set up multiple taxonomy query.
					$count = count($terms);
					if ( $count > 0 ) {
					  // set ridiculous default value for 'r' to stop throwing undefined index -pek
					  $research_interest_term = ( isset( $_GET['r'] ) ) ? $_GET['r'] : 'Undefined';
						foreach ($terms as $term) {
							if ( $term->slug == $research_interest_term ) {
								$option = '<option value="'.$term->slug.'" selected>';
							}
							else {
								$option = '<option value="'.$term->slug.'">';
							}
							$option .= $term->name;
							//$option .= ' ('.$term->count.')';
							$option .= '</option>';
							echo $option;
						}
					}
				echo '</select>';
			echo '</div>';

			echo '<div class="filter-reset-container">';
				echo '<a class="filter-reset button" href="' . get_permalink() . '">Reset</a>';
			echo '</div>';

		echo '</form>';
	} else {
		echo '<form method="get" id="faculty-listing-research">';
			echo '<div class="filter-reset-container-alone">';
				echo '<a class="filter-reset button" href="' . get_permalink() . '">Reset</a>';
			echo '</div>';
		echo '</form>';
	}

	// Setting the "paged" parameter
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

  // use the extended query
  $query = new Staff_Query();
  // var_dump( $query );

	if ( $query->have_posts() ):

		echo '<div class="posts">';

		while ( $query->have_posts() ) : $query->the_post();
			get_template_part('loop');
		endwhile;

		// do we need to reset? depends on what else is on the page -pek
		// wp_reset_postdata();

		echo '</div>';

		echo '<div class="nav-next alignright">';
			echo get_previous_posts_link( 'Previous' );
		echo '</div>';
		echo '<div class="nav-previous alignleft">';
			echo get_next_posts_link( 'Next', $query->max_num_pages );
		echo '</div>';

	endif;
}

// Class to simplify staff feed --pek
class Staff_Query extends WP_Query {
  function __construct( $args = array() ) {
    $defaults = array(
      'post_type' => 'staff',
      'posts_per_page' => 10, // -1 if we want no paging
	  'order' => 'ASC',
	  'orderby' => 'meta_value',
	  'meta_key' => '_pixsosw_last_name',
      'no_found_rows' => false, // set true if no paging
      'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
      'update_post_term_cache' => true,
      'update_post_meta_cache' => true,
    );
    $args = array_merge( $args, $defaults );

    // If we're filtering by a taxonomy, let's just add it here, much easier -pek
    if ( isset( $_GET['c'] ) ) {
		  $tax_args = array ( array (
					'taxonomy' => 'classification',
					'field' => 'slug',
					'terms' => $_GET['c']
					)
				);
			$args['tax_query'] = $tax_args;
		} elseif ( isset( $_GET['r'] ) ) {
		  $tax_args = array ( array (
					'taxonomy' => 'research-interest',
					'field' => 'slug',
					'terms' => $_GET['r']
					)
				);
			$args['tax_query'] = $tax_args;
		}

    // FYI after all this I found a newer cleaner filter:
    // http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_clauses -pek
    //
    // these filters let us add sql guts to specific parts of the wp query
   // add_filter( 'posts_join', array( $this, 'posts_join' ) );
    add_filter( 'posts_where', array( $this, 'posts_where' ) );
    add_filter( 'posts_groupby', array( $this, 'posts_groupby' ) );
    add_filter( 'posts_orderby', array( $this, 'posts_orderby' ) );

    // make it all happen, with our extended changes
    parent::__construct( $args );

    // remove those filters because they would affect any more queries anywhere
    //remove_filter( 'posts_join', array( $this, 'posts_join' ) );
    remove_filter( 'posts_where', array( $this, 'posts_where' ) );
    remove_filter( 'posts_groupby', array( $this, 'posts_groupby' ) );
    remove_filter( 'posts_orderby', array( $this, 'posts_orderby' ) );
  } // end constructor

    // now our filter functions
    function posts_join( $sql ) {
      global $wpdb;
      // if by first letter of last name
      if ( isset( $_GET['l'] ) ) {
        $sql .= " INNER JOIN wp_postmeta ON (wp_posts.ID = wp_postmeta.post_id)";
      }
      return $sql;
    }

    function posts_where( $sql ) {
      global $wpdb;
      // if by first letter of last name
      if( isset( $_GET['l'] ) ) {
        $namesort_value = $_GET['l'];
        $sql .= " AND (wp_postmeta.meta_key = '_pixsosw_last_name' AND CAST(wp_postmeta.meta_value AS CHAR) LIKE '$namesort_value%')";
      }
      return $sql;
    }

    function posts_orderby( $sql ) {
      global $wpdb;
	  return "$wpdb->postmeta.meta_value ASC";
    }

    function posts_groupby( $sql ) {
      global $wpdb;
      return "$wpdb->posts.ID";
    }


} // end Staff_Query class

function display_story_feed() {
		// Setting the "paged" parameter
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array ( 'post_type' => 'testimonial', 'posts_per_page' => 6, 'order' => 'ASC', 'paged' => $paged  );

		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ):

			echo '<div class="posts">'; // Wrap the results for styling.

			while ( $query->have_posts() ) : $query->the_post();

				get_template_part('loop');

			endwhile;

			echo '</div>';  // End div.posts

			echo '<div class="nav-next alignright">';
				echo get_previous_posts_link( 'Previous' );
			echo '</div>';
			echo '<div class="nav-previous alignleft">';
				echo get_next_posts_link( 'Next', $query->max_num_pages );
			echo '</div>';

		endif;
}

/* News feed */

function display_news_feed() {

	// Setting the "paged" parameter
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array (
	                'post_type' => 'post',
	                'posts_per_page' => 5,
	                'order' => 'DESC',
	                'paged' => $paged,
	                'orderby' => 'date' ,
	                'ignore_sticky_posts' => 1
 	              );

	$q = new WP_Query($args);

	if ($q->have_posts()) {

		echo '<div class="posts">';

		while ($q->have_posts()) {
			$q->the_post();

			get_template_part('loop');
		}

		echo '</div>';

		echo '<div class="nav-next alignright">';
			echo get_previous_posts_link( 'Previous' );
		echo '</div>';
		echo '<div class="nav-previous alignleft">';
			echo get_next_posts_link( 'Next', $q->max_num_pages );
		echo '</div>';

	}
}

/* Field placement feed */

function display_field_placement_feed() {
	echo '<div class="filter-field-label">';
		echo '<label>Choose a Program</label>';
	echo '</div>';


	echo '<ul class="filter-buttons clearfix">';
		/* Filter by concentration results should appear to be MSW only */

		if( !(isset( $_GET['q'] ) ) && ( !(isset( $_GET['c'] ) ) || $_GET['c'] == '' ) ):
			echo '<li class="active"><a href="' . get_permalink() . '">All</a></li>';
		else:
			echo '<li><a href="' . get_permalink() . '">All</a></li>';
		endif;
		if( isset( $_GET['q'] ) && $_GET['q'] == 'BSW' ):
			echo '<li class="active"><a href="?q=BSW">BSW</a></li>';
		else:
			echo '<li><a href="?q=BSW">BSW</a></li>';
		endif;
		if( ( isset( $_GET['c'] ) && $_GET['c'] != '' ) || ( isset( $_GET['q'] ) && $_GET['q'] == 'MSW' ) ):
			echo '<li class="active"><a href="?q=MSW">MSW</a></li>';
		else:
			echo '<li><a href="?q=MSW">MSW</a></li>';
		endif;
	echo '</ul>';

	if( $_GET['q'] != 'BSW' ) {
		echo '<form method="get" id="faculty-listing">';
			echo '<div class="filter-field-location">';
				echo '<div class="filter-field-location-label">';
					echo '<label>Filter by Location</label>';
				echo '</div>';

				echo '<select name="l" onchange="this.form.submit()">';
					echo '<option value="">Select Location</option>';

					$terms = get_terms( 'location' );
					$count = count($terms);
					if ( $count > 0 ) {
						foreach ($terms as $term) {
							if ( $term->slug == $_GET['l'] ) {
								$option = '<option value="'.$term->slug.'" selected>';
							}
							else {
								$option = '<option value="'.$term->slug.'">';
							}
							$option .= $term->name;
							$option .= ' ('.$term->count.')';
							$option .= '</option>';
							echo $option;
						}
					}
		echo '</select>';
			echo '</div>';

			echo '<div class="filter-field-concentration">';
				echo '<div class="filter-field-concentration-label">';
					echo '<label>Filter by Focus Area (MSW Only)</label>';
				echo '</div>';

				echo '<select name="c" onchange="this.form.submit()">';
					echo '<option value="">Select Focus Area</option>';
					$terms = get_terms( 'concentration' );
					$count = count($terms);
					if ( $count > 0 ) {
						foreach ($terms as $term) {
							if ( $term->slug == $_GET['c'] ) {
								$option = '<option value="'.$term->slug.'" selected>';
							}
							else {
								$option = '<option value="'.$term->slug.'">';
							}
							$option .= $term->name;
							$option .= ' ('.$term->count.')';
							$option .= '</option>';
							echo $option;
					}
					}
				echo '</select>';
			  echo '</div>';


			// Show results sorted by population served

			$terms = get_terms( 'population-served' );
			$count = count($terms);
			if ( $count > 0 ) {
				echo '<label>Filter by Population Served:</label>';
				foreach ($terms as $term) {
					if ( $term->slug == $_GET['q'] ) {
						$option = '<option value="'.$term->slug.'" selected>';
					}
					else {
						$option = '<option value="'.$term->slug.'">';
					}
					$option .= $term->name;
					$option .= ' ('.$term->count.')';
					$option .= '</option>';
					echo $option;
				}
			}

			echo '<div class="filter-reset-container">';
				echo '<a class="filter-reset button" href="' . get_permalink() . '">Reset</a>';
			echo '</div>';

		echo '</form>';
	} else {
		echo '<div class="spacer">';
			echo '<p class="disclaimer">Note: Field placements for BSW students are only available in Champaign County.</p>';
		echo '</div>';
	}

	// Setting the "paged" parameter
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	// Preset filtering by degree
	if ( isset($_GET['q']) ){
		$degree_filter = $_GET['q'];
	}
	else {
		$degree_filter = '';
	}

	// The Query
	if ( ( isset( $_GET['c'] ) && $_GET['c'] != '' ) && ( isset( $_GET['l'] ) && $_GET['l'] != '' ) ) {
		$tax_args = array (
			'relation' => 'AND',
			array (
				'taxonomy' => 'concentration',
				'field' => 'slug',
				'terms' => $_GET['c']
			),
			array (
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => $_GET['l']
			)
		);
		$args = array ( 'post_type' => 'field-placement', 'posts_per_page' => 6, 'order' => 'ASC', 'orderby' => 'title', 'paged' => $paged, 'tax_query' => $tax_args,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => '_pixsosw_degree_program',
					'value' => $degree_filter,
					'compare' => 'LIKE'
				),
				array(
					'key' => '_pixsosw_degree_program',
					'value' => 'all',
					'compare' => 'LIKE'
				)
			) 
		);
		//echo 'if concentration and location';
	} elseif ( ( isset( $_GET['c'] ) && $_GET['c'] != '' ) && ( isset( $_GET['l'] ) && $_GET['l'] == '' ) ) {
		$tax_args = array (
			'relation' => 'OR',
			array (
				'taxonomy' => 'concentration',
				'field' => 'slug',
				'terms' => $_GET['c']
			),
			array (
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => $_GET['l']
			)
		);
		$args = array ( 'post_type' => 'field-placement', 'posts_per_page' => 6, 'order' => 'ASC', 'orderby' => 'title', 'paged' => $paged, 'tax_query' => $tax_args,
		'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => '_pixsosw_degree_program',
					'value' => $degree_filter,
					'compare' => 'LIKE'
				),
				array(
					'key' => '_pixsosw_degree_program',
					'value' => 'all',
					'compare' => 'LIKE'
				)
			) 
		);
		//echo 'if concentration with empty location: ' . $_GET['c'];
	} elseif ( ( isset( $_GET['c'] ) && $_GET['c'] == '' ) && ( isset( $_GET['l'] ) && $_GET['l'] != '' ) ) {
		$tax_args = array (
			'relation' => 'OR',
			array (
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => $_GET['l']
			),
			array (
				'taxonomy' => 'concentration',
				'field' => 'slug',
				'terms' => $_GET['c']
			)
		);
		$args = array ( 'post_type' => 'field-placement', 'posts_per_page' => 6, 'order' => 'ASC', 'orderby' => 'title', 'paged' => $paged, 'tax_query' => $tax_args,
		'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => '_pixsosw_degree_program',
					'value' => $degree_filter,
					'compare' => 'LIKE'
				),
				array(
					'key' => '_pixsosw_degree_program',
					'value' => 'all',
					'compare' => 'LIKE'
				)
			) 
		);
		//echo 'if location with empty concentration: ' . $_GET['l'];
	} elseif ( isset( $_GET['c'] ) ) {
		$tax_args = array (
				'taxonomy' => 'concentration',
				'field' => 'slug',
				'terms' => $_GET['c']
		);
		$args = array ( 'post_type' => 'field-placement', 'posts_per_page' => 6, 'order' => 'ASC', 'orderby' => 'title', 'paged' => $paged, 'tax_query' => $tax_args,
		'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => '_pixsosw_degree_program',
					'value' => $degree_filter,
					'compare' => 'LIKE'
				),
				array(
					'key' => '_pixsosw_degree_program',
					'value' => 'all',
					'compare' => 'LIKE'
				)
			) 
		);
		//echo 'if concentration';
	} elseif ( isset( $_GET['l'] ) ) {
		$tax_args = array (
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => $_GET['l']
		);
		$args = array ( 'post_type' => 'field-placement', 'posts_per_page' => 6, 'order' => 'ASC', 'orderby' => 'title', 'paged' => $paged, 'tax_query' => $tax_args,
		'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => '_pixsosw_degree_program',
					'value' => $degree_filter,
					'compare' => 'LIKE'
				),
				array(
					'key' => '_pixsosw_degree_program',
					'value' => 'all',
					'compare' => 'LIKE'
				)
			) 
		);
		//echo 'if location';
	} 
	else {
		$args = array ( 'post_type' => 'field-placement', 'posts_per_page' => 6, 'order' => 'ASC', 'orderby' => 'title', 'paged' => $paged,
		'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => '_pixsosw_degree_program',
					'value' => $degree_filter,
					'compare' => 'LIKE'
				),
				array(
					'key' => '_pixsosw_degree_program',
					'value' => 'all',
					'compare' => 'LIKE'
				)
			) 
		);
		//echo 'else all';
	}

	$query = new WP_Query( $args );
	//var_dump($query->request);

	// The Loop
	if ( $query->have_posts() ):
		echo '<div class="posts">';
		while ( $query->have_posts() ) : $query->the_post();

			get_template_part('loop');

		endwhile; // end of the loop

		echo '</div>';

		// Add the pagination functions here.
		echo '<div class="nav-next alignright">';
			echo get_previous_posts_link( 'Previous' );
		echo '</div>';
		echo '<div class="nav-previous alignleft">';
			echo get_next_posts_link( 'Next', $query->max_num_pages );
		echo '</div>';

	endif;
}

function display_job_feed() {
	// Setting the "paged" parameter
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array ( 'post_type' => 'job', 'posts_per_page' => 5, 'order' => 'ASC', 'paged' => $paged );
	$q = new WP_Query( $args );

	if ($q->have_posts()) {

		echo '<div class="posts">';

		while ($q->have_posts()) {
			$q->the_post();

			get_template_part('loop');
		}

		echo '</div>';

		echo '<div class="nav-next alignright">';
			echo get_previous_posts_link( 'Previous' );
		echo '</div>';
		echo '<div class="nav-previous alignleft">';
			echo get_next_posts_link( 'Next', $q->max_num_pages );
		echo '</div>';

	}
}

add_action( 'pre_get_posts', 'display_archive_testimonial' );
function display_archive_testimonial( $query ){
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if ( ($query->is_main_query()) && ( is_tax( 'testimonial-category' ) ) ) {
    $query->set( 'posts_per_page', '6' );
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
	  $query->set( 'paged', $paged );
	}
}

function display_field_education() {
	// Setting the "paged" parameter
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$terms = get_terms ( 'field_education', array(
				    'hide_empty' => 0,
				    'fields' => 'ids'
				));
	$tax_args = array ( array (
				'taxonomy' => 'field_education',
				'field' => 'id',
				'terms' => $terms
				)
	);
	$args = array ( 'post_type' => 'staff', 'posts_per_page' => 10, 'order' => 'ASC', 'paged' => $paged, 'tax_query' => $tax_args );

	$q = new WP_Query( $args );

	if ( $q->have_posts() ):
		echo '<div class="posts">';

		while ( $q->have_posts() ) : $q->the_post();
			get_template_part('loop');
		endwhile;

		echo '</div>';
	endif;
}

function get_rss_calendar( $url =  'http://illinois.edu/calendar/rss/935.xml', $num = 5 ) {
	include_once( ABSPATH . WPINC . '/feed.php' );


	// Get a SimplePie feed object from the specified feed source.
	if ( isset( $url) ) {
		$feed = fetch_feed( $url );

	}
	$html = '';

	if ( ! is_wp_error( $feed ) ) { // Checks that the object is created correctly
		//$item = $feed->get_item();
		if( isset( $num ) ){
			$maxitems = $feed->get_item_quantity();
		}

		// Build an array of all the items, starting with element 0 (first element).
		$rss_items = $feed->get_items();

		// Sort array in descending order by key to achieve proper chronological order
		krsort($rss_items);

		if ($maxitems > 0) {
      // set default timezone before we start messing around with dates -pek
      $blog_timezone = get_option( 'timezone_string' );
      date_default_timezone_set( $blog_timezone );

			$count = 0;

			$html .= '<ul class="row-fluid">';
			if (!is_front_page())
				$html .= '<div class="span5">';

				foreach ( $rss_items as $item ) {

					if ($count === 3 && !is_front_page()) {
						//start a new column
						$html .= '</div>';
						$html .= '<div class="span5 offset1">';
					}

					$date = $item->get_date('M j');
					$dates = explode(" ", $date);
					$html .= '<li class="row-fluid event-item"><div class="span4"><div class="date"><p class="month">' . $dates[0] . '</p><div class="number-container"><p class="number">' . $dates[1] . '</p></div></div></div>';
					$html .= '<div class="span8 info"><p class="rss-title"><a href="' . esc_url( $item->get_permalink() ) . '">' . esc_html( $item->get_title() ) . '</a></p>';
					$html .= '<p class="time">' . $item->get_date('g:i a') . '</p>';
					$html .= '</div></li>';

					$count++;

					if ($count >= $num) {
						break;
					}
				}


			if (!is_front_page())
				$html .= '</div>';
			$html .= '</ul>';
		}
	} else {
		$html = '<p class="rss-title">The feed is either empty or unavailable.</p>';
	}

	return $html;
}

function display_mini_news() {

	$args = array ( 'post_type' => 'post' , 'posts_per_page' => 5, 'orderby' => 'date', 'order' => 'DESC' );
	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ):
		$count = 0;
		echo '<div class="row-fluid">';

		while ( $loop->have_posts() ): $loop->the_post();
			if ( $count === 0 ) {
				echo '<div class="span12">';
					echo '<article class="featured">';
						echo '<div class="span5">';
							the_post_thumbnail('full', array('class' => 'thumbnail'));
						echo '</div>';

						echo '<div class="span6 offset1">';
							echo '<h3 class="title"><a href="' . get_permalink() .'">' . get_the_title() . '</a></h3>';
							echo '<p class="date">' .  get_the_time('F j, Y') . '</p>';
							echo '<p>' . get_the_excerpt() . ' ...</p>';
							echo '<a class="button" href="' . get_permalink() . '">Read More</a>';
						echo '</div>';
					echo '</article>';
				echo '</div>';
				echo '<div class="span12 flex">';
			} else {
				echo '<article class="not-featured">';
						echo '<h3 class="title"><a href="' . get_permalink() .'">' . get_the_title() . '</a></h3>';
						echo '<p class="date">' .  get_the_time('F j, Y') . '</p>';
				echo '</article>';

			}
			$count++;
		endwhile;
			echo '</div>';
		echo '</div>';
	endif;
}

function display_story_carousel() {
	global $post;

	echo '<div class="testimonial-show">';

		echo '<div class="test-slides">';

		$current_post = array( $post->ID );

                $args = array ( 'post_type' => 'testimonial', 'posts_per_page' => -1, 'post__not_in' => $current_post, 'orderby' => 'rand' );
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ):

			$count = 1;

                        while ( $query->have_posts() ) : $query->the_post();
				if ( ( $count - 1 ) % 3 == 0 ) {
					echo '<div class="test-slide">';
					echo '<div class="slide-content">';
				}

                               	get_template_part('loop');
				//echo get_the_title();

				if ( $count % 3 == 0 || $count == $query->found_posts ) {
					echo '</div>';
					echo '</div>';
				}

				$count++;
                        endwhile;

                endif;

		wp_reset_query();

                echo '</div>';

		echo '<div class="testSliderNav">';
                        echo '<div class="test-nav testSlideRight" role="button" aria-label="Next Testimonial">Right</div>';
                        echo '<div class="test-nav testSlideLeft" role="button" aria-label="Previous Testimonial">Left</div>';
                echo '</div>';

                echo '<div class="sliderPager"></div>';

	echo '</div>';
        echo '<br clear="all" />';

}

function display_random_story() {
        global $post;

        echo '<div class="testimonial-mobile">';

	$current_post = array( $post->ID );

        $args = array ( 'post_type' => 'testimonial', 'posts_per_page' => 1, 'post__not_in' => $current_post, 'orderby' => 'rand' );
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ):

                while ( $query->have_posts() ) : $query->the_post();
                        get_template_part('loop');
                endwhile;

        endif;

        wp_reset_query();

        echo '</div>';

        echo '<br clear="all" />';

}
