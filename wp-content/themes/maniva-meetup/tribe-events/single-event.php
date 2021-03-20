<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

$tz_maniva_meetup_schedule = get_post_meta( $event_id, 'maniva-meetup-schedule-event', true );

if( $tz_maniva_meetup_schedule != ''  ) :

	$tz_maniva_meetup_schedule = explode( "\n", $tz_maniva_meetup_schedule );

endif;

maniva_meetup_tribe_breadcrumbs();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'maniva-meetup' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'maniva-meetup' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-header -->

	<?php

    while ( have_posts() ) :  the_post();

        $start_month        =   tribe_get_start_date( null, false, 'M' );
        $start_day          =   tribe_get_start_date( null, false, 'd' );
        $start_year         =   tribe_get_start_date( null, false, 'Y' );

    ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

					<!-- Event featured image, but exclude link -->
					<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

					<div class="tz_single_feature_box">
						<div class="tz_slide_events_time">

							<span class="tz_slide_events_time_month">
								<?php echo esc_attr( $start_month ); ?>
							</span>

							<span class="tz_slide_events_time_day">
								<?php echo esc_attr( $start_day ); ?>
							</span>

							<span class="tz_slide_events_time_year">
								<?php echo esc_attr( $start_year ); ?>
							</span>

						</div>
						<div class="tz_single_feature_content">
							<h3>
								<?php the_title(); ?>
							</h3>
							<span class="tz_single_feature_time_add">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<?php echo tribe_get_full_address(); ?>
							</span>
							<div class="tribe-events-schedule">
								<?php echo tribe_events_event_schedule_details( $event_id, '<h2><i class="fa fa-calendar" aria-hidden="true"></i>', '</h2>' ); ?>
								<?php if ( tribe_get_cost() ) : ?>
									<span class="tribe-events-cost">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<?php echo tribe_get_cost( null, true ) ?>
									</span>
								<?php endif; ?>
							</div>

							<!-- Event content -->
							<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
							<div class="tribe-events-single-event-description tribe-events-content">
								<?php the_content(); ?>
							</div>
							<!-- .tribe-events-single-event-description -->
							<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<!-- Event meta -->
					<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
					<?php tribe_get_template_part( 'modules/meta' ); ?>

					<?php if ( $tz_maniva_meetup_schedule != '' ) :  ?>

						<div class="tz_single_feature_event_meta tz_single_feature_event_meta_list">
							<h3><?php esc_html_e( 'Schedule','maniva-meetup' ) ?></h3>

							<ul>

								<?php

								foreach ( $tz_maniva_meetup_schedule as $item ) :

									if ( $item ) :

										?>

										<li class="item">
											<i class="fa fa-circle" aria-hidden="true"></i>
											<span>
												<?php echo esc_attr( $item ); ?>
											</span>
										</li>

										<?php

									endif;

								endforeach;

								?>

							</ul>
						</div>

					<?php endif; ?>

					<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
				</div>
			</div>

		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'maniva-meetup' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
