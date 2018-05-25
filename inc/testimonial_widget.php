<?php 
/**
 * Adds Testimonial_Widget widget.
 
Plugin Name: Testimonial Custom
Plugin URI: socw-aaron.dev.pixotech.com
Description: Create custom testimonials for the homepage.
Version: 1.0
Author: Aaron McNeal
Author URI: socw-aaron.dev.pixotech.com

*/

$is_widget = false;
class Testimonial_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'testimonial_widget', // Base ID
			'Story Widget', // Name
			array( 'description' => __( 'Story Widget' ) ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	  // get the category slug wanted by this widget
	  $category_slug = isset( $instance['category'] ) ? $instance['category'] : 'Any';
	  // put it into an array since we're calling a shortcode handler, just to keep to the pattern
	  $args_array = array( 'cat' => $category_slug );
	  	  				
		echo display_story_widget( $args_array );	
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {		
		if ( isset( $instance[ 'category' ] ) ) {
			$category = $instance[ 'category' ];
		}
		else {
			$category = __( 'New category' );
		}
		?>
		
		<p>		
		<label for="<?php echo $this->get_field_name( 'category' ); ?>"><?php _e( 'Category:' ); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
			<option value="Any">Any</option>
			<?php
			$terms = get_terms( 'testimonial-category' );
			$count = count($terms);
			if ( $count > 0 ) {
				foreach ($terms as $term) {
					if ( $term->slug == $category ) {
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
			?>
		</select>
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		/* Start example
		//$instance = array();
		//$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		//return $instance;
		// Stop example */
		$instance = array();
		$instance['category'] = ( ! empty( $new_instance['category'] ) ) ? strip_tags( $new_instance['category'] ) : '';
		
		return $instance;
	}

} // class Testimonial_Widget

// register Testimonial_Widget widget
	function register_testimonial_widget() {
		register_widget( 'Testimonial_Widget' );
	}
	add_action( 'widgets_init', 'register_testimonial_widget' );

?>