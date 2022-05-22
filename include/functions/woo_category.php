<?php add_action( 'woocommerce_after_main_content', 'delivery_prices', 10 );
/* ================= GLOBAL ===================*/
/*===============================================
=                  DELIVERY PRICES              =
===============================================*/
function delivery_prices() { ?>
    <?php
        $delivery_headline = get_field('delivery_headline', 'options');
    ?>
    <section class="flexible-inner-section bbh-inner-section c1-delivery-section">
        <div class="grid-container">
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php echo $delivery_headline; ?></h2>
                    <ul class="delivery-section-container">
                        <?php if( have_rows('delivery_list', 'options') ):
                            while( have_rows('delivery_list', 'options') ) : the_row();
                                $delivery_icon = get_sub_field('delivery_icon', 'options');
                                $delivery_text = get_sub_field('delivery_text', 'options');?>
                                    <li class="delivery-text-icon-column">
                                        <ul>
                                            <li class="icon-li"><img src="<?php echo $delivery_icon['sizes']['thumbnail']?>"></li>
                                            <li><?php echo $delivery_text; ?></li>
                                        </ul>
                                    </li>
                            <?php endwhile;
                        endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php }?>

<?php
/*===============================================
=                  BACK TO TOP                  =
===============================================*/
add_action( 'woocommerce_after_main_content', 'woocommerce_to_top', 10 );
function woocommerce_to_top() { ?>
    <?php
        $abv_footer_bg_img = get_field( 'abv_footer_bg_img', 'options' );
        $abv_footer_headline = get_field( 'abv_footer_headline', 'options' );
        $abv_footer_text = get_field( 'abv_footer_text', 'options' );
        $abv_footer_cta_btn = get_field( 'abv_footer_cta_btn', 'options' );
        $abv_footer_text_bottom = get_field( 'abv_footer_text_bottom', 'options' );
        $back_to_top_btn = get_sub_field('back_to_top_btn');
    ?>
    <div class="above-footer-back-to-top">
        <button id="toTop" class="back-to-top-btn"><span class="icon-pil-op"></span></button>
        <div class="above-footer-bar"></div>
    </div>
    <section class="flexible-inner-section bbh-inner-section c1-above-footer bg lazyload" data-bgset="<?php echo webp($abv_footer_bg_img['sizes']['large']) ?>">
        <div class="white-gradient-layout"></div>
        <div class="grid-container">
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php echo $abv_footer_headline; ?></h2>
                    <?php echo $abv_footer_text; ?>
                    <?php if( $abv_footer_cta_btn ):
                    $link_url = $abv_footer_cta_btn['url'];
                    $link_title = $abv_footer_cta_btn['title'];
                    $link_target = $abv_footer_cta_btn['target'] ? $abv_footer_cta_btn['target'] : '_self';
                    ?>
                    <button class="btn primary-button">
                    <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="icon-pil"></span></a>
                    </button>
                    <?php endif; ?>
                    <?php echo $abv_footer_text_bottom; ?>
                </div>
            </div>
        </div>
    </section>
<?php }?>
<?php
/*===============================================
=                  OFFERS BLOCK                 =
===============================================*/
/* ============ ON MAIN CATEGORIES =========== */
add_action( 'woocommerce_after_shop_loop', 'find_offer_block', 10 );
function find_offer_block() {
    $args = array(
        'taxonomy'     => 'product_cat',
        'parent'       => 0
    );
    $categories = get_categories($args);
    foreach ($categories as $category) {
        $current_category = $category->name;
        if( is_product_category( $current_category) ) {?>
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
        <?php }
    }
}?>
<?php
/*===============================================
=                  C3 - POSTS                   =
===============================================*/
add_action( 'woocommerce_after_shop_loop', 'show_posts', 10 );
function show_posts() {
    $args = array(
        'taxonomy'     => 'product_cat',
        'parent'       => 0
    );
    $categories = get_categories($args);
    if( $categories ) {
        $object = get_queried_object();
        $objectID = $object->term_id;
        $post_id = 'category_' . $objectID;
        $choose_posts = get_field( 'choose_posts', $post_id );?>
       <section class="flexible-inner-section bbh-inner-section c3-internal-posts">
           <div class="grid-container">
               <ul class="post-list">
                <?php if( $choose_posts ):
                    foreach( $choose_posts as $post ):
                       $permalink = get_permalink( $post->ID );
                       $category = get_the_category( $post->ID )[0]->name;
                       $title = get_the_title( $post->ID );
                       $text_excerpt = get_field( 'text_excerpt', $post->ID );
                       $img = get_field( 'img', $post->ID );?>
                       <a href="<?php echo esc_url( $permalink ); ?>" target="_self">
                           <li class="c1-post">
                                <?php if($img) : ?>
                                   <img class="lazyload" data-srcset="<?php echo webp($img['sizes']['medium']) ?>">
                                <?php endif; ?>
                                <aside><?php echo $category; ?></aside>
                                <h4><?php echo $title; ?></h4>
                            </li>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
                </ul>
           </div>
       </section>
    <?php }
}?>

