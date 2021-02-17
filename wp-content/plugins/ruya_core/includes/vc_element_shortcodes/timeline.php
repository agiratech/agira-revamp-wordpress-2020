<?php
vc_map(array(
	"name" => esc_html__("Timeline", 'ruya'),
	"base" => "timeline",
	"category" => esc_html__('Extra Elements', 'ruya'),
    "icon" => "tb-icon-for-vc fa fa-bars",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Number Step", 'ruya'),
			"param_name" => "number_step",
			"value" => "",
			"description" => esc_html__("Please, enter number step in this element.", 'ruya')
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
            'param_name'  => 'icon',
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
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation CSS', 'ruya' ),
            'value' => array(
	            esc_html__( 'none', 'ruya' )          => 'none',
                esc_html__( 'bounceIn', 'ruya' )      => 'wow bounceIn',
                esc_html__( 'bounceInDown', 'ruya' )  => 'wow bounceInDown',
                esc_html__( 'bounceInLeft', 'ruya' )  => 'wow bounceInLeft',
			    esc_html__( 'bounceInRight', 'ruya' ) => 'wow bounceInRight',
			    esc_html__( 'bounceInUp', 'ruya' )    => 'wow bounceInUp',
			    esc_html__( 'fadeIn', 'ruya' )        => 'wow fadeIn',
			    esc_html__( 'fadeInDown', 'ruya' )    => 'wow fadeInDown',
			    esc_html__( 'fadeInDownBig', 'ruya' ) => 'wow fadeInDownBig',
			    esc_html__( 'fadeInLeft', 'ruya' )    => 'wow fadeInLeft',
			    esc_html__( 'fadeInLeftBig', 'ruya' ) => 'wow fadeInLeftBig',
			    esc_html__( 'fadeInRight', 'ruya' )   => 'wow fadeInRight',
			    esc_html__( 'fadeInRightBig', 'ruya' )=> 'wow fadeInRightBig',
			    esc_html__( 'fadeInUp', 'ruya' )      => 'wow fadeInUp',
			    esc_html__( 'fadeInUpBig', 'ruya' )   => 'wow fadeInUpBig',
			    esc_html__( 'flipInX', 'ruya' )       => 'wow flipInX',
			    esc_html__( 'flipInY', 'ruya' )       => 'wow flipInY',
                esc_html__( 'slideInUp', 'ruya' )     => 'wow slideInUp',
                esc_html__( 'slideInDown', 'ruya' )   => 'wow slideInDown',
			    esc_html__( 'slideInLeft', 'ruya' )   => 'wow slideInLeft',
			    esc_html__( 'slideInRight', 'ruya' )  => 'wow slideInRight',
			    esc_html__( 'zoomIn', 'ruya' )        => 'wow zoomIn',
			    esc_html__( 'zoomInDown', 'ruya' )    => 'wow zoomInDown',
			    esc_html__( 'zoomInLeft', 'ruya' )    => 'wow zoomInLeft',
			    esc_html__( 'zoomInRight', 'ruya' )   => 'wow zoomInRight',
			    esc_html__( 'zoomInUp', 'ruya' )      => 'wow zoomInUp',
            ),
            'param_name' => 'animation_css',
            'description' => esc_html__( 'Select animation type.', 'ruya' ),
        ),
	    array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Animation Delay', 'ruya' ),
            'value' => array(
                esc_html__( '0.1s', 'ruya' ) => '0.1s',
                esc_html__( '0.2s', 'ruya' ) => '0.2s',
                esc_html__( '0.3s', 'ruya' ) => '0.3s',
	            esc_html__( '0.4s', 'ruya' ) => '0.4s',
                esc_html__( '0.5s', 'ruya' ) => '0.5s',
                esc_html__( '0.6s', 'ruya' ) => '0.6s',
                esc_html__( '0.7s', 'ruya' ) => '0.7s',
	            esc_html__( '0.8s', 'ruya' ) => '0.8s',
                esc_html__( '0.9s', 'ruya' ) => '0.9s',
            ),
            'param_name' => 'animation_delay',
		    'description' => esc_html__( 'Select animation delay.', 'ruya' ),
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