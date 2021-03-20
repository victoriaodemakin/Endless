"use strict";

function createCookie(name,value,days) {

    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    } else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)===' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}
function setCookie(name, value, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
}

jQuery(document).ready(function() {

    jQuery('.tzquick-view').on('click',function(){

        var $tzquick_wrap = jQuery('.tzquick-wrap');

        var $product_id = jQuery(this).data('id-product');
        var quickview_none = jQuery(this).parents('.tz_shop_image_warp').find('.quickview-none').val();

        jQuery(this).parents( '.tz_meetup_content_product' ).find( '.tz_shop_loading_box' ).addClass( 'tz_shop_loading_box_active' );

        jQuery.ajax({
            url: woo_var.url,
            type: 'POST',
            data: ({
                action   : 'maniva_meetup_wooview',
                security: quickview_none,
                productid: $product_id,
            }),
            beforeSend: function(){

            },
            success: function(data){

                jQuery('.product-quick-content').html(data);
                jQuery('.product-quick-warp').animate({
                    'top': '50%',
                    opacity: 1
                },350,function(){

                });

                jQuery( '.tz_shop_loading_box' ).removeClass( 'tz_shop_loading_box_active' );

                jQuery('.tzquick-wrap').addClass('tzquick-wrap-eff');

                jQuery('.tzdelete-quick').click(function(){
                    jQuery('.product-quick-warp').animate({
                        'top': '80%',
                        opacity: 0
                    },350,function(){
                        jQuery('.tzquick-wrap').removeClass('tzquick-wrap-eff');
                    });

                });

                // The slider being synced must be initialized first
               var single_images_gallery    =   jQuery( '.single-images-gallery' );

               if ( single_images_gallery.length ) {

                   single_images_gallery.each( function () {

                       jQuery(this).lightSlider({
                           gallery:true,
                           item:1,
                           loop:true,
                           thumbItem:4,
                           speed: 800,
                           slideMargin:0,
                           prevHtml: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                           nextHtml: '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                       });

                   } )

               }

            }
        });
    });

    jQuery.display = function( view ) {

        var site_shop_product = jQuery( '.site-shop-product' );

        if ( view === 'list' ) {

            site_shop_product.addClass( 'site-shop-product-list' ).removeClass( 'site-shop-product-grid' );

            jQuery( '.switchToGrid' ).removeClass( 'switch_btn_click_active' );
            jQuery( '.switchToList' ).addClass( 'switch_btn_click_active' );

            createCookie('display','list');

        } else {

            site_shop_product.addClass( 'site-shop-product-grid' ).removeClass( 'site-shop-product-list' );

            jQuery( '.switchToList' ).removeClass( 'switch_btn_click_active' );
            jQuery( '.switchToGrid' ).addClass( 'switch_btn_click_active' );

            createCookie('display','grid');

        }
    };

    jQuery( '.switch_btn_click' ).on( 'click', function () {

        jQuery(this).siblings().removeClass( 'switch_btn_click_active' );
        jQuery(this).addClass( 'switch_btn_click_active' );

    } );

    jQuery('.switchToList').on( 'click', function(){
        jQuery.display('list');

        /* Start Shop gallery list resize */
        gallery_shop_list_resize();
        /* End Shop gallery list resize */
    });

    jQuery('.switchToGrid').on( 'click', function(){
        jQuery.display('grid');

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
    });

    var view = readCookie('display');

    if ( view ) {
        jQuery.display( view );
    } else {
        jQuery.display( 'grid' );
    }

});

