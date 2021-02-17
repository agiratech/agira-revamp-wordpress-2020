<?php
vc_add_param ( "vc_row", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => esc_html__("row style", 'ruya'),
		"param_name" => "row_separator",
		"group"         => esc_html__("Custom Options", 'ruya'),
		"description" => esc_html__("Select shap style in this row.",'ruya'),
		"value" => array(
			esc_html__("None Select", 'ruya')    => "none",
			esc_html__("triangle", 'ruya')       => "lg_triangle",
			esc_html__("round", 'ruya')          => "round",
			esc_html__("curve", 'ruya')          => "curve",
			esc_html__("angled left", 'ruya')    => "angled_left",
			esc_html__("angled right", 'ruya')   => "angled_right",
			esc_html__("wave", 'ruya')           => "wave",
			esc_html__("waves", 'ruya')          => "waves",
		 )
) );
vc_add_param ( "vc_row", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => esc_html__("position separator", 'ruya'),
		"param_name" => "position_separator",
		"group"         => esc_html__("Custom Options", 'ruya'),
		"description" => esc_html__("Select shap position in this row.",'ruya'),
		"value" => array(
			esc_html__("bottom", 'ruya') => "svg_bottom",
			esc_html__("top", 'ruya')    => "svg_top",
			esc_html__("top AND bottom", 'ruya')  => "svg_top_bottom")
) );
vc_add_param ( "vc_row", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => esc_html__("color separator", 'ruya'),
		"param_name" => "color_separator",
		"group"         => esc_html__("Custom Options", 'ruya'),
		"description" => esc_html__("Select shap color style in this row.",'ruya'),
		"value" => array(
			esc_html__("None", 'ruya')      => "svg_none",
			esc_html__("White", 'ruya')     => "svg_white",
			esc_html__("Grey", 'ruya')      => "svg_grey",
			esc_html__("Dark", 'ruya')      => "svg_dark",
	        esc_html__("Black", 'ruya')     => "svg_black",
			esc_html__("Primary", 'ruya')   => "svg_primary",
			esc_html__("Secondary", 'ruya') => "svg_secondary")
) );
vc_add_param ( "vc_row", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => esc_html__("bottom color separator", 'ruya'),
		"param_name" => "bottom_color_separator",
		"group"         => esc_html__("Custom Options", 'ruya'),
		"description" => esc_html__("Select bottom shap color style in this row.",'ruya'),
		'dependency'  => array(
		   "element"=>"position_separator",
		   "value"=>  "svg_top_bottom",
		),
		"value" => array(
			esc_html__("None", 'ruya')      => "svg_bottom_none",
			esc_html__("White", 'ruya')     => "svg_bottom_white",
			esc_html__("Grey", 'ruya')      => "svg_bottom_grey",
			esc_html__("Dark", 'ruya')      => "svg_bottom_dark",
			esc_html__("Primary", 'ruya')   => "svg_bottom_primary",
			esc_html__("Secondary", 'ruya') => "svg_bottom_secondary")
) );
vc_add_param ( "vc_row", array (
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("canvas", 'ruya'),
			"param_name" => "canvas",
			"group"       => esc_html__("Custom Options", 'ruya'),
			"description" => esc_html__("Select the particles in this element.",'ruya'),
			"value" => array(
				esc_html__("None Select", 'ruya') => "none",
				esc_html__("particles style 1", 'ruya') => "particles1",
				esc_html__("particles style 2", 'ruya') => "particles2")
) );
	vc_add_param ( "vc_row", array (
		"type"       => "dropdown",
		"class"      => "",
		"heading"    => esc_html__("Background color", 'ruya'),
		"param_name" => "content_bg_color",
		"group"      => esc_html__("Design Options", 'ruya'),
		"description" 	=> esc_html__( "Select background color in this row.", 'ruya' ),
		"value"      => array(
			esc_html__("light", 'ruya')     => "bg-light",
			esc_html__("Grey", 'ruya')      => "bg-grey",
			esc_html__("Dark", 'ruya')      => "bg-dark",
			esc_html__("Gradient", 'ruya')  => "bg-gradient",
			esc_html__("Primary", 'ruya')   => "bg-color-main",
			esc_html__("Secondary", 'ruya') => "bg-color-secondary")
) );
vc_add_param ( "vc_row", array (
		"type"       => "dropdown",
		"class"      => "",
		"heading"    => esc_html__("content color", 'ruya'),
		"param_name" => "content_color",
		"group"      => esc_html__("Design Options", 'ruya'),
		"description" 	=> esc_html__( "Select content text color in this row.", 'ruya' ),
		"value"      => array(
			esc_html__("Dark Text", 'ruya')  => "dark_txt",
			esc_html__("White Text", 'ruya') => "white_txt")
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Gradient Overlay 'primary color'", 'ruya' ),
		"param_name" 	=> "mo_bg_overlay",
		"value" 		=> "",
		"group"         => esc_html__("Design Options", 'ruya'),
		"description" 	=> esc_html__( "Select color Gradient background overlay ( primary color ) in this row.", 'ruya' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Gradient Overlay 'second color'", 'ruya' ),
		"param_name" 	=> "mo_bg_second_overlay",
		"value" 		=> "",
		"group"         => esc_html__("Design Options", 'ruya'),
		"description" 	=> esc_html__( "Select color Gradient background overlay ( second color ) in this row.", 'ruya' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "checkbox",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Background Fixed", 'ruya' ),
		"param_name" 	=> "mo_bg_fixed",
		"value" 		=> "",
		"group"         => esc_html__("Design Options", 'ruya'),
		"description" 	=> esc_html__( "Enable background fixed in this row.", 'ruya' )
) );
vc_add_param ( "vc_custom_heading", array (
		"type" 			=> "textarea",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Custom CSS", 'ruya' ),
		"param_name" 	=> "custom_css",
		"value" 		=> "",
		"description" 	=> esc_html__( "Enter style in this custom heading. EX: line-height: 24px; letter-spacing: 0.04em; ...", 'ruya' )
) );


// New Params for Row
function mo_row_extras() {
	$custom_animation_params = array(
		array(
			'type'             => 'checkbox',
			'param_name'       => 'content_animation',
			'value'            => array( esc_html__( 'Yes', 'ruya' ) => 'yes' ),
			'heading'          => esc_html__( 'Animate Columns?', 'ruya' ),
			'description'      => esc_html__( 'Will enable animation for columns, it will be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'ruya' ),
		    'group' => esc_html__( 'Animation', 'ruya' ),
		),
		//Custom Animation Options
		array(
			'type'        => 'textfield',
			'param_name'  => 'mo_duration',
			'heading'     => esc_html__( 'Duration', 'ruya' ),
			'description' => esc_html__( 'Add duration of the animation in milliseconds EX:1200', 'ruya' ),
			'dependency'  => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
			'group' => esc_html__( 'Animation', 'ruya' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'mo_start_delay',
			'heading' => esc_html__( 'Start Delay', 'ruya' ),
			'description' => esc_html__( 'Add start delay of the animation in milliseconds EX:100', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
			'group' => esc_html__( 'Animation', 'ruya' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'mo_delay',
			'heading' => esc_html__( 'Delay', 'ruya' ),
			'description' => esc_html__( 'Add delay of the animation between of the animated elements in milliseconds', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
			'group' => esc_html__( 'Animation', 'ruya' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'mo_easing',
			'heading' => esc_html__( 'Easing', 'ruya' ),
			'description' => esc_html__( 'Select an easing type', 'ruya' ),
			'value' => array(
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
			'std' => 'easeOutQuint',
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
			'group' => esc_html__( 'Animation', 'ruya' ),
		),
		array(
			'type'        => 'dropdown',
			'param_name'  => 'mo_direction',
			'heading'     => esc_html__( 'Direction', 'ruya' ),
			'description' => esc_html__( 'Select animations direction', 'ruya' ),
			'value' => array(
				esc_html__( 'Forward', 'ruya' )  => 'forward',
				esc_html__( 'Backward', 'ruya' )  => 'backward',
			),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
			'group' => esc_html__( 'Animation', 'ruya' ),
		),
		array(
			'type'        => 'subheading',
			'param_name'  => 'mo_init_values',
			'heading'     => esc_html__( 'Animate From', 'ruya' ),
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_translate_x',
			'heading'     => esc_html__( 'Translate X', 'ruya' ),
			'description' => esc_html__( 'Select translate on X axe', 'ruya' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		    'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_translate_y',
			'heading'     => esc_html__( 'Translate Y', 'ruya' ),
			'description' => esc_html__( 'Select translate on Y axe', 'ruya' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_translate_z',
			'heading'     => esc_html__( 'Translate Z', 'ruya' ),
			'description' => esc_html__( 'Select translate on Z axe', 'ruya' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		   'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_scale_x',
			'heading'     => esc_html__( 'Scale X', 'ruya' ),
			'description' => esc_html__( 'Select Scale X', 'ruya' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_scale_y',
			'heading'     => esc_html__( 'Scale Y', 'ruya' ),
			'description' => esc_html__( 'Select Scale Y', 'ruya' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_scale_z',
			'heading'     => esc_html__( 'Scale Z', 'ruya' ),
			'description' => esc_html__( 'Select Scale Z', 'ruya' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_rotate_x',
			'heading'     => esc_html__( 'Rotate X', 'ruya' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'ruya' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		    'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_rotate_y',
			'heading'     => esc_html__( 'Rotate Y', 'ruya' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'ruya' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
	    	'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_rotate_z',
			'heading'     => esc_html__( 'Rotate Z', 'ruya' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'ruya' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency'  => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
	    	'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_init_opacity',
			'heading'     => esc_html__( 'Opacity', 'ruya' ),
			'description' => esc_html__( 'Set opacity', 'ruya' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency'  => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		   'edit_field_class' => 'vc_col-sm-11',
		),
		//Animation Values
		array(
			'type'        => 'subheading',
			'param_name'  => 'mo_animations_values',
			'heading'     => esc_html__( 'Animate To', 'ruya' ),
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		),			
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_translate_x',
			'heading'     => esc_html__( 'Translate X', 'ruya' ),
			'description' => esc_html__( 'Select translate on X axe', 'ruya' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
	    	'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_translate_y',
			'heading'     => esc_html__( 'Translate Y', 'ruya' ),
			'description' => esc_html__( 'Select translate on Y axe', 'ruya' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
	    	'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_translate_z',
			'heading'     => esc_html__( 'Translate Z', 'ruya' ),
			'description' => esc_html__( 'Select translate on Z axe', 'ruya' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		   'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_scale_x',
			'heading'     => esc_html__( 'Scale X', 'ruya' ),
			'description' => esc_html__( 'Select Scale X', 'ruya' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_scale_y',
			'heading'     => esc_html__( 'Scale Y', 'ruya' ),
			'description' => esc_html__( 'Select Scale Y', 'ruya' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_scale_z',
			'heading'     => esc_html__( 'Scale Z', 'ruya' ),
			'description' => esc_html__( 'Select Scale Z', 'ruya' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_rotate_x',
			'heading'     => esc_html__( 'Rotate X', 'ruya' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'ruya' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		   'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_rotate_y',
			'heading'     => esc_html__( 'Rotate Y', 'ruya' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'ruya' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		    'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_rotate_z',
			'heading'     => esc_html__( 'Rotate Z', 'ruya' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'ruya' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency' => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		    'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'mo_an_opacity',
			'heading'     => esc_html__( 'Opacity', 'ruya' ),
			'description' => esc_html__( 'Set opacity', 'ruya' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group' => esc_html__( 'Animation', 'ruya' ),
			'dependency'  => array(
				'element' => 'content_animation',
				'value'   => 'yes',
			),
		    'edit_field_class' => 'vc_col-sm-11'
		),
	);
	vc_add_params( 'vc_row', $custom_animation_params );
    vc_add_params( 'vc_row_inner', $custom_animation_params );	
}
add_action( 'vc_after_init', 'mo_row_extras' );

// New Params for Row
function mo_column_extras() {
	$paralax_params = array(
		//Paralax settings for vc_column and vc_column_inner
		array(
			'type'        => 'checkbox',
			'param_name'  => 'parallax_animation',
			'heading'     => esc_html__( 'Animate Content Parallax?', 'ave-core' ),
			'description' => esc_html__( 'Add parallax for column.', 'ave-core' ),
			'value'       => array( esc_html__( 'Yes', 'ave-core' )  => 'yes' ),
		    'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
		),
		array(
			'type'        => 'subheading',
			'param_name'  => 'prlx_from',
			'heading'     => esc_html__( 'Parallax "From" Options', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'translate_from_x',
			'heading'     => esc_html__( 'Translate X', 'ave-core' ),
			'description' => esc_html__( 'Select translate on X axe', 'ave-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'translate_from_y',
			'heading'     => esc_html__( 'Translate Y', 'ave-core' ),
			'description' => esc_html__( 'Select translate on Y axe', 'ave-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'translate_from_z',
			'heading'     => esc_html__( 'Translate Z', 'ave-core' ),
			'description' => esc_html__( 'Select translate on Z axe', 'ave-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
           'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'scale_from_x',
			'heading'     => esc_html__( 'Scale X', 'ave-core' ),
			'description' => esc_html__( 'Select Scale X', 'ave-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'scale_from_y',
			'heading'     => esc_html__( 'Scale Y', 'ave-core' ),
			'description' => esc_html__( 'Select Scale Y', 'ave-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'scale_from_z',
			'heading'     => esc_html__( 'Scale Z', 'ave-core' ),
			'description' => esc_html__( 'Select Scale Z', 'ave-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'rotate_from_x',
			'heading'     => esc_html__( 'Rotate X', 'ave-core' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'ave-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'rotate_from_y',
			'heading'     => esc_html__( 'Rotate Y', 'ave-core' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'ave-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'rotate_from_z',
			'heading'     => esc_html__( 'Rotate Z', 'ave-core' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'ave-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'from_opacity',
			'heading'     => esc_html__( 'Opacity', 'ave-core' ),
			'description' => esc_html__( 'Set opacity', 'ave-core' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),

		),
		array(
			'type'        => 'subheading',
			'param_name'  => 'prlx_to',
			'heading'     => esc_html__( 'Parallax "To" Options', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'translate_to_x',
			'heading'     => esc_html__( 'Translate X', 'ave-core' ),
			'description' => esc_html__( 'Select translate on X axe', 'ave-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'translate_to_y',
			'heading'     => esc_html__( 'Translate Y', 'ave-core' ),
			'description' => esc_html__( 'Select translate on Y axe', 'ave-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
           'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'translate_to_z',
			'heading'     => esc_html__( 'Translate Z', 'ave-core' ),
			'description' => esc_html__( 'Select translate on Z axe', 'ave-core' ),
			'min'         => -500,
			'max'         => 500,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'scale_to_x',
			'heading'     => esc_html__( 'Scale X', 'ave-core' ),
			'description' => esc_html__( 'Select Scale X', 'ave-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-4',

		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'scale_to_y',
			'heading'     => esc_html__( 'Scale Y', 'ave-core' ),
			'description' => esc_html__( 'Select Scale Y', 'ave-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'scale_to_z',
			'heading'     => esc_html__( 'Scale Z', 'ave-core' ),
			'description' => esc_html__( 'Select Scale Z', 'ave-core' ),
			'min'         => 0,
			'max'         => 10,
			'step'        => 0.25,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'rotate_to_x',
			'heading'     => esc_html__( 'Rotate X', 'ave-core' ),
			'description' => esc_html__( 'Select rotate degree on X axe', 'ave-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'rotate_to_y',
			'heading'     => esc_html__( 'Rotate Y', 'ave-core' ),
			'description' => esc_html__( 'Select rotate degree on Y axe', 'ave-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'rotate_to_z',
			'heading'     => esc_html__( 'Rotate Z', 'ave-core' ),
			'description' => esc_html__( 'Select rotate degree on Z axe', 'ave-core' ),
			'min'         => -360,
			'max'         => 360,
			'step'        => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
            'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'mo_slider',
			'param_name'  => 'to_opacity',
			'heading'     => esc_html__( 'Opacity', 'ave-core' ),
			'description' => esc_html__( 'Set opacity', 'ave-core' ),
			'min'         => 0,
			'max'         => 1,
			'step'        => 0.1,
			'std'         => 1,
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
		),
		array(
			'type'        => 'subheading',
			'param_name'  => 'prlx_common',
			'heading'     => esc_html__( 'Parallax Settings', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
		),
		array(
			'type'        => 'dropdown',
			'param_name'  => 'to_easy',
			'heading'     => esc_html__( 'Animation Easing', 'ave-core' ),
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
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
		    'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'to_delay',
			'heading'     => esc_html__( 'Delay', 'ave-core' ),
			'description' => esc_html__( 'Add delay time in seconds', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
		    'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'parallax_time',
			'heading'     => esc_html__( 'Parallax Time', 'ave-core' ),
			'description' => esc_html__( 'Duration of the animation in sec', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'parallax_offset',
			'heading'     => esc_html__( 'Parallax Offset', 'ave-core' ),
			'description' => esc_html__( 'Offset number', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			 'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'       => 'dropdown',
			'param_name' => 'parallax_trigger',
			'heading'    => esc_html__( 'Parallax Trigger', 'ave-core' ),
			'value' => array(
				esc_html__( 'On Enter', 'ave-core' )  => 'onEnter',
				esc_html__( 'On Leave', 'ave-core' ) => 'onLeave',
				esc_html__( 'On Center', 'ave-core' ) => 'onCenter',
				esc_html__( 'Number Value', 'ave-core' ) => 'number',
			),
			'std'        => 'onEnter',
			'group'      => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency' => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			 'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'parallax_trigger_number',
			'heading'     => esc_html__( 'Parallax Trigger Number', 'ave-core' ),
			'description' => esc_html__( 'Input trigger number value from 0 to 1', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_trigger',
				'value'   => 'number'
			),
			 'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'parallax_duration',
			'heading'     => esc_html__( 'Parallax Duration', 'ave-core' ),
			'description' => esc_html__( 'define how much the animation last during the scroll. could be defined in px (150) or percent(100%)', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'dependency'  => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			 'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'        => 'dropdown',
			'param_name'  => 'enable_reverse',
			'heading'     => esc_html__( 'Enable Reverse', 'ave-core' ),
			'description' => esc_html__( 'Will enable animation each time the element will come in viewport', 'ave-core' ),
			'group'       => esc_html__( 'Parallax Options', 'ave-core' ),
			'value'       => array(
				esc_html__( 'No', 'ave-core' ) => 'no',
				esc_html__( 'Yes', 'ave-core' ) => 'yes',
			),
			'std' => 'yes',
			'dependency' => array(
				'element' => 'parallax_animation',
				'value'   => 'yes'
			),
			 'edit_field_class' => 'vc_col-sm-4',
		),
	);	
	vc_add_params( 'vc_column', $paralax_params );
    vc_add_params( 'vc_column_inner', $paralax_params );	
}
add_action( 'vc_after_init', 'mo_column_extras' );

// Shortcode 
// source : https://wpbakery.atlassian.net/wiki/pages/viewpage.action?pageId=524362
if(!function_exists('carousel_content')){
    function carousel_content( $atts, $content = null ) {
       return '<div class="owl-carousel content-carousel content-slider">'.do_shortcode($content).'</div>';
    }
    add_shortcode('carousel_content', 'carousel_content');
}

if(!function_exists('single_carousel_content')) {
	function single_carousel_content( $atts, $content =  null) {
		extract(shortcode_atts(array(
			'title' => 'Flexible & Customizable',
			'description' => '',
			'url' => '',
			'img' => ''
		), $atts));
        
        $url = ($url=='||') ? '' : $url;
		$url = ps_build_link( $url );
		$a_link = $url['url'];
		$a_title = ($url['title'] == '') ? '' : 'title="'.$url['title'].'"';
		$a_target = ($url['target'] == '') ? '' : 'target="'.$url['target'].'"';
        $button = $a_link ? '<a class="btn btn-md btn-black" href="'.$a_link. '" '.$a_title.' '.$a_target.'>'.$url['title'].'</a>' : '';

        $image = wp_get_attachment_image_src( $img, 'full');
		$image_src = $image['0'];
        
        
        $output = '<div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mb-sm-30">
                                <img src="'.$image_src.'" alt="" />
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <h3>'.$title.'</h3>
                                <div class="spacer-15"></div>
                                '.$description.'
                                <div class="spacer-15"></div>
                                '.$button.'
                            </div>
                        </div>
                    </div>
                </div>'; 
        
        return $output;
	}
	add_shortcode('single_carousel_content', 'single_carousel_content');		
}