<?php
/*===============================================
=            C4 - FEATURED PRODUCTS             =
===============================================*/
add_action( 'woocommerce_after_shop_loop', 'category_featured_products', 10 );
function category_featured_products( $args = array() ) {
    $args = array(
        'taxonomy'     => 'product_cat',
        'parent'       => 0
    );
    $categories = get_categories($args);
    if( $categories ) {
        $object = get_queried_object();
        $objectID = $object->term_id;
        $post_id = 'category_' . $objectID;
        $choose_featured_products = get_field( 'choose_featured_products', $post_id );?>
       <section class="flexible-inner-section bbh-inner-section c4-featured-products">
           <div class="grid-container">
               <ul class="post-list products">
                <?php if( $choose_featured_products ):
                    foreach( $choose_featured_products as $products ):
                        $single_product = wc_get_product( $products->ID );
                        $featured_image = get_the_post_thumbnail( $products->ID );
                        $price = $single_product->get_price();
                        $title = $single_product->get_title();
                        $permalink = get_permalink( $products->ID );
                        ?>

                           <li class="c1-featured-product product">
                                <?php if($featured_image) :
                                   echo $featured_image;
                                endif; ?>
                                <h2 class="woocommerce-loop-product__title"><?php echo $title;?></h2>
                                <span class="price">
                                    <span class="price-amount">
                                        <?php echo woocommerce_price($price);?>
                                    </span>
                                </span>
                            </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                </ul>
           </div>
       </section>
    <?php }
}?>

<?php
/*===============================================
=              TIPS & TRICKS BLOCK              =
===============================================*/
add_action( 'woocommerce_after_shop_loop', 'tips_tricks_block', 10 );
function tips_tricks_block() {
    $args = array(
        'taxonomy'     => 'product_cat',
        'parent'       => 0
    );
    $categories = get_categories($args);
    foreach ($categories as $category) {
        $current_category = $category->name;
        if( is_product_category( $current_category) ) {?>
           <section class="flexible-inner-section bbh-inner-section c1-offer-block">
               <div class="grid-container">
                    <?php
                    $second_pagebreaker_title = get_field('pagebreaker_title_2', 'options');
                    $second_pagebreaker_text = get_field('pagebreaker_text_2', 'options');
                    $second_pagebreaker_cta = get_field('pagebreaker_cta_2', 'options');
                    ?>
                    <div class="text-container">
                        <h3><?php echo $second_pagebreaker_title; ?></h3>
                        <?php echo $second_pagebreaker_text;?>
                    </div>
                    <?php if( $second_pagebreaker_cta ):
                    $link_url = $second_pagebreaker_cta['url'];
                    $link_title = $second_pagebreaker_cta['title'];
                    $link_target = $second_pagebreaker_cta['target'] ? $second_pagebreaker_cta['target'] : '_self';
                    ?>
                    <button type="button" class="btn primary-button">
                         <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="cta-link-text"><?php echo esc_html( $link_title ); ?></span><span class="icon-pil"></span></a>
                    </button>
                    <?php endif; ?>
               </div>
           </section>
        <?php }
    }
}?>
