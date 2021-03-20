<?php

do_action('themeple_action_before_initialization');

get_template_part('extension/system/megamenu/config.inc');

get_template_part('extension/system/megamenu/themeple_controller');
$themeple_base_data = '';
$themeple_base_data = apply_filters( 'themeple_filter_base_data', $themeple_base_data );

$controller = new maniva_meetup_controller();
$controller->maniva_meetup_controller_frontend( $themeple_base_data );

?>