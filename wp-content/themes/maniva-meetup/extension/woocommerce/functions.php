<?php

/**
 * General functions used to integrate this theme with WooCommerce.
 */

add_action('after_setup_theme', 'maniva_meetup_shop_setup');

function maniva_meetup_shop_setup()
{
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

/* Start limit product */
add_filter('loop_shop_per_page', 'show_products_per_page');

function show_products_per_page()
{
    $posts_per_pages = ot_get_option('maniva-meetup' . '_TZLimitProductPageShop', 12);
    return $posts_per_pages;
}

/* End limit product */

/* Start get cart */
if (!function_exists('maniva_meetup_get_cart')):

    function maniva_meetup_get_cart()
    {

        ?>

        <a class="tz-shop-cart cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>"
           title="<?php esc_html_e('View your shopping cart', 'maniva-meetup'); ?>">

            <i class="fa fa-shopping-bag"></i>

            <span>
                    <?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count(),'maniva-meetup'), WC()->cart->get_cart_contents_count()); ?>
                </span>
        </a>

        <?php
    }

endif;

/* To ajaxify your cart viewer */
if (!function_exists('maniva_meetup_add_to_cart_fragment')) :

    function maniva_meetup_add_to_cart_fragment($maniva_meetup_fragments)
    {

        ob_start();

        do_action('maniva_meetup_get_cart_item');

        $maniva_meetup_fragments['a.cart-customlocation'] = ob_get_clean();

        return $maniva_meetup_fragments;

    }

endif;
/* End get cart */

/* Start out of stock product */
function maniva_meetup_out_of_stock()
{

    $maniva_meetup_post_id = get_the_ID();
    $maniva_meetup_stock_status = get_post_meta($maniva_meetup_post_id, '_stock_status', true);

    if ($maniva_meetup_stock_status == 'outofstock') {
        return true;
    } else {
        return false;
    }

}

/* End out of stock product */

/* Start check in stock product */
if (!function_exists('maniva_meetup_check_in_stock_product')):

    function maniva_meetup_check_in_stock_product()
    {
        if (!maniva_meetup_out_of_stock()) :

            ?>

            <span class="tzProductInStock">
                <i class="fa fa-check-square-o"></i>
                <?php esc_html_e('In Stock', 'maniva-meetup'); ?>
            </span>

        <?php
        endif;
    }

endif;
/* End check in stock product */

/* Start featured product */
function maniva_meetup_featured()
{
    global $post;
    $maniva_meetup_post_id = $post->ID;
    $maniva_meetup_featured = get_post_meta($maniva_meetup_post_id, '_featured', true);

    if ($maniva_meetup_featured == 'yes') {
        return true;
    } else {
        return false;
    }
}

/* End featured product */

/* Start Check status product*/
if (!function_exists('maniva_meetup_status_product')) {

    function maniva_meetup_status_product()
    {
        global $product;

        if (maniva_meetup_out_of_stock()) :
            ?>
            <span class="tz_status_product">
                <?php esc_html_e('Out of Stock', 'maniva-meetup'); ?>
            </span>

        <?php
        else:
            if (maniva_meetup_featured()) :
                ?>
                <div class="tzFeatured_product">
                    <span>
                        <?php esc_html_e('Featured', 'maniva-meetup') ?>
                    </span>
                </div>

            <?php elseif ($product->is_on_sale()) : ?>

                <span class="tz_status_product tz_status_product_sale">
                    <?php esc_html_e('On Sale', 'maniva-meetup'); ?>
                </span>

            <?php elseif (!$product->get_price()) : ?>

                <span class="tz_status_product tz_status_product_sale">
                    <?php esc_html_e('Free', 'maniva-meetup'); ?>
                </span>

            <?php
            endif;
        endif;
    }

}
/* End Check status product*/

