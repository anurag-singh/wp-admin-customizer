<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.anuragsingh.me/
 * @since      1.0.0
 *
 * @package    WP_Admin_Customizer
 * @subpackage WP_Admin_Customizer/includes
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
 * @package    WP_Admin_Customizer
 * @subpackage WP_Admin_Customizer/includes
 * @author     Anurag Singh <contact@anuragsingh.me>
 */
class WP_Admin_Customizer {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WP_Admin_Customizer_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

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

		$this->plugin_name = 'wp-admin-customizer';
		$this->version = '1.0.0';

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
	 * - WP_Admin_Customizer_Loader. Orchestrates the hooks of the plugin.
	 * - WP_Admin_Customizer_i18n. Defines internationalization functionality.
	 * - WP_Admin_Customizer_Admin. Defines all hooks for the admin area.
	 * - WP_Admin_Customizer_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-admin-customizer-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-admin-customizer-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-admin-customizer-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-admin-customizer-public.php';

		$this->loader = new WP_Admin_Customizer_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WP_Admin_Customizer_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WP_Admin_Customizer_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

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

		$plugin_admin = new WP_Admin_Customizer_Admin( $this->get_plugin_name(), $this->get_version() );

		//$this->loader->add_action( 'login_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		
		$this->loader->add_action('login_enqueue_scripts', $plugin_admin, 'update_site_developer_logo_on_wp_login_form' );
		$this->loader->add_action('wp_head', $plugin_admin, 'add_favicon');
		$this->loader->add_action('login_headerurl', $plugin_admin, 'update_site_developer_logo_url_on_wp_login_form' );
		$this->loader->add_action('login_headertitle', $plugin_admin, 'update_site_developer_logo_title_on_wp_login_form' );
		$this->loader->add_action('login_head', $plugin_admin, 'add_header_on_wp_login_page' );
		$this->loader->add_action('wp_before_admin_bar_render', $plugin_admin, 'remove_admin_bar_links_from_top');
		$this->loader->add_action('admin_menu', $plugin_admin, 'remove_menus_from_leftside' );
		$this->loader->add_action('init', $plugin_admin, 'disable_coding_editor');
		#$this->loader->add_filter('modify_user_profile', $plugin_admin, 'add_extra_fields_to_user_profile');

		$this->loader->add_action( 'show_user_profile', $plugin_admin, 'extra_fields_to_user' );
		$this->loader->add_action( 'edit_user_profile', $plugin_admin, 'extra_fields_to_user' );
		$this->loader->add_action( 'personal_options_update', $plugin_admin, 'extra_fields_to_user_save' );
		$this->loader->add_action( 'edit_user_profile_update', $plugin_admin, 'extra_fields_to_user_save' );



	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WP_Admin_Customizer_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

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
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    WP_Admin_Customizer_Loader    Orchestrates the hooks of the plugin.
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
