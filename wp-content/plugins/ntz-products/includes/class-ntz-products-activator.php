<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ntz_Products
 * @subpackage Ntz_Products/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ntz_Products
 * @subpackage Ntz_Products/includes
 * @author     Your Name <email@example.com>
 */


class Ntz_Products_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		//ADD: Добавление счетчика для CF7
		add_option( 'cf7_counter', '0' );
	}

}
