<?php
/*
 * Plugin Name: Ruya Core
 * Plugin URI: http://motivoweb
 * Description: This is a plugin required for wordpress theme from motivoweb 
 * Version: 1.2
 * Author: motivoweb
 * Author URI: http://motivoweb
 * License: GPLv1 or later
 * Text Domain: motivoweb
 */
define( 'RUYA_DIR', plugin_dir_path(__FILE__) );
define( 'RUYA_URI', plugin_dir_url(__FILE__) );
define( 'RUYA_INCLUDES', RUYA_DIR . "includes/" );
define( 'RUYA_ADMIN', RUYA_DIR . "admin/" );
define( 'RUYA_ADMIN_URI', RUYA_URI . "admin/" );
define( 'RUYA_CSS', RUYA_URI . "assets/css/" );
define( 'RUYA_JS', RUYA_URI . "assets/js/" );
define( 'RUYA_IMAGES', RUYA_URI . "assets/images/" );
define( 'RUYA_TEMPLATES', RUYA_DIR . "templates" );

/* include functions.php */
require RUYA_INCLUDES . 'functions.php';

/* include Redux Options */
require RUYA_ADMIN . 'admin-init.php';

/*-----------------------------------------------*
Widgets
/*-----------------------------------------------*/
require_once RUYA_DIR.'widgets/abstract-widget.php';
require_once RUYA_DIR.'widgets/widgets.php';

/*-----------------------------------------------*
ruya_core
/*-----------------------------------------------*/
/* use class ruya_core */
new ruya_core;
/* class ruya_core */
class ruya_core
{
	function __construct()
	{
		add_action( 'init', array( $this, 'ruya_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_ruya_core_style' ) );
	}
	function ruya_init()
	{
		
	}
	function load_ruya_core_style() {
        wp_register_style( 'ruya-core-admin-css', RUYA_CSS . 'ruya-core.admin.css', false, '1.0.0' );
        wp_enqueue_style( 'ruya-core-admin-css' );
		wp_enqueue_style( 'ruya-font-icons',RUYA_CSS . 'font-icons.css', array(), '1.0.0' );
		
        wp_register_script( 'ruya-core-admin-js', RUYA_JS . 'jquery.ruya-core.admin.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'ruya-core-admin-js' );
		wp_localize_script( 'ruya-core-admin-js', 'ruya_object', array( 'ajax_url' => admin_url('admin-ajax.php') ) );
	}
	
}
/*-----------------------------------------------*
shortcodes
/*-----------------------------------------------*/
/* Vc extra params */
if (function_exists("vc_add_param")){
	require_once RUYA_INCLUDES.'vc_extra_params.php';
}
/* Vc extra Fields */
if (class_exists('Vc_Manager')) {
    function vc_add_extra_field( $name, $form_field_callback, $script_url = null ) {
            return WpbakeryShortcodeParams::addField( $name, $form_field_callback, $script_url );
    }
}
/* Vc extra shorcodes */
if (function_exists("vc_map")){
	foreach (glob(RUYA_INCLUDES."vc_element_shortcodes/*.php") as $filepath)
	{
		include $filepath;
	}
}
/* Vc extra field */
if (function_exists("vc_add_extra_field")){
	require_once RUYA_INCLUDES.'vc_extra_fields.php';
}
/*-----------------------------------------------*
 functions shortcodes 
/*-----------------------------------------------*/
require_once RUYA_INCLUDES . "functions_shortcodes.php";

new ruya_shortcodeCore();
class ruya_shortcodeCore{
	public function __construct(){
		add_action('plugins_loaded', array( $this, 'ruyaActionInit'));
		add_action('vc_before_init', array($this, 'ruyaShortcodeRegister'));
		//add_action('vc_after_init', array($this, 'ruyaShortcodeAddParams'), 11);
		add_filter('widget_text', 'do_shortcode');
	}
	function ruyaActionInit(){
	    global $wp_filesystem;
        if ( !class_exists('WP_Filesystem') ) {
        	require_once(ABSPATH . 'wp-admin/includes/file.php');
        	WP_Filesystem();
        }
	}
	function ruyaShortcodeRegister() {
	    require_once RUYA_INCLUDES . 'ruya_shortcodes.php';
	}
}?>