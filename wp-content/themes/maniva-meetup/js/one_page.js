jQuery(document).ready(function() {
    "use strict";
    var $_height        = jQuery('.tz-headerSlider').height(),
        $_heightProvo   = jQuery('#Tz-provokeMe').height(),
        $_heightHeader  = $_heightProvo + $_height;

    var $tz_speed_one_page  =   jQuery('.tz_speed_one_page'),
        $nav                =   jQuery('.tz_nav_one_page');

    if ( $tz_speed_one_page.length ) {
        var $speed_one_page      =   parseInt($tz_speed_one_page.attr('data-speed-one-page'));
    }

    $nav.onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: $speed_one_page,
        scrollOffset: 100,
        scrollThreshold: 0.5,
        filter: '',
        easing: '',
        begin: function () {
            /* I get fired when the animation is starting */
        },
        end: function () {
            /* I get fired when the animation is ending */
        },
        scrollChange: function ($currentListItem) {
            /* I get fired when you enter a section and I pass the list item of the section */
        }
    });

    if(jQuery("#nav-check").hasClass("tz_speed_one_page")){
        jQuery("#nav-check ul li a").click(function(){
            jQuery("#nav-check ul").removeClass("in");
        });
    }

    var $tz_slider_home_btn = jQuery('.tz_slider_home_btn_click_one_page');
    $tz_slider_home_btn.onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 2200,
        scrollOffset: 0,
        scrollThreshold: 0.5,
        filter: '',
        easing: '',
        begin: function () {
            /* I get fired when the animation is starting */
        },
        end: function () {
            /* I get fired when the animation is ending */
            jQuery('.tz_slider_home_btn_click_one_page li').removeClass('current');
        },
        scrollChange: function ($currentListItem) {
            /* I get fired when you enter a section and I pass the list item of the section */
            jQuery('.tz_slider_home_btn_click_one_page li').removeClass('current');
        }
    });

    var $tz_meetup_btn = jQuery('.tz_meetup_btn_one_page');
    $tz_meetup_btn.each(function(){

        jQuery(this).onePageNav({

            currentClass: 'current',
            changeHash: false,
            scrollSpeed: 2200,
            scrollOffset: 0,
            scrollThreshold: 0.5,
            filter: '',
            easing: '',
            begin: function () {
                /* I get fired when the animation is starting */
            },
            end: function () {
                /* I get fired when the animation is ending */
                jQuery('.tz_meetup_btn_one_page').removeClass('current');
            },
            scrollChange: function ($currentListItem) {
                /* I get fired when you enter a section and I pass the list item of the section */
                jQuery('.tz_meetup_btn_one_page').removeClass('current');
            }

        });

    });

    var $tz_meetup_header_option_phone = jQuery('.tz_upcoming_event_one_page');
    $tz_meetup_header_option_phone.onePageNav({

        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 2200,
        scrollOffset: 0,
        scrollThreshold: 0.5,
        filter: '',
        easing: '',
        begin: function () {
            /* I get fired when the animation is starting */
        },
        end: function () {
            /* I get fired when the animation is ending */
            jQuery('.tz_upcoming_event_one_page').removeClass('current');
        },
        scrollChange: function ($currentListItem) {
            /* I get fired when you enter a section and I pass the list item of the section */
            jQuery('.tz_upcoming_event_one_page').removeClass('current');
        }

    });

    /* partner */
    var $tz_partner_slider = jQuery('.partner-slider');
    $tz_partner_slider.onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 2200,
        scrollOffset: 0,
        scrollThreshold: 0.5,
        filter: '',
        easing: '',
        begin: function () {
            /* I get fired when the animation is starting */
        },
        end: function () {
            /* I get fired when the animation is ending */
        },
        scrollChange: function ($currentListItem) {
            /* I get fired when you enter a section and I pass the list item of the section */
        }
    });

});

jQuery(window).load(function(){
    "use strict";

    var $tp_mask_wrap = jQuery('.tp-mask-wrap');
    $tp_mask_wrap.onePageNav({

        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 2200,
        scrollOffset: 0,
        scrollThreshold: 0.5,
        filter: '',
        easing: '',
        begin: function () {
            /* I get fired when the animation is starting */
        },
        end: function () {
            /* I get fired when the animation is ending */
        },
        scrollChange: function ($currentListItem) {
            /* I get fired when you enter a section and I pass the list item of the section */
        }

    });

});
jQuery(window).load(function(){
    "use strict";

    var $features_event_ctform = jQuery('.tz_features_event_contact_form');
    setTimeout(function(){
        jQuery($features_event_ctform).addClass('have-opacity');
        },
        2000
    );

});
