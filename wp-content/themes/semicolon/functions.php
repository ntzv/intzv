<?php
/**
 * The Semicolon Theme
 */

class Semicolon {
	public static $defaults = array();
	public static $colors_css_version = 20160925;

	private function __construct() {}

	/**
	 * Runs immediately at the end of this file, not to be confused
	 * with after_setup_theme, which runs a little bit later.
	 */
	public static function setup() {
		add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );
		do_action( 'semicolon_setup' );
	}

	/**
	 * Runs during core's after_setup_theme
	 */
	public static function after_setup_theme() {
		global $content_width;

		self::$defaults = array(
			'colors' => array(
				'accent' => '#117bb8',
				'text' => '#3a3a3a',
			),
			'color_labels' => array(
				'accent' => __( 'Accent Color', 'semicolon' ),
				'text' => __( 'Text Color', 'semicolon' ),
			),
		);

		if ( ! isset( $content_width ) ) {
			$content_width = 780;
		}

		add_action( 'init', array( __CLASS__, 'inline_controls_handler' ) );
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );

		add_action( 'pre_get_posts', array( __CLASS__, 'pre_get_posts' ) );
		add_filter( 'posts_results', array( __CLASS__, 'posts_results' ), 10, 2 );
		add_filter( 'found_posts', array( __CLASS__, 'found_posts' ), 10, 2 );
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );
		add_filter( 'post_class', array( __CLASS__, 'post_class' ), 10, 3 );

		add_filter( 'shortcode_atts_gallery', array( __CLASS__, 'shortcode_atts_gallery' ), 10, 3 );
		add_filter( 'use_default_gallery_style', '__return_false' );

		add_action( 'widgets_init', array( __CLASS__, 'widgets_init' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
		add_action( 'wp', array( __CLASS__, 'setup_author' ) );

		add_filter( 'wp_page_menu_args', array( __CLASS__, 'page_menu_args' ) );
		add_filter( 'wp_title', array( __CLASS__, 'wp_title' ), 10, 2 );

		// Enhanced customizer support
		add_action( 'customize_register', array( __CLASS__, 'customize_register' ) );
		add_action( 'customize_preview_init', array( __CLASS__, 'customize_preview_js' ) );

		load_theme_textdomain( 'semicolon', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Editor style
		add_editor_style();

		// Post thumbnail support and additional image sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 360, 210, true );
		add_image_size( 'semicolon-mini', 60, 60, true );
		add_image_size( 'semicolon-gallery', 220, 220, true );

		// This theme uses a primary navigation menu and an additional
		// menu for social profile links.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'semicolon' ),
			'social'  => __( 'Social Menu', 'semicolon' ),
		) );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		// HTML5 support for core elements.
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) );

		// Add support for Jetpack's Featured Content
		add_theme_support( 'featured-content', array(
			'filter' => 'semicolon_get_featured_posts',
			'max_posts' => 2,
		) );

		// Add support for the Pageviews plugin
		add_theme_support( 'pageviews' );

		// Title tag
		add_theme_support( 'title-tag' );

		do_action( 'semicolon_after_setup_theme' );
	}

	/**
	 * Sets the authordata global when viewing an author archive.
	 *
	 * This provides backwards compatibility with
	 * http://core.trac.wordpress.org/changeset/25574
	 *
	 * It removes the need to call the_post() and rewind_posts() in an author
	 * template to print information about the author.
	 *
	 * @global WP_Query $wp_query WordPress Query object.
	 * @return void
	 */
	public static function setup_author() {
		global $wp_query;

		if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
			$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
		}
	}

	/**
	 * Administration menu
	 */
	public static function admin_menu() {
		add_theme_page( __( 'Recommended Plugins', 'semicolon' ), __( 'Recommended Plugins', 'semicolon' ), 'activate_plugins', 'semicolon-recommended', array( __CLASS__, 'admin_menu_recommended' ) );
	}

	/**
	 * Recommended Plugins section in Appearance
	 */
	public static function admin_menu_recommended() {
		$plugins = array(
			array(
				'label' => 'Jetpack',
				'description' => __( 'Jetpack contains many useful features that integrate well with the Semicolon theme, including custom colors, featured posts and more.', 'semicolon' ),
				'filename' => 'jetpack/jetpack.php',
				'url' => 'https://wordpress.org/plugins/jetpack/',
			),
			array(
				'label' => 'Pageviews',
				'description' => __( 'Pageviews is a simple and lightweight views counter for your WordPress posts and pages.', 'semicolon' ),
				'filename' => 'pageviews/pageviews.php',
				'url' => 'https://wordpress.org/plugins/pageviews/',
			),
			array(
				'label' => 'Yoast SEO',
				'description' => __( 'One of the most popular SEO plugins for WordPress, includes a breadcrumbs functionality which integrates well with Semicolon.', 'semicolon' ),
				'filename' => 'wordpress-seo/wp-seo.php',
				'url' => 'https://wordpress.org/plugins/wordpress-seo/',
			),
			array(
				'label' => 'Zone Manager',
				'description' => __( 'Semicolon defines the Related Posts section as a zone for this plugin,allowing you to easily customize that area.', 'semicolon' ),
				'filename' => 'zoninator/zoninator.php',
				'url' => 'https://wordpress.org/plugins/wordpress-seo/',
			),
			array(
				'label' => 'YARPP',
				'description' => __( 'Yet Another Related Posts Plugin (YARPP) integrates well with the Related Posts section in the Semicolon theme.', 'semicolon' ),
				'filename' => 'yet-another-related-posts-plugin/yarpp.php',
				'url' => 'https://wordpress.org/plugins/wordpress-seo/',
			),
		);
		?>
		<div class="wrap">
			<h1><?php _e( 'Recommended Plugins', 'semicolon' ); ?></h1>
			<p><?php _e( 'Below is a list of recommended plugins for the Semicolon theme. They are all optional.', 'semicolon' ); ?></p>

			<table class="widefat">
				<?php foreach ( $plugins as $plugin ) : ?>
				<tr>
					<td><a href="<?php echo esc_url( $plugin['url'] ); ?>" target="_blank"><strong><?php echo str_replace( ' ', '&nbsp;', esc_html( $plugin['label'] ) ); ?></strong></a></td>
					<td><?php echo esc_html( $plugin['description'] ); ?></td>

					<?php if ( is_plugin_active( $plugin['filename'] ) ) : ?>
						<td>Active</td>
					<?php else : ?>
						<td><a href="<?php echo esc_url( $plugin['url'] ); ?>" target="_blank"><?php _e( 'Download', 'semicolon' ); ?></a></td>
					<?php endif; ?>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php
	}

	/**
	 * Sets up all the sidebars in the world.
	 */
	public static function widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Primary', 'semicolon' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Secondary', 'semicolon' ),
			'id'            => 'sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Tertiary', 'semicolon' ),
			'id'            => 'sidebar-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name' => __( 'Footer Sidebar', 'semicolon' ),
			'id'   => 'footer-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	/**
	 * Enqueue all the things.
	 */
	public static function enqueue_scripts() {
		wp_enqueue_style( 'semicolon', get_stylesheet_uri(), array( 'semicolon-genericons', 'semicolon-open-sans', 'semicolon-pt-serif' ), '20160925' );
		wp_enqueue_style( 'semicolon-colors', get_template_directory_uri() . '/css/colors.css', array( 'semicolon' ), self::$colors_css_version );
		wp_enqueue_style( 'semicolon-genericons', get_template_directory_uri() . '/css/genericons.css', array(), '20131222' );

		// @todo: allow subsets via i18n.
		wp_enqueue_style( 'semicolon-pt-serif', '//fonts.googleapis.com/css?family=PT+Serif&subset=latin,cyrillic' );
		wp_enqueue_style( 'semicolon-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic' );

		wp_enqueue_script( 'semicolon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		wp_enqueue_script( 'semicolon', get_template_directory_uri() . '/js/semicolon.js', array( 'jquery' ), '20140506', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( self::supports_custom_colors() ) {
			wp_add_inline_style( 'semicolon', self::custom_colors() );
		}
	}

	/**
	 * Returns true if custom colors support is available.
	 */
	public static function supports_custom_colors() {
		// We need Jetpack's SASS super powers.
		return function_exists( 'jetpack_sass_css_preprocess' );
	}

	/**
	 * Pre-4.0 compatibility.
	 */
	public static function is_customize_preview() {
		global $wp_customize;
		return is_a( $wp_customize, 'WP_Customize_Manager' ) && $wp_customize->is_preview();
	}

	/**
	 * Custom Colors
	 *
	 * This feature is experimental. It relies on Jetpack's Custom CSS module
	 * and the availability of a SASS preprocessor function.
	 */
	public static function custom_colors() {
		$colors = get_theme_mod( 'semicolon-colors', self::$defaults['colors'] );
		$colors = wp_parse_args( $colors, self::$defaults['colors'] );

		$custom = false;
		foreach ( self::$defaults['colors'] as $key => $default ) {
			if ( strtolower( $colors[ $key ] ) != $default ) {
				$custom = true;
				break;
			}
		}

		if ( get_theme_mod( 'semicolon-colors-auto-contrast', true ) && get_background_color() != get_theme_support( 'custom-background', 'default-color' ) )
			$custom = true;

		// At least one custom color should be set for an override.
		if ( ! $custom )
			return;

		$css = get_theme_mod( 'semicolon-colors-css', false );
		$hash = get_theme_mod( 'semicolon-colors-hash', false );
		$new_hash = md5( serialize( array_merge( $colors, array(
			'version' => self::$colors_css_version,
			'background-color' => get_background_color(),
			'auto-contrast' => get_theme_mod( 'semicolon-colors-auto-contrast', true ),
		) ) ) );

		// Cache with a hash and then smash.
		if ( $hash !== $new_hash /* || true /* use for debug */ ) {

			// Somebody can preview Semicolon without activating it, let's not
			// pollute the database with our theme mods.
			if ( ! self::is_customize_preview() ) {
				// Set these early, just in case everything else fails or fatals.
				set_theme_mod( 'semicolon-colors-hash', $new_hash );
				set_theme_mod( 'semicolon-colors-css', '' );
			}

			// There's a special semicolon-override marker in the .sass file.
			$override = sprintf( '$color-background: #%s;' . PHP_EOL, get_background_color() );

			foreach ( $colors as $key => $value ) {
				$override .= sprintf( '$color-%s: %s;' . PHP_EOL, $key, $value );
			}

			if ( get_theme_mod( 'semicolon-colors-auto-contrast', true ) ) {
				$override .= '$auto-contrast: true;' . PHP_EOL;
			}

			// Retrieve the Sass file and then run some replacements.
			$sass = self::custom_colors_get_sass();
			if ( empty( $sass ) )
				return;

			$sass = preg_replace( '/^.*?semicolon-override.*$/im', $override, $sass );
			$css = jetpack_sass_css_preprocess( $sass );

			// Something went wrong, so don't display raw sass.
			if ( empty( $css ) || strpos( $css, 'this string should never appear in the compiled stylesheet' ) !== false )
				return;

			// Minify the CSS if possible.
			if ( method_exists( 'Jetpack_Custom_CSS', 'minify' ) ) {
				$css = Jetpack_Custom_CSS::minify( $css );
			}

			// Don't write to the db in preview mode.
			if ( ! self::is_customize_preview() ) {
				set_theme_mod( 'semicolon-colors-css', $css );
			}
		}

		// Dequeue the default colors css.
		wp_dequeue_style( 'semicolon-colors' );
		return $css;
	}

	/**
	 * Retrieve the contents of the colors .scss file.
	 *
	 * This is a bit tricky. It tries to use the direct fs method to read
	 * the contents of the bundled .scss file. If it fails, this method will
	 * attempt a remote request.
	 */
	public static function custom_colors_get_sass() {
		include_once( ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php' );
		include_once( ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php' );

		if ( ! class_exists( 'WP_Filesystem_Direct' ) )
			return false;

		$wp_filesystem = new WP_Filesystem_Direct( null );
		$sass = $wp_filesystem->get_contents( get_template_directory() . '/css/colors.scss' );
		unset( $wp_filesystem );

		// This is slower, but okay since the results will be cached indefinitely.
		if ( empty( $sass ) ) {
			$request = wp_remote_get( get_template_directory_uri() . '/css/colors.scss' );
			$sass = wp_remote_retrieve_body( $request );
		}

		return $sass;
	}

	/**
	 * Use a specific size for the gallery shortcode.
	 *
	 * Unless a size is explicitly provided in the shortcode,
	 * use a size registered with the theme if the number of columns
	 * is more than a single one.
	 */
	public static function shortcode_atts_gallery( $out, $pairs, $atts ) {
		if ( empty( $atts['size'] ) && $out['columns'] >= 2 )
			$out['size'] = 'semicolon-gallery';

		return $out;
	}

	/**
	 * Theme-specific body classes.
	 */
	public static function body_class( $classes ) {
		global $wp_customize;

		if ( $wp_customize && $wp_customize->is_preview() )
			$classes[] = 'semicolon-customizing';

		if ( ! is_singular() )
			$classes[] = 'grid';

		$classes[] = 'no-js';

		return $classes;
	}

	/**
	 * Theme-specific post classes.
	 */
	public static function post_class( $classes, $class, $post_id ) {
		if ( self::is_featured( $post_id ) )
			$classes[] = 'semicolon-featured';

		return $classes;
	}

	/**
	 * Looks up featured posts via a filter or uses ones provided by Jetpack.
	 *
	 * @return WP_Query
	 */
	public static function get_featured_posts() {
		$featured_posts = array();

		$jetpack_featured_posts = apply_filters( 'semicolon_get_featured_posts', false );
		if ( ! empty( $jetpack_featured_posts ) )
			$featured_posts = array_map( 'absint', wp_list_pluck( $jetpack_featured_posts, 'ID' ) );

		if ( empty( $featured_posts ) )
			return new WP_Query;

		return new WP_Query( array(
			'post__in' => $featured_posts,
			'posts_per_page' => 2,
			'ignore_sticky_posts' => true,
		) );
	}

	/**
	 * Returns true if the given post is featured.
	 *
	 * @return bool Whether the given post is featured or not.
	 */
	public static function is_featured( $post_id = null ) {
		$post = get_post( $post_id );
		$featured = false;

		$term_id = self::get_jetpack_featured_content_term_id();
		if ( ! $term_id )
			return $featured;

		$post_tags = wp_get_object_terms( $post->ID, 'post_tag' );

		if ( in_array( $term_id, wp_list_pluck( $post_tags, 'term_id' ) ) )
			$featured = true;

		return $featured;
	}

	/**
	 * Exclude featured posts from the main loop, because we're going to
	 * attach them to the results a little later with an offset.
	 */
	public static function pre_get_posts( $query ) {
		if ( ! $query->is_main_query() || is_admin() )
			return;

		if ( is_front_page() ) {
			$query->set( 'ignore_sticky_posts', 1 );

			// We're going to stick two posts only, on the home page
			// But not on other pages, see posts_results.
			$featured = self::get_featured_posts();

			if ( $featured->have_posts() ) {
				$posts_per_page = $query->get( 'posts_per_page' );
				if ( ! $posts_per_page )
					$posts_per_page = get_option( 'posts_per_page', 10 );

				$query->set( 'post__not_in', wp_list_pluck( $featured->posts, 'ID' ) );

				if ( is_paged() ) {
					$query->set( 'offset', ( $query->get( 'paged' ) - 1 ) * $posts_per_page - $featured->post_count );
				}
			}
		}
	}

	/**
	 * When posts are fetched for the front page, look for
	 * some feature posts and prepend them to the resulting array.
	 */
	public static function posts_results( $posts, $query ) {
		if ( ! $query->is_main_query() || is_admin() )
			return $posts;

		if ( is_front_page() ) {

			// Stick only on the home page.
			if ( ! is_paged() ) {
				$featured = self::get_featured_posts();

				if ( $featured->have_posts() ) {

					// Since we're going to unshift these, we'll need them in reverse order.
					$featured->posts = array_reverse( $featured->posts );

					foreach ( $featured->posts as $post ) {
						array_unshift( $posts, $post );
					}

					// Remove any extras on top of ppp.
					while ( count( $posts ) > $query->get( 'posts_per_page' ) ) {
						array_pop( $posts );
					}
				}
			}
		}

		return $posts;
	}

	/**
	 * The number of found posts can vary with featured posts.
	 */
	public static function found_posts( $found_posts, $query ) {
		if ( ! $query->is_main_query() || is_admin() )
			return $found_posts;

		if ( is_front_page() ) {
			$featured = self::get_featured_posts();

			if ( $featured->have_posts() ) {
				$found_posts += $featured->post_count;
			}
		}

		return $found_posts;
	}

	/**
	 * Use a plugin to get related posts, or fall back to
	 * simply fetching some posts from the same category.
	 */
	public static function get_related_posts() {
		$post = get_post();

		$posts_per_page = apply_filters( 'semicolon_related_posts_per_page', 4 );

		// Support for the Zone Manager (Zoninator) plugin
		if ( function_exists( 'z_get_zoninator' ) ) {

			// Allow plugins and child themes to define their own zones or use defaults.
			$zones = apply_filters( 'semicolon_related_posts_zones', false, $post->ID );
			if ( ! is_array( $zones ) ) {
				$zones = array( 'related-posts' );

				$categories = wp_get_object_terms( $post->ID, array( 'category' ), array( 'fields' => 'slugs' ) );
				foreach ( $categories as $slug )
					$zones[] = 'related-posts-' . $slug;

				$zones = array_reverse( $zones );
			}

			foreach ( $zones as $zone ) {
				$query = z_get_zoninator()->get_zone_query( $zone, apply_filters( 'semicolon_related_posts_query_args', array(
					'posts_per_page' => $posts_per_page,
					'post__not_in' => array( $post->ID ),
					'ignore_sticky_posts' => true,
				) ) );

				if ( $query->have_posts() )
					return $query;
			}
		}

		// Support for the Yet Another Related Posts Plugin
		if ( function_exists( 'yarpp_get_related' ) ) {
			$related = yarpp_get_related( array( 'limit' => $posts_per_page ), $post->ID );
			$args = array(
				'post__in' => wp_list_pluck( $related, 'ID' ),
				'posts_per_page' => $posts_per_page,
				'ignore_sticky_posts' => true,
				'post__not_in' => array( $post->ID ),
			);

			$args = apply_filters( 'semicolon_related_posts_query_args', $args );
			return new WP_Query( $args );
		}

		$args = array(
			'posts_per_page' => $posts_per_page,
			'ignore_sticky_posts' => true,
			'post__not_in' => array( $post->ID ),
		);

		// Get posts from the same category.
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$category = array_shift( $categories );
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $category->term_id,
				),
			);
		}

		$args = apply_filters( 'semicolon_related_posts_query_args', $args );
		return new WP_Query( $args );
	}

	public static function page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}

	public static function wp_title( $title, $sep ) {
		global $page, $paged;

		if ( is_feed() ) {
			return $title;
		}

		// Add the blog name
		$title .= get_bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'semicolon' ), max( $paged, $page ) );
		}

		return $title;
	}

	public static function customize_register( $wp_customize ) {
		$wp_customize->get_setting('blogname')->transport = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

		// Colors are powered by Jetpack and Sass, make sure they're available.
		if ( ! self::supports_custom_colors() )
			return;

		$wp_customize->get_setting('background_color')->transport = 'refresh';

		foreach ( self::$defaults['colors'] as $key => $default ) {
			$wp_customize->add_setting( "semicolon-colors[$key]", array( 'default' => $default, 'sanitize_callback' => 'sanitize_hex_color' ) );

			$label = ! empty( self::$defaults['color_labels'][ $key ] ) ? self::$defaults['color_labels'][ $key ] : __( 'Color', 'semicolon' );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'semicolon-color-' . $key, array(
				'label' => $label,
				'section' => 'colors',
				'settings' => "semicolon-colors[$key]",
			) ) );
		}

		$wp_customize->add_setting( 'semicolon-colors-auto-contrast', array( 'default' => true, 'sanitize_callback' => function( $input ) { return (bool) $input; } ) );
		$wp_customize->add_control( 'semicolon-colors-auto-contrast', array(
			'type' => 'checkbox',
			'label' => __( 'Auto Contrast', 'semicolon' ),
			'section' => 'colors',
			'settings' => 'semicolon-colors-auto-contrast',
		) );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public static function customize_preview_js() {
		wp_enqueue_script( 'semicolon_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20141002', true );
	}

	/**
	 * Renders an inline controls div for the current post.
	 */
	public static function inline_controls() {
		$post = get_post();

		if ( ! current_user_can( 'edit_post', $post->ID ) )
			return;

		$toggle_featured_link = add_query_arg( array(
			'semicolon_action' => 'toggle_featured',
			'semicolon_post_id' => $post->ID,
		) );

		echo '<div class="semicolon-inline-controls">';

		// Only if Featured Content is active and configured.
		if ( self::get_jetpack_featured_content_term_id() )
			printf( '<a href="%s" class="semicolon-featured-toggle dashicons dashicons-star-filled"></a>', esc_url( $toggle_featured_link ) );

		printf( '<a href="%s" class="dashicons dashicons-edit"></a>', esc_url( get_edit_post_link( $post ) ) );
		echo '</div>';

		printf( '<a class="semicolon-anchor" id="semicolon-post-%d"></a>', $post->ID );
	}

	/**
	 * Fires during init, looks for a semicolon_action.
	 */
	public static function inline_controls_handler() {
		if ( empty( $_GET['semicolon_action'] ) || ! is_user_logged_in() )
			return;

		$action = strtolower( $_GET['semicolon_action'] );
		if ( ! in_array( $action, array( 'toggle_featured' ) ) )
			return;

		// Powered by Jetpack's Featured Content.
		if ( 'toggle_featured' == $action ) {
			if ( empty( $_GET['semicolon_post_id'] ) )
				return;

			$post_id = absint( $_GET['semicolon_post_id'] );
			$post = get_post( $post_id );

			if ( ! current_user_can( 'edit_post', $post->ID ) )
				return;

			// Only if the featured content tag has been set.
			$term_id = self::get_jetpack_featured_content_term_id();
			if ( ! $term_id )
				return;

			// Toggle the featured content tag.
			if ( self::is_featured( $post->ID ) ) {
				wp_remove_object_terms( $post->ID, $term_id, 'post_tag' );
			} else {
				wp_set_object_terms( $post->ID, $term_id, 'post_tag', true );
			}

			if ( method_exists( 'Featured_Content', 'delete_transient' ) )
				Featured_Content::delete_transient();

			$redirect_url = remove_query_arg( array( 'semicolon_action', 'semicolon_post_id' ) );
			$redirect_url .= sprintf( '#semicolon-post-%d', $post->ID );

			wp_safe_redirect( esc_url_raw( $redirect_url ) );
		}
	}

	public static function pageviews() {
		if ( ! has_action( 'pageviews' ) )
			return;

		$post = get_post();
		$pageviews_show_link = apply_filters( 'semicolon_pageviews_show_link', true );
		?>
		<div class="semicolon-pageviews-wrapper">

			<?php if ( $pageviews_show_link ) : ?>
			<a href="https://wordpress.org/plugins/pageviews/" target="_blank">
			<?php endif; ?>

			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1792 1792">
				<path d="M588.277,896v692.375H280.555V896H588.277z M1049.86,630.363v958.012h-307.72V630.363H1049.86z M1511.446,203.625v1384.75h-307.725V203.625H1511.446z"/>
			</svg><?php do_action( 'pageviews' ); ?>

			<?php if ( $pageviews_show_link ) : ?>
			</a>
			<?php endif; ?>
		</div>
		<?php
	}

	public static function get_jetpack_featured_content_term_id() {
		if ( ! method_exists( 'Featured_Content', 'get_setting' ) )
			return 0;

		$term = get_term_by( 'name', Featured_Content::get_setting( 'tag-name' ), 'post_tag' );
		if ( ! $term )
			return 0;

		return $term->term_id;
	}

	public static function breadcrumbs() {
		if ( has_action( 'semicolon_breadcrumbs' ) )
			return do_action( 'semicolon_breadcrumbs' );

		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<div class="semicolon-breadcrumbs">', '</div>' );
		}
	}
}