/* Start Sidebar Top Page Shop */
if (!function_exists('maniva_meetup_shop_sidebar_top')) :

    function maniva_meetup_shop_sidebar_top()
    {
        if (is_active_sidebar('maniva-meetup-sidebar-shop-product')) :
            ?>

            <div class="row site-shop__sidebar-top">

                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                    <div class="tz_sidebar_shop_product">
                        <?php dynamic_sidebar('maniva-meetup' . "-sidebar-shop-product"); ?>
                    </div>
                </div>

                <?php if (!is_active_sidebar('maniva-meetup-sidebar-shop-product')): ?>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 text-right">
                        <div class="tz_shop_quick_cart_view">

                            <?php
                            /**
                             * maniva_meetup_get_cart_item hook.
                             *
                             * @hooked maniva_meetup_get_cart - 10
                             */
                            do_action('maniva_meetup_get_cart_item');

                            the_widget('WC_Widget_Cart', '');

                            ?>

                        </div>
                    </div>

                <?php else: ?>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 text-right">
                        <div class="tz_shop_quick_cart_view">

                            <?php
                            /**
                             * maniva_meetup_get_cart_item hook.
                             *
                             * @hooked maniva_meetup_get_cart - 10
                             */
                            do_action('maniva_meetup_get_cart_item');

                            the_widget('WC_Widget_Cart', '');

                            ?>

                        </div>
                    </div>

                <?php endif; ?>

            </div>

        <?php
        endif;
    }

endif;
/* End Sidebar Top Page Shop */

/* Start Sidebar Archive Product */
if (!function_exists('maniva_meetup_sidebar_archive_product')) :

    function maniva_meetup_sidebar_archive_product()
    {
        get_sidebar('archive-product');
    }

endif;
/* End Sidebar Archive Product */

/* Start Page Shop Recently */
if (!function_exists('maniva_meetup_page_shop_recently')) :

    function maniva_meetup_page_shop_recently()
    {

        $maniva_meetup_recently_viewed = '';
        $maniva_meetup_limitProductRecentlyViewed = ot_get_option('maniva-meetup' . '_TZLimitProductRecentlyViewed', '8');

        if (is_shop()):

            $maniva_meetup_recently_viewed = ot_get_option('maniva-meetup' . '_TZTextRecentlyViewed', 'recently viewed');
            $maniva_meeetup_item_recently_viewed = ot_get_option('maniva-meetup' . '_column_item_recently_viewed', '4');

            if ($maniva_meeetup_item_recently_viewed == 4) :
                $maniva_meetup_column_recently_viewed = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
            elseif ($maniva_meeetup_item_recently_viewed == 3) :
                $maniva_meetup_column_recently_viewed = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
            elseif ($maniva_meeetup_item_recently_viewed == 2) :
                $maniva_meetup_column_recently_viewed = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
            else:
                $maniva_meetup_column_recently_viewed = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
            endif;

        else:

            $maniva_meetup_column_recently_viewed = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';

        endif;

        if (is_shop()) :

            $maniva_meetup_recent_args = array(

                'post_type' => 'product',
                'stock' => 1,
                'posts_per_page' => $maniva_meetup_limitProductRecentlyViewed,
                'orderby' => 'date',
                'order' => 'DESC'

            );

        else:

            $viewed_products = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array)explode('|', $_COOKIE['woocommerce_recently_viewed']) : array();
            $viewed_products = array_filter(array_map('absint', $viewed_products));

            $maniva_meetup_recent_args = array(

                'posts_per_page' => 4,
                'no_found_rows' => 1,
                'post_status' => 'publish',
                'post_type' => 'product',
                'post__in' => $viewed_products,
                'orderby' => 'rand'

            );

        endif;

        $maniva_meetup_recent_product = new WP_Query($maniva_meetup_recent_args);

        if ($maniva_meetup_recent_product->have_posts()):

            ?>

            <div class="tzShop_productRecent">
                <div class="container">

                    <div class="tzShop_recentTitle<?php echo(is_product() ? ' tzShop_recentTitle_single_product' : ''); ?>">
                        <h3>
                            <?php if (is_product()) : ?>
                                <span class="related_line_title_left"></span>
                            <?php endif; ?>

                            <?php
                            if (is_shop()) :
                                echo esc_html($maniva_meetup_recently_viewed);
                            else:
                                esc_html_e('RECENT VIEW PRODUCT', 'maniva-meetup');
                            endif;

                            ?>

                            <?php if (is_product()) : ?>
                                <span class="related_line_title_right"></span>
                            <?php endif; ?>
                        </h3>
                    </div>

                    <div class="tzShop_recentContainer">
                        <div class="row">

                            <?php while ($maniva_meetup_recent_product->have_posts()) : $maniva_meetup_recent_product->the_post(); ?>

                                <div class="<?php echo esc_attr($maniva_meetup_column_recently_viewed); ?>">
                                    <div class="tzShop_recentItem">

                                        <div class="tzShop_itemImage">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
