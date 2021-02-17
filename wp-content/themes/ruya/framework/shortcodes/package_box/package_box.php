<?php
function ruya_package_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
	    "style" => 'style1',
		'image' => ' ',
		"title" => '',
		"price" => '$99',
		"period" => '/ month',
		"content_package" => '',
		"button_label" => 'Order Now',
		"button_url" => '#',
		"pricing_best" => '',
		"el_class" => '',
    ), $atts));
	$content_package = wpb_js_remove_wpautop($content_package, true);
    $class = array();
	$class[] = 'pricing-item';
	$class[] = $style;
	$class[] = $el_class;
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
    ob_start();
    ?> 
	<div class="<?php echo esc_attr(implode(' ', $class)); echo esc_html($pricing_best);?>">
	     <div class="pricing-title">
	     	 <?php if($attachment_image) echo '<div class="content-img"><span class="package-img" style="background-image: url('.$attachment_image[0].')"></span></div> '; ?>
		     <?php if($title) echo '<h3>'.esc_html($title).'</h3>'; ?>
	     </div>
		 <div class="pricing"> 
			 <?php if($price) echo '<span class="pricing-currency">'.esc_html($price).'</span>'; 
			 if($period) echo '<span class="pricing-period">'.esc_html($period).'</span>'; ?>
		 </div>
         <div class="content">
           <?php if($content_package) echo _($content_package); ?>
         </div>
         <a class="button <?php if($style == 'style1') echo 'bg_dark bg_hr_secondary slide'; if($style == 'style2') echo 'bg_hr_dark radius0 roll'; if($style == 'style3') echo 'btn-txt btn-txt-circle';?>" href="<?php if($button_url) echo esc_url($button_url); ?>">
               <span class="button-text"><?php if($button_label) echo esc_html($button_label); ?></span>
              <?php if($style == 'style3') echo '<span class="button-arrow"><span class="button-icon"><i class="ion-ios-arrow-right"></i></span></span> '?>
         </a>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('ruya_shortcode')) { ruya_shortcode('Package_box', 'ruya_package_box_func');}