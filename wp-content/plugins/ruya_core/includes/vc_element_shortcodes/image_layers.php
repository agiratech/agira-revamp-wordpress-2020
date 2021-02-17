<?php
vc_map(array(
	"name" => esc_html__("Image Layers", 'ruya'),
	"base" => "image_layers",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-clone",
	"params" => array(
	
	array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Images Lists', 'ruya' ),
            'param_name' => 'images_list',
            'description' => esc_html__( 'Enter values for list item', 'ruya' ),
            'params' => array(
                array(
                    "type" => "attach_image",
                    "heading" =>esc_html__("List item",'ruya'),
                    "param_name" => "images_list_item",
                ), 
				array(
						'type'				=> 'textfield',
						'param_name'		=> "offcet_x",
						'heading'			=> esc_html__('Horizontal offset', 'ruya'),
						'description' => esc_html__('Add the layer offset in %, for example -100 or 100','ruya'),
						'edit_field_class'	=> 'vc_column vc_col-sm-6',
					),
					array(
						'type'				=> 'textfield',
						'param_name'		=> 'offcet_y',
						'heading'			=> esc_html__('Vertical offset', 'ruya'),
						'description'       => esc_html__('Add the layer offset in %, for example -100 or 100','ruya'),
						'edit_field_class'	=> 'vc_column vc_col-sm-6',
					),
					array(
						'type'				=> 'dropdown',
						'param_name'		=> 'layer_animation',
						'heading'			=> esc_html__('Animation', 'ruya'),
						'description'       => esc_html__('Choose the appear effect for the element','ruya'),
						'value'				=> array(
							esc_html__('Fade In', 'ruya')		=> 'fadeIn',
							esc_html__('Fade In Down', 'ruya')  => 'fadeInDown',
							esc_html__('Fade In Left', 'ruya')	=> 'fadeInLeft',
							esc_html__('Fade In Right', 'ruya') => 'fadeInRight',
							esc_html__('Fade In Up', 'ruya')	=> 'fadeInUp',
							esc_html__('Slide In Up', 'ruya')	=> 'slideInUp',
							esc_html__('Slide In Down', 'ruya')	=> 'slideInDown',
							esc_html__('Slide In Left', 'ruya')	=> 'slideInLeft',
							esc_html__('Slide In Right', 'ruya')=> 'slideInRight',
							esc_html__('Zoom In', 'ruya')		=> 'zoomIn',
							esc_html__('Zoom In Left', 'ruya')	=> 'zoomInLeft',
							esc_html__('Zoom In Right', 'ruya')	=> 'zoomInRight',
							esc_html__('Zoom In Up', 'ruya')	=> 'zoomInUp',
							esc_html__('Flip In X', 'ruya')	=> 'flipInX',
							esc_html__('Flip In Y', 'ruya')	=> 'flipInY',
						),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra Class", 'ruya'),
						"param_name" => "el_class",
						"value" => "",
						"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
				),
            ),
        ),
		
	)
));