//                                                echo get_the_post_thumbnail(array(83, 83));
                                                echo get_the_post_thumbnail(get_the_ID());
                                                ?>
                                            </a>
                                        </div>

                                        <div class="tzShop_itemInfo">

                                            <h4>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>

                                            <div class="tzProduct-category">

                                                <?php

                                                $maniva_meetup_cat_recent_product = get_the_terms(get_the_ID(), 'product_cat');
                                                if($maniva_meetup_cat_recent_product){
                                                    foreach ($maniva_meetup_cat_recent_product as $maniva_meetup_cat_recent_product_item) :

                                                        ?>

                                                        <a href="<?php echo esc_url(get_term_link($maniva_meetup_cat_recent_product_item->term_id)); ?>">
                                                            <?php echo esc_attr($maniva_meetup_cat_recent_product_item->name); ?>
                                                        </a>

                                                    <?php endforeach;
                                                }
                                                ?>

                                            </div>

                                            <span class="tzprice">

                                                    <?php
                                                    /**
                                                     * maniva_meetup_after_shop_loop_item_price hook.
                                                     *
                                                     * @hooked woocommerce_template_loop_price - 10
                                                     */
                                                    do_action('maniva_meetup_after_shop_loop_item_price');
                                                    ?>

                                                </span>

                                        </div>
                                    </div>
                                </div>

                            <?php

                            endwhile;
                            wp_reset_postdata();

                            ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php

        endif; /* end if have_posts */
    }

endif;
/* End Page Shop Recently */

/* Start clear Shop */
if (!function_exists('maniva_meetup_clear_shop')) :

    function maniva_meetup_clear_shop()
    {
        ?>
        <div class="clearfix"></div>
        <?php
    }

endif;
/* End clear Shop */

