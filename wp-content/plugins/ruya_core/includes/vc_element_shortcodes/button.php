<?php
$url = RUYA_URI . 'assets/img/button/';
vc_map(array(
	"name" => esc_html__("button", 'ruya'),
	"base" => "button",
	"category" => esc_html__('Extra Elements', 'ruya'),
    "icon" => "tb-icon-for-vc fa fa-minus",
	"params" => array(
		array(
			'type'       => 'select_preview',
			'param_name' => 'style',
			'heading'    => esc_html__('Style', 'ruya'),
			'value'      => array(
				array(
					'value' => 'btn-solid',
					'label' => esc_html__('Solid', 'ruya'),
					'image' => $url . 'solid.jpg'
				),
				array(
					'label' => esc_html__('Bordered', 'ruya'),
					'value' => 'btn-border',
	                'image' => $url . 'bordered.jpg'
				),
				array(
					'label' => esc_html__('Text only', 'ruya'),
					'value' => 'btn-txt',
					'image' => $url . 'text.jpg'
				),
			),
			'save_always' => true,
		),
	    array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__( 'text', 'ruya' ),
			"param_name" => "text",
			"value" => "",
	        "admin_label" => true,
			"description" => esc_html__("Please, enter button text in this element.", 'ruya')
		),
		array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__( 'Link', 'ruya' ),
			"param_name" => "link",
			"value" => "",
			"description" => esc_html__("Please, enter button link in this element.", 'ruya')
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("style", 'ruya'),
			"param_name" => "hr_style",
			"group" => esc_html__("Style", 'ruya'),
			"value" => array(
	            "Linear"          => "linear",
	            "Roll"            => "roll",
	            "shine"           => "hover_shine",
	            "Slide"           => "slide",
	            "Gradient slide"  => "gradient-anim",
	            "lineMove Bottom" => "line-move-bottom",
	            "lineMove Left"   => "line-move-Left",
			),
	         "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-solid', 'btn-border')
		    ),
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("style", 'ruya'),
			"param_name" => "btn_txt_style",
			"group" => esc_html__("Style", 'ruya'),
			"value" => array(
	            "circle"      => "btn-txt-circle",
	            "arrow"       => "btn-txt-arrow",
	            "underlined"  => "btn-txt-underlined",
			),
	         "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-txt')
		    ),
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("background color", 'ruya'),
			"param_name" => "bg_color",
			"group" => esc_html__("Style", 'ruya'),
			"value" => array(
				"primary"   => "bg_primary",
				"secondary" => "bg_secondary",
				"gradient"  => "bg_gradient",
				"light"     => "bg_light",
	            "grey"      => "bg_grey",
				"dark"      => "bg_dark",
			),
	        "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-solid')
		    ),
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("background color (hover)", 'ruya'),
			"param_name" => "hr_bg_color",
			"group" => esc_html__("Style", 'ruya'),
 			"value" => array(
				"primary"    => "bg_hr_primary",
				"secondary"  => "bg_hr_secondary",
				"gradient"   => "bg_hr_gradient",
				"light"      => "bg_hr_light",
            	"grey"       => "bg_hr_grey",
				"dark"       => "bg_hr_dark",
			),
	       "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-solid' , 'btn-border')
		    ),
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("font color", 'ruya'),
			"param_name" => "color",
			"group" => esc_html__("Style", 'ruya'),
			"value" => array(
	            "light"     => "light",
				"primary"   => "primary",
				"secondary" => "secondary",
				"dark"      => "dark"
			),
	       'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("font color (hover)", 'ruya'),
			"param_name" => "hr_color",
			"group" => esc_html__("Style", 'ruya'),
 			"value" => array(
	            "light"      => "hr_light",
				"primary"    => "hr_primary",
				"secondary"  => "hr_secondary",
				"dark"       => "hr_dark"
			),
	        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("border color", 'ruya'),
			"param_name" => "outline_color",
			"group" => esc_html__("Style", 'ruya'),
			"value" => array(
		        "grey"      => "outline_grey",
				"primary"   => "outline_primary",
				"secondary" => "outline_secondary",
				"gradient"  => "outline_gradient",
				"light"     => "outline_light",
				"dark"      => "outline_dark",
			),
	        "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-border')
		    ),
	       'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
		),
	   array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("border color (hover)", 'ruya'),
			"param_name" => "outline_hr_color",
			"group" => esc_html__("Style", 'ruya'),
			"value" => array(
		        "grey"      => "outline_hr_grey",
				"primary"   => "outline_hr_primary",
				"secondary" => "outline_hr_secondary",
				"gradient"  => "outline_hr_gradient",
				"light"     => "outline_hr_light",
				"dark"      => "outline_hr_dark",
			),
	        "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-border')
		    ),
	        'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
		),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("style", 'ruya'),
			"param_name" => "radius",
	       	"group" => esc_html__("Style", 'ruya'),
			"value" => array(
            	"radius 0"  => "radius0",
	            "radius 4"  => "radius4",
	            "radius 50" => "radius50",
			),
	       'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
	        "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-solid' , 'btn-border')
		    ),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("size", 'ruya'),
			"param_name" => "size",
			"group" => esc_html__("Style", 'ruya'),
			"value" => array(
	            "large"  => "large",
			    "medium" => "medium",
				"small"  => "small",
			),
	       'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
	       "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-solid' , 'btn-border')
		    ),
		),
		array(
		    "type" => "dropdown",
			"heading" => esc_html__("Button Position", 'ruya'),
			"param_name" => "position",
			"value" => array(
				"center" => "text-center",
				"right"  => "text-right",
				"left"   => "text-left",
			),
		),
	    /* Start Icon */
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show or hide icon", 'ruya'),
			"param_name" => "show_icon",
		    "group" => esc_html__("Icon", 'ruya'),
			"value" => array(
				"no"  => "no_icon",
				"yes" => "had_icon",
			),
	       "dependency" => array(
	           "element"=>"style",
			   "value"=> array('btn-solid')
		    ),
		),
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
	        "group" => esc_html__("Icon", 'ruya'),
            'param_name' => 'icon',
            'description' => esc_html__( 'Select icon library.', 'ruya' ),
			'dependency' => Array('element' => "show_icon", 'value' => array('had_icon'))
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'ruya' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
		    "group" => esc_html__("Icon", 'ruya'),
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
		    "group" => esc_html__("Icon", 'ruya'),
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
		    "group" => esc_html__("Icon", 'ruya'),
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
		    "group" => esc_html__("Icon", 'ruya'),
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
		    "group" => esc_html__("Icon", 'ruya'),
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
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
		),
	)
));