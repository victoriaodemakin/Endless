/*global jQuery: false, themeprefix: false */

jQuery(function(){
  "use strict";
  jQuery('#portfolio_meta_box .btn-group .btn').click(function () {
    jQuery(this).parent().find('> input').attr('checked', false);
    jQuery('#' + jQuery(this).val()).attr('checked', true);
  });

  jQuery('.portfolio-slideshow-item').parent().parent().addClass('width100');
  jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().hide();
  jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().hide();
  jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().hide();
  jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().hide();
  jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().hide();
  jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().hide();
  jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().hide();
  jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().hide();

  jQuery('#' + themeprefix + '_portfolio_type').on('change', function(){
    switch(jQuery(this).val()){
      case 'images':
        jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideDown();
        jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
        break;
      case 'slideshows':
        jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideDown();
        jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
        break;
      case 'video':
          jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideDown();
        jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideDown();
        jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
        break;
      case 'audio':
        jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideDown();
          jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
        break;
    case 'quote':
        jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideDown();
        jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
        break;
    case 'link':
        jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideDown();
        jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideDown();
        break;
      case 'none':
        jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
        jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
        break;
    }
  });

  jQuery('#' + themeprefix + '_portfolio_type').each(function(){
    if(jQuery(this).find('option').is(':checked')){

      switch(jQuery(this).val()){
        case 'images':
          jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideDown();
          jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();

          break;
        case 'slideshows':
          jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideDown();
          jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();

          break;
        case 'video':
          jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideDown();
          jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
          jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideDown();
            jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
            jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
          break;
          case 'audio':
              jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideDown();
              jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
              break;
          case 'quote':
              jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideDown();
              jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
              break;
          case 'link':
              jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideDown();
              jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideDown();
              break;
          case 'none':
              jQuery('#' + themeprefix + '_portfolio_fullsize_image').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_slideshows_settings_array').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_video').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_video_type').parent().parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_soundCloud_id').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Quote_Autor').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Link_Title').parent().parent().parent().slideUp();
              jQuery('#' + themeprefix + '_portfolio_Link_Url').parent().parent().parent().slideUp();
              break;
      }
    }
  });

  var $checkpage = jQuery('#page_template').val();

    if ( $checkpage == 'default' ){
        jQuery('#page_default').css('display','block');
    }

    if ( $checkpage == 'template-portfolio.php' ){
        jQuery('#page_meta_box').css('display','block');
    }
    if($checkpage == 'template-homepage.php'){
        jQuery('#page_home').css('display','block');
    }
    if($checkpage == 'template-blogmasonry.php'){
        jQuery('#blogMasonry_meta_box').css('display','block');
    }

  jQuery('#page_template').on('change',function(){
     var $value = jQuery(this).val();

      if ( $value == 'default' ){
          jQuery('#page_default').css('display','block');
      }else{
          jQuery('#page_default').css('display','none');
      }

      if ( $value == 'template-portfolio.php' ){
          jQuery('#page_meta_box').css('display','block');
      }else{
          jQuery('#page_meta_box').css('display','none');
      }

      if ( $value == 'template-homepage.php' ){
          jQuery('#page_home').css('display','block');
      }else{
          jQuery('#page_home').css('display','none');
      }

      if ( $value == 'template-blogmasonry.php' ){
          jQuery('#blogMasonry_meta_box').css('display','block');
      }else{
          jQuery('#blogMasonry_meta_box').css('display','none');
      }

  });

    // page default slider client blog

    var PageDefault_slider_client_blog_option = jQuery('#maniva-meetup_PageDefault_slideshows_show');
    var PageDefault_slider_client_blog = PageDefault_slider_client_blog_option.val();
    if(PageDefault_slider_client_blog=='show'){
        jQuery('#setting_maniva-meetup_PageDefault_background_image_slider_client').slideDown();
        jQuery('#setting_maniva-meetup_PageDefault_item_slideshows_client').slideDown();
        jQuery('#setting_maniva-meetup_PageDefault_slideshows').slideDown();
    }else{
        jQuery('#setting_maniva-meetup_PageDefault_background_image_slider_client').slideUp();
        jQuery('#setting_maniva-meetup_PageDefault_item_slideshows_client').slideUp();
        jQuery('#setting_maniva-meetup_PageDefault_slideshows').slideUp();
    }

    PageDefault_slider_client_blog_option.on('change',function(){
        if(jQuery(this).val()=='show'){
            jQuery('#setting_maniva-meetup_PageDefault_background_image_slider_client').slideDown();
            jQuery('#setting_maniva-meetup_PageDefault_item_slideshows_client').slideDown();
            jQuery('#setting_maniva-meetup_PageDefault_slideshows').slideDown();
        }else{
            jQuery('#setting_maniva-meetup_PageDefault_background_image_slider_client').slideUp();
            jQuery('#setting_maniva-meetup_PageDefault_item_slideshows_client').slideUp();
            jQuery('#setting_maniva-meetup_PageDefault_slideshows').slideUp();
        }
    });


});
