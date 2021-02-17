<?php
vc_add_shortcode_param( 'image_select', 'ruya_shortcode_template' );
function ruya_shortcode_template( $settings, $value ) {
   return '<div class="my_param_block">'
	.'<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
	esc_attr( $settings['param_name'] ) . ' ' .
	esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />
	<img src="'.esc_attr( $value ).'">'.
	'</div>'; // This is html markup that will be outputted in content elements edit form
} ?>


<?php
vc_add_shortcode_param( 'mo_slider', 'mo_param_slider' );
function mo_param_slider( $settings, $value ) {

	$value = htmlspecialchars( $value );

	$min  = isset( $settings['min'] ) ? $settings['min'] : '';
	$max  = isset( $settings['max'] ) ? $settings['max'] : '';
	$step = isset( $settings['step'] ) ? $settings['step'] : '';

	return '<div class="mo-slider" data-min="' . $min . '" data-max="' . $max . '" data-step="' . $step . '"><div class="mo-handle ui-slider-handle"></div></div>
			<input name="' . $settings['param_name']
	       . '" class="wpb_vc_param_value mo-sliderinput '
	       . $settings['param_name'] . ' ' . $settings['type']
	       . '" type="hidden" value="' . $value . '"/>';
} ?>