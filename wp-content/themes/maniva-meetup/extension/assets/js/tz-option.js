"use strict";
// jquery sidebar option
var sidebar = jQuery('#maniva_meetup_portfolio_fullwidth').val();
if(sidebar == '1'){
    jQuery('#setting_maniva_meetup_portfolio_sidebar').slideDown();
}else{
    jQuery('#setting_maniva_meetup_portfolio_sidebar').slideUp();
}

jQuery('#maniva_meetup_portfolio_fullwidth').on('change',function(){
    if(jQuery(this).val()=='1'){
        jQuery('#setting_maniva_meetup_portfolio_sidebar').slideDown();
    }else{
        jQuery('#setting_maniva_meetup_portfolio_sidebar').slideUp();
    }
});

// jquery height option
var portfolio_version = jQuery('#maniva_meetup_portfolio_version').val();
if(portfolio_version == '4'){
    jQuery('#setting_maniva_meetup_portfolio_height').slideUp();
}else{
    jQuery('#setting_maniva_meetup_portfolio_height').slideDown();
}

jQuery('#maniva_meetup_portfolio_version').on('change',function(){
    if(jQuery(this).val()=='4'){
        jQuery('#setting_maniva_meetup_portfolio_height').slideUp();
    }else{
        jQuery('#setting_maniva_meetup_portfolio_height').slideDown();
    }
});



// Option color of theme
var type_color = jQuery('#maniva_meetup_TZTypecolor').val();
if(type_color == '0'){
    jQuery('#setting_maniva_meetup_TZThemecolor').slideDown();
    jQuery('#setting_maniva_meetup_TZThemecustom').slideUp();
}else{
    jQuery('#setting_maniva_meetup_TZThemecolor').slideUp();
    jQuery('#setting_maniva_meetup_TZThemecustom').slideDown();
}

jQuery('#maniva_meetup_TZTypecolor').on('change',function(){
    if(jQuery(this).val()=='0'){
        jQuery('#setting_maniva_meetup_TZThemecolor').slideDown();
        jQuery('#setting_maniva_meetup_TZThemecustom').slideUp();
    }else{
        jQuery('#setting_maniva_meetup_TZThemecolor').slideUp();
        jQuery('#setting_maniva_meetup_TZThemecustom').slideDown();
    }
});

// Option width of page default
var pageDefault_width = jQuery('#maniva_meetup_PageDefault_Padding').val();
if(pageDefault_width == '1'){
    jQuery('#setting_maniva_meetup_PageDefault_paddingTop').slideUp();
    jQuery('#setting_maniva_meetup_PageDefault_paddingBottom').slideUp();
}else{
    jQuery('#setting_maniva_meetup_PageDefault_paddingTop').slideDown();
    jQuery('#setting_maniva_meetup_PageDefault_paddingBottom').slideDown();
}

jQuery('#maniva_meetup_PageDefault_Padding').on('change',function(){
    if(jQuery(this).val()=='1'){
        jQuery('#setting_maniva_meetup_PageDefault_paddingTop').slideUp();
        jQuery('#setting_maniva_meetup_PageDefault_paddingBottom').slideUp();
    }else{
        jQuery('#setting_maniva_meetup_PageDefault_paddingTop').slideDown();
        jQuery('#setting_maniva_meetup_PageDefault_paddingBottom').slideDown();
    }
});