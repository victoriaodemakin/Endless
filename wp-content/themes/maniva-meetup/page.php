<?php

get_header();

//$maniva_meetup_footerType       = get_post_meta( get_the_ID(),'maniva-meetup'.'_footerDefault_type',true);
$maniva_meetup_Page_Width       = get_post_meta( get_the_ID(),'maniva-meetup'.'_PageDefault_width',true);
$maniva_meetup_Padding_option   = get_post_meta( get_the_ID(),'maniva-meetup'.'_PageDefault_Padding',true);
$maniva_meetup_Padding_top      = get_post_meta( get_the_ID(),'maniva-meetup'.'_PageDefault_paddingTop',true);
$maniva_meetup_Padding_bottom   = get_post_meta( get_the_ID(),'maniva-meetup'.'_PageDefault_paddingBottom',true);
$maniva_meetup_page_slider_show =   get_post_meta( get_the_ID(),'maniva-meetup' . '_PageDefault_slideshows_show',true );

$maniva_meetup_WidthPage = '';
if($maniva_meetup_Page_Width == ''){
    $maniva_meetup_WidthPage = 1;
}else{
    $maniva_meetup_WidthPage = $maniva_meetup_Page_Width;
}

if ( class_exists( 'WooCommerce' ) ) {
    if ( is_cart() || is_checkout() || is_account_page() ) :

        $maniva_meetup_on_off_breadcrumb_shop	=   ot_get_option('maniva-meetup'. 'breadcrumb-shop-on-off');
        if ( $maniva_meetup_on_off_breadcrumb_shop == 'on' ) :
            get_template_part('template_inc/inc','breadcrumb-shop');
        endif;

    else:
        $maniva_meetup_on_off_Breadcrumb    =   ot_get_option('maniva-meetup'. 'tzBreadcrumb_on_off','on');
        if ( $maniva_meetup_on_off_Breadcrumb == 'on' ) :

            get_template_part('template_inc/inc','breadcrumb');
        endif;
    endif;
}else{
    $maniva_meetup_on_off_Breadcrumb    =   ot_get_option('maniva-meetup'. 'tzBreadcrumb_on_off','on');
    if ( $maniva_meetup_on_off_Breadcrumb == 'on' ) :

        get_template_part('template_inc/inc','breadcrumb');
    endif;
}

?>

<div class="TzPage_Default">

    <?php if($maniva_meetup_WidthPage != '' && $maniva_meetup_WidthPage == '1'): ?>

    <div class="container">

    <?php endif;?>

        <?php if ( have_posts() ) : while (have_posts()) : the_post() ; ?>

            <div <?php post_class('tz_page_content') ?> <?php
            if($maniva_meetup_Padding_option != '' && $maniva_meetup_Padding_option == '2' && ($maniva_meetup_Padding_bottom != '' || $maniva_meetup_Padding_top != '')):
                echo 'style="';
                if($maniva_meetup_Padding_top != ''):
                    echo 'padding-top:'. esc_attr($maniva_meetup_Padding_top) .'px;';
                endif;
                if($maniva_meetup_Padding_bottom != ''):
                    echo 'padding-bottom:'. esc_attr($maniva_meetup_Padding_bottom) .'px;';
                endif;
                echo '"';
            endif;
            ?>>
                <?php the_content();
                wp_link_pages() ;
                ?>
            </div>

        <?php
        endwhile; endif;
        ?>

        <?php if ( comments_open() || get_comments_number() ) : ?>

            <div class="tzComments">
                <?php comments_template( '', true ); ?>
            </div><!-- end comments -->

        <?php endif; ?>

    <?php if($maniva_meetup_Page_Width != '' && $maniva_meetup_Page_Width == '1'): ?>
    </div>
    <?php endif;?>

</div>

<?php if ( $maniva_meetup_page_slider_show == 'show' ) : ?>

<div class="maniva_meetup_slider_blog">

    <?php
    get_template_part('template_inc/inc','slider-page-default');
    ?>

</div>

<?php

endif;

get_footer();

?>