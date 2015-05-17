<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.anuragsingh.me/
 * @since      1.0.0
 *
 * @package    WP_Admin_Customizer
 * @subpackage WP_Admin_Customizer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Admin_Customizer
 * @subpackage WP_Admin_Customizer/admin
 * @author     Anurag Singh <contact@anuragsingh.me>
 */
class WP_Admin_Customizer_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in WP_Admin_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Admin_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name.'bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'admin-customizer', plugin_dir_url( __FILE__ ) . 'css/wordpress-admin-customizer-admin.css', array(), $this->version, 'all' );

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
		 * defined in WP_Admin_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Admin_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wordpress-admin-customizer-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
   	* Add favicon on website
   	*
   	* @since    1.0.0
   	*/
	function add_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_site_url().'/favicon.ico" />';
	}

	/**
   * Update Website developer logo
   *
   * @since    1.0.0
   */
	function update_site_developer_logo_on_wp_login_form() {
	$site_developer_logo_url = plugins_url( 'img/rns-logo.png' , __FILE__ ) ;
	$admin_screen_bg = plugins_url( 'img/pattern-1.png' , __FILE__ ) ;
		echo"   <style type='text/css'>
		        body.login div#login h1 a {
					background: url($site_developer_logo_url);
					background-repeat:no-repeat;
					background-position:center center;
					background-color:#FFFFFF;
					width:310px;
					height:65px;
					background-size:310px 62px;
		            padding: 5px;
					border:1px solid #000;
		        }
		        body.login {
		        	background: url($admin_screen_bg);
		        	background-repeat:repeat;
					background-position:left top;
					background-color:#fff;
		        }
		    </style>
		 ";
	}
	


	/**
   * Update Website developer URL
   *
   * @since    1.0.0
   */
	function update_site_developer_logo_url_on_wp_login_form() {
		$site_developer = 'http://www.rnswebtech.com/';
	    return $site_developer;
	}
	

	/**
   * Update Website developer 'title' tag for logo
   *
   * @since    1.0.0
   */
	function update_site_developer_logo_title_on_wp_login_form() {
	    return 'RNS Webtech';
	}
	

	/**
   * Add a custom header for wordpress login page
   *
   * @since    1.0.0
   */	
	function add_header_on_wp_login_page() {
	echo '	
	<div class="bg-header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#rns-navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">
						<img class="img-responsive" title="RNS Webtech" alt="RNS Webtech" src="' . plugins_url( 'img/rns-logo.png' , __FILE__ ) . '" >
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="rns-navbar">
					<ul class="nav navbar-nav navbar-right">
				        <li><a href="wp-login.php">Login</a></li>
				        <li><a href="wp-login.php?action=lostpassword">Forget Password</a></li>
				        <li><a href="https://a2plcpnl0063.prod.iad2.secureserver.net:2096/" target="_blank">Official Email</a></li>			        
			      	</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>	
	</div>	
	';
	}

	/**
   * Register custom post type 'rns_wp_customizer'
   *
   * @since    1.0.0
   */


 	function remove_support_()
	{ 
	  remove_post_type_support('page', 'comments');
	}

	/**
   * Customize the top menu bar in admin screen
   *
   * @since    1.1.0
   */
	function remove_admin_bar_links_from_top() {
		global $wp_admin_bar, $current_user;
 
		// Remove links for all users
		$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
			$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
			$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
			$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
			$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link

		// Remove links for perticular users
		if ($current_user->ID != 1) {  // here '1' is used for admin
			
			$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
			//$wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
			//$wp_admin_bar->remove_menu('view-site');        // Remove the view site link
			$wp_admin_bar->remove_menu('updates');          // Remove the updates link
			$wp_admin_bar->remove_menu('comments');         // Remove the comments link
			$wp_admin_bar->remove_menu('new-content');      // Remove the content link
			// $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
			// $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
		}
	}

	/**
   * Remove the code editing functionality from WP admin screen
   *
   * @since    1.1.0
   */
	function disable_coding_editor() {
      	define('DISALLOW_FILE_EDIT', TRUE);
  	}


	/**
   * Customize the left menu bar in admin screen
   *
   * @since    1.1.0
   */
	/**
   * Customize the left Menu and Submenu sidebar in admin screen
   *
   * @since    1.1.0
   */
	function remove_menus_from_leftside(){

		global $submenu;
		global $current_user;
      	get_currentuserinfo();

		if (is_user_logged_in()) {							# Check user is loged in			

			if ($current_user->user_login !== 'anuragsingh' )  {
				remove_menu_page( 'tools.php' );
				remove_menu_page( 'plugins.php' );
				//remove_menu_page( 'themes.php' );
				remove_menu_page( 'options-general.php' );
				remove_menu_page('edit-comments.php');
	

				//Dashboard menu
				//unset($submenu['index.php'][10]); // Removes Updates

				//Posts menu
				unset($submenu['edit.php'][5]); // Leads to listing of available posts to edit
				unset($submenu['edit.php'][10]); // Add new post
				unset($submenu['edit.php'][15]); // Remove categories
				unset($submenu['edit.php'][16]); // Removes Post Tags

				//Media Menu
				unset($submenu['upload.php'][5]); // View the Media library
				unset($submenu['upload.php'][10]); // Add to Media library

				//Links Menu
				unset($submenu['link-manager.php'][5]); // Link manager
				unset($submenu['link-manager.php'][10]); // Add new link
				unset($submenu['link-manager.php'][15]); // Link Categories

				//Pages Menu
				unset($submenu['edit.php?post_type=page'][5]); // The Pages listing
				unset($submenu['edit.php?post_type=page'][10]); // Add New page

				//Appearance Menu
				unset($submenu['themes.php'][5]); 		// Removes 'Themes'
				unset($submenu['themes.php'][6]); 		// Removes 'Customize'
				// unset($submenu['themes.php'][7]); 		// Widgets
				// unset($submenu['themes.php'][10]); 		// Removes Menu
				unset($submenu['themes.php'][15]); 		// Removes Theme Installer tab
				unset($submenu['themes.php'][20]); 		// Removes Background 
						

				//Plugins Menu
				// unset($submenu['plugins.php'][5]); // Plugin Manager
				// unset($submenu['plugins.php'][10]); // Add New Plugins
				// unset($submenu['plugins.php'][15]); // Plugin Editor

				//Users Menu
				unset($submenu['users.php'][5]); // Users list
				unset($submenu['users.php'][10]); // Add new user
				//unset($submenu['users.php'][15]); // Edit your profile

				//Tools Menu
				// unset($submenu['tools.php'][5]); // Tools area
				// unset($submenu['tools.php'][10]); // Import
				// unset($submenu['tools.php'][15]); // Export
				// unset($submenu['tools.php'][20]); // Upgrade plugins and core files

				//Settings Menu
				//unset($submenu['options-general.php'][10]); // General Options
				// unset($submenu['options-general.php'][15]); // Writing
				// unset($submenu['options-general.php'][20]); // Reading
				// unset($submenu['options-general.php'][25]); // Discussion
				// unset($submenu['options-general.php'][30]); // Media
				// unset($submenu['options-general.php'][35]); // Privacy
				// unset($submenu['options-general.php'][40]); // Permalinks
				// unset($submenu['options-general.php'][45]); // Misc
			}

		}
	}

	/*
   * Add extra fields on user profile page
   * ref- http://wordpressapi.com/add-custom-fields-to-user-profile-wordpress-without-plugin/
   * @since    1.1.0
   */	function extra_fields_to_user( $user ) { ?>
	 <h3>Extra profile information</h3>
	<table class="form-table">
		<tbody>
		    <tr>
		        <th>
		            <label for="facebook">Facebook</label>
		        </th>
		        <td>
		            <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" />
		            <br />
		            <p class="description">Please enter your facebook username.</p>
		        </td>
		    </tr>

		    <tr>
		        <th>
		            <label for="twitter">Twitter</label>
		        </th>
		        <td>
		            <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" />
		            <br />
		            <p class="description">Please enter your twitter username.</p>
		        </td>
		    </tr>

		    <tr>
		        <th>
		            <label for="linkedin">Linkedin</label>
		        </th>
		        <td>
		            <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" />
		            <br />
		            <p class="description">Please enter your linkedin username.</p>
		        </td>
		    </tr>

		    <tr>
		        <th>
		            <label for="designation">Designation</label>
		        </th>
		        <td>
		            <input type="text" name="designation" id="designation" value="<?php echo esc_attr( get_the_author_meta( 'designation', $user->ID ) ); ?>" />
		            <br />
		            <p class="description">Please enter your designation.</p>
		        </td>
		    </tr>
	    </tbody>
	</table>

	<?php }
	function extra_fields_to_user_save( $user_id ) {
	 if ( !current_user_can( 'edit_user', $user_id ) )
	 return false;
	 /* Copy and paste this line for additional fields. Make sure to change 'facebook' to the field ID. */
	 update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	 update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	 update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
	 update_usermeta( $user_id, 'designation', $_POST['designation'] );
	}
}
