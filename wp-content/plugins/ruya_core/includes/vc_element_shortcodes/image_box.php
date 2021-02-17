<?php
$url = RUYA_URI . '/assets/img/image-box/';
vc_map(array(
	"name" => esc_html__("Image Box", 'ruya'),
	"base" => "image_box",
	"class" => "tb-demo-item",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-picture-o",
	"params" => array(
	    array(
	   	    'type'       => 'select_preview',
			'param_name' => 'ruya_template',
			'heading'    => esc_html__('Style', 'ruya'),
	        'group'      => esc_html__("Template", 'ruya'),
			'value'      => array(
				array(
					'value' => 'image-box-style1',
					'label' => esc_html__('style1', 'ruya'),
					'image' => $url . 'style1.jpg'
				),
				array(
	                'value' => 'image-box-style2',
					'label' => esc_html__('style2', 'ruya'),
					'image' => $url . 'style2.jpg'
				),
				array(
	                'value' => 'image-box-style3',
					'label' => esc_html__('style3', 'ruya'),
					'image' => $url . 'style3.jpg'
				),
				array(
	                'value' => 'image-box-style4',
					'label' => esc_html__('style4', 'ruya'),
					'image' => $url . 'style4.jpg'
				),
	           array(
	                'value' => 'image-box-style5',
					'label' => esc_html__('style5', 'ruya'),
					'image' => $url . 'style5.jpg'
				),
	          array(
	                'value' => 'image-box-style6',
					'label' => esc_html__('style6', 'ruya'),
					'image' => $url . 'style6.jpg'
				),
	            array(
	                'value' => 'image-box-style7',
					'label' => esc_html__('style7', 'ruya'),
					'image' => $url . 'style7.jpg'
				),
	           array(
	                'value' => 'image-box-style8',
					'label' => esc_html__('style8', 'ruya'),
					'image' => $url . 'style8.jpg'
				),
	           array(
	                'value' => 'image-box-style9',
					'label' => esc_html__('style9', 'ruya'),
					'image' => $url . 'style9.jpg'
				),
	           array(
	                'value' => 'image-box-style10',
					'label' => esc_html__('style10', 'ruya'),
					'image' => $url . 'style10.jpg'
				),
	            array(
	                'value' => 'image-box-style11',
					'label' => esc_html__('style11', 'ruya'),
					'image' => $url . 'style11.jpg'
				),
			),
			'save_always' => true,
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
		    "type" => "dropdown",
			"heading" => esc_html__("background color", 'ruya'),
			"param_name" => "box_bg_color",
			"value" => array(
				"primary"   => "bg_primary",
				"secondary" => "bg_secondary",
				"gradient"  => "bg_gradient",
				"dark"      => "bg_dark",
	            "light"     => "bg_light",
	            "outline"   => "outline",
			),
	        "dependency" => array(
	           "element"=>"ruya_template",
			   "value"=> array('image-box-style8')
		    ),
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
			"heading" => esc_html__("SUP Title", 'ruya'),
			"param_name" => "sup_title_box",
			"value" => "",
            'description' => esc_html__( 'Sup title', 'ruya' ),
	        "dependency" => array(
	           "element"=>"ruya_template",
			   "value"=> array('image-box-style1','image-box-style2','image-box-style4','image-box-style5','image-box-style6','image-box-style8','image-box-style9','image-box-style10','image-box-style11')
		    ),
        ),
	    array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'ruya'),
			"param_name" => "content_box",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'ruya'),
	        "dependency" => array(
	           "element"=>"ruya_template",
			   "value"=> array('image-box-style1','image-box-style2','image-box-style3','image-box-style4','image-box-style5','image-box-style6','image-box-style7','image-box-style8','image-box-style9','image-box-style10','image-box-style11')
		    ),
		),
	   array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__( 'Link', 'ruya' ),
			"param_name" => "link_box",
			"value" => "",
			"description" => esc_html__("Please, enter button link in this element.", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("Link Text", 'ruya'),
			"param_name" => "txt_link_box",
			"value" => "",
			"description" => esc_html__("Please, enter text link for demo item. ex:Read More", 'ruya'),
	        "dependency" => array(
	           "element"=>"ruya_template",
			   "value"=> array('image-box-style2','image-box-style3','image-box-style7','image-box-style8','image-box-style9','image-box-style10','image-box-style11')
		    ),
	        'edit_field_class' => 'vc_col-sm-6',
		),
	   array(
		    "type" => "dropdown",
			"heading" => esc_html__("directtion", 'ruya'),
			"param_name" => "direction",
 			"value" => array(
	            "left"    => "left",
				"center"  => "center",
				"right"   => "right"
			),
	        "dependency" => array(
	           "element"=>"ruya_template",
			   "value"=> array('image-box-style7','image-box-style10')
		    ),
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