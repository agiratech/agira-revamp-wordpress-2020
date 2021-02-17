<?php
add_theme_support( 'woocommerce' );
/* Template pages */
function ruya_woocommerce_enqueue_scripts() {
	wp_enqueue_style( 'ruya-slick', RUYA_URI_PATH. '/assets/css/slick.css' , array(), "");
	wp_enqueue_script( 'ruya-slick-js', RUYA_URI_PATH. '/assets/js/slick.min.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'ruya_woocommerce_enqueue_scripts' );
/* Template pages */
if (!function_exists('ruya_woocommerce_content')) {
    function ruya_woocommerce_content() {
        if (is_singular('product')) {
            wc_get_template_part('single', 'product');
        } else {
            wc_get_template_part('archive', 'product');
        }
    }
}	
/* Show rating on all products */ 
add_filter( 'woocommerce_product_get_rating_html','ruya_get_rating_html', 10,2 );
function ruya_get_rating_html( $rating_html, $rating ) {
	if($rating == '') $rating = 0;
	$rating_html = '';
			$rating_html  = '<div class="star-rating" title="' . sprintf( esc_html__( 'Rated %s out of 5', 'ruya' ), $rating ) . '">';
			$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . esc_html__( 'out of 5', 'ruya' ) . '</span>';
			$rating_html .= '</div>';
	return $rating_html;
}
/* Change number of related products on product page
   Set your own value for 'posts_per_page' */ 
add_filter( 'woocommerce_output_related_products_args', 'ruya_related_products_args' );
function ruya_related_products_args( $args ) {
    $columns = 4;
    $args['posts_per_page'] = $columns; // 3 related products
    $args['columns'] = $columns; // arranged in 3 columns
    return $args;
}
/* Output the product meta top. */
if ( ! function_exists( 'woocommerce_template_single_meta_top' ) ) {
	function woocommerce_template_single_meta_top() {
		wc_get_template( 'single-product/meta_top.php' );
	}
}
/* woocommerce_page_title. */
if ( ! function_exists( 'tb_woocommerce_page_title' ) ) {
	function ruya_woocommerce_page_title() {
		if ( is_search() ) {
			$page_title = sprintf( esc_html__( 'Search Results: &ldquo;%s&rdquo;', 'ruya' ), get_search_query() );
			if ( get_query_var( 'paged' ) )
				$page_title .= sprintf( esc_html__( '&nbsp;&ndash; Page %s', 'ruya' ), get_query_var( 'paged' ) );
		} elseif ( is_tax() ) {
			$page_title = single_term_title( "", false );
		} elseif ( is_archive() ) {
			$page_title = esc_html__( 'Archives Products', 'ruya' );
		} elseif ( is_single() ) {
			$page_title   = get_the_title( );
		} else {
			$shop_page_id = wc_get_page_id( 'shop' );
			$page_title   = get_the_title( $shop_page_id );
		}
		return $page_title;
	}
}
/* Get a coupon value */
function wc_cart_totals_coupon_html_custom( $coupon ) {
	if ( is_string( $coupon ) ) {
		$coupon = new WC_Coupon( $coupon );
    }
	$value  = array();
	if ( $amount = WC()->cart->get_coupon_discount_amount( $coupon->code, WC()->cart->display_cart_ex_tax ) ) {
		$discount_html = '-' . wc_price( $amount );
	} else {
		$discount_html = '-' . wc_price( $amount );
	}
	$value[] = apply_filters( 'woocommerce_coupon_discount_amount_html', $discount_html, $coupon );

	if ( $coupon->enable_free_shipping() ) {
		$value[] = esc_html__( 'Free shipping coupon', 'ruya' );
    }
    // get rid of empty array elements
    $value = array_filter( $value );
	$value = implode( ', ', $value );
	echo apply_filters( 'woocommerce_cart_totals_coupon_html', $value, $coupon );
}
/* Get a shipping methods full label including price */
function wc_cart_totals_shipping_method_label_custom( $method ) {
	$label = '';//$method->label;
	if ( $method->cost > 0 ) {
		if ( WC()->cart->tax_display_cart == 'excl' ) {
			$label .= wc_price( $method->cost );
			if ( $method->get_shipping_tax() > 0 && WC()->cart->prices_include_tax ) {
				$label .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
			}
		} else {
			$label .= wc_price( $method->cost + $method->get_shipping_tax() );
			if ( $method->get_shipping_tax() > 0 && ! WC()->cart->prices_include_tax ) {
				$label .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
			}
		}
	} elseif ( $method->id !== 'free_shipping' ) {
		$label .= ' (' . esc_html__( 'Free', 'ruya' ) . ')';
	}
	return apply_filters( 'woocommerce_cart_shipping_method_full_label', $label, $method );
}
