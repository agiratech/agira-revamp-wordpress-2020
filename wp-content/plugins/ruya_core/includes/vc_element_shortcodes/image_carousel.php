<?php
vc_map(array(
	"name" => esc_html__("Images Carousel", 'ruya'),
	"base" => "image_carousel",
	"category" => esc_html__('Extra Elements', 'ruya'),
    "icon" => "tb-icon-for-vc fa fa-sliders",
	"params" => array(
		array(
			"type" => "attach_images",
			"class" => "",
			"heading" => esc_html__("Images", 'ruya'),
			"param_name" => "images",
			"value" => "",
			"description" => esc_html__("Select box images in this element.", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Image size", 'ruya'),
			"param_name" => "image_size",
			"value" => "",
			"description" => esc_html__("Enter image size (Example: thumbnail, medium, large, full or other sizes defined by theme. Default: full", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6'
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("On click action", 'ruya'),
			"param_name" => "click_action",
			"value" => array(
				"None" => "none",
				"Custom Links" => "custom_links",
				"Light Box" => "light_box",
			),
			"description" => esc_html__('Select action for click action.', 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6'
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Custom links", 'ruya'),
			"param_name" => "custom_links",
			"value" => "",
			"dependency" => array(
				"element"=>"click_action",
				"value"=> array('custom_links')
			),
			"description" => esc_html__("Enter links for each slide. Ex: link1,link2...", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Large devices", 'ruya'),
			"param_name" => "col_lg",
			"value" => "",
			"description" => esc_html__("number Columns Large devices Desktops (>=1200px) Default: 6", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-3'
	    ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Medium device", 'ruya'),
				"param_name" => "col_md",
				"value" => "",
				"description" => esc_html__("number Columns Medium devices Desktops (>=992px) Default: 4", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-3'
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Small devices", 'ruya'),
				"param_name" => "col_sm",
				"value" => "",
				"description" => esc_html__("number Columns Small devices Tablets (>=768px) Default: 3", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-3'
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("x-small devices", 'ruya'),
				"param_name" => "col_xs",
				"value" => "",
				"description" => esc_html__("number Columns Extra small devices Phones (<768px) Default: 1", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-3'
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Item Space", 'ruya'),
				"param_name" => "item_space",
				"value" => "",
				"description" => esc_html__("number space between items Default: 15", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-3'
			),
	        array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("SmartSpeed", 'ruya'),
				"param_name" => "smartspeed",
				"value" => "",
				"description" => esc_html__("number smartSpeed in this element. Default: 500", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-3'
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
				"description" => esc_html__('Duplicate last and first items to get inifnity loop.', 'ruya'),
	            'edit_field_class' => 'vc_col-sm-3'
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
				"description" => esc_html__('Autoplay.', 'ruya'),
	            'edit_field_class' => 'vc_col-sm-3'
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
			"description" => esc_html__('Show next/prev buttons.', 'ruya'),
	        'edit_field_class' => 'vc_col-sm-3'
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav Position", 'ruya'),
			"param_name" => "nav_position",
			"value" => array(
				"Middle" => "nav-middle",
	            "right" => "nav-right",
				"left" => "nav-left",
			),
			"dependency" => array(
				"element"=>"nav",
				"value"=> "true"
			),
			"description" => esc_html__('Select position next/prev buttons.', 'ruya'),
	        'edit_field_class' => 'vc_col-sm-3'
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
			"description" => esc_html__('Show dots navigation.', 'ruya'),
	        'edit_field_class' => 'vc_col-sm-3'
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
			"description" => esc_html__('Select direction position dots navigation.', 'ruya'),
	        'edit_field_class' => 'vc_col-sm-3'
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
				"light"     => "light",
			),
			"description" => esc_html__('Select color dots and nav.', 'ruya'),
	        'edit_field_class' => 'vc_col-sm-3'
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "add a class name and then refer to it in css file.", 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-3'
		),
	)
));