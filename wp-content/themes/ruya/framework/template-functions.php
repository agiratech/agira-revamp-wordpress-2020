<?php
if ( ! isset( $content_width ) ) $content_width = 900;
if ( ! function_exists( 'ruya_setup' ) ) {
	function ruya_setup() {
		global $ruya_options;
		load_theme_textdomain( 'ruya', get_template_directory() . '/languages' );
		// Add Custom Header.
		add_theme_support('custom-header');
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
		// Enable support for Post Thumbnails, and declare sizes.
		add_theme_support( 'post-thumbnails' );
		// Theme resize image
		add_image_size( 'ruya-full'  , 1500, 730, false ); //header carousel
		add_image_size( 'ruya-medium', 750 , 500, false ); //single blog
		add_image_size( 'ruya-small' , 480 , 380, false ); //blog masonry
		add_image_size( 'ruya-lg-height' , 450 , 500, false ); //blog Overlay
		add_image_size( 'ruya-team'  , 540 , 650, false );
		add_image_size( 'ruya-thumb' , 100 , 100, false );
		//Enable support for Title Tag
		 add_theme_support( "title-tag" );
		// This theme uses wp_nav_menu() in locations.
		register_nav_menus( array(
			'main_navigation'     => esc_html__( 'Main Navigation','ruya' ),
			'one_page_navigation' => esc_html__( 'One Page Menu','ruya' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'video', 'audio', 'quote', 'link', 'gallery',
		) );
		//Support Gutenberg
		add_theme_support( 'gutenberg', array( 'wide-images' => true ));
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		
		// This theme allows users to set a custom background.
		add_theme_support( 'custom-background', apply_filters( 'ruya_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );
		// Add support for featured content.
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'ruya_get_featured_posts',
			'max_posts' => 6,
		) );
		
		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
}
add_action( 'after_setup_theme', 'ruya_setup' );
/*----------------------------------------------*
 Lazyload images
/*----------------------------------------------*/
if( ! function_exists( 'ruya_lazyload_image_attributes' )){
	add_filter( 'wp_get_attachment_image_attributes', 'ruya_lazyload_image_attributes', 8, 3 );
	function ruya_lazyload_image_attributes( $attr, $attachment, $size ) {

		## Check if the JetPack Plugin is active & the Photon option is enabled & Current images displayed in the post content
		if ( class_exists( 'Jetpack' ) && in_array( 'photon', Jetpack::get_active_modules() ) && in_array( 'the_content', $GLOBALS['wp_current_filter'] ) )
		{
			return $attr;
		}
		global $ruya_options;
		$lazy_load = (int) isset($ruya_options['lazy_load']) ? $ruya_options['lazy_load']: 1; 
		if( $lazy_load && ! is_admin() && ! is_feed() ){
			$attr['class'] .= ' lazy-img';
			$attr['data-src'] = $attr['src'];
			unset( $attr['srcset'] );
			unset( $attr['sizes'] );
		}
		return $attr;
	}
}
/*-----------------------------------------------*
  Customize Body Class
/*-----------------------------------------------*/
function ruya_body_class( $classes ) {
	global $ruya_options;
	$body_layout =& $ruya_options["body_layout"];
    if ( $body_layout == 'boxed' || ( get_post_meta( get_the_ID(), 'tb_body_layout', true ) == 'boxed' ) ) 
      {
		$classes[] = 'boxed';
      }
	  elseif( $body_layout == 'lines' || ( get_post_meta( get_the_ID(), 'tb_body_layout', true ) == 'lines' ) )
	  {
		$classes[] = 'lines';
      }
	   elseif( $body_layout == 'shapes' || ( get_post_meta( get_the_ID(), 'tb_body_layout', true ) == 'shapes' ) )
	  {
		$classes[] = 'shapes';
      }
	  else {
		$classes[] = 'wide';
	  }
    return $classes;
}
add_filter( 'body_class', 'ruya_body_class' );

/*-----------------------------------------------*
  cursor
/*-----------------------------------------------*/
function ruya_cursor() {
    global $ruya_options;
    $cursor_layout =& $ruya_options["select_cursor"];
	$tb_cursor = get_post_meta(get_the_ID(), 'tb_select_cursor', true)?get_post_meta(get_the_ID(), 'tb_select_cursor', true):'global';
	$cursor_layout = $tb_cursor=='global'?$cursor_layout:$tb_cursor;
    switch ($cursor_layout) {
		case 'style1': 
             echo '<div class="mouse-cursor style1"></div>';
            break;
        case 'style2':
             echo '<div class="mouse-cursor style2"></div>';
            break;
		case 'style3':
             echo '<div class="mouse-cursor style3"></div>';
            break;
    }
}
/*-----------------------------------------------*
  Logo
/*-----------------------------------------------*/
if (!function_exists('ruya_logo')) {
	function ruya_logo() {
		global $ruya_options;
		$logo_white = $logo_main_page = '';
		$logo = $logo_page = get_post_meta(get_the_ID(), 'tb_logo', true);
		if(!empty($logo_page)) { $logo_main_page = 'logo_page'; }
		if($logo == '') {
			$logo = isset($ruya_options['tb_logo']['url']) && $ruya_options['tb_logo']['url'] ? $ruya_options['tb_logo']['url'] : RUYA_URI_PATH.'/assets/images/logo.svg';
			if (isset($ruya_options['tb_logo_white']['url']) && $ruya_options['tb_logo_white']['url'] != ""){ $logo_white = $ruya_options['tb_logo_white']['url'];}else{ $logo_white =  RUYA_URI_PATH.'/assets/images/logo-white.svg'; };
		}
		if(!empty($logo_white)) {
				echo '<img class="Logo_white" src="'.esc_url($logo_white).'" alt="'.esc_attr__('logo','ruya').'" />';
		}
		echo '<img class="logo '.esc_attr($logo_main_page).'" src="'.esc_url($logo).'" alt="'.esc_attr__('logo','ruya').'"/>';
	}
}

/*-----------------------------------------------*
  Header , Footer
/*-----------------------------------------------*/
function ruya_header() {
    global $ruya_options;
    $header_layout =& $ruya_options["tb_header_layout"];
	$tb_header = get_post_meta(get_the_ID(), 'tb_header', true)?get_post_meta(get_the_ID(), 'tb_header', true):'global';
	$header_layout = $tb_header=='global'?$header_layout:$tb_header;
    switch ($header_layout) {
        case 'sidepanel':
            get_template_part('framework/headers/header', 'v1');
            break;
		case 'header-v2':
            get_template_part('framework/headers/header', 'v2');
            break;
		case 'header-v3':
            get_template_part('framework/headers/header', 'v3');
            break;
		case 'header-v4':
            get_template_part('framework/headers/header', 'v4');
            break;
		case 'header-v5':
            get_template_part('framework/headers/header', 'v5');
            break;
		case 'header-v6':
            get_template_part('framework/headers/header', 'v6');
            break;
	    case 'header-v7':
            get_template_part('framework/headers/header', 'v7');
            break;
		case 'header-onepage':
            get_template_part('framework/headers/header', 'onepage');
            break;			
		default :
			get_template_part('framework/headers/header', 'v2');
			break;
    }
}
function ruya_footer() {
    global $ruya_options;
    $footer_layout =& $ruya_options["tb_footer_layout"];
	$tb_footer = get_post_meta(get_the_ID(), 'tb_footer', true)?get_post_meta(get_the_ID(), 'tb_footer', true):'global';
	$footer_layout = $tb_footer=='global'?$footer_layout:$tb_footer;
    switch ($footer_layout) {
		case 'footer-v0':
            get_template_part('framework/footers/footer', 'v0');
            break;
        case 'footer-v1':
            get_template_part('framework/footers/footer', 'v1');
            break;
		case 'footer-v2':
            get_template_part('framework/footers/footer', 'v2');
            break;
		case 'footer-v3':
            get_template_part('framework/footers/footer', 'v3');
            break;
		case 'footer-v4':
            get_template_part('framework/footers/footer', 'v4');
            break;
	   case 'footer-v5':
            get_template_part('framework/footers/footer', 'v5');
            break;
	  case 'footer-v6':
            get_template_part('framework/footers/footer', 'v6');
            break;
		default :
			get_template_part('framework/footers/footer', 'v6');
			break;
    }
}
/*-----------------------------------------------*
  Page title
/*-----------------------------------------------*/
if (!function_exists('ruya_page_title')) {
    function ruya_page_title() { 
            ob_start();
			if( is_home() ){ esc_html__('Home', 'ruya');
			}elseif(is_search()){ esc_html__('Search', 'ruya');
            }elseif(is_404()){ esc_html__('Page Not Found ', 'ruya');
            }elseif (!is_archive()) { the_title();
            } else { 
                if (is_category()){ single_cat_title();
				}elseif( get_post_type() == 'portfolio' || get_post_type() == 'product' || get_post_type() == 'team' || get_post_type() == 'Testimonials' ){ single_term_title();
				}elseif (is_tag()){ single_tag_title();
				}elseif (is_author()){ printf( esc_html__('Author: %s', 'ruya'), '<span class="vcard">' . get_the_author() . '</span>');
				}elseif (is_day()){ printf( esc_html__('Day: %s', 'ruya'), '<span>' . get_the_date() . '</span>');
				}elseif (is_month()){ printf( esc_html__('Month: %s', 'ruya'), '<span>' . get_the_date() . '</span>');
				}elseif (is_year()){ printf( esc_html__('Year: %s', 'ruya'), '<span>' . get_the_date() . '</span>');
				}elseif (is_tax('post_format', 'post-format-aside')){ esc_html__('Asides', 'ruya');
				}elseif (is_tax('post_format', 'post-format-gallery')){ esc_html__('Galleries', 'ruya');
				}elseif (is_tax('post_format', 'post-format-image')){ esc_html__('Images', 'ruya');
				}elseif (is_tax('post_format', 'post-format-video')){ esc_html__('Videos', 'ruya');
				}elseif (is_tax('post_format', 'post-format-quote')){ esc_html__('Quotes', 'ruya');
				}elseif (is_tax('post_format', 'post-format-link')){ esc_html__('Links', 'ruya');
				}elseif (is_tax('post_format', 'post-format-status')){ esc_html__('Statuses', 'ruya');
				}elseif (is_tax('post_format', 'post-format-audio')){ esc_html__('Audios', 'ruya');
				}elseif (is_tax('post_format', 'post-format-chat')){ esc_html__('Chats', 'ruya');
				}else{ esc_html__('Archives', 'ruya');
                }
            }
            return ob_get_clean();
    }
}
/*-----------------------------------------------*
  Page breadcrumb 
/*-----------------------------------------------*/
if (!function_exists('ruya_page_breadcrumb')) {
    function ruya_page_breadcrumb($delimiter) {
            ob_start();
            $home = esc_html__('Home', 'ruya');
            global $post;
            $homeLink = esc_url( home_url('/') );
			if( is_home() ){
				esc_html__('Home', 'ruya');
			}else{
				echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
			}
            if ( is_category() ) {
                $thisCat = get_category(get_query_var('cat'), false);
                if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
                echo '<span class="current">' . esc_html__('Archive by category: ', 'ruya') . single_cat_title('', false) . '</span>';
            } elseif ( is_search() ) {
                echo '<span class="current">' . esc_html__('Search results for: ', 'ruya') . get_search_query() . '</span>';
            } elseif ( is_day() ) {
                echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<span class="current">' . get_the_time('d') . '</span>';
            } elseif ( is_month() ) {
                echo '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';
            } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                if(get_post_type() == 'portfolio'){
                    $terms = get_the_terms(get_the_ID(), 'project-type', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'project-type', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    }else{
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                }elseif(get_post_type() == 'team'){
                    echo '<span class="current">' . get_the_title() . '</span>';
                }elseif(get_post_type() == 'testimonials'){
                    echo '<span class="current">' . get_the_title() . '</span>';
                }elseif(get_post_type() == 'product'){
                    $terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'product_cat', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    }else{
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                }else{
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                    echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                }
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo ''.$cats;
                echo '<span class="current">' . get_the_title() . '</span>';
            }
				
				
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
				if($post_type) echo '<span class="current">' . $post_type->labels->singular_name . '</span>';
            } elseif ( is_attachment() ) {
                $parent = get_post($post->post_parent);
                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
            } elseif ( is_page() && !$post->post_parent ) {
                echo '<span class="current">' . get_the_title() . '</span>';
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo ''.$breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1)
                        echo ' ' . $delimiter . ' ';
                }
                echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
            } elseif ( is_tag() ) {
                echo '<span class="current">' . esc_html__('Posts tagged: ', 'ruya') . single_tag_title('', false) . '</span>';
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo '<span class="current">' . esc_html__('Articles posted by ', 'ruya') . $userdata->display_name . '</span>';
            } elseif ( is_404() ) {
                echo '<span class="current">' . esc_html__('Error 404', 'ruya') . '</span>';
            }
            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo ' '.esc_html__('Page', 'ruya') . ' ' . get_query_var('paged');
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
            return ob_get_clean();
    }
}
/*-----------------------------------------------*
Title Bar
/*-----------------------------------------------*/
if ( ! function_exists( 'ruya_title_bar' ) ) {
	function ruya_title_bar() {
		global $ruya_options;
	    $page_title_layout =& $ruya_options["tb_page_title_layout"];
	    $tb_page_title = get_post_meta(get_the_ID(), 'tb_page_title', true)?get_post_meta(get_the_ID(), 'tb_page_title', true):'global';
	    $page_title_layout = $tb_page_title=='global'?$page_title_layout:$tb_page_title;
		$show_page_title = (int) isset($ruya_options['tb_show_page_title']) ? $ruya_options['tb_show_page_title']: 1; 
        $show_page_breadcrumb = (int) isset($ruya_options['tb_show_page_breadcrumb']) ? $ruya_options['tb_show_page_breadcrumb']: 1; 
		$subtext = isset($ruya_options['title_bar_subtext']) ? $ruya_options['title_bar_subtext'] : '';
		$delimiter = isset($ruya_options['page_breadcrumb_delimiter']) ? $ruya_options['page_breadcrumb_delimiter'] : '/';
   switch ($page_title_layout) {
        case 'pagetitle-v1': ?>
            <div class="pagetitle-v1"></div>
        <?php break;
		   
		case 'pagetitle-v2': ?>
			<div class="page-header pagetitle-v2">
				<div class="hero parallax wrapper mo-title-bar-wrap">
					<div class="container parallax-container">
						<div class="cd-intro mo-title-bar">
						 <?php if( $show_page_title ){ ?><h2 class="mo-text-ellipsis"><?php echo ruya_page_title(); ?></h2> <?php }
		                 if($show_page_breadcrumb){ ?><div class="mo-path"><div class="mo-path-inner"><?php echo ruya_page_breadcrumb($delimiter); ?></div></div><?php } 
						 if($subtext) echo '<h4>'.esc_html($subtext).'</h4>'; ?>
					   </div>
					</div><!-- .container.reskew -->
				</div> <!-- .hero -->
			</div><!-- .page-header -->
		<?php break;
		   
		case 'pagetitle-v3': ?>
         	<div class="page-header pagetitle-v3">
				<div class="hero parallax wrapper mo-title-bar-wrap">
					<div class="container parallax-container">
						<div class="cd-intro mo-title-bar">
						<?php
						 if( !(is_single()) && $show_page_title ){ ?>
						   		<h2 class="mo-text-ellipsis"><?php echo ruya_page_title(); ?></h2> 
						<?php }
		                if($show_page_breadcrumb){  ?>
							<div class="mo-path"><div class="mo-path-inner"><?php echo ruya_page_breadcrumb($delimiter); ?></div></div>
						<?php } ?>
					   </div>
					</div><!-- .container.reskew -->
				</div> <!-- .hero -->
			</div><!-- .page-header -->
		<?php break;
		 
	    case 'pagetitle-v4': ?>
		 <div class="page-header pagetitle-v4">
			<div class="hero parallax wrapper mo-title-bar-wrap">
				<div class="container parallax-container">
					<div class="cd-intro mo-title-bar">
					 <?php if( !(is_single()) && $show_page_title ){ ?>
					    <h2 class="mo-text-ellipsis"><?php echo ruya_page_title(); ?></h2> 
					<?php }
					if($subtext) echo '<h4>'.esc_html($subtext).'</h4>'; ?>
				   </div>
				</div><!-- .container.reskew -->
			</div> <!-- .hero -->
           <?php if($show_page_breadcrumb){  ?>
				<div class="mo-path">
					<div class="container mo-path-inner">
						<?php echo ruya_page_breadcrumb($delimiter); ?>
					</div>
				</div>
		   <?php } ?>
    	</div><!-- .page-header -->
	    <?php break;
		   
		case 'pagetitle-v5': ?>
			<div class="page-header pagetitle-v5">
				<div class="container">
				       <div class="col-md-6 col-sm-12">
						   <?php if( !(is_single()) && $show_page_title ){ ?>
							    <h2 class="mo-text-ellipsis"><?php echo ruya_page_title(); ?></h2> 
						    <?php }
	                 	    if($subtext) echo '<h4>'.esc_html($subtext).'</h4>'; ?> 
						</div>
					    <?php 
		                if($show_page_breadcrumb){  ?>
							<div class="mo-path col-md-6 col-sm-12">
								<div class="mo-path-inner"><?php echo ruya_page_breadcrumb($delimiter); ?></div>
							</div>
						<?php } ?>
				</div><!-- .container -->
			</div><!-- .page-header -->
		<?php break;
		default : ?>
		<div class="page-header pagetitle-v2">
			<div class="page-header pagetitle-v2">
				<div class="hero parallax wrapper mo-title-bar-wrap">
					<div class="container parallax-container">
						<div class="cd-intro mo-title-bar">
						 <?php if( $show_page_title ){ ?><h2 class="mo-text-ellipsis"><?php echo ruya_page_title(); ?></h2> <?php }
		                 if($show_page_breadcrumb){ ?><div class="mo-path"><div class="mo-path-inner"><?php echo ruya_page_breadcrumb($delimiter); ?></div></div><?php } 
						 if($subtext) echo '<h4>'.esc_html($subtext).'</h4>'; ?>
					   </div>
					</div><!-- .container.reskew -->
				</div> <!-- .hero -->
			</div><!-- .page-header -->
		</div><!-- .page-header -->
	   <?php break;
      }
   }
}
/*-----------------------------------------------*
  Custom excerpt 
/*-----------------------------------------------*/
function ruya_custom_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt);
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}
/*-----------------------------------------------*
  Display pagination set of posts and portfolio
/*-----------------------------------------------*/
function ruya_pagination($query = null, $paginated = 'numeric')
{
    if ($query == null) {
        global $wp_query;
        $query = $wp_query;
    }
    $page  = $query->query_vars['paged'];
    $pages = $query->max_num_pages;
    $paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
    if ($page == 0) {
        $page = 1;
    }
    $output = '';
    if ($pages > 1) {
        if ($paginated == 'buttons') {
            $output .= '<nav class="vl-pagination-buttons">';
            if ($page + 1 <= $pages) {
                $output .= '<a class="prev-page" href="' . get_pagenum_link($page + 1) . '"><i class="fa fa-long-arrow-left"></i><span>' . esc_html__('Previous Page', 'ruya') . '</span></a>';
            } else {
                $output .= '<span class="prev-page inactive"><i class="fa fa-long-arrow-left"></i><span>' . esc_html__('Previous Page', 'ruya') . '</span></span>';
            }
            if ($page - 1 >= 1) {
                $output .= '<a class="next-page" href="' . get_pagenum_link($page - 1) . '"><span>' . esc_html__('Next Page', 'ruya') . '</span><i class="fa fa-long-arrow-right"></i></a>';
            } else {
                $output .= '<span class="next-page inactive"><span>' . esc_html__('Next Page', 'ruya') . '</span><i class="fa fa-long-arrow-right"></i></span>';
            }
            $output .= '</nav>';
        }
        if ($paginated == 'numeric') {
            $numeric_links = paginate_links(array(
                'foramt' => '',
                'add_args' => '',
                'current' => $paged,
                'total' => $pages,
                'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                'next_text' => '<i class="fa fa-long-arrow-right"></i>'
            ));
            $output .= '<nav class="mo-pagination mo-pagination-numeric">';
            $output .= $numeric_links;
            $output .= '</nav>';
        }
    }
    return apply_filters('ruya_pagination', $output);
}
/*-----------------------------------------------*
  Display navigation to next/previous set of posts
/*-----------------------------------------------*/
if ( ! function_exists( 'ruya_paging_nav' ) ) {
	function ruya_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		// Set up paginated links.
		$links = paginate_links( array(
				'base'     => $pagenum_link,
				'format'   => $format,
				'total'    => $GLOBALS['wp_query']->max_num_pages,
				'current'  => $paged,
				'mid_size' => 1,
				'add_args' => array_map( 'urlencode', $query_args ),
				'prev_text' => esc_html__( '&laquo; Prev', 'ruya' ),
			    'next_text' => esc_html__( 'Next &raquo;', 'ruya' )
		) );
		if ( $links ) {
		?>
		<nav class="mo-pagination" role="navigation">
			<?php echo ''.$links; ?>
		</nav>
		<?php
		}
	}
}
/*-----------------------------------------------*
   archive widget
/*-----------------------------------------------*/
/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'ruya_cat_count_span');
function ruya_cat_count_span($links) {
	$links = str_replace('</a> (', ' <span>', $links);
	$links = str_replace('(', '', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'ruya_archive_count_span');
function ruya_archive_count_span($links) {
	$links = str_replace('(', '<span class="count">', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}

add_filter ( 'wp_tag_cloud', 'ruya_tag_cloud_count' );
function ruya_tag_cloud_count( $return ) {
	$tags = explode('</a>', $return);
	foreach( $tags as $tag ) {
		$tagn[] = '<span>'.$tag.'</a>';
	}
	$return = implode('</span>', $tagn);
	return $return;
}
/*-----------------------------------------------*
   menu social icons
/*-----------------------------------------------*/
function ruya_top_social() {
	global $ruya_options; ?>
	 <?php if(isset($ruya_options['facebook_url']) AND $ruya_options['facebook_url'] !=''): ?>
	 <li><a class="facebook" href="<?php echo esc_url($ruya_options['facebook_url']);?>" title="<?php echo esc_attr_e('facebook','ruya'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
	 <?php endif; 
	  if(isset($ruya_options['twitter_url']) AND $ruya_options['twitter_url'] !=''): ?>
	 <li><a class="twitter" href="<?php echo esc_url($ruya_options['twitter_url']);?>" title="<?php echo esc_attr_e('twitter','ruya'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
	 <?php endif; 
	  if(isset($ruya_options['linkedin_url']) AND $ruya_options['linkedin_url'] !=''): ?>
	 <li><a class="linkedin" href="<?php echo esc_url($ruya_options['linkedin_url']);?>" title="<?php echo esc_attr_e('linkedin','ruya'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['youtube_url']) AND $ruya_options['youtube_url'] !=''): ?>
	 <li><a class="youtube" href="<?php echo esc_url($ruya_options['youtube_url']);?>" title="<?php echo esc_attr_e('youtube','ruya'); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['instagram_url']) AND $ruya_options['instagram_url'] !=''): ?>
	 <li><a class="instagram" href="<?php echo esc_url($ruya_options['instagram_url']);?>" title="<?php echo esc_attr_e('instagram','ruya'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
	 <?php endif;
	 if(isset($ruya_options['pinterest_url']) AND $ruya_options['pinterest_url'] !=''): ?>
	 <li><a class="pinterest" href="<?php echo esc_url($ruya_options['pinterest_url']);?>" title="<?php echo esc_attr_e('pinterest','ruya'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
	 <?php endif;
	 if(isset($ruya_options['dribbble_url']) AND $ruya_options['dribbble_url'] !=''): ?>
	 <li><a class="dribbble" href="<?php echo esc_url($ruya_options['dribbble_url']);?>" title="<?php echo esc_attr_e('dribbble','ruya'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['deviantart_url']) AND $ruya_options['deviantart_url'] !=''): ?>
	 <li><a class="deviantart" href="<?php echo esc_url($ruya_options['deviantart_url']);?>" title="<?php echo esc_attr_e('deviantart','ruya'); ?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['flickr_url']) AND $ruya_options['flickr_url'] !=''): ?>
	 <li><a class="flickr" href="<?php echo esc_url($ruya_options['flickr_url']);?>" title="<?php echo esc_attr_e('flickr','ruya'); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['rss_url']) AND $ruya_options['rss_url'] !=''): ?>
	 <li><a class="rss" href="<?php echo esc_url($ruya_options['rss_url']);?>" title="<?php echo esc_attr_e('rss','ruya'); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['tumblr_url']) AND $ruya_options['tumblr_url'] !=''): ?>
	 <li><a class="tumblr" href="<?php echo esc_url($ruya_options['tumblr_url']);?>" title="<?php echo esc_attr_e('tumblr','ruya'); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['vimeo_url']) AND $ruya_options['vimeo_url'] !=''): ?>
	 <li><a class="vimeo" href="<?php echo esc_url($ruya_options['vimeo_url']);?>" title="<?php echo esc_attr_e('vimeo','ruya'); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['skype_url']) AND $ruya_options['skype_url'] !=''): ?>
	 <li><a class="skype" href="<?php echo esc_url($ruya_options['skype_url']);?>" title="<?php echo esc_attr_e('skype','ruya'); ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['Soundcloud_url']) AND $ruya_options['Soundcloud_url'] !=''): ?>
	 <li><a class="soundcloud" href="<?php echo esc_url($ruya_options['Soundcloud_url']);?>" title="<?php echo esc_attr_e('Soundcloud','ruya'); ?>" target="_blank"><i class="fa fa-Soundcloud"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['behance_url']) AND $ruya_options['behance_url'] !=''): ?>
	 <li><a class="behance" href="<?php echo esc_url($ruya_options['behance_url']);?>" title="<?php echo esc_attr_e('behance','ruya'); ?>" target="_blank"><i class="fa fa-behance"></i></a></li>
	 <?php endif; 
	 if(isset($ruya_options['tripadvisor_url']) AND $ruya_options['tripadvisor_url'] !=''): ?>
	 <li><a class="tripadvisor" href="<?php echo esc_url($ruya_options['tripadvisor_url']);?>" title="<?php echo esc_attr_e('tripadvisor','ruya'); ?>" target="_blank"><i class="fa fa-tripadvisor"></i></a></li>
	 <?php endif; ?>    
<?php }
/*-----------------------------------------------*
   lang menu link
/*-----------------------------------------------*/
function lang_link() {
	global $ruya_options; ?>
	
	 <div class="select-languages"><a href="#"><?php if(isset($ruya_options['link_lang']) AND $ruya_options['link_lang'] !=''): echo esc_html($ruya_options['link_lang']); endif;?></a>
		<ul>
			<?php if(isset($ruya_options['link_en']) AND $ruya_options['link_en'] !=''): ?>
			  <li><a href="<?php echo esc_url($ruya_options['link_en']);?>">En</a></li>
			<?php endif;
	        if(isset($ruya_options['link_fr']) AND $ruya_options['link_fr'] !=''): ?>
			  <li><a href="<?php echo esc_url($ruya_options['link_fr']);?>">Fr</a></li>
			<?php endif;
	       if(isset($ruya_options['link_ge']) AND $ruya_options['link_ge'] !=''): ?>
			  <li><a href="<?php echo esc_url($ruya_options['link_ge']);?>">Ge</a></li>
			<?php endif;
			if(isset($ruya_options['link_de']) AND $ruya_options['link_de'] !=''): ?>
			  <li><a href="<?php echo esc_url($ruya_options['link_de']);?>">De</a></li>
			<?php endif;
	         if(isset($ruya_options['link_ro']) AND $ruya_options['link_ro'] !=''): ?>
			  <li><a href="<?php echo esc_url($ruya_options['link_ro']);?>">Ro</a></li>
			<?php endif;
	         if(isset($ruya_options['link_ar']) AND $ruya_options['link_ar'] !=''): ?>
			  <li><a href="<?php echo esc_url($ruya_options['link_ar']);?>">Ar</a></li>
			<?php endif; ?>
		</ul>
	 </div>
<?php }