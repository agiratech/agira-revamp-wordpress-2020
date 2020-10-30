<?php

function load_stylesheets()
{

    wp_register_style('bootstrapstyle', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css',
    array(), false, 'all');
    wp_enqueue_style('bootstrapstyle');

    wp_register_style('style', get_template_directory_uri() . '/style.css',
    array(), false, 'all');
    wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function include_jquery()
{

    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/bootstrap/js/jquery-3.5.1.min.js', '', 1, true);

    add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');

function loadjs()
{

    wp_register_script('customjs', get_template_directory_uri() . '/scripts.js',
    '', 1, true);
    wp_enqueue_script('customjs');
    
}
add_action('wp_enqueue_scripts', 'loadjs');
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'AgiraTheme' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'AgiraTheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );