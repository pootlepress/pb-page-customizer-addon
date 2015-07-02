<?php

class PPB_Page_Customizer_Addon{

	/**
	 * PPB_Page_Customizer_Addon Instance of main plugin class.
	 *
	 * @var 	object PPB_Page_Customizer_Addon
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * The token.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public static $token;
	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public static $version;

	/**
	 * Pootle PB Page Customizer Add-on plugin directory URL.
	 *
	 * @var 	string Plugin directory
	 * @access  private
	 * @since 	1.0.0
	 */
	public static $url;

	/**
	 * Pootle PB Page Customizer Add-on plugin directory Path.
	 *
	 * @var 	string Plugin directory
	 * @access  private
	 * @since 	1.0.0
	 */
	public static $path;

	/**
	 * Main Pootle PB Page Customizer Add-on Instance
	 *
	 * Ensures only one instance of Storefront_Extension_Boilerplate is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @return PPB_Page_Customizer_Addon instance
	 */
	public static function instance() {
		if ( null == self::$_instance ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	} // End instance()

	/**
	 * Constructor function.
	 *
	 * @access  private
	 * @since   1.0.0
	 */
	private function __construct() {

		self::$token =     'ppb-addon-boilerplate';
		self::$url =       plugin_dir_url( __FILE__ );
		self::$path =      plugin_dir_path( __FILE__ );
		self::$version =   '1.0.0';

		add_action( 'init', array( $this, 'init' ) );
	} // End __construct()

	public function init() {

		if ( class_exists( 'Pootle_Page_Builder' ) ) {

			$this->add_actions();
			$this->add_filters();
		}
	} // End init()

	private function add_actions() {

		//Adding front end JS and CSS in /assets folder
		add_action( 'pootlepb_enqueue_admin_scripts', array( $this, 'enqueue' ) );
		add_action( 'pootlepb_metabox_end', array( $this, 'ppb_page_customizer_meta_additions', ) );
	} // End add_actions()

	private function add_filters() {

		//Add Pootle Page Builder Filter hooks here
	} // End add_filters()

	public function pb_metabox_additions() {
		global $post;
		$pageSettings = get_post_meta( $post->ID, 'pootlepage-page-settings', true );
		if ( empty( $pageSettings ) ) {
			$pageSettings = '{}';
		}

		$hideElements = get_post_meta( $post->ID, 'pootlepage-hide-elements', true );
		if ( empty( $hideElements ) ) {
			$hideElements = '{}';
		}
		?>
		<input type="hidden" id="page-settings" name="page-settings" value="<?php esc_attr_e( $pageSettings ) ?>"/>
		<input type="hidden" id="hide-elements" name="hide-elements" value="<?php esc_attr_e( $hideElements ) ?>"/>

		<div id="hide-element-dialog" data-title="<?php esc_attr_e( 'Hide Elements', 'ppb-panels' ) ?>" class="panels-admin-dialog">
			<?php
			$hideElementsFields = ppb_pc_hide_elements_fields();
			pootlepb_hide_elements_dialog_echo( $hideElementsFields );
			?>
		</div>
		<div id="page-setting-dialog" data-title="<?php esc_attr_e( 'Page Settings', 'ppb-panels' ) ?>"
		     class="panels-admin-dialog">
			<?php
			$pageSettingsFields = ppb_pc_page_settings_fields();
			pootlepb_dialog_form_echo( $pageSettingsFields );
			?>
		</div>
	<?php
	}

	public function enqueue() {
		$token = self::$token;
		$url = self::$url;

		wp_enqueue_style( $token . '-css', $url . '/assets/admin.css' );
		wp_enqueue_script( $token . '-js', $url . '/assets/admin.js', array( 'jquery' ) );
	} // End enqueue()

}