<?php
function ruya_menu_box($params) {
    extract(shortcode_atts(array(
        'image' => '',
        'title_box' => '',
		'price_box' => '',
		'content_box' => '',
        'el_class' => ''
    ), $params));
	$class = array();
    $class[] = 'menu-box';
	$class[] = $el_class;
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
    ob_start(); ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
       
		<div class="menu-image"  style="background-image: url('<?php echo esc_url($attachment_image[0]); ?>');" ></div>
		<div class="menu-caption">
		    <div class="menu-title">
			<?php 
				if($title_box) echo '<h6 class="title">'.esc_html($title_box).'</h6>'; 
				echo '<div class="dots"></div>'; 
				if($price_box) echo '<p class="price">'.esc_html($price_box).'</p>';
			?>
		   </div>
           <?php if($content_box)echo '<div class="content">'.$content_box.'</div>'; ?>
        </div>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('ruya_shortcode')) { ruya_shortcode('menu_box', 'ruya_menu_box'); }