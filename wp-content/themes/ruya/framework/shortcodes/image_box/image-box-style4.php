<?php if($link_box) { echo '<a href="'.esc_url($href).'" target="'. esc_attr($target).'">'; } ?>
<?php 
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
	if($attachment_image[0]) { echo '
	<div class="thumb-service">
		<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr($title_box).'"/>
	</div>';
} ?>
<div class="title-wrap">
  <div class="caption">
  <?php 
	if($sup_title_box) echo '<p class="sup-title">'.esc_html($sup_title_box).'</p>';
	if($title_box) echo '<h6>'.esc_html($title_box).'</h6>';
	if($content_box)echo '<div class="content">'.$content_box.'</div>';
  ?>
  </div>
</div>
<?php if($link_box){ echo '</a>';} ?>