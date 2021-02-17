<?php
vc_map ( array (
	"name" => 'Blog Carousel',
	"base" => "blog_carousel",
	"icon" => "tb-icon-for-vc fa fa-qrcode",
	"category" => esc_html__( 'Extra Elements', 'ruya' ), 
	'admin_enqueue_js' => array(RUYA_JS.'customvc.js'),
	"params" => array (
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Template", 'ruya'),
				"param_name" => "tpl",
	            "admin_label" => true,
				"value" => array(
	                "Image Middle"  => "tpl1",
					"Image Overlay" => "tpl2",
					"Without Image" => "tpl3",
				),
				"description" => esc_html__('Select template of posts display in this element.', 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Large devices", 'ruya'),
			"param_name" => "col_lg",
			"value" => "",
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__("Please, enter number Columns Large devices Desktops (>=1200px) in this element. Default: 3", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Column Medium device", 'ruya'),
			"param_name" => "col_md",
			"value" => "",
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__("Please, enter number Columns Medium devices Desktops (>=992px) in this element. Default: 3", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Small devices", 'ruya'),
			"param_name" => "col_sm",
			"value" => "",
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__("Please, enter number Columns Small devices Tablets (>=768px) in this element. Default: 2", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns x-small device", 'ruya'),
			"param_name" => "col_xs",
			"value" => "",
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__("Please, enter number Columns Extra small devices Phones (<768px) in this element. Default: 1", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Item Space", 'ruya'),
			"param_name" => "item_space",
			"value" => "",
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__("Please, enter number space between items in this element. Default: 30", 'ruya')
		),
	    array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("SmartSpeed", 'ruya'),
			"param_name" => "smartspeed",
			"value" => "",
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__("Please, enter number smartSpeed(Speed Calculate. More info to come..) in this element. Default: 500", 'ruya')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Loop", 'ruya'),
			"param_name" => "loop",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
	       'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__('Inifnity loop. Duplicate last and first items to get loop illusion.', 'ruya')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("autoplay", 'ruya'),
			"param_name" => "autoplay",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__('Autoplay.', 'ruya')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav", 'ruya'),
			"param_name" => "nav",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__('Show next/prev buttons.', 'ruya')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav Position", 'ruya'),
			"param_name" => "nav_position",
			"value" => array(
				"Middle" => "nav-middle",
	            "right" => "nav-right",
				"left" => "nav-left"
			),
			"dependency" => array(
				"element"=>"nav",
				"value"=> "true"
			), 
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__('Select position next/prev buttons.', 'ruya')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots", 'ruya'),
			"param_name" => "dots",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__('Show dots navigation.', 'ruya')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots Direction Position", 'ruya'),
			"param_name" => "dots_dir_position",
			"value" => array(
				"center" => "dots-center",
				"Right" => "dots-right",
				"Left" => "dots-left",
			),
			"dependency" => array(
				"element"=>"dots",
				"value"=> "true"
			),
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__('Select direction position dots navigation.', 'ruya')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots and Nav Color", 'ruya'),
			"param_name" => "dots_nav_color",
			"value" => array(
				"primary"   => "primary",
				"secondary" => "secondary",
				"dark"      => "dark",
				"light"     => "light"
			),
	        'edit_field_class' => 'vc_col-sm-3',
			"description" => esc_html__('Select color dots and nav.', 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
		),
		array (
			"type" => "mo_taxonomy",
			"taxonomy" => "category",
			"heading" => esc_html__( "Categories", 'ruya' ),
			"param_name" => "category",
			"group" => esc_html__("Build Query", 'ruya'),
			"description" => esc_html__( "Note: By default, all your projects will be displayed. If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'ruya' )
	   ),
		array (
			"type" => "textfield",
			"heading" => esc_html__( 'Count', 'ruya' ),
			"param_name" => "posts_per_page",
			'value' => '',
			"group" => esc_html__("Build Query", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6',
			"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'ruya' )
		),
	     array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Excerpt Length", 'ruya'),
			"param_name" => "excerpt_lenght",
			"value" => "",
			"group" => esc_html__("Build Query", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6',
			"description" => esc_html__("Please, Enter number excerpt lenght of post in this element. Default: 22", 'ruya')
		),
		array (
			"type" => "dropdown",
			"heading" => esc_html__( 'Order by', 'ruya' ),
			"param_name" => "orderby",
			"value" => array (
					"None" => "none",
					"Title" => "title",
					"Date" => "date",
					"ID" => "ID"
			),
			"group" => esc_html__("Build Query", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6',
			"description" => esc_html__( 'Order by ("none", "title", "date", "ID").', 'ruya' )
		),
		array (
			"type" => "dropdown",
			"heading" => esc_html__( 'Order', 'ruya' ),
			"param_name" => "order",
			"value" => Array (
					"None" => "none",
					"ASC" => "ASC",
					"DESC" => "DESC"
			),
			"group" => esc_html__("Build Query", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6',
			"description" => esc_html__( 'Order ("None", "Asc", "Desc").', 'ruya' )
		),
	)
));