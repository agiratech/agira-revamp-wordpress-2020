<?php
function ruya_image_box($params) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'ruya_template' => 'image-box-style1',
        'image' => '',
        'title_box' => '',
		'sup_title_box' => '',
		'content_box' => '',
		'txt_link_box' => 'Read More',
		'link_box' => ' ',
		'direction' => 'left',
		'box_bg_color' => 'bg_primary',
        'el_class' => ''
    ), $params));
	$template_class = $ruya_template ;
	$class = array();
    $class[] = 'image-box';
	$class[] = $el_class;
    $class[] = $template_class;
	$attachment_image = wp_get_attachment_image_src($image, 'full', false); 
	//link 
	//link 
	$link_button = null;
    if ($link_box !== '') { $link_button = vc_build_link($link_box); }
    if ( strlen( $link_button['url'] ) > 0 ) {
        $href = $link_button['url'];
    } else{ $href = ''; }
	$target = (empty($link_button['target'])) ? '_self' : $link_button['target'];
	
    ob_start(); ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
        <?php include $template_class.'.php'; ?>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('ruya_shortcode')) { ruya_shortcode('image_box', 'ruya_image_box'); }