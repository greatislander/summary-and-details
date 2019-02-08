<?php
/**
 * Plugin Name: Summary & Details
 * Plugin URI: https://github.com/bight/summary-and-details/
 * Description: A Gutenberg block plugin which adds <details> with an optional <summary>.
 * Author: greatislander
 * Author URI: https://bight.ca/
 * Version: 1.1.0
 * License: GPL v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Summary_and_Details
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin version, for cache busting assets.
 */
define( 'SUMMARY_AND_DETAILS_VERSION', '1.1.0' );

/**
 * Initialize blocks.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
