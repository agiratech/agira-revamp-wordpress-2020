<?php
function ruya_process_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'number_step' => '',
		'title' => '',
		'link' => '',
		'txt_link' => 'Read More',
	    'ruya_template' => 'process-box-style1',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$template_class = $ruya_template;
    $class = array();
	$class[] = 'service process-box';
	$class[] = $el_class;
    $class[] = $template_class;
    ob_start(); ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		  <div class="process-wrap">
		       <?php if($number_step) echo '<div class="number-step"><h3>'.esc_html($number_step).'</h3></div>'; ?>
			   <?php if($title) echo '<h6>'.esc_html($title).'</h6>'; ?>
			   <?php if($content)echo '<div class="content">'.$content.'</div>';
	              if( $link && $ruya_template == 'process-box-style1' || $link && $ruya_template == 'process-box-style3') {
	                 echo '<a class="button btn-txt btn-txt-arrow dark hr_primary" href="'. esc_url($link). '">'. esc_html($txt_link) .'<span class="button-arrow"><span class="button-process"></span></span></a>';	
				   }
                  if( $link && $ruya_template == 'process-box-style2' ) {
			        echo '<a class="button btn-txt btn-txt-circle dark hr_primary" href="'. esc_url($link). '"><span class="button-text">'. esc_html($txt_link) .'</span> <span class="button-arrow"><span class="button-process"><i class="ion-ios-arrow-right"></i></span></span></a>';
				  }
			 ?>
          </div>
		</div>
        <div class="clearfix"></div>
    <?php
    return ob_get_clean();
}
if(function_exists('ruya_shortcode')) { ruya_shortcode('process_box', 'ruya_process_box_func');}