/*
* Lay Out Shop
*/
if (!function_exists('maniva_meetup_shop_before_content')) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
     */
    function maniva_meetup_shop_before_content()
    {

        $maniva_meetup_on_off_breadcrumb_shop = ot_get_option('maniva-meetup' . 'breadcrumb-shop-on-off');
        $maniva_meetup_on_off_sidebar_archive_product = ot_get_option('maniva-meetup' . 'on-off-sidebar-archive-product', 'on');

        if ($maniva_meetup_on_off_breadcrumb_shop == 'on') :
            get_template_part('template_inc/inc', 'breadcrumb-shop');
        endif;

        ?>
        <div class="site-shop">
        <div class="container">

        <?php if (is_product()) : ?>

        <div class="tzShopDetail_Nav">
                        <span class="tzBackToPage" onclick="goBack()">
                            <i class="fa fa-angle-double-left"></i>
                            <?php esc_html_e('Back to recent page', 'maniva-meetup'); ?>
                        </span>
            <div class="tzpost-pagenavi">
                <?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?>
                <?php next_post_link('%link', '<i class="fa fa-angle-right"></i>'); ?>
            </div>
        </div>

    <?php endif; ?>

        <?php
        if (is_shop()):

            /**
             * woocommerce_sidebar_top_page_shop
             *
             * @hooked maniva_meetup_shop_sidebar_top - 15
             */


            do_action('woocommerce_sidebar_top_page_shop');


            ?>

            <div class="tz_woocommerce_archive_product_meetup">
            <div class="tz_meetup_woocommerce_before_shop_loop">

                <div class="site-shop__before-shop-loop">
                    <?php
                    /**
                     * woocommerce_result_catalog_ordering_page_shop.
                     *
                     * @hooked woocommerce_catalog_ordering - 20
                     * @hooked woocommerce_result_count - 25
                     */
                    do_action('woocommerce_result_catalog_ordering_page_shop');
                    ?>
                </div>

                <?php if ((is_active_sidebar('maniva-meetup-archive-product-column-1') || is_active_sidebar('maniva-meetup-archive-product-column-2') || is_active_sidebar('maniva-meetup-archive-product-column-3') || is_active_sidebar('maniva-meetup-archive-product-column-4')) && ($maniva_meetup_on_off_sidebar_archive_product == 'on')) : ?>

                <div class="tz_view_sidebar_archive_product_box">

                    <?php endif; ?>

                    <div class="tzview-style">
                        <label>
                            <?php esc_html_e('View Style', 'maniva-meetup'); ?>
                        </label>
                        <div class="switch_btn_click switchToGrid">
                            <i class="fa fa-th"></i>
                            <span>
                                        <?php esc_html_e('grid style', 'maniva-meetup'); ?>
                                    </span>
                        </div>
                        <div class="switch_btn_click switchToList">
                            <i class="fa fa-list"></i>
                            <span>
                                        <?php esc_html_e('list style', 'maniva-meetup'); ?>
                                    </span>
                        </div>
                    </div>

                    <?php if ((is_active_sidebar('maniva-meetup-archive-product-column-1') || is_active_sidebar('maniva-meetup-archive-product-column-2') || is_active_sidebar('maniva-meetup-archive-product-column-3') || is_active_sidebar('maniva-meetup-archive-product-column-4')) && ($maniva_meetup_on_off_sidebar_archive_product == 'on')) : ?>

                        <span class="sidebar_archive_product_click">
                                    <?php esc_html_e('Sidebar', 'maniva-meetup'); ?>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>

                    <?php endif; ?>

                    <?php if ((is_active_sidebar('maniva-meetup-archive-product-column-1') || is_active_sidebar('maniva-meetup-archive-product-column-2') || is_active_sidebar('maniva-meetup-archive-product-column-3') || is_active_sidebar('maniva-meetup-archive-product-column-4')) && ($maniva_meetup_on_off_sidebar_archive_product == 'on')) : ?>

                </div>

            <?php endif; ?>

            </div>

            <?php
            /**
             * maniva_meetup_get_sidebar_archive_product
             *
             * @hooked maniva_meetup_sidebar_archive_product - 30
             */

            if ($maniva_meetup_on_off_sidebar_archive_product == 'on') :
                do_action('maniva_meetup_get_sidebar_archive_product');
            endif;

            ?>

        <?php endif; ?>

        <?php
    }

endif;

if (!function_exists('maniva_meetup_shop_after_content')) :
    /**
     * After Content
     * Closes the wrapping divs
     */
    function maniva_meetup_shop_after_content()
    {

        if (is_shop()):
            ?>
            </div><!-- .tz_woocommerce_archive_product_meetup -->

        <?php endif; ?>

        </div><!-- .container -->

        </div><!-- .site-shop -->

        <?php

        /**
         * maniva_meetup_shop_page_recently_item
         *
         * @hooked maniva_meetup_page_shop_recently - 10
         */
        $maniva_meetup_on_off_recently = ot_get_option('maniva-meetup' . 'recently-viewed-on-off', 'on');
        $maniva_meetup_recent_view_detail = ot_get_option('maniva-meetup' . 'recent-view-product-on-off', 'on');

        if ((is_shop() && $maniva_meetup_on_off_recently == 'on') || (is_product() && $maniva_meetup_recent_view_detail == 'on')) :
            do_action('maniva_meetup_shop_page_recently_item');
        endif;

        if (is_shop() || is_product()) :
            get_template_part('template_inc/inc', 'quickview');
        endif;

    }

endif;

if (!function_exists('maniva_meetup_before_shop_loop_product')) :

    /**
     * Before open div site-shop-product
     */
    function maniva_meetup_before_shop_loop_product()
    {

        $maniva_meeetup_item_product = ot_get_option('maniva-meetup' . '_column_item_product', '4');

        if ($maniva_meeetup_item_product == 4) :
            $maniva_meetup_class_item_product = '';
        elseif ($maniva_meeetup_item_product == 3) :
            $maniva_meetup_class_item_product = ' site-shop-product__3';
        elseif ($maniva_meeetup_item_product == 2) :
            $maniva_meetup_class_item_product = ' site-shop-product__2';
        else:
            $maniva_meetup_class_item_product = ' site-shop-product__1';
        endif;
        ?>
        <div class="site-shop-product<?php echo esc_attr($maniva_meetup_class_item_product); ?> site-shop-product-grid">
        <?php
    }

