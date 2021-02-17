<?php
/** 
 * ruya_redux_setup
 *
 * @param string $options_file
 */
function ruya_redux_setup( $options_file = '' ) 
{
    // Load the embedded Redux Framework
    if ( file_exists( dirname( __FILE__ ).'/redux-framework/framework.php' ) ) {
        require_once dirname(__FILE__).'/redux-framework/framework.php';
    }
	// Load Post Type
	if ( file_exists( dirname( __FILE__ ).'/post/post-type.php' ) ) {
        require_once dirname(__FILE__).'/post/post-type.php';
    }
	require_once dirname( __FILE__ ) . '/meta-boxes/meta-boxes.php';
	// post functions
	require_once dirname( __FILE__ ) . '/post/post-functions.php';
	
    if ( file_exists( $options_file ) ) require_once $options_file;
    // Load Redux extensions
    if ( file_exists( dirname( __FILE__ ) . '/redux-extensions/extensions-init.php' ) ) {
        require_once dirname( __FILE__ ) . '/redux-extensions/extensions-init.php';
    }
	/* Add extra icon type on visual composer */
	require_once dirname( __FILE__ ) . '/fontlibs/pe7stroke.php';
    require_once dirname( __FILE__ ) . '/fontlibs/etline.php';
	require_once dirname( __FILE__ ) . '/fontlibs/ionicons.php';
	require_once dirname( __FILE__ ) . '/fontlibs/animated.php';
}