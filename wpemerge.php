<?php
/**
 * Plugin Name: WP Emerge Starter Plugin
 * Plugin URI: https://wpemerge.com/
 * Description:
 * Version: 0.15.0
 * Requires at least: 4.7
 * Requires PHP: 5.5.9
 * Author: Atanas Angelov
 * Author URI: https://atanas.dev/
 * License: GPL-2.0-only
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: myapp
 * Domain Path: /languages
 *
 * @package MyApp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MYAPP_PLUGIN_FILE', __FILE__ );

// Load composer dependencies.
if ( file_exists( __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' ) ) {
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
}

// Load helpers.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'MyApp.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'helpers.php';

// Bootstrap plugin after all dependencies and helpers are loaded.
\MyApp::make()->bootstrap( require __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config.php' );

// Register hooks.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'hooks.php';