endif;

if (!function_exists('maniva_meetup_after_shop_loop_product')) :
    /**
     * After close div site-shop-product
     */
    function maniva_meetup_after_shop_loop_product()
    {
        ?>
        </div><!-- .site-shop-product -->
        <?php
    }

endif;

if (!function_exists('maniva_meetup_template_loop_product_open')) :
    /**
     * woocommerce_before_shop_loop_item hook.
     *
     * @hooked maniva_meetup_template_loop_product_open - 10
     */
    function maniva_meetup_template_loop_product_open()
    {
        ?>

        <div class="tz_meetup_content_product">

        <?php

        global $product;
        $maniva_meetup_attachment_ids = $product->get_gallery_image_ids();

        $maniva_meetup_class_shop_gallery = $maniva_meetup_class_shop_gallery_list = '';

        if (count($maniva_meetup_attachment_ids) > 0 && is_shop()) :
            $maniva_meetup_class_shop_gallery = ' tz_shop_gallery';
            $maniva_meetup_class_shop_gallery_list = ' tz_shop_gallery_list';
        endif;
        $ajax_shopnonce = wp_create_nonce( "quickview-none" );

        ?>

        <div class="tz_shop_image_warp">
            <input type="hidden" class="quickview-none" value="<?php echo esc_attr($ajax_shopnonce);?>"/>
            <?php maniva_meetup_status_product(); ?>

            <div class="tz_shop_image_box">

                <div class="tz_shop_loading_box">
                    <div class="tz_shop_loader">
                        <?php esc_html_e('Loading...', 'maniva-meetup'); ?>
                    </div>
                </div>

                <!-- Start View images gallery grid -->
                <div class="tz_shop_image_product tz_shop_image_grid_product<?php echo esc_attr($maniva_meetup_class_shop_gallery); ?>">

                    <?php if (count($maniva_meetup_attachment_ids) > 0 && is_shop()) : ?>

                        <div class="tz_shop_gallery_item">
                            <?php
                            /**
                             * maniva_meetup_before_shop_loop_item_title hook.
                             *
                             * @hooked woocommerce_show_product_loop_sale_flash - 10
                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                             */
                            do_action('maniva_meetup_before_shop_loop_item_title');
                            ?>
                        </div>

                        <?php foreach ($maniva_meetup_attachment_ids as $maniva_meetup_attachment_id) : ?>

                            <div class="tz_shop_gallery_item">
                                <?php echo wp_get_attachment_image($maniva_meetup_attachment_id, ''); ?>
                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <?php

                        /**
                         * maniva_meetup_before_shop_loop_item_title hook.
                         *
                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                         */
                        do_action('maniva_meetup_before_shop_loop_item_title');

                        ?>

                    <?php endif; ?>

                </div>
                <!-- End View images gallery grid -->

                <?php if (is_shop()): ?>

                    <!-- Start View images gallery list -->
                    <div class="tz_shop_image_product tz_shop_image_list_product<?php echo esc_attr($maniva_meetup_class_shop_gallery_list); ?>">

                        <?php if (count($maniva_meetup_attachment_ids) > 0) : ?>

                            <div class="tz_shop_gallery_item" data-thumb="<?php the_post_thumbnail_url(); ?>">
                                <?php
                                /**
                                 * maniva_meetup_before_shop_loop_item_title hook.
                                 *
                                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                                 */
                                do_action('maniva_meetup_before_shop_loop_item_title');
                                ?>
                            </div>

                            <?php foreach ($maniva_meetup_attachment_ids as $maniva_meetup_attachment_id) : ?>

                                <div class="tz_shop_gallery_item"
                                     data-thumb="<?php echo wp_get_attachment_url($maniva_meetup_attachment_id); ?>">
                                    <?php echo wp_get_attachment_image($maniva_meetup_attachment_id, ''); ?>
                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <?php

                            /**
                             * maniva_meetup_before_shop_loop_item_title hook.
                             *
                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                             */
                            do_action('maniva_meetup_before_shop_loop_item_title');

                            ?>

                        <?php endif; ?>

                    </div>
                    <!-- End View images gallery list -->

                <?php endif; ?>

                <span class="tzquick-view" data-id-product="<?php echo get_the_ID(); ?>">
                        <?php esc_html_e('Quick View', 'maniva-meetup'); ?>
                    </span>

                <?php

                if (function_exists('YITH_WCWL')) :

                    ?>

                    <span class="tzwish-list">
                                <?php echo do_shortcode('[yith_wcwl_add_to_wishlist label="" product_added_text="Product added to wishlist" browse_wishlist_text="View wishlist" already_in_wishslist_text="" icon="fa fa-heart"]'); ?>
                    </span>

                <?php endif; ?>

            </div>

        </div>

        <div class="tz_meetup_content_product_sub">

            <div class="tz_meetup_content_product_title">
                <div class="tz_meetup_content_product_title_item">
                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <h4 class="tzProduct-category">
                        <?php

                        $maniva_meetup_cat_product = get_the_terms(get_the_ID(), 'product_cat');
                        if($maniva_meetup_cat_product){
                            foreach ($maniva_meetup_cat_product as $maniva_meetup_cat_product_item) :
                                ?>
                                <a href="<?php echo esc_url(get_term_link($maniva_meetup_cat_product_item->term_id)); ?>">
                                    <?php echo esc_attr($maniva_meetup_cat_product_item->name); ?>
                                </a>
                            <?php
                            endforeach;
                        }
                        ?>
                    </h4>
                </div>
                <div class="tz_meetup_title_rating_product">
                    <?php
                    /**
                     * maniva_meetup_after_shop_loop_item_rating hook.
                     *
                     * @hooked woocommerce_template_loop_rating - 10
                     */
                    do_action('maniva_meetup_after_shop_loop_item_rating');
                    ?>
                </div>
            </div>

            <div class="tzProduct-price">
                <div class="tz_price_product">
                    <?php
                    /**
                     * maniva_meetup_after_shop_loop_item_price hook.
                     *
                     * @hooked woocommerce_template_loop_price - 10
                     */
                    do_action('maniva_meetup_after_shop_loop_item_price');
                    ?>
                </div>
                <div class="tz_btn_shop_cart_quick">
                    <div class="tz_add_cart_product">
                        <?php
                        /**
                         * maniva_meetup_after_shop_loop_item_add_to_cart hook.
                         *
                         * @hooked woocommerce_template_loop_add_to_cart - 10
                         */
                        do_action('maniva_meetup_after_shop_loop_item_add_to_cart');
                        ?>
                    </div>

                    <?php if (is_shop()) : ?>

                        <div class="tzquick-view tzquick-view-list" data-id-product="<?php echo get_the_ID(); ?>">
                            <?php esc_html_e('Quick View', 'maniva-meetup'); ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <?php

            if (is_shop()) :

                do_action('maniva_meetup_product_excerpt_list');

            endif;

            ?>

        </div>

        <?php
    }
