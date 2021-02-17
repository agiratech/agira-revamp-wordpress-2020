<?php
$url = RUYA_URI . '/assets/img/blog/';
vc_map ( array (
		"name" => 'Blog',
		"base" => "blog",
		"category" => esc_html__( 'Extra Elements', 'ruya' ),
	    "icon" => "tb-icon-for-vc fa fa-qrcode",
		"params" => array (
			array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Template", 'ruya'),
					"param_name" => "tpl",
					"admin_label" => true,
					"value" => array(
						"Image Middle"     => "grid",
						"Image Overlay"    => "grid2",
						"Image Background" => "grid3",
						"Grid Left"        => "grid4",
					),
					"description" => esc_html__('Select template of posts display in this element.', 'ruya'),
			),
	       array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image1',
	            'value'      => $url . 'style1.jpg',
				'dependency' => Array('element' => "tpl", 'value' => array('grid')),
			),
			array(
					'type'	     => 'image_select',
					'heading'	 => '',
					'param_name' => 'style_image2',
					'value'      => $url . 'style2.jpg',
					'dependency' => Array('element' => "tpl", 'value' => array('grid2')),
			),
			array(
					'type'	     => 'image_select',
					'heading'	 => '',
					'param_name' => 'style_image3',
					'value'      => $url . 'style3.jpg',
					'dependency' => Array('element' => "tpl", 'value' => array('grid3')),
			),
	        array(
					'type'	     => 'image_select',
					'heading'	 => '',
					'param_name' => 'style_image4',
					'value'      => $url . 'style4.jpg',
					'dependency' => Array('element' => "tpl", 'value' => array('grid4')),
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
				"description" => esc_html__( "Note: By default, all your team will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'ruya' )
		   ),
	       array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Columns", 'ruya'),
					"param_name" => "columns",
					"value" => array(
						"2 Columns" => "2",
						"1 Columns" => "1",
						"3 Columns" => "3",
						"4 Columns" => "4"
					),
	                "group" => esc_html__("Build Query", 'ruya'),
					"description" => esc_html__('Select columns display in this element.', 'ruya'),
					'edit_field_class' => 'vc_col-sm-6',
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
				'edit_field_class' => 'vc_col-sm-6',
	            "group" => esc_html__("Build Query", 'ruya'),
				"description" => esc_html__("Please, Enter number excerpt lenght of post in this element. Default: 22", 'ruya')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type navigation', 'ruya'),
				'description' => esc_html__('Select the type of navigation or disable it.', 'ruya'),
				'param_name' => 'pagination',
				"group" => esc_html__("Build Query", 'ruya'),
				'edit_field_class' => 'vc_col-sm-6',
				'value' => array(
					"None" => 'none',
					"Prev/Next buttons" => 'buttons',
					"Numeric" => 'numeric',
				),
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
					'edit_field_class' => 'vc_col-sm-6',
					"group" => esc_html__("Build Query", 'ruya'),
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
					'edit_field_class' => 'vc_col-sm-6',
					"group" => esc_html__("Build Query", 'ruya'),
					"description" => esc_html__( 'Order ("None", "Asc", "Desc").', 'ruya' )
			),
		)
));