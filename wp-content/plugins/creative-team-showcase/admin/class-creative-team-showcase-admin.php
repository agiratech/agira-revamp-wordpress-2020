<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @author     Infinue
 */
class Creative_Team_ShowCase_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 *
	 * @var string the ID(name) of this plugin
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 *
	 * @var string the current version of this plugin
	 */
	private $version;

	/**
	 * The options defaults of this plugin.
	 *
	 * @since 1.0.0
	 *
	 * @var array The options defaults of this plugin
	 */
	private $options_defaults;

	/**
	 * @since  1.0.0
	 *
	 * @var string
	 */

	/**
	 * The general prefix for post meta fields and hooks.
	 *
	 * @since 1.0.0
	 *
	 * @var string The general prefix for post meta fields and hooks
	 */
	private $prefix;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param string $Creative_Team_ShowCase the name of this plugin
	 * @param string $version                the version of this plugin
	 */
	public function __construct( $plugin_name, $version ) {
		// plugin_name property is mainly a property in class-creative-team-showcase found in /includes/class-creative-team-showcase.php
		$this->plugin_name              = $plugin_name;
		$this->version                  = $version;
		$this->prefix                   = 'ctshowcase_';
		$this->skill_bar_default_colors = apply_filters( $this->prefix . 'default_skillbar_colors', array( '#27ae60', '#1198ff', '#9b59b6', '#ff5755' ) );
		$this->social_links             = apply_filters(
			$this->prefix . 'social_media',
			array(
				'fa-facebook'    => 'facebook',
				'fa-twitter'     => 'twitter',
				'fa-linkedin'    => 'linkedin',
				'fa-google-plus' => 'google_plus',
				'fa-instagram'   => 'instagram',
				'fa-youtube'     => 'youtube',
				'fa-vimeo'       => 'vimeo',
				'fa-yelp'        => 'yelp',
				'fa-pinterest'   => 'pinterest',
				'fa-behance'     => 'behance',
				'fa-github'      => 'github',
			)
		);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/*
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
		wp_enqueue_style( 'wp-ctshowcase-color-picker' );
		wp_register_style( $this->plugin_name . '-admin-select2', plugin_dir_url( __FILE__ ) . 'css/select2.min.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name . '-admin-main', plugin_dir_url( __FILE__ ) . 'css/main.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/*
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
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		wp_enqueue_script( $this->prefix . 'wp-color-picker-alpha', plugin_dir_url( __FILE__ ) . 'js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), $this->version, true );
		wp_register_script( $this->prefix . 'admin-select2', plugin_dir_url( __FILE__ ) . 'js/select2.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->prefix . 'admin-main-js', plugin_dir_url( __FILE__ ) . 'js/general.js', array( 'jquery', $this->prefix . 'wp-color-picker-alpha', 'wp-color-picker' ), $this->version, true );
		wp_localize_script(
			$this->prefix . 'admin-main-js',
			'admin_ajax',
			array(
				'ajaxurl'     => admin_url( 'admin-ajax.php' ),
				'id'          => get_the_ID(),
				'post_status' => get_post_status( get_the_ID() ),
				'title'       => get_the_title(),
				'plugin_name' => 'ctshowcase',
				'skill_row'   => $this->render_skill_row(),
			)
		);
	}

	/**
	 * Register Team Post Type.
	 *
	 * @since 1.0.0
	 */
	public function register_team_post_type() {
		$labels   = array(
			'name'                  => __( 'Team Members', 'ctshowcase' ),
			'singular_name'         => __( 'Team Member', 'ctshowcase' ),
			'add_new'               => __( 'Add New Team Member', 'ctshowcase' ),
			'add_new_item'          => __( 'Add New Team Member', 'ctshowcase' ),
			'edit_item'             => __( 'Edit Team Member', 'ctshowcase' ),
			'new_item'              => __( 'Add New Team Member', 'ctshowcase' ),
			'view_item'             => __( 'View Team Member', 'ctshowcase' ),
			'search_items'          => __( 'Search Team Members', 'ctshowcase' ),
			'not_found'             => __( 'No Team Members found', 'ctshowcase' ),
			'not_found_in_trash'    => __( 'No Team Members found in trash', 'ctshowcase' ),
			'featured_image'        => __( 'Member profile image', 'ctshowcase' ),
			'set_featured_image'    => __( 'Set member profile image', 'ctshowcase' ),
			'remove_featured_image' => __( 'Remove member profile image', 'ctshowcase' ),
			'use_featured_image'    => __( 'Use as member profile image', 'ctshowcase' ),
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'comments',
			'revisions',
		);
		$args     = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'ctshowcase-team-member' ),
			'has_archive'     => true,
			'menu_position'   => 31.1,
			'menu_icon'       => 'data:image/svg+xml;base64,' . base64_encode(
				'<svg xmlns="http://www.w3.org/2000/svg" 
					  xmlns:xlink="http://www.w3.org/1999/xlink" 
					  style="isolation:isolate" viewBox="152.174 166.127 118.903 114.125"
					  width="118.903px" height="114.125px">
					 <g style="isolation:isolate">
						<path d=" M 208.97 166.519 C 214.595 164.668 220.916 169.648 220.466 175.55 C 220.476 180.868 214.923 184.959 209.839 183.967 C 205.564 183.108 202.128 178.884 202.608 174.466 C 202.783 170.814 205.462 167.511 208.97 166.519 Z "/>
						<path d=" M 219.781 181.953 C 217.244 184.663 213.491 186.474 209.727 185.727 C 207.037 185.349 204.941 183.487 202.834 181.943 C 196.882 183.272 191.318 185.839 186.112 188.969 C 187.666 191.526 189.426 193.94 191.338 196.241 C 193.404 194.778 195.623 193.531 198.047 192.753 C 198.726 194.577 199.432 196.391 200.157 198.198 C 201.117 200.59 203.437 202.164 206.014 202.166 C 211.771 202.171 213.761 202.172 217.361 202.173 C 219.961 202.173 222.281 200.57 223.23 198.149 C 223.934 196.354 224.676 194.573 225.427 192.794 C 227.779 193.735 230.06 194.881 232.269 196.139 C 233.977 193.807 235.675 191.464 237.291 189.071 C 231.962 185.645 226.061 183.006 219.781 181.953 Z "/>
						<path d=" M 152.18 211.748 C 152.158 205.826 158.847 201.354 164.321 203.605 C 169.382 205.239 171.557 211.785 169.043 216.313 C 166.905 220.114 161.826 222.077 157.772 220.254 C 154.353 218.96 152.039 215.391 152.18 211.748 Z "/>
						<path d=" M 170.199 206.235 C 171.993 209.485 172.554 213.614 170.681 216.963 C 169.491 219.404 167.072 220.823 164.952 222.35 C 164.377 228.422 165.099 234.506 166.468 240.424 C 169.38 239.736 172.219 238.809 174.998 237.701 C 174.246 235.284 173.745 232.788 173.755 230.242 C 175.699 230.16 177.642 230.049 179.585 229.918 C 182.157 229.744 184.37 228.025 185.169 225.574 C 186.952 220.101 187.569 218.208 188.681 214.785 C 189.485 212.313 188.677 209.61 186.668 207.96 C 185.179 206.735 183.714 205.48 182.254 204.216 C 183.876 202.269 185.67 200.454 187.549 198.742 C 185.86 196.397 184.157 194.058 182.38 191.782 C 177.474 195.791 173.141 200.588 170.199 206.235 Z "/>
						<path d=" M 177.646 279.735 C 172.007 277.926 169.821 270.181 173.654 265.672 C 176.771 261.363 183.669 261.318 187.198 265.108 C 190.152 268.316 190.449 273.753 187.463 277.045 C 185.177 279.897 181.067 280.994 177.646 279.735 Z "/>
						<path d=" M 177.972 260.895 C 181.617 260.193 185.718 260.935 188.324 263.751 C 190.277 265.639 190.879 268.377 191.676 270.865 C 197.272 273.288 203.284 274.481 209.335 275.009 C 209.58 272.027 209.575 269.04 209.38 266.054 C 206.849 266.023 204.32 265.728 201.903 264.932 C 202.426 263.058 202.921 261.176 203.396 259.287 C 204.025 256.788 203.074 254.151 200.99 252.634 C 196.336 249.246 194.725 248.075 191.814 245.959 C 189.711 244.431 186.891 244.364 184.701 245.765 C 183.076 246.803 181.43 247.809 179.777 248.806 C 178.427 246.662 177.254 244.395 176.207 242.079 C 173.454 242.961 170.704 243.858 167.99 244.844 C 170.287 250.748 173.51 256.352 177.972 260.895 Z "/>
						<path d=" M 250.175 276.524 C 246.712 281.328 238.671 281.014 235.567 275.975 C 232.432 271.678 234.52 265.104 239.216 262.919 C 243.179 261.101 248.443 262.499 250.651 266.356 C 252.656 269.412 252.43 273.659 250.175 276.524 Z "/>
						<path d=" M 232.357 270.393 C 232.816 266.709 234.789 263.039 238.272 261.43 C 240.671 260.155 243.461 260.429 246.073 260.44 C 250.107 255.866 253.1 250.518 255.472 244.926 C 252.711 243.771 249.869 242.853 246.969 242.115 C 246.158 244.513 245.096 246.827 243.591 248.88 C 241.97 247.804 240.334 246.752 238.684 245.716 C 236.502 244.345 233.7 244.435 231.613 245.948 C 226.953 249.328 225.342 250.497 222.43 252.612 C 220.326 254.14 219.392 256.801 220.046 259.317 C 220.532 261.183 220.98 263.06 221.417 264.94 C 218.961 265.562 216.442 265.976 213.916 266.256 C 213.904 269.147 213.908 272.04 214.007 274.926 C 220.332 274.566 226.657 273.232 232.357 270.393 Z "/>
						<path d=" M 269.534 206.553 C 273.033 211.331 270.249 218.881 264.498 220.277 C 259.443 221.93 253.836 217.912 253.208 212.772 C 252.704 208.44 255.66 203.867 260.011 202.959 C 263.537 201.995 267.507 203.523 269.534 206.553 Z "/>
						<path d=" M 258.197 221.604 C 254.836 220.029 251.954 217.019 251.501 213.208 C 251.03 210.533 252.152 207.964 252.97 205.483 C 249.866 200.233 245.705 195.734 241.12 191.75 C 239.169 194.02 237.417 196.438 235.819 198.968 C 237.848 200.481 239.721 202.207 241.209 204.271 C 239.685 205.48 238.178 206.712 236.683 207.961 C 234.705 209.613 233.925 212.305 234.719 214.758 C 236.493 220.234 237.107 222.127 238.219 225.55 C 239.022 228.023 241.264 229.734 243.86 229.889 C 245.784 230.004 247.708 230.159 249.631 230.323 C 249.463 232.852 249.078 235.375 248.565 237.864 C 251.31 238.768 254.062 239.659 256.838 240.457 C 258.45 234.33 259.136 227.902 258.197 221.604 Z "/>
					</g>
				</svg>'
			),
		);
		register_post_type( 'ctshowcase_member', $args );
	}

	/**
	 * Register shortcode custom post.
	 */
	public function register_shortcode_post_type() {
		$labels   = array(
			'name'               => __( 'Shortcodes', 'ctshowcase' ),
			'singular_name'      => __( 'Shortcode', 'ctshowcase' ),
			'add_new'            => __( 'Add New Shortcode', 'ctshowcase' ),
			'add_new_item'       => __( 'Add New Shortcode', 'ctshowcase' ),
			'edit_item'          => __( 'Edit Shortcode', 'ctshowcase' ),
			'new_item'           => __( 'Add New Shortcode', 'ctshowcase' ),
			'view_item'          => __( 'View Shortcode', 'ctshowcase' ),
			'search_items'       => __( 'Search Shortcodes', 'ctshowcase' ),
			'not_found'          => __( 'No Shortcodes found', 'ctshowcase' ),
			'not_found_in_trash' => __( 'No Shortcodes found in trash', 'ctshowcase' ),
		);
		$supports = array(
			'title',
		);
		$args     = array(
			'labels'             => $labels,
			'supports'           => $supports,
			'rewrite'            => false,
			'query_var'          => false,
			'publicly_queryable' => false,
			'show_in_nav_menus'  => false,
			'public'             => true,
			'show_in_menu'       => 'edit.php?post_type=' . 'ctshowcase_member',
		);
		register_post_type( 'ctshowcase_shortcode', $args );
	}

	/**
	 * Hide Publishing actions from shortcode custom post.
	 *
	 * @since 1.0.0
	 */
	public function hide_publishing_actions() {
		global $post;
		if ( $post->post_type == $this->prefix . 'shortcode' ) {
			echo '
                        <style type="text/css">
                            #misc-publishing-actions,
                            #minor-publishing-actions{
                                display:none;
                            }
                        </style>
                    ';
		}
	}

	/**
	 * Remove quick edit from shortcode custom post.
	 *
	 * @since 1.0.0
	 */
	public function remove_quick_edit( $actions, $post ) {
		if ( $post->post_type == $this->prefix . 'shortcode' ) {
			unset( $actions['inline hide-if-no-js'] );
		}

		return $actions;
	}

	/**
	 * Add custom meta boxes to team post type.
	 *
	 * @since 1.0.0
	 */
	public function add_custom_meta_boxes_for_cts_team_member() {
		add_meta_box(
			'ctshowcase_main_info',
			__( 'Main Information', 'ctshowcase' ),
			array( $this, 'render_main_info' ),
			'ctshowcase_member',
			'normal',
			'high'
		);
		add_meta_box(
			'ctshowcase_social_media_links',
			__( 'Social Media Links', 'ctshowcase' ),
			array( $this, 'render_social_media' ),
			'ctshowcase_member',
			'normal',
			'high'
		);
		add_meta_box(
			'ctshowcase_skills',
			__( 'Skills', 'ctshowcase' ),
			array( $this, 'render_skills' ),
			'ctshowcase_member',
			'normal',
			'high'
		);

		do_action( $this->prefix . 'add_extra_custom_metabox_for_team_member' );
	}

	/**
	 * Render Main Info.
	 *
	 * @since 1.0.0
	 *
	 * @param object $var Post
	 */
	public function render_main_info( $post ) {
		$email         = get_post_meta( $post->ID, $this->prefix . 'email', true );
		$phone         = get_post_meta( $post->ID, $this->prefix . 'phone', true );
		$job_title     = get_post_meta( $post->ID, $this->prefix . 'job_title', true );
		$location      = get_post_meta( $post->ID, $this->prefix . 'location', true );
		$personal_site = get_post_meta( $post->ID, $this->prefix . 'personal_site', true );
		$external_url  = get_post_meta( $post->ID, $this->prefix . 'external_url', true ); ?>

		<table style="padding-left: 30px;" cellpadding="3">
			<tr>
				<td>
					<?php _e( 'Job Title: ', 'ctshowcase' ); ?>
				</td>
				<td>
					<input name="<?php echo $this->prefix . 'job_title'; ?>" type="text" id="<?php echo $this->prefix . 'job_title'; ?>" value="<?php echo esc_attr( $job_title ); ?>">
				</td>

			</tr>
			<tr>
				<td>
					<?php _e( 'Email: ', 'ctshowcase' ); ?>
				</td>
				<td>
					<input name="<?php echo $this->prefix . 'email'; ?>" type="email" id="<?php echo $this->prefix . 'email'; ?>" value="<?php echo esc_attr( $email ); ?>">
				</td>

			</tr>
			<tr> 
				<td>
					<?php _e( 'Phone: ', 'ctshowcase' ); ?>
				</td>
				<td>
					<input name="<?php echo $this->prefix . 'phone'; ?>" type="text" id="<?php echo $this->prefix . 'phone'; ?> " value="<?php echo esc_attr( $phone ); ?>"> 
				</td>

			</tr>
			<tr> 
				<td>
					<?php _e( 'Location: ', 'ctshowcase' ); ?>
				</td>
				<td>
					<input name="<?php echo $this->prefix . 'location'; ?>" type="text" id="<?php echo $this->prefix . 'location'; ?> " value="<?php echo esc_attr( $location ); ?>"> 
				</td>

			</tr>
			<tr> 
				<td>
					<?php _e( 'Personal Site: ', 'ctshowcase' ); ?>
				</td>
				<td>
					<input name="<?php echo $this->prefix . 'personal_site'; ?>" type="text" id="<?php echo $this->prefix . 'personal_site'; ?> " value="<?php echo esc_attr( $personal_site ); ?>"> 
				</td>

			</tr>
			<tr> 
				<td>
					<?php _e( 'External Url: ', 'ctshowcase' ); ?>
				</td>
				<td>
					<input name="<?php echo $this->prefix . 'external_url'; ?>" type="text" id="<?php echo $this->prefix . 'external_url'; ?> " value="<?php echo esc_attr( $external_url ); ?>"> 
				</td>
				<td style="max-width: 550px">
					<p class="description"><?php _e( 'External url is used only when the entry link value in shortcode settings is set to be external url. This would simply will re-direct user to this url after clicking on team member image' ); ?> </p>
				</td>

			</tr>
			<?php do_action( $this->prefix . 'add_extra_main_info' ); ?>
		</table> 
		<?php
	}

	/**
	 * Render Social Media.
	 *
	 * @since 1.0.0
	 *
	 * @param object $var Post
	 */
	public function render_social_media( $post ) {
		?>
		<table style="padding-left: 30px;" cellpadding="3">
			<?php
			foreach ( $this->social_links as $social_icon => $social_link ) :
				$link = get_post_meta( $post->ID, $this->prefix . 'social_' . $social_link . '_link', true );
				?>
				<tr>
					<td>

						<?php echo ucfirst( str_replace( '_', ' ', $social_link ) ) . ': '; ?>
					</td>
					<td>
						<input name="<?php echo $this->prefix . 'social_' . $social_link . '_link'; ?>" 
							   type="text" 
							   id="<?php echo $this->prefix . 'social_' . $social_link . '_link'; ?>" 
							   value="<?php echo esc_attr( $link ); ?>">
					</td>

				</tr>
			<?php endforeach; ?>




		</table> 
		<?php
	}

	/**
	 * Render Skills.
	 *
	 * @since 1.0.0
	 */
	public function render_skills( $post ) {
		wp_enqueue_style( $this->plugin_name . '-admin-main' );
		wp_enqueue_script( $this->prefix . 'wp-color-picker-alpha' );
		wp_enqueue_script( $this->prefix . 'admin-select2' );
		wp_enqueue_script( $this->prefix . 'admin-main-js' );
		$default_skills_no = 4;
		$skills            = get_post_meta( $post->ID, $this->prefix . 'skills', true );
		?>
		<table class="skills-table"  style="padding-left: 30px;" cellpadding="3">   
			<tr>
				<th>
					<?php _e( 'Skill No', 'ctshowcase' ); ?>
				</th>
				<th>
					<?php _e( 'Skill Name', 'ctshowcase' ); ?>
				</th>
				<th>
					<?php _e( 'Skill Level', 'ctshowcase' ); ?>
				</th>
				<th>
					<?php _e( 'Skill Bar Foreground Fill Color', 'ctshowcase' ); ?>
				</th>
				<th>

				</th>
			</tr>

			<?php
			if ( empty( $skills ) ) {
				for ( $i = 0; $i < $default_skills_no; ++$i ) {
					echo $this->render_skill_row( $i );
				}
			} else {
				$remaining_skills_no = $default_skills_no - count( $skills );
				foreach ( $skills as $skill ) {
					echo $this->render_skill_row( null, $skill );
				}
				if ( $remaining_skills_no > 0 ) {
					for ( $i = count( $skills ); $i < $remaining_skills_no; ++$i ) {
						echo $this->render_skill_row( $i );
					}
				}
			}
			?>
		</table>
		<table style="padding-left: 30px;" cellpadding="3">
			<tr>               
				<td>
					<button class="button button-primary add-new-skill-btn">
						<?php _e( 'Add new skill', 'ctshowcase' ); ?>
					</button>
				</td>
			</tr>
		</table>


		<?php
	}

	/**
	 * Render Skills row.
	 *
	 * @since 1.0.0
	 */
	public function render_skill_row( $skill_bar_color_index = 0, $skill = null ) {
		ob_start();
		?>
		<tr>
			<td class='skills-counter'>  
			</td>
			<td>
				<input 
					class='skill-name'
					value="<?php echo ! empty( $skill ) && ! empty( $skill['skill_name'] ) ? esc_attr( $skill['skill_name'] ) : ''; ?>" 
					type="text" 
					/>
			</td>

			<td>
				<input 
					class="skill-level"
					value=<?php echo ! empty( $skill ) && ! empty( $skill['skill_level'] ) ? esc_attr( $skill['skill_level'] ) : 90; ?> 
					min="1" 
					max="100" 
					type="range" 
					/>   
				<output  class="skillLevelOutput"><?php echo ! empty( $skill ) && ! empty( $skill['skill_level'] ) ? esc_attr( $skill['skill_level'] ) : 90; ?> </output>
			</td>
			<td>
				<input type="text" class="ctshowcase-color-picker skill-bar-color" value=<?php echo ! empty( $skill ) && ! empty( $skill['skill_bar_color'] ) ? esc_attr( $skill['skill_bar_color'] ) : $this->skill_bar_default_colors[ $skill_bar_color_index ]; ?> />
			</td>
			<td class='delete-skill'>
				<button class='button button-primary'> <?php _e( 'Delete', 'ctshowcase' ); ?> </button>
			</td>
		</tr>

		<?php
		return ob_get_clean();
	}

	/**
	 * Save all post meta.
	 *
	 * @since 1.0.0
	 *
	 * @param type int Post id
	 */
	public function save_post_meta_for_cts_team_member( $post_id ) {
		$social_links = array();
		if ( ! empty( $this->social_links ) ) {
			foreach ( $this->social_links as $social_icon => $social_link ) {
				$social_links[] = $this->prefix . 'social_' . $social_link . '_link';
			}
		}

		$metaboxes_arr = apply_filters(
			$this->prefix . 'metabox_arr',
			array_merge(
				array(
					$this->prefix . 'job_title',
					$this->prefix . 'email',
					$this->prefix . 'phone',
					$this->prefix . 'skills',
					$this->prefix . 'location',
					$this->prefix . 'personal_site',
					$this->prefix . 'external_url',

				),
				$social_links
			)
		);
		foreach ( $metaboxes_arr as $custom_field ) :
			if ( isset( $_POST[ $custom_field ] ) ) {
				if ( ! is_array( $_POST[ $custom_field ] ) ) :
					$_POST[ $custom_field ] = esc_attr( trim( $_POST[ $custom_field ] ) );
				endif;
				update_post_meta( $post_id, $custom_field, $_POST[ $custom_field ] );
			}
		endforeach;
		do_action( $this->prefix . 'after_saving_post_meta' );
	}

	/**
	 * Register Custom Taxonomies.
	 *
	 * @since 1.0.0
	 */
	public function register_custom_taxonomies() {
		$custom_taxonomy = array(
			'name'               => __( 'Groups', 'ctshowcase' ),
			'singular_name'      => __( 'Group', 'ctshowcase' ),
			'search_items'       => __( 'Search Group', 'ctshowcase' ),
			'all_items'          => __( 'All Groups', 'ctshowcase' ),
			'parent_item'        => __( 'Parent Group', 'ctshowcase' ),
			'parent_item_colon'  => __( 'Parent Group:', 'ctshowcase' ),
			'edit_item'          => __( 'Edit Group', 'ctshowcase' ),
			'update_item'        => __( 'Update Group', 'ctshowcase' ),
			'add_new_item'       => __( 'Add New Group', 'ctshowcase' ),
			'new_item_name'      => __( 'New Group Name', 'ctshowcase' ),
			'menu_name'          => __( 'Groups', 'ctshowcase' ),
			'not_found'          => __( 'No groups found', 'ctshowcase' ),
			'not_found_in_trash' => __( 'No Groups found in trash', 'ctshowcase' ),
		);
		// Now register the taxonomy
		register_taxonomy(
			$this->prefix . 'group',
			array( 'ctshowcase_member' ),
			array(
				'hierarchical'      => true,
				'labels'            => $custom_taxonomy,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => $this->prefix . 'group' ),
			)
		);
	}

	/**
	 * Add custom metaboxes for cts shortcode.
	 *
	 * @since 1.0.0
	 */
	public function add_custom_meta_boxes_for_cts_shortcode() {
		add_meta_box(
			$this->prefix . 'main_info',
			__( 'Settings', 'ctshowcase' ),
			array( $this, 'render_shortcode_settings' ),
			$this->prefix . 'shortcode',
			'normal',
			'high'
		);
	}

	/**
	 * Add Team ordering page.
	 *
	 * @since 1.0.0
	 */
	public function add_team_order_page() {
		add_submenu_page( 'edit.php?post_type=' . 'ctshowcase_member', __( 'Team ordering', 'ctshowcase' ), __( 'Team ordering', 'ctshowcase' ), 'ctshowcase_team_ordering', 'ctshowcase_ordering', array( $this, 'render_team_ordering_page' ) );
	}

	/**
	 * Render Team ordering page.
	 *
	 * @since 1.0.0
	 */
	public function render_team_ordering_page() {
		require_once 'partials/team-ordering.php';
	}

	/**
	 * Render shortcode settings.
	 *
	 * @since 1.0.0
	 */
	public function render_shortcode_settings( $post ) {
		require_once 'partials/shortcode-settings.php';
	}

	/**
	 * Get shortcode default settings
	 * if you would like to add a custom meta for ctshowcase_shortcode post type ,
	 *  it is pretty easy, you just have to add the new field name in this defaults array and add the form field html using one of the hooks in shortcode-settings page.
	 *
	 * @since 1.0.0
	 */
	public function get_shortcode_default_settings( $settings = 'general' ) {
		switch ( $settings ) :
			case 'general':
				return apply_filters(
					$this->prefix . 'shortcode_general_default_settings',
					array(
						'shortcode_layout'                 => 'wave',
						'number_posts_to_load'             => 0,
						'groups_to_include'                => array(),
						'entry_link'                       => 'inactive',
						'ids_to_include'                   => array(),
						'ids_to_exclude'                   => array(),
						'order_by'                         => 'menu_order',
						'order'                            => 'DESC',
						'modal_bg'                         => '#313131',
						'modal_header_bg'                  => '#f2673c',
						'modal_main_text_color'            => '#decccc',
						'modal_main_font_size'             => 14,
						'modal_team_member_name_font_size' => 30,
						'modal_team_member_name_color'     => '#fff',
						'modal_team_member_job_title_font_size' => 20,
						'modal_team_member_job_title_font_color' => '#46d0d0',
						'modal_other_headings_font_size'   => 25,
						'modal_other_headings_font_color'  => '#fff',
						'modal_skill_bar_bg'               => '#171717',
						'modal_separator_color'            => '#4c4c4c',
						'modal_social_media_bar_bg_color'  => '#212121',
						'modal_social_media_font_color'    => '#fff',
						'modal_header_icons_color'         => '#fff',
						'modal_skills_title'               => 'Skills',
						'modal_location_title'             => 'Location',
						'modal_email_title'                => 'Email',
						'modal_phone_title'                => 'Phone',
						'modal_personal_site_title'        => 'Personal site',
					)
				);
			break;
			case 'wave':
				return apply_filters(
					$this->prefix . 'shortcode_wave_default_settings',
					array(
						'wave_theme_color'             => '#32c5d8',
						'wave_team_member_name_color'  => '#000',
						'wave_team_member_job_title_font_size' => 20,
						'wave_display_heading'         => 'yes',
						'wave_display_subheading'      => 'yes',
						'wave_heading'                 => 'Our Team',
						'wave_heading_color'           => '#000',
						'wave_heading_font_size'       => 42,
						'wave_subheading'              => 'The Rockstars',
						'wave_subheading_color'        => '#32c5d8',
						'wave_subheading_font_size'    => 20,
						'wave_xl_team_member_name_font_size' => 42,
						'wave_lg_team_member_name_font_size' => 40,
						'wave_md_team_member_name_font_size' => 36,
						'wave_sm_team_member_name_font_size' => 24,
						'wave_xs_team_member_name_font_size' => 18,
						'wave_xl_heading_font_size'    => 42,
						'wave_lg_heading_font_size'    => 40,
						'wave_md_heading_font_size'    => 36,
						'wave_sm_heading_font_size'    => 24,
						'wave_xs_heading_font_size'    => 18,
						'wave_xl_subheading_font_size' => 20,
						'wave_lg_subheading_font_size' => 20,
						'wave_md_subheading_font_size' => 18,
						'wave_sm_subheading_font_size' => 16,
						'wave_xs_subheading_font_size' => 16,
						'wave_xl_team_member_job_title_font_size' => 20,
						'wave_lg_team_member_job_title_font_size' => 20,
						'wave_md_team_member_job_title_font_size' => 18,
						'wave_sm_team_member_job_title_font_size' => 16,
						'wave_xs_team_member_job_title_font_size' => 16,
					)
				);

			break;

			case 'mosaic':
				return apply_filters(
					$this->prefix . 'shortcode_mosaic_default_settings',
					array(
						'mosaic_even_theme_color'          => '#ef4939',
						'mosaic_row_members_no'				=> 2,
						'mosaic_even_team_member_name_color' => '#fff',
						'mosaic_display_social_icons'      => 'no',
						'mosaic_display_read_more_link'    => 'no',
						'mosaic_read_more_text'            => 'Read More',
						'mosaic_even_team_member_name_font_size' => 20,
						'mosaic_even_team_member_job_title_color' => '#fff',
						'mosaic_even_social_icons_color'   => '#fff',
						'mosaic_even_read_more_color'      => '#fff',
						'mosaic_odd_theme_color'           => '#f2673c',
						'mosaic_odd_team_member_name_color' => '#fff',
						'mosaic_odd_team_member_name_font_size' => 20,
						'mosaic_odd_team_member_job_title_color' => '#fff',
						'mosaic_odd_social_icons_color'    => '#fff',
						'mosaic_odd_read_more_color'       => '#fff',
						'mosaic_xl_team_member_name_font_size' => 24,
						'mosaic_lg_team_member_name_font_size' => 22,
						'mosaic_md_team_member_name_font_size' => 20,
						'mosaic_sm_team_member_name_font_size' => 24,
						'mosaic_xs_team_member_name_font_size' => 18,
						'mosaic_xl_team_member_job_title_font_size' => 18,
						'mosaic_lg_team_member_job_title_font_size' => 16,
						'mosaic_md_team_member_job_title_font_size' => 18,
						'mosaic_sm_team_member_job_title_font_size' => 15,
						'mosaic_xs_team_member_job_title_font_size' => 14,
						'mosaic_xl_social_icons_font_size' => 16,
						'mosaic_lg_social_icons_font_size' => 16,
						'mosaic_md_social_icons_font_size' => 14,
						'mosaic_sm_social_icons_font_size' => 16,
						'mosaic_xs_social_icons_font_size' => 14,
					)
				);
			break;

			case 'hex':
				return apply_filters(
					$this->prefix . 'shortcode_hex_default_settings',
					array(
						'hex_background_overlay'          => 'rgba(0, 0, 0, 0.85)',
						'no_of_hexagons'                  => 4,
						'hex_team_member_name_color'      => '#dd3333',
						'hex_team_member_name_font_style' => 'italic',
						'hex_team_member_job_title_color' => '#fff',
						'hex_enable_filter'               => 'no',
						'hex_filter_inactive_link_font_color' => '#fff',
						'hex_filter_inactive_link_bg_color' => '#424242',
						'hex_filter_active_link_font_color' => '#fff',
						'hex_filter_active_link_bg_color' => '#dd3333',
						'hex_xl_team_member_name_font_size' => 24,
						'hex_lg_team_member_name_font_size' => 22,
						'hex_md_team_member_name_font_size' => 20,
						'hex_sm_team_member_name_font_size' => 18,
						'hex_xs_team_member_name_font_size' => 16,
						'hex_xl_team_member_job_title_font_size' => 18,
						'hex_lg_team_member_job_title_font_size' => 18,
						'hex_md_team_member_job_title_font_size' => 15,
						'hex_sm_team_member_job_title_font_size' => 13,
						'hex_xs_team_member_job_title_font_size' => 13,
					)
				);
			break;

			case 'inlinePreview':
				return apply_filters(
					$this->prefix . 'shortcode_inlinePreview_settings',
					array(
						'inlinePreview_type'               => 'hex',
						'inlinePreview_no_of_cols'         => 4,
						'inlinePreview_list_col_bg'        => '#404f50',
						'inlinePreview_display_heading'    => 'yes',
						'inlinePreview_heading'            => 'Our Team',
						'inlinePreview_heading_color'      => '#fff',
						'inlinePreview_heading_font_size'  => 40,
						'inlinePreview_member_details_col_bg' => '#192231',
						'inlinePreview_main_text_color'    => '#fff',
						'inlinePreview_main_font_size'     => 14,
						'inlinePreview_team_member_name_font_size' => 30,
						'inlinePreview_team_member_name_color' => '#fff',
						'inlinePreview_team_member_job_title_font_size' => 20,
						'inlinePreview_team_member_job_title_font_color' => '#46d0d0',
						'inlinePreview_other_headings_font_size' => 25,
						'inlinePreview_other_headings_font_color' => '#fff',
						'inlinePreview_skill_bar_bg'       => '#171717',
						'inlinePreview_separator_color'    => '#4c4c4c',
						'inlinePreview_social_media_bar_bg_color' => '#c12b2b',
						'inlinePreview_social_media_font_size' => 14,
						'inlinePreview_social_media_font_color' => '#fff',
						'inlinePreview_header_icons_color' => '#fff',
						'inlinePreview_skills_title'       => 'Skills',
						'inlinePreview_location_title'     => 'Location',
						'inlinePreview_email_title'        => 'Email',
						'inlinePreview_phone_title'        => 'Phone',
						'inlinePreview_personal_site_title' => 'Personal site',
					)
				);
			break;

			case 'normalGrid':
				return apply_filters(
					$this->prefix . 'shortcode_normalGrid_settings',
					array(
						'normalGrid_type'                 => 'square',
						'normalGrid_style'                => 'style-1',
						'normalGrid_onHover'              => 'zoom-rotate',
						'normalGrid_no_of_cols'           => 4,
						'normalGrid_bg_overlay'           => 'rgba(0,0,0, .85)',
						'normalGrid_team_member_name_color' => '#fff',
						'normalGrid_team_member_name_bgColor' => '#c706d8',
						'normalGrid_team_member_job_title_color' => '#fff',
						'normalGrid_team_member_job_title_bgColor' => '#000',
						'normalGrid_display_social_icons' => 'no',
						'normalGrid_display_circle_bar'   => 'no',
						'normalGrid_team_social_icons_color' => '#fff',
						'normalGrid_info_icon_color'      => '#fff',
						'normalGrid_info_icon_bgColor'    => '#c706d8',
						'normalGrid_circle_bar_bgColor'   => 'rgba(0, 0, 0, 0.05)',
						'normalGrid_circle_bar_filling_color' => '#c706d8',
						'normalGrid_offset'               => 'yes',
						'normalGrid_enable_filter'        => 'no',
						'normalGrid_filter_inactive_link_font_color' => '#000',
						'normalGrid_filter_inactive_link_bg_color' => '#eee',
						'normalGrid_filter_active_link_font_color' => '#fff',
						'normalGrid_filter_active_link_bg_color' => '#c706d8',
						'normalGrid_xl_team_member_name_font_size' => 20,
						'normalGrid_lg_team_member_name_font_size' => 20,
						'normalGrid_md_team_member_name_font_size' => 18,
						'normalGrid_sm_team_member_name_font_size' => 18,
						'normalGrid_xs_team_member_name_font_size' => 18,
						'normalGrid_xl_team_member_job_title_font_size' => 18,
						'normalGrid_lg_team_member_job_title_font_size' => 16,
						'normalGrid_md_team_member_job_title_font_size' => 16,
						'normalGrid_sm_team_member_job_title_font_size' => 16,
						'normalGrid_xs_team_member_job_title_font_size' => 16,
						'normalGrid_xl_social_icons_font_size' => 16,
						'normalGrid_lg_social_icons_font_size' => 16,
						'normalGrid_md_social_icons_font_size' => 14,
						'normalGrid_sm_social_icons_font_size' => 16,
						'normalGrid_xs_social_icons_font_size' => 14,
					)
				);
			break;

			case 'slider':
				return apply_filters(
					$this->prefix . 'shortcode_slider_settings',
					array(
						'slider_type'                      => 'square',
						'slider_onHover'                   => 'zoom-rotate',
						'slider_arrows_bg_color'           => '#6d6d6d',
						'slider_arrows_color'              => '#fff',
						'slider_no_of_slides'              => 4,
						'slider_offset'                    => 'yes',
						'slider_bg_overlay'                => 'rgba(0,0,0, .85)',
						'slider_team_member_name_color'    => '#dd3333',
						'slider_team_member_job_title_color' => '#fff',
						'slider_display_social_icons'      => 'no',
						'slider_team_social_icons_color'   => '#fff',
						'slider_xl_team_member_name_font_size' => 24,
						'slider_lg_team_member_name_font_size' => 22,
						'slider_md_team_member_name_font_size' => 20,
						'slider_sm_team_member_name_font_size' => 18,
						'slider_xs_team_member_name_font_size' => 18,
						'slider_xl_team_member_job_title_font_size' => 18,
						'slider_lg_team_member_job_title_font_size' => 16,
						'slider_md_team_member_job_title_font_size' => 18,
						'slider_sm_team_member_job_title_font_size' => 15,
						'slider_xs_team_member_job_title_font_size' => 14,
						'slider_xl_social_icons_font_size' => 16,
						'slider_lg_social_icons_font_size' => 16,
						'slider_md_social_icons_font_size' => 14,
						'slider_sm_social_icons_font_size' => 14,
						'slider_xs_social_icons_font_size' => 14,
					)
				);
			break;
		endswitch;
	}

	/**
	 * Save  shortcode data.
	 *
	 * @since 1.0.0
	 */
	public function save_post_meta_for_cts_shortcode( $post_id ) {
		if ( get_post_type( $post_id ) == $this->prefix . 'shortcode' ) :
			$settings = array( 'general', 'wave', 'mosaic', 'hex', 'inlinePreview', 'normalGrid', 'slider' );
			foreach ( $settings as $setting ) :
				$data                       = array();
				$shortcode_setting_defaults = $this->get_shortcode_default_settings( $setting );
				foreach ( array_keys( $shortcode_setting_defaults ) as $field ) :
					if ( array_key_exists( $field, $_POST ) ) :
						$value = $_POST[ $field ]; else :
							$value = $shortcode_setting_defaults[ $field ];
				endif;
						if ( ! is_array( $value ) ) :
							$value = esc_attr( trim( $value ) ); else :
								$value = array_map( 'esc_attr', $value );
				endif;
									$data[ $field ] = $value;
			endforeach;
				update_post_meta( $post_id, $this->prefix . 'shortcode_' . $setting . '_data', $data );
		endforeach;
		endif;
	}

	/**
	 * Get the correct value for shortcode data.
	 *
	 * @since  1.0.0
	 */
	public function get_the_correct_value_for_shortcode_data( $post_id, $settings = array( 'general', 'wave', 'mosaic', 'hex', 'inlinePreview', 'normalGrid', 'slider' ) ) {
		$all_data = array();

		foreach ( $settings as $setting ) :
			$setting_data = get_post_meta( $post_id, $this->prefix . 'shortcode_' . $setting . '_data', true );
			$default_data = $this->get_shortcode_default_settings( $setting );
			foreach ( $default_data as $key => $value ) {
				if ( ! is_array( $setting_data ) || ! isset( $setting_data[ $key ] ) ) {
					$all_data[ $key ] = $value;
				} else {
					if ( is_array( $setting_data[ $key ] ) ) :
						$all_data[ $key ] = array_map( 'esc_attr', $setting_data[ $key ] ); else :
							$all_data[ $key ] = esc_attr( $setting_data[ $key ] );
					endif;
				}
			}
		endforeach;

		return $all_data;
	}

	/**
	 * Add custom taxonomy fields.
	 *
	 * @since 1.0.0
	 */
	public function add_custom_taxonomy_fields() {
		wp_enqueue_script( 'wp-color-picker-alpha' );
		wp_enqueue_script( $this->prefix . 'admin-select2' );
		wp_enqueue_script( $this->prefix . 'admin-main-js' );
		wp_enqueue_style( $this->plugin_name . '-admin-main' );
		ob_start();
		?>
		<div class="form-field"> 
			<div>
		<?php _e( 'Override default theme color: ', 'ctshowcase' ); ?>
			</div>

			<input type="hidden" name='ctshowcase_override_default_theme_color' value="no" />
			<input name="ctshowcase_override_default_theme_color"
				   id="ctshowcase_override_default_theme_color"
				   type="checkbox"
				   class="ctshowcase-tgl ctshowcase-tgl-light" 
				   value='yes'
				   > 
			<label  class="ctshowcase-tgl-btn group-ctshowcase-tgl-btn" for="ctshowcase_override_default_theme_color"></label>

		   
		</div>
		<div>
			<p class="description"><?php _e( 'This feature works only in case of wave layout. Theme color means the color for job title , connectors and waves around team member image.', 'ctshowcase' ); ?> </p>
		</div>
		<div class="form-field ctshowcase_scheme_color">
			<label> <?php _e( 'Theme Color: ', 'ctshowcase' ); ?></label>
			<input type="text" class="ctshowcase-color-picker" name="ctshowcase_scheme_color"  class="widefat" />
		</div>
		<?php
		echo ob_get_clean();
	}

	/**
	 * Edits custom taxonomy fields.
	 *
	 * @param type $term
	 *
	 * @since 1.0.0
	 */
	public function edit_custom_taxonomy_fields( $term ) {
		wp_enqueue_script( 'wp-color-picker-alpha' );
		wp_enqueue_script( $this->prefix . 'admin-select2' );
		wp_enqueue_style( $this->plugin_name . '-admin-main' );
		wp_enqueue_script( $this->prefix . 'admin-main-js' );
		ob_start();
		$ctshowcase_override_default_theme_color = get_term_meta( $term->term_id, 'ctshowcase_override_default_theme_color', true );
		$ctshowcase_scheme_color                 = get_term_meta( $term->term_id, 'ctshowcase_scheme_color', true );
		?>
		<table class='form-table'>
			<tr class="form-field">
				<th scope="row" valign="top">
					<label> <?php _e( 'Override default theme color: ', 'ctshowcase' ); ?> </label>
				</th>
				<td>
					<input type="hidden" name='ctshowcase_override_default_theme_color' value="no" />
					<input name="ctshowcase_override_default_theme_color"
						   id="ctshowcase_override_default_theme_color"
						   type="checkbox"
		<?php echo $ctshowcase_override_default_theme_color == 'yes' ? 'checked' : ''; ?>
						   class="ctshowcase-tgl ctshowcase-tgl-light" 
						   value='yes'
						   /> 
					<label  class="ctshowcase-tgl-btn group-ctshowcase-tgl-btn" for="ctshowcase_override_default_theme_color"></label>
					<p class="description"><?php _e( 'This feature works only in case of wave layout. Theme color means the color for job title , connectors and waves around team member image.', 'ctshowcase' ); ?> </p>
				</td>
			</tr>
			<tr class="form-field ctshowcase_scheme_color">
				<th scope="row" valign="top" style="text-align: left;">
					<label> <?php _e( 'Theme color: ', 'ctshowcase' ); ?> </label>
				</th>
				<td>
					<input type="text" class="ctshowcase-color-picker" name="ctshowcase_scheme_color" value="<?php echo esc_attr( $ctshowcase_scheme_color ); ?>"  class="widefat" />
				</td>
			</tr>
		</table>
		<?php
		echo ob_get_clean();
	}

	/*
	 * Save custom taxonomy fields
	 *
	 * @since 1.0.0
	 */

	public function save_custom_taxonomy_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
		if ( $taxonomy == $this->prefix . 'group' ) :
			if ( ! empty( $_POST['ctshowcase_override_default_theme_color'] ) ) :

				update_term_meta( $term_id, 'ctshowcase_override_default_theme_color', esc_attr( $_POST['ctshowcase_override_default_theme_color'] ) );
				if ( ! empty( $_POST['ctshowcase_scheme_color'] ) ) :
					update_term_meta( $term_id, 'ctshowcase_scheme_color', esc_attr( $_POST['ctshowcase_scheme_color'] ) );
		endif;
		endif;
		endif;
	}

	/**
	 * Save Team Sorting.
	 *
	 * @since 1.0.0
	 */
	public function save_team_sorting() {
		global $wpdb;
		$ordering = $_GET['ordering'];
		$counter  = $_GET['team_no'] + 1;
		foreach ( $ordering as $id ) :
			$data = array( 'menu_order' => $counter );
			$wpdb->update( $wpdb->posts, $data, array( 'ID' => $id ) );
			--$counter;
		endforeach;
	}

	/**
	 * Add ctshowcase visual composer element.
	 *
	 * @since 1.0.0
	 */
	public function add_ctshowcase_vc_element() {
		require_once 'integration/visual-composer/ctshowcase-vc-element.php';
	}

	/**
	 * Add shortcode column to shortcode table.
	 *
	 * @since 1.0.0
	 */
	public function add_shortcode_column_head_to_shortcode_table( $columns ) {
		unset( $columns['date'] );
		$columns['ctshowcase_shortcode'] = __( 'Shortcode', 'ctshowcase' );
		$columns['date']                 = __( 'Date', 'ctshowcase' );

		return $columns;
	}

	/**
	 * Add shortcode column content to shortcode table.
	 *
	 * @since 1.0.0
	 *
	 * @param string $column  column name
	 * @param int    $post_id the post id
	 */
	public function add_shortcode_column_content_to_shortcode_table( $column, $post_id ) {
		if ( get_post_type( $post_id ) == 'ctshowcase_shortcode' && get_post_status( $post_id ) == 'publish' ) {
			if ( $column == 'ctshowcase_shortcode' ) {
				echo '[ctshowcase id="' . $post_id . '" title="' . get_the_title( $post_id ) . '" ]';
			}
		}
	}

	/**
	 * Add admin capability for re-ordering.
	 *
	 * @since 1.0.0
	 */
	public function add_admin_cap_for_ordering() {
		$roles = new WP_Roles();
		$roles->add_cap( 'administrator', 'ctshowcase_team_ordering', true );
	}
}
