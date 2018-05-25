<?php 
/**
 * Adds Application_Widget widget.
 
Plugin Name: Application Custom
Plugin URI: socw-aaron.dev.pixotech.com
Description: Generate the buttons for Apply Now.
Version: 1.0
Author: Aaron McNeal
Author URI: socw-aaron.dev.pixotech.com

*/
class Application_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'application_widget', // Base ID
			'Application Widget', // Name
			array( 'description' => __( 'Application Widget', 'text_domain' ), ) // Args
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
		echo display_application_widget( );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

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

	}

} // class Application_Widget

// register Application_Widget widget
	function register_application_widget() {
		register_widget( 'Application_Widget' );
	}
	add_action( 'widgets_init', 'register_application_widget' );
?>