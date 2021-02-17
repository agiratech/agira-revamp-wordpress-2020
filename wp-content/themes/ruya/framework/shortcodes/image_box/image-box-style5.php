<?php if($link_box) { echo '<a href="'.esc_url($href).'" target="'. esc_attr($target).'">'; } ?>
  <div class="img-perspective2" style="background-image: url('<?php echo esc_url($attachment_image[0]); ?>');"></div>
	<div class="perspective-caption">
		<?php 
			if($sup_title_box) echo '<p class="sup-title">'.esc_html($sup_title_box).'</p>';
            if($title_box) echo '<h6 class="perspective-title">'.esc_html($title_box).'</h6>'; 
			if($content_box)echo '<div class="content">'.$content_box.'</div>';
		?>
	</div>
<?php if($link_box){ echo '</a>';} ?>