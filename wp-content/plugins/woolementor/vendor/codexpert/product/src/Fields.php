<?php
namespace codexpert\product;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Plugin
 * @subpackage Fields
 * @author codexpert <hello@codexpert.io>
 */
abstract class Fields extends Base {

	function hooks() {
		if( did_action( 'cx-plugin_loaded' ) ) return;
		do_action( 'cx-plugin_loaded' );

		$this->action( 'admin_head', 'callback_head', 99 );
	}

	public function enqueue_scripts() {
        wp_enqueue_media();

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );

        wp_register_script( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js' );
        wp_register_style( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css' );

        wp_register_script( 'chosen', 'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js' );
        wp_register_style( 'chosen', 'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css' );

        if( $this->has_select2() ) {
        	wp_enqueue_style( 'select2' );
        	wp_enqueue_script( 'select2' );
        }

        if( $this->has_chosen() ) {
        	wp_enqueue_style( 'chosen' );
        	wp_enqueue_script( 'chosen' );
        }

        wp_enqueue_style( 'codexpert-product-fields', plugins_url( 'assets/css/fields.css', __FILE__ ), [], '' );
        wp_enqueue_script( 'codexpert-product-fields', plugins_url( 'assets/js/fields.js', __FILE__ ), [ 'jquery' ], '', true );
    }

	public function callback_head() {
		?>
		<script>
			jQuery(function($){<?php
				if( is_array( $this->sections ) && count( $this->sections ) > 0 ) {
					foreach ( $this->sections as $section_id => $section ) {
						if( isset( $section['fields'] ) && is_array( $section['fields'] ) && count( $section['fields'] ) > 0 ) {
							foreach ( $section['fields'] as $field ) {
								if( isset( $field['condition'] ) && is_array( $field['condition'] ) ) {
									$key = $field['condition']['key'];
									$value = isset( $field['condition']['value'] ) ? $field['condition']['value'] : 'on';
									$compare = isset( $field['condition']['compare'] ) ? $field['condition']['compare'] : '==';

									if( 'checked' != $compare ) {
										echo "$('#{$section['id']}-{$key}').change(function(e){if( $('#{$section['id']}-{$key}').val() {$compare} '{$value}' ) { $('#cxrow-{$section['id']}-{$field['id']}').slideDown();}else { $('#cxrow-{$section['id']}-{$field['id']}').slideUp();}}).change();";
									}
									else {
										echo "$('#{$section['id']}-{$key}').change(function(e){if( $('#{$section['id']}-{$key}').is(':checked') ) { $('#cxrow-{$section['id']}-{$field['id']}').slideDown();}else { $('#cxrow-{$section['id']}-{$field['id']}').slideUp();}}).change();";
									}
								}
							}
						}
					}
				}
				?>
			})
		</script>
		<?php
	}

	public function callback_fields( $post = null, $metabox = [] ) {

		$config = $this->config;

		$scope = $metabox == [] ? 'option' : 'post';
		
		echo '<div class="wrap">';

		if( $scope == 'option' ) :
		$icon = $this->generate_icon( $config['icon'] );
		echo "<h2 class='cx-heading'>{$icon} {$config['title']}</h2>";
		endif;

		do_action( 'cx-settings-heading', $config );

		if( !isset( $this->sections ) || count( $this->sections ) <= 0 ) return;

		$tab_position = isset( $config['tab_position'] ) ? $config['tab_position'] : 'left';
		echo "<div class='cx-wrapper cx-tab-{$tab_position}'>";

		$sections = $this->sections;

		// nav tabs
		$display = count( $sections ) > 1 ? 'block' : 'none';
		echo '
		<div class="cx-navs-wrapper" style="display: ' . $display . '">
			<ul class="cx-nav-tabs">';
		foreach ( $sections as $section ) {
			$icon = $this->generate_icon( $section['icon'] );
			$color = isset( $section['color'] ) ? $section['color'] : '#23282d';
			echo "<li class='cx-nav-tab' data-color='{$color}'><a href='#{$section['id']}'>{$icon}<span id='cx-nav-label-{$section['id']}' class='cx-nav-label'> {$section['label']}</span></a></li>";
		}
		echo '</ul>
		</div><!--div class="cx-navs-wrapper"-->';

		// form areas
		echo '<div class="cx-sections-wrapper">';
		foreach ( $sections as $section ) {
			$icon = $this->generate_icon( $section['icon'] );
			$color = isset( $section['color'] ) ? $section['color'] : '#23282d';
			$submit_button = isset( $section['submit_button'] ) ? $section['submit_button'] : __( 'Save Settings' );
			$reset_button = isset( $section['reset_button'] ) ? $section['reset_button'] : __( 'Reset Default' );
			$_nonce = wp_create_nonce();

			echo "<div id='{$section['id']}' class='cx-section' style='display:none'>";

			do_action( 'cx-settings-before-title', $section );
			
			echo "<h3 class='cx-subheading'><span style='color: {$color}'>{$icon}</span> {$section['label']}</h3>";
			
			if( isset( $section['desc'] ) && $section['desc'] != '' ) {
				echo "<p class='cx-desc'>{$section['desc']}</p>";
			}

			do_action( 'cx-settings-before-form', $section );

			$fields = apply_filters( 'cx-settings-fields', $section['fields'], $section );
			$show_form = isset( $section['hide_form'] ) && $section['hide_form'] ? false : true;
			$show_form = apply_filters( 'cx-settigns-show-form', $show_form, $section );

			if( $scope == 'option' && $show_form ) :
				
			$page_load = isset( $section['page_load'] ) && $section['page_load'] ? 1 : 0;

			echo "<form id='cx-form-{$section['id']}' class='cx-form'>
					<div id='cx-message-{$section['id']}' class='cx-message'></div>
					<input type='hidden' name='action' value='cx-settings' />
					<input type='hidden' name='option_name' value='{$section['id']}' />
					<input type='hidden' name='page_load' value='{$page_load}' />
			";
			wp_nonce_field();
			endif; // if( $show_form ) :

			do_action( 'cx-settings-before-fields', $section );

			if( isset( $section['template'] ) && $section['template'] != '' ) echo $section['template'];

			if( count( $fields ) > 0 ) :
			foreach ( $fields as $field ) {
				if( isset( $field['type'] ) && $field['type'] == 'divider' ) {
					$style = isset( $field['style'] ) ? $field['style'] : '';
					echo "<div class='cxrow cx-divider' id='cxrow-{$section['id']}-{$field['id']}' style='{$style}'><span>{$field['label']}</span></div>";
				}
				else {
					$field_display = isset( $field['condition'] ) && is_array( $field['condition'] ) ? 'none' : '';
					echo "
					<div class='cxrow' id='cxrow-{$section['id']}-{$field['id']}' style='display: {$field_display}'>
						<div class='cx-label-wrap'>";

						do_action( 'cx-settings-before-label', $field, $section );

						echo "<label for='{$section['id']}-{$field['id']}'>{$field['label']}</label>";

						do_action( 'cx-settings-after-label', $field, $section );

					echo "</div>
						<div class='cx-field-wrap'>";

							do_action( 'cx-settings-before-field', $field, $section );

							if( isset( $field['template'] ) && $field['template'] != '' ) echo $field['template'];

							if( isset( $field['type'] ) && $field['type'] != '' ) echo $this->populate( $field, $section, $scope );

							do_action( 'cx-settings-after-field', $field, $section );

							if( isset( $field['desc'] ) && $field['desc'] != '' ) {
								echo "<p class='cx-desc'>{$field['desc']}</p>";
							}

						do_action( 'cx-settings-after-description', $field, $section );

					echo "</div>
					</div>";
				}
			}
			endif; // if( count( $fields ) > 0 ) :

			do_action( 'cx-settings-after-fields', $section );

			if( $scope == 'option' && $show_form ) :
			$_is_sticky = isset( $section['sticky'] ) && !$section['sticky'] ? '' : ' cx-sticky-controls';
			echo "<div class='cx-controls-wrapper{$_is_sticky}'>";

			if( $reset_button ) echo "<button type='button' class='button cx-reset-button' data-option_name='{$section['id']}' data-_nonce='{$_nonce}'>{$reset_button}</button>&nbsp;";
			if( $submit_button ) echo "<input type='submit' class='button button-primary cx-submit' value='{$submit_button}' />";
			echo '</div class="cx-controls-wrapper">
				</form>';
			endif; // if( $show_form ) :

			do_action( 'cx-settings-after-form', $section );

			echo "</div><!--div id='{$section['id']}'-->";
		}
		echo '</div><!--div class="cx-sections-wrapper"-->
			 <div class="cx-sidebar-wrapper">';

		do_action( 'cx-settings-sidebar', $config );

		echo '</div><!--div class="cx-sidebar-wrapper"-->
			</div><!--div class="cx-wrapper"-->
		</div><!--div class="wrap"-->';

		if( isset( $config['css'] ) && $config['css'] != '' ) {
			echo "<style>{$config['css']}</style>";
		}
	}
	
	public function populate( $field, $section, $scope = 'option' ) {
		if ( in_array( $field['type'], [ 'text', 'number', 'email', 'url', 'password', 'color', 'range', 'date', 'time' ] ) ) {
			$callback_fn = 'field_text';
		}
		else {
			$callback_fn = "field_{$field['type']}";
		}

		return $this->$callback_fn( $field, $section, $scope );
	}

	public function get_value( $field, $section, $default = '', $scope = 'option' ) {
		if( $scope == 'option' ) {
			$section_values = get_option( $section['id'] );
		}
		else {
			global $post;
			$section_values = get_post_meta( $post->ID, $section['id'], true );
		}

		if( isset( $section_values[ $field['id'] ] ) ) {
			return $section_values[ $field['id'] ];
		}
		
		return $default;
	}

	public function field_text( $field, $section, $scope ) {
		$default		= isset( $field['default'] ) ? $field['default'] : '';
		$value			= $this->esc_str( $this->get_value( $field, $section, $default, $scope ) );

		$type 			= $field['type'];
		$name 			= $scope == 'option' ? $field['id'] : "{$section['id']}[{$field['id']}]";
		$label 			= $field['label'];
		$id 			= "{$section['id']}-{$field['id']}";

		$class 			= "cx-field cx-field-{$field['type']}";
		$class 			.= isset( $field['class'] ) ? $field['class'] : '';

		$placeholder	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$required 		= isset( $field['required'] ) && $field['required'] ? " required" : "";
		$readonly 		= isset( $field['readonly'] ) && $field['readonly'] ? " readonly" : "";
		$disabled 		= isset( $field['disabled'] ) && $field['disabled'] ? " disabled" : "";
		$min 			= isset( $field['min'] ) && $field['min'] ? " min='{$field['min']}'" : "";
		$max 			= isset( $field['max'] ) && $field['max'] ? " max='{$field['max']}'" : "";
		$step 			= isset( $field['step'] ) && $field['step'] ? " step='{$field['step']}'" : "";

		if( $type == 'color' ) {
			$class .= ' cx-color-picker';
			$type = 'text';
		}

		$html = "<input type='{$type}' class='{$class}' id='{$id}' name='{$name}' value='{$value}' placeholder='{$placeholder}' {$min} {$max} {$step} {$required} {$readonly} {$disabled}/>";

		return $html;
	}

	public function field_textarea( $field, $section, $scope ) {
		$default		= isset( $field['default'] ) ? $field['default'] : '';
		$value			= $this->esc_str( $this->get_value( $field, $section, $default, $scope ) );

		$name 			= $scope == 'option' ? $field['id'] : "{$section['id']}[{$field['id']}]";
		$label 			= $field['label'];
		$id 			= "{$section['id']}-{$field['id']}";

		$class 			= "cx-field cx-field-{$field['type']}";
		$class 			.= isset( $field['class'] ) ? $field['class'] : '';

		$placeholder	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$required 		= isset( $field['required'] ) && $field['required'] ? " required" : "";
		$readonly 		= isset( $field['readonly'] ) && $field['readonly'] ? " readonly" : "";
		$disabled 		= isset( $field['disabled'] ) && $field['disabled'] ? " disabled" : "";
		$rows 			= isset( $field['rows'] ) ? $field['rows'] : 5;
		$cols 			= isset( $field['cols'] ) ? $field['cols'] : 3;

		$html  = "<textarea class='{$class}' id='{$id}' name='{$name}' cols='{$cols}' rows='{$rows}' placeholder='{$placeholder}' {$required} {$readonly} {$disabled}>{$value}</textarea>";

		return $html;
	}

	public function field_radio( $field, $section, $scope ) {
		$default		= isset( $field['default'] ) ? $field['default'] : '';
		$value			= $this->get_value( $field, $section, $default, $scope );

		$name 			= $scope == 'option' ? $field['id'] : "{$section['id']}[{$field['id']}]";
		$label 			= $field['label'];
		$id 			= "{$section['id']}-{$field['id']}";

		$class 			= "cx-field cx-field-{$field['type']}";
		$class 			.= isset( $field['class'] ) ? $field['class'] : '';

		$placeholder	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$required 		= isset( $field['required'] ) && $field['required'] ? " required" : "";
		$readonly 		= isset( $field['readonly'] ) && $field['readonly'] ? " readonly" : "";
		$disabled 		= isset( $field['disabled'] ) && $field['disabled'] ? " disabled" : "";
		$options 		= isset( $field['options'] ) ? $field['options'] : [];

		$html = '';
		foreach ( $options as $key => $title ) {
			$html .= "<input type='radio' name='{$name}' id='{$id}-{$key}' class='{$class}' value='{$key}' {$required} {$disabled} " . checked( $value, $key, false ) . "/>";
			$html .= "<label for='{$id}-{$key}'>{$title}</label><br />";
		}

		return $html;
	}

	public function field_checkbox( $field, $section, $scope ) {
		$default		= isset( $field['default'] ) ? $field['default'] : '';
		$value			= $this->get_value( $field, $section, $default, $scope );

		$name 			= $scope == 'option' ? $field['id'] : "{$section['id']}[{$field['id']}]";
		$label 			= $field['label'];
		$id 			= "{$section['id']}-{$field['id']}";

		$class 			= "cx-field cx-field-{$field['type']}";
		$class 			.= isset( $field['class'] ) ? $field['class'] : '';

		$placeholder	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$required 		= isset( $field['required'] ) && $field['required'] ? " required" : "";
		$disabled 		= isset( $field['disabled'] ) && $field['disabled'] ? " disabled" : "";
		$multiple 		= isset( $field['multiple'] ) && $field['multiple'];
		$options 		= isset( $field['options'] ) ? $field['options'] : [];

		$html  = '';
		if( $multiple ) {
			foreach ( $options as $key => $title ) {
				$html .= "
				<p>
					<input type='checkbox' name='{$name}[]' id='{$id}-{$key}' class='{$class}' value='{$key}' {$required} {$disabled} " . ( in_array( $key, (array)$value ) ? 'checked' : '' ) . "/>
					<label for='{$id}-{$key}'>{$title}</label>
				</p>";
			}
		}
		else {
			$html .= "<input type='checkbox' name='{$name}' id='{$id}' class='{$class}' value='on' {$required} {$disabled} " . checked( $value, 'on', false ) . "/>";
		}

		return $html;
	}

	public function field_select( $field, $section, $scope ) {
		$default		= isset( $field['default'] ) ? $field['default'] : '';
		$value			= $this->get_value( $field, $section, $default, $scope );

		$name 			= $scope == 'option' ? $field['id'] : "{$section['id']}[{$field['id']}]";
		$label 			= $field['label'];
		$id 			= "{$section['id']}-{$field['id']}";

		$class 			= "cx-field cx-field-{$field['type']}";
		$class 			.= isset( $field['class'] ) ? $field['class'] : '';
		$class 			.= isset( $field['select2'] ) && $field['select2'] ? ' cx-select2' : '';
		$class 			.= isset( $field['chosen'] ) && $field['chosen'] ? ' cx-chosen' : '';

		$placeholder	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$required 		= isset( $field['required'] ) && $field['required'] ? " required" : "";
		$disabled 		= isset( $field['disabled'] ) && $field['disabled'] ? " disabled" : "";
		$multiple 		= isset( $field['multiple'] ) && $field['multiple'] ? 'multiple' : false;
		$options 		= isset( $field['options'] ) ? $field['options'] : [];

		$html  = '';
		if( $multiple ) {
			$html .= "<select name='{$name}[]' id='{$id}' class='{$class}' multiple {$required} {$disabled} data-placeholder='{$placeholder}'>";
			foreach ( $options as $key => $title ) {
				$html .= "<option value='{$key}' " . ( in_array( $key, (array)$value ) ? 'selected' : '' ) . ">{$title}</option>";
			}
			$html .= '</select>';
		}
		else {
			$html .= "<select name='{$name}' id='{$id}' class='{$class}' {$required} {$disabled} data-placeholder='{$placeholder}'>";
			foreach ( $options as $key => $title ) {
				$html .= "<option value='{$key}' " . selected( $value, $key, false ) . ">{$title}</option>";
			}
			$html .= '</select>';
		}

		return $html;
	}

	public function field_file( $field, $section, $scope ) {
		$default		= isset( $field['default'] ) ? $field['default'] : '';
		$value			= $this->esc_str( $this->get_value( $field, $section, $default, $scope ) );

		$type 			= $field['type'];
		$name 			= $scope == 'option' ? $field['id'] : "{$section['id']}[{$field['id']}]";
		$label 			= $field['label'];
		$id 			= "{$section['id']}-{$field['id']}";

		$class 			= "cx-field cx-field-{$field['type']}";
		$class 			.= isset( $field['class'] ) ? $field['class'] : '';

		$placeholder	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$required 		= isset( $field['required'] ) && $field['required'] ? " required" : "";
		$readonly 		= isset( $field['readonly'] ) && $field['readonly'] ? " readonly" : "";
		$disabled 		= isset( $field['disabled'] ) && $field['disabled'] ? " disabled" : "";

		$upload_button	= isset( $field['upload_button'] ) ? $field['upload_button'] : __( 'Choose File' );
		$select_button	= isset( $field['select_button'] ) ? $field['select_button'] : __( 'Select' );

		$html  = '';
		$html .= "<input type='text' class='{$class} cx-file' id='{$id}' name='{$name}' value='{$value}' placeholder='{$placeholder}' {$readonly} {$required} {$disabled}/>";
		$html  .= "<input type='button' class='button cx-browse' data-title='{$label}' data-select-text='{$select_button}' value='{$upload_button}' {$required} {$disabled} />";

		return $html;
	}

	public function field_wysiwyg( $field, $section, $scope ) {
		$default		= isset( $field['default'] ) ? $field['default'] : '';
		$value			= stripslashes( $this->get_value( $field, $section, $default, $scope ) );

		$name 			= $scope == 'option' ? $field['id'] : "{$section['id']}[{$field['id']}]";
		$label 			= $field['label'];
		$id 			= "{$section['id']}-{$field['id']}";

		$class 			= "cx-field cx-field-{$field['type']}";
		$class 			.= isset( $field['class'] ) ? $field['class'] : '';

		$placeholder	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$readonly 		= isset( $field['readonly'] ) && $field['readonly'] ? " readonly" : "";
		$disabled 		= isset( $field['disabled'] ) && $field['disabled'] ? " disabled" : "";
		$teeny			= isset( $field['teeny'] ) && $field['teeny'];
		$text_mode		= isset( $field['text_mode'] ) && $field['text_mode'];
		$media_buttons  = isset( $field['media_buttons'] ) && $field['media_buttons'];
		$rows 			= isset( $field['rows'] ) ? $field['rows'] : 10;

		$html  = '';
		$settings = [
			'teeny'         => $teeny,
			'textarea_name' => $name,
			'textarea_rows' => $rows,
			'quicktags'		=> $text_mode,
			'media_buttons'	=> $media_buttons,
		];

		if ( isset( $field['options'] ) && is_array( $field['options'] ) ) {
			$settings = array_merge( $settings, $field['options'] );
		}

		ob_start();
		wp_editor( $value, $id, $settings );
		$html .= ob_get_contents();
		ob_end_clean();

		return $html;
	}

	public function field_divider( $field, $section, $scope ) {
		return $field['label'];
	}

	public function field_group( $field, $section, $scope ) {
		$items = $field['items'];
		$html = '';
		foreach ( $items as $item ) {
			$item['class'] = ' cx-field-group';
			$html .= $this->populate( $item, $section, $scope );
		}

		return $html;
	}

	public function generate_icon( $value ) {
		if( $value == '' ) return '';
		if( strpos( $value, '://' ) !== false ) {
			return "<img class='cx-icon-{$this->config['id']}' src='{$value}' />";
		}
		return "<span class='dashicons {$value}'></span>";
	}

	public function esc_str( $string ) {
		return stripslashes( esc_attr( $string ) );
	}

	public function deep_key_exists( $arr, $key ) {
		if ( array_key_exists( $key, $arr ) && $arr[ $key ] == true ) return true;
		foreach( $arr as $element ) {
			if( is_array( $element ) && $this->deep_key_exists( $element, $key ) ) {
				return true;
			}
		}
		return false;
	}

	public function has_select2() {
		return $this->deep_key_exists( $this->config, 'select2' );
	}

	public function has_chosen() {
		return $this->deep_key_exists( $this->config, 'chosen' );
	}
}