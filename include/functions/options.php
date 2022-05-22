<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Indstillinger',
        'menu_title'    => 'Indstillinger',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Header indstillinger',
        'menu_title'    => 'Header indstillinger',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Pagebreaker blokke',
        'menu_title'    => 'Pagebreaker blokke',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Over footer sektion',
        'menu_title'    => 'Over footer sektion',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Fragt/leverings sektion',
        'menu_title'    => 'Fragt/leverings sektion',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer indstillinger',
        'menu_title'    => 'Footer indstillinger',
        'parent_slug'   => 'theme-general-settings',
    ));
}
