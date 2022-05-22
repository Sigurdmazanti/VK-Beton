<?php add_action( 'generate_before_header','before_header' );
function before_header() { ?>
        <!-- Before header -->
        <aside class="before-header">
            <div class="grid-container">
                <ul class="delivery-container">
                    <?php if( have_rows('header_delivery_info', 'options') ):
                        while( have_rows('header_delivery_info', 'options') ) : the_row();
                            $header_delivery_type = get_sub_field('header_delivery_type', 'options');
                            $header_delivery_text = get_sub_field('header_delivery_text', 'options');?>
                            <li class="delivery-column"><span class="icon-kranbil"></span><?php echo $header_delivery_type; ?>:<span class="delivery-text-bold"><?php echo $header_delivery_text; ?></span></li>
                        <?php endwhile;
                    endif;?>
                </ul>
                <div class="before-header-links">
                    <?php if( have_rows('header_links_list', 'options') ):
                        while( have_rows('header_links_list', 'options') ) : the_row();
                            $header_link = get_sub_field('header_link', 'options');
                            if( $header_link ):
                                $link_url = $header_link['url'];
                                $link_title = $header_link['title'];
                                $link_target = $header_link['target'] ? $header_link['target'] : '_self';?>

                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        <?php endwhile;
                    endif;?>
                </div>
            </div>
        </aside>
    <?php }?>

    <?php add_action( 'generate_before_header_content','inside_header' );
    function inside_header() {?>
        <!-- Main container start-->
            <div class="after-delivery-wrapper">
                <div class="grid-container">
                    <div class="after-delivery-container">
                        <div class="icon-container">
                            <a href="/" target="_self">
                                <span class="icon-VH-Hus-Logo"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                                <span class="icon-Jylland-JBC"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
                            </a>
                        </div>

                    <!-- Search bar -->
                    <?php echo do_shortcode('[fibosearch]'); ?>
                        <!-- WooCommerce buttons -->
                        <div class="button-wc-icons-container">
                            <?php $header_cta_btn = get_field('header_cta_btn', 'options');
                            if( $header_cta_btn ):
                                $link_url = $header_cta_btn['url'];
                                $link_title = $header_cta_btn['title'];
                                $link_target = $header_cta_btn['target'] ? $header_cta_btn['target'] : '_self';?>
                                <button class="btn primary-button">
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="cta-link-text"><?php echo esc_html( $link_title ); ?></span><span class="icon-pil"></span></a>
                                </button>
                            <?php endif; ?>
                            <div class="wc-icons">
                                <div class="cart-container">
                                    <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                                        <div class="icon-indkoebsvogn">
                                            <div class="cart-contents">
                                                <span><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() );?></span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="cartbox">
                                      <div class="cartbox-summary">
                                        <ul>
                                           <li>
                                                <!-- Mini Cart Details -->
                                                <?php
                                                    defined( 'ABSPATH' ) || exit;
                                                    do_action( 'woocommerce_before_mini_cart' );
                                                ?>
                                                <?php if ( ! WC()->cart->is_empty() ) : ?>
                                                  <ul class="woocommerce-mini-cart cart_list product_list_widget">
                                                    <?php do_action( 'woocommerce_before_mini_cart_contents' );

                                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                      $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                      $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                        $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                                                        $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                        $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                        ?>

                                                    <!-- Remove -->
                                                    <li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                                                        <!-- X -->
                                                        <span class="x-remove">
                                                         <?php
                                                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                              'woocommerce_cart_item_remove_link',
                                                              sprintf(
                                                                '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                esc_attr__( 'Remove this item', 'woocommerce' ),
                                                                esc_attr( $product_id ),
                                                                esc_attr( $cart_item_key ),
                                                                esc_attr( $_product->get_sku() )
                                                              ),
                                                              $cart_item_key
                                                            ); ?>
                                                        </span>
                                                    <div class="item-info">
                                                        <!-- Thumbnail -->
                                                        <span class="cartbox-img"> <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> </span>
                                                        <span class="cartbox-info"> <?php echo wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> </span>

                                                        <!-- Quantity & Price -->
                                                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        <?php
                                                        }
                                                      }

                                                      do_action( 'woocommerce_mini_cart_contents' );
                                                      ?>
                                                    </div>
                                                    </li>
                                                </li>
                                                <!-- Total -->
                                                <li>
                                                    <span class="cartbox-total-title">
                                                      Total:
                                                    </span>
                                                    <span class="cartbox-total-price">
                                                    <?php echo sprintf ( _n( '%d produkt', '%d produkter', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?>
                                                    </span>
                                                  </li>

                                               </ul>
                                               <a class="cartbox-checkout primary-btn" href="/kasse">Checkout</a>
                                               <a class="cartbox-checkout primary-btn" href="/kurv">Kurv</a>
                                            </li>
                                        </ul>

                                        <!-- If cart is empty -->
                                        <?php else : ?>

                                            <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

                                        <?php endif; ?>
                                        <?php do_action( 'woocommerce_after_mini_cart' ); ?>
                                      </div>
                                      </div>
                                </div>
                                <!-- My account icon -->
                                <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
                                    <div class="icon-person"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php }

add_action( 'generate_after_header','after_header' );
function after_header() { ?>
    <aside class="after-header">
        <div class="grid-container">
            <?php $black_bar_link = get_field('black_bar_link', 'options');
            if( $black_bar_link ):
                $link_url = $black_bar_link['url'];
                $link_title = $black_bar_link['title'];
                $link_target = $black_bar_link['target'] ? $black_bar_link['target'] : '_self';?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="icon-flueben"></span><?php echo esc_html( $link_title ); ?></a>
            <?php endif;?>
        </div>
    </aside>
<?php }
/*===============================================
=               MOBILE NAVIGATION               =
===============================================*/
/* Inside slideout nav */
add_action( 'generate_inside_slideout_navigation','inside_mobile_nav' );
function inside_mobile_nav() {
    $mobile_navigation_logo = get_field('mobile_navigation_logo', 'options');
    ?>
    <?php if($mobile_navigation_logo) : ?>
        <a href="/" target="_self">
            <img class="lazyload" data-srcset="<?php echo webp($mobile_navigation_logo['sizes']['small']) ?>">
        </a>
    <?php endif; ?>
<?php }

/* Main nav on mobile  */
add_action( 'generate_inside_mobile_header', 'mobile_nav' );
function mobile_nav() {?>

<div class="after-delivery-container">
    <div class="icon-container">
        <a href="/" target="_self">
            <img class="lazyload" data-src="wp-content/uploads/2022/05/vk-beton-logo-simpel.png" alt="VK Beton logo">
        </a>
    </div>
</div>
<div class="search-button">
    <button aria-label="Search products" type="button" name="button" id="showSearch">
        <span class="icon-seach"></span>
    </button>
</div>
    <?php echo do_shortcode('[fibosearch]'); ?>

    <!-- WooCommerce buttons -->
    <div class="button-wc-icons-container">
        <div class="wc-icons">
            <div class="cart-container">
                <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                    <div class="icon-indkoebsvogn">
                        <div class="cart-contents">
                            <span><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() );?></span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- My account icon -->
            <a class="account-icon" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
                <div class="icon-person"></div>
            </a>
        </div>
    </div>
<?php }?>
