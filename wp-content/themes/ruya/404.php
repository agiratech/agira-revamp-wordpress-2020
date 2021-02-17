<?php
/*
Template Name: 404 Template
*/
get_header(); 
global $ruya_options;
?>
<div class="main-content"> 
	<div class="page-404">
		<div class="container">
			<div class="text-center">
			    <?php if(isset($ruya_options['error-404-title']) !='') { ?> <h1><?php echo esc_html($ruya_options['error-404-title']);?></h1>
			    <?php } else{ ?><h1> <?php echo esc_html__( '404 ', 'ruya' ); ?></h1> <?php } ?>
                <?php if(isset($ruya_options['error-404-subtitle']) !='') { ?><h4><?php echo esc_html($ruya_options['error-404-subtitle']);?></h4>
			    <?php } else { ?><h4><?php echo esc_html__( 'Oops! That page can’t be found.', 'ruya' ); ?></h4><?php } ?>
                <?php if(isset($ruya_options['error-404-content']) !='') { ?><p><?php echo esc_html($ruya_options['error-404-content']);?></p><?php } ?>
		        <?php 
				if(isset($ruya_options['error-404-btn']) && $ruya_options['error-404-btn']) {
				if(  $ruya_options['error-404-btn'] == 'on') { ?>
					 <a href="<?php echo esc_url(home_url('/')); ?>" class="button btn-solid light hr_light bg_gradient bg_hr_gradient large radius0 roll"><span class="button-text"><?php if(isset($ruya_options['error-404-btn-title']) !='') { echo esc_html($ruya_options['error-404-btn-title']); } else{ echo esc_html__( 'Back To Home ', 'ruya' ); } ?></span></a>	
			    <?php }
				}?>
			</div>
		</div>
	</div>
</div>    
<?php wp_footer(); ?>
</div><!-- wrapper  -->
</body>