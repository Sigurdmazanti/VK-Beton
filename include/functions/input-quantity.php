<?php
/*======================================================================
=      Input field add to cart on product display and + / - icons      =
======================================================================*/
add_filter( 'woocommerce_loop_add_to_cart_link', function( $html, $product ) {
    if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
        $html = '<form aria-label="Vælg produktantal" action="' . esc_url( $product->add_to_cart_url() ) . '" class="wcb2b-quantity" method="post" enctype="multipart/form-data">';
        $html .= '<div class="math-qty-container"><button type="button" class="minus"><span class="icon-math-minus"></span></button>';
        $html .= woocommerce_quantity_input( array(), $product, false ) . '<button type="button" class="plus"><span class="icon-math-plus"></span></button></div>';
        $html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
        $html .= '</form>';
    }
    return $html;
}, 10, 2 );

/*======================================================================
=                       Setting quantity values                        =
======================================================================*/
/* Simple products */
add_filter( 'woocommerce_quantity_input_args', 'jk_woocommerce_quantity_input_args', 10, 2 );
function jk_woocommerce_quantity_input_args( $args, $product ) {

	$args['input_value'] = 0;

	$args['max_value'] 	 = 10; 	// Maximum value
	$args['min_value'] 	 = 0;   // Minimum value
	$args['step'] 		 = 1;   // Quantity steps
	return $args;
}

/* Variable products */
add_filter( 'woocommerce_available_variation', 'jk_woocommerce_available_variation' ); // Variations
function jk_woocommerce_available_variation( $args ) {
	$args['max_qty'] = 80; 		// Maximum value (variations)
	$args['min_qty'] = 1;   	// Minimum value (variations)
    $args['step'] 	 = 1;       // Quantity steps
	return $args;
}
