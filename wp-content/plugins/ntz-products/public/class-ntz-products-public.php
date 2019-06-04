<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ntz_Products
 * @subpackage Ntz_Products/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ntz_Products
 * @subpackage Ntz_Products/public
 * @author     Your Name <email@example.com>
 */
class Ntz_Products_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ntz_products    The ID of this plugin.
	 */
	private $ntz_products;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $ntz_products       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ntz_products, $version ) {

		$this->ntz_products = $ntz_products;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ntz_Products_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ntz_Products_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->ntz_products, plugin_dir_url( __FILE__ ) . 'css/ntz-products-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ntz_Products_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ntz_Products_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->ntz_products, plugin_dir_url( __FILE__ ) . 'js/ntz-products-public.js', array( 'jquery' ), $this->version, false );

	}

	//Подстановка имени пользователя в меню
	public function my_dynamic_menu_items( $menu_items ) {
		foreach ( $menu_items as $menu_item ) {
			if ( strpos($menu_item->title, '#profile_name#') !== false) {
				$menu_item->title =  str_replace("#profile_name#",  wp_get_current_user()->user_login, $menu_item->title);
			}
		}

		return $menu_items;
	}

	public function tml_registration_errors( $errors ) {
		if ( empty( $_POST['org_name'] ) )
			$errors->add( 'empty_org_name', '<strong>ОШИБКА</strong>: Пожалуйста введите название организации.' );
		if ( empty( $_POST['inn_name'] ) )
			$errors->add( 'empty_inn_name', '<strong>ОШИБКА</strong>: Пожалйуста введите ИНН организации.' ); 
		if ( empty( $_POST['city_name'] ) )
			$errors->add( 'empty_city_name', '<strong>ОШИБКА</strong>: Пожалуйста введите вашу область или город.' );
		if ( empty( $_POST['first_name'] ) )
			$errors->add( 'empty_first_name', '<strong>ОШИБКА</strong>: Пожалуйста введите имя.' );
		if ( empty( $_POST['last_name'] ) )
			$errors->add( 'empty_last_name', '<strong>ОШИБКА</strong>: Пожалуйста введите фамилию.' );
		if ( empty( $_POST['phone_name'] ) )
			$errors->add( 'empty_phone_name', '<strong>ОШИБКА</strong>: Пожалуйста введите номер телефона для контакта.' );
		if ( empty( $_POST['hobby_name'] ) )
			$errors->add( 'empty_hobby_name', '<strong>ОШИБКА</strong>: Пожалуйста введите ваш вид деятельности.' );
		return $errors;
	}


	public function tml_user_register( $user_id ) {
		if ( !empty( $_POST['org_name'] ) )
			update_user_meta( $user_id, 'org_name', $_POST['org_name'] );
		if ( !empty( $_POST['inn_name'] ) )
			update_user_meta( $user_id, 'inn_name', $_POST['inn_name'] );
		if ( !empty( $_POST['city_name'] ) )
			update_user_meta( $user_id, 'city_name', $_POST['city_name'] );
		if ( !empty( $_POST['post_name'] ) )
			update_user_meta( $user_id, 'post_name', $_POST['post_name'] );
		if ( !empty( $_POST['first_name'] ) )
			update_user_meta( $user_id, 'first_name', $_POST['first_name'] );
		if ( !empty( $_POST['last_name'] ) )
			update_user_meta( $user_id, 'last_name', $_POST['last_name'] );
		if ( !empty( $_POST['phone_name'] ) )
			update_user_meta( $user_id, 'phone_name', $_POST['phone_name'] );
		if ( !empty( $_POST['hobby_name'] ) )
			update_user_meta( $user_id, 'hobby_name', $_POST['hobby_name'] );
		if ( !empty( $_POST['shop_name'] ) )
			update_user_meta( $user_id, 'shop_name', $_POST['shop_name'] );
		if ( !empty( $_POST['kind_name'] ) )
			update_user_meta( $user_id, 'kind_name', $_POST['kind_name'] );
	}

		//ADD: Получение значения счетчика CF7
		public function cf7_get_increment_mail_counter( $output, $name, $html ) {

			if ( $name == '_serial_number' ) {

				$contact_form = WPCF7_ContactForm::get_current();

				$channel_id = get_post_meta( $contact_form->id(), '_flamingo', true )['channel'];

				$val = get_option( 'cf7_counter', '' )[ $channel_id ] + 1; //Increment the current count
				$output = sprintf( '%s%06s', $channel_id, $val );
				
			}

			return $output;
		}

		public function cf7_update_increment_mail_counter() {

			$contact_form = WPCF7_ContactForm::get_current();

			$channel_id = get_post_meta( $contact_form->id(), '_flamingo', true )['channel'];

			$counter = get_option( 'cf7_counter', 0);

			$counter[ $channel_id ] = (int) $counter[ $channel_id ] + 1;
			update_option( 'cf7_counter', $counter ); //Update the settings with the new count
		}

}
