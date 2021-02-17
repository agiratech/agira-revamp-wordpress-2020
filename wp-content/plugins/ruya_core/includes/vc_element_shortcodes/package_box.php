<?php
$url = RUYA_URI . '/assets/img/price/';
vc_map ( array (
		"name" => 'Package box',
		"base" => "Package_box",
        "icon" => "tb-icon-for-vc fa fa-money",
		"category" => esc_html__( 'Extra Elements', 'ruya' ), 
		"params" => array (
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style", 'ruya'),
				"param_name" => "style",
				"value" => array(
					"Style 1" => "style1",
					"Style 2" => "style2",
	                "Style 3" => "style3",
				),
	            "group"       => esc_html__("Style", 'ruya'),
				"description" => esc_html__('Select style in this elment.', 'ruya')
			),
			array(
					'type'	     => 'image_select',
					'heading'	 => '',
					'param_name' => 'style_image1',
					'value'      => $url . 'style1.jpg',
					'dependency' => Array('element' => "style", 'value' => array('style1')),
					"group"      => esc_html__("Style", 'ruya'),
			),
			array(
					'type'	     => 'image_select',
					'heading'	 => '',
					'param_name' => 'style_image2',
					'value'      => $url . 'style2.jpg',
					'dependency' => Array('element' => "style", 'value' => array('style2')),
					"group"      => esc_html__("Style", 'ruya'),
			),
			array(
					'type'	     => 'image_select',
					'heading'	 => '',
					'param_name' => 'style_image3',
					'value'      => $url . 'style3.jpg',
					'dependency' => Array('element' => "style", 'value' => array('style3')),
					"group"      => esc_html__("Style", 'ruya'),
			),
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
				"class" => "",
				"heading" => esc_html__("Title", 'ruya'),
				"param_name" => "title",
				"value" => "",
				"admin_label" => true,
				"description" => esc_html__("Please, enter Box Title in this element.", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("price", 'ruya'),
				"param_name" => "price",
				"value" => "",
				"description" => esc_html__("Please, enter price in this element.", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("period", 'ruya'),
				"param_name" => "period",
				"value" => "/ month",
				"description" => esc_html__("Please, enter period in this element.", 'ruya'),
	           'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				"type" => "textarea_html",
				"class" => "",
				"heading" => esc_html__("Content", 'ruya'),
				"param_name" => "content_package",
				"value" => "",
				"description" => esc_html__("Please, enter features in this element.", 'ruya')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Label", 'ruya'),
				"param_name" => "button_label",
				"value" => "Order Now",
				"description" => esc_html__("Please, enter button Label in this element.", 'ruya'),
             	'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button url", 'ruya'),
				"param_name" => "button_url",
				"value" => "#",
				"description" => esc_html__("Please, enter button url in this element.", 'ruya'),
	            'edit_field_class' => 'vc_col-sm-6'
			),
	
	        array(
				'type'       => 'dropdown',
				'param_name' => 'pricing_best',
				'heading'    => esc_html__( 'Pricing Best', 'ruya' ),
				'value'      => array(
					esc_html__( 'No', 'ruya' )  => '',
					esc_html__( 'Yes', 'ruya' ) => 'depth active'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
	
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Extra Class", 'ruya'),
				"param_name" => "el_class",
				'edit_field_class' => 'vc_col-sm-6',
			),
      )
));