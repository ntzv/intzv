<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ntz_Products
 * @subpackage Ntz_Products/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Ntz_Products
 * @subpackage Ntz_Products/includes
 * @author     Your Name <email@example.com>
 */
class Ntz_Products {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Ntz_Products_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $ntz_products    The string used to uniquely identify this plugin.
	 */
	protected $ntz_products;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'NTZ_PRODUCTS_VERSION' ) ) {
			$this->version = NTZ_PRODUCTS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->ntz_products = 'ntz-products';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ntz_Products_Loader. Orchestrates the hooks of the plugin.
	 * - Ntz_Products_i18n. Defines internationalization functionality.
	 * - Ntz_Products_Admin. Defines all hooks for the admin area.
	 * - Ntz_Products_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ntz-products-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ntz-products-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ntz-products-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ntz-products-public.php';

		$this->loader = new Ntz_Products_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ntz_Products_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Ntz_Products_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Ntz_Products_Admin( $this->get_ntz_products(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

        $this->loader->add_action( 'init', $plugin_admin, 'create_extended_post_types' ); // Добавление типа записей

		//Добавление дополнительных полей в профили пользователей
		$this->loader->add_action( 'show_user_profile', $plugin_admin, 'show_extra_profile_fields' );// add the field to user's own profile editing screen
		$this->loader->add_action( 'edit_user_profile', $plugin_admin, 'show_extra_profile_fields' );// add the field to user profile editing screen

		$this->loader->add_action( 'personal_options_update', $plugin_admin, 'save_extra_profile_fields' );// add the save action to user's own profile editing screen update
		$this->loader->add_action( 'edit_user_profile_update', $plugin_admin, 'save_extra_profile_fields' );// add the save action to user profile editing screen update

		$this->loader->add_filter( 'manage_users_custom_column', $plugin_admin, 'new_modify_user_table_row', 10, 3 );
		$this->loader->add_filter( 'manage_users_columns', $plugin_admin, 'new_modify_user_table' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Ntz_Products_Public( $this->get_ntz_products(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_action( 'user_register', $plugin_public, 'tml_user_register' );
		$this->loader->add_filter( 'registration_errors', $plugin_public, 'tml_registration_errors' );

		//ADD: Добавление фильтра для обработки счетчика CF7
		$this->loader->add_filter( 'wpcf7_special_mail_tags', $plugin_public, 'cf7_get_increment_mail_counter', 20, 3 );
		$this->loader->add_action( 'wpcf7_mail_sent', $plugin_public, 'cf7_update_increment_mail_counter');
		//Подстановка имени пользователя в меню
		// $this->loader->add_filter( 'wp_nav_menu_objects', $plugin_public, 'my_dynamic_menu_items' );

	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_ntz_products() {
		return $this->ntz_products;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Ntz_Products_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

