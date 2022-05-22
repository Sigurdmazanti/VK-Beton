<?php
/*===============================================
=          How many columns in shop             =
===============================================*/
add_filter( 'loop_shop_columns', 'lw_loop_shop_columns', 50 );
function lw_loop_shop_columns( $columns ) {
    $product_categories = get_categories(array(
    'taxonomy'     => 'product_cat',
    'parent'       => 37
    ));

    foreach ($product_categories as $category) {
      $product = $category->name;
      if(is_product_category($product)) {
           $columns = 4;
      }
    }
    return $columns;
}

/*===============================================
=               INLINE W. PRODUCTS              =
===============================================*/
add_action( 'woocommerce_shop_loop', 'inline_blocks', 100 );
function inline_blocks() {
    if ( is_product_category() ) :

    global $wp_query;

    // Get the number of columns set for this query
    $columns = esc_attr( wc_get_loop_prop( 'columns' ) );

    // Get the current post count
    $current_post = $wp_query->current_post;

    if ($current_post == 8) : ?>
    </ul>
    <section class="flexible-inner-section bbh-inner-section c1-offer-block">
        <div class="grid-container">
            <?php
            $pagebreaker_title = get_field('pagebreaker_title', 'options');
            $pagebreaker_text = get_field('pagebreaker_text', 'options');
            $pagebreaker_cta = get_field('pagebreaker_cta', 'options');
            ?>
            <div class="text-container">
                <h3><?php echo $pagebreaker_title; ?></h3>
                <?php if ($pagebreaker_text): ?>
                    <?php echo $pagebreaker_text; ?>
                <?php endif; ?>
            </div>
            <?php if( $pagebreaker_cta ):
            $link_url = $pagebreaker_cta['url'];
            $link_title = $pagebreaker_cta['title'];
            $link_target = $pagebreaker_cta['target'] ? $pagebreaker_cta['target'] : '_self';
            ?>
            <button type="button" class="btn primary-button">
                <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="cta-link-text"><?php echo esc_html( $link_title ); ?></span><span class="icon-pil"></span></a>
            </button>
            <?php endif; ?>
        </div>
    </section>
    <ul>
    <?php
    endif;
    endif;
}
/*===================================================================
=         Only show the minimum price on a variable product         =
====================================================================*/
add_filter( 'woocommerce_variable_sale_price_html', 'wpglorify_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wpglorify_variation_price_format', 10, 2 );
function wpglorify_variation_price_format( $price, $product ) {

    // Main price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( 'Fra %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    // Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'Fra %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    if ( $price !== $saleprice ) {
    $price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
    }
    return $price;
}

/*============================================================
=                      Product description                   =
=============================================================*/
function generate_excerpt() {

    /* Custom field */
    if(!empty(get_field('product_description'))) { ?>
	    <?php the_field('product_description'); ?>
    <?php }
    else { ?>
        <p class="">Nullam vel hendrerit mauris. Donec mollis mauris et ipsum faucibus gravida.</p>
    <?php }
}
add_action( 'woocommerce_shop_loop_item_title', 'generate_excerpt', 40 );
