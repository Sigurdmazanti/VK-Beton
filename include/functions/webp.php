<?php
function get_http_response_code($theURL) {
    $headers = get_headers($theURL);
    return substr($headers[0], 9, 3);
}

function webp($img_src){
    if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false || strpos( $_SERVER['HTTP_ACCEPT'], 'webp' ) !== false || $_SERVER['HTTP_ACCEPT'] == '*/*' ) {
        $webp_img = $img_src.'.webp';
        if ( get_http_response_code($webp_img) && intval(get_http_response_code($webp_img)) < 400 || file_exists($webp_img)) {
          $img_src = $webp_img;
        }
    }
    return $img_src;
}
