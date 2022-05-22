<?php
add_action( 'generate_before_footer', 'before_footer' );
function before_footer() {
    $headline_top_left = get_field('headline_top_left', 'options');
    $text_top_left = get_field('text_top_left', 'options');
    $headline_mid_left = get_field('headline_mid_left', 'options');
    $headline_mid_right = get_field('headline_mid_right', 'options');
    $radio_btn_text = get_field('radio_btn_text', 'options');
    ?>
    <div class="icons-container grid-container">
        <span class="icon-VH-Hus-Logo"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
        <span class="icon-Jylland-JBC"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span></span>
    </div>
    <div class="main-before-footer grid-container">
        <div class="column-left">
            <h3><?php echo $headline_top_left; ?></h3>
            <?php echo $text_top_left; ?>
        </div>
        <div class="column-right">
            <form aria-label="Tilmeld nyhedsbrev" method="get">
                <input type="email" name="E-mail" placeholder="Email" required>
                <div class="radio-container">
                    <input type="radio" name="Accepter" required>
                    <label for="Accepter"><?php echo $radio_btn_text; ?> <a href="/privatlivspolitik">Læs privatlivspolitik</a></label>
                </div>
                <button type="submit" value="Submit" class="btn secondary-button">Tilmeld</button>
            </form>
        </div>
    </div>

    <!-- The headlines -->
    <div class="footer-headlines-container grid-container">
        <div class="footer-headlines">
            <h3><?php echo $headline_mid_left; ?></h3>
            <h3><?php echo $headline_mid_right; ?></h3>
        </div>
    </div>
<?php }

add_action( 'generate_after_footer_content', 'after_footer' );
function after_footer() {
    $text_bottom_left = get_field('text_bottom_left', 'options');?>
    <aside class="after-footer">
        <div class="grid-container">
            <div class="row">
                <div class="col-sm-12">
                    <p><?php echo $text_bottom_left; ?></p>
                    <div class="link-group-container">
                        <?php
                        if( have_rows('footer_links', 'options') ):
                            while( have_rows('footer_links', 'options') ) : the_row();
                                $choose_link_type = get_sub_field('choose_link_type');
                                $link_chosen = get_sub_field('link_chosen');
                                $modal_text = get_sub_field('modal_text');

                                if ($choose_link_type == 'modal') : ?>
                                    <button type="button" href="#bbh_gdpr_cookie_modal" target="_self"><?php echo $modal_text; ?></button>
                                <?php endif;
                                if ($choose_link_type == 'link') :
                                    if( $link_chosen ):
                                    $link_url = $link_chosen['url'];
                                    $link_title = $link_chosen['title'];
                                    $link_target = $link_chosen['target'] ? $link_chosen['target'] : '_self';?>

                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif;
                                endif;
                            endwhile;
                        endif;?>
                    </div>
                </div>
            </div>
        </div>
    </aside>
<?php }
