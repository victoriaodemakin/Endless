"use strict";

function TzTemplateResizeImage(obj){
    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    obj.each(function (i,el){

        heightStage = jQuery(this).height();

        widthStage = jQuery (this).width();

        var img_url = jQuery(this).find('img').attr('src');

        var image = new Image();
        image.src = img_url;

        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;

        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });

    });

}

jQuery(document).ready(function() {

    /* Start popup slider */
    if ( jQuery('.popup-slider').length ) {

        jQuery(".owl-gallery-item").each(function(){

            var $item_client = jQuery(this).data('item');

            jQuery(this).owlCarousel({
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    767:{
                        items:1
                    },
                    1199:{
                        items:1
                    },
                    1500:{
                        items:1
                    }
                },
                dots:false,
                slideSpeed:1000,
                paginationSpeed:1000,
                smartSpeed: 1000,
                autoplay: false,
                autoplayTimeout: 5000,
                loop:true,
                nav:true
            });


            // jQuery('.tz_partner_blog_single_prev').click(function(){
            //     jQuery(this).parents('.tz_meetup_slider_blog_single').find('.tz_meetup_slider_blog_images').trigger('prev.owl.carousel');
            // });
            // jQuery('.tz_partner_blog_single_next').click(function(){
            //     jQuery(this).parents('.tz_meetup_slider_blog_single').find('.tz_meetup_slider_blog_images').trigger('next.owl.carousel');
            // });

        });

    }
    /* End popup slider */

    /* Start loading */
    jQuery('body').jpreLoader({
        splashID: "#jSplash",
        loaderVPos: '0',
        autoClose: true,
        closeBtnText: "",
        showPercentage:false,
        showSplash: false
    });

    jQuery('div.rs-background-video-layer').prepend('<div class="bk-responsive-slide"></div>');
    /* End loading */

    /* Start back to top */
    jQuery('.tz-backtotop').click(function(){
        jQuery('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });
    /* End back to top */

    /* Start Method for Search */
    var $tz_search          =   jQuery('.tz-search');
    var $tz_search_header_3 =   jQuery('.tz-search-header3');

    if ( $tz_search.length ) {
        $tz_search.click(function(){
            jQuery('.tz-form-search').css('display','block');
            jQuery('.tz-form-search .tz-search-input').focus();
        }) ;
        jQuery('.tz-form-close').click(function(){
            jQuery('.tz-form-search').css('display','none');
        });
    }

    if ( $tz_search_header_3.length ) {
        $tz_search_header_3.click(function(){
            jQuery('.tz-form-search').css('display','block');
            jQuery('.tz-form-search .tz-search-input').focus();
        }) ;
        jQuery('.tz-form-close').click(function(){
            jQuery('.tz-form-search').css('display','none');
        });
    }
    /* End Method for Search */

    /* Start Mobile Menu */
    var $menu_item_has_children =   jQuery('.menu-item-has-children');

    if ( $menu_item_has_children.length ) {

        jQuery('.menu-item-has-children > a').after( "<span class='icon_menu_item_mobile'></span>" );

        var $icon_menu_item_mobile  =   jQuery('.icon_menu_item_mobile');

        $icon_menu_item_mobile.each(function () {

            jQuery(this).click(function () {
                jQuery(this).toggleClass('icon_menu_item_mobile_active', 400);
                jQuery(this).parents('.menu-item-has-children').first().find('.sub-menu,.dropdown-mega').first().slideToggle("400");
            })
        })

    }
    /* End Mobile Menu */

    /* Start prettyPhoto for image gallery modal popup */
    var $tz_prettyPhoto =   jQuery("a[data-rel^='prettyPhoto']");

    if ( $tz_prettyPhoto.length ) {
        $tz_prettyPhoto.prettyPhoto({
            social_tools: false,
            hook: 'data-rel'
        });
    }
    /* End prettyPhoto for image gallery modal popup */

    /* Start client slider */
    if ( jQuery('.maniva_meetup_slider_blog').length ) {

        jQuery(".tz_meetup_slider_blog_images").each(function(){

            var $item_client = jQuery(this).data('item');

            jQuery(this).owlCarousel({
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    767:{
                        items:3
                    },
                    1199:{
                        items:4
                    },
                    1500:{
                        items:$item_client
                    }
                },
                dots:false,
                slideSpeed:1000,
                paginationSpeed:1000,
                smartSpeed: 1000,
                autoplay: false,
                autoplayTimeout: 5000,
                loop:true,
                nav:false
            });


            jQuery('.tz_partner_blog_single_prev').click(function(){
                jQuery(this).parents('.tz_meetup_slider_blog_single').find('.tz_meetup_slider_blog_images').trigger('prev.owl.carousel');
            });
            jQuery('.tz_partner_blog_single_next').click(function(){
                jQuery(this).parents('.tz_meetup_slider_blog_single').find('.tz_meetup_slider_blog_images').trigger('next.owl.carousel');
            });

        });

    }
    /* End client slider */

    /* Start jquery single share */
    var p_share =   jQuery('.p-share');

    if ( p_share.length ) {

        p_share.each(function () {

            var $share_if = true;
            jQuery(this).click(function(){
                if ( $share_if === true ){
                    jQuery('.share-wrap-content').addClass('share-wrap-full');
                    $share_if = false;
                }else{
                    jQuery('.share-wrap-content').removeClass('share-wrap-full');
                    $share_if = true;
                }

            });

        })

    }
    /* End jquery single share */

    /* Start tz_shop_gallery */
    var tz_shop_gallery = jQuery( '.tz_shop_gallery' );

    if ( tz_shop_gallery.length ) {

        tz_shop_gallery.each( function () {
            jQuery(this).lightSlider({
                item: 1,
                slideMargin: 0,
                pager: false,
                speed: 800,
                prevHtml: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                nextHtml: '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            });
        } )

    }
    /* End tz_shop_gallery */

    /* Start tz_shop_gallery_list */
    var tz_shop_gallery_list = jQuery( '.tz_shop_gallery_list' );

    if ( tz_shop_gallery_list.length ) {

        tz_shop_gallery_list.each( function () {
            jQuery(this).lightSlider({
                gallery:true,
                item:1,
                vertical:true,
                verticalHeight:257,
                thumbItem:4,
                thumbMargin:4,
                slideMargin:0,
                controls: false,
                auto: true,
                speed: 1000,
                loop: true,
                responsive : [
                    {
                        breakpoint:1200,
                        settings: {
                            verticalHeight:280
                        }
                    }
                ]
            });
        } )

    }
    /* End tz_shop_gallery_list */

    /* Start related products title */
    var related_product         =   jQuery( '.site-shop__single_product .related' );

    if ( related_product.length ) {

        var related_product_title   =   jQuery( '.site-shop__single_product .related h2' );

        related_product_title.prepend( "<span class='related_line_title_left'>&nbsp;</span>" ).append( "<span class='related_line_title_right'>&nbsp;</span>" );

        related_product.find('ul.products').addClass( 'owl-carousel owl-theme' );

    }
    /* End related products title */

    /* start sidebar archive product */
    var sidebar_archive_product_click   =   jQuery( '.sidebar_archive_product_click' );

    if ( sidebar_archive_product_click.length ) {

        sidebar_archive_product_click.on( 'click', function () {
            jQuery(this).parents( '.tz_woocommerce_archive_product_meetup' ).find( '.tz-sidebar-archive-product' ).slideToggle()
        } )

    }
    /* End sidebar archive product */

});

jQuery(window).load(function() {

    jQuery('#tz-loading').remove();

    /* Method for parallax */
    var $tz_parallax    =  jQuery('.parallax');

    if ( $tz_parallax.length ) {
        $tz_parallax.each(function(){
            jQuery(this).parallax("50%", 0.1);
        });
    }

    jQuery('div.slotholder').prepend('<div class="bk-responsive-slide"></div>');

    tz_blog_thubnail_item();

    /* Start blogSlider */
    var tz_blogSlider = jQuery('.tz-blogSlider');

    if ( tz_blogSlider.length ) {

        tz_blogSlider.each(function () {

            jQuery(this).owlCarousel({
                items : 1,
                slideSpeed:800,
                paginationSpeed:800,
                smartSpeed: 700,
                autoplayTimeout: 5000,
                loop: true,
                autoHeight:true
            });

        });

    }

    var tz_blogSlider_related = jQuery('.tz-blogSlider-related');

    if ( tz_blogSlider_related.length ) {

        tz_blogSlider_related.each(function () {

            jQuery(this).owlCarousel({
                items : 1,
                slideSpeed:800,
                paginationSpeed:800,
                smartSpeed: 700,
                autoplayTimeout: 5000,
                loop: true,
                autoHeight:true
            });

        })

    }
    /* End blogSlider */

    /* Start Shop gallery list resize */
    gallery_shop_list_resize();
    /* End Shop gallery list resize */

    /* Start product related */
    var tzRelatedSlider = jQuery('.site-shop__single_product .related > ul.products');

    if ( tzRelatedSlider.length ) {

        tzRelatedSlider.each( function () {

            jQuery(this).owlCarousel({
                responsive:{
                    0:{
                        items:1
                    },
                    550:{
                        margin: 15,
                        items:2
                    },
                    800:{
                        margin: 15,
                        items:3
                    },
                    1199:{
                        margin: 30,
                        items:3
                    }
                },
                dots:false,
                slideSpeed:1000,
                paginationSpeed:1000,
                smartSpeed: 1000,
                loop:true,
                autoHeight:true,
                nav:true,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
            });
            /* End product related */

        } )

    }
    /* End product related */

    /* product best seller */
    var tzBestSellSlider = jQuery('.tzBestSellSlider');

    if ( tzBestSellSlider.length ) {

        tzBestSellSlider.each( function () {

            jQuery(this).owlCarousel({
                responsive:{
                    0:{
                        items:1
                    },
                    550:{
                        margin: 15,
                        items:2
                    },
                    800:{
                        margin: 15,
                        items:3
                    },
                    1199:{
                        margin: 30,
                        items:3
                    }
                },
                dots:false,
                slideSpeed:1000,
                paginationSpeed:1000,
                smartSpeed: 1000,
                loop:true,
                autoHeight:true,
                nav:true,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
            });

        } );

    }
    /* product best seller */


    var tz_woocommerce_archive_product_meetup   =   jQuery( '.tz_woocommerce_archive_product_meetup' ),
        site_shop_single_product                =   jQuery( '.site-shop__single_product' );

    if ( tz_woocommerce_archive_product_meetup.length ) {
        tz_woocommerce_archive_product_meetup.css('opacity','1');
    }

    if ( site_shop_single_product.length ) {
        site_shop_single_product.css('opacity','1');
    }

});

var tz_timer,
    $win_width;


jQuery(window).on("resize",function(){

    if ( tz_timer ) clearTimeout(tz_timer);

    tz_timer = setTimeout(function(){

        tz_blog_thubnail_item();

        /* Start Shop gallery list resize */
        gallery_shop_list_resize();
        /* End Shop gallery list resize */

    }, 200);

});

/**
 * method for menu
 */

jQuery(window).scroll(function() {

    /* Scroll menu */

    var $tz_header          =   jQuery('.tz-homeTypeFixed');

    if ( $tz_header.length ) {

        var $tz_scrollTop       =   jQuery(window).scrollTop(),
            $tz_header_height   =   $tz_header.height();

        if ( $tz_scrollTop > $tz_header_height ) {
            $tz_header.addClass('tz-headerHome-scroll');
        }else {
            $tz_header.removeClass('tz-headerHome-scroll');
        }

    }

    /* End Scroll Menu */

    /* Back top */
    if ( tz_timer ) clearTimeout(tz_timer);
    tz_timer = setTimeout(function(){

        var $tz_btn_top     =   jQuery( '.tz-scrolling_back_top'),
            $win_scroll_top =   jQuery(window).scrollTop();

        if ( $tz_btn_top.length ) {

            if ( $win_scroll_top > 100 ) {
                $tz_btn_top.addClass('back_top_active');
            }else {
                $tz_btn_top.removeClass('back_top_active');
            }

        }

    }, 100);

});

function goBack() {
    window.history.back()
}

function tz_blog_thubnail_item() {

    var tz_blog_thubnail_item = jQuery('.tz-blog-thubnail-item');

    if ( tz_blog_thubnail_item.length ) {

        tz_blog_thubnail_item.each(function () {
            TzTemplateResizeImage( jQuery(this) );
        })

    }

}

/* Start Shop gallery list resize */
function gallery_shop_list_resize() {

    var tz_shop_image_list_product = jQuery( '.tz_shop_image_list_product .tz_shop_gallery_item' );

    if ( tz_shop_image_list_product.length ) {

        tz_shop_image_list_product.each( function () {

            TzTemplateResizeImage( jQuery(this) );

        } )

    }

}
/* End Shop gallery list resize */

//Remove TZ Loading
jQuery(window).load(function(){
    "use strict"
    jQuery('#tzloadding').remove();
});
