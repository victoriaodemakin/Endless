jQuery(document).ready(function () {
    "use strict";

    /* method font family */
    var tz_select_font_theme = jQuery("#maniva-meetup-select-font-theme"),
        tz_select_font_theme_val = tz_select_font_theme.val(),
        TzFontTextFamily = jQuery('#setting_maniva-meetup-font-text-family'),
        TzFontContent = jQuery('#setting_maniva-meetup-font-content'),
        TzFontMenu = jQuery('#setting_maniva-meetup-font-menu'),
        TzFontBigHeading = jQuery('#setting_maniva-meetup-font-headings'),
        TzFontSmallHeading = jQuery('#setting_maniva-meetup-font-headings-small'),
        TzFontInfoGoogle = jQuery('#setting_maniva-meetup-font-info-google'),
        TzFontWeight = jQuery('#setting_maniva-meetup-font-weight'),
        TzFontSubset = jQuery('#setting_maniva-meetup-font-subset'),
        TzFontStylet_wrap = jQuery('.TzFontStylet-wrap');

    TzFontStylet_wrap.addClass('TzFontStyle_display');

    switch (tz_select_font_theme_val) {
        case '1':
            TzFontTextFamily.slideUp('slow');
            TzFontContent.slideUp('slow');
            TzFontMenu.slideUp('slow');
            TzFontBigHeading.slideUp('slow');
            TzFontSmallHeading.slideUp('slow');
            TzFontInfoGoogle.slideUp('slow');
            TzFontSubset.slideUp('slow');
            TzFontWeight.slideUp('slow');
            break;
        case '2':
            TzFontTextFamily.slideDown('slow');
            TzFontContent.slideDown('slow');
            TzFontMenu.slideDown('slow');
            TzFontBigHeading.slideDown('slow');
            TzFontSmallHeading.slideDown('slow');
            TzFontInfoGoogle.slideDown('slow');
            TzFontWeight.slideDown('slow');
            TzFontSubset.slideDown('slow');
            TzFontStylet_wrap.removeClass('TzFontStyle_display');
            break;
        case '3':
            TzFontTextFamily.slideDown('slow');
            TzFontContent.slideDown('slow');
            TzFontMenu.slideDown();
            TzFontBigHeading.slideDown('slow');
            TzFontSmallHeading.slideDown('slow');
            TzFontInfoGoogle.slideDown('slow');
            TzFontWeight.slideDown('slow');
            TzFontSubset.slideDown('slow');
            TzFontStylet_wrap.addClass('TzFontStyle_display');

            break;
    }

    tz_select_font_theme.on('change',function () {
        var FontCheck = tz_select_font_theme.val();
        switch (FontCheck) {
            case '1':
                TzFontTextFamily.slideUp('slow');
                TzFontContent.slideUp('slow');
                TzFontMenu.slideUp('slow');
                TzFontBigHeading.slideUp('slow');
                TzFontSmallHeading.slideUp('slow');
                TzFontInfoGoogle.slideUp('slow');
                TzFontSubset.slideUp('slow');
                TzFontWeight.slideUp('slow');
                break;
            case '2':
                TzFontTextFamily.slideDown('slow');
                TzFontContent.slideDown('slow');
                TzFontMenu.slideDown('slow');
                TzFontBigHeading.slideDown('slow');
                TzFontSmallHeading.slideDown('slow');
                TzFontInfoGoogle.slideDown('slow');
                TzFontWeight.slideDown('slow');
                TzFontSubset.slideDown('slow');
                TzFontStylet_wrap.removeClass('TzFontStyle_display');
                break;
            case '3':
                TzFontTextFamily.slideDown('slow');
                TzFontContent.slideDown('slow');
                TzFontMenu.slideDown('slow');
                TzFontBigHeading.slideDown('slow');
                TzFontSmallHeading.slideDown('slow');
                TzFontInfoGoogle.slideDown('slow');
                TzFontWeight.slideDown('slow');
                TzFontSubset.slideDown('slow');
                TzFontStylet_wrap.addClass('TzFontStyle_display');
                break;
        }
    });
    /*  End method font family */

    // Start General Options

    var tz_show_hide_header_top = jQuery("#maniva-meetupon-off-header-top"),
        show_hide_header_top = tz_show_hide_header_top.val();

    if (show_hide_header_top == 1 || show_hide_header_top == 4) {
        jQuery('#setting_maniva-meetupposition-header-top').slideUp();
    } else {
        jQuery('#setting_maniva-meetupposition-header-top').slideDown();
    }

    tz_show_hide_header_top.on('change',function () {

        var show_hide_header_topChange = tz_show_hide_header_top.val();
        if (show_hide_header_topChange == 1 || show_hide_header_topChange == 4) {
            jQuery('#setting_maniva-meetupposition-header-top').slideUp();
        } else {
            jQuery('#setting_maniva-meetupposition-header-top').slideDown();
        }

    });

    var tz_choose_back_top = jQuery("#maniva-meetup_ChooseBackTop"),
        tz_choose_back_top_val = tz_choose_back_top.val();
    if (tz_choose_back_top_val == 0) {
        jQuery('#setting_maniva-meetup_image_backTop').slideDown();
        jQuery('#setting_maniva-meetup_FontAwesomeBackTop').slideUp();
    } else {
        jQuery('#setting_maniva-meetup_image_backTop').slideUp();
        jQuery('#setting_maniva-meetup_FontAwesomeBackTop').slideDown();
    }

    tz_choose_back_top.on('change',function () {
        var tz_choose_back_top_valChange = tz_choose_back_top.val();
        if (tz_choose_back_top_valChange == 0) {
            jQuery('#setting_maniva-meetup_image_backTop').slideDown();
            jQuery('#setting_maniva-meetup_FontAwesomeBackTop').slideUp();
        } else {
            jQuery('#setting_maniva-meetup_image_backTop').slideUp();
            jQuery('#setting_maniva-meetup_FontAwesomeBackTop').slideDown();
        }

    });

    // End General Options

    // method logo type

    var tz_LogoType = jQuery("#maniva-meetup_logotype"),
        LogoType = tz_LogoType.val();


    if (LogoType == 1) {
        jQuery('#setting_maniva-meetup_logo').slideDown();
        jQuery('#setting_maniva-meetup_logo2').slideDown();
        jQuery('#setting_maniva-meetup_logoText').slideUp();
        jQuery('#setting_maniva-meetup_logoTextcolor').slideUp();
    } else {
        jQuery('#setting_maniva-meetup_logo').slideUp();
        jQuery('#setting_maniva-meetup_logo2').slideUp();
        jQuery('#setting_maniva-meetup_logoText').slideDown();
        jQuery('#setting_maniva-meetup_logoTextcolor').slideDown();
    }

    tz_LogoType.on('change',function () {
        var LogoTypeChange = tz_LogoType.val();
        if (LogoTypeChange == 1) {
            jQuery('#setting_maniva-meetup_logo').slideDown();
            jQuery('#setting_maniva-meetup_logo2').slideDown();
            jQuery('#setting_maniva-meetup_logoText').slideUp();
            jQuery('#setting_maniva-meetup_logoTextcolor').slideUp();
        } else {
            jQuery('#setting_maniva-meetup_logo').slideUp();
            jQuery('#setting_maniva-meetup_logo2').slideUp();
            jQuery('#setting_maniva-meetup_logoText').slideDown();
            jQuery('#setting_maniva-meetup_logoTextcolor').slideDown();
        }
    });

    var tz_subscribe = jQuery("#maniva-meetupon-off-subscribe"),
        subscribeOnOff = tz_subscribe.val();

    if (subscribeOnOff == 1) {
        jQuery('#setting_maniva-meetup_background_img_subscribe').slideDown();

    } else {
        jQuery('#setting_maniva-meetup_background_img_subscribe').slideUp();

    }

    tz_subscribe.on('change',function () {
        var subscribeOnOffChange = tz_subscribe.val();
        if (subscribeOnOffChange == 1) {
            jQuery('#setting_maniva-meetup_background_img_subscribe').slideDown();
        } else {
            jQuery('#setting_maniva-meetup_background_img_subscribe').slideUp();
        }
    });
    // Theme Color

    var tz_TZTypecolor = jQuery("#maniva-meetup_TZTypecolor"),
        TZTypecolor = tz_TZTypecolor.val();

    if (TZTypecolor == 0) {
        jQuery('#setting_maniva-meetup_TZThemecolor').slideDown();
        jQuery('#setting_maniva-meetup_TZThemecustom').slideUp();
    } else {
        jQuery('#setting_maniva-meetup_TZThemecolor').slideUp();
        jQuery('#setting_maniva-meetup_TZThemecustom').slideDown();
    }

    tz_TZTypecolor.on('change',function () {

        var show_hide_TZTypecolor = tz_TZTypecolor.val();
        if (show_hide_TZTypecolor == 0) {
            jQuery('#setting_maniva-meetup_TZThemecolor').slideDown();
            jQuery('#setting_maniva-meetup_TZThemecustom').slideUp();
        } else {
            jQuery('#setting_maniva-meetup_TZThemecolor').slideUp();
            jQuery('#setting_maniva-meetup_TZThemecustom').slideDown();
        }

    });


    // jquery style option
    jQuery("#tab_TzSyle").on('click',function () {
        jQuery('#tab_TZFamily,#tab_CustomFamily').toggle('slow');
    });

    // jquery favicon option
    var tz_valuefavicon = jQuery('#maniva-meetup_favicon_onoff'),
        valuefavicon = tz_valuefavicon.val();

    if (valuefavicon == 'yes') {
        jQuery('#setting_maniva-meetup_favicon').slideDown();
    } else {
        jQuery('#setting_maniva-meetup_favicon').slideUp();
    }

    tz_valuefavicon.on('change',function () {
        if (jQuery(this).val() == 'yes') {
            jQuery('#setting_maniva-meetup_favicon').slideDown();
        } else {
            jQuery('#setting_maniva-meetup_favicon').slideUp();
        }
    });

    // slider client blog

    var tz_slider_client_blog = jQuery('#maniva-meetupblog_single_slideshows_show'),
        slider_client_blog = tz_slider_client_blog.val();

    if (slider_client_blog === 'show') {
        jQuery('#setting_maniva-meetup_blog_single_slideshows').slideDown();
        jQuery('#setting_maniva-meetup_background_image_slider_client').slideDown();
        jQuery('#setting_maniva-meetup_item_slideshows_client').slideDown();
    } else {
        jQuery('#setting_maniva-meetup_blog_single_slideshows').slideUp();
        jQuery('#setting_maniva-meetup_background_image_slider_client').slideUp();
        jQuery('#setting_maniva-meetup_item_slideshows_client').slideUp();
    }

    tz_slider_client_blog.on('change',function () {
        if (jQuery(this).val() === 'show') {
            jQuery('#setting_maniva-meetup_blog_single_slideshows').slideDown();
            jQuery('#setting_maniva-meetup_background_image_slider_client').slideDown();
            jQuery('#setting_maniva-meetup_item_slideshows_client').slideDown();
        } else {
            jQuery('#setting_maniva-meetup_blog_single_slideshows').slideUp();
            jQuery('#setting_maniva-meetup_background_image_slider_client').slideUp();
            jQuery('#setting_maniva-meetup_item_slideshows_client').slideUp();
        }
    });


    // Start Sidebar Archive Product
    var archive_product_value_columns = jQuery('#' + 'maniva-meetup' + '-archive-product-columns'),
        sidebar_archive_product_image = jQuery('#setting_maniva-meetup-archive-product-image').find('.option-tree-ui-radio-images'),
        option_tree_ui_radio_images_archive_product_eq0 = sidebar_archive_product_image.eq(0),
        option_tree_ui_radio_images_archive_product_eq1 = sidebar_archive_product_image.eq(1),
        option_tree_ui_radio_images_archive_product_eq2 = sidebar_archive_product_image.eq(2),
        option_tree_ui_radio_images_archive_product_eq3 = sidebar_archive_product_image.eq(3),
        meetup_archive_product_width1 = jQuery('#setting_maniva-meetup-archive-product-width1'),
        meetup_archive_product_width2 = jQuery('#setting_maniva-meetup-archive-product-width2'),
        meetup_archive_product_width3 = jQuery('#setting_maniva-meetup-archive-product-width3'),
        meetup_archive_product_width4 = jQuery('#setting_maniva-meetup-archive-product-width4');

    archive_product_value_columns.on('change',function () {


        var archive_product_value_columns_change = jQuery(this).val();

        switch (archive_product_value_columns_change) {

            case'1':

                option_tree_ui_radio_images_archive_product_eq0.slideDown();
                option_tree_ui_radio_images_archive_product_eq1.slideUp();
                option_tree_ui_radio_images_archive_product_eq2.slideUp();
                option_tree_ui_radio_images_archive_product_eq3.slideUp();

                meetup_archive_product_width1.slideDown();
                meetup_archive_product_width2.slideUp();
                meetup_archive_product_width3.slideUp();
                meetup_archive_product_width4.slideUp();
                break;

            case'2':

                option_tree_ui_radio_images_archive_product_eq0.slideDown();
                option_tree_ui_radio_images_archive_product_eq1.slideDown();
                option_tree_ui_radio_images_archive_product_eq2.slideUp();
                option_tree_ui_radio_images_archive_product_eq3.slideUp();

                meetup_archive_product_width1.slideDown();
                meetup_archive_product_width2.slideDown();
                meetup_archive_product_width3.slideUp();
                meetup_archive_product_width4.slideUp();
                break;

            case'3':

                option_tree_ui_radio_images_archive_product_eq0.slideDown();
                option_tree_ui_radio_images_archive_product_eq1.slideDown();
                option_tree_ui_radio_images_archive_product_eq2.slideDown();
                option_tree_ui_radio_images_archive_product_eq3.slideUp();

                meetup_archive_product_width1.slideDown();
                meetup_archive_product_width2.slideDown();
                meetup_archive_product_width3.slideDown();
                meetup_archive_product_width4.slideUp();
                break;

            case'4':

                option_tree_ui_radio_images_archive_product_eq0.slideDown();
                option_tree_ui_radio_images_archive_product_eq1.slideDown();
                option_tree_ui_radio_images_archive_product_eq2.slideDown();
                option_tree_ui_radio_images_archive_product_eq3.slideDown();

                meetup_archive_product_width1.slideDown();
                meetup_archive_product_width2.slideDown();
                meetup_archive_product_width3.slideDown();
                meetup_archive_product_width4.slideDown();
                break;

            default :

                option_tree_ui_radio_images_archive_product_eq0.slideDown();
                option_tree_ui_radio_images_archive_product_eq1.slideDown();
                option_tree_ui_radio_images_archive_product_eq2.slideDown();
                option_tree_ui_radio_images_archive_product_eq3.slideDown();

                meetup_archive_product_width1.slideDown();
                meetup_archive_product_width2.slideDown();
                meetup_archive_product_width3.slideDown();
                meetup_archive_product_width4.slideDown();
                break;

        }
    });

    var archive_product_get_value_columns = archive_product_value_columns.val();

    switch (archive_product_get_value_columns) {

        case'1':

            option_tree_ui_radio_images_archive_product_eq0.slideDown();
            option_tree_ui_radio_images_archive_product_eq1.slideUp();
            option_tree_ui_radio_images_archive_product_eq2.slideUp();
            option_tree_ui_radio_images_archive_product_eq3.slideUp();

            meetup_archive_product_width1.slideDown();
            meetup_archive_product_width2.slideUp();
            meetup_archive_product_width3.slideUp();
            meetup_archive_product_width4.slideUp();
            break;

        case'2':

            option_tree_ui_radio_images_archive_product_eq0.slideDown();
            option_tree_ui_radio_images_archive_product_eq1.slideDown();
            option_tree_ui_radio_images_archive_product_eq2.slideUp();
            option_tree_ui_radio_images_archive_product_eq3.slideUp();

            meetup_archive_product_width1.slideDown();
            meetup_archive_product_width2.slideDown();
            meetup_archive_product_width3.slideUp();
            meetup_archive_product_width4.slideUp();
            break;

        case'3':

            option_tree_ui_radio_images_archive_product_eq0.slideDown();
            option_tree_ui_radio_images_archive_product_eq1.slideDown();
            option_tree_ui_radio_images_archive_product_eq2.slideDown();
            option_tree_ui_radio_images_archive_product_eq3.slideUp();

            meetup_archive_product_width1.slideDown();
            meetup_archive_product_width2.slideDown();
            meetup_archive_product_width3.slideDown();
            meetup_archive_product_width4.slideUp();
            break;

        case'4':

            option_tree_ui_radio_images_archive_product_eq0.slideDown();
            option_tree_ui_radio_images_archive_product_eq1.slideDown();
            option_tree_ui_radio_images_archive_product_eq2.slideDown();
            option_tree_ui_radio_images_archive_product_eq3.slideDown();

            meetup_archive_product_width1.slideDown();
            meetup_archive_product_width2.slideDown();
            meetup_archive_product_width3.slideDown();
            meetup_archive_product_width4.slideDown();
            break;

        default :

            option_tree_ui_radio_images_archive_product_eq0.slideDown();
            option_tree_ui_radio_images_archive_product_eq1.slideDown();
            option_tree_ui_radio_images_archive_product_eq2.slideDown();
            option_tree_ui_radio_images_archive_product_eq3.slideDown();

            meetup_archive_product_width1.slideDown();
            meetup_archive_product_width2.slideDown();
            meetup_archive_product_width3.slideDown();
            meetup_archive_product_width4.slideDown();
            break;

    }
    // End Sidebar Archive Product


// footer

    var footervalue = jQuery('#' + 'maniva-meetup' + '_footer_columns'),
        option_tree_ui_radio_images_eq0 = jQuery('#setting_maniva-meetupfooter_image .option-tree-ui-radio-images:eq(0)'),
        option_tree_ui_radio_images_eq1 = jQuery('#setting_maniva-meetupfooter_image .option-tree-ui-radio-images:eq(1)'),
        option_tree_ui_radio_images_eq2 = jQuery('#setting_maniva-meetupfooter_image .option-tree-ui-radio-images:eq(2)'),
        option_tree_ui_radio_images_eq3 = jQuery('#setting_maniva-meetupfooter_image .option-tree-ui-radio-images:eq(3)'),
        meetupfooterwidth1 = jQuery('#setting_maniva-meetupfooterwidth1'),
        meetupfooterwidth2 = jQuery('#setting_maniva-meetupfooterwidth2'),
        meetupfooterwidth3 = jQuery('#setting_maniva-meetupfooterwidth3'),
        meetupfooterwidth4 = jQuery('#setting_maniva-meetupfooterwidth4');

    footervalue.on('change',function () {


        var footerchange = jQuery(this).val();

        switch (footerchange) {
            case'1':
                option_tree_ui_radio_images_eq0.slideDown();
                option_tree_ui_radio_images_eq1.slideUp();
                option_tree_ui_radio_images_eq2.slideUp();
                option_tree_ui_radio_images_eq3.slideUp();

                meetupfooterwidth1.slideDown();
                meetupfooterwidth2.slideUp();
                meetupfooterwidth3.slideUp();
                meetupfooterwidth4.slideUp();
                break;
            case'2':
                option_tree_ui_radio_images_eq0.slideDown();
                option_tree_ui_radio_images_eq1.slideDown();
                option_tree_ui_radio_images_eq2.slideUp();
                option_tree_ui_radio_images_eq3.slideUp();

                meetupfooterwidth1.slideDown();
                meetupfooterwidth2.slideDown();
                meetupfooterwidth3.slideUp();
                meetupfooterwidth4.slideUp();
                break;
            case'3':
                option_tree_ui_radio_images_eq0.slideDown();
                option_tree_ui_radio_images_eq1.slideDown();
                option_tree_ui_radio_images_eq2.slideDown();
                option_tree_ui_radio_images_eq3.slideUp();

                meetupfooterwidth1.slideDown();
                meetupfooterwidth2.slideDown();
                meetupfooterwidth3.slideDown();
                meetupfooterwidth4.slideUp();
                break;
            case'4':
                option_tree_ui_radio_images_eq0.slideDown();
                option_tree_ui_radio_images_eq1.slideDown();
                option_tree_ui_radio_images_eq2.slideDown();
                option_tree_ui_radio_images_eq3.slideDown();

                meetupfooterwidth1.slideDown();
                meetupfooterwidth2.slideDown();
                meetupfooterwidth3.slideDown();
                meetupfooterwidth4.slideDown();
                break;
            default :
                option_tree_ui_radio_images_eq0.slideDown();
                option_tree_ui_radio_images_eq1.slideDown();
                option_tree_ui_radio_images_eq2.slideDown();
                option_tree_ui_radio_images_eq3.slideDown();

                meetupfooterwidth1.slideDown();
                meetupfooterwidth2.slideDown();
                meetupfooterwidth3.slideDown();
                meetupfooterwidth4.slideDown();
                break;
        }
    });

    var footer_value = footervalue.val();

    switch (footer_value) {
        case'1':
            option_tree_ui_radio_images_eq0.slideDown();
            option_tree_ui_radio_images_eq1.slideUp();
            option_tree_ui_radio_images_eq2.slideUp();
            option_tree_ui_radio_images_eq3.slideUp();

            meetupfooterwidth1.slideDown();
            meetupfooterwidth2.slideUp();
            meetupfooterwidth3.slideUp();
            meetupfooterwidth4.slideUp();
            break;
        case'2':
            option_tree_ui_radio_images_eq0.slideDown();
            option_tree_ui_radio_images_eq1.slideDown();
            option_tree_ui_radio_images_eq2.slideUp();
            option_tree_ui_radio_images_eq3.slideUp();

            meetupfooterwidth1.slideDown();
            meetupfooterwidth2.slideDown();
            meetupfooterwidth3.slideUp();
            meetupfooterwidth4.slideUp();
            break;
        case'3':
            option_tree_ui_radio_images_eq0.slideDown();
            option_tree_ui_radio_images_eq1.slideDown();
            option_tree_ui_radio_images_eq2.slideDown();
            option_tree_ui_radio_images_eq3.slideUp();

            meetupfooterwidth1.slideDown();
            meetupfooterwidth2.slideDown();
            meetupfooterwidth3.slideDown();
            meetupfooterwidth4.slideUp();
            break;
        case'4':
            option_tree_ui_radio_images_eq0.slideDown();
            option_tree_ui_radio_images_eq1.slideDown();
            option_tree_ui_radio_images_eq2.slideDown();
            option_tree_ui_radio_images_eq3.slideDown();

            meetupfooterwidth1.slideDown();
            meetupfooterwidth2.slideDown();
            meetupfooterwidth3.slideDown();
            meetupfooterwidth4.slideDown();
            break;
        default :
            option_tree_ui_radio_images_eq0.slideDown();
            option_tree_ui_radio_images_eq1.slideDown();
            option_tree_ui_radio_images_eq2.slideDown();
            option_tree_ui_radio_images_eq3.slideDown();

            meetupfooterwidth1.slideDown();
            meetupfooterwidth2.slideDown();
            meetupfooterwidth3.slideDown();
            meetupfooterwidth4.slideDown();
            break;
    }

    /* footer shop */

    var tz_footerShop = jQuery('#' + 'maniva-meetup' + '_footerShop_columns'),
        option_tree_ui_radio_images_footer_shop_eq0 = jQuery('#setting_maniva-meetupfooterShop_image .option-tree-ui-radio-images:eq(0)'),
        option_tree_ui_radio_images_footer_shop_eq1 = jQuery('#setting_maniva-meetupfooterShop_image .option-tree-ui-radio-images:eq(1)'),
        option_tree_ui_radio_images_footer_shop_eq2 = jQuery('#setting_maniva-meetupfooterShop_image .option-tree-ui-radio-images:eq(2)'),
        option_tree_ui_radio_images_footer_shop_eq3 = jQuery('#setting_maniva-meetupfooterShop_image .option-tree-ui-radio-images:eq(3)'),
        option_tree_ui_radio_images_footer_shop_eq4 = jQuery('#setting_maniva-meetupfooterShop_image .option-tree-ui-radio-images:eq(4)'),
        meetup_footer_width1_shop = jQuery('#setting_maniva-meetupfooterwidth1_shop'),
        meetup_footer_width2_shop = jQuery('#setting_maniva-meetupfooterwidth2_shop'),
        meetup_footer_width3_shop = jQuery('#setting_maniva-meetupfooterwidth3_shop'),
        meetup_footer_width4_shop = jQuery('#setting_maniva-meetupfooterwidth4_shop'),
        meetup_footer_width5_shop = jQuery('#setting_maniva-meetupfooterwidth5_shop');

    tz_footerShop.on('change',function () {

        var footerShopchange = jQuery(this).val();

        switch (footerShopchange) {
            case'1':
                option_tree_ui_radio_images_footer_shop_eq0.slideDown();
                option_tree_ui_radio_images_footer_shop_eq1.slideUp();
                option_tree_ui_radio_images_footer_shop_eq2.slideUp();
                option_tree_ui_radio_images_footer_shop_eq3.slideUp();
                option_tree_ui_radio_images_footer_shop_eq4.slideUp();

                meetup_footer_width1_shop.slideDown();
                meetup_footer_width2_shop.slideUp();
                meetup_footer_width3_shop.slideUp();
                meetup_footer_width4_shop.slideUp();
                meetup_footer_width5_shop.slideUp();

                break;
            case'2':
                option_tree_ui_radio_images_footer_shop_eq0.slideDown();
                option_tree_ui_radio_images_footer_shop_eq1.slideDown();
                option_tree_ui_radio_images_footer_shop_eq2.slideUp();
                option_tree_ui_radio_images_footer_shop_eq3.slideUp();
                option_tree_ui_radio_images_footer_shop_eq4.slideUp();

                meetup_footer_width1_shop.slideDown();
                meetup_footer_width2_shop.slideDown();
                meetup_footer_width3_shop.slideUp();
                meetup_footer_width4_shop.slideUp();
                meetup_footer_width5_shop.slideUp();
                break;
            case'3':
                option_tree_ui_radio_images_footer_shop_eq0.slideDown();
                option_tree_ui_radio_images_footer_shop_eq1.slideDown();
                option_tree_ui_radio_images_footer_shop_eq2.slideDown();
                option_tree_ui_radio_images_footer_shop_eq3.slideUp();
                option_tree_ui_radio_images_footer_shop_eq4.slideUp();

                meetup_footer_width1_shop.slideDown();
                meetup_footer_width2_shop.slideDown();
                meetup_footer_width3_shop.slideDown();
                meetup_footer_width4_shop.slideUp();
                meetup_footer_width5_shop.slideUp();
                break;
            case'4':
                option_tree_ui_radio_images_footer_shop_eq0.slideDown();
                option_tree_ui_radio_images_footer_shop_eq1.slideDown();
                option_tree_ui_radio_images_footer_shop_eq2.slideDown();
                option_tree_ui_radio_images_footer_shop_eq3.slideDown();
                option_tree_ui_radio_images_footer_shop_eq4.slideUp();

                meetup_footer_width1_shop.slideDown();
                meetup_footer_width2_shop.slideDown();
                meetup_footer_width3_shop.slideDown();
                meetup_footer_width4_shop.slideDown();
                meetup_footer_width5_shop.slideUp();
                break;
            case'5':
                option_tree_ui_radio_images_footer_shop_eq0.slideDown();
                option_tree_ui_radio_images_footer_shop_eq1.slideDown();
                option_tree_ui_radio_images_footer_shop_eq2.slideDown();
                option_tree_ui_radio_images_footer_shop_eq3.slideDown();
                option_tree_ui_radio_images_footer_shop_eq4.slideDown();

                meetup_footer_width1_shop.slideDown();
                meetup_footer_width2_shop.slideDown();
                meetup_footer_width3_shop.slideDown();
                meetup_footer_width4_shop.slideDown();
                meetup_footer_width5_shop.slideDown();
                break;
            default :
                option_tree_ui_radio_images_footer_shop_eq0.slideDown();
                option_tree_ui_radio_images_footer_shop_eq1.slideDown();
                option_tree_ui_radio_images_footer_shop_eq2.slideDown();
                option_tree_ui_radio_images_footer_shop_eq3.slideDown();
                option_tree_ui_radio_images_footer_shop_eq4.slideDown();

                meetup_footer_width1_shop.slideDown();
                meetup_footer_width2_shop.slideDown();
                meetup_footer_width3_shop.slideDown();
                meetup_footer_width4_shop.slideDown();
                meetup_footer_width5_shop.slideDown();
                break;
        }
    });

    var footerShopvalue = tz_footerShop.val();

    switch (footerShopvalue) {
        case'1':
            option_tree_ui_radio_images_footer_shop_eq0.slideDown();
            option_tree_ui_radio_images_footer_shop_eq1.slideUp();
            option_tree_ui_radio_images_footer_shop_eq2.slideUp();
            option_tree_ui_radio_images_footer_shop_eq3.slideUp();
            option_tree_ui_radio_images_footer_shop_eq4.slideUp();

            meetup_footer_width1_shop.slideDown();
            meetup_footer_width2_shop.slideUp();
            meetup_footer_width3_shop.slideUp();
            meetup_footer_width4_shop.slideUp();
            meetup_footer_width5_shop.slideUp();

            break;
        case'2':
            option_tree_ui_radio_images_footer_shop_eq0.slideDown();
            option_tree_ui_radio_images_footer_shop_eq1.slideDown();
            option_tree_ui_radio_images_footer_shop_eq2.slideUp();
            option_tree_ui_radio_images_footer_shop_eq3.slideUp();
            option_tree_ui_radio_images_footer_shop_eq4.slideUp();

            meetup_footer_width1_shop.slideDown();
            meetup_footer_width2_shop.slideDown();
            meetup_footer_width3_shop.slideUp();
            meetup_footer_width4_shop.slideUp();
            meetup_footer_width5_shop.slideUp();
            break;
        case'3':
            option_tree_ui_radio_images_footer_shop_eq0.slideDown();
            option_tree_ui_radio_images_footer_shop_eq1.slideDown();
            option_tree_ui_radio_images_footer_shop_eq2.slideDown();
            option_tree_ui_radio_images_footer_shop_eq3.slideUp();
            option_tree_ui_radio_images_footer_shop_eq4.slideUp();

            meetup_footer_width1_shop.slideDown();
            meetup_footer_width2_shop.slideDown();
            meetup_footer_width3_shop.slideDown();
            meetup_footer_width4_shop.slideUp();
            meetup_footer_width5_shop.slideUp();
            break;
        case'4':
            option_tree_ui_radio_images_footer_shop_eq0.slideDown();
            option_tree_ui_radio_images_footer_shop_eq1.slideDown();
            option_tree_ui_radio_images_footer_shop_eq2.slideDown();
            option_tree_ui_radio_images_footer_shop_eq3.slideDown();
            option_tree_ui_radio_images_footer_shop_eq4.slideUp();

            meetup_footer_width1_shop.slideDown();
            meetup_footer_width2_shop.slideDown();
            meetup_footer_width3_shop.slideDown();
            meetup_footer_width4_shop.slideDown();
            meetup_footer_width5_shop.slideUp();
            break;
        case'5':
            option_tree_ui_radio_images_footer_shop_eq0.slideDown();
            option_tree_ui_radio_images_footer_shop_eq1.slideDown();
            option_tree_ui_radio_images_footer_shop_eq2.slideDown();
            option_tree_ui_radio_images_footer_shop_eq3.slideDown();
            option_tree_ui_radio_images_footer_shop_eq4.slideDown();

            meetup_footer_width1_shop.slideDown();
            meetup_footer_width2_shop.slideDown();
            meetup_footer_width3_shop.slideDown();
            meetup_footer_width4_shop.slideDown();
            meetup_footer_width5_shop.slideDown();
            break;
        default :
            option_tree_ui_radio_images_footer_shop_eq0.slideDown();
            option_tree_ui_radio_images_footer_shop_eq1.slideDown();
            option_tree_ui_radio_images_footer_shop_eq2.slideDown();
            option_tree_ui_radio_images_footer_shop_eq3.slideDown();
            option_tree_ui_radio_images_footer_shop_eq4.slideDown();

            meetup_footer_width1_shop.slideDown();
            meetup_footer_width2_shop.slideDown();
            meetup_footer_width3_shop.slideDown();
            meetup_footer_width4_shop.slideDown();
            meetup_footer_width5_shop.slideDown();
            break;
    }

});


