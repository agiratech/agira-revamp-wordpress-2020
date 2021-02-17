<?php
vc_map(array(
	"name" => esc_html__("Flip Box", 'ruya'),
	"base" => "flip_box",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-file-image-o",
	"params" => array(
	    array(
			"type" => "attach_image",
			"heading" => esc_html__("Image", 'ruya'),
			"param_name" => "front_side_image",
			"value" => "",
			"description" => esc_html__("Select image for front side.", 'ruya'),
	        'group' => esc_html__( 'front side', 'ruya' ),
		),
	   /* BG Overlay */
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'BG Overlay', 'ruya' ),
            'value' => array(
	            esc_html__("no", 'ruya')      => "false",
				esc_html__("yes", 'ruya')      => "true",
	         ),
            'param_name' => 'data_is_bg_overlay',
	        'group' => esc_html__( 'front side', 'ruya' ),
        ),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'BG Overlay', 'ruya' ),
            'value' => array(
				esc_html__("Dark", 'ruya')      => "bg_overlay_dark",
				esc_html__("Gradient", 'ruya')  => "bg_overlay_gradient",
				esc_html__("Primary", 'ruya')   => "bg_overlay_color-main",
				esc_html__("Secondary", 'ruya') => "bg_overlay_secondary"),
            'param_name' => 'bg_overlay',
            'description' => esc_html__( 'Select background overlay color.', 'ruya' ),
	        'dependency' => array(
				'element' => 'data_is_bg_overlay',
				'value'   => 'true',
			),
	        'group' => esc_html__( 'front side', 'ruya' ),
        ),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'BG Overlay', 'ruya' ),
            'value' => array(
	            esc_html__("0", 'ruya')   => "0",
				esc_html__("0.1", 'ruya') => "0.1",
				esc_html__("0.2", 'ruya') => "0.2",
				esc_html__("0.3", 'ruya') => "0.3",
				esc_html__("0.4", 'ruya') => "0.4",
				esc_html__("0.5", 'ruya') => "0.5",
				esc_html__("0.6", 'ruya') => "0.6",
				esc_html__("0.7", 'ruya') => "0.7",
				esc_html__("0.8", 'ruya') => "0.8",
				esc_html__("0.9", 'ruya') => "0.9",
				esc_html__("1", 'ruya')   => "1",
	        ),
            'param_name' => 'data_opacity_bg_overlay',
            'description' => esc_html__( 'Select opacity background overlay value.', 'ruya' ),
	        'dependency' => array(
				'element' => 'data_is_bg_overlay',
				'value'   => 'true',
			),
	        'group' => esc_html__( 'front side', 'ruya' ),
        ),
	   /* END BG Overlay */
	
	
	    /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'ruya' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'ruya' ) => 'fontawesome',
                esc_html__( 'Linecons', 'ruya' )     => 'linecons',
	            esc_html__( 'Ionicons', 'ruya' )     => 'ionicons',
				esc_html__( 'P7 Stroke', 'ruya' )    => 'pe7stroke',
	            esc_html__( 'ET-line', 'ruya' )      => 'etline'
            ),
            'param_name'  => 'icon',
            'description' => esc_html__( 'Select icon library.', 'ruya' ),
	        'group' => esc_html__( 'front side', 'ruya' ),
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
	        'group' => esc_html__( 'front side', 'ruya' ),
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
	        'group' => esc_html__( 'front side', 'ruya' ),
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
	        'group' => esc_html__( 'front side', 'ruya' ),
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
         	'group' => esc_html__( 'front side', 'ruya' ),
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
	        'group' => esc_html__( 'front side', 'ruya' ),
        ),
        /* End Icon */ 
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'ruya'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Please, enter title in this element.", 'ruya'),
	        'group' => esc_html__( 'front side', 'ruya' ),
		),
	    array(
            "type" => "textfield",
			"heading" => esc_html__("SUP Title", 'ruya'),
			"param_name" => "sup_title_box",
			"value" => "",
            'description' => esc_html__( 'Sup title', 'ruya' ),
	        'group' => esc_html__( 'front side', 'ruya' ),
        ),
	    
	
	    array(
			"type" => "attach_image",
			"heading" => esc_html__("Image", 'ruya'),
			"param_name" => "back_side_image",
			"value" => "",
			"description" => esc_html__("Select image for back side.", 'ruya'),
	        'group' => esc_html__( 'back side', 'ruya' ),
		),
	    /* BG Back Overlay */
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'BG Overlay', 'ruya' ),
            'value' => array(
	            esc_html__("no", 'ruya')      => "false",
				esc_html__("yes", 'ruya')      => "true",
	         ),
            'param_name' => 'back_data_is_bg_overlay',
	         'group' => esc_html__( 'back side', 'ruya' ),
        ),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'BG Overlay', 'ruya' ),
            'value' => array(
				esc_html__("Dark", 'ruya')      => "bg_overlay_dark",
				esc_html__("Gradient", 'ruya')  => "bg_overlay_gradient",
				esc_html__("Primary", 'ruya')   => "bg_overlay_color-main",
				esc_html__("Secondary", 'ruya') => "bg_overlay_secondary"),
            'param_name' => 'back_bg_overlay',
            'description' => esc_html__( 'Select back side background overlay color.', 'ruya' ),
	        'dependency' => array(
				'element' => 'back_data_is_bg_overlay',
				'value'   => 'true',
			),
	        'group' => esc_html__( 'back side', 'ruya' ),
        ),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'BG Overlay', 'ruya' ),
            'value' => array(
	            esc_html__("0", 'ruya')   => "0",
				esc_html__("0.1", 'ruya') => "0.1",
				esc_html__("0.2", 'ruya') => "0.2",
				esc_html__("0.3", 'ruya') => "0.3",
				esc_html__("0.4", 'ruya') => "0.4",
				esc_html__("0.5", 'ruya') => "0.5",
				esc_html__("0.6", 'ruya') => "0.6",
				esc_html__("0.7", 'ruya') => "0.7",
				esc_html__("0.8", 'ruya') => "0.8",
				esc_html__("0.9", 'ruya') => "0.9",
				esc_html__("1", 'ruya')   => "1",
	        ),
            'param_name' => 'back_data_opacity_bg_overlay',
            'description' => esc_html__( 'Select opacity background overlay value.', 'ruya' ),
	        'dependency' => array(
				'element' => 'back_data_is_bg_overlay',
				'value'   => 'true',
			),
	        'group' => esc_html__( 'back side', 'ruya' ),
        ),
	   /* END BG Overlay */
	   array(
			"type" => "textfield",
			"heading" => esc_html__("Title", 'ruya'),
			"param_name" => "back_title",
			"description" => esc_html__("Please, enter title in this element.", 'ruya'),
	        'group' => esc_html__( 'back side', 'ruya' ),
		),
	    array(
            "type" => "textfield",
			"heading" => esc_html__("SUP Title", 'ruya'),
			"param_name" => "back_sup_title_box",
			"value" => "",
            'description' => esc_html__( 'Sup title', 'ruya' ),
	        'group' => esc_html__( 'back side', 'ruya' ),
        ),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'ruya'),
			"param_name" => "content",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'ruya'),
	         'group' => esc_html__( 'back side', 'ruya' ),
	   ),
	   array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Text Link", 'ruya'),
			"param_name" => "txt_link",
			"value" => "",
			"description" => esc_html__("Please, enter text link in this element.", 'ruya'),
	       'group' => esc_html__( 'back side', 'ruya' ),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link", 'ruya'),
			"param_name" => "link",
			"value" => "",
			"description" => esc_html__("Please, enter link in this element.", 'ruya'),
	       'group' => esc_html__( 'back side', 'ruya' ),
		),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Flip Direction', 'ruya' ),
            'value' => array(
                esc_html__( 'horizontal to right', 'ruya' )=> 'horizontal_to_right',
	            esc_html__( 'horizontal to left', 'ruya' ) => 'horizontal_to_left',
	            esc_html__( 'vertical to bottom', 'ruya' ) => 'vertical_to_bottom',
	            esc_html__( 'vertical to top', 'ruya' )    => 'vertical_to_top',
            ),
            'param_name' => 'flip_direction',
            'description' => esc_html__( 'Select flip direction animation.', 'ruya' ),
        ),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Horizontal Align', 'ruya' ),
            'value' => array(
                esc_html__( 'center', 'ruya' )=> 'center',
	            esc_html__( 'left', 'ruya' )  => 'left',
	            esc_html__( 'right', 'ruya' ) => 'right'
            ),
            'param_name' => 'horizontal_align',
            'description' => esc_html__( 'Select horizontal align.', 'ruya' ),
        ),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Vertical Align', 'ruya' ),
            'value' => array(
                esc_html__( 'center', 'ruya' )=> 'center',
	            esc_html__( 'left', 'ruya' )  => 'left',
	            esc_html__( 'right', 'ruya' ) => 'right'
            ),
            'param_name' => 'vertical_align',
            'description' => esc_html__( 'Select vertical align.', 'ruya' ),
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