Semicolon::setup();

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';



/* чтобы вставить код php в статьях/страницах WordPress, поставьте шоркод: [exec]код[/exec] */
function exec_php($matches){
    eval('ob_start();'.$matches[1].'$inline_execute_output = ob_get_contents();ob_end_clean();');
    return $inline_execute_output;
}
function inline_php($content){
    $content = preg_replace_callback('/\[exec\]((.|\n)*?)\[\/exec\]/', 'exec_php', $content);
    $content = preg_replace('/\[exec off\]((.|\n)*?)\[\/exec\]/', '$1', $content);
    return $content;
}
add_filter('the_content', 'inline_php', 0);

function wph_only_parent_category($query) {
    if (!is_admin() && $query->is_category())
        $query->set('category__in', array(get_queried_object_id()));
}
add_action('pre_get_posts', 'wph_only_parent_category');

// САША САША САША САША САША САША САША САША САША САША САША САША САША АШАС АШАС АШАС АШАС АШАС АШАС АШАС СА

    $dynamic_widget_areas = array(
                /* rename or create new dynamic sidebars */
                "Sidebar 01",
                "Sidebar 02",
                "Sidebar 03",
                "Sidebar 04",
                "Sidebar 05",
                "Sidebar 06",
                "Sidebar 07",
                "Search Template",
                );
