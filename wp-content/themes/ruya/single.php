<?php get_header(); 
global $ruya_options;
$tb_post_layout = isset($ruya_options['tb_post_layout']) ? $ruya_options['tb_post_layout'] : '1col';
$tb_post_header_layout = isset($ruya_options['tb_post_header_layout']) ? $ruya_options['tb_post_header_layout'] : 'basic';
$tb_show_page_title = isset($ruya_options['tb_page_show_page_title']) ? $ruya_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($ruya_options['tb_post_show_breadcrumb']) ? $ruya_options['tb_post_show_breadcrumb'] : 1;
$tb_post_show_nav = (int) isset($ruya_options['tb_post_show_nav'])? $ruya_options['tb_post_show_nav']: 1;
$tb_post_show_author = (int) isset($ruya_options['tb_post_show_author']) ? $ruya_options['tb_post_show_author'] : 1;
$tb_related_post = (int) isset($ruya_options['tb_related_post']) ? $ruya_options['tb_related_post'] : 1;
$tb_post_show_comment = (int) isset($ruya_options['tb_post_show_comment']) ? $ruya_options['tb_post_show_comment']: 1; 
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';
?>
<div class="main-content">
	<div class="mo-media <?php echo get_post_format(); ?>">
	 <?php while ( have_posts() ) : the_post(); ?>
    
	    <?php if ( $tb_post_header_layout == 'img_overlay' ) { get_template_part( 'framework/templates/blog_single/entry', get_post_format());  } ?>
	    <?php if ( $tb_post_layout == '1col' ) { 
	       if ( $tb_post_header_layout == 'basic' ) { get_template_part( 'framework/templates/blog_single_basic/entry', get_post_format());  } 
        } ?>
	    <div class="container mo-blog-article">
		 <?php if ( is_active_sidebar('ruya-main-sidebar') || is_active_sidebar('ruya-left-sidebar') || is_active_sidebar('ruya-right-sidebar') ) {
		  if ( $tb_post_layout == '2cl' || $tb_post_layout == '2cr' ){
			  $cl_content = 'with-sidebar';
		   }
		 } ?>
		<!-- Start Left Sidebar -->
		<?php if ( $tb_post_layout == '2cl' ) { ?>
	       <?php if ( $tb_post_header_layout == 'basic' ) {?><div class="basic-sidebar"><?php }?>
		   <?php if (is_active_sidebar('ruya-left-sidebar')) { ?><div class="sidebar sidebar-left"><?php dynamic_sidebar('ruya-left-sidebar'); ?></div>
		   <?php }elseif(is_active_sidebar('ruya-main-sidebar')){?><div class="sidebar sidebar-left"><?php dynamic_sidebar('ruya-main-sidebar');?></div><?php }?>
		   <?php if ( $tb_post_header_layout == 'basic' ) {?></div><?php }?>
		<?php } ?>
		<!-- End Left Sidebar -->
				
			
			
			
			
		<!-- Start Content -->
		<div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
			
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
<!-- 					<li><i class="fa fa-comments-o"></i><a href="<?php //comments_link(); ?>"><?php //comments_number( '0', '1', '%' ); echo esc_html__(' Comment', 'ruya'); ?></a></li>   -->
				<?php } ?>
				<?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('view', $ruya_options['post-meta-single'])) {  ?>
					<li><i class="fa fa-bookmark-o"></i> <?php if(ruya_get_post_views(get_the_ID()) > 100){
					echo ruya_get_post_views(get_the_ID()) . esc_html__(' Views', 'ruya'); 
				}?></li>
				<?php } ?>
			 </ul> 
	   </div>
			
			
		 <?php if ( $tb_post_layout == '2cl' || $tb_post_layout == '2cr'  ) { ?> 
		   <?php if ( $tb_post_header_layout == 'basic' ) { get_template_part( 'framework/templates/blog_single_basic/entry', get_post_format()); } ?>
		  <?php } ?>
			  <article <?php post_class(); ?>>
				<div class="mo-post-item">
				<div class="single-post entry-content">
				   <div class="sticky-buttons">
				    <?php if (function_exists('ruya_post_share_buttons') && isset($ruya_options['post_share'])) { 
	                  if (is_array($ruya_options['post_share'])) {
						 if ( in_array('sticky', $ruya_options['post_share'], true)) {
							 ?> <div class="share-title"><i class="fa fa-share-alt"></i></div> <?php
							echo ruya_post_share_buttons();
						 }
					   }
                    } ?>
				    </div>
					<?php the_content(); 
					 wp_link_pages(array(
						'before'		   => '<div class="page-links">',
						'after'		       => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
					)); ?>
					<div class="clearfix"></div> 
					
					<div class="row">
					   <div class="col-md-6 col-xs-12 tag-sec">
                         <?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('tag', $ruya_options['post-meta-single'])) {  ?>
							<div class="tags"> <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?></div> 
						 <?php } ?>
					   </div>
					   <div class="col-md-6 col-xs-12">
                         <?php if (isset($ruya_options['post-meta-single']) && is_array($ruya_options['post-meta-single']) && in_array('like', $ruya_options['post-meta-single'])) {  ?>
							<div class="blog_like"><?php if( function_exists('ruya_like') ) ruya_like(); ?> </div>
					     <?php } ?>
                    
					       <?php if (function_exists('ruya_post_share_buttons') && isset($ruya_options['post_share'])) { 
							  if (is_array($ruya_options['post_share'])) {
								 if ( in_array('basic', $ruya_options['post_share'], true)) {
									echo ruya_post_share_buttons();
								 }
							   }
						   } ?>
					   </div>
					</div>
			      </div>
			    </div>
			  </article>

			  <div class="clearfix"></div>
			  <?php if ( function_exists('ruya_post_author_bio') && $tb_post_show_author ) { ruya_post_author_bio(); } ?>
			  
			  <?php if ( $tb_post_show_nav ){ ?>
			   <div class="clearfix"></div>
			   <div class="single-directions"><?php ruya_post_directions();?></div> 
	         <?php } ?>
	         
			  <div class="clearfix"></div>
			  <?php if ( $tb_related_post ) { ruya_related_post(); }  ?>
			  
			 <?php if ( (comments_open() && $tb_post_show_comment) || (get_comments_number() && $tb_post_show_comment) ) { ?>
			     <div class="clearfix"></div>
				 <div class="single-comments">
					<?php comments_template(); ?>
				 </div>
			 <?php }?>
		</div><!-- End content mo-blog -->
        
		<!-- Start Right Sidebar -->
<!-- 		  <?php //if ( $tb_post_layout == '2cr' ) { ?>
	        <?php //if ( $tb_post_header_layout == 'basic' ) {?><div class="basic-sidebar"><?php //}?>
            <?php //if (is_active_sidebar('ruya-right-sidebar')) { ?><div class="sidebar sidebar-right"><?php //dynamic_sidebar('ruya-right-sidebar'); ?></div>
		    <?php //} elseif(is_active_sidebar('ruya-main-sidebar')){?><div class="sidebar sidebar-right"><?php //dynamic_sidebar('ruya-main-sidebar');?></div><?php //} ?>
		    <?php //if ( $tb_post_header_layout == 'basic' ) {?></div><?php //}?>
		 <?php //} ?> -->
	    <!-- End Right Sidebar -->
	 <?php endwhile; ?> 
    </div><!-- End container -->
  </div><!-- End mo-media -->
</div><!-- End main-content -->
<?php get_footer(); ?>