// Background Type Event

var tz_background_type = jQuery('#' + 'maniva-meetup' + '_background_type');

tz_background_type.on('change', function () {
    "use strict";

    var value = jQuery(this).val();
    if (String(value) === 'none') {
        jQuery('#setting_' + 'maniva-meetup' + '_background_pattern, ' +
            '#setting_' + 'maniva-meetup' + '_background_single_image').slideUp();
        jQuery('#setting_' + 'maniva-meetup' + '_TZBackgroundColor').slideDown();
    } else if (String(value) === 'pattern') {
        jQuery('#setting_' + 'maniva-meetup' + '_background_pattern').slideDown();
        jQuery('#setting_' + 'maniva-meetup' + '_background_single_image').slideUp();
        jQuery('#setting_' + 'maniva-meetup' + '_TZBackgroundColor').slideUp();
    } else {
        jQuery('#setting_' + 'maniva-meetup' + '_background_pattern').slideUp();
        jQuery('#setting_' + 'maniva-meetup' + '_background_single_image').slideDown();
        jQuery('#setting_' + 'maniva-meetup' + '_TZBackgroundColor').slideUp();
    }
});

var background_type = tz_background_type.val();
if (String(background_type) === 'none') {
    jQuery('#setting_' + 'maniva-meetup' + '_background_pattern, ' +
        '#setting_' + 'maniva-meetup' + '_background_single_image').slideUp();
    jQuery('#setting_' + 'maniva-meetup' + '_TZBackgroundColor').slideDown();
} else if (String(background_type) === 'pattern') {
    jQuery('#setting_' + 'maniva-meetup' + '_background_pattern').slideDown();
    jQuery('#setting_' + 'maniva-meetup' + '_background_single_image').slideUp();
} else {
    jQuery('#setting_' + 'maniva-meetup' + '_background_pattern').slideUp();
    jQuery('#setting_' + 'maniva-meetup' + '_background_single_image').slideDown();

}

// Background Pattern Preview

jQuery('#setting_' + 'maniva-meetup' + '_background_pattern .background_pattern').on('click', function () {
    "use strict";
    if (jQuery('#wpcontent').length > 0) {
        jQuery(this).css('background', 'url("' + jQuery(this).attr('src') + '") repeat');
    }
});