<?php

$maniva_meetup_class_admin = '';

$maniva_meetup_type_menu            =   ot_get_option('maniva-meetup'. 'type-menu',1);
$maniva_meetup_bk_img_header        =   ot_get_option('maniva-meetup'. 'bk-img_header','');
$maniva_meetup_position_desktop     =   ot_get_option('maniva-meetup'. 'position-on-desktop',1);
$maniva_meetup_position_mobile      =   ot_get_option('maniva-meetup'. 'position-mobile',1);
$maniva_meetup_on_off_header_top    =   ot_get_option('maniva-meetup'. 'on-off-header-top',1);
$maniva_meetup_on_off_button_search =   ot_get_option('maniva-meetup'. 'on-off-button-search','on');
$maniva_meetup_position_header_top  =   ot_get_option( 'maniva-meetup'. 'position-header-top',1 );
$maniva_meetup_header_top_phone     =   ot_get_option('maniva-meetup' . '_TzHeaderTopPhone','') ;
$maniva_meetup_header_top_mail      =   ot_get_option('maniva-meetup' . '_TzHeaderTopMail','');
$maniva_meetup_right_to_left        =   ot_get_option( 'maniva-meetup' . '_tzmaniva_rtl' );

$maniva_pull_left_right_logo = $maniva_pull_left_right_menu = $maniva_meetup_position_top_header = $maniva_meetup_class_bk_header = '';

if ( $maniva_meetup_right_to_left == 1 ):

    $maniva_pull_left_right_logo = 'pull-right';
    $maniva_pull_left_right_menu = 'pull-left';
else:

    $maniva_pull_left_right_logo = 'pull-left';
    $maniva_pull_left_right_menu = 'pull-right';
endif;

if ( $maniva_meetup_on_off_header_top != 1 ) {

    if ( $maniva_meetup_position_header_top == 1 ) :
        $maniva_meetup_position_top_header = ' text-left';
    elseif ( $maniva_meetup_position_header_top == 2 ) :
        $maniva_meetup_position_top_header = ' text-center';
    else:
        $maniva_meetup_position_top_header = ' text-right';
    endif;

}

if( $maniva_meetup_type_menu == 1 ) :
    $maniva_meetup_header_class =   'tz-homeType1';
else :
    $maniva_meetup_header_class = 'tz-homeType1 tz-homeType3';
endif;

if ( $maniva_meetup_position_desktop == 1 ) :
    $header_class_position = ' tz-homeTypeRelative ';
else:
    $header_class_position = ' tz-homeTypeFixed';
endif;

$maniva_meetup_class_position_mobile = '';
if ( $maniva_meetup_position_mobile == 2 ) :
    $maniva_meetup_class_position_mobile = ' tz-menu-mobile-fix';
endif;

if ( $maniva_meetup_bk_img_header !='' && class_exists('Tribe__Events__Main') ) :

    if ( is_singular( 'tribe_events' ) || ( tribe_is_month() && !is_tax() ) || ( get_post_type() == 'tribe_organizer' && is_single() ) || ( tribe_is_past() || tribe_is_upcoming() && !is_tax() ) || ( tribe_is_day() && !is_tax() ) ) {

        $maniva_meetup_class_bk_header = ' tz_bk_img_header';
        $maniva_meetup_header_class = 'tz-homeType1 tz-homeType4';

    }

endif;


?>

