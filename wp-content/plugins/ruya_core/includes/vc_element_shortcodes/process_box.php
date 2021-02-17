<?php
$url = RUYA_URI . '/assets/img/process-box/';
vc_map(array(
	"name" => esc_html__("process Box", 'ruya'),
	"base" => "process_box",
	"category" => esc_html__('Extra Elements', 'ruya'),
	"icon" => "tb-icon-for-vc fa fa-line-chart",
	"params" => array(
	   	   array(
			'type'       => 'select_preview',
			'param_name' => 'ruya_template',
			'heading'    => esc_html__('Style', 'ruya'),
	        'group'      => esc_html__("Template", 'ruya'),
			'value'      => array(
				array(
					'value' => 'process-box-style1',
					'label' => esc_html__('style1', 'ruya'),
					'image' => $url . 'style1.jpg'
				),
				array(
	                'value' => 'process-box-style2',
					'label' => esc_html__('style2', 'ruya'),
					'image' => $url . 'style2.jpg'
				),
				array(
	                'value' => 'process-box-style3',
					'label' => esc_html__('style3', 'ruya'),
					'image' => $url . 'style3.jpg'
				),
			),
			'save_always' => true,
		),
	    array(
			"type" => "textfield",
			"heading" => esc_html__("Number Step", 'ruya'),
			"param_name" => "number_step",
	 		"description" => esc_html__("Please, enter title in this element.", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6'
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"heading" => esc_html__("Title", 'ruya'),
			"param_name" => "title",
			"description" => esc_html__("Please, enter title in this element.", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6'
		),
		array(
			"type" => "textarea_html",
			"heading" => esc_html__("Description", 'ruya'),
			"param_name" => "content",
			"description" => esc_html__("Please, enter description in this element.", 'ruya')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Link", 'ruya'),
			"param_name" => "link",
			"description" => esc_html__("Please, enter link in this element.", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6'
		),
	   array(
			"type" => "textfield",
			"heading" => esc_html__("Text link", 'ruya'),
			"param_name" => "txt_link",
			"description" => esc_html__("Please, enter text link in this element.", 'ruya'),
	        'edit_field_class' => 'vc_col-sm-6'
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class", 'ruya'),
			"param_name" => "el_class",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
		),
	)
));