if ( function_exists('register_sidebar') ) {
    foreach ($dynamic_widget_areas as $widget_area_name) {
        register_sidebar(array(
           'name'=> $widget_area_name,
           'before_widget' => '<div id="%1$s" class="widget %2$s left half">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
        ));
    }
}
        add_action("admin_init", "sidebar_init");
        add_action('save_post', 'save_sidebar_link');
        function sidebar_init(){
                add_meta_box("sidebar_meta", "Sidebar Selection", "sidebar_link", "page", "side", "default");
        }
        function sidebar_link(){
                global $post, $dynamic_widget_areas;
                $custom  = get_post_custom($post->ID);
                $link    = $custom["_sidebar"][0];
        ?>
<div class="link_header">
        <?
        echo '<select name="link" class="sidebar-selection">';
        echo '<option>Select Sidebar</option>';
        echo '<option>-----------------------</option>';
        foreach ( $dynamic_widget_areas as $list ){
                    if($link == $list){
                      echo '<option value="'.$list.'" selected="true">'.$list.'</option>';
                        }else{
                      echo '<option value="'.$list.'">'.$list.'</option>';
                        }
                }
        echo '</select><br />';
        ?>
</div>
<p>Select sidebar to use on this page.</p>
<?php
}
function save_sidebar_link(){
global $post;
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return $post->ID;}
        update_post_meta($post->ID, "_sidebar", $_POST["link"]);
}
add_action('admin_head', 'sidebar_css');
function sidebar_css() {
        echo'
        <style type="text/css">
                .sidebar-selection{width:100%;}
        </style>
        ';
}

