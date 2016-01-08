<?php
/**
 * Soliloquy Whitelabel
 *
 * Based on code from the Soliloquy Docs section
 *
 * @package           Soliloquy_Whitelabel
 * @author            Jared Williams
 * @license           GPL-2.0+
 * @link              http://www.mediacrazed.com
 * @copyright         2016 MediaCrazed
 *
 * Plugin Name:       Soliloquy Whitelabel
 * Plugin URI:        https://github.com/Jared-Williams/envira-gallery-whitelabel
 * Description:       Basically just white labels the plugin to a general Gallery.
 * Version:           0.1.2
 * Author:            Jared Williams
 * Author URI:        http://www.mediacrazed.com
 * Text Domain:       envira-gallery-whitelabel
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Jared-Williams/envira-gallery-whitelabel
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

add_filter( 'gettext', 'tgm_soliloquy_whitelabel', 10, 3 );
function tgm_soliloquy_whitelabel( $translated_text, $source_text, $domain ) {
    
    // If not in the admin, return the default string.
    if ( ! is_admin() ) {
        return $translated_text;
    }
 
    if ( strpos( $source_text, 'Soliloquy Slider' ) !== false ) {
        return str_replace( 'Soliloquy Slider', 'Slider', $translated_text );
    }
 
    if ( strpos( $source_text, 'Soliloquy Sliders' ) !== false ) {
        return str_replace( 'Soliloquy Sliders', 'Sliders', $translated_text );
    }
 
    if ( strpos( $source_text, 'Soliloquy slider' ) !== false ) {
        return str_replace( 'Soliloquy slider', 'slider', $translated_text );
    }
 
    if ( strpos( $source_text, 'Soliloquy' ) !== false ) {
        return str_replace( 'Soliloquy', 'Slider', $translated_text );
    }
    
    return $translated_text;
    
}

/**
 * Adds the necessary CSS to the admin head to replace the Soliloquy menu icon with a dashicon.
 */
function soliloquy_whitelabel_css() {
  ?>

  <style>
    .menu-top.menu-icon-soliloquy img { display: none; }
    .menu-top.menu-icon-soliloquy > .dashicons-before:before { content: "\f233"; }
  </style>

  <?php
}
add_action( 'admin_head', 'soliloquy_whitelabel_css' );
