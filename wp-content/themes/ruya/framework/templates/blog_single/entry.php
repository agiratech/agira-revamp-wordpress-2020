<?php global $ruya_options; ?>
 <div class="single-header img_overlay">
    <?php $image_link = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
    <div class="blog-hero" style="background-image: url(<?php echo esc_url($image_link); ?>);" ></div>
	<div class="container wrapper">
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
	   <div id="content-anchor" class="scroll-to-content smooth-scroll"><a href="#content-anchor"><?php echo esc_html__('Scroll', 'ruya') ?><span></span></a></div>
	</div>
</div>