<?php ruya_footer();
		global $ruya_options;
		if(isset($ruya_options["style_selector"])&&$ruya_options["style_selector"]) {
			require_once RUYA_ABS_PATH.'/box-style.php';
		} ?>
     </div><!-- wrapper  -->
     <?php wp_footer(); ?>
</body>