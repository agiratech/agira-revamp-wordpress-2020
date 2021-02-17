<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
	global $ruya_options;
	if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=$ruya_options["favicon"]; echo esc_url($favicon['url']); ?>" type="image/x-icon">
	<?php } 
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper wrapper-left-navigation">
	<?php
		$page_loader = (isset($ruya_options["page_loader"])&&$ruya_options["page_loader"])?$ruya_options["page_loader"]: false;
		if (isset($ruya_options['tb_logo_white']['url']) && $ruya_options['tb_logo_white']['url'] != ""){ 
			$logo_white = $ruya_options['tb_logo_white']['url'];
		};
		if($page_loader){ ?>
		 <div class="loading animated">
			<div class="loading-wrap animated bounceInLeft">
				 <?php if(!empty($logo_white)) {
				  echo '<img class="logotype" src="'.esc_url($logo_white).'" alt="'.esc_attr__('logo','ruya').'" />';
				} ?>
			</div>
		 </div>
		<?php } ?>
	<?php ruya_cursor(); ?>
  
		<!-- Start Header -->
		<?php $class_header = 'mo-left-navigation';	?>
		<header class="mo-wrapper-leftnav">
			<div id="mo_header" class="<?php echo esc_attr($class_header); ?>"><!-- mo-header-stick/mo-header-fixed -->
				<!-- Start Header Menu -->
				<div class="mo-header-menu">
					<div class="mo-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<?php ruya_logo(); ?>
						</a>
					</div>
                    <div class="scroll-pane">
					<?php
						$attr = array(
							'container_class' => 'mo-menu-list',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
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
						wp_nav_menu( $attr );
					?>
					</div>
                   
                    <?php $switch_header_social_lnav =& $ruya_options["switch_social_lnav"];
                    if($switch_header_social_lnav == 1){ ?>
                    <ul class="nav social-header-lnav hidden-sm hidden-xs">
						 <?php if(isset($ruya_options['facebook_url']) AND $ruya_options['facebook_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($ruya_options['facebook_url']);?>" title="<?php echo esc_attr_e('facebook','ruya'); ?>" ><i class="fa fa-facebook"></i></a></li>
						 <?php endif; 
						  if(isset($ruya_options['twitter_url']) AND $ruya_options['twitter_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($ruya_options['twitter_url']);?>"  title="<?php echo esc_attr_e('twitter','ruya'); ?>"><i class="fa fa-twitter"></i></a></li>
						 <?php endif; 
						  if(isset($ruya_options['linkedin_url']) AND $ruya_options['linkedin_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($ruya_options['linkedin_url']);?>" title="<?php echo esc_attr_e('linkedin','ruya'); ?>"><i class="fa fa-linkedin"></i></a></li>
						 <?php endif; 
						 if(isset($ruya_options['youtube_url']) AND $ruya_options['youtube_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($ruya_options['youtube_url']);?>" title="<?php echo esc_attr_e('youtube','ruya'); ?>"><i class="fa fa-youtube"></i></a></li>
						 <?php endif; 
						 if(isset($ruya_options['instagram_url']) AND $ruya_options['instagram_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($ruya_options['instagram_url']);?>" title="<?php echo esc_attr_e('instagram','ruya'); ?>"><i class="fa fa-instagram"></i></a></li>
						 <?php endif;
						 if(isset($ruya_options['pinterest_url']) AND $ruya_options['pinterest_url'] !=''): ?>
						 <li><a href="<?php echo esc_url($ruya_options['pinterest_url']);?>" title="<?php echo esc_attr_e('pinterest','ruya'); ?>"><i class="fa fa-pinterest"></i></a></li>
						 <?php endif; ?>    
                    </ul>
                   <?php } ?>
                   
                   <?php if(isset($ruya_options['copyright_txt_lnav']) AND $ruya_options['copyright_txt_lnav'] !=''): ?>
					   <div class="copyright_txt_lnav hidden-sm hidden-xs"><?php echo wptexturize($ruya_options['copyright_txt_lnav']);?></div>
				  <?php endif; ?>
				</div>
				<!-- End Header Menu -->
			</div>
		</header>