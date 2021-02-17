<?php
vc_map(array(
	"name" => esc_html__("Menu Box", 'ruya'),
	"base" => "menu_box",
	"class" => "tb-demo-item",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-coffee",
	"params" => array(
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'ruya'),
			"param_name" => "image",
			"value" => "",
			"description" => esc_html__("Select image for demo item.", 'ruya')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"heading" => esc_html__("Title", 'ruya'),
			"param_name" => "title_box",
			"value" => "",
			"description" => esc_html__("Please, enter title for demo item.", 'ruya')
		),
	    array(
            "type" => "textfield",
			"heading" => esc_html__("Price", 'ruya'),
			"param_name" => "price_box",
			"value" => "",
        ),
	    array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'ruya'),
			"param_name" => "content_box",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'ruya'),
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