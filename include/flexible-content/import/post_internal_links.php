<?php
    $layout_choice = get_sub_field('layout_choice');
    $post_category_radio = get_sub_field('post_category_radio');
    $news_posts = get_sub_field('news_post_list');
    if( $news_posts ):
        foreach( $news_posts as $news_post ):
            $permalink = get_permalink( $news_post->ID );
            $title = get_the_title( $news_post->ID );
            $text_excerpt = get_field( 'text_excerpt', $news_post->ID );
            $img = get_field( 'img', $news_post->ID );
        endforeach;
    endif;

    if($post_category_radio == 'newspost') {
        $subhead = get_sub_field('subhead');
        $cta_btn = get_sub_field('cta_btn');
    ?>
<section class="flexible-inner-section bbh-inner-section c2-news-post">
    <div class="grid-container">
        <div class="row">
            <div class="col-sm-6 <?php echo $layout_choice; ?>">
                <?php if($img) : ?>
                     <img class="lazyload" data-srcset="<?php echo webp($img['sizes']['medium']) ?>">
                <?php endif; ?>
            </div>

            <div class="col-sm-6">
                <div class="news-post-text-container <?php echo $layout_choice; ?>">
                    <aside><?php echo $subhead; ?></aside>
                    <h2><?php echo $title; ?></h2>
                    <p><?php echo $text_excerpt; ?></p>
                    <?php if( $cta_btn ): ?>
                    <button class="btn primary-button">
                    <a href="<?php echo esc_url( $permalink ); ?>" target="_self"><span class="cta-link-text"><?php echo $cta_btn; ?></span><span class="icon-pil"></span></a>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }

if($post_category_radio == 'diy') {?>
    <section class="flexible-inner-section bbh-inner-section c2-news-post">
        <div class="grid-container">
            <div class="row">
                <div class="col-sm-6 <?php echo $layout_choice; ?>">
                    <?php if($img) : ?>
                         <img class="lazyload" data-srcset="<?php echo webp($img['sizes']['medium']) ?>">
                    <?php endif; ?>
                </div>

                <div class="col-sm-6">
                    <div class="news-post-text-container <?php echo $layout_choice; ?>">
                        <aside><?php echo $subhead; ?></aside>
                        <h2><?php echo $title; ?></h2>
                        <p><?php echo $content; ?></p>
                        <?php if( $cta_btn ):
                        $link_url = $cta_btn['url'];
                        $link_title = $cta_btn['title'];
                        $link_target = $cta_btn['target'] ? $cta_btn['target'] : '_self';
                        ?>
                        <button class="btn primary-button">
                            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="icon-pil"></span></a>
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }?>
