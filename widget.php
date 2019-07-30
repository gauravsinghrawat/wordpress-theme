<?php

/**
 * Adds Foo_Widget widget.
 */
class Foo_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		/*parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'Widget Title', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'My Widget', 'text_domain' ), ) // Args
		);*/
        $ops = array('classname'=> 'gaurav_widget','description'=> 'This is awesome Widget.');
        Parent::__construct('gaurav_widget', 'Gaurav Widget', $ops);
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		if ( ! empty( $instance['desc'] ) ) {
			echo  $instance['desc'];
		}
//		echo esc_html__( 'Hello, World!', 'text_domain' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$desc = ! empty( $instance['desc'] ) ? $instance['desc'] : esc_html__( 'Type some description here..', 'text_domain' );
		$audio = ! empty( $instance['audio'] ) ? $instance['audio'] : esc_html__( 'Add audio here..', 'text_domain' );
		?>
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_attr_e( 'Description:', 'text_domain' ); ?></label> 
             <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" type="text" value="<?php echo esc_attr( $desc ); ?>"></textarea>    
		</p>
		<p>
          <label for="<?php echo esc_attr( $this->get_field_id( 'audio' ) ); ?>"><?php esc_attr_e( 'Audio:', 'text_domain' ); ?></label> 
		     <audio src="" id="<?php echo esc_attr( $this->get_field_id( 'audio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'audio' ) ); ?>" type="text" value="<?php echo esc_attr( $audio ); ?>"></audio>
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? sanitize_text_field( $new_instance['desc'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_foo_widget() {
    register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );