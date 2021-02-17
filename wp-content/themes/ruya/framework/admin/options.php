<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    $opt_name = "ruya_options";
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
		'menu_type'            => 'submenu',
        'menu_title'           => esc_html__( 'Theme Options', 'ruya' ),
		'page_title'           => esc_html__( 'Theme Options', 'ruya' ),
        'google_api_key'       => '',
		'google_update_weekly' => false,
		'async_typography'     => true,
        'admin_bar'            => true,
        'dev_mode'             => false,
		'update_notice'        => false,
		'show_options_object'  => false,
		'customizer'           => false, 
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'show_import_export'   => true,
        'output'               => true,
    );
    Redux::setArgs( $opt_name, $args );
	// -> START General
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'General', 'ruya' ),
		'icon'   => 'el-icon-cogs',
		'fields' => array(
			array(
                'id'       => 'body_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Layout', 'ruya' ),
                'subtitle' => esc_html__( 'Body layout with wide or boxed.', 'ruya' ),
                'options'  => array(
					'wide' => esc_html__( 'Wide', 'ruya' ),
                    'boxed'=> esc_html__( 'Boxed', 'ruya' ),
					'lines'=> esc_html__( 'lines', 'ruya' ),
		            'shapes'=> esc_html__( 'Shapes', 'ruya' ),
                ),
                'default'  => esc_html__( 'wide', 'ruya' ),
            ),
		   array(
				'id' => 'container_width',
				'title' => 'Container Width',
		        'subtitle' => esc_html__('in pixels.', 'ruya'),
				'type' => 'dimensions',
			    'units' => array('px'),
				'height' => false,
				'default' => array(
	            	'units' => 'px',
				    'width' => '1440px'
				)
			),
			array(
				'id'       => 'page_loader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Loader', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable page loader.', 'ruya' ),
				'default'  => true,
			),
		    array(
                'id'       => 'lazy_load',
                'type'     => 'switch',
                'title'    => esc_html__( 'Lazy Load', 'ruya' ),
                'subtitle' => esc_html__( 'Enable/Disable lazy load images.', 'ruya' ),
                'default'  => false,
            ),
		    array(
				'id'       => 'select_cursor',
				'type'     => 'select',
				'title'    => esc_html__( 'Mouse Cursor', 'ruya' ),
				'subtitle' => esc_html__( 'Select your mouse cursor style.', 'ruya' ),
				'options'  => array(
		              'normal' => esc_html__( 'Default', 'ruya' ), 
		              'style1' => esc_html__( 'Style1', 'ruya' ), 
					  'style2' => esc_html__( 'Style2', 'ruya' ),
		              'style3' => esc_html__( 'Style3', 'ruya' ),
				  ),
				'default'  => 'normal',
			),
		 )
	) );
	// -> START Color
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Color', 'ruya' ),
        'id'     => 'color',
        'icon'   => 'el el-brush',
		'fields' => array(
			array(
				'id'       => 'th_select_stylesheet',
				'type'     => 'select',
				'title'    => esc_html__( 'Theme Stylesheet', 'ruya' ),
				'subtitle' => esc_html__( 'Select your themes alternative color scheme.', 'ruya' ),
				'options'  => array(
		              ''            =>  esc_html__( 'default', 'ruya' ),
		              'blue.css'    =>  esc_html__( 'Blue', 'ruya' ),
		              'darkblue.css'=>  esc_html__( 'Dark Blue', 'ruya' ),
		              'purple.css'  =>  esc_html__( 'Purple', 'ruya' ),
		              'rose.css'    =>  esc_html__( 'Rose', 'ruya' ),
					  'red.css'     =>  esc_html__( 'Red', 'ruya' ),
		              'orange.css'  =>  esc_html__( 'Orange', 'ruya' ),
					  'gold.css'    =>  esc_html__( 'Gold', 'ruya' ),
				  ),
		         'default'  => '',
			),
			array(
				'id'       => 'th_primary_color',
				'type'     => 'color',
				'title'    => esc_html__('primary color', 'ruya'),
				'subtitle' => esc_html__('Controls primary color items. (default: #4208bc).', 'ruya'),
				'default'  => '',
				'validate' => 'color',
			),
		array(
				'id'       => 'th_secondary_color',
				'type'     => 'color',
				'title'    => esc_html__('secondary color', 'ruya'),
				'subtitle' => esc_html__('Control secondary color items. (default: #7141f9).', 'ruya'),
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'body_background',
				'type'     => 'background',
				'title'    => esc_html__('Body Background', 'ruya'),
				'subtitle' => esc_html__('Body background with image, color, etc.', 'ruya'),
				'output'      => array('body , .main-content , .internal-content'),
		        'default'  => array(
					'background-color' => '#fff',
				),
			),
		 )
    ) );
	
	// -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'ruya' ),
        'id'     => 'typography',
		'icon'   => 'el el-font',
        'fields' => array(
            array(
				'id'          => 'body_font',
				'type'        => 'typography', 
				'title'       => esc_html__('Body Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#5b6674', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '30px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'h1_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H1 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h1'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#000', 
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '54px',
					'line-height' => '48px'
				),
			),
			array(
				'id'          => 'h2_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H2 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h2'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#000', 
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '42px', 
					'line-height' => '48px'
				),
			),
			array(
				'id'          => 'h3_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H3 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h3'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#000', 
					'font-weight' => '700',  
					'font-family' => 'Roboto',
					'google'      => true,
					'font-size'   => '36px', 
					'line-height' => '42px'
				),
			),
			array(
				'id'          => 'h4_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H4 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h4'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#000', 
					'font-weight' => '700',  
					'font-family' => 'Roboto', 
					'google'      => true,
					'font-size'   => '30px', 
					'line-height' => '36px',
				),
			),
			array(
				'id'          => 'h5_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H5 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h5'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#000', 
					'font-weight' => '700',  
					'font-family' => 'Roboto', 
					'google'      => true,
					'font-size'   => '24px', 
					'line-height' => '30px',
				),
			),
			array(
				'id'          => 'h6_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H6 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h6'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#000', 
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '18px', 
					'line-height' => '24px',
				),
			),
        )
    ) );
	
	// -> START Logo
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Logo', 'ruya' ),
        'id'     => 'logo',
		'desc'   => esc_html__( '', 'ruya' ),
        'icon'   => 'el el-icon-viadeo',
		'fields' => array(
			array(
				'id'       => 'tb_logo',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__('Logo', 'ruya'),
				'subtitle' => esc_html__('Select an image file for your logo.', 'ruya'),
				'default'  => array('url'	=> RUYA_URI_PATH.'/assets/images/logo.svg'),
			),
		   array(
				'id'       => 'tb_logo_white',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__('Logo white', 'ruya'),
				'subtitle' => esc_html__('Select an image file for your white logo.', 'ruya'),
				'default'  => array('url'	=> RUYA_URI_PATH.'/assets/images/logo-white.svg'),
			),
			array(
				'subtitle' => esc_html__('in pixels.', 'ruya'),
				'id' => 'logo_height',
				'title' => 'Logo Height',
				'type' => 'dimensions',
			    'units' => array('px'),
				'width' => false,
				'output' => array('.mo-header-v1 .logo img , .mo-header-v2 .mo-logo img , .navigation img.logo , .mo-header-v4 .mo-logo img , .mo-header-v5 .mo-logo img , .mo-header-v6 .mo-logo img , .mo-header-onepage .mo-logo img, .mo-left-navigation .mo-header-menu .mo-logo img, .navigation img.Logo_white, .navigation .logo.logo_page, .loading-wrap .logotype'),
				'default' => array(
	            	'units' => 'px',
				   'height' => '35px'
				)
			),
			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Custom favicon', 'ruya' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Upload a 16px x 16px png/ico image that will represent your website\'s favicon', 'ruya' ),
				'default'  => array( 'url' => RUYA_URI_PATH.'/assets/images/favicon.ico' ),
			),
			
		)
    ) );
	
	// -> START Header
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'ruya' ),
        'id'     => 'header',
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_header_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Header Layout', 'ruya'),
				'subtitle' => esc_html__('Select header layout in your site.', 'ruya'),
				'options'  => array(
					'sidepanel'	=> array(
						'alt'   => 'Header V1',
						'img'   => RUYA_URI_PATH.'/assets/images/headers/header-v1.png'
					),
					'header-v2'	=> array(
						'alt'   => 'Header V2',
						'img'   => RUYA_URI_PATH.'/assets/images/headers/header-v2.png'
					),
					'header-v3'	=> array(
						'alt'   => 'Header V3',
						'img'   => RUYA_URI_PATH.'/assets/images/headers/header-v3.png'
					),
					'header-v4'	=> array(
						'alt'   => 'Header V4',
						'img'   => RUYA_URI_PATH.'/assets/images/headers/header-v4.png'
					),
					'header-v5'	=> array(
						'alt'   => 'Header V5',
						'img'   => RUYA_URI_PATH.'/assets/images/headers/header-v5.png'
					),
					'header-v6'	=> array(
						'alt'   => 'Header V6',
						'img'   => RUYA_URI_PATH.'/assets/images/headers/header-v6.png'
					),
		            'header-v7'	=> array(
						'alt'   => 'Header V7',
						'img'   => RUYA_URI_PATH.'/assets/images/headers/header-v7.png'
					),
				),
				'default' => 'header-v2'
			),
		)
    ) );
	
		// -> START Main Menu
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu', 'ruya' ),
        'id'     => 'main_menu',
        'icon'   => 'el el-icon-list',
    ) );
	
	// -> START Main Menu Header V1
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V1', 'ruya' ),
        'id'     => 'main_menu_v1',
        'subsection' => true,
		'fields' => array(
		    array(
				'id'       => 'fixed_main_menu_v1',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed Menu', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable fixed menu.', 'ruya' ),
				'default'  => false,
			),
		   array(
                'id'       => 'layout_menu_v1',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Layout', 'ruya' ),
                'subtitle' => esc_html__( 'Body layout with wide or boxed.', 'ruya' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'ruya' ),
                    'right'=> esc_html__( 'Right', 'ruya' ),
                ),
                'default'  => 'left'
            ),
			array(
				'id'          => 'menu_first_level',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v1 .nav-sidepanel > ul > li > a, .mo-header-v1 .nav-sidepanel > ul ul li a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-family' => 'Roboto',  
					'google'      => true,
					'line-height' => '68px',
		            'font-size'   => '62px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_v1',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: transparent).', 'ruya'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.mo-header-v1 .menu-toggle'),
			),
			array(
				'id'       => 'switch_social_v1',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable social icons on nav bar', 'ruya' ),
				'desc'     => esc_html__( 'It\'s work only if is enabled canvas menu style', 'ruya' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
		     array(
				'id'       => 'text_v1',
				'type'     => 'text',
				'title'    => esc_html__('text', 'ruya'),
				'subtitle' => esc_html__('Please, Enter text menu.', 'ruya'),
			),
		)
    ) );
	
	// -> START Main Menu Header V2
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V2', 'ruya' ),
        'id'     => 'main_menu_v2',
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'stick_main_menu_v2',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'          => 'menu_first_level_v2',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v2 .mo-menu-list > ul > li > a , .mo-header-v2 .mo-search-sidebar > a , .mo-header-v2 .select-languages > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#000',
					'font-family' => 'Nunito Sans',    
					'google'      => true,
		            'line-height' => '20px',
		            'font-size'   => '15px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_v2',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default:#fff).', 'ruya'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-header-v2 .mo-header-menu'),
			),
		    array(
				'id'          => 'menu_sub_level_v2',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, .mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a, .mo-header-v2 .mo-cart-content .total, .mo-header-v2 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a, .mo-header-v2 .mo-cart-header > a, .mo-header-v2 .mo-search-header > a, .mo-header-v2 .mo-cart-content .quantity, .mo-header-v2 .select-languages ul a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0',
				),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v2',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default:#171a1d).', 'ruya'),
				'default'  => array(
					'background-color' => '#041026',
				),
				'output'   => array('.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul,
									.mo-header-v2 .mo-cart-content , .mo-header-v2 .header_search, .mo-header-v2 .select-languages ul'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v2',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default:#fff).', 'ruya'),
				'default'  => array(
					'background-color' => 'rgba(255, 255, 255, 0.946);',
				),
				'output'   => array('.mo-stick-active .mo-header-v2.mo-header-stick .mo-header-menu'),
				'required' => array('stick_main_menu_v2','=', true),
			),
			array(
				'id'=>'menu_other_v2',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'ruya'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'ruya'), 
		            'cart'      => esc_html__('Cart', 'ruya'),
		            'search'    => esc_html__('Search', 'ruya'),
				),
				'default' => array('search'),                            
			),
		      array(
				'id'       => 'sidepanelv2',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sidepanel', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable Sidepanel.', 'ruya' ),
				'default'  => true,
			),
	     )
    ) );
	// -> START Main Menu Header V3
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V3', 'ruya' ),
        'id'     => 'main_menu_v3',
        'subsection' => true,
		'fields' => array(
		    array(
				'subtitle' => esc_html__('in pixels.', 'ruya'),
				'id' => 'menu_height_v3',
				'title' => 'Menu Height',
				'type' => 'dimensions',
			    'units' => array('px'),
				'width' => false,
				'output' => array('.navigation'),
				'default' => array(
	            	'units' => 'px',
				   'height' => '100px'
				)
			),
		    array(
				'id'       => 'bg_main_menu_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: transparent).', 'ruya'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.mo-header-v3 .mo-header-menu'),
			),
		    array(
                'id'       => 'menu_first_level_color_v3',
                'type'     => 'button_set',
                'title'    => esc_html__('Menu Color Mode ', 'ruya'),
                'options'  => array(
                    'color-white'=> esc_html__( 'White', 'ruya' ), 
                    'color-dark' => esc_html__( 'Dark', 'ruya' ),
                ),
                'default'  => 'color-white'
            ),
			array(
				'id'          => 'menu_first_level_v3',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v3 .mo-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '',
					'font-family' => 'Roboto', 
					'google'      => true,
			        'line-height' => '65px',
	            	'font-size'   => '15px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
	           ),
			),
		   array(
				'id'       => 'bg_main_menu_sub_level_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #041026 ).', 'ruya'),
				'default'  => array(
					'background-color' => '#041026',
				),
				'output'   => array('.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li >ul'),
		   ),
		   array(
				'id'          => 'menu_sub_level_v3',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
					.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
					.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
					.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
					.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
					.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
					.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'),
		  ),
		   array(
				'id'       => 'fixed_main_menu_v3',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed Menu', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable fixed menu.', 'ruya' ),
				'default'  => false,
		  ),
		   array(
				'id' => 'menu_stick_height_v3',
				'title' => 'Stick Menu Height',
				'subtitle' => esc_html__('in pixels.', 'ruya'),
				'type' => 'dimensions',
			    'units' => array('px'),
				'width' => false,
				'output' => array('.mo-stick-active .mo-header-v3.mo-header-stick .mo-header-menu .navigation'),
				'default' => array(
	            	'units' => 'px',
				   'height' => '70px'
				),
	        	'required' => array('fixed_main_menu_v3','=', true),
			),
		    array(
				'id'       => 'bg_main_menu_stick_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background fixed menu', 'ruya'),
				'subtitle' => esc_html__('Controls background fixed menu color (default: transparent).', 'ruya'),
				'default'  => array(
					'background-color' => 'rgba(255, 255, 255, 0.946)',
				),
				'required' => array('fixed_main_menu_v3','=', true),
				'output'   => array('.mo-stick-active .mo-header-v3.mo-header-stick .mo-header-menu'),
			),
		    array(
                'id'       => 'menu_first_level_color_stick_v3',
                'type'     => 'button_set',
                'title'    => esc_html__('First Level Font Options', 'ruya'),
                'subtitle' => esc_html__('Typography color option.', 'ruya'),
		        'required' => array('fixed_main_menu_v3','=', true),
                'options'  => array(
                    'color-stick-white'=> esc_html__( 'White', 'ruya' ),
                    'color-stick-dark' => esc_html__( 'Dark', 'ruya' ),
                ),
                'default'  => 'color-stick-dark'
            ),
		)
    ) );
	// -> START Main Menu Header V4
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V4', 'ruya' ),
        'id'     => 'main_menu_v4',
        'subsection' => true,
		'fields' => array(
		    array(
				'subtitle' => esc_html__('in pixels.', 'ruya'),
				'id' => 'menu_height_v4',
				'title' => 'Menu Height',
				'type' => 'dimensions',
			    'units' => array('px'),
				'width' => false,
				'output' => array('.mo-header-v4 .mo-header-menu'),
				'default' => array(
	            	'units' => 'px',
				    'height' => '80px'
				)
			),
		    array(
				'id'       => 'bg_main_menu_v4',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default:transparent).', 'ruya'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-header-v4 .mo-header-top , .mo-header-v4 .mo-header-menu , .mo-header-v4 #lang > ul li > ul'),
			),
			array(
				'id'          => 'menu_first_level_v4',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.menu-sidepanel .mo-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'line-height' => '39px',
		            'font-size'   => '36px',
		            'font-weight' => '700',  
					'letter-spacing' => '-1'
				),
			),
			array(
				'id'          => 'menu_sub_level_v4',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.menu-sidepanel .mo-menu-list > ul > li.menu-item-has-children > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
			),
		    array(
				'id'       => 'stick_main_menu_v4',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'ruya' ),
				'default'  => false,
			),
			array(
				'id'       => 'bg_stick_main_menu_v4',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'ruya'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-stick-active .mo-header-v4.mo-header-stick .mo-header-menu'),
				'required' => array('stick_main_menu_v4','=', true),
			),
		     array(
				'id'=>'menu_other_v4',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right', 'ruya'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'ruya'),    
					'social'    => esc_html__('Social', 'ruya'),
					'search'    => esc_html__('Search', 'ruya')
				),
				'default' => array('social', 'lang'),                            
			 ),
		     array(
				'id'=>'menu_btn_v4',
				'type' => 'button_set',
				'title' => esc_html__('Menu Left', 'ruya'),
				'multi' => true,
				'options'=> array(
					'cart'      => esc_html__('Cart', 'ruya'),
		            'button'    => esc_html__('Button', 'ruya'),
				),
				'default' => array('button'),                            
			 ),
		     array(
				'id'       => 'menu_but_txt_v4',
				'type'     => 'text',
				'title'    => esc_html__('Menu Left Button', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button name.', 'ruya'),
				'required' => array('menu_btn_v4','=', 'button'),
		        'default'  => 'Contact Us',     
			),
		    array(
				'id'       => 'menu_but_link_v4',
				'type'     => 'text',
				'title'    => esc_html__('Menu Left Button Link', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button link.', 'ruya'),
				'required' => array('menu_btn_v4','=', 'button'),
				'default'  => '#',     
			),
		)
    ) );
		
	// -> START Main Menu Header V5
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V5', 'ruya' ),
        'id'     => 'main_menu_v5',
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'bg_main_menu_v5',
				'type'     => 'background',
				'title'    => esc_html__('Menu Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: transparent).', 'ruya'),
				'default'  => array(
					'background-color' => 'transparent',
				), 
				'output'   => array('.mo-header-v5 .mo-header-menu'),
			),
		    array(
				'id'          => 'menu_first_level_v5',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v5 .mo-menu-list > ul > li > a , .mo-header-v5 .select-languages > a , .mo-header-v5 .mo-search-header > a, .mo-header-v5 .mo-cart-header > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-family' => 'Nunito Sans', 
					'google'      => true,
		 			'line-height' => '80px',
		            'font-size'   => '15px',
		            'font-weight' => '700',  
					'letter-spacing' => '0'
				),
			),
		    array(
				'id'       => 'bg_main_menu_sub_level_v5',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #868686).', 'ruya'),
				'default'  => array(
					'background-color' => '#041026',
				),
				'output'   => array('.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
								    .mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul,
									.mo-header-v5 .mo-cart-content , .mo-header-v5 .header_search
									'),
			),
		    array(
				'id'          => 'menu_sub_level_v5',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v5 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a, 
										.mo-header-v5 .mo-cart-content .total , .mo-header-v5 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a
										'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
		   ),
		   array(
				'id'       => 'stick_main_menu_v5',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'ruya' ),
				'default'  => false,
			),
			array(
				'id'       => 'bg_stick_menu_v5',
				'type'     => 'background',
				'title'    => esc_html__('Stick Menu Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #fff.', 'ruya'),
				'default'  => array(
					'background-color' => '#fff',
				), 
				'output'   => array('.mo-stick-active .mo-header-v5.mo-header-stick .mo-header-menu:before'),
				'required' => array('stick_main_menu_v5','=', true),
			),
		    array(
				'id'=>'menu_other_v5',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'ruya'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'ruya'),    
					'social'    => esc_html__('Social', 'ruya'),
					'search'    => esc_html__('Search', 'ruya'),
					'cart'      => esc_html__('Cart', 'ruya'),
					'sidepanel' => esc_html__('Sidepanel', 'ruya'),
					'button'    => esc_html__('Button', 'ruya'),
				),
				'default' => array('search','sidepanel','cart'),                            
			 ),
		     array(
				'id'       => 'menu_other_but_v5',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button name.', 'ruya'),
				'required' => array('menu_other_v5','=', 'button')
			),
		    array(
				'id'       => 'menu_other_but_link_v5',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button Link', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button link.', 'ruya'),
				'required' => array('menu_other_v5','=', 'button')
			),
		 )
    ) );
	
	// -> START Main Menu Header V6
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V6', 'ruya' ),
        'id'     => 'main_menu_v6',
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'stick_main_menu_v6',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'ruya' ),
				'default'  => true,
			),
		    array(
				'id'       => 'bg_main_menu_v6',
				'type'     => 'background',
				'title'    => esc_html__('Background Main Menu', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default:transparent ).', 'ruya'),
				'default'  => array(
					'background-color' => 'transparent',
				), 
				'output'   => array('.mo-header-v6 .mo-header-menu , .mo-header-v6 .mo-header-top.t_motivo , .mo-header-v6 #lang > ul li > ul'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v6',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #041026).', 'ruya'),
				'default'  => array(
					'background-color' => '#041026',
				),
				'output'   => array('.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									 .mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									 .mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									 .mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul,
									 .mo-header-v6 .header_search , .mo-header-v6 .mo-cart-content
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v6',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default:rgba(0,0,0,0.7) ).', 'ruya'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-stick-active .mo-header-v6.mo-header-stick .mo-header-menu , .mo-stick-active .mo-header-v6.mo-header-stick .mo-header-top.t_motivo , .mo-stick-active .mo-header-v6.mo-header-stick #lang > ul li > ul'),
				'required' => array('stick_main_menu_v6','=', true),
			),
			array(
				'id'          => 'menu_first_level_v6',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v6 .mo-menu-list > ul > li > a , .mo-header-v6 .mo-search-header > a , .mo-header-v6 .mo-cart-header > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => "Nunito Sans", 
					'google'      => true,
					'font-size'   => '15px', 
					'line-height' => '20px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level_v6',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v6 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a,
										.mo-header-v6 .mo-cart-content .total , .mo-header-v6 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a 
										'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'=>'menu_other_v6',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'ruya'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'ruya'),    
					'social'    => esc_html__('Social', 'ruya'),
					'search'    => esc_html__('Search', 'ruya'),
					'cart'      => esc_html__('Cart', 'ruya'),
					'sidepanel' => esc_html__('Sidepanel', 'ruya'),
					'button'    => esc_html__('Button', 'ruya'),
				),
		        'default' => array( 'sidepanel'),              
			 ),
		     array(
				'id'       => 'menu_other_but_v6',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button name.', 'ruya'),
				'required' => array('menu_other_v6','=', 'button'),
				'default'  => 'Get in touch',
			),
		    array(
				'id'       => 'menu_other_but_link_v6',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button Link', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button link.', 'ruya'),
				'required' => array('menu_other_v6','=', 'button'),
				'default'  => '#',
			),
		)
    ) );

    // -> START Main Menu Header V7
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V7', 'ruya' ),
        'id'     => 'main_menu_v7',
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'stick_main_menu_v7',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'ruya' ),
				'default'  => false,
			),
		
		    array(
				'id'       => 'bg_main_menu_v7',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: transparent).', 'ruya'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.mo-header-v7 .mo-header-top , .mo-header-v7 .mo-header-menu , .mo-header-v7 #lang > ul li > ul'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v7',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #041026).', 'ruya'),
				'default'  => array(
					'background-color' => '#041026',
				),
				'output'   => array('.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul ,
									.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > ul,
									.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul, .mo-header-v7 .mo-cart-content , .mo-header-v7 .header_search'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v7',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'ruya'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-stick-active .mo-header-v7.mo-header-stick .mo-header-menu'),
				'required' => array('stick_main_menu_v7','=', true),
			),
			array(
				'id'          => 'menu_first_level_v7',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v7 .mo-menu-list > ul > li > a , .mo-header-v7 .mo-search-header > a , .mo-header-v7 .mo-cart-header > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => "Nunito Sans", 
					'google'      => true,
					'font-size'   => '15px', 
					'line-height' => '20px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level_v7',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v7 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a ,
										.mo-header-v7 .mo-cart-content .total , .mo-header-v7 .mo-cart-content .cart_list.product_list_widget .mini_cart_item > a '),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
			),
		    array(
				'id'          => 'stick_menu_first_level_v7',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options in stick menu', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-stick-active .mo-header-v7.mo-header-stick .mo-menu-list > ul > li > a , .mo-stick-active .mo-header-v7.mo-header-stick .mo-search-header > a , .mo-stick-active .mo-header-v7.mo-header-stick .mo-cart-header > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#041026',
					'font-weight' => '700',  
					'font-family' => "Nunito Sans", 
					'google'      => true,
					'font-size'   => '15px', 
					'line-height' => '20px',
					'letter-spacing' => '0'
				),
		        'required' => array('stick_main_menu_v7','=', true),
			),
            array(
				'id'=>'menu_other_v7',
				'type' => 'button_set',
				'title' => esc_html__('Menu Right Icons', 'ruya'),
				'multi' => true,
				'options'=> array(
					'social'    => esc_html__('Social', 'ruya'),
					'button'    => esc_html__('Button', 'ruya'),
				),
				'default' => array('button'),                            
			 ),
		     array(
				'id'       => 'menu_other_but_v7',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button name.', 'ruya'),
				'required' => array('menu_other_v7','=', 'button')
			),
		    array(
				'id'       => 'menu_other_but_link_v7',
				'type'     => 'text',
				'title'    => esc_html__('Menu Right Button Link', 'ruya'),
				'subtitle' => esc_html__('Please, Enter menu right button link.', 'ruya'),
				'required' => array('menu_other_v7','=', 'button')
			),
		   
		    array(
				'id'=>'menu_other_v7_top_r',
				'type' => 'button_set',
				'title' => esc_html__('Right Icons (Top Menu)', 'ruya'),
				'multi' => true,
				'options'=> array(
					'lang'      => esc_html__('Lang', 'ruya'),    
					'search'    => esc_html__('Search', 'ruya'),
					'sidepanel' => esc_html__('Sidepanel', 'ruya'),
		            'cart'      => esc_html__('Cart', 'ruya'),
				),
				'default' => array('cart','search','sidepanel'),                            
		    ),
		   array(
				'id' => 'menu_other_v7_top_l',
				'type' => 'text',
				'title' => esc_html__('Left Text (Top Menu)', 'ruya' ),
			),
		)
    ) );

	// -> START Main Menu Header Left Navigation
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Left Nav', 'ruya' ),
        'id'     => 'main_menu_left_nav',
        'desc'   => esc_html__( '', 'ruya' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'          => 'menu_first_level_left_nav',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-left-navigation .mo-header-menu .mo-menu-list > ul > li > a, .mo-left-navigation-border .mo-header-menu .mo-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#041026',
					'font-weight' => '700',  
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '15px', 
					'line-height' => '34px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level1_left_nav',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level 1 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.mo-left-navigation .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li > a, .mo-left-navigation-border .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#041026', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '30px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'menu_sub_level2_left_nav',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level 2 Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.mo-left-navigation .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li > a, .mo-left-navigation-border .mo-header-menu .mo-menu-list > ul > li.menu-item-has-children > ul > li.menu-item-has-children > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#041026', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '30px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'       => 'bg_main_menu_left_nav',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('Controls background color (default: #fff).', 'ruya'),
				'default'  => array(
					'background-color' => '#fff',
				),
				'output'   => array('.mo-left-navigation'),
			),
			array(
				'id'       => 'switch_social_lnav',
				'type'     => 'switch',
				'title'    => esc_html__( 'social icons', 'ruya' ),
				'desc'     => esc_html__( 'Enable or disable social icons', 'ruya' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
		   array(
				'id' => 'copyright_txt_lnav',
				'type' => 'text',
				'title' => esc_html__('Text Copyright', 'ruya' ),
			),
		)
    ) );

	// -> START Main Menu sidepanel
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Meun Sidepanel', 'ruya' ),
        'id'     => 'menu_sidepanel',
        'desc'   => esc_html__( '', 'ruya' ),
        'subsection' => true,
		'fields' => array(
           array(
				'id'       => 'sidepanel_content_v2',
				'type'     => 'button_set',
	        	'required' => array('sidepanelv2','=', 'true'),
		 		'title'    => esc_html__('Sidepanel Content for header V2, V5, V6, V7', 'ruya'),
		        'subtitle' => esc_html__('Controls sidepanl nav and info from Appearance -> Widgets -> Sidepanel Menu, Sidepanel Info', 'ruya'),
		        'multi' => true,
				'options'=> array(
					'nav'      => esc_html__('Nav', 'ruya'), 
					'social'   => esc_html__('Social', 'ruya'),
		            'right_sec'=> esc_html__('Right section', 'ruya'),
				),
				'default' => array('nav', 'social', 'right_sec') 
			),
		    array(
				'id'          => 'menu_sidepanel_v2',
				'type'        => 'typography',
		        'required' => array('sidepanelv2','=', 'true'),
				'title'       => esc_html__('Menu Sidepanel Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.sidepanel_v2 ul.menu li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'          => '#fff',
					'font-family'    => 'Roboto', 
					'google'         => true,
			        'line-height'    => '40px',
	            	'font-size'      => '34px',
		            'font-weight'    => '700',  
					'letter-spacing' => '-1px'
	           ),
		    ),
		)
    ) );
    
	// -> START Main Menu Header Left Navigation
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Meun Lang Icon', 'ruya' ),
        'id'     => 'menu_lang_icon',
        'subsection' => true,
		'fields' => array(
		     array(
				'id'    => 'link_lang',
				'type'  => 'text',
				'title' => esc_html__('Main languages Name', 'ruya' ),
		        'default'  => 'En',
				'desc'  => esc_html__('Add Main Languages Name', 'ruya' ),
			),
			 array(
				'id'    => 'link_en',
				'type'  => 'text',
				'title' => esc_html__('English Link', 'ruya' ),
				'desc'  => esc_html__('Your English Link', 'ruya' ),
			),
			array(
				'id'    => 'link_fr',
				'type'  => 'text',
				'title' => esc_html__('French Link', 'ruya' ),
				'desc'  => esc_html__('Your French Link', 'ruya' ),
			),
			array(
				'id'    => 'link_ge',
				'type'  => 'text',
				'title' => esc_html__('German Link', 'ruya' ),
				'desc'  => esc_html__('Your German Link', 'ruya' ),
			),
		    array(
				'id'    => 'link_de',
				'type'  => 'text',
				'title' => esc_html__('Deutsch Link', 'ruya' ),
				'desc'  => esc_html__('Your Deutsch Link', 'ruya' ),
			),
		    array(
				'id'    => 'link_ro',
				'type'  => 'text',
				'title' => esc_html__('Romanian Link', 'ruya' ),
				'desc'  => esc_html__('Your Romanian Link', 'ruya' ),
			), 
		    array(
				'id'    => 'link_ar',
				'type'  => 'text',
				'title' => esc_html__('Arabic Link', 'ruya' ),
				'desc'  => esc_html__('Your Arabic Link', 'ruya' ),
			),
		)
    ) );

	// -> START Footer
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'ruya' ),
        'id'     => 'footer',
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_footer_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Footer Layout', 'ruya'),
				'subtitle' => esc_html__('Select footer layout in your site.', 'ruya'),
				'options'  => array(
	            	'footer-v0'	=> array(
						'alt'   => 'Footer V1',
						'img'   => RUYA_URI_PATH.'/assets/images/footers/footer-v0.jpg'
					),
					'footer-v1'	=> array(
						'alt'   => 'Footer V1',
						'img'   => RUYA_URI_PATH.'/assets/images/footers/footer-v1.jpg'
					),
					'footer-v2'	=> array(
						'alt'   => 'Footer V2',
						'img'   => RUYA_URI_PATH.'/assets/images/footers/footer-v2.jpg'
					),
					'footer-v3'	=> array(
						'alt'   => 'Footer V3',
						'img'   => RUYA_URI_PATH.'/assets/images/footers/footer-v3.jpg'
					),
		            'footer-v4'	=> array(
						'alt'   => 'Footer V4',
						'img'   => RUYA_URI_PATH.'/assets/images/footers/footer-v4.jpg'
					),
		            'footer-v5'	=> array(
						'alt'   => 'Footer V5',
						'img'   => RUYA_URI_PATH.'/assets/images/footers/footer-v5.jpg'
					),
		           'footer-v5'	=> array(
						'alt'   => 'Footer V6',
						'img'   => RUYA_URI_PATH.'/assets/images/footers/footer-v6.jpg'
					),
				),
				'default' => 'footer-v1'
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V1', 'ruya' ),
        'id'     => 'footer_v1',
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_margin',
				'title' => esc_html__('Footer Margin', 'ruya'),
				'subtitle' => esc_html__('Please, Enter margin.', 'ruya'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v1'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_padding',
				'title' => esc_html__('Footer Padding', 'ruya'),
				'subtitle' => esc_html__('Please, Enter padding.', 'ruya'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v1'),
				'default' => array(
					'padding-top'     => '0px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '0px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'    => array('.footer_v1 , .footer_v1 select  , .footer_v1 select option'), 
				'default'  => array(
					'background-color' => '#000',
				)
			),
			array(
				'id'          => 'tb_footer_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v1 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '26px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'tb_footer_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v1 , .footer_v1 p , .footer_v1 a , .footer_v1 span , .footer_v1 select , .footer_v1 select option , .footer_v1 td, .footer_v1 th '),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => 'rgba(255, 255, 255, 0.7)',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '25px',
	         	    'letter-spacing' => '0'
				),
			),
		    array(
				'id'       => 'tb_footer_fixed',
				'type'     => 'switch',
				'title'    => esc_html__( 'footer fixed', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable footer fixed.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_footer_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'ruya' ),
				'default'  => true,
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V2', 'ruya' ),
        'id'     => 'footer_v2',
        'desc'   => esc_html__( '', 'ruya' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v2_margin',
				'title' => esc_html__('Footer Margin', 'ruya'),
				'subtitle' => esc_html__('Please, Enter margin.', 'ruya'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v2'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v2_padding',
				'title' => esc_html__('Footer Columns Padding', 'ruya'),
				'subtitle' => esc_html__('Please, Enter padding.', 'ruya'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v2 .footer-widget-1 , .footer_v2 .footer-widget-2 , .footer_v2 .footer-widget-3 , .footer_v2 .footer-widget-4'),
				'default' => array(
					'padding-top'     => '90px', 
					'padding-right'   => '', 
					'padding-bottom'  => '90px', 
					'padding-left'    => '',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v2_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'    => array('.footer_v2 , .footer_v2 select  , .footer_v2 select option'), 
				'default'  => array(
					'background-color' => '#041026',
				)
			),
			array(
				'id'          => 'tb_footer_v2_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v2 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '26px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'tb_footer_v2_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v2 , .footer_v2 p , .footer_v2 a , .footer_v2 h5 , .footer_v2 h6 , .footer_v2 span , .footer_v2 select , .footer_v2 select option , .footer_v2 td, .footer_v2 th '),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => 'rgba(255, 255, 255, 0.5)',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '25px',
	         	    'letter-spacing' => '0'
				),
			),
           array(
				'id'       => 'tb_footer_v2_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'ruya' ),
				'default'  => true,
			),
		)
    ) );


     Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V3', 'ruya' ),
        'id'     => 'footer_v3',
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v3_margin',
				'title' => esc_html__('Footer Margin', 'ruya'),
				'subtitle' => esc_html__('Please, Enter margin.', 'ruya'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v3'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v3_padding',
				'title' => esc_html__('Footer Padding', 'ruya'),
				'subtitle' => esc_html__('Please, Enter padding.', 'ruya'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v3 .footer-widget-1'),
				'default' => array(
					'padding-top'     => '90px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '90px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v3_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'    => array('.footer_v3, .footer_v3 select  , .footer_v3 select option'), 
				'default'  => array(
					'background-color' => '#000',
				)
			),
			array(
				'id'          => 'tb_footer_v3_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v3 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '26px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'tb_footer_v3_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v3 , .footer_v3 p , .footer_v3 a , .footer_v3 span , .footer_v3 select , .footer_v3 select option , .footer_v3 td, .footer_v4 th '),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => 'rgba(255, 255, 255, 0.7)',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '25px',
	         	    'letter-spacing' => '0'
				),
			),
		    array(
				'id'       => 'tb_footer_v3_fixed',
				'type'     => 'switch',
				'title'    => esc_html__( 'footer fixed', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable footer fixed.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_footer_v3_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'ruya' ),
				'default'  => true,
			),
		)
    ) );


	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V4', 'ruya' ),
        'id'     => 'footer_v4',
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v4_margin',
				'title' => esc_html__('Footer Margin', 'ruya'),
				'subtitle' => esc_html__('Please, Enter margin.', 'ruya'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v4'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v4_padding',
				'title' => esc_html__('Footer Columns Padding', 'ruya'),
				'subtitle' => esc_html__('Please, Enter padding.', 'ruya'),
				'type' => 'spacing',
				'units' => array('px'),
				'output'         => array('.footer_v4'),
				'default' => array(
					'padding-top'     => '100px', 
					'padding-right'   => '0', 
					'padding-bottom'  => '0', 
					'padding-left'    => '0',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v4_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'   => array('.footer_v4 , .footer_v4 select  , .footer_v4 select option'), 
				'default'  => array(
					'background-color' => '#fff',
				)
			),
			array(
				'id'          => 'tb_footer_v4_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v4 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#041026',
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '26px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'tb_footer_v4_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v4 , .footer_v4 p , .footer_v4 a , .footer_v4 h5 , .footer_v4 h6 , .footer_v4 span , .footer_v4 select , .footer_v4 select option , .footer_v4 td, .footer_v4 th , .footer_v4 a:before'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#5b6674',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '25px',
	         	    'letter-spacing' => '0'
				),
			),
		    array(
				'id'       => 'tb_footer_v4_fixed',
				'type'     => 'switch',
				'title'    => esc_html__( 'footer fixed', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable footer fixed.', 'ruya' ),
				'default'  => true,
			),
           array(
				'id'       => 'tb_footer_v4_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'ruya' ),
				'default'  => true,
			),
		)
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V5', 'ruya' ),
        'id'     => 'footer_v5',
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v5_margin',
				'title' => esc_html__('Footer Margin', 'ruya'),
				'subtitle' => esc_html__('Please, Enter margin.', 'ruya'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v5'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v5_padding',
				'title' => esc_html__('Footer Padding', 'ruya'),
				'subtitle' => esc_html__('Please, Enter padding.', 'ruya'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_container_v5'),
				'default' => array(
					'padding-top'     => '100px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '100px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v5_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'    => array('.footer_v5, .footer_v5 select  , .footer_v5 select option'), 
			),
			array(
				'id'          => 'tb_footer_v5_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v5 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '26px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'tb_footer_v5_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v5 , .footer_v5 p , .footer_v5 a , .footer_v5 span , .footer_v5 select , .footer_v5 select option , .footer_v5 td, .footer_v5 th , .footer_v5 .mo-news-list .mo-meta span , .footer_v5 ul.contact-list li'),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '25px',
	         	    'letter-spacing' => '0'
				),
			),
		     array(
				'id'       => 'tb_footer_v5_fixed',
				'type'     => 'switch',
				'title'    => esc_html__( 'footer fixed', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable footer fixed.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_footer_v5_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'ruya' ),
				'default'  => true,
			),
		)
    ) );

    	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V6', 'ruya' ),
        'id'     => 'footer_v6',
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v6_margin',
				'title' => esc_html__('Footer Margin', 'ruya'),
				'subtitle' => esc_html__('Please, Enter margin.', 'ruya'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v6'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v6_padding',
				'title' => esc_html__('Footer Padding', 'ruya'),
				'subtitle' => esc_html__('Please, Enter padding.', 'ruya'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v6'),
				'default' => array(
					'padding-top'     => '0px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '0px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v6_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'    => array('.footer_v6 , .footer_v6 select  , .footer_v6 select option'), 
				'default'  => array(
					'background-color' => '#122947',
				)
			),
			array(
				'id'          => 'tb_footer_v6_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v6 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700',  
					'font-family' => 'Roboto',  
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '26px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'tb_footer_v6_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v6 , .footer_v6 p , .footer_v6 a , .footer_v6 span , .footer_v6 select , .footer_v6 select option , .footer_v6 td, .footer_v1 th '),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => 'rgba(255, 255, 255, 0.7)',
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '25px',
	         	    'letter-spacing' => '0'
				),
			),
		    array(
				'id'       => 'tb_footer_v6_fixed',
				'type'     => 'switch',
				'title'    => esc_html__( 'footer fixed', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable footer fixed.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_footer_v6_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Back To Top', 'ruya' ),
				'subtitle' => esc_html__( 'Enable/Disable back to top.', 'ruya' ),
				'default'  => true,
			),
		)
    ));
	/*-----------------------------------------------*
    START Title Bar
    /*-----------------------------------------------*/
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Title Bar', 'ruya' ),
        'id'     => 'title_bar',
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_page_title_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('pagetitle Layout', 'ruya'),
				'subtitle' => esc_html__('Select pagetitle layout in your site.', 'ruya'),
				'options'  => array(
					'pagetitle-v1'	=> array(
						'alt'   => 'Page title V1',
						'img'   => RUYA_URI_PATH.'/assets/images/pagetitle/pagetitle-v1.png'
					),
					'pagetitle-v2'	=> array(
						'alt'   => 'Page title V2',
						'img'   => RUYA_URI_PATH.'/assets/images/pagetitle/pagetitle-v2.png'
					),
					'pagetitle-v3'	=> array(
						'alt'   => 'Page title V3',
						'img'   => RUYA_URI_PATH.'/assets/images/pagetitle/pagetitle-v3.png'
					),
					'pagetitle-v4'	=> array(
						'alt'   => 'Page title V4',
						'img'   => RUYA_URI_PATH.'/assets/images/pagetitle/pagetitle-v4.png'
					),
		           'pagetitle-v5'	=> array(
						'alt'   => 'Page title V5',
						'img'   => RUYA_URI_PATH.'/assets/images/pagetitle/pagetitle-v5.png'
					),
				),
				'default' => 'pagetitle-v2'
            ),
			array(
				'id'       => 'tb_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'         => array('.page-header .mo-title-bar-wrap'),
				'default'  => array(
					'background-color' => '#252b33',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-attachment' => 'fixed',
					'background-size' => 'cover',
					'background-image' => RUYA_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
			array( 
				'id'       => 'tb_show_page_title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show page title', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not show page title.', 'ruya' ),
				'default'  => true,
			),
			array( 
				'id'       => 'tb_show_page_breadcrumb',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show page breadcrumb', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not show page breadcrumb.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'          => 'title_bar_heading',
				'type'        => 'typography', 
				'title'       => esc_html__('Title Bar Heading', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar h2'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'        => '#fff', 
					'font-weight'  => '700', 
					'font-family'  => 'Roboto',  
					'google'       => true,
					'font-size'    => '48px', 
					'line-height'  => '54px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'title_bar_path',
				'type'        => 'typography', 
				'title'       => esc_html__('Title Bar Path', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar .mo-path, .page-header .mo-title-bar .mo-path a ,  .woocommerce .mo-page-title-shop, .woocommerce .mo-page-title-shop a , .pagetitle-v4 .mo-path-inner'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '700', 
					'font-family' => 'Nunito Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '20px',
					'letter-spacing' => '0'
				),
			),
		   	array(
				'id'       => 'title_bar_subtext',
				'type'     => 'text',
				'title'    => esc_html__('Sub Text', 'ruya'),
				'subtitle' => esc_html__('Please, Enter sub text of title bar.', 'ruya'),
				'default'  => ''
			),
			array(
				'id'          => 'title_bar_subtext_format',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Text Format', 'ruya'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar h4'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'ruya'),
				'default'     => array(
					'color'       => 'rgba(255,255,255,0.5)', 
					'font-weight' => '400', 
					'font-family' => 'Nunito Sans',  
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '20px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'       => 'page_breadcrumb_delimiter',
				'type'     => 'text',
				'title'    => esc_html__('Delimiter', 'ruya'),
				'subtitle' => esc_html__('Please, Enter Delimiter of page breadcrumb in title bar.', 'ruya'),
				'default'  => '/'
			),
		)
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Post', 'ruya' ),
        'id'     => 'post_titlebar',
		'subsection' => true,
		'fields' => array(
		    array( 
				'id'       => 'tb_archive_title_bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Archive Title Bar', 'ruya' ),
				'subtitle' => esc_html__( 'show or not post title on your archive blog.', 'ruya' ),
				'default'  => false,
			),
			array(
				'id'       => 'tb_archive_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Archive Titlebar Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'   => array('.archive .mo-title-bar-wrap'), 
				'required' => array( 'tb_archive_title_bar', '=', '1' ),
				'default'  => array(
					'background-color' => '#252b33',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-attachment' => 'fixed',
					'background-image' => RUYA_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
		 )
    ) );
	// -> START Blog Post
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog', 'ruya' ),
        'id'     => 'blog',
		'icon'   => 'el el-icon-file-edit',
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Single Post', 'ruya' ),
        'id'     => 'single_post',
		'subsection' => true,
		'fields' => array(
			array( 
				'id'       => 'tb_post_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'ruya'),
				'subtitle' => esc_html__('Select layout of single blog.', 'ruya'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/2cr.png'
							),
		           '1col'	=> array(
								'alt'   => '1col',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/1col.png'
							)
				),
				'default' => '1col'
			),
		    array( 
				'id'       => 'tb_post_header_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select header Layout', 'ruya'),
				'subtitle' => esc_html__('Select header layout of single blog.', 'ruya'),
				'options'  => array(
					'basic'	=> array(
								'alt'   => 'basic',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/1col.png'
							),
		           'img_overlay'	=> array(
								'alt'   => 'img_overlay',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/1ct.png'
							)
				),
				'default' => 'basic'
			),
		    array(
				'id'=>'post-meta-single',
				'type' => 'button_set',
				'title' => esc_html__('Post Meta in post detail page', 'ruya'),
				'multi' => true,
				'options'=> array(
					'author'  => esc_html__('Author', 'ruya'),    
					'comment' => esc_html__('Comment', 'ruya'),
					'date'    => esc_html__('Date', 'ruya'),
					'like'    => esc_html__('Like', 'ruya'),
					'cat'     => esc_html__('Categories', 'ruya'),
					'tag'     => esc_html__('Tags', 'ruya'),
					'view'    => esc_html__('View', 'ruya'),
				),
				'default' => array('author','date','cat','tag','view'),                            
			 ),
		    array(
				'id'=>'post_share',
				'type' => 'button_set',
				'title' => esc_html__('Post Share Links position', 'ruya'),
				'multi' => true,
				'options'=> array(
					'sticky'    => esc_html__('Sticky', 'ruya'),    
					'basic'     => esc_html__('Basic', 'ruya'),
				), 
		       'default' => array('sticky'), 
			),
			array( 
				'id'       => 'tb_post_show_nav',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not post navigation on your single blog.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_post_show_author',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not post author on your single blog.', 'ruya' ),
				'default'  => true,
			),
		    array(
				'id'       => 'tb_related_post',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Post', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not related post on your single blog.', 'ruya' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_post_show_comment',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comment', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not post comment on your single blog.', 'ruya' ),
				'default'  => true,
			),
		)
    ) );
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Archive Post', 'ruya' ),
        'id'     => 'archive_post',
		'subsection' => true,
		'fields' => array(
			array( 
				'id'       => 'tb_blog_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'ruya'),
				'subtitle' => esc_html__('Select layout of blog.', 'ruya'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/2cr.png'
							),
		            '1col'	=> array(
								'alt'   => '1col',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/1col.png'
							)
				),
				'default' => '2cr'
			),
		)
    ) );
    // -> START Portfolio
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Portfolio', 'ruya' ),
        'id'     => 'portfolio',
        'desc'   => esc_html__( '', 'ruya' ),
        'icon'   => 'el el-picture',
		'fields' => array(
		  array( 
				'id'       => 'tb_portfolio_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'ruya'),
				'subtitle' => esc_html__('Select layout of portfolio.', 'ruya'),
				'options'  => array(
					'portfolio-side'	=> array(
								'alt'   => 'portfolio-side',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/2cr.png'
							),
					'portfolio-parallax'	=> array(
								'alt'   => '2cr',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/1ct.png'
							),
		            'portfolio-full'	=> array(
								'alt'   => 'portfolio-full',
								'img'   => RUYA_URI_PATH_ADMIN.'/assets/images/1col.png'
							)
				),
				'default' => 'portfolio-full'
			),

			array(
				'id'       => 'tb_portfolio_full_thumbnail',
				'type'     => 'switch',
		        'title'    => esc_html__( 'Show thumbnail image', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not thumbnail image on your single portfolio.', 'ruya' ),
				'default'  => true,
				'required' => array('tb_portfolio_layout','=', 'portfolio-full')
			),

		    array(
				'id'=>'tb_portfolio_meta_single',
				'type' => 'button_set',
				'title' => esc_html__('Post Meta in portfolio page', 'ruya'),
				'multi' => true,
				'options'=> array(
					'author'  => esc_html__('Author', 'ruya'),    
					'date'    => esc_html__('Date', 'ruya'),
					'like'    => esc_html__('Like', 'ruya'),
					'cat'     => esc_html__('Categories', 'ruya'),
					'view'    => esc_html__('View', 'ruya'),
		            'share'   => esc_html__('Share', 'ruya'),
				),
				'default' => array('date','cat','view','share','like'),                            
			 ),
		     array(
				'id'       => 'tb_portfolio_show_nav',
				'type'     => 'switch',
		        'title'    => esc_html__( 'Show Navigation', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not post navigation on your single portfolio.', 'ruya' ),
				'default'  => true,
			),
		     array(
				'id'       => 'tb_related_portfolio',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Post', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not related post on your portfolio page.', 'ruya' ),
				'default'  => true,
			)
		)
    ) );

	// -> START Page
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Page', 'ruya' ),
        'id'     => 'page',
        'desc'   => esc_html__( '', 'ruya' ),
        'icon'   => 'el el-pencil',
		'fields' => array(
		   array(
				'id'             => 'page_padding',
				'type'           => 'spacing',
				'output'         => array('.internal-content'),
				'mode'           => 'padding',
				'units'          => array('em', 'px'),
				'title'    => esc_html__('Padding', 'ruya'),
				'subtitle' => esc_html__('Please, Enter padding of pages.', 'ruya'),
				'default'            => array(
					'padding-top'     => '60px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '60px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
	     	array(
				'id'       => 'page_bg',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'ruya'),
				'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
				'output'   => array('.internal-content'),
				'default'  => array(
					'background-color' => '#fff',
				)
			),
			array(
				'id'       => 'page_comment',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Page Comment', 'ruya' ),
				'subtitle' => esc_html__( 'Show or not page comment on your page.', 'ruya' ),
				'default'  => true,
			)
		)
    ) );
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( '404 Page', 'ruya' ),
		'id'     => 'errorpage',
		'subsection' => true,
		'fields' => array(
		array(
			'id'       => 'error-404-bg',
			'type'     => 'background',
			'title'    => esc_html__('Background', 'ruya'),
			'subtitle' => esc_html__('background with image, color, etc.', 'ruya'),
			'output'   => array('.page-404'),
			'default'  => array(
				'background-color' => '#1a1831',
				'background-repeat' => 'no-repeat',
				'background-position' => 'center center',
				'background-attachment' => 'fixed',
				'background-size' => 'cover',
				'background-image' => RUYA_URI_PATH.'/assets/images/404.jpg',
			)
		),
		array(
			'id'       => 'error-404-title',
			'type'     => 'text',
			'title'    => esc_html__( 'Title', 'ruya' ),
			'subtitle' => '',
			'default' => '404'
		),
		array(
			'id'       => 'error-404-subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Heading', 'ruya' ),
			'subtitle' => '',
			'default' => 'Oops! That page can’t be found.'
		),
		array(
			'id'       => 'error-404-content',
			'type'     => 'text',
			'title'    => esc_html__( 'Content', 'ruya' ),
			'subtitle' => '',
			'default' => 'It looks like nothing was found at this location. Maybe try a search?'
		),
		array(
			'id' => 'error-404-btn',
			'type'	 => 'button_set',
			'title' => esc_html__('Button', 'ruya'),
			'subtitle' => esc_html__('Switch on to display the "back to home" button.', 'ruya'),
			'options' => array(
				'on'  => esc_html__( 'On', 'ruya' ),
				'off' => esc_html__( 'Off', 'ruya' )
			),
			'default' => 'on'
		),
		array(
			'id'       => 'error-404-btn-title',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'ruya' ),
			'subtitle' => '',
			'default'  => 'Back to home',
			'required' => array(
				'error-404-btn',
				'equals',
				'on'
			)
		),
	  )
    ) );
  
   // -> START Social Icon
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social', 'ruya' ),
        'id'     => 'social',
		'icon'   => 'el el-share',
		'fields' => array(
			array(
				'id' => 'facebook_url',
				'type' => 'text',
				'title' => esc_html__('Facebook URL', 'ruya' ),
				'desc' => esc_html__('Your Facebook URL', 'ruya' ),
			),
			array(
				'id' => 'twitter_url',
				'type' => 'text',
				'title' => esc_html__('Twitter URL', 'ruya' ),
				'desc' => esc_html__('Your Twitter URL', 'ruya' ),
			),
			array(
				'id' => 'linkedin_url',
				'type' => 'text',
				'title' => esc_html__('Linkedin URL', 'ruya' ),
				'desc' => esc_html__('Your Linkedin URL', 'ruya' ),
			),
			array(
				'id' => 'youtube_url',
				'type' => 'text',
				'title' => esc_html__('Youtube URL', 'ruya' ),
				'desc' => esc_html__('Your Youtube URL', 'ruya' ),
			),
			array(
				'id' => 'instagram_url',
				'type' => 'text',
				'title' => esc_html__('Instagram URL', 'ruya' ),
				'desc' => esc_html__('Your Instagram URL', 'ruya' ),
			),
			array(
				'id' => 'pinterest_url',
				'type' => 'text',
				'title' => esc_html__('Pinterest URL', 'ruya' ),
				'desc' => esc_html__('Your Pinterest URL', 'ruya' ),
			),
		   array(
				'id' => 'dribbble_url',
				'type' => 'text',
				'title' => esc_html__('Dribbble URL', 'ruya' ),
				'desc' => esc_html__('Your Dribbble URL', 'ruya' ),
			),
		   array(
				'id' => 'deviantart_url',
				'type' => 'text',
				'title' => esc_html__('Deviantart URL', 'ruya' ),
				'desc' => esc_html__('Your Deviantart URL', 'ruya' ),
			),
		   array(
				'id' => 'flickr_url',
				'type' => 'text',
				'title' => esc_html__('Flickr URL', 'ruya' ),
				'desc' => esc_html__('Your Flickr URL', 'ruya' ),
			),
		   array(
				'id' => 'rss_url',
				'type' => 'text',
				'title' => esc_html__('RSS URL', 'ruya' ),
				'desc' => esc_html__('Your RSS URL', 'ruya' ),
			),
		 array(
				'id' => 'tumblr_url',
				'type' => 'text',
				'title' => esc_html__('Tumblr URL', 'ruya' ),
				'desc' => esc_html__('Your Tumblr URL', 'ruya' ),
			),
		   array(
				'id' => 'vimeo_url',
				'type' => 'text',
				'title' => esc_html__('Vimeo URL', 'ruya' ),
				'desc' => esc_html__('Your Vimeo URL', 'ruya' ),
			),
			 array(
				'id' => 'skype_url',
				'type' => 'text',
				'title' => esc_html__('Skype URL', 'ruya' ),
				'desc' => esc_html__('Your Skype URL', 'ruya' ),
			),
		   array(
				'id' => 'Soundcloud_url',
				'type' => 'text',
				'title' => esc_html__('Soundcloud URL', 'ruya' ),
				'desc' => esc_html__('Your Soundcloud URL', 'ruya' ),
			),
		 array(
				'id' => 'behance_url',
				'type' => 'text',
				'title' => esc_html__('Behance URL', 'ruya' ),
				'desc' => esc_html__('Your Behance URL', 'ruya' ),
			),
		  array(
				'id' => 'tripadvisor_url',
				'type' => 'text',
				'title' => esc_html__('Tripadvisor URL', 'ruya' ),
				'desc' => esc_html__('Your Tripadvisor URL', 'ruya' ),
			),
		)
    ) );
    
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'ruya' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'ruya' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }