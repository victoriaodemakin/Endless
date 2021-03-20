<?php
$maniva_meetup_footer_col       =   ot_get_option('maniva-meetup'. '_footerShop_columns',5);
$maniva_meetup_footer_width1    =   ot_get_option('maniva-meetup'. 'footerwidth1_shop',2);
$maniva_meetup_footer_width2    =   ot_get_option('maniva-meetup'. 'footerwidth2_shop',2);
$maniva_meetup_footer_width3    =   ot_get_option('maniva-meetup'. 'footerwidth3_shop',2);
$maniva_meetup_footer_width4    =   ot_get_option('maniva-meetup'. 'footerwidth4_shop',2);
$maniva_meetup_footer_width5    =   ot_get_option('maniva-meetup'. 'footerwidth5_shop',4);
$maniva_meetup_footer_titlebg   =   ot_get_option('maniva-meetup' . '_tzFooter_Titlebg');

$maniva_meetup_chose_backTop        =   ot_get_option( 'maniva-meetup' . '_ChooseBackTop', 0 );
$maniva_meetup_on_off_back_top      =   ot_get_option( 'maniva-meetup' . '_on_off_back_top', 'on' );
$maniva_meetup_image_backTop        =   ot_get_option('maniva-meetup' . '_image_backTop');
$maniva_meetup_font_awes_backTop    =   ot_get_option('maniva-meetup' . '_FontAwesomeBackTop','fa-angle-up');

$maniva_meetup_font_awes_class = $maniva_meetup_scrolling_back_top_class = '';
if ( $maniva_meetup_chose_backTop == 1 ) {
    $maniva_meetup_font_awes_class  =   ' tz-backtotop-icon';
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
<footer class="tzFooter-Shop-Multi">

    <?php if($maniva_meetup_footer_titlebg != '') : ?>

        <span class="tzFooter_bgText">
            <?php echo esc_html($maniva_meetup_footer_titlebg);?>
        </span>

    <?php endif; ?>

    <div class="tz-footerTop">
        <div class="container">
            <div class="row">
                <?php
                if(isset($maniva_meetup_footer_col) && $maniva_meetup_footer_col!=""):
                    for($maniva_meetup_i=0;$maniva_meetup_i<$maniva_meetup_footer_col;$maniva_meetup_i++):
                        $maniva_meetup_j = $maniva_meetup_i +1;
                        if($maniva_meetup_i==0){
                            $maniva_meetup_col = $maniva_meetup_footer_width1;
                        }elseif($maniva_meetup_i==1){
                            $maniva_meetup_col = $maniva_meetup_footer_width2;
                        }elseif($maniva_meetup_i==2){
                            $maniva_meetup_col = $maniva_meetup_footer_width3;
                        }elseif($maniva_meetup_i==3){
                            $maniva_meetup_col = $maniva_meetup_footer_width4;
                        }elseif($maniva_meetup_i==4){
                            $maniva_meetup_col = $maniva_meetup_footer_width5;
                        }
                        ?>
                        <div class="col-md-<?php echo esc_attr($maniva_meetup_col); ?> col-sm-6 col-xs-12 footerattr">
                            <?php
                            if(is_active_sidebar('maniva-meetup'."-footer-shop-multi-column-".$maniva_meetup_j) ):
                                dynamic_sidebar('maniva-meetup'."-footer-shop-multi-column-".$maniva_meetup_j);
                            endif;
                            ?>
                        </div><!--end class footermenu-->
                    <?php
                    endfor;
                endif;
                ?>
            </div>
        </div><!--end class container-->
    </div>

    <div class="tz-footerBottom">

        <?php if ( $maniva_meetup_on_off_back_top == 'on' ) : ?>

            <div class="tz-backtotop tz-scrolling_back_top<?php echo esc_attr( $maniva_meetup_font_awes_class ); ?> <?php echo esc_attr($maniva_meetup_control_animate_backTop_class); ?> <?php echo esc_attr($maniva_meetup_control_position_backTop_class); ?>">
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

        <div class="container">
            <?php
            if(is_active_sidebar('maniva-meetup'."-footer-shop-bottom")):
                dynamic_sidebar('maniva-meetup'."-footer-shop-bottom");
            endif;
            ?>

            <div class="tzcopyright">
                <?php
                $maniva_meetup_footer_text = ent2ncr(ot_get_option('maniva-meetup' . '_copyright'));
                //                    $maniva_meetup_footer_text = ot_get_option('maniva-meetup' . '_copyright');
                 wp_kses_allowed_html($maniva_meetup_footer_text );
                ?>
            </div>
        </div>

    </div><!--end class footerbottom -->

</footer>