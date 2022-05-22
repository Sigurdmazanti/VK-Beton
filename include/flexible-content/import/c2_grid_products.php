<?php
    $c_left_top_left_img = get_sub_field('c_left_top_left_img');
    $c_left_top_left_text = get_sub_field('c_left_top_left_text');

    $c_left_top_right_img = get_sub_field('c_left_top_right_img');
    $c_left_top_right_text = get_sub_field('c_left_top_right_text');

    $c_left_large_img = get_sub_field('c_left_large_img');
    $c_left_large_text = get_sub_field('c_left_large_text');

    $c_right_large_img = get_sub_field('c_right_large_img');
    $c_right_large_text = get_sub_field('c_right_large_text');

    $c_right_bottom_left_img = get_sub_field('c_right_bottom_left_img');
    $c_right_bottom_left_text = get_sub_field('c_right_bottom_left_text');

    $c_right_bottom_right_img = get_sub_field('c_right_bottom_right_img');
    $c_right_bottom_right_text = get_sub_field('c_right_bottom_right_text');
?>

<section class="flexible-inner-section bbh-inner-section c2-grid-products">
    <div class="grid-container">
        <div class="row">
            <!-- Left column -->
            <div class="col-sm-6 left-column-grid">

                <a class="first-small-container" target="_self" href="<?php echo get_term_link($c_left_top_left_text[0]);?>">
                    <div class="grid-img-container">
                        <?php if($c_left_top_left_img) : ?>
                        <div class="img-gradient"></div>
                        <img class="lazyload" data-srcset="<?php echo webp($c_left_top_left_img['sizes']['medium']) ?>">
                        <?php endif; ?>
                            <h4><?php echo $c_left_top_left_text[0]->name;?></h4>
                    </div>
                </a>

                <a class="second-small-container" target="_self" href="<?php echo get_term_link($c_left_top_right_text[0]);?>">
                    <div class="grid-img-container">
                        <?php if($c_left_top_right_img) : ?>
                            <div class="img-gradient"></div>
                            <img class="lazyload" data-srcset="<?php echo webp($c_left_top_right_img['sizes']['medium']) ?>">
                        <?php endif; ?>
                            <h4><?php echo $c_left_top_right_text[0]->name;?></h4>
                    </div>
                </a>

                <a class="large-container" target="_self" href="<?php echo get_term_link($c_right_large_text[0]);?>">
                    <div class="grid-img-container second-small-container">
                        <?php if($c_right_large_img) : ?>
                            <div class="img-gradient"></div>
                            <img class="lazyload" data-srcset="<?php echo webp($c_right_large_img['sizes']['large']) ?>">
                        <?php endif; ?>
                            <h4><?php echo $c_right_large_text[0]->name;?></h4>
                    </div>
                </a>
            </div>

            <!-- Right column -->
            <div class="col-sm-6 right-column-grid">
                <a class="large-container" target="_self" href="<?php echo get_term_link($c_left_large_text[0]);?>">
                    <div class="grid-img-container">
                        <?php if($c_left_large_img) : ?>
                            <div class="img-gradient"></div>
                            <img class="lazyload" data-srcset="<?php echo webp($c_left_large_img['sizes']['large']) ?>">
                        <?php endif; ?>
                            <h4><?php echo $c_left_large_text[0]->name;?></h4>
                    </div>
                </a>

                <a class="first-small-container" target="_self" href="<?php echo get_term_link($c_right_bottom_left_text[0]);?>">
                    <div class="grid-img-container first-small-container">
                        <?php if($c_right_bottom_left_img) : ?>
                            <div class="img-gradient"></div>
                            <img class="lazyload" data-srcset="<?php echo webp($c_right_bottom_left_img['sizes']['medium']) ?>">
                        <?php endif; ?>
                            <h4><?php echo $c_right_bottom_left_text[0]->name;?></h4>
                    </div>
                </a>

                <a class="second-small-container" target="_self" href="<?php echo get_term_link($c_right_bottom_right_text[0]);?>">
                    <div class="grid-img-container second-small-container">
                        <?php if($c_right_bottom_right_img) : ?>
                            <div class="img-gradient"></div>
                            <img class="lazyload" data-srcset="<?php echo webp($c_right_bottom_right_img['sizes']['medium']) ?>">
                        <?php endif; ?>
                            <h4><?php echo $c_right_bottom_right_text[0]->name;?></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
