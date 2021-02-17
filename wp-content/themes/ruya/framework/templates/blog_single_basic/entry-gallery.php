<?php 
global $ruya_options;
$media_output = '';
$attachment_ids = array();
$attachment_ids = get_post_meta(get_the_ID(), 'mo_portfolio_gallery', true); 
$tb_post_layout = isset($ruya_options['tb_post_layout']) ? $ruya_options['tb_post_layout'] : '1col'; ?>
<div class="single-header basic">
 <?php if ( $tb_post_layout == '1col' ) { ?><div class="container wrapper"> <?php } ?>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content mo-blog">
	<div class="title-wrap">
	    <?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('cat', $ruya_options['post-meta-single'])) {  ?>
			<p class="cat-name"><?php echo the_terms( get_the_ID(), 'category' ); ?></p>
		<?php } ?>
		<h3 class="post-title"><?php the_title(); ?></h3> 
		 <ul class="meta-post">
		        <?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('author', $ruya_options['post-meta-single'])) {  ?>
			    	<li><i class="fa fa-user-o"></i><?php echo esc_html__('By ', 'ruya').get_the_author(); ?></li>
				<?php } ?>
                <?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('date', $ruya_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
				<?php } ?>
				<?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('comment', $ruya_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); echo esc_html__(' Comment', 'ruya'); ?></a></li>  
				<?php } ?>
				<?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('view', $ruya_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-bookmark-o"></i> <?php echo ruya_get_post_views(get_the_ID()) . esc_html__(' Views', 'ruya'); ?></li>
				<?php } ?>
		 </ul> 
   </div>
   <?php if(!empty($attachment_ids)) {
		foreach($attachment_ids as $attachment_id ) {
		   if ( is_singular()) {
				$image_attributes = wp_get_attachment_image_src($attachment_id, 'full');
			}
			else if (has_post_thumbnail()) {
				$image_attributes = wp_get_attachment_image_src($attachment_id, 'ruya-medium');
			}	
			if($image_attributes[0]){
				$media_output .= '<div class="item">
								  <figure class="img-single">
									<img src="'.esc_url($image_attributes[0]).'" alt="' . the_title_attribute('echo=0') . '" height="260"/>
								   </figure>
								</div>';
			}
		}
	}
	echo '<div class="carousel-post">'.$media_output.'</div>';?>
	</div>
    <?php if ( $tb_post_layout == '1col' ) { ?></div><?php } ?>
</div>