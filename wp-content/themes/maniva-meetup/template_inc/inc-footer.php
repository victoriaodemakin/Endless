<?php
$maniva_meetup_footer_col                 =   ot_get_option('maniva-meetup'. '_footer_columns',4);
$maniva_meetup__footer_width1             =   ot_get_option('maniva-meetup'. 'footerwidth1',3);
$maniva_meetup_footer_width2              =   ot_get_option('maniva-meetup'. 'footerwidth2',3);
$maniva_meetup_footer_width3              =   ot_get_option('maniva-meetup'. 'footerwidth3',3);
$maniva_meetup_footer_width4              =   ot_get_option('maniva-meetup'. 'footerwidth4',3);

$maniva_meetup_chose_backTop              =   ot_get_option( 'maniva-meetup' . '_ChooseBackTop', 0 );
$maniva_meetup_on_off_back_top            =   ot_get_option( 'maniva-meetup' . '_on_off_back_top', 'on' );
$maniva_meetup_image_backTop              =   ot_get_option('maniva-meetup' . '_image_backTop');
$maniva_meetup_font_awes_backTop          =   ot_get_option('maniva-meetup' . '_FontAwesomeBackTop','fa-angle-up');

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
<footer class="tz-footer">
    <div class="tz-footerTop">
        <div class="container">
            <div class="row">
                <?php
                if(isset($maniva_meetup_footer_col) && $maniva_meetup_footer_col!=""):
                    for($maniva_meetup_i=0;$maniva_meetup_i<$maniva_meetup_footer_col;$maniva_meetup_i++):
                        $maniva_meetup_j = $maniva_meetup_i +1;
                        if($maniva_meetup_i==0){
                            $maniva_meetup_col = $maniva_meetup__footer_width1;
                        }elseif($maniva_meetup_i==1){
                            $maniva_meetup_col = $maniva_meetup_footer_width2;
                        }elseif($maniva_meetup_i==2){
                            $maniva_meetup_col = $maniva_meetup_footer_width3;
                        }elseif($maniva_meetup_i==3){
                            $maniva_meetup_col = $maniva_meetup_footer_width4;
                        }
                        ?>
                        <div class="col-md-<?php echo esc_attr($maniva_meetup_col); ?> footerattr">
                            <?php
                            if( is_active_sidebar('maniva-meetup'."-footer-multi-column-".$maniva_meetup_j) ):
                                dynamic_sidebar('maniva-meetup'."-footer-multi-column-".$maniva_meetup_j);
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

            <div class="tz-backtotop<?php echo esc_attr( $maniva_meetup_font_awes_class ) . esc_attr( $maniva_meetup_scrolling_back_top_class ); ?> <?php echo esc_attr($maniva_meetup_scrolling_back_top_class); ?> <?php echo esc_attr($maniva_meetup_control_position_backTop_class); ?>">
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
            <div class="row">
                <div class="col-sm-6 col-md-6 tzcopyright">
                    <?php
                    $maniva_meetup_footer_text = ent2ncr(ot_get_option('maniva-meetup' . '_copyright'));
                    if($maniva_meetup_footer_text == ''){
                        echo '<p>Copyright &copy Templaza</p>';
                    }else{
                        echo wp_kses_allowed_html($maniva_meetup_footer_text );
                    }
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 tzbottom_menu">
                    <nav class="pull-right tzfootermenu">
                        <?php
                        if ( has_nav_menu('footer-menu') ) :
                            wp_nav_menu(array(
                                'theme_location'    =>  'footer-menu',
                                'menu_class'        => '',
                                'container'         =>  false,
                            ));
                        endif;
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </div><!--end class footerbottom -->
</footer>