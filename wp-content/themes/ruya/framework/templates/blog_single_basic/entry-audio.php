<?php
global $ruya_options;
$media_output = '';
$audio_source_from = get_post_meta(get_the_ID(), 'tb_audio_type', true);
$audio_type = get_post_meta(get_the_ID(), 'tb_post_audio_type', true);
$audio_url = get_post_meta(get_the_ID(), 'tb_post_audio_url', true);
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
   <?php if($audio_source_from == 'soundcloud') {
	$media_output .= '<div class="embed-responsive embed-responsive-16by9">'. get_post_meta(get_the_ID(), 'tb_post_audio_iframe', true).'</div>';
	} else {
		if($audio_url) echo do_shortcode('[audio '.esc_html($audio_type).'="'.esc_url($audio_url).'"][/audio]');
	} 
	echo '<div class="audio-post">'.$media_output.'</div>';?>
	</div>
    <?php if ( $tb_post_layout == '1col' ) { ?></div><?php } ?>
</div>