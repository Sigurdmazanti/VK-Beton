<?php
    $products_post_radio = get_sub_field('products_post_radio');
    $title               = get_sub_field('title');
    $cta_btn_section     = get_sub_field('cta_btn_section');
?>
<section class="flexible-inner-section bbh-inner-section c4-internal-products-posts">
    <div class="grid-container">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($products_post_radio == 'products') :
                    $choose_product_category   = get_sub_field('choose_product_category');
                    $category_name             = $choose_product_category[0]->name; ?>

                    <h2><?php echo $title; ?><span>/</span><a href="<?php echo get_term_link($choose_product_category[0])?>"><?php echo $category_name ?></a></h2>
                    <?php echo do_shortcode('[products limit="4" columns="4" category="' . $category_name . '" visibility="visible" orderby="popularity"]')?>

                    <?php if( $cta_btn_section ): ?>
                        <button class="btn primary-button">
                            <a href="<?php echo get_term_link($choose_product_category[0])?>" target="_self"><span class="cta-link-text"><?php echo $cta_btn_section; ?></span><span class="icon-pil"></span></a>
                        </button>
                    <?php endif; ?>

                <?php elseif ($products_post_radio == 'posts') :
                    $choose_post_cat = get_sub_field('choose_post_cat');
                    $category_link = get_term_link($choose_post_cat[0]);

                    $choose_posts = get_sub_field('choose_posts');
                    $text_sep_card = get_sub_field('text_sep_card');
                    $cta_btn_card = get_sub_field('cta_btn_card');
                    $cta_btn_blue_card = get_sub_field('cta_btn_blue_card');
                ?>
                    <h2><?php echo $title; ?></h2>
                    <ul class="columns-4">
                        <?php if ( $choose_posts) :
                            $i = 0;
                            foreach( $choose_posts as $the_post ):
                                $permalink = get_permalink( $the_post->ID );
                                $title = get_the_title( $the_post->ID );
                                $text_excerpt = get_field( 'text_excerpt', $the_post->ID );
                                $img = get_field( 'img', $the_post->ID );?>
                                <li>
                                    <ul>
                                        <li class="img-container">
                                            <?php if($img) : ?>
                                                <img class="lazyload" data-srcset="<?php echo webp($img['sizes']['medium']) ?>">
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <h3><?php echo $title; ?></h3>
                                        </li>
                                        <li>
                                            <?php echo $text_excerpt; ?>
                                        </li>
                                        <li class="btn-container">
                                            <?php if( $cta_btn_card ): ?>
                                                <button class="btn blue-btn">
                                                    <a href="<?php echo esc_url( $permalink ); ?>" target="_self"><span class="cta-link-text"><?php echo $cta_btn_card; ?></span></a>
                                                </button>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </li>

                                <?php if($i == 1) : ?>
                                    <li class="seperate-container">
                                        <ul>
                                            <li>
                                                <h3><?php echo $text_sep_card; ?></h3>
                                            </li>
                                            <li class="btn-container">
                                                <?php if( $cta_btn_card ): ?>
                                                    <button class="btn white-btn">
                                                        <a href="<?php echo esc_url( $category_link ); ?>" target="_self"><span class="cta-link-text"><?php echo $cta_btn_blue_card; ?></span></a>
                                                    </button>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endif;
                                /* Iterates the loop */
                                $i++;
                            endforeach; ?>
                            <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
