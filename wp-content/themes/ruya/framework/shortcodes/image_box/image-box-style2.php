<?php 
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
	if($attachment_image[0]) { echo '
		<div class="thumb-service">
			<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr($title_box).'"/>
		</div>';
	}
?>
<div class="title-wrap">
  <?php 
	   if($sup_title_box) echo '<p class="sup-title">'.esc_html($sup_title_box).'</p>';
	   if($title_box) echo '<h6>'.esc_html($title_box).'</h6>';
	   if($link_box) echo '<div class="row-btn"><a class="link-btn" href="'.esc_url($href).'" target="'. esc_attr($target).'">'. esc_html($txt_link_box) .'</a></div>';
	   if($content_box)echo '<div class="content">'. $content_box .'</div>';
  ?>
 </div>
