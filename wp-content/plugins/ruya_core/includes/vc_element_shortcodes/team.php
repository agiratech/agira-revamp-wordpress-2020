<?php
$url = RUYA_URI . '/assets/img/team/';
vc_map ( array (
	"name" => 'Team member',
	"base" => "team",
    "icon" => "tb-icon-for-vc fa fa-user",
	"category" => esc_html__( 'Extra Elements', 'ruya' ), 
	'admin_enqueue_js' => array(RUYA_JS.'customvc.js'),
	"params" => array (
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'ruya'),
			"param_name" => "tpl",
			"value" => array(
				"Template 1" => "tpl1",
				"Template 2" => "tpl2",
				"Template 3" => "tpl3",
			),
			"description" => esc_html__('Select template of posts display in this element.', 'ruya'),
			"group"       => esc_html__("Style", 'ruya'),
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image1',
	            'value'      => $url . 'style1.jpg',
				'dependency' => Array('element' => "tpl", 'value' => array('tpl1')),
				"group"      => esc_html__("Style", 'ruya'),
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image2',
			    'value'      => $url . 'style2.jpg',
				'dependency' => Array('element' => "tpl", 'value' => array('tpl2')),
				"group"      => esc_html__("Style", 'ruya'),
		),
	    array(
				'type'	     => 'image_select',
				'heading'	 => '',
				'param_name' => 'style_image3',
			    'value'      => $url . 'style3.jpg',
				'dependency' => Array('element' => "tpl", 'value' => array('tpl3')),
				"group"      => esc_html__("Style", 'ruya'),
		),
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
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
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
	)
));