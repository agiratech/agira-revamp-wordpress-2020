<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Creative_Team_ShowCase
 * @subpackage Creative_Team_ShowCase/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package
 * Creative_Team_ShowCase
 * @subpackage Creative_Team_ShowCase/public
 * @author     Infinue
 */
class Creative_Team_ShowCase_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Creative_Team_ShowCase    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $Creative_Team_ShowCase       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creative_Team_ShowCase_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creative_Team_ShowCase_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// Register style has some lag. That's why we use wp_enqueue_style only for general.css to load immediately without lag.
		wp_enqueue_style( $this->plugin_name . '-general', plugin_dir_url( __FILE__ ) . 'css/min/general.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-fontawesome', plugin_dir_url( __FILE__ ) . 'vendor/fontawesome/css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-inline-preview', plugin_dir_url( __FILE__ ) . 'css/min/inline-preview.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-modal', plugin_dir_url( __FILE__ ) . 'css/min/modal.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-wave', plugin_dir_url( __FILE__ ) . 'css/min/wave.min.css', array(), $this->version, 'all' );
		//wp_register_style( $this->plugin_name . '-hex', plugin_dir_url( __FILE__ ) . 'css/min/hexagon.min.css', array(), $this->version, 'all' ); 
		wp_register_style( $this->plugin_name . '-hex', plugin_dir_url( __FILE__ ) . 'css/hexagon.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-normal-grid', plugin_dir_url( __FILE__ ) . 'css/min/normal-grid.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-mosaic', plugin_dir_url( __FILE__ ) . 'css/min/mosaic.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-filter', plugin_dir_url( __FILE__ ) . 'css/min/filter.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-owlCarousel', plugin_dir_url( __FILE__ ) . 'vendor/owl-carousel/css/owl.carousel.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-owlCarousel-defaultTheme', plugin_dir_url( __FILE__ ) . 'vendor/owl-carousel/css/owl.theme.default.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-customScrollbar', plugin_dir_url( __FILE__ ) . 'vendor/mcustomscrollbar/css/jquery.mCustomScrollbar.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-slider', plugin_dir_url( __FILE__ ) . 'css/min/slider.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creative_Team_ShowCase_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creative_Team_ShowCase_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_script( $this->plugin_name . '_object-fit-image', plugin_dir_url( __FILE__ ) . 'vendor/object-fit-images/ofi.min.js', array(), $this->version, true );
		wp_register_script( $this->plugin_name . '_tiny-color', plugin_dir_url( __FILE__ ) . 'vendor/tinycolor/tinycolor.min.js', array(), $this->version, true );
		wp_register_script( $this->plugin_name . '_customScrollbar', plugin_dir_url( __FILE__ ) . 'vendor/mcustomscrollbar/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), $this->version );
		wp_register_script( $this->plugin_name . '_general', plugin_dir_url( __FILE__ ) . 'js/min/general.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . '_wave', plugin_dir_url( __FILE__ ) . 'js/min/wave.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . '_mosaic', plugin_dir_url( __FILE__ ) . 'js/min/mosaic.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . '_modal', plugin_dir_url( __FILE__ ) . 'js/min/modal.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . '_filter', plugin_dir_url( __FILE__ ) . 'js/min/filter.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . '_inline-preview', plugin_dir_url( __FILE__ ) . 'js/min/inline-preview.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . '_owlCarousel', plugin_dir_url( __FILE__ ) . 'vendor/owl-carousel/js/owl.carousel.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . '_slider', plugin_dir_url( __FILE__ ) . 'js/min/slider.min.js', array( 'jquery' ), $this->version, true );

	}

	/**
	 * Register Shortcode
	 *
	 * @since 1.0.0
	 */
	public function register_shortcode() {

		add_shortcode( 'ctshowcase', array( $this, 'render_shortcode' ) );
	}

	/**
	 *  Render Shortcode
	 *
	 * @since 1.0.0
	 */
	public function render_shortcode( $atts ) {
		if ( $atts['id'] ) {
			ob_start();
			if ( get_post_type( $atts['id'] ) == 'ctshowcase_shortcode' && get_post_status( $atts['id'] == 'publish' ) ) {

				$shortcode_id           = $atts['id'];
				$obj                    = new Creative_Team_ShowCase_Admin( $this->plugin_name, $this->version );
				$shortcode_general_data = $obj->get_the_correct_value_for_shortcode_data( $shortcode_id, array( 'general' ) );
				extract( $shortcode_general_data );
				if ( empty( $number_posts_to_load ) ) {
					$number_posts_to_load = -1;
				}
				$args                   = array();
				$args['posts_per_page'] = $number_posts_to_load;
				$args['post_type']      = 'ctshowcase_member';
				$args['orderby']        = $order_by;
				$args['order']          = $order;
				if ( ! empty( $ids_to_include ) ) {
					$args['post__in'] = $ids_to_include;
				} elseif ( ! empty( $ids_to_exclude ) ) {
					$args['post__not_in'] = $ids_to_exclude;
				}
				if ( ! empty( $groups_to_include ) ) :
					$args['tax_query'] = array(
						array(
							'taxonomy' => 'ctshowcase_group',
							'terms'    => $groups_to_include,
						),
					);
				endif;
				$team_query = new WP_Query( $args );
				wp_enqueue_style( $this->plugin_name . '-general' );
				wp_enqueue_script( $this->plugin_name . '_object-fit-image' );
				wp_enqueue_script( $this->plugin_name . '_general' );
				switch ( $shortcode_layout ) :
					case 'wave':
						$shortcode_wave_data = $obj->get_the_correct_value_for_shortcode_data( $shortcode_id, array( 'wave' ) );
						extract( $shortcode_wave_data );
						wp_enqueue_style( $this->plugin_name . '-wave' );
						wp_enqueue_script( $this->plugin_name . '_wave' );
						require 'partials/templates/wave.php';
						break;
					case 'hex-grid':
						$shortcode_hex_data = $obj->get_the_correct_value_for_shortcode_data( $shortcode_id, array( 'hex' ) );
						extract( $shortcode_hex_data );
						wp_enqueue_style( $this->plugin_name . '-hex' );
						require 'partials/templates/hexagonal.php';
						break;
					case 'inline-preview':
						$shortcode_inlinePreview_data = $obj->get_the_correct_value_for_shortcode_data( $shortcode_id, array( 'inlinePreview' ) );
						extract( $shortcode_inlinePreview_data );
						wp_enqueue_style( $this->plugin_name . '-fontawesome' );
						wp_enqueue_style( $this->plugin_name . '-customScrollbar' );
						wp_enqueue_script( $this->plugin_name . '_customScrollbar' );
						require 'partials/templates/inline-preview.php';
						break;
					case 'mosaic':
						$shortcode_mosaic_data = $obj->get_the_correct_value_for_shortcode_data( $shortcode_id, array( 'mosaic' ) );
						extract( $shortcode_mosaic_data );
						require 'partials/templates/mosaic.php';
						break;
					case 'normal-grid':
						$shortcode_normalGrid_data = $obj->get_the_correct_value_for_shortcode_data( $shortcode_id, array( 'normalGrid' ) );
						extract( $shortcode_normalGrid_data );
						wp_enqueue_style( $this->plugin_name . '-fontawesome' );
						wp_enqueue_style( $this->plugin_name . '-normal-grid' );
						wp_enqueue_script( $this->plugin_name . '_normal-grid' );
						require 'partials/templates/normal-grid.php';
						break;
					case 'slider':
						$shortcode_slider_data = $obj->get_the_correct_value_for_shortcode_data( $shortcode_id, array( 'slider' ) );
						extract( $shortcode_slider_data );
						wp_enqueue_style( $this->plugin_name . '-fontawesome' );
						require 'partials/templates/slider.php';
						break;
				endswitch;
				return  str_replace( array( "\r", "\n" ), '', trim( ob_get_clean() ) );
			}

			return null;
		}
	}

}
