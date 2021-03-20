"use strict";
var $container        =   jQuery('.tzBlogmasonry'),
    Desktop           =   variables_blog.desktop,
    tabletportrait    =   variables_blog.tabletportrait,
    mobilelandscape   =   variables_blog.mobilelandscape,
    mobileportrait    =   variables_blog.mobileportrait,
    resizeTimer = null;

/*
 * Method reize image
 * @variables class
 */
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

/*
 * Method portfolio column
 * @variables Desktop
 * @variables tabletportrait
 * @variables mobilelandscape
 * @variables mobileportrait
 */
function tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait){
    var contentWidth    = jQuery('.tzBlogmasonry').width();
    var numberItem      = 2;
    var newColWidth     = 0;
    var featureColWidth = 0;
    var widthWindwow = jQuery(window).width();
    if (widthWindwow > 1200) {
        numberItem = Desktop;
    } else if (  widthWindwow > 991) {
        numberItem = 3 ;
    } else if (  widthWindwow >= 768) {
        numberItem = tabletportrait ;
    } else if (  widthWindwow >= 480) {
        numberItem = mobilelandscape ;
    } else if (widthWindwow < 480) {
        numberItem = mobileportrait ;
    }
    newColWidth = Math.floor(contentWidth / numberItem);
    featureColWidth = newColWidth * 2;
    jQuery('.blogMasonry-item').width(newColWidth);
    jQuery('.tz_feature_item').width(featureColWidth);
    var $container  = jQuery('.tzBlogmasonry') ;
    $container.imagesLoaded(function(){
        $container.isotope({
            masonry:{
                columnWidth: newColWidth
            }
        });

    });
}

/*
 * Method reize
 */
jQuery(window).bind('load resize', function() {
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout("tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait)", 100);
});

