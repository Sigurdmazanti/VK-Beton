<?php
    $headline = get_sub_field('headline');
    $text = get_sub_field('text');
    $product = get_sub_field('product');
    $cta_btn_left = get_sub_field('cta_btn_left');
    $cta_btn_right = get_sub_field('cta_btn_right');
?>

<section class="flexible-inner-section bbh-inner-section c2-promo-product">
    <div class="grid-container">
        <div class="row">
            <?php if( $product ): ?>
                <?php foreach( $product as $featured_post ):
                    $permalink = get_permalink( $featured_post->ID );
                    $title = get_the_title( $featured_post->ID );
                    $featured_image = get_the_post_thumbnail( $featured_post->ID ); ?>

                    <div class="col-sm-6 text-column">
                        <div class="text-container">
                            <h1><?php echo $headline; ?></h1>
                            <?php echo $text; ?>
                        </div>
                    </div>

                    <div class="col-sm-6 image-column">
                        <?php if($featured_image) :
                            echo $featured_image;
                        endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="button-container">
                <button type="button" class="btn secondary-button">
                    <a href="<?php echo $permalink; ?>" target="_self"><?php echo $cta_btn_left;?></a>
                </button>
                <?php if( $cta_btn_right ):
                $link_url = $cta_btn_right['url'];
                $link_title = $cta_btn_right['title'];
                $link_target = $cta_btn_right['target'] ? $cta_btn_right['target'] : '_self';
                ?>
                <button type="button" class="promo-btn-secondary">
                    <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
