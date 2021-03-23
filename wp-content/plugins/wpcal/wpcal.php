<?php
/**
 * Plugin Name: WPCal.io
 * Plugin URI: https://wpcal.io/
 * Description: Allow your customer to book appoinments online without back-and-forth emails.
 * Version: 0.9.4.4
 * Author: Revmakx
 * Author URI: https://revmakx.com/
 * Developer: WPCal
 * Developer URI: https://wpcal.io/
 * Domain Path: /languages
 */

 /**
 * WPCal.io
 * Copyright (c) 2020 Revmakx LLC
 * revmakx.com
 */
 
 if(!defined( 'ABSPATH' )){ exit;}

 include WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/includes/class_init.php';
 WPCal_Init::init();