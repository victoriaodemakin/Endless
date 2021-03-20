<?php
use PlazartInstallation\Helper\HelperLicense;
require get_parent_theme_file_path( '/functions-plazart.php' );

if ( class_exists('Woocommerce') ) :

    require get_parent_theme_file_path( '/extension/woocommerce/hooks.php' );
    require get_parent_theme_file_path( '/extension/woocommerce/functions.php' );

endif;

/*
 * Method add ot_get_option
 */


if(!is_admin()):

    if ( ! function_exists( 'ot_get_option' ) ) {
        function ot_get_option( $option_id, $default = '' ) {
            /* get the saved options */
            $options = get_option( 'option_tree' );
            /* look for the saved value */
            if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
                return $options[$option_id];
            }
            return $default;
        }
    }


endif;

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 900;

if ( ! function_exists( 'maniva_meetup_slug_setup' ) ) :

    function maniva_meetup_slug_setup() {

        load_theme_textdomain( 'maniva-meetup', get_template_directory() . '/languages' );

        add_theme_support( 'title-tag' );

    }

    // Featured image
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'full-thumb', 1500, 0, true );
    add_image_size( 'slider-thumb', 1500, 530, true );
    add_image_size( 'misc-thumb', 303, 386, true );
    add_image_size( 'misc-thumb-mobile', 520, 300, true );

    if( class_exists('PlazartInstallation\Helper\HelperLicense') ) {
        require ''.WP_PLUGIN_DIR.'/plazart-installation/libraries/helperlicense.php';

    }

    $new_value =array(
        'purchase_code' => 'manual-37f9f681-061e-c273-0b842d2c93aa',
        'license_type' => 'Regular License',
        'purchase_date' => '2020-12-01',
        'supported_until' => '2020-12-31',
        'buyer' => 'templaza',
        'domain' => get_site_url(),
        'secret_key' => md5(uniqid(get_template())),
        'domain_valid' => true,
    );
    update_option( '_plzinst_envato_license__'.get_template().'', $new_value );



endif;// maniva_meetup_slug_setup

add_action( 'after_setup_theme', 'maniva_meetup_slug_setup' );

/*
 * Method limit excerpt
 */
function maniva_meetup_limitexcerpt($lenght){
    return ot_get_option('maniva-meetup'.'_porlimitexcerpt',50) ;
}
add_filter('excerpt_length','maniva_meetup_limitexcerpt');

/*
 * Methor support author for portoflio
 */
add_filter('posts_where', 'maniva_meetup_include_for_author');
function maniva_meetup_include_for_author($where){
    if( is_author() )
        $where = str_replace(".post_type = 'post'", ".post_type in ('post', 'portfolio')", $where);

    return $where;
}

/* maniva_meetup_register_theme_scripts_ct */

/*
 * ADD GOOGLE FONT
 * */
