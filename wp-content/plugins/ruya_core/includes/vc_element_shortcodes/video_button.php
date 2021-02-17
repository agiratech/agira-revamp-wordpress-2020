<?php
vc_map(array(
	"name" => esc_html__("Video Button", 'ruya'),
	"base" => "video_button",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-play-circle",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => esc_html__("Video Link", 'ruya'),
			"param_name" => "video_link",
			"value" => "",
			"description" => esc_html__("Please, enter video link in this element.", 'ruya')
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("color", 'ruya'),
			"param_name" => "color",
			"value" => array(
	           "light"        => "light",
				"primary"     => "primary",
				"secondary"   => "secondary",
				"gradient"    => "gradient",
				"dark"        => "dark",
			),
	       'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Button Position", 'ruya'),
			"param_name" => "position",
			"value" => array(
				"center" => "dir_center",
				"right"  => "dir_right",
				"left"   => "dir_left",
			),
	        'edit_field_class' => 'vc_col-sm-6'
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
		),
	)
));