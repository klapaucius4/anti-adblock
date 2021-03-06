<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://michalkowalik.pl
 * @since      1.0.0
 *
 * @package    Anti_AdBlock
 * @subpackage Anti_AdBlock/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Anti_AdBlock
 * @subpackage Anti_AdBlock/public
 * @author     Michał Kowalik <kontakt@michalkowalik.pl>
 */

const BROWSER_LIST = array(
	'chrome',
	'firefox',
	'ie',
	'edge',
	'opera',
	'safari',
	'android'
);

const EXTENSION_LIST = array(
	'abp',
	'adblock',
	'ublock',
	'adguard',
	'ghostery',
	'nano',
);

 
class Anti_AdBlock_Public {

	private $plugin_name;

	private $plugin_slug;

	private $version;

	public $plugin_location;

	public $browser;
	public $browser_slug;

	private $options;
	
	public function __construct( $plugin_name, $plugin_slug, $version ) {

		$this->plugin_name = $plugin_name;

		$this->plugin_slug = $plugin_slug;
		
		$this->version = $version;

		$this->plugin_location = plugin_dir_url(dirname(__FILE__));

		$this->options = get_option($this->plugin_slug);

		$this->init_browser();
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
		 * defined in Anti_AdBlock_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Anti_AdBlock_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_slug, plugin_dir_url( __FILE__ ) . 'css/adbp.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Anti_AdBlock_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Anti_AdBlock_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 
	}

	public function plugin_footer() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/anti-adblock-public-display.php';
	}



	private function init_browser(){
		require_once plugin_dir_path( __FILE__ ) . '../lib/Browser.php';
		$browser = new Browser();
		$this->browser = $browser;
		$this->browser_slug = sanitize_title($this->browser->getBrowser());
		// return $browser->getBrowser();
	}

}
