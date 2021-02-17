<?php
$url = RUYA_URI . '/assets/img/list/';
vc_map(array(
	"name" => esc_html__("List", 'ruya'),
	"base" => "list",
	"category" => esc_html__('Extra Elements', 'ruya'),
    "icon" => "tb-icon-for-vc fa fa-list",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("List Style", 'ruya'),
			"param_name" => "list_style",
			"value" => array(
				"Style 1" => "list-style1",
				"Style 2" => "list-style2",
				"Style 3" => "list-style3",
				"Style 4" => "list-style4",
				"Style 5" => "list-style5",
				"Style 6" => "list-style6",

			),
			"description" => esc_html__('Select style title section in this elment.', 'ruya')
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image1',
	            'value' => $url . 'style1.jpg',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style1'))
		),
	    array(
	  			'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image2',
			    'value' => $url . 'style2.jpg',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style2'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image3',
			    'value' => $url . 'style3.jpg',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style3'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image4',
			    'value' => $url . 'style4.jpg',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style4'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image5',
			    'value' => $url . 'style5.jpg',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style5'))
		),
	    array(
				'type'	=> 'image_select',
				'heading'	=> '',
				'param_name'	=> 'style_image6',
			    'value' => $url . 'style6.jpg',
				'dependency' => Array('element' => "list_style", 'value' => array('list-style6'))
		),
	    array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'ruya' ),
            'param_name' => 'list',
            'description' => esc_html__( 'Enter values for list item', 'ruya' ),
            'value' => urlencode(
                json_encode( array(
                        array(
                            'list_item' => '', 
                        ),
                    ) 
                ) 
            ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("List item",'ruya'),
                    "param_name" => "list_item",
                    'admin_label' => true,
                ), 
            ),
        ),
	  array(
            "type" => "colorpicker",
            "heading" =>esc_html__("List item Color",'ruya'),
            "param_name" => "list_color",
            'value' => '',
	        'edit_field_class' => 'vc_col-sm-4',
	        "description" => esc_html__("Please, enter font color list in this element Default:#92959c .", 'ruya'),
       ),
	  array(
            "type" => "textfield",
            "heading" =>esc_html__("Font Size",'ruya'),
            "param_name" => "list_fontsize",
            'value' => '15px',
	        'edit_field_class' => 'vc_col-sm-4',
	         "description" => esc_html__("Please, enter font color list in this element Default:15px .", 'ruya'),
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Line Height",''),
            "param_name" => "list_lineheight",
            'value' => '30px',
	        "description" => esc_html__("Please, enter font color list in this element Default:30px .", 'ruya'),
        ),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
		),
	)
));