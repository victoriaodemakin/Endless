<?php
if ( $maniva_meetup_on_off_Breadcrumb == 'on' ) :
    get_template_part('template_inc/inc','breadcrumb');
endif;
?>

<section class="tzPage404">
    <div class="container">
        <div class="tz404-content">
            <div class="tz404_title">404</div>
            <div class="tz404_description"><?php
                $maniva_meetup_text_404 = ot_get_option('maniva-meetup' . '_404_page_content');
                echo wp_kses_allowed_html($maniva_meetup_text_404);
                ?></div>
            <div class="tz404_button">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e('Go to the Home Page', 'maniva-meetup'); ?>"><?php esc_html_e('Go Back To Site', 'maniva-meetup'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

