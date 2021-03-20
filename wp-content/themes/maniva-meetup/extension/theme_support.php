<?php

if (function_exists('add_theme_support')) {
    // enable featured image
    add_theme_support('post-thumbnails');
    add_theme_support( 'automatic-feed-links' );
    // add theme support title-tag
    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    register_nav_menu('primary','Primary Menu');
    register_nav_menu('footer-menu','Footer Menu');
//    register_nav_menu('onepage-menu','One Page Menu');
}
?>