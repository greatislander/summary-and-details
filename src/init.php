<?php
/**
 * Initialize Blocks
 *
 * @since 	1.0.0
 * @package Summary_and_Details
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function summary_and_details_block_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'bight/summary-and-details-block-js',
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		[ 'wp-blocks', 'wp-i18n', 'wp-editor' ],
		SUMMARY_AND_DETAILS_VERSION
	);

	// Styles.
	wp_enqueue_style(
		'bight/summary-and-details-block-editor-js',
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
		[ 'wp-edit-blocks' ],
		SUMMARY_AND_DETAILS_VERSION
	);
}

add_action( 'enqueue_block_editor_assets', 'summary_and_details_block_editor_assets' );
