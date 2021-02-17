<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
<head>
    <meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php
	global $ruya_options;
	if ( ! ( function_exists('has_site_icon') && has_site_icon() ) ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=$ruya_options["favicon"]; echo esc_url($favicon['url']); ?>" type="image/x-icon">
	<?php } 
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
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
