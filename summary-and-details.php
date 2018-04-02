<?php
/**
 * Plugin Name: Summary & Details
 * Plugin URI: https://github.com/bight/summary-and-details/
 * Description: A Gutenberg block plugin which adds <details> with an optional <summary>.
 * Author: greatislander
 * Author URI: https://bight.ca/
 * Version: 1.0.0
 * License: GPL v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package Summary_and_Details
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initialize blocks.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';