<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ncoa.com.au
 * @since      1.0.0
 *
 * @package    Fifty_Fifty
 * @subpackage Fifty_Fifty/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fifty_Fifty
 * @subpackage Fifty_Fifty/admin
 * @author     Rohan <rohan@actac.com.au>
 */
class Fifty_Fifty_Admin
{

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
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Settings page
		add_action('admin_menu', array($admin_instance, 'add_settings_page'));
		add_action('admin_init', array($admin_instance, 'register_settings'));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fifty_Fifty_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fifty_Fifty_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/fifty-fifty-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fifty_Fifty_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fifty_Fifty_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/fifty-fifty-admin.js', array('jquery'), $this->version, false);
	}

	public function add_settings_page()
	{
		add_options_page(
			'Fifty Fifty Settings', // Page title
			'Fifty Fifty',          // Menu title
			'manage_options',       // Capability
			'fifty_fifty_settings', // Menu slug
			array($this, 'render_settings_page') // Callback
		);
	}

	public function register_settings()
	{
		register_setting('fifty_fifty_settings_group', 'fifty_fifty_option_example');
	}

	public function render_settings_page()
	{
?>
		<div class="wrap">
			<h1>Fifty Fifty Settings</h1>
			<form method="post" action="options.php">
				<?php
				settings_fields('fifty_fifty_settings_group');
				do_settings_sections('fifty_fifty_settings_group');
				?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Example Option</th>
						<td>
							<input type="text" name="fifty_fifty_option_example" value="<?php echo esc_attr(get_option('fifty_fifty_option_example')); ?>" />
						</td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
<?php
	}
}
