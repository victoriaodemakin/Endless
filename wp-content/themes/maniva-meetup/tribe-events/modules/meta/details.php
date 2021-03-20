<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */


$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', __( 'Time:', 'maniva-meetup' ), $event_id );

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-details">
	<h3 class="tribe-events-single-section-title"> <?php esc_html_e( 'Details', 'maniva-meetup' ) ?> </h3>


		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"> <?php esc_html_e( 'Start:', 'maniva-meetup' ) ?> </span>
				<span class="pull-right"> <?php echo esc_attr( $start_date ) ?> </span>
			</div>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"> <?php esc_html_e( 'End:', 'maniva-meetup' ) ?> </span>
				<span class="pull-right"> <?php echo esc_attr( $end_date ) ?> </span>
			</div>

		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"> <?php esc_html_e( 'Date:', 'maniva-meetup' ) ?> </span>
				<span class="pull-right"> <?php echo esc_attr( $start_date ) ?> </span>
			</div>

		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"><?php esc_html_e( 'Start:', 'maniva-meetup' ) ?></span>
				<span class="pull-right"><?php echo esc_attr( $start_datetime ) ?></span>
			</div>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"> <?php esc_html_e( 'End:', 'maniva-meetup' ) ?> </span>
				<span class="pull-right"> <?php echo esc_attr( $end_datetime ) ?> </span>
			</div>

		<?php
		// Single day events
		else :
			?>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"><?php esc_html_e( 'Date:', 'maniva-meetup' ) ?></span>
				<span class="pull-right"><?php echo esc_attr( $start_date ) ?></span>
			</div>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"><?php echo esc_attr( $time_title ) ?></span>
				<span class="pull-right"><?php echo esc_attr( $time_formatted ); ?></span>
			</div>

		<?php endif ?>

		<?php
		// Event Cost
		if ( ! empty( $cost ) ) : ?>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"> <?php esc_html_e( 'Cost:', 'maniva-meetup' ) ?> </span>
				<span class="tribe-events-event-cost pull-right"> <?php echo esc_attr( $cost ); ?> </span>
			</div>

		<?php endif ?>

		<div class="tz_single_feature_event_meta_group">
			<?php
			echo tribe_get_event_categories(
				get_the_id(), array(
					'before'       => '',
					'sep'          => ', ',
					'after'        => '',
					'label'        => null, // An appropriate plural/singular label will be provided
					'label_before' => '<span class="pull-left">',
					'label_after'  => '</span>',
					'wrap_before'  => '<span class="tribe-events-event-categories pull-right">',
					'wrap_after'   => '</span>',
				)
			);
			?>
		</div>


	<?php echo get_the_term_list( get_the_ID(), 'post_tag', '<div class="tz_single_feature_event_meta_group"><span class="pull-left"> ' . esc_html__( 'Event Tags:', 'maniva-meetup' ) . '</span><span class="pull-right">', ', ', '</span></div>' ); ?>

		<?php
		// Event Website
		if ( ! empty( $website ) ) : ?>

			<div class="tz_single_feature_event_meta_group">
				<span class="pull-left"> <?php esc_html_e( 'Website:', 'maniva-meetup' ) ?> </span>
				<span class="tribe-events-event-url pull-right"><?php echo wp_kses_allowed_html( $website ); ?></span>
			</div>

		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>

</div>
