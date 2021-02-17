<?php
$url = RUYA_URI . '/assets/img/counter-up/';
vc_map(array(
	"name" => esc_html__("Counter Up", 'ruya'),
	"base" => "counter_up",
	"category" => esc_html__('Extra Elements', 'ruya'),
    "icon" => "tb-icon-for-vc fa fa-hourglass-start",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", 'ruya'),
			"param_name" => "style",
			"value" => array(
				"Style 1" => "style1",
				"Style 2" => "style2",
				"Style 3" => "style3",
             	"Style 4" => "style4",
			),
			"description" => esc_html__('Select style in this elment.', 'ruya')
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image1',
	            'value'      => $url . 'style1.jpg',
				'dependency' => Array('element' => "style", 'value' => array('style1')),
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image2',
			    'value'      => $url . 'style2.jpg',
				'dependency' => Array('element' => "style", 'value' => array('style2')),
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image3',
			    'value'      => $url . 'style3.jpg',
				'dependency' => Array('element' => "style", 'value' => array('style3')),
		),
	     array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image4',
			    'value'      => $url . 'style4.jpg',
				'dependency' => Array('element' => "style", 'value' => array('style4')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title", 'ruya'),
			"param_name" => "title",
	        "admin_label" => true,
			"description" => esc_html__("Please, enter title in this element.", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-4',
		),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("Number", 'ruya'),
			"param_name" => "number",
			"description" => esc_html__("Please, enter number in this element.", 'ruya'),
		    'edit_field_class' => 'vc_column-with-padding vc_col-sm-4',
		),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("Symbol", 'ruya'),
			"param_name" => "symbol",
			"description" => esc_html__("Please, enter symbol of counter in this element.", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-4',
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
            ),
            'param_name' => 'icon',
            'description' => esc_html__( 'Select icon library.', 'ruya' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon',
                'value' => 'fontawesome',
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
        /* End Icon */
	    array(
			"type" => "textarea_html",
			"heading" => esc_html__("Description", 'ruya'),
			"param_name" => "content_box",
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