// add:Добавление поддержки логотипа
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

//Дополнительные поля в профили пользователей
function tml_registration_errors( $errors ) {
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

add_filter( 'registration_errors', 'tml_registration_errors' );

function tml_user_register( $user_id ) {
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
 if ( !empty( $_POST['manage_name'] ) )
 update_user_meta( $user_id, 'manage_name', $_POST['manage_name'] );
}

add_action( 'user_register', 'tml_user_register' );

/* Отключаем админ панель для всех, кроме администраторов. */
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;
//Добавление дополнительных полей в профили пользователей
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>
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
				<label for="hobby_name">Приобретали ли вы продукцию НТЗ Волхов?</label>
			</th>	
			<td>
				<input type="text" name="shop_name" id="shop_name" value="<?php echo(get_user_meta( $user->ID, 'shop_name', true )); ?>" class="regular-text">
			</td>
		</tr>
		<tr>
			<th>
				<label for="manage_name">Ваш ведущий менеджер</label>
			</th>	
			<td>
				<input type="text" name="manage_name" id="manage_name" value="<?php echo(get_user_meta( $user->ID, 'manage_name', true )); ?>" class="regular-text">
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

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'org_name', isset($_POST['org_name']) ? $_POST['org_name'] : false );
	update_user_meta( $user_id, 'inn_name', isset($_POST['inn_name']) ? $_POST['inn_name'] : false );
	update_user_meta( $user_id, 'city_name', isset($_POST['city_name']) ? $_POST['city_name'] : false );
	update_user_meta( $user_id, 'phone_name', isset($_POST['phone_name']) ? $_POST['phone_name'] : false );
	update_user_meta( $user_id, 'hobby_name', isset($_POST['hobby_name']) ? $_POST['hobby_name'] : false );
	update_user_meta( $user_id, 'shop_name', isset($_POST['shop_name']) ? $_POST['shop_name'] : false );
	update_user_meta( $user_id, 'manage_name', isset($_POST['manage_name']) ? $_POST['manage_name'] : false );

	update_user_meta( $user_id, 'denyemails', isset($_POST['denyemails']) ? $_POST['denyemails'] : false );
}