endif;

if (!function_exists('maniva_meetup_template_loop_product_close')) :
    /**
     * woocommerce_before_shop_loop_item hook.
     *
     * @hooked maniva_meetup_template_loop_product_close - 15
     */
    function maniva_meetup_template_loop_product_close()
    {
        ?>

        </div><!-- .tz_meetup_content_product -->

        <?php
    }
endif;

/**
 * Single Product
 */

add_filter('woocommerce_output_related_products_args', 'maniva_meetup_limit_related_products_args');
function maniva_meetup_limit_related_products_args($maniva_meetup_limit_args)
{
    $maniva_meetup_limit_args['posts_per_page'] = 8; // 4 related products

    return $maniva_meetup_limit_args;
}

if (!function_exists('maniva_meetup_before_single_product')) :
    /**
     * woocommerce_before_single_product hook.
     *
     * @hooked maniva_meetup_before_single_product - 5
     */

    function maniva_meetup_before_single_product()
    {

        $tzShopDetailSidebar = ot_get_option('maniva-meetup' . '_TZShopDetailSidebar');
        ?>
        <div class="site-shop__single_product">

        <?php if ($tzShopDetailSidebar == 'show') : ?>
        <div class="row">

        <?php get_sidebar('shop'); ?>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 site-shop__single_product_sidebar">

    <?php
    endif; // end if check sidebar shop
    }

