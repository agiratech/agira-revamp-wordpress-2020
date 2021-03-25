<?php
/*-----------------------------------------------*
Define THEME
/*-----------------------------------------------*/
if (!defined('RUYA_URI_PATH')) define('RUYA_URI_PATH', get_template_directory_uri());
if (!defined('RUYA_ABS_PATH')) define('RUYA_ABS_PATH', get_template_directory());
if (!defined('RUYA_URI_PATH_FR')) define('RUYA_URI_PATH_FR', RUYA_URI_PATH.'/framework');
if (!defined('RUYA_ABS_PATH_FR')) define('RUYA_ABS_PATH_FR', RUYA_ABS_PATH.'/framework');
if (!defined('RUYA_URI_PATH_ADMIN')) define('RUYA_URI_PATH_ADMIN', RUYA_URI_PATH_FR.'/admin');
if (!defined('RUYA_ABS_PATH_ADMIN')) define('RUYA_ABS_PATH_ADMIN', RUYA_ABS_PATH_FR.'/admin');

/*-----------------------------------------------*
Register Default Fonts
/*-----------------------------------------------*/
function ruya_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'ruya' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Roboto:400,500,600,700|Nunito Sans|Noto Sans TC|Nunito|Muli|Hind|Cabin|Lato|Poppins|Cookie|karla|Oswald|Playfair Display|Alegreya Sans|Changa|Open Sans:400,500,600,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*-----------------------------------------------*
Enqueue Style , Script
/*-----------------------------------------------*/
function ruya_enqueue_scripts() {
	global $ruya_options;
	wp_enqueue_style( 'fonts', ruya_fonts_url(), array(), '1.0.0');
	wp_enqueue_style( 'bootstrap', RUYA_URI_PATH. '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'ruya-font-icons', RUYA_URI_PATH. '/assets/css/font-icons.css');
	wp_enqueue_style( 'ruya-plugins', RUYA_URI_PATH. '/assets/css/plugins.css' );
	wp_enqueue_style( 'ruya-core', RUYA_URI_PATH. '/assets/css/core.css');
	wp_enqueue_style( 'ruya-style', RUYA_URI_PATH.'/assets/css/style.css' );
	wp_enqueue_style( 'ruya-wp-custom-style', RUYA_URI_PATH . '/assets/css/wp-custom-style.css');
    /* script */
	wp_enqueue_script( 'modernizr', RUYA_URI_PATH.'/assets/js/modernizr.js', array( 'jquery' ), false, true);
	wp_enqueue_script( 'ruya-vendors', RUYA_URI_PATH. '/assets/js/vendors.js', array( 'jquery' ), false, true);
    wp_enqueue_script( 'ruya-custom', RUYA_URI_PATH. '/assets/js/custom.js', array( 'jquery' ), false, true );
	/*  Queue Comments reply js */
	if ( is_singular() && comments_open() && get_option('thread_comments') ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ruya_enqueue_scripts' );

/* Add Stylesheet And Script Backend */
function custom_admin_scripts(){
	wp_enqueue_script( 'ruya-action', RUYA_URI_PATH_ADMIN.'/assets/js/action.js', array('jquery'), '', true  );
	wp_enqueue_style( 'ruya-style-admin', RUYA_URI_PATH_ADMIN.'/assets/css/style-admin.css', false );
}
add_action( 'admin_enqueue_scripts', 'custom_admin_scripts');
/*------------------------------------------*
Framework , Theme Options
/*-----------------------------------------------*/
if( function_exists( 'ruya_redux_setup' ) ) {
	ruya_redux_setup( RUYA_ABS_PATH_ADMIN.'/options.php' );
}
require_once (RUYA_ABS_PATH_ADMIN.'/index.php');
require_once RUYA_ABS_PATH_FR . '/includes.php';

/* Init Functions */
function ruya_init() {
	global $ruya_options;
	require_once RUYA_ABS_PATH_FR.'/presets.php';
}
add_action( 'init', 'ruya_init' );
/* This theme styles the visual editor to resemble the theme style */
function ruya_after_setup_theme() {
	add_action( 'wp_enqueue_scripts', 'ruya_enqueue_scripts', 99 );
	add_editor_style( 'framework/admin/assets/css/ruya-editor.css' );
	if ( is_rtl() ) {
		add_editor_style( 'framework/admin/assets/css/ruya-editor-rtl.css' );
	}
}
add_action( 'after_setup_theme', 'ruya_after_setup_theme' );
/*-----------------------------------------------*
Template Functions
/*-----------------------------------------------*/
require_once RUYA_ABS_PATH_FR . '/template-functions.php';
require_once RUYA_ABS_PATH_FR . '/templates/post-functions.php';

/*-----------------------------------------------*
Register Sidebar
/*-----------------------------------------------*/
if (!function_exists('ruya_RegisterSidebars')) {
	function ruya_RegisterSidebars(){
		register_sidebar(array(
			'name' => esc_html__('Main Sidebar', 'ruya'),
			'id' => 'ruya-main-sidebar',
		    'description'   => esc_html__( 'This is default sidebar.', 'ruya' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Left Sidebar', 'ruya'),
			'id' => 'ruya-left-sidebar',
			'description'   => esc_html__( 'This is blog left sidebar.', 'ruya' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Right Sidebar', 'ruya'),
			'id' => 'ruya-right-sidebar',
			'description'   => esc_html__( 'This is blog right sidebar.', 'ruya' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Sidepanel Menu', 'ruya'),
			'id' => 'ruya-sidepanel-menu',
		    'description'   => esc_html__( 'This is sidepanel header.', 'ruya' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Sidepanel Info', 'ruya'),
			'id' => 'ruya-sidepanel-info',
		    'description'   => esc_html__( 'This is sidepanel info.', 'ruya' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(6, array(
			'name' => esc_html__('Footer Widget %d', 'ruya'),
			'id' => 'ruya-footer-widget',
			'description'   => esc_html__( 'This is footer widget sidebar.', 'ruya' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
	if (class_exists ( 'Woocommerce' )) {
			register_sidebar(array(
				'name' => esc_html__('Shop Sidebar', 'ruya'),
				'id' => 'ruya-shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="wg-title">',
				'after_title' => '</h4>',
			));
		}
	}
}
add_action( 'widgets_init', 'ruya_RegisterSidebars' );


add_filter('auth_cookie_expiration', 'my_expiration_filter', 99, 3);
function my_expiration_filter($seconds, $user_id, $remember){
//if "remember me" is checked;
$expiration = 60*60; //UPDATE HERE;
//http://en.wikipedia.org/wiki/Year_2038_problem
if ( PHP_INT_MAX - time() < $expiration ) {
//Fix to a little bit earlier!
$expiration = PHP_INT_MAX - time() - 5;
}
return $expiration;
}
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2021/03/a-logo.png);
		height:65px;
		width:320px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Agira Technologies';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/*-----------------------------------------------*
WooCommerce
/*-----------------------------------------------*/
if (class_exists('Woocommerce')) {
   require_once RUYA_ABS_PATH.'/woocommerce/wc-template-function.php';
   require_once RUYA_ABS_PATH.'/woocommerce/wc-template-hooks.php';
}?>