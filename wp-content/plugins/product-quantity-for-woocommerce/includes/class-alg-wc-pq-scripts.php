<?php
/**
 * Product Quantity for WooCommerce - Scripts Class
 *
 * @version 1.7.3
 * @since   1.7.0
 * @author  WPWhale
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_PQ_Scripts' ) ) :

class Alg_WC_PQ_Scripts {

	/**
	 * Constructor.
	 *
	 * @version 1.7.0
	 * @since   1.7.0
	 */
	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * enqueue_scripts.
	 *
	 * @version 1.7.3
	 * @since   1.0.0
	 * @todo    [dev] (maybe) Price by qty: add `prepend` and `append` positions
	 * @todo    [dev] (important) (maybe) `force_js_check_min_max()` should go *before* the `force_js_check_step()`?
	 * @todo    [feature] `'force_on_add_to_cart' => ( 'yes' === get_option( 'alg_wc_pq_variation_force_on_add_to_cart', 'no' ) )`
	 * @todo    [feature] (maybe) `force_on_add_to_cart` for simple products
	 * @todo    [feature] (maybe) make this optional (for min/max quantities)
	 */
	function enqueue_scripts() {
		// Variable products
		if ( ( $do_load_all_variations = ( 'yes' === get_option( 'alg_wc_pq_variation_do_load_all', 'no' ) ) ) || ( ( $_product = wc_get_product( get_the_ID() ) ) && $_product->is_type( 'variable' ) ) ) {
			$quantities_options = array(
				'reset_to_min'           => ( 'reset_to_min' === get_option( 'alg_wc_pq_variation_change', 'do_nothing' ) ),
				'reset_to_max'           => ( 'reset_to_max' === get_option( 'alg_wc_pq_variation_change', 'do_nothing' ) ),
				'reset_to_default'       => ( 'reset_to_default' === get_option( 'alg_wc_pq_variation_change', 'do_nothing' ) ),
				'do_load_all_variations' => $do_load_all_variations,
				'max_value_fallback' => $max_value_fallback = get_option( 'alg_wc_pq_qty_dropdown_max_value_fallback', 100 ),
			);
			$product_quantities = array();
			if ( $do_load_all_variations ) {
				foreach ( wc_get_products( array( 'return' => 'ids', 'limit' => -1, 'type' => 'variable' ) ) as $product_id ) {
					if ( $_product = wc_get_product( $product_id ) ) {
						foreach ( $_product->get_available_variations() as $variation ) {
							$variation_id = $variation['variation_id'];
							
							$min_qty = alg_wc_pq()->core->get_product_qty_min_max(  $product_id, $variation['min_qty'], 'min', $variation_id );
							$max_qty = alg_wc_pq()->core->get_product_qty_min_max(  $product_id, $variation['max_qty'], 'max', $variation_id );
							$step   = alg_wc_pq()->core->get_product_qty_step( $product_id, 1, $variation['variation_id'] );
							$label  = alg_wc_pq()->core->get_dropdown_option_label( $variation['variation_id'] );
							$default  = alg_wc_pq()->core->get_product_qty_default( $variation['variation_id'], 1 );
							$exact_qty  = alg_wc_pq()->core->get_product_exact_qty( $product_id, 'allowed', '', $variation_id );
								
							$product_quantities[ $variation['variation_id'] ] = array(
								'min_qty' => $min_qty,
								'max_qty' => $max_qty,
								'step'    => $step,
								'label'   => $label,
								'default'   => $default,
								'exact_qty'   => $exact_qty,
								'vprice_by_qty'   => $this->alg_wc_pq_prices_by_variation($variation_id, $min_qty, $max_qty, $step, $exact_qty),
							);
						}
					}
				}
			} else {
				foreach ( $_product->get_available_variations() as $variation ) {
					$variation_id = $variation['variation_id'];
					$product_id = $_product->get_id();
					
					$min_qty = alg_wc_pq()->core->get_product_qty_min_max(  $product_id, $variation['min_qty'], 'min', $variation_id );
					$max_qty = alg_wc_pq()->core->get_product_qty_min_max(  $product_id, $variation['max_qty'], 'max', $variation_id );
					$step   = alg_wc_pq()->core->get_product_qty_step( $product_id, 1, $variation['variation_id'] );
					$label  = alg_wc_pq()->core->get_dropdown_option_label( $variation['variation_id'] );
					$default  = alg_wc_pq()->core->get_product_qty_default( $variation['variation_id'], 1 );
					$exact_qty  = alg_wc_pq()->core->get_product_exact_qty( $product_id, 'allowed', '', $variation_id );
							
					$product_quantities[ $variation['variation_id'] ] = array(
						/*'min_qty' => $variation['min_qty'],
						'max_qty' => $variation['max_qty'],*/
						'min_qty' => $min_qty,
						'max_qty' => $max_qty,
						'step'    => $step,
						'label'   => $label,
						'default'   => $default,
						'exact_qty'   => $exact_qty,
						'vprice_by_qty'   => $this->alg_wc_pq_prices_by_variation($variation_id, $min_qty, $max_qty, $step, $exact_qty),
					);
				}
			}
			wp_enqueue_script(  'alg-wc-pq-variable',
				trailingslashit( alg_wc_pq()->plugin_url() ) . 'includes/js/alg-wc-pq-variable.js', array( 'jquery' ), alg_wc_pq()->version, true );
			wp_localize_script( 'alg-wc-pq-variable', 'product_quantities', $product_quantities );
			wp_localize_script( 'alg-wc-pq-variable', 'quantities_options', $quantities_options );
		}
		// Price by qty
		if ( 'yes' === get_option( 'alg_wc_pq_qty_price_by_qty_enabled', 'no' ) ) {
			if( ( $_product = wc_get_product( get_the_ID() ) ) && $_product->is_type( 'simple' ) && is_product() ){
				if(alg_wc_pq()->core->alg_wc_pq_price_by_qty_is_disable($_product)){
					return;
				}
				if($_product->is_purchasable()){
					wp_enqueue_script(  'alg-wc-pq-price-by-qty',
						trailingslashit( alg_wc_pq()->plugin_url() ) . 'includes/js/alg-wc-pq-price-by-qty.js', array( 'jquery' ), alg_wc_pq()->version, true );
					wp_localize_script( 'alg-wc-pq-price-by-qty',
					'alg_wc_pq_update_price_by_qty_object', array(
						'ajax_url'   => admin_url( 'admin-ajax.php' ),
						'product_id' => get_the_ID(),
						'position'   => get_option( 'alg_wc_pq_qty_price_by_qty_position', 'instead' ),
					) );
				}
			} else {
				if( (is_shop() || is_product_tag() || is_product_category() ) ) {
					if( 'yes' === get_option( 'alg_wc_pq_qty_price_by_qty_qty_archive_enabled', 'no' ) && 'yes' === get_option( 'alg_wc_pq_add_quantity_archive_enabled', 'no' ) ){
							wp_enqueue_script(  'alg-wc-pq-price-by-qty',
								trailingslashit( alg_wc_pq()->plugin_url() ) . 'includes/js/alg-wc-pq-price-by-qty.js', array( 'jquery' ), alg_wc_pq()->version, true );
							wp_localize_script( 'alg-wc-pq-price-by-qty',
								'alg_wc_pq_update_price_by_qty_object', array(
									'ajax_url'   => admin_url( 'admin-ajax.php' ),
									'product_id' => 0,
									'position'   => get_option( 'alg_wc_pq_qty_price_by_qty_position', 'instead' ),
							) );
					}
				}
			}
		}
		// variable Price by qty
		if ( 'yes' === get_option( 'alg_wc_pq_qty_price_by_qty_enabled', 'no' ) && 'yes' === get_option( 'alg_wc_pq_qty_price_by_qty_enabled_variable', 'no' ) && ( $_product = wc_get_product( get_the_ID() ) ) && $_product->is_type( 'variable' ) && is_product() ) {
			wp_enqueue_script(  'alg-wc-pq-price-by-qty',
				trailingslashit( alg_wc_pq()->plugin_url() ) . 'includes/js/alg-wc-pq-price-by-qty.js', array( 'jquery' ), alg_wc_pq()->version, true );
			wp_localize_script( 'alg-wc-pq-price-by-qty',
				'alg_wc_pq_update_price_by_qty_object', array(
					'ajax_url'   => admin_url( 'admin-ajax.php' ),
					'product_id' => get_the_ID(),
					'position'   => get_option( 'alg_wc_pq_qty_price_by_qty_position', 'instead' ),
				) );
		}
		// Force JS step check
		if ( 'yes' === get_option( 'alg_wc_pq_step_section_enabled', 'no' ) ) {
			$force_check_step_periodically = ( 'yes' === get_option( 'alg_wc_pq_force_js_check_step_periodically', 'no' ) );
			$force_check_step_on_change    = ( 'yes' === get_option( 'alg_wc_pq_force_js_check_step', 'no' ) );
			if ( $force_check_step_periodically || $force_check_step_on_change ) {
				wp_enqueue_script(  'alg-wc-pq-force-step-check',
					trailingslashit( alg_wc_pq()->plugin_url() ) . 'includes/js/alg-wc-pq-force-step-check.js', array( 'jquery' ), alg_wc_pq()->version, true );
				wp_localize_script( 'alg-wc-pq-force-step-check', 'force_step_check_options', array(
					'force_check_step_periodically'    => $force_check_step_periodically,
					'force_check_step_on_change'       => $force_check_step_on_change,
					'force_check_step_periodically_ms' => get_option( 'alg_wc_pq_force_js_check_period_ms', 1000 ),
				) );
			}
		}
		// Force JS min/max check
		if ( 'yes' === get_option( 'alg_wc_pq_max_section_enabled', 'no' ) || 'yes' === get_option( 'alg_wc_pq_min_section_enabled', 'no' ) ) {
			$force_check_min_max_periodically = ( 'yes' === get_option( 'alg_wc_pq_force_js_check_min_max_periodically', 'no' ) );
			$force_check_min_max_on_change    = ( 'yes' === get_option( 'alg_wc_pq_force_js_check_min_max', 'no' ) );
			if ( $force_check_min_max_periodically || $force_check_min_max_on_change ) {
				wp_enqueue_script(  'alg-wc-pq-force-min-max-check',
					trailingslashit( alg_wc_pq()->plugin_url() ) . 'includes/js/alg-wc-pq-force-min-max-check.js', array( 'jquery' ), alg_wc_pq()->version, true );
				wp_localize_script( 'alg-wc-pq-force-min-max-check', 'force_min_max_check_options', array(
					'force_check_min_max_periodically'    => $force_check_min_max_periodically,
					'force_check_min_max_on_change'       => $force_check_min_max_on_change,
					'force_check_min_max_periodically_ms' => get_option( 'alg_wc_pq_force_js_check_period_ms', 1000 ),
				) );
			}
		}
		// Qty rounding
		if ( 'no' != ( $round_with_js_func = get_option( 'alg_wc_pq_round_with_js', 'no' ) ) ) {
			wp_enqueue_script(  'alg-wc-pq-force-rounding',
				trailingslashit( alg_wc_pq()->plugin_url() ) . 'includes/js/alg-wc-pq-force-rounding.js', array( 'jquery' ), alg_wc_pq()->version, true );
			wp_localize_script( 'alg-wc-pq-force-rounding', 'force_rounding_options', array(
				'round_with_js_func' => $round_with_js_func,
			) );
		}
	}
	
	/**
	 * alg_wc_pq_prices_by_variation.
	 *
	 * @version 1.6.1
	 * @since   1.6.1
	 */
	function alg_wc_pq_prices_by_variation($variation_id, $min, $max, $step, $exact_qty){
		$product = new WC_Product_Variation($variation_id);

		$perunit_price = $product->get_price();
		$return_prices = array();
		if(empty($exact_qty)){
			foreach (range($min, $max, $step) as $i) {
				// $i = round($i, 3, PHP_ROUND_HALF_UP);
				$price = round($perunit_price * $i, 2);
				$display_price = wc_price( $price );
				$return_prices[(string) $i] = $display_price;
			}
		} else if(strpos($exact_qty, ',') === false) {
			$value = $exact_qty;
			$price = round($perunit_price * $value, 2);
			$display_price = wc_price( $price );
			$return_prices[(string) $value] = $display_price;
		} else {
			$fixed_qty = alg_wc_pq()->core->process_exact_qty_option( $exact_qty );
			$values = $fixed_qty;
			foreach ( $values as $value ) {
				$price = round($perunit_price * $value, 2);
				$display_price = wc_price( $price );
				$return_prices[(string) $value] = $display_price;
			}
		}
		return $return_prices;
	}

}

endif;

return new Alg_WC_PQ_Scripts();
