(function($){
    "use strict";
    jQuery(window).load(function(){

        var content=jQuery(".tzColorbox_scroll");

        content.mCustomScrollbar({
            scrollInertia:300,
            scrollButtons:{enable:true}
        });

        var width_window   = jQuery(window).width();
        var height_window   = jQuery(window).height();
        var height_buy      = jQuery(".tzSection-Buynow").height();
        var height_boxcolor = jQuery(".live-content").height();
        var height_info     = jQuery(".tzSection-info").height();
        var height_seemore  = jQuery(".tzDemo-seeMore").height();
        var height_demo = height_window - height_buy - height_boxcolor - height_info - height_seemore - 170;
        if(width_window > 1500){
            jQuery('.tzDemo-detail').css('height',height_demo+'px');
        }
    });
})(jQuery);
