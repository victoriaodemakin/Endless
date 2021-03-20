<?php
/*
 * Template Name: Template Home Page
 */

get_header();

$maniva_meetup_footerType     = get_post_meta( get_the_ID(),'maniva-meetup'.'_footerHome_type',true);
$maniva_meetup_homestyle = get_post_meta( get_the_ID(), 'maniva-meetup' . '_styleHome_type','1' );
$maniva_meetup_homestyle_class = '';
if($maniva_meetup_homestyle == 1){
    $maniva_meetup_homestyle_class = 'style-default';
}elseif($maniva_meetup_homestyle == 2){
    $maniva_meetup_homestyle_class = 'home-style-8';
}else{
    $maniva_meetup_homestyle_class = 'home-style-8 home9';
}
?>
    <?php if($maniva_meetup_homestyle == 2 || $maniva_meetup_homestyle == 3): ?>
    <div class="<?php echo esc_attr($maniva_meetup_homestyle_class); ?>">
        <?php endif; ?>

        <?php
        if(have_posts()):
            while(have_posts()):the_post();
                the_content();
                wp_link_pages();
            endwhile;
        endif;


        if ( $maniva_meetup_footerType == 1 ) :
            get_template_part('template_inc/inc','footer-one-column');
        elseif ( $maniva_meetup_footerType == 2 ) :
            get_template_part('template_inc/inc','footer');
        elseif ( $maniva_meetup_footerType == 3 ) :
            get_template_part('template_inc/inc','footer-one-column-multi');
        else:
            get_template_part('template_inc/inc','footer-single');
        endif;
        ?>
        <?php if($maniva_meetup_homestyle == 2 || $maniva_meetup_homestyle == 3): ?>
    </div>
    <?php
    endif;
get_footer();
?>