endif;

if (!function_exists('maniva_meetup_after_single_product')) :
    /**
     * woocommerce_after_single_product hook.
     *
     * @hooked maniva_meetup_before_single_product - 10
     */

    function maniva_meetup_after_single_product()
    {

        $tzShopDetailSidebar = ot_get_option('maniva-meetup' . '_TZShopDetailSidebar');
        $maniva_meetup_on_off_related_products = ot_get_option('maniva-meetup' . 'related-products-on-off', 'on');
        $maniva_meetup_best_seller = ot_get_option('maniva-meetup' . 'best-seller-products-on-off', 'on');

        if ($maniva_meetup_on_off_related_products == 'on') :
            do_action('maniva_meetup_single_output_related_products');
        endif;

        if ($maniva_meetup_best_seller == 'on'):
            do_action('maniva_meetup_single_output_best_seller_products');
        endif;

        if ($tzShopDetailSidebar == 'show') :

            ?>
            </div><!-- .col-lg-9 col-md-9 col-sm-12 col-xs-12 -->
            </div><!-- .row -->

        <?php endif; ?>

        </div><!-- .site-shop__single_product -->
        <?php
    }

endif;

if (!function_exists('maniva_meetup_single_gallery_img_open')) :
    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked maniva_meetup_single_gallery_img_open - 5
     */

    function maniva_meetup_single_gallery_img_open()
    {

        ?>

        <div class="site-shop__single_gallery_img">

        <?php

    }

endif;

if (!function_exists('maniva_meetup_single_gallery_img_closed')) :
    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked maniva_meetup_single_gallery_img_closed - 25
     */

    function maniva_meetup_single_gallery_img_closed()
    {

        ?>
        </div><!-- .site-shop__single_gallery_img -->

        <?php

    }

endif;

if (!function_exists('maniva_meetup_review_before_open')):
    /**
     * woocommerce_review_before hook.
     *
     * @hooked maniva_meetup_review_before_open - 5
     */

    function maniva_meetup_review_before_open()
    {
        ?>

        <div class="site-review-avatar">

        <?php
    }

endif;

if (!function_exists('maniva_meetup_review_before_closed')):
    /**
     * woocommerce_review_before hook.
     *
     * @hooked maniva_meetup_review_before_closed - 15
     */

    function maniva_meetup_review_before_closed()
    {
        ?>

        </div><!-- .site-review-avatar -->

        <?php
    }

endif;


/**
 * Best Seller Products
 */
if (!function_exists('maniva_meetup_best_seller_products')) :

    function maniva_meetup_best_seller_products()
    {

        ?>

        <section class="tzShopDetail_BestSell">

            <h2 class="tzBestSellTitle">
                <span class="related_line_title_left">&nbsp;</span>
                <?php esc_html_e('Best Seller Products', 'maniva-meetup'); ?>
                <span class="related_line_title_right">&nbsp;</span>
            </h2>

            <div class="tzBestSellSlider owl-carousel owl-theme">
                <?php

                $maniva_meetup_sell_args = array(

                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page' => 10,
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'meta_query' => array(
                        array(
                            'key' => '_visibility',
                            'value' => array('catalog', 'visible'),
                            'compare' => 'IN'
                        )
                    )

                );

                $maniva_meetup_sell_product = new WP_Query($maniva_meetup_sell_args);

                if ($maniva_meetup_sell_product->have_posts()):
                    while ($maniva_meetup_sell_product->have_posts()) :
                        $maniva_meetup_sell_product->the_post();

                        ?>
                        <div id="tzBestSellslider_product_<?php the_ID(); ?>" class="tzBestSellsliderItem">
                            <?php

                            /**
                             * maniva_meetup_before_shop_loop_item_title hook.
                             *
                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                             */
                            do_action('maniva_meetup_before_shop_loop_item_title');

                            ?>
                            <!--                            <div class="tzBestSell_overlay"></div>-->
                            <div class="tzBestSell_Info">

                                <h3>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <?php

                                /**
                                 * maniva_meetup_after_shop_loop_item_price hook.
                                 *
                                 * @hooked woocommerce_template_loop_price - 10
                                 */
                                do_action('maniva_meetup_after_shop_loop_item_price');

                                ?>

                                <div class="tzBestSell_rating">
                                    <?php
                                    /**
                                     * maniva_meetup_after_shop_loop_item_rating hook.
                                     *
                                     * @hooked woocommerce_template_loop_rating - 10
                                     */
                                    do_action('maniva_meetup_after_shop_loop_item_rating');
                                    ?>
                                </div>

                                <div class="tzBestSell_button">

                                    <?php
                                    /**
                                     * maniva_meetup_after_shop_loop_item_add_to_cart hook.
                                     *
                                     * @hooked woocommerce_template_loop_add_to_cart - 10
                                     */
                                    do_action('maniva_meetup_after_shop_loop_item_add_to_cart');
                                    ?>


                                    <a href="<?php the_permalink() ?>">
                                        <?php esc_html_e('View Details', 'maniva-meetup'); ?>
                                    </a>
                                </div>

                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;

                ?>

            </div>

        </section>

        <?php

    }

