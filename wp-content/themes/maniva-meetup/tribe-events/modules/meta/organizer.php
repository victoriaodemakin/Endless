<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-organizer">
	<h3 class="tribe-events-single-section-title"><?php echo tribe_get_organizer_label( ! $multiple ); ?></h3>

		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?>
			<div class="tz_single_feature_event_meta_group">
				<span style="display:none;"><?php // This element is just to make sure we have a valid HTML ?></span>
				<span class="tribe-organizer">
					<?php echo tribe_get_organizer_link( $organizer ) ?>
				</span>
			</div>


			<?php
		}

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?>

				<div class="tz_single_feature_event_meta_group">
					<span class="pull-left"> <?php esc_html_e( 'Phone:', 'maniva-meetup' ) ?> </span>
					<span class="tribe-organizer-tel pull-right"> <?php echo esc_html( $phone ); ?> </span>
				</div>

				<?php
			}//end if

			if ( ! empty( $email ) ) {
				?>

				<div class="tz_single_feature_event_meta_group">
					<span class="pull-left"> <?php esc_html_e( 'Email:', 'maniva-meetup' ) ?> </span>
					<span class="tribe-organizer-email pull-right"> <?php echo esc_html( $email ); ?> </span>
				</div>

				<?php
			}//end if

			if ( ! empty( $website ) ) {
				?>

				<div class="tz_single_feature_event_meta_group">
					<span class="pull-left"> <?php esc_html_e( 'Website:', 'maniva-meetup' ) ?> </span>
					<span class="tribe-organizer-url pull-right"> <?php echo wp_kses_allowed_html( $website ); ?> </span>
				</div>

				<?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>

</div>
