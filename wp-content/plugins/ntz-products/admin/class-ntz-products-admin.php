<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Ntz_Products
 * @subpackage Ntz_Products/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ntz_Products
 * @subpackage Ntz_Products/admin
 * @author     Your Name <email@example.com>
 */
class Ntz_Products_Admin {

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
	 * @param      string    $ntz_products       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ntz_products, $version ) {

		$this->ntz_products = $ntz_products;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->ntz_products, plugin_dir_url( __FILE__ ) . 'css/ntz-products-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->ntz_products, plugin_dir_url( __FILE__ ) . 'js/ntz-products-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function create_extended_post_types() {
		// Регистрация типа записей "Продукт"
		register_post_type( 'product',
			array(
				'labels' => array(
					'name' => __( 'Продукция' ),
					'singular_name' => __( 'Продукт' ),
					'add_new' => _x('Добавить', 'book'),
					'add_new_item' => __('Добавить продукт'),
					'edit_item' => __('Редактировать продукт'),
					'new_item' => __('Новый продукт'),
					'all_items' => __('Все продукты'),
					'view_item' => __('Просмотр'),
					'search_items' => __('Искать продукт'),
					'not_found' =>  __('Не найдено'),
					'not_found_in_trash' => __('Не найдено в корзине'), 
					'parent_item_colon' => '',
					'menu_name' => __('Продукция') ),
				'public' => true,
				'has_archive' => true,
				'hierarchical'  => false,
				'rewrite'     => array( 'slug' => 'products' ),
				'menu_icon'   => 'dashicons-cart',
				'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
				'taxonomies' => array( 'category' )
			)
		);

		// Регистрация таксономии "тип изделия"
		register_taxonomy('type', array('product'), array(
			'labels'                => array(
				'name'              => 'Типы изделий',
				'singular_name'     => 'Тип изделия',
				'search_items'      => 'Найти тип',
				'all_items'         => 'Все типы',
				'view_item '        => 'Просмотр типа',
				'parent_item'       => 'Родительский тип',
				'parent_item_colon' => 'Родительский тип:',
				'edit_item'         => 'Редактировать тип',
				'update_item'       => 'Обновить тип',
				'add_new_item'      => 'Добавить тип',
				'new_item_name'     => 'Новый тип',
				'menu_name'         => 'Типы изделий',
			),
			'public'                => true,
			'hierarchical'          => true,
			//'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array( 'slug' => 'types' ),
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'          => array()
		) );

		register_taxonomy('climcategory', array('product'), array(
			'labels'                => array(
				'name'              => 'Категории установки',
				'singular_name'     => 'Категория установки',
				'search_items'      => 'Найти категорию установки',
				'all_items'         => 'Все категории установки',
				'view_item '        => 'Просмотр категории',
				'parent_item'       => 'Родительская категория',
				'parent_item_colon' => 'Родительская категория:',
				'edit_item'         => 'Редактировать категорию',
				'update_item'       => 'Обновить категорию',
				'add_new_item'      => 'Добавить категорию',
				'new_item_name'     => 'Новая категория',
				'menu_name'         => 'Категории установки',
			),
			'public'                => true,
			'hierarchical'          => true,
			//'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array( 'slug' => 'climcat' ),
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'          => array()
		) );

		register_taxonomy('voltclass', array('product'), array(
			'labels'                => array(
				'name'              => 'Классы напряжения',
				'singular_name'     => 'Класс напряжения',
				'search_items'      => 'Найти класс напряжения',
				'all_items'         => 'Все классы напряжения',
				'view_item '        => 'Просмотр класса',
				'parent_item'       => 'Родительский класс',
				'parent_item_colon' => 'Родительский класс:',
				'edit_item'         => 'Редактировать класс',
				'update_item'       => 'Обновить класс',
				'add_new_item'      => 'Добавить класс',
				'new_item_name'     => 'Новый класс напряжения',
				'menu_name'         => 'Классы напряжения',
			),
			'public'                => true,
			'hierarchical'          => true,
			//'update_count_callback' => '_update_post_term_count',
			'rewrite'               => array( 'slug' => 'voltclass' ),
			//'query_var'             => $taxonomy, // название параметра запроса
			'capabilities'          => array()
		) );

		register_taxonomy_for_object_type('category', 'product');

		// register_post_type( 'doc',
		// 	array(
		// 		'labels' => array(
		// 			'name' => __( 'Документация' ),
		// 			'singular_name' => __( 'Документ' )
		// 		),
		// 		'public' => true,
		// 		'has_archive' => true,
		// 		'rewrite'     => array( 'slug' => 'docs' ),
		// 		'menu_icon'   => 'dashicons-media-default',
		// 	)
		// );

		// register_post_type( 'question',
		// 	array(
		// 		'labels' => array(
		// 			'name' => __( 'Вопросы' ),
		// 			'singular_name' => __( 'Вопрос' )
		// 		),
		// 		'public' => true,
		// 		'has_archive' => true,
		// 		'rewrite'     => array( 'slug' => 'question' ),
		// 		'menu_icon'   => 'dashicons-editor-help',
		// 	)
		// );

  		flush_rewrite_rules();      // clear the permalinks after the post type has been registered
	}

	/**
	 * Show extra user data fields on user profile page
	 *
	 * @since    1.0.0
	 */
	public function show_extra_profile_fields( $user ) { ?>
		<h3>Дополнительные данные</h3>
		<table class="form-table">
			<tr>
				<th>
					<label for="org_name">Организация</label>
				</th>	
				<td>
					<input type="text" name="org_name" id="org_name" value="<?php echo(get_user_meta( $user->ID, 'org_name', true )); ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th>
					<label for="org_name">ИНН</label>
				</th>	
				<td>
					<input type="text" name="inn_name" id="inn_name" value="<?php echo(get_user_meta( $user->ID, 'inn_name', true )); ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th>
					<label for="org_name">Область, город</label>
				</th>	
				<td>
					<input type="text" name="city_name" id="city_name" value="<?php echo(get_user_meta( $user->ID, 'city_name', true )); ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th>
					<label for="phone_name">Телефон/факс</label>
				</th>	
				<td>
					<input type="text" name="phone_name" id="phone_name" value="<?php echo(get_user_meta( $user->ID, 'phone_name', true )); ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th>
					<label for="hobby_name">Вид деятельности</label>
				</th>	
				<td>
					<input type="text" name="hobby_name" id="hobby_name" value="<?php echo(get_user_meta( $user->ID, 'hobby_name', true )); ?>" class="regular-text">
				</td>
			</tr>
			<tr>
				<th>
					<label for="shop_name">Приобретали ли вы продукцию НТЗ Волхов?</label>
				</th>	
				<td>
					<input type="text" name="shop_name" id="shop_name" value="<?php echo(get_user_meta( $user->ID, 'shop_name', true )); ?>" class="regular-text">
				</td>
			</tr>
		</table>
		<h3>Управление рассылкой</h3>
		<table class="form-table">
			<tr>
				<td>                
					<label for="denyemails"><input type="checkbox" name="denyemails" id="denyemails" <?php echo(checked( get_user_meta( $user->ID, 'denyemails', true ), 'on', false )); ?> class="regular-text">Отказаться от информационной рассылки по электронной почте</label><br />
				</td>
			</tr>
		</table>
	<?php }


	/**
	 * Save extra user data fields after profile editing
	 *
	 * @since    1.0.0
	 */
	public function save_extra_profile_fields( $user_id ) {

		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		update_user_meta( $user_id, 'org_name', isset($_POST['org_name']) ? $_POST['org_name'] : false );
		update_user_meta( $user_id, 'inn_name', isset($_POST['inn_name']) ? $_POST['inn_name'] : false );
		update_user_meta( $user_id, 'city_name', isset($_POST['city_name']) ? $_POST['city_name'] : false );
		update_user_meta( $user_id, 'phone_name', isset($_POST['phone_name']) ? $_POST['phone_name'] : false );
		update_user_meta( $user_id, 'hobby_name', isset($_POST['hobby_name']) ? $_POST['hobby_name'] : false );
		update_user_meta( $user_id, 'shop_name', isset($_POST['shop_name']) ? $_POST['shop_name'] : false );
		update_user_meta( $user_id, 'denyemails', isset($_POST['denyemails']) ? $_POST['denyemails'] : false );
	}

	/**
	 * Show extra user data column headers in users list on admin page
	 *
	 * @since    1.0.0
	 */
	public function new_modify_user_table( $column ) {

		$column['org_name'] = 'Организация';
		$column['inn_name'] = 'ИНН';
		$column['city_name'] = 'Город';
		$column['phone_name'] = 'Телефон';
		$column['hobby_name'] = 'Вид деятельности';
		$column['shop_name'] = 'Покупатель';

		$column['denyemails'] = 'Отказ от рассылки';
		return $column;
	}

	/**
	 * Show extra user data in users list on admin page
	 *
	 * @since    1.0.0
	 */
	public function new_modify_user_table_row( $val, $column_name, $user_id ) {
		switch ($column_name) {
			case 'org_name' :
				return get_user_meta($user_id, 'org_name', true);
				break;
			case 'inn_name' :
				return get_user_meta($user_id, 'inn_name', true);
				break;
			case 'city_name' :
				return get_user_meta($user_id, 'city_name', true);
				break;
			case 'phone_name' :
				return get_user_meta($user_id, 'phone_name', true);
				break;
			case 'hobby_name' :
				return get_user_meta($user_id, 'hobby_name', true);
				break;
			case 'shop_name' :
				return get_user_meta($user_id, 'shop_name', true);
				break;
			case 'denyemails' :
				return get_user_meta($user_id, 'denyemails', true);
				break;
			default:
		}
		return $val;
	}


}
