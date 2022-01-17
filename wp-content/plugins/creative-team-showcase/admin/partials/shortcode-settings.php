<?php
wp_enqueue_script( $this->prefix . 'admin-select2' );
wp_enqueue_style( $this->plugin_name . '-admin-main' );
wp_enqueue_script( $this->prefix . 'admin-main-js' );
wp_enqueue_style( $this->plugin_name . '-admin-select2' );
wp_enqueue_script( $this->prefix . 'wp-color-picker-alpha' );
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$layout_types = apply_filters(
	'ctshowcase_layout_types',
	array(
		'normal-grid'    => 'Normal Grid',
		'mosaic'         => 'Mosaic',
		'hex-grid'       => 'Hexagonal Grid',
		'slider'         => 'Slider',
		'wave'           => 'Wave',
		'inline-preview' => 'Inline preview',

	)
);
$all_data = $this->get_the_correct_value_for_shortcode_data( $post->ID );
extract( $all_data );
$team_query = new WP_Query(
	array(
		'post_type'      => 'ctshowcase_member',
		'posts_per_page' => -1,
	)
);
require 'shortcode/shortcode-general-settings.php';
require 'shortcode/shortcode-wave-settings.php';
require 'shortcode/shortcode-hex-settings.php';
require 'shortcode/shortcode-inline-preview-settings.php';
require 'shortcode/shortcode-normal-grid-settings.php';
require 'shortcode/shortcode-mosaic-settings.php';
require 'shortcode/shortcode-slider-settings.php';
