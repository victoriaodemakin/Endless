<?php

get_header();

$maniva_meetup_tzSidebar            =   ot_get_option('maniva-meetup' . '_TZBlogSidebar','show');
$maniva_meetup_on_off_Breadcrumb    =   ot_get_option('maniva-meetup'. 'tzBreadcrumb_on_off','on');

$maniva_meetup_class_sidebar ='';
if($maniva_meetup_tzSidebar == 'show'){
    $maniva_meetup_class_sidebar = 'col-md-9';
}else{
    $maniva_meetup_class_sidebar = 'col-md-12';
}

?>

<?php
if ( $maniva_meetup_on_off_Breadcrumb == 'on' ) :
    get_template_part('template_inc/inc','breadcrumb');
endif;
?>

<section class="container tz-blogDefault">
    <div class="row">

        <div class="<?php echo esc_attr($maniva_meetup_class_sidebar);?>">

            <?php get_template_part( 'template_inc/post/content','post' ); ?>

        </div>

        <?php

            if( $maniva_meetup_tzSidebar == 'show' ):
                get_sidebar();
            endif;

        ?>

    </div>
</section>

<?php get_footer(); ?>