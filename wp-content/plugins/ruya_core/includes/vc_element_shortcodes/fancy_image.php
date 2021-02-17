<?php
vc_map( array(
    "name" => __("Image Fancy", "ruya"),
    "base" => "single_fancy_image",
	"icon" => "tb-icon-for-vc fa fa-picture-o",
    "params" => array(
	     array(
				'type'             => 'attach_image',
				'param_name'       => 'image',
				'heading'          => esc_html__( 'Image', 'ruya' ),
				'descripton'       => esc_html__( 'Add image from gallery or upload new', 'ruya' ),
	            'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'vc_link',
				'param_name'  => 'img_link',
				'heading'     => esc_html__( 'Link', 'ruya' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'label',
				'heading'     => esc_html__( 'label', 'ruya' ),
	            'edit_field_class' => 'vc_col-sm-6',
			),
	        array(
				'type'       => 'checkbox',
				'param_name' => 'enable_shadow',
				'heading'    => esc_html__( 'Add Shadow?', 'ruya' ),
				'value'      => array( esc_html__( 'Yes', 'ruya' ) => 'yes' ),
	            'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'enable_roudness',
				'heading'    => esc_html__( 'Add roundness?', 'ruya' ),
				'edit_field_class' => 'vc_col-sm-3',
				'value'      => array( esc_html__( 'Yes', 'ruya' ) => 'yes' ),
			),
			
			//Effects
	        array(
				'type'        => 'checkbox',
				'param_name'  => 'enable_reveal',
				'heading'     => esc_html__( 'Reveal Effect', 'ruya' ),
				'description' => esc_html__( 'Enable Reveal Effect', 'ruya' ),
				'value'      => array( esc_html__( 'Yes', 'ruya' ) => 'yes' ),
				'edit_field_class' => 'vc_col-sm-12',
				'group' => esc_html__( 'Effects', 'ruya' ),
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'reveal_color',
				'heading' => esc_html__( 'Background color', 'ruya' ),
				'description' => esc_html__( 'Background color of the reveal effect', 'ruya' ),
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Effects', 'ruya' ),
				'dependency' => array(
					'element' => 'enable_reveal',
					'not_empty' => true
				),
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'reveal_direction',
				'heading' => esc_html__( 'Direction', 'ruya' ),
				'description' => esc_html__( 'Direction of the reveal effect', 'ruya' ),
				'value' => array(
					esc_html__( 'Left - Right', 'ruya' ) => 'lr',
					esc_html__( 'Top - Bottom', 'ruya' ) => 'tb',
					esc_html__( 'Right - Left', 'ruya' ) => 'rl',
					esc_html__( 'Bottom - Top', 'ruya' ) => 'bt'
				),
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Effects', 'ruya' ),
				'dependency' => array(
					'element' => 'enable_reveal',
					'not_empty' => true
				),
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'reveal_delay',
				'heading'    => esc_html__( 'Delay in milliseconds', 'ruya' ),
				'description' => esc_html__( 'Delay before revealing starts', 'ruya' ),
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Effects', 'ruya' ),
				'dependency' => array(
					'element' => 'enable_reveal',
					'not_empty' => true
				),
			),
			
			//Parallax
	        array(
				'type'        => 'checkbox',
				'param_name'  => 'parallax',
				'heading'     => esc_html__( 'Parallax', 'ruya' ),
				'description' => esc_html__( 'Add parallax effect to the element', 'ruya' ),
				'value'       => array( esc_html__( 'Yes', 'ruya' )  => 'yes' ),
	            'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'subheading',
				'param_name'  => 'prlx_from',
				'heading'     => esc_html__( 'Parallax "From" Options', 'ruya' ),
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'translate_from_x',
				'heading'     => esc_html__( 'Translate X', 'ruya' ),
				'description' => esc_html__( 'Select translate on X axe', 'ruya' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	           'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'translate_from_y',
				'heading'     => esc_html__( 'Translate Y', 'ruya' ),
				'description' => esc_html__( 'Select translate on Y axe', 'ruya' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'translate_from_z',
				'heading'     => esc_html__( 'Translate Z', 'ruya' ),
				'description' => esc_html__( 'Select translate on Z axe', 'ruya' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	           'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'scale_from_x',
				'heading'     => esc_html__( 'Scale X', 'ruya' ),
				'description' => esc_html__( 'Select Scale X', 'ruya' ),
				'min'         => 0,
				'max'         => 5,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
	
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'scale_from_y',
				'heading'     => esc_html__( 'Scale Y', 'ruya' ),
				'description' => esc_html__( 'Select Scale Y', 'ruya' ),
				'min'         => 0,
				'max'         => 5,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'scale_from_z',
				'heading'     => esc_html__( 'Scale Z', 'ruya' ),
				'description' => esc_html__( 'Select Scale Z', 'ruya' ),
				'min'         => 0,
				'max'         => 5,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'rotate_from_x',
				'heading'     => esc_html__( 'Rotate X', 'ruya' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'ruya' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'rotate_from_y',
				'heading'     => esc_html__( 'Rotate Y', 'ruya' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'ruya' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'rotate_from_z',
				'heading'     => esc_html__( 'Rotate Z', 'ruya' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'ruya' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	           'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'from_opacity',
				'heading'     => esc_html__( 'Opacity', 'ruya' ),
				'description' => esc_html__( 'Set opacity', 'ruya' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
	
			//parallax to
			array(
				'type'        => 'subheading',
				'param_name'  => 'prlx_to',
				'heading'     => esc_html__( 'Parallax "To" Options', 'ruya' ),
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'translate_to_x',
				'heading'     => esc_html__( 'Translate X', 'ruya' ),
				'description' => esc_html__( 'Select translate on X axe', 'ruya' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	           'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'translate_to_y',
				'heading'     => esc_html__( 'Translate Y', 'ruya' ),
				'description' => esc_html__( 'Select translate on Y axe', 'ruya' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	           'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'translate_to_z',
				'heading'     => esc_html__( 'Translate Z', 'ruya' ),
				'description' => esc_html__( 'Select translate on Z axe', 'ruya' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'scale_to_x',
				'heading'     => esc_html__( 'Scale X', 'ruya' ),
				'description' => esc_html__( 'Select Scale X', 'ruya' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
	
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'scale_to_y',
				'heading'     => esc_html__( 'Scale Y', 'ruya' ),
				'description' => esc_html__( 'Select Scale Y', 'ruya' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
	
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'scale_to_z',
				'heading'     => esc_html__( 'Scale Z', 'ruya' ),
				'description' => esc_html__( 'Select Scale Z', 'ruya' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-4',
			),
	
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'rotate_to_x',
				'heading'     => esc_html__( 'Rotate X', 'ruya' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'ruya' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-4',
			),
	
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'rotate_to_y',
				'heading'     => esc_html__( 'Rotate Y', 'ruya' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'ruya' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'rotate_to_z',
				'heading'     => esc_html__( 'Rotate Z', 'ruya' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'ruya' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'        => 'mo_slider',
				'param_name'  => 'to_opacity',
				'heading'     => esc_html__( 'Opacity', 'ruya' ),
				'description' => esc_html__( 'Set opacity', 'ruya' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'subheading',
				'param_name'  => 'prlx_common',
				'heading'     => esc_html__( 'Parallax Settings', 'ruya' ),
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'to_easy',
				'heading'     => esc_html__( 'Animation Easing', 'ruya' ),
				'description' => '',
				'value'       => array(
					'linear',
					'easeInQuad',
					'easeInCubic',
					'easeInQuart',
					'easeInQuint',
					'easeInSine',
					'easeInExpo',
					'easeInCirc',
					'easeInBack',
					'easeOutQuad',
					'easeOutCubic',
					'easeOutQuart',
					'easeOutQuint',
					'easeOutSine',
					'easeOutExpo',
					'easeOutCirc',
					'easeOutBack',
					'easeInOutQuad',
					'easeInOutCubic',
					'easeInOutQuart',
					'easeInOutQuint',
					'easeInOutSine',
					'easeInOutExpo',
					'easeInOutCirc',
					'easeInOutBack',
				),
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	            'edit_field_class' => 'vc_col-sm-3',
			),
	        array(
				'type'        => 'textfield',
				'param_name'  => 'to_delay',
				'heading'     => esc_html__( 'Delay', 'ruya' ),
				'description' => esc_html__( 'Add delay time in seconds', 'ruya' ),
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
	           'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_offset',
				'heading'     => esc_html__( 'Parallax Offset', 'ruya' ),
				'description' => esc_html__( 'Offset number', 'ruya' ),
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_duration',
				'heading'     => esc_html__( 'Parallax Duration', 'ruya' ),
				'description' => esc_html__( 'define how much time for ex 800', 'ruya' ),
				'group'       => esc_html__( 'Parallax Options', 'ruya' ),
				'dependency'  => array(
					'element' => 'parallax',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-3',
			),
    ),
));
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_fancy_image extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Single_fancy_image extends WPBakeryShortCode {
    }
}