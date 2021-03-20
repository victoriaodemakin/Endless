<?php

/**
 * Filters
 *
 * @see  maniva_meetup_add_to_cart_fragment()
 */
add_filter('add_to_cart_fragments', 'maniva_meetup_add_to_cart_fragment');

/**
 * Shop Maniva Meetup WooCommerce Hooks
 */

/**
 * Layout
 *
 * @see  maniva_meetup_shop_before_content()
 * @see  maniva_meetup_shop_sidebar_top()
 * @see  maniva_meetup_shop_after_content()
 * @see  maniva_meetup_get_cart()
 * @see  maniva_meetup_sidebar_archive_product()
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


add_action( 'woocommerce_before_main_content', 'maniva_meetup_shop_before_content', 10 );

add_action( 'woocommerce_sidebar_top_page_shop', 'maniva_meetup_shop_sidebar_top', 15 );

add_action( 'woocommerce_result_catalog_ordering_page_shop', 'woocommerce_catalog_ordering', 20 );
add_action( 'woocommerce_result_catalog_ordering_page_shop', 'woocommerce_result_count', 25 );

add_action( 'maniva_meetup_get_sidebar_archive_product', 'maniva_meetup_sidebar_archive_product', 30 );

add_action( 'woocommerce_after_main_content', 'maniva_meetup_shop_after_content', 50 );

add_action( 'maniva_meetup_get_cart_item', 'maniva_meetup_get_cart', 10 );

/**
 * Products
 *
 * @see  maniva_meetup_check_in_stock_product()
 * @see  maniva_meetup_template_loop_product_open()
 * @see  maniva_meetup_template_loop_product_close()
 * @see  maniva_meetup_before_shop_loop_product()
 * @see  maniva_meetup_after_shop_loop_product()
 * @see  maniva_meetup_page_shop_recently()
 */

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'maniva_meetup_check_in_stock_product_item', 'maniva_meetup_check_in_stock_product', 10 );

add_action( 'woocommerce_before_shop_loop_item', 'maniva_meetup_template_loop_product_open', 10 );

add_action( 'woocommerce_before_shop_loop', 'maniva_meetup_before_shop_loop_product', 35 );
add_action( 'woocommerce_after_shop_loop', 'maniva_meetup_after_shop_loop_product', 5 );

add_action( 'maniva_meetup_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'maniva_meetup_after_shop_loop_item_rating', 'woocommerce_template_loop_rating', 10 );
add_action( 'maniva_meetup_after_shop_loop_item_price', 'woocommerce_template_loop_price', 10 );
add_action( 'maniva_meetup_after_shop_loop_item_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_after_shop_loop_item', 'maniva_meetup_template_loop_product_close', 15 );

add_action( 'maniva_meetup_shop_page_recently_item', 'maniva_meetup_page_shop_recently', 10 );

add_action( 'maniva_meetup_product_excerpt_list', 'woocommerce_template_single_excerpt' , 15 );

add_action( 'maniva_meetup_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'maniva_meetup_single_product_summary', 'woocommerce_template_single_excerpt', 45 );

/**
 * Single Product
 *
 * @see  maniva_meetup_before_single_product()
 * @see  maniva_meetup_after_single_product()
 * @see  maniva_meetup_single_gallery_img_open()
 * @see  maniva_meetup_single_gallery_img_closed()
 * @see  maniva_meetup_clear_shop()
 * @see  maniva_meetup_review_before_open()
 * @see  maniva_meetup_review_before_closed()
 */

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_before_single_product_summary', 'maniva_meetup_single_gallery_img_open', 5 );
add_action( 'woocommerce_before_single_product_summary', 'maniva_meetup_status_product', 10 );
add_action( 'woocommerce_before_single_product_summary', 'maniva_meetup_single_gallery_img_closed', 25 );

add_action( 'woocommerce_before_single_product', 'maniva_meetup_before_single_product', 5 );
add_action( 'woocommerce_after_single_product', 'maniva_meetup_after_single_product', 10 );

add_action( 'woocommerce_single_product_summary', 'maniva_meetup_check_in_stock_product', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 16 );
add_action( 'woocommerce_single_product_summary', 'maniva_meetup_clear_shop', 34 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 35 );

add_action( 'maniva_meetup_single_output_related_products', 'woocommerce_output_related_products', 20 );
add_action( 'maniva_meetup_single_output_best_seller_products', 'maniva_meetup_best_seller_products', 25 );

add_action( 'woocommerce_review_before', 'maniva_meetup_review_before_open', 5 );
add_action( 'woocommerce_review_before', 'maniva_meetup_review_before_closed', 15 );