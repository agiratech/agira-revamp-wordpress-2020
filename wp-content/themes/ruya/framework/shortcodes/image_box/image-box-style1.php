<?php if($link_box) { echo '<a a href="'.esc_url($href).'" target="'. esc_attr($target).'">'; } ?>
  <div class="img-perspective"><img class="img-resposive" src="<?php echo esc_url($attachment_image[0]); ?>" alt="<?php echo esc_attr($title_box); ?>" /> </div>
	<div class="perspective_overlay"></div>
	<div class="perspective-caption">
		<?php 
		    if($sup_title_box) echo '<p class="sup-title">'.esc_html($sup_title_box).'</p>';
			if($title_box) echo '<h6 class="perspective-title">'.esc_html($title_box).'</h6>'; 
			if($content_box)echo '<div class="content">'.$content_box.'</div>';
		?>
	</div>
 <?php if($link_box){ echo '</a>';} ?>