<?php

    $maniva_meetup_slideshows_blog          =   ot_get_option('maniva-meetup' . '_blog_single_slideshows');
    $maniva_meetup_item_slider_client_blog  =   ot_get_option('maniva-meetup' . '_item_slideshows_client',5);

?>
<div class="tz_meetup_slider_blog_background">
    <div class="container">
        <div class="row">
            <div class="tz_meetup_slider_blog_single">

                <div class="tz_partner_blog_single_prev icon icon-arrows-left"></div>
                <div class="tz_partner_blog_single_next icon icon-arrows-right"></div>

                <div class="tz_meetup_slider_blog_images owl-carousel owl-theme" data-item="<?php echo esc_attr( $maniva_meetup_item_slider_client_blog ); ?>">
                    <?php
                        foreach ( $maniva_meetup_slideshows_blog as $maniva_meetup_slide_blog ) :
                            if ( $maniva_meetup_slide_blog['maniva-meetup' . '_blog_single_slideshow_item_link'] !='' ) :
                    ?>

                            <a target="_blank" href="<?php echo esc_url( $maniva_meetup_slide_blog['maniva-meetup' . '_blog_single_slideshow_item_link'] ); ?>">
                                <img src="<?php echo esc_url($maniva_meetup_slide_blog['maniva-meetup' . '_blog_single_slideshow_item']) ; ?>" alt="<?php the_title();?>">
                            </a>

                    <?php else: ?>

                            <img src="<?php echo esc_url($maniva_meetup_slide_blog['maniva-meetup' . '_blog_single_slideshow_item']) ; ?>" alt="<?php the_title();?>">

                    <?php
                            endif;
                        endforeach;
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
