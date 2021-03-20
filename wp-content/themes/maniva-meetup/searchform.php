<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
    <form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="icon-search tziconsearch">&nbsp;</label>
        <label class="assistive-text assistive-tzsearch tzsearchlabel"><?php esc_html_e( 'Search', 'maniva-meetup' ); ?></label>
        <input type="text" class="field Tzsearchform inputbox search-query Tzsearchform" name="s" placeholder="<?php esc_html_e( 'Search...', 'maniva-meetup' ); ?>" />
        <input type="submit" class="submit searchsubmit Tzsearchsubmit" name="submit" value="<?php esc_html_e( 'Search', 'maniva-meetup' ); ?>" />
        <i class="fa fa-search tz-icon-form-search"></i>
        <i class="fa fa-times tz-form-close"></i>
    </form>
