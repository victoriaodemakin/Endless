<?php

get_header();

$maniva_meetup_tzSidebar    =   ot_get_option('maniva-meetup' . '_TZBlogSidebar','show');

$maniva_meetup_class_sidebar ='';
if($maniva_meetup_tzSidebar == 'show'){
    $maniva_meetup_class_sidebar = 'col-md-9';
}else{
    $maniva_meetup_class_sidebar = 'col-md-12';
}

?>

<section class="tz-sectionBreadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="tz_breadcrumb_single_cat_title">
                    <h4>
                        <?php single_cat_title();?>
                    </h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="tz-breadcrumb">
                    <h4>
                        <?php if(function_exists('bcn_display')):  bcn_display(); endif; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div><!--end class container-->
</section><!--end class tzbreadcrumb-->

<section class="container tz-blogDefault">
    <div class="row">
        <div class="<?php echo esc_attr($maniva_meetup_class_sidebar);?>">

            <?php get_template_part( 'template_inc/post/content','post' ); ?>

        </div>

        <?php

            if( $maniva_meetup_tzSidebar == 'show' ) :
                get_sidebar();
            endif;

        ?>

    </div>
</section>


<?php get_footer(); ?>