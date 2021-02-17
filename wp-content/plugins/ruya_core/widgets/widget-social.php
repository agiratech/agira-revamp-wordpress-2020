<?php
class Ruya_Widget_Social extends WP_Widget {
	function __construct(){
		$widget_ops = array(
			'classname' => 'social-media-widget', 
			'description' => esc_html__( 'Use this widget to display your social accounts.', 'ruya' ) 
		);
		parent::__construct(
			'Ruya_Widget_Social',
			esc_html__( 'Ruya - Social Widget' , 'ruya' ),
			$widget_ops
		);
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$target = isset( $instance[ 'target' ] ) ? $instance[ 'target' ] : false;
		if ( ! $target ) {
			$target = false;
		}
		$facebook = ( isset( $instance[ 'facebook' ] ) ) ? $instance[ 'facebook' ] : '';
		$twitter = ( isset( $instance[ 'twitter' ] ) ) ? $instance[ 'twitter' ] : '';
		$dribbble = ( isset( $instance[ 'dribbble' ] ) ) ? $instance[ 'dribbble' ] : '';
		$linkedin = ( isset( $instance[ 'linkedin' ] ) ) ? $instance[ 'linkedin' ] : '';
		$flickr = ( isset( $instance[ 'flickr' ] ) ) ? $instance[ 'flickr' ] : '';
		$tumblr = ( isset( $instance[ 'tumblr' ] ) ) ? $instance[ 'tumblr' ] : '';
		$vimeo = ( isset( $instance[ 'vimeo' ] ) ) ? $instance[ 'vimeo' ] : '';
		$youtube = ( isset( $instance[ 'youtube' ] ) ) ? $instance[ 'youtube' ] : '';
		$instagram = ( isset( $instance[ 'instagram' ] ) ) ? $instance[ 'instagram' ] : '';
		$pinterest = ( isset( $instance[ 'pinterest' ] ) ) ? $instance[ 'pinterest' ] : '';
		$deviantart = ( isset( $instance[ 'deviantart' ] ) ) ? $instance[ 'deviantart' ] : '';
		$behance = ( isset( $instance[ 'behance' ] ) ) ? $instance[ 'behance' ] : '';
		echo $before_widget; 
		 $target = ( $target ) ? 'target="_blank"' : ''; 
		  if ( $title ) { 
			echo $before_title . esc_html( $title ) . $after_title; 
		}?>
		<div class="widget-content">
		<ul>
			<?php if ( $facebook != '' ) : ?>
				<li><a href="<?php echo esc_url( $facebook ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-facebook"></i></a></li>
			<?php endif; 
			if ( $twitter != '' ) : ?>
				<li><a href="<?php echo esc_url( $twitter ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-twitter"></i></a></li>
			<?php endif; 
			if ( $dribbble != '' ) : ?>
				<li><a href="<?php echo esc_url( $dribbble ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-dribbble"></i></a></li>
			<?php endif;
			if ( $linkedin != '' ) : ?>
				<li><a href="<?php echo esc_url( $linkedin ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-linkedin"></i></a></li>
			<?php endif; 
			if ( $flickr != '' ) : ?>
				<li><a href="<?php echo esc_url( $flickr ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-flickr"></i></a></li>
			<?php endif;
			if ( $tumblr != '' ) : ?>
				<li><a href="<?php echo esc_url( $tumblr ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-tumblr"></i></a></li>
			<?php endif;
			if ( $vimeo != '' ) : ?>
				<li><a href="<?php echo esc_url( $vimeo ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-vimeo"></i></a></li>
			<?php endif;
			if ( $youtube != '' ) : ?>
				<li><a href="<?php echo esc_url( $youtube ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-youtube"></i></a></li>
			<?php endif;
			if ( $instagram != '' ) : ?>
				<li><a href="<?php echo esc_url( $instagram ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-instagram"></i></a></li>
			<?php endif;
			if ( $pinterest != '' ) : ?>
				<li><a href="<?php echo esc_url( $pinterest ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-pinterest"></i></a></li>
			<?php endif;
			if ( $deviantart != '' ) : ?>
				<li><a href="<?php echo esc_url( $deviantart ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-deviantart"></i></a></li>
			<?php endif;
			if ( $behance != '' ) : ?>
				<li><a href="<?php echo esc_url( $behance ); ?>" <?php echo esc_attr( $target ); ?>><i class="fa fa-behance"></i></a></li>
			<?php endif; ?>
		</ul>
	    </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? (bool) $new_instance[ 'target' ] : false;
		$instance[ 'facebook' ] = strip_tags( $new_instance[ 'facebook' ] );
		$instance[ 'twitter' ] = strip_tags( $new_instance[ 'twitter' ] );
		$instance[ 'dribbble' ] = strip_tags( $new_instance[ 'dribbble' ] );
		$instance[ 'linkedin' ] = strip_tags( $new_instance[ 'linkedin' ] );
		$instance[ 'flickr' ] = strip_tags( $new_instance[ 'flickr' ] );
		$instance[ 'tumblr' ] = strip_tags( $new_instance[ 'tumblr' ] );
		$instance[ 'vimeo' ] = strip_tags( $new_instance[ 'vimeo' ] );
		$instance[ 'youtube' ] = strip_tags( $new_instance[ 'youtube' ] );
		$instance[ 'instagram' ] = strip_tags( $new_instance[ 'instagram' ] );
		$instance[ 'pinterest' ] = strip_tags( $new_instance[ 'pinterest' ] );
		$instance[ 'deviantart' ] = strip_tags( $new_instance[ 'deviantart' ] );
		$instance[ 'behance' ] = strip_tags( $new_instance[ 'behance' ] );
		return $instance;
	}
	function form( $instance ) {
		$title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
		$target = isset( $instance[ 'target' ] ) ? (bool) $instance[ 'target' ] : false;
		$facebook = isset( $instance[ 'facebook' ] ) ? esc_attr( $instance[ 'facebook' ] ) : '';
		$twitter = isset( $instance[ 'twitter' ] ) ? esc_attr( $instance[ 'twitter' ] ) : '';
		$dribbble = isset( $instance[ 'dribbble' ] ) ? esc_attr( $instance[ 'dribbble' ] ) : '';
		$linkedin = isset( $instance[ 'linkedin' ] ) ? esc_attr( $instance[ 'linkedin' ] ) : '';
		$flickr = isset( $instance[ 'flickr' ] ) ? esc_attr( $instance[ 'flickr' ] ) : '';
		$tumblr = isset( $instance[ 'tumblr' ] ) ? esc_attr( $instance[ 'tumblr' ] ) : '';
		$vimeo = isset( $instance[ 'vimeo' ] ) ? esc_attr( $instance[ 'vimeo' ] ) : '';
		$youtube = isset( $instance[ 'youtube' ] ) ? esc_attr( $instance[ 'youtube' ] ) : '';
		$instagram = isset( $instance[ 'instagram' ] ) ? esc_attr( $instance[ 'instagram' ] ) : '';
		$pinterest = isset( $instance[ 'pinterest' ] ) ? esc_attr( $instance[ 'pinterest' ] ) : '';
		$deviantart = isset( $instance[ 'deviantart' ] ) ? esc_attr( $instance[ 'deviantart' ] ) : '';
		$behance = isset( $instance[ 'behance' ] ) ? esc_attr( $instance[ 'behance' ] ) : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $target ); ?> id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open social links in a new window/tab?', 'ruya' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_attr( $facebook ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" value="<?php echo esc_attr( $twitter ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php esc_html_e( 'Dribbble URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" value="<?php echo esc_attr( $dribbble ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_attr( $linkedin ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php esc_html_e( 'Flickr URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" value="<?php echo esc_attr( $flickr ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php esc_html_e( 'Tumblr URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" value="<?php echo esc_attr( $tumblr ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php esc_html_e( 'Vimeo URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" value="<?php echo esc_attr( $vimeo ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'Youtube URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_attr( $youtube ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_attr( $instagram ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_attr( $pinterest ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'deviantart' ) ); ?>"><?php esc_html_e( 'DeviantART URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'deviantart' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'deviantart' ) ); ?>" value="<?php echo esc_attr( $deviantart ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php esc_html_e( 'Behance URL:', 'ruya' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>" value="<?php echo esc_attr( $behance ); ?>">
		</p>
	<?php
	}
}
add_action( 'widgets_init', 'ruya_social_widget' );
function ruya_social_widget() {
	register_widget( 'Ruya_Widget_Social' );
}