<header class="tz-headerHome tz-homeTypeRelative <?php echo esc_attr( $maniva_meetup_header_class ) . esc_attr( $maniva_meetup_class_position_mobile ) . esc_attr( $header_class_position ) ; ?>">
    <div id="Tz-provokeMe">

        <?php if ( $maniva_meetup_on_off_header_top != 4 ) : ?>

            <div class="tz_meetup_header_option">
                <div class="container">
                    <div class="row">

                        <?php if ( $maniva_meetup_on_off_header_top == 1 || $maniva_meetup_on_off_header_top == 2 ) : ?>

                        <div class="<?php if( $maniva_meetup_on_off_header_top == 2){ echo 'col-lg-12 col-md-12';}else{echo 'col-lg-6 col-md-6';}?> col-sm-12 col-xs-12">
                            <div class="tz_meetup_header_option_phone<?php echo esc_attr( $maniva_meetup_position_top_header ); ?>">
                                <span>
                                    <img src="<?php echo get_template_directory_uri().'/images/phone.png' ?>" alt="<?php esc_html_e('phone','maniva-meetup'); ?>">
                                    <?php echo esc_attr( $maniva_meetup_header_top_phone ); ?>
                                </span>
                                <span>
                                    <img src="<?php echo get_template_directory_uri().'/images/email_meetup.png' ?>" alt="<?php esc_html_e('email','maniva-meetup'); ?>">
                                    <a href="mailto:<?php echo esc_attr($maniva_meetup_header_top_mail); ?>">
                                        <?php echo esc_attr( $maniva_meetup_header_top_mail ); ?>
                                    </a>
                                </span>
                            </div>
                        </div>

                        <?php endif; ?>

                        <?php if ( $maniva_meetup_on_off_header_top == 1 || $maniva_meetup_on_off_header_top == 3 ) : ?>

                        <div class="<?php if( $maniva_meetup_on_off_header_top == 3 ){echo 'col-lg-12 col-md-12';}else{echo 'col-lg-6 col-md-6'; } ?> col-sm-12 col-xs-12">
                            <div class="tz-headerRight<?php echo esc_attr( $maniva_meetup_position_top_header ); ?>">
                                <?php

                                if ( $maniva_meetup_type_menu == 1 ) :

                                    maniva_meetup_get_social_url();

                                else:
                                ?>

                                    <ul class="tz_list_social_header_3">
                                        <?php maniva_meetup_get_social_header_3_url(); ?>

                                        <?php if ( $maniva_meetup_on_off_button_search == 'on' ) : ?>

                                            <li class="tz_btn_search_header">
                                                <span class="tz-search-header3">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </li>

                                        <?php endif;; ?>

                                    </ul>

                                <?php endif; ?>

                            </div>
                        </div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="tz-header-content tz-page-header-content<?php echo esc_attr( $maniva_meetup_class_bk_header ); ?>">
            <div class="container">
                <div class="tzHeaderContainer">
                    <a class="<?php echo esc_attr( $maniva_pull_left_right_logo ); ?> tz_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">

                        <?php
                        $maniva_meetup_logotype = ot_get_option('maniva-meetup' . '_logotype','text');
                        $maniva_meetup_logo_image = ot_get_option('maniva-meetup' . '_logo');

                        if($maniva_meetup_logo_image == ''){
                            $maniva_meetup_logo_image = get_template_directory_uri().'/images/logo-2.png';
                        }

                        if($maniva_meetup_logotype == '0'){
                            echo ot_get_option('maniva-meetup' . '_logoText','meetup');
                        }else{



                            if ( $maniva_meetup_bk_img_header !='' && class_exists('Tribe__Events__Main') ) :

                                if ( is_singular( 'tribe_events' ) || ( tribe_is_month() && !is_tax() ) || ( get_post_type() == 'tribe_organizer' && is_single() ) || ( tribe_is_past() || tribe_is_upcoming() && !is_tax() ) || ( tribe_is_day() && !is_tax() ) ) {

                                    $maniva_meetup_logo_image_event = ot_get_option('maniva-meetup' . '_logo_event_calendar');

                                    echo'<img class="logo_lager" src="'. esc_url( $maniva_meetup_logo_image_event ) .'" alt="'.get_bloginfo('title').'" />';


                                }else {
                                    echo'<img class="logo_lager" src="'. esc_url($maniva_meetup_logo_image) .'" alt="'.get_bloginfo('title').'" />';
                                }

                            else:

                                echo'<img class="logo_lager" src="'. esc_url($maniva_meetup_logo_image) .'" alt="'.get_bloginfo('title').'" />';

                            endif;

                        }
                        ?>

                    </a>

                    <div class="tzHeaderMenu_nav">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tz-navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>

                        <?php if ( class_exists('Woocommerce') ) : ?>

                            <div class="tz_shop_cart_icon <?php echo esc_attr( $maniva_pull_left_right_menu ); ?>">
                                <div class="tz_shop_quick_cart_view">

                                    <?php
                                    /**
                                     * maniva_meetup_get_cart_item hook.
                                     *
                                     * @hooked maniva_meetup_get_cart - 10
                                     */
                                    do_action( 'maniva_meetup_get_cart_item' );

                                    if ( class_exists( 'WooCommerce' ) ) {
                                        the_widget( 'WC_Widget_Cart', '' );
                                    }

                                    ?>

                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if ( $maniva_meetup_type_menu == 1 && $maniva_meetup_on_off_button_search == 'on' ) : ?>

                            <button class="<?php echo esc_attr( $maniva_pull_left_right_menu ); ?> tz-search">
                                <i class="fa fa-search"></i>
                            </button>

                        <?php endif; ?>

                        <nav class="<?php echo esc_attr( $maniva_pull_left_right_menu ); ?>">

                            <?php

                            if ( has_nav_menu('primary') ) :
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'nav navbar-nav collapse navbar-collapse pull-left tz-nav',
                                    'menu_id' => 'tz-navbar-collapse',
                                    'container' => false
                                ));

                            else:

                            ?>

                                <ul class="main-menu">
                                    <li>
                                        <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                            <?php esc_html_e('ADD TO MENU','maniva-meetup'); ?>
                                        </a>
                                    </li>
                                </ul>

                            <?php endif; ?>

                        </nav>
                    </div>

                    <?php if ( $maniva_meetup_on_off_button_search == 'on' ) : ?>

                    <!-- Form search start -->
                    <div class="tz-form-search">
                        <div class="container">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    <!-- Form search end -->

                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div><!--end class container-->
</header>

<?php if ( $maniva_meetup_position_mobile == 2 ): ?>

    <div class="tz_mobile_fix_space tz_mobile_fix_space_3"></div>

<?php endif; ?>