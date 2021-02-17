<?php get_header(); 
global $ruya_options;
$tb_blog_layout = isset($ruya_options['tb_blog_layout']) ? $ruya_options['tb_blog_layout'] : '2cr';
$tb_show_page_title = isset($ruya_options['tb_page_show_page_title']) ? $ruya_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($ruya_options['tb_page_show_page_breadcrumb']) ? $ruya_options['tb_page_show_page_breadcrumb'] : 1;
$tb_archive_title_bar = (int) isset($ruya_options['tb_archive_title_bar'])? $ruya_options['tb_archive_title_bar']: 0;
$cl_content ='col-xs-12 col-sm-12 col-md-12 col-lg-12';
?>
<div class="main-content">
   <?php if ( $tb_archive_title_bar ){ 
	  ruya_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); 
   } else { ?>
	  <div class="no-pagetitle">
	  	 <div class="mo-blog-archive container">
	  	   <h2 class="mo-page_title color-main"><?php echo ruya_page_title(); ?></h2> 
        </div>
	  </div>
   <?php } ?>
	 <div class="single-content">
	   <div class="mo-blog-archive container">
	        <div class="row">
	            <?php if ( is_active_sidebar('ruya-main-sidebar') || is_active_sidebar('ruya-left-sidebar') || is_active_sidebar('ruya-right-sidebar') ) {
				  if ( $tb_blog_layout == '2cl' || $tb_blog_layout == '2cr' ){
					  $cl_content = 'with-sidebar';
				   }
				 } ?>
				
				<!-- Start Left Sidebar -->
				<?php if ( $tb_blog_layout == '2cl' ) { ?>
				   <?php if (is_active_sidebar('ruya-left-sidebar')) { ?><div class="sidebar sidebar-left"><?php dynamic_sidebar('ruya-left-sidebar'); ?></div>
                   <?php }elseif(is_active_sidebar('ruya-main-sidebar')){?><div class="sidebar sidebar-left"><?php dynamic_sidebar('ruya-main-sidebar');?></div><?php }?>
				<?php } ?>
				<!-- End Left Sidebar -->
                
                 <!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
				   <div class="posts grid-posts">
					<?php
					if( have_posts() ) {
						while ( have_posts() ) : the_post();?>
						 <div class="grid-post col-xs-12 col-sm-12">  
						    <div <?php post_class(); ?>> 
								<div class="post-content"> 
								     <div class="info-post">
										<h3 class="post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
										<p><?php the_excerpt(); ?></p>
										<div class="footer-info-post">
									    	<ul class="meta-post">
											   <li><div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), '30', get_option( 'avatar_default', 'mystery' ), get_the_author(), array( 'class' => 'circle' ) ); ?> </div><?php echo get_the_author(); ?></li>
											   <li class="date"><?php echo get_the_date(); ?></li>
											 </ul>
										</div>
									 </div>
								</div>
						    </div>
						</div>
						<?php endwhile; 
					    } else {
							get_template_part( 'framework/templates/entry', 'none');
						} ?>
		                </div><!-- posts -->
		                 <div class="clearfix"></div>
					    <?php ruya_paging_nav(); ?>
				   </div>
				<!-- End Content -->
				
				<!-- Start Right Sidebar -->
			    <?php if ( $tb_blog_layout == '2cr' ) { ?>
				   <?php if (is_active_sidebar('ruya-right-sidebar')) { ?><div class="sidebar sidebar-right"><?php dynamic_sidebar('ruya-right-sidebar'); ?></div>
				   <?php }elseif(is_active_sidebar('ruya-main-sidebar')){?><div class="sidebar sidebar-right"><?php dynamic_sidebar('ruya-main-sidebar');?></div><?php }?>
			    <?php } ?>
			    <!-- End Right Sidebar -->
            </div> <!-- End row  -->
       </div> <!-- End container -->
   </div> <!-- End single-content -->
</div> <!-- End main-content -->
<?php get_footer(); ?>