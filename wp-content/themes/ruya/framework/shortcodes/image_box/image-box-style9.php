 <?php if($attachment_image[0]) {
	echo '<div class="thumb-service" style="background-image: url('.esc_url($attachment_image[0]).')"></div>';  
} ?>	
<div class="title-wrap">
  <?php 
	if($sup_title_box) echo '<p class="sup-title">'.esc_html($sup_title_box).'</p>';
	if($title_box) echo '<h6>'.esc_html($title_box).'</h6>';
	if($content_box)echo '<div class="content">'.$content_box.'</div>';
	if($link_box) echo '<a class="button btn-txt btn-txt-circle dark hr_primary" href="'.esc_url($href).'" target="'. esc_attr($target).'"><span class="button-text">'. esc_html($txt_link_box) .'</span> <span class="button-arrow"><span class="button-icon"><i class="ion-ios-arrow-right"></i></span></span></a>';
  ?>
 </div>