<!-- Start Header -->
<?php
	global $ruya_options;
	$class_header = 'mo-header-v6';
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($ruya_options['stick_main_menu_v6']) && $ruya_options['stick_main_menu_v6']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
  <div id="mo_header" class="mo-header-fixed <?php echo esc_attr($class_header); ?>">
  <div id="mo-header-icon" class="mo-header-icon visible-xs visible-sm"><span></span></div>
	<div class="mo-header-menu">
	   <div class="container-fluid">
	        <?php if (isset($ruya_options['menu_other_v6']) && is_array($ruya_options['menu_other_v6']) && in_array('sidepanel', $ruya_options['menu_other_v6'])) {  ?>
				<div class="menu-toggle">
			    <p class="menu-toggle-title"><?php echo esc_html__('Tell me more', 'ruya'); ?></p> 
				<span class="menu-sm-lines">
					<span class="menu-sm-line-1"></span>
					<span class="menu-sm-line-2"></span>
					<span class="menu-sm-line-3"></span>
				</span>
			  </div>
			<?php } ?>
			<div class="mo-col-logo">
				<div class="mo-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<?php ruya_logo(); ?>
					</a>
				</div>
			</div><!-- End mo-col-logo -->	
			
			<div class="menu_other_v6 hidden-sm hidden-xs">
			   <?php if (isset($ruya_options['menu_other_v6']) && is_array($ruya_options['menu_other_v6']) && in_array('button', $ruya_options['menu_other_v6'])) {  ?>
				  <a class="btn-nav button light hr_light bg_secondary bg_hr_secondary gradient-anim" href="<?php echo esc_url($ruya_options['menu_other_but_link_v6']);?>"><span><?php echo esc_html($ruya_options['menu_other_but_v6']);?></span></a>
			   <?php } ?>
			   <?php if (isset($ruya_options['menu_other_v6']) && is_array($ruya_options['menu_other_v6']) && in_array('search', $ruya_options['menu_other_v6'])) {  ?>
			  	  <div class="mo-search-header"> <a class="search-trigger"><i class="fa fa-search"></i><span class="search_txt"><?php echo esc_html__('search', 'ruya'); ?></span></a> </div>
			   <?php } ?>
			   <?php global $woocommerce;
				if (isset($ruya_options['menu_other_v6']) && is_array($ruya_options['menu_other_v6']) && in_array('cart', $ruya_options['menu_other_v6'])) {  ?>
				<div class="mo_mini_cart">                    
					<div class="mo-cart-header">
						 <a class="mo-icon" href="javascript:void(0)">
							<i class="fa fa-shopping-cart"></i>
							<span class="cart_txt"><?php echo esc_html__('cart', 'ruya'); ?></span>
							<span class="cart_total"><?php $items_count = $woocommerce->cart->cart_contents_count; echo esc_html($items_count); ?></span>
						 </a>
					 </div>
					<div class="mo-cart-content">
					   <h6><?php echo esc_html__('My Shoping Cart', 'ruya'); ?></h6>
					   <div class="widget_shopping_cart_content"></div>
					</div>
				</div>
				<?php } ?>

				<?php if (isset($ruya_options['menu_other_v6']) && is_array($ruya_options['menu_other_v6']) && in_array('social', $ruya_options['menu_other_v6'])) {  ?>
					<ul class="social-header-v6 social_list"><?php ruya_top_social(); ?></ul> 
				<?php } ?>
			   
				<?php if (isset($ruya_options['menu_other_v6']) && is_array($ruya_options['menu_other_v6']) && in_array('lang', $ruya_options['menu_other_v6'])) {  ?>
					<?php lang_link(); ?>
				<?php } ?>
			</div><!-- End menu_other_v6 -->	

			<div class="mo-col-menu">
			<?php
				$attr = array(
					'container_class' => 'mo-menu-list hidden-xs hidden-sm ',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				);
				/* Select menu dynamic */
				$menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
				if($menu_slug != '' && $menu_slug != 'global') {
					$attr['menu'] = $menu_slug;
				}
				/* Select menu position */
				$menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
				$attr['menu_class'] = 'text-center';
				if($menu_class != '' && $menu_class != 'global') {
					$attr['menu_class'] = $menu_class;
				}
				/* Select theme location */
				$menu_locations = get_nav_menu_locations();
				if (!empty($menu_locations['main_navigation'])) {
					$attr['theme_location'] = 'main_navigation';
					wp_nav_menu( $attr );
				} else {
					$attr = array(
						'menu_class'  => 'menu mo-menu-list text-center',
					);
					wp_page_menu($attr);
				} ?>
			</div><!-- End mo-col-menu -->	
		</div><!-- End container -->
	 </div><!-- End mo-header-menu -->
  </div><!-- End mo_header -->
</header><!-- End Header -->

<div class="sidepanel sidepanel_v2 full-nav">
    <a id="menu-close" href="#" class="close-btn"><span></span></a>
    <div class="sidepanel-content"> 
        <div class="sidepanel-left col-md-6 col-xs-12">
             <?php if (isset($ruya_options['sidepanel_content_v2']) && is_array($ruya_options['sidepanel_content_v2']) && in_array('nav', $ruya_options['sidepanel_content_v2'])) {  
	           if (is_active_sidebar("ruya-sidepanel-menu")) { 
				  dynamic_sidebar("ruya-sidepanel-menu"); 
			   } 
			 } ?>
			 <?php if (isset($ruya_options['sidepanel_content_v2']) && is_array($ruya_options['sidepanel_content_v2']) && in_array('social', $ruya_options['sidepanel_content_v2'])) {  ?>
			 <ul class="social_list">
				<?php ruya_top_social(); ?>
			 </ul> 
			<?php } ?>
			
		</div>
		<?php if (isset($ruya_options['sidepanel_content_v2']) && is_array($ruya_options['sidepanel_content_v2']) && in_array('right_sec', $ruya_options['sidepanel_content_v2'])) {  ?>
		   <div class="sidepanel-right col-md-6 col-xs-12">
			<?php if (is_active_sidebar("ruya-sidepanel-info")) { 
				  dynamic_sidebar("ruya-sidepanel-info"); 
			}?>
           </div>
        <?php } ?>
    </div>
</div> <!-- End sidepanel -->

<div class="main-search">
    <div class="main-search-overlay"></div>
    <div class="main-search-container">
        <div class="main-search-close">
            <span></span>
        </div>
        <div class="main-search-content">
            <?php get_search_form(); ?>
        </div>
    </div>
</div> <!-- End main-search -->