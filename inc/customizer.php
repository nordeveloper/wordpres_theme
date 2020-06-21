<?php
/**
 * basetheme Theme Customizer
 *
 * @package basetheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function basetheme_customize_register( $wp_customize ) {

}
add_action( 'customize_register', 'basetheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/

function basetheme_customize_preview_js() {
	wp_enqueue_script( 'basetheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20181215', true );
}
add_action( 'customize_preview_init', 'basetheme_customize_preview_js' );