function new_modify_user_table( $column ) {
    $column['org_name'] = 'Организация';
    $column['inn_name'] = 'ИНН';
    $column['city_name'] = 'Город';
    $column['phone_name'] = 'Телефон';
    $column['hobby_name'] = 'Вид деятельности';
    $column['shop_name'] = 'Покупатель';
    $column['manage_name'] = 'Ведущий менеджер';
   
    $column['denyemails'] = 'Отказ от рассылки';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
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
        case 'manage_name' :
            return get_user_meta($user_id, 'manage_name', true);
            break;
        case 'denyemails' :
            return get_user_meta($user_id, 'denyemails', true);
            break;
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );

// add:Дополнительные поля в сообщения TML
function replace_user_meta_vars( $replacements, $user_id ) {
	$user_meta_vars = array(
		'%user_reg_date%' => get_date_from_gmt(get_userdata($user_id) -> user_registered,'d.m.Y H:m'),
		'%user_first_name%' => get_user_meta($user_id, 'first_name', true),
		'%user_last_name%' => get_user_meta($user_id, 'last_name', true),
		'%user_org_name%' => get_user_meta($user_id, 'org_name', true),
		'%user_inn%' => get_user_meta($user_id, 'inn_name', true),
		'%user_city%' => get_user_meta($user_id, 'city_name', true),
		'%user_phone%' => get_user_meta($user_id, 'phone_name', true),
		'%user_hobby%' => get_user_meta($user_id, 'hobby_name', true),
		'%user_shop%' => get_user_meta($user_id, 'shop_name', true),
		'%user_manager%' => get_user_meta($user_id, 'manage_name', true)
		);
	$replacements = array_merge($replacements, $user_meta_vars);
	return $replacements;
}
add_filter( 'tml_replace_vars', 'replace_user_meta_vars', 10, 2);
?>