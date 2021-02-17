<?php
$url = RUYA_URI . '/assets/img/team/';
vc_map( array(
	"name" => 'Team Carousel',
	"base" => "team_carousel",
    "icon" => "tb-icon-for-vc fa fa-users",
	"category" => esc_html__( 'Extra Elements', 'ruya' ), 
    "as_parent" => array('only' => 'single_team_carousel'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "js_view" => 'VcColumnView',
	"params" => array(
	    	array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'ruya'),
			"heading" => esc_html__("Template", 'ruya'),
			"param_name" => "tpl",
			"value" => array(
				"Template 1" => "tpl1",
				"Template 2" => "tpl2",
				"Template 3" => "tpl3",
			),
			"group" => esc_html__("Style", 'ruya'),
			"description" => esc_html__('Select template of posts display in this element.', 'ruya')
		),
	     array(
			'type'	     => 'image_select',
			'heading'	 => '',
			'param_name' => 'style1',
			'value'      => $url . 'style1.jpg',
			'dependency' => Array('element' => "tpl", 'value' => array('tpl1')),
			"group"      => esc_html__("Style", 'ruya'),
		),
	    array(
			'type'	     => 'image_select',
			'heading'	 => '',
			'param_name' => 'style2',
			 'value'      => $url . 'style2.jpg',
			'dependency' => Array('element' => "tpl", 'value' => array('tpl2')),
			"group"      => esc_html__("Style", 'ruya'),
		),
	    array(
			'type'	     => 'image_select',
			'heading'	 => '',
			'param_name' => 'style3',
		    'value'      => $url . 'style3.jpg',
			'dependency' => Array('element' => "tpl", 'value' => array('tpl3')),
			"group"      => esc_html__("Style", 'ruya'),
		),
	    array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' ),
	        "group"      => esc_html__("Style", 'ruya'),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Large devices", 'ruya'),
			"param_name" => "col_lg",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Large devices Desktops (>=1200px) in this element. Default: 1", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Medium devices", 'ruya'),
			"param_name" => "col_md",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Medium devices Desktops (>=992px) in this element. Default: 1", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Small devices", 'ruya'),
			"param_name" => "col_sm",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Small devices Tablets (>=768px) in this element. Default: 1", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Extra small", 'ruya'),
			"param_name" => "col_xs",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Extra small devices Phones (<768px) in this element. Default: 1", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
	    array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("SmartSpeed", 'ruya'),
			"param_name" => "smartspeed",
			"value" => "",
			"description" => esc_html__("Please, enter number smartSpeed(Speed Calculate. More info to come..) in this element. Default: 500", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Item Space", 'ruya'),
			"param_name" => "item_space",
			"value" => "",
			"description" => esc_html__("Please, enter number space between items in this element. Default:0", 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Loop", 'ruya'),
			"param_name" => "loop",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Inifnity loop. Duplicate last and first items to get loop illusion.', 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("autoplay", 'ruya'),
			"param_name" => "autoplay",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Autoplay.', 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav", 'ruya'),
			"param_name" => "nav",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Show next/prev buttons.', 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Nav Position", 'ruya'),
			"param_name" => "nav_position",
			"value" => array(
				"Middle" => "nav-middle",
	            "right" => "nav-right",
				"left" => "nav-left",
			),
			"dependency" => array(
				"element"=>"nav",
				"value"=> "true"
			),
			"description" => esc_html__('Select position next/prev buttons.', 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots", 'ruya'),
			"param_name" => "dots",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Show dots navigation.', 'ruya'),
	       'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	       "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots Direction Position", 'ruya'),
			"param_name" => "dots_dir_position",
			"value" => array(
				"center" => "dots-center",
				"Right" => "dots-right",
				"Left" => "dots-left",
			),
			"dependency" => array(
				"element"=>"dots",
				"value"=> "true"
			),
			"description" => esc_html__('Select direction position dots navigation.', 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots and Nav Color", 'ruya'),
			"param_name" => "dots_nav_color",
			"value" => array(
				"primary"   => "primary",
				"secondary" => "secondary",
				"dark"      => "dark",
				"light"     => "light",
			),
			"description" => esc_html__('Select color dots and nav.', 'ruya'),
	        'edit_field_class' => 'vc_column-with-padding vc_col-sm-3',
	        "group"      => esc_html__("Carousel Option", 'ruya'),
		),
     ),
 ) );

vc_map( array(
    "name" => __("Single Team Carousel", "ruya"),
    "base" => "single_team_carousel",
	"icon" => "tb-icon-for-vc fa fa-user",
    "content_element" => true,
    "as_child" => array('only' => 'team_carousel'),
    "show_settings_on_create" => true,
    "params" => array(
	    array(
			'type'        => 'attach_image',
			'param_name'  => 'image',
			'heading'     => esc_html__( 'Team Member Image', 'ruya' )
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'name',
			'heading'     => esc_html__( 'Team Member Name', 'ruya' ),
			'admin_label' => true,
	        'edit_field_class' => 'vc_col-sm-6'
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'position',
			'heading'     => esc_html__( 'Team Member Position', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	     array(
			'type'        => 'textfield',
			'param_name'  => 'facebook_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Facebook link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
			'type'        => 'textfield',
			'param_name'  => 'twitter_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Twitter link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
			'type'        => 'textfield',
			'param_name'  => 'linkedin_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Linkedin link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
			'type'        => 'textfield',
			'param_name'  => 'behance_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Behance link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
			'type'        => 'textfield',
			'param_name'  => 'pinterest_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Pinterest link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
			'type'        => 'textfield',
			'param_name'  => 'instagram_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Instagram link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	    array(
			'type'        => 'textfield',
			'param_name'  => 'flickr_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Flickr link', 'ruya' ),
	         'edit_field_class' => 'vc_col-sm-6'
		),
	   array(
			'type'        => 'textfield',
			'param_name'  => 'skype_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Skype link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	   array(
			'type'        => 'textfield',
			'param_name'  => 'youtube_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'Youtube link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	   array(
			'type'        => 'textfield',
			'param_name'  => 'extra_link',
        	"group"       => esc_html__("socia Link", 'ruya'),
			'heading'     => esc_html__( 'External link', 'ruya' ),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	
	
      ),
 ) );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_team_carousel extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Single_team_carousel extends WPBakeryShortCode {
    }
}