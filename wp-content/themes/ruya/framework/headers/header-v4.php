<!-- Start Header -->
<?php 
	global $ruya_options;
	$class_header = 'mo-header-v4';
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($ruya_options['stick_main_menu_v4']) && $ruya_options['stick_main_menu_v4']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
	<div id="mo_header" class="<?php echo esc_attr($class_header); ?>">
		<div class="mo-header-menu">

		    <div class="menu_btn_v4 col-md-4 col-sm-4 hidden-xs">
			 <?php  global $woocommerce;
				if ( isset($ruya_options['menu_btn_v4'])) { 
					if (is_array($ruya_options['menu_btn_v4'])) {
						if ( in_array('cart', $ruya_options['menu_btn_v4'], true)) { ?> 
							<div class="mo_mini_cart">                    
									<div class="mo-cart-header button light hr_dark bg_dark bg_hr_gradient roll">
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
						<?php	}
					}
				} ?>
			 <?php if ( isset($ruya_options['menu_btn_v4']) AND $ruya_options['menu_but_txt_v4'] !=''){ 
					if (is_array($ruya_options['menu_btn_v4'])) {
						if ( in_array('button', $ruya_options['menu_btn_v4'], true)) { ?> 
							<a class="btn-nav button light hr_light bg_gradient bg_hr_primary roll" href="<?php echo esc_url($ruya_options['menu_but_link_v4']);?>"><span><?php echo esc_html($ruya_options['menu_but_txt_v4']);?></span></a>
						<?php	}
					}
				} ?>
			</div><!-- End menu_btn_v4 -->
			
			<div class="mo-col-logo col-md-4 col-sm-4 col-xs-6"><div class="mo-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php ruya_logo(); ?></a></div></div>
			 
			<div class="menu_other_v4 col-md-4 col-sm-4 col-xs-6">
				<div class="header-wrapper">
				  <div class="menu menu-toggle" id="menu-toggle">
					<span class="fr"></span><span class="sec"></span><span class="th"></span><div class="menu-button-text"><?php echo esc_html__('Menu', 'ruya'); ?> </div>
				  </div>
				</div>
				<?php if ( isset($ruya_options['menu_other_v4'])) { 
					if (is_array($ruya_options['menu_other_v4'])) {
						if ( in_array('search', $ruya_options['menu_other_v4'], true)) { ?> 
							 <div class="mo-search-header"><a class="search-trigger"><i class="fa fa-search"></i></a></div>
						<?php	}
					}
				} ?>
				<?php if ( isset($ruya_options['menu_other_v4'])) { 
					if (is_array($ruya_options['menu_other_v4'])) {
						if ( in_array('lang', $ruya_options['menu_other_v4'], true)) { ?> 
							<?php lang_link(); ?>
						<?php	}
					}
				} ?>
		   </div> <!-- End menu_other_v4 -->
                  
	  </div><!-- End mo-header-menu -->
   </div><!-- End mo_header -->
</header>


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
 
<div class="menu-sidepanel">
    <nav>
	   <?php $attr = array(
			'container_class' => 'mo-menu-list',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		);
		/* Select menu dynamic */
		$menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
		if($menu_slug != '' && $menu_slug != 'global') {
			$attr['menu'] = $menu_slug;
		}
		/* Select menu position */
		$menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
		$attr['menu_class'] = 'text-left';
		if($menu_class != '' && $menu_class != 'global') {
			$attr['menu_class'] = $menu_class;
		}
		/* Select theme location */
		$menu_locations = get_nav_menu_locations();
		if (!empty($menu_locations['main_navigation'])) {
			$attr['theme_location'] = 'main_navigation';
		}
		wp_nav_menu( $attr ); ?>
	</nav>
	
	<?php if (isset($ruya_options['menu_other_v4']) && in_array('social', $ruya_options['menu_other_v4'])) {  ?>
	<ul class="social-header-v4 social_list">
		<?php ruya_top_social(); ?>
	</ul> 
   <?php } ?>
</div>