<?php
/**
 * Plugin Name:  Crocoblock Timber Library
 * Plugin URI:   https://crocoblock.com/
 * Description:  Importing Timber 2.X library to use with Crocoblock plugins or anywhere you need it.
 * Version:      2.0.0
 * Author:       Crocoblock
 * Author URI:   https://crocoblock.com/
 * Requires PHP: 8.1
 * License:      GPL-3.0+
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:  /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'plugins_loaded', function() {

	if ( version_compare( PHP_VERSION, '8.1', '<' ) ) {
		add_action( 'admin_notices', function() {
			printf( '<div class="notice notice-error"><p><b>Crocoblock Timber Library PHP version mismatch.</b><br/> This plugin requires PHP version 8.1 or higher. You are running %s.<br/> Please check your hosting settings and upgrade your PHP version.</p></div>', PHP_VERSION );
		} );

		return;
	}

	require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';
	\Timber\Timber::init();
} );
