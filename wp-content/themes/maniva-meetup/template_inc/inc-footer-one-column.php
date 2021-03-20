<?php

$maniva_meetup_chose_backTop        =   ot_get_option( 'maniva-meetup' . '_ChooseBackTop', 0 );
$maniva_meetup_on_off_back_top      =   ot_get_option( 'maniva-meetup' . '_on_off_back_top', 'on' );
$maniva_meetup_image_backTop        =   ot_get_option('maniva-meetup' . '_image_backTop');
$maniva_meetup_font_awes_backTop    =   ot_get_option('maniva-meetup' . '_FontAwesomeBackTop','fa-angle-up');

$maniva_meetup_scrolling_back_top   =   ot_get_option('maniva-meetup' . '_scrolling_back_top','off');

$maniva_meetup_font_awes_class = $maniva_meetup_scrolling_back_top_class = '';
if ( $maniva_meetup_chose_backTop == 1 ) {
    $maniva_meetup_font_awes_class  =   ' tz-backtotop-icon';
}

if ( $maniva_meetup_scrolling_back_top == 'on' ) {
    $maniva_meetup_scrolling_back_top_class =   ' tz-scrolling_back_top';
}
$maniva_meetup_control_animate_backTop    =   ot_get_option('maniva-meetup' . '_AnimateBackTop','0');
$maniva_meetup_control_animate_backTop_class = 'effect_enabled';
if($maniva_meetup_control_animate_backTop == 1){
    $maniva_meetup_control_animate_backTop_class = 'effect_disabled';
}
$maniva_meetup_control_position_backTop    =   ot_get_option('maniva-meetup' . '_PositionBackTop','0');
$maniva_meetup_control_position_backTop_class = 'position_right';
if($maniva_meetup_control_position_backTop == 1){
    $maniva_meetup_control_position_backTop_class = 'position_left';
}
?>
<footer class="tz-footer tz-footer-type1">

    <?php if ( $maniva_meetup_on_off_back_top == 'on' ) : ?>

        <div class="tz-backtotop<?php echo esc_attr( $maniva_meetup_font_awes_class ) . esc_attr( $maniva_meetup_scrolling_back_top_class ); ?> <?php echo esc_attr($maniva_meetup_control_animate_backTop_class); ?> <?php echo esc_attr($maniva_meetup_control_position_backTop_class); ?>">
            <?php

            if ( $maniva_meetup_chose_backTop == 0 ) :

                if( $maniva_meetup_image_backTop != '' ):
                    echo'<img src="'. esc_url( $maniva_meetup_image_backTop ) .'" alt="'.get_bloginfo('title').'" />';
                endif;

            else:

                echo '<i class="fa '.$maniva_meetup_font_awes_backTop.'" aria-hidden="true"></i>';

            endif;


            ?>
        </div>

    <?php endif; ?>

    <?php

        if(is_active_sidebar('maniva-meetup'."-footer-one-column-center")):
            dynamic_sidebar('maniva-meetup'."-footer-one-column-center");
        endif;

    ?>

    <div class="tzcopyright">

        <div class="tz_footer_social_network">
            <ul>
                <?php maniva_meetup_get_social_header_3_url(); ?>
            </ul>
        </div>

        <?php
        $maniva_meetup_footer_text = ent2ncr(ot_get_option('maniva-meetup' . '_copyright'));

        echo wp_kses_allowed_html($maniva_meetup_footer_text );
        ?>

    </div>

</footer>