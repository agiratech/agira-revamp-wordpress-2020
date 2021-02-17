<?php
    vc_map(array(
        "name" => esc_html__("Product Grid", 'ruya'),
        "base" => "products_grid",
        "class" => "tb-products-grid",
        "category" => esc_html__('Extra Elements', 'ruya'),
        "icon" => "tb-icon-for-vc fa fa-cart-plus",
        "params" => array(
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Template", 'ruya'),
                "param_name" => "tpl",
                "value" => array(
					"Template 1" => "tpl1",
					"Template 2" => "tpl2"
                ),
                "description" => esc_html__('Select template in this elment.', 'ruya')
            ),
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Columns", 'ruya'),
                "param_name" => "columns",
                "value" => array(
                    "4 Columns" => "4",
                    "3 Columns" => "3",
                    "2 Columns" => "2",
                    "1 Column" => "1",
                ),
				"description" => esc_html__('Select columns in this elment.', 'ruya')
            ),
			array(
                "type" => "checkbox",
                "heading" => esc_html__('Show Pagination', 'ruya'),
                "param_name" => "show_pagination",
                "value" => array(
                    esc_html__("Yes, please", 'ruya') => 1
                ),
                "description" => esc_html__('Show or hide pagination in this element.', 'ruya')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Extra Class", 'ruya'),
                "param_name" => "el_class",
                "value" => "",
				"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'ruya' )
            ),
			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__( "Show", 'ruya' ),
					"param_name" => "show",
					"value" => array (
							"All Products" => "all_products",
							"Featured Products" => "featured",
							"On-sale Products" => "onsale",
					),
					"group" => esc_html__("Build Query", 'ruya'),
					"description" => esc_html__( "Select show product type in this elment", 'ruya' )
			),
		    array (
				"type" => "mo_taxonomy",
				"taxonomy" => "product_cat",
				"heading" => esc_html__( "Categories", 'ruya' ),
				"param_name" => "category",
					"group" => esc_html__("Build Query", 'ruya'),
				"description" => esc_html__( "Note: By default, all your team will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'ruya' )
		   ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Product Count", 'ruya'),
                "param_name" => "number",
                "value" => "",
				"group" => esc_html__("Build Query", 'ruya'),
				"description" => esc_html__('Please, enter number of post per page. Show all: -1.', 'ruya')
            ),
			array(
                "type" => "checkbox",
                "heading" => esc_html__('Hide Free', 'ruya'),
                "param_name" => "hide_free",
                "value" => array(
                    esc_html__("Yes, please", 'ruya') => 1
                ),
				"group" => esc_html__("Build Query", 'ruya'),
                "description" => esc_html__('Hide free product in this element.', 'ruya')
            ),
			array(
                "type" => "checkbox",
                "heading" => esc_html__('Show Hidden', 'ruya'),
                "param_name" => "show_hidden",
                "value" => array(
                    esc_html__("Yes, please", 'ruya') => 1
                ),
				"group" => esc_html__("Build Query", 'ruya'),
                "description" => esc_html__('Show Hidden product in this element.', 'ruya')
            ),
            array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Order by', 'ruya' ),
				"param_name" => "orderby",
				"value" => array (
						"None" => "none",
						"Date" => "date",
						"Price" => "price",
						"Random" => "rand",
						"Selling" => "selling",
						"Rated" => "rated",
				),
				"group" => esc_html__("Build Query", 'ruya'),
				"description" => esc_html__( 'Order by ("none", "date", "price", "rand", "selling", "rated") in this element.', 'ruya' )
			),
            array(
                "type" => "dropdown",
                "heading" => esc_html__('Order', 'ruya'),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
				"group" => esc_html__("Build Query", 'ruya'),
                "description" => esc_html__('Order ("None", "Asc", "Desc") in this element.', 'ruya')
            ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Excerpt Length", 'ruya'),
				"param_name" => "excerpt_lenght",
				"value" => "",
				"group" => esc_html__("Template", 'ruya'),
				"description" => esc_html__("Please, Enter number excerpt lenght of post in this element. Default: 11", 'ruya')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Excerpt More", 'ruya'),
				"param_name" => "excerpt_more",
				"value" => "",
				"group" => esc_html__("Template", 'ruya'),
				"description" => esc_html__("Please, Enter text excerpt more of post in this element. Default: . ", 'ruya')
			),
        )
    ));
