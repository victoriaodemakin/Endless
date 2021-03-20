<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<div class="tribe-events-loop">
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<!-- Month / Year Headers -->
<!--			--><?php //tribe_events_list_the_date_headers(); ?>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

				<?php do_action( 'tribe_events_inside_before_loop' ); ?>

				<!-- Event  -->
				<?php
				$post_parent = '';
				if ( $post->post_parent ) {
					$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
				}
				?>
				<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>" <?php echo absint($post_parent); ?>>
					<?php tribe_get_template_part( 'list/single', 'event' ) ?>
				</div>

				<?php do_action( 'tribe_events_inside_after_loop' ); ?>

			</div>

		<?php endwhile; ?>

	</div>
</div><!-- .tribe-events-loop -->