endif;

/**
 * Ajax Quick View
 */
add_action('wp_ajax_maniva_meetup_wooview', 'maniva_meetup_wooview');
add_action('wp_ajax_nopriv_maniva_meetup_wooview', 'maniva_meetup_wooview');

function maniva_meetup_wooview()
{
    check_ajax_referer( 'quickview-none', 'security' );
    $id = intval($_POST['productid']);
    $arg_view = array(
        'post_type' => 'product',
        'p' => $id
    );

    $query_view = new WP_Query($arg_view);

    if ($query_view->have_posts()):
        while ($query_view->have_posts()):
            $query_view->the_post();

            global $product;
            $maniva_meetup_attachment_ids = $product->get_gallery_image_ids();

            ?>
            <div class="row">
                <div class="col-md-6 col-sm-6 rtl-right">
                    <div class="single-images">

                        <?php

                        maniva_meetup_status_product();

                        if (count($maniva_meetup_attachment_ids) > 0) :

                            ?>

                            <div class="single-images-gallery">

                                <div class="single-images-gallery-item" data-thumb="<?php the_post_thumbnail_url(); ?>"
                                     data-src="<?php the_post_thumbnail_url(); ?>">

                                    <?php
                                    /**
                                     * maniva_meetup_before_shop_loop_item_title hook.
                                     *
                                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                                     */
                                    do_action('maniva_meetup_before_shop_loop_item_title');
                                    ?>

                                </div>
                                <?php foreach ($maniva_meetup_attachment_ids as $maniva_meetup_attachment_id) : ?>

                                    <div class="single-images-gallery-item"
                                         data-thumb="<?php echo wp_get_attachment_url($maniva_meetup_attachment_id); ?>"
                                         data-src="<?php echo wp_get_attachment_url($maniva_meetup_attachment_id); ?>">
                                        <?php echo wp_get_attachment_image($maniva_meetup_attachment_id, ''); ?>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                        <?php

                        else:

                            /**
                             * maniva_meetup_before_shop_loop_item_title hook.
                             *
                             * @hooked woocommerce_show_product_loop_sale_flash - 10
                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                             */
                            do_action('maniva_meetup_before_shop_loop_item_title');
                        endif;

                        ?>

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 rtl-left">
                    <div class="tz-entry-summary">

                        <h1 class="product_title entry-title">
                            <?php the_title(); ?>
                        </h1>

                        <?php
                        /**
                         * maniva_meetup_after_shop_loop_item_price hook.
                         *
                         * @hooked woocommerce_template_loop_price - 10
                         */
                        do_action('maniva_meetup_after_shop_loop_item_price');

                        /**
                         * maniva_meetup_check_in_stock_product_item hook.
                         *
                         * @hooked maniva_meetup_check_in_stock_product - 10
                         */
                        do_action('maniva_meetup_check_in_stock_product_item');

                        do_action('maniva_meetup_single_product_summary');

                        ?>

                        <a class="quick_readmore" href="<?php the_permalink(); ?>">
                            <?php esc_html_e('Read More', 'maniva-meetup'); ?>
                        </a>

                    </div>
                </div>
            </div>

        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    exit();
}
