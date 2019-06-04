<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ntz_Products
 * @subpackage Ntz_Products/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Ntz_Products
 * @subpackage Ntz_Products/includes
 * @author     Your Name <email@example.com>
 */
class Ntz_Products_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
 		unregister_post_type( 'product' );
		// unregister_post_type( 'doc' );
 		// unregister_post_type( 'question' );
        
        flush_rewrite_rules();  // clear the permalinks to remove our post type's rules from the database

	}

}