function maniva_meetup_slug_fonts_url($name,$fontweight) {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /*
     * Translators: If there are characters in your language that are not supported
     * by Noto Sans, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Raleway: on or off', 'maniva-meetup' ) ) {
        $fonts[] = 'Raleway:400,100,200,300,500,700,600,800';
    }

    /*
     * Translators: If there are characters in your language that are not supported
     * by Noto Serif, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Roboto: on or off', 'maniva-meetup' ) ) {
        $fonts[] = 'Roboto:700,500,400,300,100';
    }

    /*
    * Translators: If there are characters in your language that are not supported
    * by Inconsolata, translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Roboto Slab: on or off', 'maniva-meetup' ) ) {
        $fonts[] = 'Roboto Slab:300';
    }

    /*
    * Translators: If there are characters in your language that are not supported
    * by Noto Serif, translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Roboto Condensed: on or off', 'maniva-meetup' ) ) {
        $fonts[] = 'Roboto Condensed:400,300';
    }

    /*
     * Translators: If there are characters in your language that are not supported
     * by Inconsolata, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Lato: on or off', 'maniva-meetup' ) ) {
        $fonts[] = 'Lato:400,400italic';
    }

    /*
    * Translators: If there are characters in your language that are not supported
    * by Inconsolata, translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'CreteRound: on or off', 'maniva-meetup' ) ) {
        $fonts[] = 'CreteRound:400italic';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}

add_action('init', 'maniva_meetup_register_theme_scripts_ct');
function maniva_meetup_register_theme_scripts_ct()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php') {

        if (is_admin()) {

            add_action('admin_enqueue_scripts','maniva_meetup_register_back_end_ct');

        } else {

            add_action('wp_enqueue_scripts', 'maniva_meetup_register_front_end_styles_ct');
            add_action('wp_enqueue_scripts', 'maniva_meetup_register_front_end_scripts_ct');

        }
    }
}

/***************************************************************************************
 * Function Check page events Calendar
 */
if ( ! function_exists( 'is_tribe_calendar' ) && class_exists('Tribe__Events__Main')) :
    function is_tribe_calendar() { // detect if we're on an Events Calendar page
        if (tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' ))
            return true;
        else return false;
    }
endif;

/**
 * Add new mimes for custom font upload
 */
if( ! function_exists( 'maniva_meetup_upload_mimes' ) ) {
    function maniva_meetup_upload_mimes( $maniva_meetup_existing_mimes=array() ){
        $maniva_meetup_existing_mimes['woff']   = 'font/woff';
        $maniva_meetup_existing_mimes['ttf'] 	= 'font/ttf';
        $maniva_meetup_existing_mimes['svg'] 	= 'font/svg';
        $maniva_meetup_existing_mimes['eot'] 	= 'font/eot';
        return $maniva_meetup_existing_mimes;
    }
}
add_filter('upload_mimes', 'maniva_meetup_upload_mimes');

/* ---------------------------------------------------------------------------
 * SSL | Compatibility
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'maniva_meetup_ssl' ) ) {
    function maniva_meetup_ssl( $echo = false ){
        $ssl = '';
        if( is_ssl() ) $ssl = 's';
        if( $echo ){
            echo esc_attr($ssl);
        }
        return $ssl;
    }
}

/* ---------------------------------------------------------------------------
 * Fonts | Selected in Theme Options
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'maniva_meetup_fonts_selected' ) ) {
    function maniva_meetup_fonts_selected(){
        $maniva_meetup_fonts = array();

        $maniva_meetup_fonts['content'] 		= ot_get_option( 'maniva-meetup'.'-font-content', 'Raleway' );
        $maniva_meetup_fonts['menu'] 			= ot_get_option( 'maniva-meetup'.'-font-menu', 'Raleway' );
        $maniva_meetup_fonts['headings'] 		= ot_get_option( 'maniva-meetup'.'-font-headings','Raleway' );
        $maniva_meetup_fonts['headingsSmall']   = ot_get_option( 'maniva-meetup'.'-font-headings-small', 'Raleway' );

        return $maniva_meetup_fonts;
    }
}

if( ! function_exists( 'maniva_meetup_fonts_css_selected' ) ) {
    function maniva_meetup_fonts_css_selected(){
        $maniva_meetup_fonts = array();

        $maniva_meetup_fonts['customcss'] 	    = ot_get_option( 'maniva-meetup'.'-font-custom-css', 'Raleway' );

        return $maniva_meetup_fonts;
    }
}

//Register back-end
function maniva_meetup_register_back_end_ct(){

    wp_enqueue_style('tz-options', get_template_directory_uri() . '/extension/assets/css/tz-options.css');

    wp_register_script('tz-option', get_template_directory_uri() . '/extension/assets/js/tz-option.js', false, '1.0', $in_footer=true);
    wp_enqueue_script('tz-option');

    $php_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
    wp_localize_script( 'tz-option', 'svl_array', $php_array );

    // css
    wp_enqueue_style('maniva-meetup' . '_admin_custom_styles', get_template_directory_uri() . '/extension/system/css/admin-styles.css');
    wp_enqueue_style('tz-theme-option', get_template_directory_uri() . '/extension/system/css/tz-theme-options.css');

    // js
    wp_register_script('maniva-meetup' . '_admin_custom_scripts', get_template_directory_uri() . '/extension/system/js/admin-scripts.js', array(), '1.0', false);
    wp_enqueue_script('maniva-meetup' . '_admin_custom_scripts');

    wp_register_script('portfolio_meta_boxes', get_template_directory_uri() . '/extension/system/js/portfolio_meta_boxes.js', false, '1.0', $in_footer=true);
    wp_enqueue_script('portfolio_meta_boxes');

    wp_register_script('portfolio_theme_option', get_template_directory_uri() . '/extension/system/js/portfolio_theme_option.js', false, '1.0', $in_footer=true);
    wp_enqueue_script('portfolio_theme_option');

}



//Register Front-End Styles
function maniva_meetup_register_front_end_styles_ct() {
    wp_enqueue_style( 'maniva-meetup-slug-fonts', maniva_meetup_slug_fonts_url('Raleway Roboto Lato','100,200,300,400,500,600,700,800'), array(), null );

    /* Start Google Fonts */
    $maniva_meetup_on_off_google_font   =  ot_get_option( 'maniva-meetup'. '-select-font-theme', 1 ) ;
    $maniva_meetup_fonts                =   maniva_meetup_fonts_selected();

    // style & weight
    if( $maniva_meetup_weight = ot_get_option('maniva-meetup'.'-font-weight','') ){

        $maniva_meetup_weight = ':'. implode( ',', $maniva_meetup_weight );

    }

    // subset
    $maniva_meetup_subset   =   ot_get_option( 'maniva-meetup' . '-font-subset','' );
    if ( $maniva_meetup_subset !='' ) {

        $maniva_meetup_subset = '&amp;subset='. str_replace(' ', '', $maniva_meetup_subset);
    }

    if ( $maniva_meetup_on_off_google_font != 1 ) :

        foreach( $maniva_meetup_fonts as $font ){

            $maniva_meetup_font_slug = str_replace(' ', '+', $font);
            wp_enqueue_style( $maniva_meetup_font_slug, 'http'. maniva_meetup_ssl() .'://fonts.googleapis.com/css?family='. $maniva_meetup_font_slug . $maniva_meetup_weight . $maniva_meetup_subset );

        }

    endif;
    /* End Google Fonts */

    if( is_child_theme() == false ){

        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/default/bootstrap.min.css', false );

    }

    wp_enqueue_style('linea-arrows', get_template_directory_uri() . '/fonts/linea-arrows/styles.css', false);

    wp_enqueue_style('font-awesome-meetup', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css', false);

    if ( is_home() || is_archive() || is_category() || is_page() || is_single() || is_author() || is_search() || is_tag() ) :

        wp_enqueue_style('owl.carousel.min', get_template_directory_uri() . '/css/lib/owl.carousel.min.css', false);

        wp_enqueue_style('owl.theme.default.min', get_template_directory_uri() . '/css/lib/owl.theme.default.min.css', false);

    endif;

    wp_enqueue_style('animate', get_template_directory_uri() . '/css/lib/animate.min.css', false );

    if ( class_exists('Woocommerce') ) :

        if ( is_shop() || is_product() ) :
            wp_enqueue_style('lightslider', get_template_directory_uri() . '/css/lib/lightslider.min.css', false, '1.1.3' );
        endif;

    endif;

    wp_enqueue_style('jpreloader', get_template_directory_uri() . '/css/lib/jpreloader.css', false );

    if ( is_archive() || is_author() || is_category() || is_search() || is_single() || is_tag() || is_page_template('template-blogmasonry.php') ) :

        wp_enqueue_style('prettyPhoto.min', get_template_directory_uri() . '/css/prettyPhoto.min.css', false);

    endif;

    if( is_child_theme() == false ){

        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false );

    }

    $maniva_meetup_right_to_left  =   ot_get_option( 'maniva-meetup' . '_tzmaniva_rtl' );

    $tzoptionpage = '';
    if ( isset($_GET["home_layout"]) && $_GET["home_layout"] == 'rtl' ){
        $tzoptionpage = 1;
    }


    if ( $tzoptionpage == 1 || $maniva_meetup_right_to_left == 1 ):

        wp_enqueue_style('right-to-left-css', get_template_directory_uri() . '/css/righttoleft.css', false );

    endif;

    // loading css
    // loading css

    $loading = ot_get_option('maniva-meetup_loading', 'off');

    if ($loading == 'on'):

        $loading_effect = ot_get_option('maniva-meetup_typeloading', '1');
        if ($loading_effect == 0):
            wp_enqueue_style('effect1', get_template_directory_uri() . '/css/loading/effect1.css', false);
        elseif ($loading_effect == 1):
            wp_enqueue_style('effect2', get_template_directory_uri() . '/css/loading/effect2.css', false);
        elseif ($loading_effect == 2):
            wp_enqueue_style('effect3', get_template_directory_uri() . '/css/loading/effect3.css', false);
        elseif ($loading_effect == 3):
            wp_enqueue_style('effect4', get_template_directory_uri() . '/css/loading/effect4.css', false);
        elseif ($loading_effect == 4):
            wp_enqueue_style('effect5', get_template_directory_uri() . '/css/loading/effect5.css', false);
        endif;

    endif;

    // end loading css

    // custom color for theme
    $maniva_meetup_color_theme      =   ot_get_option('maniva-meetup'.'_TZTypecolor',0);
    $maniva_meetup_color_default    =   ot_get_option('maniva-meetup'.'_TZThemecolor','');

    if ( $maniva_meetup_color_theme == 0 ) {

        if ( $maniva_meetup_color_default == '#fece15' ) :
            wp_enqueue_style('style-color-yellow', get_template_directory_uri() . '/css/color-default/yellow.css', false );
        elseif ( $maniva_meetup_color_default == '#e45914' ) :
            wp_enqueue_style('style-color-orange', get_template_directory_uri() . '/css/color-default/orange.css', false );
        elseif ( $maniva_meetup_color_default == '#e80f60' ) :
            wp_enqueue_style('style-color-pink', get_template_directory_uri() . '/css/color-default/pink.css', false );
        elseif ( $maniva_meetup_color_default == '#53c5a9' ) :
            wp_enqueue_style('style-color-green', get_template_directory_uri() . '/css/color-default/green.css', false );
        elseif ( $maniva_meetup_color_default == '#57a6f0' ) :
            wp_enqueue_style('style-color-blue', get_template_directory_uri() . '/css/color-default/blue.css', false );
        elseif ( $maniva_meetup_color_default == '#77be32' ) :
            wp_enqueue_style('style-color-limegreen', get_template_directory_uri() . '/css/color-default/limegreen.css', false );
        elseif ( $maniva_meetup_color_default == '#d786fe' ) :
            wp_enqueue_style('style-color-violet', get_template_directory_uri() . '/css/color-default/violet.css', false );
        elseif ( $maniva_meetup_color_default == '#9b59b6' ) :
            wp_enqueue_style('style-color-blueviolet', get_template_directory_uri() . '/css/color-default/blueviolet.css', false );
        elseif ( $maniva_meetup_color_default == '#c0392b' ) :
            wp_enqueue_style('style-color-firebrick', get_template_directory_uri() . '/css/color-default/firebrick.css', false );
        elseif ( $maniva_meetup_color_default == '#4cddf3' ) :
            wp_enqueue_style('style-color-skyblue', get_template_directory_uri() . '/css/color-default/skyblue.css', false );
        elseif ( $maniva_meetup_color_default == '#f2333a' ) :
            wp_enqueue_style('style-color-skyblue', get_template_directory_uri() . '/css/color-default/red.css', false );
        elseif ( $maniva_meetup_color_default == '#3333f2' ) :
            wp_enqueue_style('style-color-skyblue', get_template_directory_uri() . '/css/color-default/darkblue.css', false );
        endif;
    }
    // Demo
    wp_enqueue_style('jquery-mCustomScrollbar', get_template_directory_uri() . '/demo/css/jquery.mCustomScrollbar.min.css', false );
    wp_enqueue_style('tool-box', get_template_directory_uri() . '/demo/css/tool-box.css', false );

    wp_enqueue_style('meetup-update', get_template_directory_uri() . '/css/update.css', false);

}

//Register Front-End Scripts
function maniva_meetup_register_front_end_scripts_ct()
{

    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.min.js', false, false, $in_footer=true);

    wp_enqueue_script('resize', get_template_directory_uri() . '/js/default/resize.js', false, false, $in_footer=true);

    wp_enqueue_script('jpreloader', get_template_directory_uri() . '/js/lib/jpreloader.min.js', false, false, $in_footer=true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :

        wp_enqueue_script( 'comment-reply' );

    endif;

    if ( is_home() || is_archive() || is_category() || is_page() || is_single() || is_author() || is_search() || is_tag() ) :

        wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/lib/owl.carousel.min.js', false, '2.2.0', $in_footer=true);

    endif;

    if ( is_archive() || is_author() || is_category() || is_search() || is_single() || is_tag() || is_page_template('template-blogmasonry.php') ) {

        wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri() . '/js/lib/jquery.prettyPhoto.js', false, false, $in_footer = true);
    }


    if ( is_page_template('template-homepage.php') ):

        wp_enqueue_script('nav', get_template_directory_uri() . '/js/nav.js', false, false, $in_footer=true);

        wp_enqueue_script('one_page', get_template_directory_uri() . '/js/one_page.js', false, false, $in_footer=true);

    endif;

    if (is_page_template('template-blogmasonry.php')):

        global $post;
        $desktop            =  get_post_meta( $post -> ID, 'maniva-meetup'.'_blogMasonry_desktop', true );
        $tabletportrait     =  get_post_meta( $post -> ID, 'maniva-meetup'.'_blogMasonry_tabletportrait', true );
        $mobilelandscape    =  get_post_meta( $post -> ID, 'maniva-meetup'.'_blogMasonry_mobilelandscape', true );
        $mobileportrait     =  get_post_meta( $post -> ID, 'maniva-meetup'.'_blogMasonry_mobile', true );

        wp_enqueue_script('jsisotope', get_template_directory_uri() . '/js/lib/jquery.isotope.min.js', false,false, $in_footer=true);

        wp_enqueue_script('resize', get_template_directory_uri() . '/js/default/resize.js', false,false, $in_footer=true);

        wp_enqueue_script('blogmasonry', get_template_directory_uri() . '/js/blogmasonry.js', false,false, $in_footer=true);

        $variables_blog = array(
            'desktop'         =>    $desktop,
            'tabletportrait'  =>    $tabletportrait,
            'mobilelandscape' =>    $mobilelandscape,
            'mobileportrait'  =>    $mobileportrait,
        );

        wp_localize_script( 'blogmasonry', 'variables_blog', $variables_blog ) ;

    endif;

    if ( class_exists('Woocommerce') ) :

        if ( is_shop() || is_product() ) :

            wp_enqueue_script('lightslider', get_template_directory_uri() . '/js/lib/lightslider.min.js', false,'1.1.6', $in_footer=true);

        endif;

        if ( is_page_template('template-homepage.php') || is_shop() || is_product_category() || is_product_tag() || is_product() ) :

            wp_enqueue_script('shop-woocommerce-js', get_template_directory_uri() . '/js/shop-woocommerce.js', false,false, $in_footer=true);

            $admin_url = admin_url('admin-ajax.php');
            $arg_woo   = array( 'url' => $admin_url );
            wp_localize_script('shop-woocommerce-js', 'woo_var', $arg_woo);

        endif;

    endif;

    wp_enqueue_script('template', get_template_directory_uri() . '/js/template.js', false, false, $in_footer=true );

    // Demo
//    wp_enqueue_script('jquery-mCustomScrollbar', get_template_directory_uri() . '/demo/js/jquery.mCustomScrollbar.concat.min.js', false, false, $in_footer=true );
//    wp_enqueue_script('manivacookie', get_template_directory_uri() . '/demo/js/manivacookie.js', false, false, $in_footer=true );
//    wp_enqueue_script('scrollbar-colorbox', get_template_directory_uri() . '/demo/js/scrollbar-colorbox.js', false, false, $in_footer=true );


}
if ( ! function_exists( 'wp_body_open' ) ) {

    /**
     * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}
?>