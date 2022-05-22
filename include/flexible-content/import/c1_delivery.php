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
                                    <li class="icon-li"><img class="lazyload" data-src="<?php echo $delivery_icon['sizes']['small']?>"></li>
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
