<?php
/*
 * Method process option
 * # option 1: config font
 * # option 2: process config theme
*/
if (!is_admin()):


    add_action('wp_head', 'maniva_meetup_config_theme');

    function maniva_meetup_config_theme()
    {

        // custom color for theme
        $maniva_meetup_ifcolor = ot_get_option('maniva-meetup' . '_TZTypecolor', 0);
        $maniva_meetup_color_custom = ot_get_option('maniva-meetup' . '_TZThemecustom', '');

        $maniva_meetup_color_theme = $maniva_meetup_color_footer = '';
        if ($maniva_meetup_ifcolor == 1) {
            $maniva_meetup_color_theme = $maniva_meetup_color_custom;
        }

        /* Google fonts */
        $maniva_meetup_on_off_google_font = ot_get_option('maniva-meetup' . '-select-font-theme', 1);

        // add code css
        $maniva_meetup_csscode = ot_get_option('maniva-meetup' . '_TzCustomCss', '');

        // end custom font
        if (isset ($maniva_meetup_font_body_url) && $maniva_meetup_font_body_url != "") {
            wp_enqueue_style('google-font', $maniva_meetup_font_body_url, false);
        }
        if (isset ($maniva_meetup_headerurl) && $maniva_meetup_headerurl != "") {
            wp_enqueue_style('header-font', $maniva_meetup_headerurl, false);
        }
        if (isset ($maniva_meetup_menuurl) && $maniva_meetup_menuurl != "") {
            wp_enqueue_style('menu-font', $maniva_meetup_menuurl, false);
        }
        if (isset ($maniva_meetup_customurl) && $maniva_meetup_customurl != "") {
            wp_enqueue_style('custom-font', $maniva_meetup_customurl, false);
        }


        //Background
        $maniva_meetup_default_background_type = ot_get_option('maniva-meetup' . '_background_type');
        $maniva_meetup_default_color = ot_get_option('maniva-meetup' . '_TZBackgroundColor', '#ffffff');
        $maniva_meetup_default_pattern = ot_get_option('maniva-meetup' . '_background_pattern');
        $maniva_meetup_default_single_image = ot_get_option('maniva-meetup' . '_background_single_image');
        $maniva_meetup_background = '';
        switch ($maniva_meetup_default_background_type) {
            case 'pattern':
                $maniva_meetup_background = 'body#bd {background: url(' . get_template_directory_uri() . '/images/patterns/' . $maniva_meetup_default_pattern . ') repeat scroll 0 0 transparent !important;}';
                break;
            case 'single_image':
                $maniva_meetup_background = 'body#bd {background: url(' . esc_url($maniva_meetup_default_single_image) . ') no-repeat fixed center center / cover transparent !important;}';
                break;
            case 'none':
                $maniva_meetup_background = 'body#bd {background: ' . esc_attr($maniva_meetup_default_color) . ' !important;}';
                break;
            default:
                $maniva_meetup_background = 'body#bd {background: ' . esc_attr($maniva_meetup_default_color) . ' !important;}';
                break;
        }

        //Background Breadcrumb Blog
        $maniva_meetup_bgbreadcrumbBlog_color = ot_get_option('maniva-meetup' . '_tzBreadcrumb_blogColor');
        $maniva_meetup_color_text_breadcrumb = ot_get_option('maniva-meetup' . '_tzBreadcrumb_blogTextColor');
        $maniva_meetup_bgbreadcrumbBlog = '';
        $maniva_meetup_bgbreadcrumbBlog_over = '';
        $maniva_meetup_bgbreadcrumbcolorTextBlog = '';
        $maniva_meetup_bk_images_slider_client_blog = '';

        if ($maniva_meetup_bgbreadcrumbBlog_color != '') :
            $maniva_meetup_bgbreadcrumbBlog = '.tz-sectionBreadcrumb {background-color: ' . esc_attr($maniva_meetup_bgbreadcrumbBlog_color) . ';}';
        endif;

        if ($maniva_meetup_color_text_breadcrumb != '') :

            $maniva_meetup_bgbreadcrumbcolorTextBlog = '.tz-sectionBreadcrumb .tz_breadcrumb_single_cat_title h4,.tz-sectionBreadcrumb .tz-breadcrumb h4 span,.tz-sectionBreadcrumb .tz-breadcrumb h4 span a {color: ' . esc_attr($maniva_meetup_color_text_breadcrumb) . ';}';

        endif;

        /* Background images slider client */
        $maniva_meetup_bk_images_slider_client = ot_get_option('maniva-meetup' . '_background_image_slider_client');

        if ($maniva_meetup_bk_images_slider_client != ''):
            $maniva_meetup_bk_images_slider_client_blog = '.tz_meetup_slider_blog_background { background-image: url( ' . esc_url($maniva_meetup_bk_images_slider_client) . ' ) }';
        endif;

        /* Background imagesBreadcrumb shop */
        $maniva_meetup_img_breadcrumb_shop = ot_get_option('maniva-meetup' . '_bk_breadcrumb_shop', '');
        $maniva_meetup_img_breadcrumb_shop_style = '';

        if ($maniva_meetup_img_breadcrumb_shop != '') :
            $maniva_meetup_img_breadcrumb_shop_style = '.tz-sectionBreadcrumb-shop {  background-image: url( ' . esc_url($maniva_meetup_img_breadcrumb_shop) . ' ) }';
        endif;;


        // logo
        $maniva_meetup_colorlogo = ot_get_option('maniva-meetup' . '_logoTextcolor');
        $maniva_meetup_color_custom_footer = ot_get_option('maniva-meetup' . '_TZCustomColorFooter');
        $maniva_meetup_color_custom_footer_bt = ot_get_option('maniva-meetup' . '_TZCustomColorFooterBottom');


        ?>

        <style type="text/css">

            <?php if ( $maniva_meetup_on_off_google_font == 2 ) :

            $maniva_meetup_font_content         = str_replace( '#', '', ot_get_option( 'maniva-meetup'.'-font-content','Raleway' ) );
            $maniva_meetup_font_menu            = str_replace( '#', '', ot_get_option( 'maniva-meetup'.'-font-menu','Raleway' ) );
            $maniva_meetup_font_headings        = str_replace( '#', '', ot_get_option( 'maniva-meetup'.'-font-headings','Raleway' ) );
            $maniva_meetup_font_headings_small  = str_replace( '#', '', ot_get_option( 'maniva-meetup'.'-font-headings-small','Raleway' ) );

             ?>

            body, button, input[type="submit"], input[type="reset"], input[type="button"], input[type="text"], input[type="password"], input[type="tel"],
            input[type="email"], textarea, select, .tzCounter_type p.tz-counter-title, .simple .simple-info a, .tz-footer.tz-footer-type1 .tzcopyright p, aside.widget h3.module-title span, .tz-sidebar aside.widget_search form input.Tzsearchform, aside.widget .tagcloud a, .multicolor-subscribe-form .commons, .tz-blogSingle .tz-blogSingleContent .tz-SingleContentBox span.tztag a, .tz-blogSingle .author .author-box .author-info h3 a, .tz-blogSingle .author .author-box .author-info h3 span.tz_author_meetup, .tz-blogSingle .tz_meetup_related_posts .tz_meetup_related_posts_content .tz-blog-item .tz-blog-thubnail-item-content span.entry-blog-meta, .tz-blogSingle .tzpost-pagenavi a span, .tz-blogDefault .wp-pagenavi a, .tz-blogDefault .wp-pagenavi span, .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogInfo p, .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogInfo a.tzreadmore, .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogInfo .tzinfomation small, .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogInfo .tzinfomation a, .tz-blogMasonry .wp-pagenavi a, .tz-blogMasonry .wp-pagenavi span, .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogDate .tz-DateText .tz-TextDay, .tz_meetup_woocommerce_before_shop_loop .woocommerce-result-count, .tz_meetup_woocommerce_before_shop_loop .woocommerce-ordering select.orderby, .tz_sidebar_shop_product .widget_product_search input#woocommerce-product-search-field, .tz_meetup_woocommerce_before_shop_loop .tzview-style label, .tzProduct-price a.button, .tzProduct-price span.price, .tzFooter-Shop-Multi .tz-footerBottom .tzcopyright p, span.tzquick-view, .tzProductSale, .tzShop_productRecent .tzShop_recentContainer .tzShop_recentItem .tzShop_itemInfo .tzprice ins span.amount, .tz_breadcrumb_woocommerce_title_event p, .tzShop_productRecent .tzShop_recentContainer .tzShop_recentItem .tzShop_itemInfo .tzprice span.amount, .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info > .tzProduct_description p, .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs #tab-description p, .tzShop_productRecent .tzShop_recentContainer .tzShop_recentItem .tzShop_itemInfo .tzProduct-category a, .wpcf7-form .tz_meetup_wpcf7-form p input.wpcf7-submit, .wpcf7-form .tz_meetup_wpcf7-form p span input, table tbody tr td {
                font-family: "<?php echo esc_attr($maniva_meetup_font_content); ?>", Arial, Tahoma, sans-serif;
                font-weight: 300;
            }

            .tz-headerHome nav ul.tz-nav > li > a, .tz-homeType2 .tzHeaderMenu_nav nav > ul > li > ul.non_mega_menu > li > a, .tz-homeType1 .tzHeaderMenu_nav nav > ul > li > ul.non_mega_menu > li > a {
                font-family: "<?php echo esc_attr($maniva_meetup_font_menu); ?>", Arial, Tahoma, sans-serif;
            }

            h1, h2, h3, h4, .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogInfo h4.title a, .tz_meetup_content_product_title h3 a, .tzShop_recentTitle h3, .tzShop_productRecent .tzShop_recentContainer .tzShop_recentItem .tzShop_itemInfo h4 a, .tzFooter-Shop-Multi .tz-footerTop .footerattr aside.widget h3.module-title span, .tzShopDetail_info h1, .tzShopContentDetail .tzShopDetail_Product .related h3.tzRelatedTitle span, .tzShopContentDetail .tzShopDetail_BestSell h3.tzBestSellTitle, .tzShop_productRecent h3.tzShop_recentTitle, .tz_page_content #yith-wcwl-form .wishlist-title h2, .tz_page_content .woocommerce .cart-collaterals .tzCollateralsColumn .cart_totals h2, .tz_pricing_item_header h3 {
                font-family: "<?php echo esc_attr($maniva_meetup_font_headings); ?>", Arial, Tahoma, sans-serif;
            }

            h5, h6 {
                font-family: "<?php echo esc_attr($maniva_meetup_font_headings_small); ?>", Arial, Tahoma, sans-serif;
            }

            <?php endif; ?>

            <?php if(isset($maniva_meetup_colorlogo) && !empty($maniva_meetup_colorlogo)): echo'.tz-logo-text{ color: '.esc_attr($maniva_meetup_colorlogo).' }';  endif; ?>

            /* Start Background Header */
            <?php
            $maniva_meetup_bk_img_header        =   ot_get_option('maniva-meetup'. 'bk-img_header','');

            if ( $maniva_meetup_bk_img_header !='' ) :
            ?>

            .tz_bk_img_header {
                background-image: url("<?php echo esc_url( $maniva_meetup_bk_img_header ); ?>");
            }

            <?php endif; ?>
            /* End Background Header */

            /*Start Background footer top */
            <?php
            $tz_subscribe = ot_get_option('maniva-meetup' . 'on-off-subscribe');
            $background_img_subscribe = ot_get_option('maniva-meetup' . '_background_img_subscribe');
            if($tz_subscribe != 0){
                if($background_img_subscribe != ''):
                    ?>
            .tz-footer-type4 .tz-footerTop {
                background-image: url("<?php echo esc_url( $background_img_subscribe); ?>");
                background-position: center top;
                background-repeat: no-repeat;
                background-size: cover;
            }

            <?php  endif; } ?>
            /* End Background footer top */

            /*Start on-off overlay */
            <?php
            $tz_coverlay = ot_get_option('maniva-meetup' . 'on-off-overlay', 'on');
            if ($tz_coverlay == 'on'):
                ?>
            .tz-footer-type4:before {
                content: '';
                background: rgba(0, 0, 0, 0.5);
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                z-index: 1;
            }

            <?php endif; ?>
            /* End overlay */

            /*Start Background footer bottom*/
            <?php
            $background_img_footer = ot_get_option('maniva-meetup' . '_background_img_footer');
            if($background_img_footer != ''):
                ?>
            .tz-footer-type4 .tz-footerBottom {
                background-image: url("<?php echo esc_url( $background_img_footer); ?>");
                background-position: center top;
                background-repeat: no-repeat;
                background-size: cover;
            }

            <?php  endif; ?>
            /* End Background footer bootom*/

            /* color footer */
            <?php if ( $maniva_meetup_color_custom_footer !='' ) : ?>
            .tz-footer.tz-footer-type1,
            .tz-footer .tz-footerTop {
                background-color: <?php echo esc_attr( $maniva_meetup_color_custom_footer ); ?>;
            }

            <?php endif; ?>

            <?php if ( $maniva_meetup_color_custom_footer_bt !='' ) : ?>
            .tz-footer .tz-footerBottom {
                background-color: <?php echo esc_attr( $maniva_meetup_color_custom_footer_bt ); ?>;
            }

            <?php endif; ?>

            /*social color*/
            .tzsocialfont {
                color: <?php echo esc_attr(ot_get_option('maniva-meetup' . '_social_network_color','#a6a6a6')); ?> !important;
            }

            <?php

                if($maniva_meetup_background){
                    echo esc_attr($maniva_meetup_background);
                }
                if($maniva_meetup_bgbreadcrumbBlog){
                    echo esc_attr($maniva_meetup_bgbreadcrumbBlog);
                    echo esc_attr($maniva_meetup_bgbreadcrumbBlog_over);
                }
                if ( $maniva_meetup_bgbreadcrumbcolorTextBlog ) {
                    echo esc_attr($maniva_meetup_bgbreadcrumbcolorTextBlog);
                }
                if ( $maniva_meetup_bk_images_slider_client_blog ) {
                    echo esc_attr( $maniva_meetup_bk_images_slider_client_blog );
                }
                if(isset($maniva_meetup_csscode) && !empty($maniva_meetup_csscode)){
                    echo wp_kses_allowed_html( $maniva_meetup_csscode );
                }

                if ( $maniva_meetup_img_breadcrumb_shop_style !='' ) :
                    echo esc_attr( $maniva_meetup_img_breadcrumb_shop_style );
                endif;;

                if( $maniva_meetup_color_theme ):
            ?>

            .tz-homeType2 nav ul.tz-nav > li > a:before,
            .tz_meetup_countdown .tz_meetup_countdown_time:after,
            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1,
            .bx-wrapper .bx-prev:hover,
            .bx-wrapper .bx-next:hover,
            .bx-wrapper .bx-pager.bx-default-pager a:hover,
            .bx-wrapper .bx-pager.bx-default-pager a.active,
            .bx-wrapper .bx-pager.bx-default-pager a:focus,
            .tz_slider_meetup .owl-theme .owl-controls .owl-page.active span,
            .tz_maniva_meetup_title.tz_maniva_meetup_title_type3 h3 .tz_title_line_left,
            .tz_maniva_meetup_title.tz_maniva_meetup_title_type3 h3 .tz_title_line_right,
            .wpb_tabs .wpb_tour_tabs_wrapper ul.wpb_tabs_nav.tz_meetup_tabs li.ui-tabs-active a,
            .tz_event_meetup_content .tz_meetup_box_detail::before,
            .tz_event_meetup_content .tz_meetup_box_detail:before,
            .tz_meetup_question span.tz_icon_meetup_question,
            .tz_register_meetup_pricing_item:hover .tz_register_meetup_pricing_item_container,
            .tzTwitter-slider.owl-theme .owl-controls .owl-page.active span,
            .tzTwitter-slider.owl-theme .owl-controls .owl-page span:hover,
            .tz_register_meetup_pricing_item.active .tz_register_meetup_pricing_item_container,
            .tz_image_recent_blog_meetup .tz_recent_blog_meetup_date,
            .tz-homeType1 .tz_meetup_header_option,
            .tz-homeType1 nav ul.tz-nav > li > a:before,
            .tz-blogSingle .tz-blogSingleContent .tz-SingleContentBox .tz-blogSlider ol.flex-control-nav li a.flex-active,
            aside.widget h3.module-title::before,
            .tz-sidebar aside.dw_twitter .dw-twitter-inner .tweet-item::after,
            aside.widget .multicolor-subscribe-form .mcolor-button,
            .tz-blogSingle .tz_meetup_related_posts .tz_meetup_related_posts_content .tz-blog-item:hover .tz-blog-thubnail-item-content,
            aside.widget .tagcloud a:hover,
            .tzComments .comments-area .tz-Comment ol.commentlist li article .tz-commentInfo a:hover,
            .tzComments .comments-area .tz-Comment ol.commentlist li ol.children li::before,
            .tzComments .comments-area .tz-Comment ol.commentlist li ol.children li::after,
            .tzComments .comments-area .comment-respond form.comment-form p.form-submit input.submit,
            .tz-footer.tz-footer-type1 aside.widget.MultiColorSubscribeWidget .multicolor-subscribe:before,
            .tz-footer.tz-footer-type1 aside.widget.MultiColorSubscribeWidget .multicolor-subscribe:after,
            aside.widget .tz-flickr a:after,
            .tz_our_speakers:hover .tz_our_speakers_img:before,
            span.tzquick-view,
            .tz_meetup_woocommerce_before_shop_loop .tzview-style .switchToGrid span,
            .tz_meetup_woocommerce_before_shop_loop .tzview-style .switchToList span,
            .tz_page_content .woocommerce .cart-collaterals .tzCollateralsColumn form.woocommerce-shipping-calculator section.shipping-calculator-form p button.button,
            .tz_page_content .woocommerce .cart-collaterals .tzCollateralsColumn .cart_totals .wc-proceed-to-checkout a.checkout-button,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a,
            .tzShopContentDetail .tzShopDetail_Product.tzShopDetail_NoSidebar .tzShopDetail_info .woocommerce-tabs ul.tabs li a:hover,
            .tzShopContentDetail .tzShopDetail_Product.tzShopDetail_NoSidebar .tzShopDetail_info .woocommerce-tabs ul.tabs li.active a,
            .tzShopContentDetail .tzShopDetail_Product.tzShopDetail_NoSidebar .tzShopDetail_info .woocommerce-tabs ul.tabs li a:hover,
            .tzShopContentDetail .tzShopDetail_Product.tzShopDetail_NoSidebar .tzShopDetail_info .woocommerce-tabs ul.tabs li.active a,
            .ares .tp-bullet:hover,
            .ares .tp-bullet.selected,
            .ares .tp-bullet.selected:hover .tp-bullet-title,
            .ares .tp-bullet-title,
            .tz-headerHome .navbar-toggle,
            .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogDate .tz-DateText,
            .tz-blogMasonry .wp-pagenavi a:hover,
            .tz-blogMasonry .wp-pagenavi span.current,
            .tzProductSale,
            a.tz-shop-cart span,
            .wpcf7-form .tz_meetup_wpcf7-form p input.wpcf7-submit,
            .tz_home_slider_meetup.event_slider .slides-navigation a,
            .tz_home_slider_meetup .tz_readmore .tz_btn_more,
            .tz_meetup_btn.tz_btn_h6 a.tz_meetup_btn_white:hover,
            .tz_meetup_btn a.tz_meetup_bnt_black:hover,
            .tel-pricing_table.tz_pricing_type2:hover .tel-pricing_table__footer a,
            .tz-footer-type4 .tz_footer_social_network ul li a:hover
            {
                background: <?php echo esc_attr($maniva_meetup_color_theme);?> !important;
            }

            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1,
            .bx-wrapper .bx-pager.bx-default-pager a,
            .bx-wrapper .bx-prev:hover,
            .bx-wrapper .bx-next:hover,
            .tz_slider_meetup .owl-theme .owl-controls .owl-page span,
            .wpb_tabs .wpb_tour_tabs_wrapper ul.wpb_tabs_nav.tz_meetup_tabs li.ui-tabs-active a,
            .tzTwitter-slider.owl-theme .owl-controls .owl-page span,
            .tz-blogSingle .author .author-box .author-avata .tz_author_avata,
            .tz-blogDefault .tz-blogItem .tz-blogContent .tz-blogBox,
            .tzProductContent_Grid span.tzquick-view:after,
            .tzProductSale:after,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist:after,
            #tzShopDetailSlide-carousel ul li:hover:after,
            #tzShopDetailSlide-carousel ul li.bd_active:after,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse,
            .ares .tp-bullet,
            .tz-blogMasonry .wp-pagenavi a:hover,
            .tz-blogMasonry .wp-pagenavi span.current,
            aside.widget .multicolor-subscribe-form .mcolor-button,
            span.tz_pricing_btn,
            .tz_thumb_navigation_box:hover,
            .tz_features_event_contact_form .wpcf7 input:hover, .tz_features_event_contact_form .wpcf7 input:focus,
            .tzquick-view:after,
            .tz_status_product.tz_status_product_sale:after,
            .site-shop__single_product .yith-wcwl-add-to-wishlist a.add_to_wishlist:after,
            .slides-pagination a,
            .tz_meetup_btn.tz_btn_h6 a.tz_meetup_btn_white:hover,
            .tz_meetup_btn a.tz_meetup_bnt_black:hover,
            .tel-pricing_table.tz_pricing_type2 .tel-pricing_table__footer a
            {
                border-color: <?php echo esc_attr($maniva_meetup_color_theme);?> !important;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li a:after {
                border-top-color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
            }

            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1:hover {
                background: transparent;
            }

            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1.tz_slider_meetup_btn_2,
            .tz_recent_blog_meetup button.tz_recent_blog_next_meetup:hover,
            .tz_recent_blog_meetup button.tz_recent_blog_pev_meetup:hover {
                background: transparent;
                border-color: #ffffff;
            }

            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1.tz_slider_meetup_btn_2:hover {
                background: #ffffff;
            }

            .tz_video_meetup .tz_btn_play_video a.tz_btn_easy i.fa,
            .tz_meetup_our_team_thumbnail .tz_member_meetup .tz_meetup_social a i.fa:hover,
            .tz_meetup_our_team_thumbnail .tz_member_meetup .tz_meetup_social a i.fa:hover,
            .tz_event_meetup_content .tz_meetup_box_detail p.tz_event_time,
            .tzTwitter-item span.tweet_text a,
            .TzContactInfo p a,
            .tz-footer.tz-footer-type1 aside.tzsocial a i:hover,
            .tz-blogSingle .author .author-box .author-info h3 span.tz_author_meetup,
            .tz-sidebar aside.dw_twitter .dw-twitter-inner .tweet-item .tweet-content a,
            .tzComments .comments-area .comment-respond form.comment-form p.logged-in-as a,
            .tz_meetup_slider_blog_single .tz_partner_blog_single_next:hover,
            aside.widget.tz_maniva_view_post .tz-view-post-detail .tz-view-post-date span,
            .tz-blogDefault .tz-blogItem .tz-blogContent .tz-blogBox.tz-blogBoxQuote .tz-blogQuote .tz-blogQuote_detail i.fa,
            .tz-blogDefault .tz-blogItem .tz-blogContent .tz-blogBox.tz-blogBoxQuote .tz-blogQuote .tz-blogQuote_detail span.tz-blogQuote_author,
            .tz-blogDefault .tz-blogItem .tz-blogContent .tz-blogBox a.tzreadmore span:hover,
            .tz-sidebar aside.widget ul li a:hover,
            .tz-homeType1 .tz-form-search .fa.tz-form-close,
            .tz_breadcrumb_woocommerce_title_event a:hover,
            .tz_breadcrumb_shop h4 span a,
            .woocommerce .star-rating span,
            .tzShop_productRecent .tzShop_recentContainer .tzShop_recentItem .tzShop_itemInfo .tzprice span.amount,
            a,
            .tzProductContent_Grid span.tzquick-view:after,
            .tzShopDetail_Nav .tzBackToPage:hover,
            .tzShopDetail_Product .tzShopDetail_info p.price,
            .woocommerce div.product .out-of-stock,
            .related .tzRelatedSlider_Container .tzRelatedSlider .tzRelatedsliderItem .tzProduct-info .tzProduct-infoBottom .tzProduct_price .tzprice,
            .related .tzRelatedSlider_Container .tzRelatedSlider .tzRelatedsliderItem .tzProduct-info .tzProduct-infoBottom .tzProduct_price .tzprice span.amount,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info p.price ins span.amount,
            .tz_meetup_video_sub_title,
            .tzCounter_type p.tz-counter-title,
            .tz_box_event_meetup h3,
            .tz_event_meetup_content .tz_meetup_box_detail p i.fa,
            .tz-md-modal-speakers span.md-close i.fa:hover,
            .tz_modal_speakers_social a:hover,
            .tz-homeType1 .tzHeaderMenu_nav nav > ul > li.current a,
            .tz_font_style_revo_list i,
            .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogInfo a.tzreadmore:hover,
            .tzShop_productRecent .tzShop_recentContainer .tzShop_recentItem .tzShop_itemInfo .tzprice ins span.amount,
            .tz-headerHome nav li.menu-item-has-children .non_mega_menu li.menu-item-has-children > a:after,
            .tz-headerHome nav li.menu-item-has-children .themeple_custom_menu_mega_menu .sub-menu li.menu-item-has-children > a:after,
            .tz_single_feature_box span.tz_slide_events_time_day,
            .tz_single_feature_event_meta ul li i.fa,
            .tz-footer .tz-footerTop .footerattr aside.widget_recent_entries ul li a:before,
            .tz-footer .tz-footerTop .footerattr aside.widget_categories ul li a:before,
            .tz-footer .tz-footerTop .footerattr aside.widget_nav_menu ul li a:before,
            .detail_speakers_slider .tz_list_type .tz_icon_maniva_list,
            .switch_btn_click.switch_btn_click_active,
            .switch_btn_click:hover,
            .woocommerce .site-shop__single_product div.product p.price,
            .product-quick-content .tz-entry-summary .price span,
            .tzdelete-quick i.fa,
            .woocommerce div.product form.cart .reset_variations:hover,
            .woocommerce .site-shop__single_product .woocommerce-variation-price span.price,
            .tz_page_content .woocommerce .woocommerce-info a,
            .tz_page_content .woocommerce .woocommerce-error li a,
            #customer_login p.woocommerce-LostPassword a {
                color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
            }

            .tzProduct-price span.price,
            .woocommerce a.remove,
            .tz-counter.tz_counter_type_2 .tz-counter-font i.fa,
            .tz_home_slider_meetup .tz_loca_date i,
            .tz_home_slider_meetup.event_slider .tz_content_slider_meetup .tz_meetup_social a:hover,
            .tz_md_modal_show.tz_speakers_type3 .tz_our_speakers .tz_meetup_social_speakers a:hover,
            .tz_event_time span,
            .tel-pricing_table.tz_pricing_type2 .tel-pricing_table__header p,
            .tel-pricing_table.tz_pricing_type2 .tel-pricing_table__footer a,
            .tz_recent_blog_meetup .tz_grid_blog .tz_content .tz_readmore a:hover,
            .tz-footer-type4 .tz_menu ul li a:hover,
            .tz-footer-type4 .tz-footerBottom .tzcopyright p a:hover
            {
                color: <?php echo esc_attr($maniva_meetup_color_theme);?> !important;
            }

            .tz_register_meetup_pricing_item_price,
            #jpreBar,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a,
            .tz_font_style_slider_revo:after,
            .tz_font_style_slider_revo_title_list:after,
            span.tz_pricing_btn:hover,
            .tz-headerHome nav li.menu-item-has-children ul.non_mega_menu li:hover,
            a.slide_event_link,
            a.tz_event_buy_ticket,
            .tz_slide_event_cost,
            .tz_testimonials_item_box h4:after,
            .tz_features_event_contact_form .tz_features_register_event input,
            .tz_features_event_box .excerpt:after,
            .tz_features_count_event,
            .tz_features_count_event .container,
            .tribe-events-calendar thead th,
            .tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],
            .tz_tribe_event_list_img .tribe-events-event-cost,
            .tz_status_product.tz_status_product_sale,
            .tzFeatured_product span,
            .site-shop__single_product .yith-wcwl-add-to-wishlist a.add_to_wishlist,
            .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
            .woocommerce #review_form #respond .form-submit input,
            .woocommerce .woocommerce-message a,
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
            .tz_page_content .woocommerce form.checkout .col2-set .col-1 .woocommerce-billing-fields h3:after,
            .tz_page_content .woocommerce form.checkout h3#order_review_heading:after,
            .tz_page_content .woocommerce form.checkout #order_review #payment .place-order input#place_order,
            .tz_page_content .col-2 h2:after, .tz_page_content .woocommerce #customer_login .col-1 h2:after,
            #customer_login .woocommerce-Button, .woocommerce form.login p.form-row .woocommerce-Button,
            .btn_slider_view_link:hover
            {
                background-color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
            }

            .tz_register_meetup_pricing_item:hover .tz_register_meetup_pricing_item_price:after,
            .tz_register_meetup_pricing_item.active .tz_register_meetup_pricing_item_price:after,
            .tzComments .comments-area .tz-Comment ol.commentlist li ol.children {
                border-left-color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
            }

            .tz-blogSingle .tz_meetup_related_posts .tz_meetup_related_posts_content .tz-blog-item:hover .tz-blog-thubnail-item-content:after,
            .tz_our_speakers:hover .tz_our_speakers_container,
            .tz-blogMasonry .tzBlogmasonry .blogMasonry-item .tz-blogInner .tz-blogInfo {
                border-bottom-color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
            }

            .tz_meetup_btn a.tz_meetup_bnt_orange_bk,
            .tz_recent_blog_meetup button.tz_recent_blog_next_meetup:hover,
            .tz_recent_blog_meetup button.tz_recent_blog_pev_meetup:hover,
            .tz-blogSingle .tz-blogSingleContent .tz-SingleContentBox span.tztag a:hover,
            .tz-blogDefault .wp-pagenavi span.current,
            .tz-blogDefault .wp-pagenavi a:hover, .tz-blogDefault .wp-pagenavi span:hover,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a.add_to_wishlist,
            .hesperiden.tparrows:hover,
            .detail_speakers_slider_socials a:hover,
            #tribe-events .tribe-events-button,
            .tribe-events-tickets-rsvp .button,
            .tribe-events-single .woocommerce button.button.alt,
            #tribe-events .tribe-events-button.tribe-events-ical:hover,
            .woocommerce .tzBestSell_button a:hover,
            .slides-pagination a.current,
            .slides-pagination a:hover {
                background: <?php echo esc_attr($maniva_meetup_color_theme);?>;
                border-color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
            }

            .tz-sectionBreadcrumb-shop,
            .tz_meetup_woocommerce_before_shop_loop .tzview-style .switchToGrid span:after,
            .tz_meetup_woocommerce_before_shop_loop .tzview-style .switchToList span:after,
            .tzShopContentDetail .tzShopDetail_Product.tzShopDetail_NoSidebar .tzShopDetail_info .woocommerce-tabs ul.tabs li a:after,
            .tzShopContentDetail .tzShopDetail_Product.tzShopDetail_NoSidebar .tzShopDetail_info .woocommerce-tabs ul.tabs li a:after,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse,
            .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse,
            .tz-footer .tz-footerTop .footerattr aside.widget .module-title:after,
            .woocommerce .woocommerce-message {
                border-top-color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
            }

            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1:hover {
                background: transparent !important;
            }

            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1.tz_slider_meetup_btn_2 {
                background: transparent !important;
                border-color: #ffffff !important;
            }

            .tz_slider_meetup_btn a.tz_slider_meetup_btn_1.tz_slider_meetup_btn_2:hover {
                background: #ffffff !important;
            }
            .tz_md_modal_show.tz_speakers_type3 .tz_our_speakers:hover .tz_our_speakers_img:before {
                background: rgba(0, 0, 0, 0.5) !important;
            }
            @media (max-width: 991px) {

                .tz-headerHome.tz-homeType1 button.tz-search {
                    background: <?php echo esc_attr($maniva_meetup_color_theme);?>;
                }

                .tz-headerHome .tzHeaderMenu_nav nav ul.tz-nav li a:hover {
                    border-color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
                    color: <?php echo esc_attr($maniva_meetup_color_theme);?>;
                }

            }

            <?php
            endif
        ?>

        </style>

        <?php

        if (!function_exists('has_site_icon') || !has_site_icon()) {
            if (ot_get_option('maniva-meetup' . '_favicon_onoff', 'no') == 'yes') {
                $maniva_meetup_plazart_favicon = ot_get_option('maniva-meetup' . '_favicon');
                if ($maniva_meetup_plazart_favicon) {
                    echo '<link rel="shortcut icon" href="' . esc_url($maniva_meetup_plazart_favicon) . '" type="image/x-icon" />';
                }
            }
        }

        ?>

        <?php

    }

endif

?>