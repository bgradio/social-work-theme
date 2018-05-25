<?php 
/**
 * Adds News Widget widget.
 
Plugin Name: News Custom
Plugin URI: socw-aaron.dev.pixotech.com
Description: Create custom testimonials for the homepage.
Version: 1.0
Author: Aaron McNeal
Author URI: socw-aaron.dev.pixotech.com

*/
class News_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'news_widget', // Base ID
			'News Widget', // Name
			array( 'description' => __( 'News Widget' ) ) // Args
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
		echo '<p><strong>RECENT NEWS</strong></p><br>';
		
		$args = array ( array ( 'category_name' => 'news, alumni-news, faculty-news, research-news, student-news' ), 'posts_per_page' => 4, 'order' => 'DESC' );
		$loop = new WP_Query( $args );
		
		if ( $loop->have_posts() ):
			$count = 0;
			while ( $loop->have_posts() ): $loop->the_post();
				if ( $count == 0 ) {
					echo '<div class="news-widget-item-featured">';
					echo "" . the_post_thumbnail( 'thumbnail' );
				} else {
					echo '<div class="news-widget-item">';
				}
					echo '<div class="news-widget-date">';
						echo get_the_date();
					echo '';
					echo '<div class="news-widget-title">';
						echo '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
					echo '</div>';
					echo '<div class="news-widget-content">';
						echo get_the_content();
					echo '</div>';
					echo '<div class="news-widget-more">';
						$excerpt = news_excerpt_read_more_link( $text );
						echo $excerpt;
					echo '</div>';
				echo '</div>';
				$count++;
			endwhile;
		endif;
		wp_reset_query();
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {		
		/*if ( isset( $instance[ 'category' ] ) ) {
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
		
		<?php */
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
	function register_news_widget() {
		register_widget( 'News_Widget' );
	}
	add_action( 'widgets_init', 'register_news_widget' );
?>