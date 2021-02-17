<?php
vc_map(array(
	"name" => esc_html__("Social Accounts", 'ruya'),
	"base" => "social_accounts",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-share-alt",
	"params" => array(
			array(
				'type'				=> 'param_group',
				'heading'			=> esc_html__('Social networks', 'ruya'),
				'param_name'		=> 'social_networks',
				'params'			=> array(
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Social network', 'ruya'),
						'param_name'	=> 'social_icons',
						'value'			=> array(
							esc_html__('Twitter', 'ruya')			=> 'twitter',
							esc_html__('Facebook', 'ruya')			=> 'facebook',
							esc_html__('Dribbble', 'ruya')			=> 'dribbble',
							esc_html__('Deviantart', 'ruya')		=> 'deviantart',
							esc_html__('Flickr', 'ruya')			=> 'flickr',
							esc_html__('Instagram', 'ruya')			=> 'instagram',
							esc_html__('LinkedIN', 'ruya')			=> 'linkedin',
							esc_html__('Pinterest', 'ruya')			=> 'pinterest',
							esc_html__('RSS', 'ruya')				=> 'rss',
							esc_html__('Tumblr', 'ruya')			=> 'tumblr',
							esc_html__('Vimeo', 'ruya')				=> 'vimeo',
							esc_html__('YouTube', 'ruya')			=> 'youtube',
							esc_html__('Skype', 'ruya')				=> 'skype',
							esc_html__('Soundcloud', 'ruya')		=> 'soundcloud',
							esc_html__('Behance', 'ruya')			=> 'behance',
						),
					),
					array(
						'type'				=> 'vc_link',
					    'heading'           => esc_html__("URL", 'ruya'),
						'param_name'		=> 'soc_url',
						'value'				=> 'url:%23|||',
						'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-padding crum_vc',
					),
				),
			 ),
	    array(
		    "type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("color", 'ruya'),
			"param_name" => "color",
			"value" => array(
				esc_html__('colors', 'ruya') => 'colors',
	            esc_html__('gradient', 'ruya') => 'gradient',
				esc_html__('primary', 'ruya') => 'primary',
				esc_html__('secondary', 'ruya') => 'secondary',
				esc_html__('white', 'ruya') => 'white',
				esc_html__('grey', 'ruya') => 'grey',
				esc_html__('dark', 'ruya') => 'dark',
			),
		),
	       array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style", 'ruya'),
				"param_name" => "style",
				"value" => array(
					esc_html__('Style 1', 'ruya') => 'style1',
					esc_html__('Style 2', 'ruya') => 'style2',
					esc_html__('Style 3', 'ruya') => 'style3',
				),
				"description" => esc_html__('Select style in this elment.', 'ruya')
	    	),
	       array(
				'type'				=> 'dropdown',
				'param_name'		=> 'alignment',
				'heading'           => esc_html__("horizontal alignment", 'ruya'),
				'value'			    => array(
					esc_html__('Center', 'ruya') => 'center',
					esc_html__('Left', 'ruya')	=> 'left',
					esc_html__('Right', 'ruya')	=> 'right'
				),
			),
			array(
				'type'				=> 'textfield',
				'param_name'		=> 'el_class',
	            'heading'           => esc_html__("Extra Class", 'ruya'),
			    'description'       => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' ) 
			),
	)
));