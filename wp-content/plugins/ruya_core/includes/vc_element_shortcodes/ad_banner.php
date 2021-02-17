<?php
vc_map(array(
	"name" => esc_html__("Ad Banner", 'ruya'),
	"base" => "ad_banner",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-television",
	"params" => array(
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'ruya'),
			"param_name" => "image",
			"value" => "",
			"description" => esc_html__("Select box image in this element.", 'ruya')
		),
	   array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'ruya'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Please, enter title in this element.", 'ruya')
		),
       array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Suptitle", 'ruya'),
			"param_name" => "ad_suptitle",
			"value" => "",
			"description" => esc_html__("Please, enter suptitle in this element.", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'ruya'),
			"param_name" => "ad_content",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link", 'ruya'),
			"param_name" => "link",
			"value" => "",
			"description" => esc_html__("Please, enter link in this element.", 'ruya')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
		),
	)
));