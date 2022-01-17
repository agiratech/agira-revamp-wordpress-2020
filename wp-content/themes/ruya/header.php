<!DOCTYPE html>
<html <?php language_attributes('html'); ?>>
<head>
	<meta name="robots" content="noindex">
    <meta charset="<?php echo esc_attr( get_bloginfo('charset') ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <?php global $ruya_options;
	if ( ! ( function_exists('has_site_icon') && has_site_icon() ) ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=$ruya_options["favicon"]; echo esc_url($favicon['url']); ?>" type="image/x-icon">
	<?php } wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
	<?php $page_loader = (isset($ruya_options["page_loader"])&&$ruya_options["page_loader"])?$ruya_options["page_loader"]: false;
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
<?php ruya_header(); ?>
	<div id="feedback-form" class="feedback-form">
    <a class="feedback-form-btn btn button light hr_light bg_gradient bg_hr_primary large radius0 btn-lg" id="OpenForm">Contact Us</a>
    <div class="feedback_form_area">
		<div class="feedback_form_area_inner">	<span class="closeform"><a class="toggleclose">&times;</a></span>
    <?php echo do_shortcode('[contact-form-7 id="132569" title="Say Hello Form"]'); ?>
    </div>
    </div>
    
    </div>
	<script type="text/javascript">
	   jQuery(document).ready(function(){
       jQuery("#OpenForm").click(function(){
            jQuery(".feedback_form_area").animate({
                width: "toggle"
            });
		   jQuery(this).hide();
        });
    });
    jQuery(document).ready(function(){
      jQuery(".toggleclose").click(function(){
          jQuery(".feedback_form_area").animate({
              width: "toggle"
          });
		  jQuery("#OpenForm").show();
      });
  });
				function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
	</script>
