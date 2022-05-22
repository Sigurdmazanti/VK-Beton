<?php
    $abv_footer_bg_img = get_field( 'abv_footer_bg_img', 'options' );
    $abv_footer_headline = get_field( 'abv_footer_headline', 'options' );
    $abv_footer_text = get_field( 'abv_footer_text', 'options' );
    $abv_footer_cta_btn = get_field( 'abv_footer_cta_btn', 'options' );
    $abv_footer_text_bottom = get_field( 'abv_footer_text_bottom', 'options' );
    $back_to_top_btn = get_sub_field('back_to_top_btn');
?>
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
                <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="cta-link-text"><?php echo esc_html( $link_title ); ?></span><span class="icon-pil"></span></a>
                </button>
                <?php endif; ?>
                <?php echo $abv_footer_text_bottom; ?>
            </div>
        </div>
    </div>
</section>
