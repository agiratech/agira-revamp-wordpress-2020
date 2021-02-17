<?php
function ruya_icon_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'icon' => 'fontawesome',
		'image_icon' => '',
		'number_step' => '',
		'title' => '',
		'link' => '',
		'txt_link' => 'Read More',
	    'color' => 'primary',
	    'ruya_template' => 'icon-box-style1',
		'animation' => '',
		'hover_animation' => '',
		'animation_delay' => '200',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
    $icon_name = "icon_" . $icon;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
	$template_class = $ruya_template;
    $class = array();
	$class[] = 'service iconbox';
	$class[] = $el_class;
    $class[] = $template_class;
	
	//link 
	$link_button = null;
    if ($link !== '') { $link_button = vc_build_link($link); }
    if ( strlen( $link_button['url'] ) > 0 ) {
        $href = $link_button['url'];
    } else{ $href = ''; }
	$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];
	
    /* attributes SVG */
	$attributes = $svg = array();
	if( !empty( $animation ) ) {
		$attributes['data-animate-icon'] = true;	
		if ( !empty( $animation_delay ) ) {
			$svg['delay'] = $animation_delay;
		}
		if( 'yes' === $hover_animation ) {
			$svg['resetOnHover'] = true;
		}
	}
	if ( !empty( $svg ) ) {
		$attributes['data-plugin-options'] = wp_json_encode( $svg );
	}
    ob_start(); ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php printf( html_attributes( $attributes ) ); ?>>
		    <?php
	        if( $icon === 'animated' ) {
				$anim_icon = isset($atts[$icon_name]) ? esc_attr( $atts[$icon_name] ) : 'animated-arrows_anticlockwise';
				$svg  = str_replace( 'animated-', '', $anim_icon );		
				$svg_src = RUYA_URI_PATH . '/assets/fonts/svg/' . $svg . '.svg';
			}
	         if ($icon && !empty($iconClass) ) {		
				if( 'animated' === $icon ) {
					    $filetype = wp_check_filetype( $svg_src );
						$request  = wp_remote_get( $svg_src );
						$response = wp_remote_retrieve_body( $request );
						$svg_icon = $response;
				     	echo '<div class="icon-wrap iconbox-icon-container">'.($svg_icon).'</div>';
				}
				else {
					echo '<div class="icon-wrap"><i class="'.esc_attr($iconClass).'"></i></div>';
				}
			} ?>
		  <div class="title-wrap">
			   <?php if($title) echo '<h6>'.esc_html($title).'</h6>'; ?>
			   <?php 
				  if($content)echo '<div class="content">'.$content.'</div>';
	              if( $href !== '' && $ruya_template == 'icon-box-style1' || $href !== '' && $ruya_template == 'icon-box-style3' || $href !== '' && $ruya_template == 'icon-box-style6' || $href !== '' && $ruya_template == 'icon-box-style8' || $href !== '' && $ruya_template == 'icon-box-style9') {
	                 echo '<a class="button btn-txt btn-txt-arrow dark hr_primary"  href="'. esc_url($href).'" target="'. esc_attr($target).'">'. esc_html($txt_link) .'<span class="button-arrow"><span class="button-icon"></span></span></a>';	
				   }
                  if( $href !== '' && $ruya_template == 'icon-box-style2' || $href !== '' && $ruya_template == 'icon-box-style4' || $href !== '' && $ruya_template == 'icon-box-style5' || $href !== '' && $ruya_template == 'icon-box-style7' ) {
			        echo '<a class="button btn-txt btn-txt-circle dark hr_primary" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link) .'</span> <span class="button-arrow"><span class="button-icon"><i class="ion-ios-arrow-right"></i></span></span></a>';
				  }
			 ?>
          </div>
		</div>
        <div class="clearfix"></div>
    <?php
    return ob_get_clean();
}
if(function_exists('ruya_shortcode')) { ruya_shortcode('icon_box', 'ruya_icon_box_func');}
