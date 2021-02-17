<?php
$url = RUYA_URI . '/assets/img/icon-box/';
vc_map(array(
	"name" => esc_html__("Icon Box", 'ruya'),
	"base" => "icon_box",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-info",
	"params" => array(
	   	   array(
			'type'       => 'select_preview',
			'param_name' => 'ruya_template',
			'heading'    => esc_html__('Style', 'ruya'),
	        'group'      => esc_html__("Template", 'ruya'),
			'value'      => array(
				array(
					'value' => 'icon-box-style1',
					'label' => esc_html__('style1', 'ruya'),
					'image' => $url . 'style1.jpg'
				),
				array(
	                'value' => 'icon-box-style2',
					'label' => esc_html__('style2', 'ruya'),
					'image' => $url . 'style2.jpg'
				),
				array(
	                'value' => 'icon-box-style3',
					'label' => esc_html__('style3', 'ruya'),
					'image' => $url . 'style3.jpg'
				),
				array(
	                'value' => 'icon-box-style4',
					'label' => esc_html__('style4', 'ruya'),
					'image' => $url . 'style4.jpg'
				),
	           array(
	                'value' => 'icon-box-style5',
					'label' => esc_html__('style5', 'ruya'),
					'image' => $url . 'style5.jpg'
				),
	           array(
	                'value' => 'icon-box-style6',
					'label' => esc_html__('style6', 'ruya'),
					'image' => $url . 'style6.jpg'
				),
	          array(
	                'value' => 'icon-box-style7',
					'label' => esc_html__('style7', 'ruya'),
					'image' => $url . 'style7.jpg'
				),
	          array(
	                'value' => 'icon-box-style8',
					'label' => esc_html__('style8', 'ruya'),
					'image' => $url . 'style8.jpg'
				),
	          array(
	                'value' => 'icon-box-style9',
					'label' => esc_html__('style9', 'ruya'),
					'image' => $url . 'style9.jpg'
				),
			),
			'save_always' => true,
		),
	
	     /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'ruya' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'ruya' ) => 'fontawesome',
                esc_html__( 'Linecons', 'ruya' )     => 'linecons',
	            esc_html__( 'Ionicons', 'ruya' )     => 'ionicons',
				esc_html__( 'P7 Stroke', 'ruya' )    => 'pe7stroke',
	            esc_html__( 'ET-line', 'ruya' )      => 'etline',
	            esc_html__( 'Animated', 'ruya' )     => 'animated'     
            ),
            'param_name'  => 'icon',
            'description' => esc_html__( 'Select icon library.', 'ruya' ),
	        'dependency'  => array(
	           "element"=>"ruya_template",
	           "value"=> array('icon-box-style1', 'icon-box-style2' , 'icon-box-style3' , 'icon-box-style4' , 'icon-box-style5' , 'icon-box-style6' , 'icon-box-style7' , 'icon-box-style8', 'icon-box-style9' )
		    ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_fontawesome',
	        'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type'      => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value'   => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'ruya' ),
        ),
	   array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_linecons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'ruya' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_ionicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'ionicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'ionicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'ruya' ),
        ),
	   array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_pe7stroke',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pe7stroke',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'pe7stroke',
            ),
            'description' => esc_html__( 'Select icon from library.', 'ruya' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_etline',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'etline',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'ruya' ),
        ),
       array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_animated',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'animated',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'animated',
            ),
            'description' => esc_html__( 'Select icon from library.', 'ruya' ),
        ),
	    array(
			'type'       => 'dropdown',
			'param_name' => 'animation',
			'heading'    => esc_html__( 'Animate SVG Icon?', 'ruya' ),
			'value'      => array(
				esc_html__( 'No', 'ruya' )  => '',
				esc_html__( 'Yes', 'ruya' ) => 'yes'
			),
			'dependency' => array(
				'element' => 'icon',
				'value'   => 'animated',
			),
			'edit_field_class' => 'vc_col-sm-4'
		),
		array(
			'type'       => 'dropdown',
			'param_name' => 'hover_animation',
			'heading'    => esc_html__( 'Restart Animation on Hover', 'ruya' ),
			'value'      => array(
				esc_html__( 'No', 'ruya' )  => '',
				esc_html__( 'Yes', 'ruya' ) => 'yes'
			),
			'dependency' => array(
				'element' => 'icon',
				'value'   => 'animated',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'animation_delay',
			'heading'    => esc_html__( 'SVG Animation Delay', 'ruya' ),
	        "description"=> esc_html__("In Milliseconds Default:200 .", 'ruya'),
			'dependency' => array(
				'element' => 'icon',
				'value'   => 'animated',
			),
	        'edit_field_class' => 'vc_col-sm-4',
		),
        /* End Icon */ 
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
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'ruya'),
			"param_name" => "content",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'ruya')
		),
	    array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__( 'Link', 'ruya' ),
			"param_name" => "link",
			"value" => "",
			"description" => esc_html__("Please, enter button link in this element.", 'ruya'),
	       'edit_field_class' => 'vc_col-sm-6'
		),
	   array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Text link", 'ruya'),
			"param_name" => "txt_link",
			"value" => "",
			"description" => esc_html__("Please, enter text link in this element.", 'ruya'),
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