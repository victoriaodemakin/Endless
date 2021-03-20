<?php

$maniva_meetup_event_on_breadcrumb_shop = ent2ncr(ot_get_option('maniva-meetup' . '_event_on_breadcrumb_shop'));

?>

<section class="tz-sectionBreadcrumb-shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="tz_breadcrumb_woocommerce_title">
                    <h4>
                        <?php woocommerce_page_title();?>
                    </h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tz_breadcrumb_woocommerce_title_event">
                    <?php
                        wp_kses_allowed_html( $maniva_meetup_event_on_breadcrumb_shop );
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="tz_breadcrumb_shop">
                    <h4>
                        <?php if(function_exists('bcn_display')):  bcn_display(); endif; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div><!--end class container-->
</section><!--end class tzbreadcrumb-->