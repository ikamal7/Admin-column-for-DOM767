<?php
/*
Plugin Name:    Admin Columns - Dom767
Plugin URI:     dom767.com
Description:    DESCRIPTION
Version:        1.0
Author:         DOM767
Author URI:     dom767.com
License:        GPLv2 or later
License URI:    http://www.gnu.org/licenses/gpl-2.0.html
*/

define( 'DOM_AC_FILE', __FILE__ );
define( 'DOM_AC_PATH', __DIR__ );
define( 'DOM_AC_URL', plugins_url( '', DOM_AC_FILE ) );
define( 'DOM_AC_JS', DOM_AC_URL . '/js' );
define( 'DOM_AC_CSS', DOM_AC_URL . '/css' );

// 1. Set text domain
/* @link https://codex.wordpress.org/Function_Reference/load_plugin_textdomain */
load_plugin_textdomain( 'ac-DOM_COLUMN', false, plugin_dir_path( __FILE__ ) . '/languages/' );

add_action( 'ac/ready', function () {
	// We use our autoloader to automatically load all the necessary classes based on the namespace below
	\AC\Autoloader::instance()->register_prefix( 'DOM_COLUMN', __DIR__ . '/classes/' );

	add_action( 'ac/column_types', function ( \AC\ListScreen $list_screen ) {

		// Make your custom column available to a specific WordPress list table:

		// Example #1 - for the custom post type 'page'
		if ( 'w2dc_listing' === $list_screen->get_key() ) {
			// Register column

			// Register a column WITHOUT pro features
			$list_screen->register_column_type( new \DOM_COLUMN\Column\Free\Called() );

			// Register a column WITH pro features
			$list_screen->register_column_type( new \DOM_COLUMN\Column\Pro\Called() );
		}

		// Example #2 - for media
		// if ( 'attachment' === $list_screen->get_key() ) {
		// Register column
		// }

		// Example #3 - for all post types
		// if ( \AC\MetaType::POST === $list_screen->get_meta_type() ) {
		// Register column
		// }

		// Example #4 - for users
		// if ( \AC\MetaType::USER === $list_screen->get_meta_type() ) {
		// Register column
		// }

		// Example #4 - for categories on the taxonomy list table
		// if ( $list_screen instanceof \ACP\ListScreen\Taxonomy && 'category' === $list_screen->get_taxonomy()) {
		// Register column
		// }

	} );

} );
