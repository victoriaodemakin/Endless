<section class="tz-sectionBreadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="tz_breadcrumb_single_cat_title">
                    <h4>
                        <?php

                        if( class_exists('WooCommerce') && is_woocommerce()){
                            if(is_product()){
                                the_title();
                            }else{
                                woocommerce_page_title();
                            }
                        }elseif( class_exists('Tribe__Events__Main') && is_tribe_calendar()){
                            echo tribe_get_events_title();
                        }else {
                            if (is_category() || is_tax('portfolio-category')) {
                                single_cat_title();
                            }elseif (is_author()) {
                                the_author();
                            }elseif (is_search()) {
                                echo get_search_query();
                            }elseif (is_tag() || is_tax('portfolio-tags') || is_tax('album')) {
                                echo single_tag_title();
                            }elseif (is_home()) {
                                single_post_title();
                            }elseif (is_404()) {
                                echo esc_html__('Error 404 - Page Not Found', 'maniva-meetup');
                            }elseif (is_archive()) {
                                if (is_day()) :
                                    printf(esc_html__('Archives %s', 'maniva-meetup'), '<span>' . get_the_date() . '</span>');
                                elseif (is_month()) :
                                    printf(esc_html__('Archives %s', 'maniva-meetup'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'maniva-meetup') . '</span>'));
                                elseif (is_year()) :
                                    printf(esc_html__('Archives %s', 'maniva-meetup'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'maniva-meetup') . '</span>'));
                                else :
                                    esc_html_e('Archives', 'maniva-meetup');
                                endif;
                            }else {
                                single_post_title();
                            }
                        }
                        ?>
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