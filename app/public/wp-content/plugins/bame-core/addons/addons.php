<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Bame Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Bame_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'bame_regsiter_widget_scripts' ] );
		// add_action( 'elementor/frontend/before_register_scripts', [ $this, 'bame_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'bame_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bame' ),
			'<strong>' . esc_html__( 'Bame Core', 'bame' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bame' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bame' ),
			'<strong>' . esc_html__( 'Bame Core', 'bame' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bame' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bame' ),
			'<strong>' . esc_html__( 'Bame Core', 'bame' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bame' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		$widget_register = \Elementor\Plugin::instance()->widgets_manager;

		// Header Include file & Widget Register
		require_once( BAME_ADDONS . '/header/header.php' );
		require_once( BAME_ADDONS . '/header/header2.php' );
		require_once( BAME_ADDONS . '/header/header3.php' );

		$widget_register->register ( new \Bame_Header() );
		$widget_register->register ( new \Bame_Header2() );
		$widget_register->register ( new \Bame_Header3() );


		// Include All Widget Files
		foreach($this->Bame_Include_File() as $widget_file_name){
			require_once( BAME_ADDONS . '/widgets/bame-'."$widget_file_name".'.php' );
		}
		// All Widget Register
		foreach($this->Bame_Register_File() as $name){
			$widget_register->register ( $name );
		}
		
	}

	public function Bame_Include_File(){
		return [
			'banner2', 
			'section-title', 
			'button', 
			'blog', 
			'service', 
			'testimonial', 
			'team', 
			'team-info', 
			'image', 
			'contact-info', 
			'contact-form', 
			'counterup', 
			'faq', 
			'brand-logo', 
			'cta', 
			'gallery', 
			'info-box', 
			'service-list', 
			'product',
			'product-filter',
			'newsletter', 
			'menu-select', 
			'game', 
			'game-filter', 
			'tournament', 
			'tournament-widgets', 
			'tournament-team', 
			'footer-widgets', 
			'point-table',

			'social',
			'gallery-filter', 
			'animated-shape', 
			'arrows', 
			'tab-builder', 
			'skill', 
			'step', 
			'features', 
			'video', 
			'price',
			'choose',
			'download',
			'countdown',
			'commando',
		];
	}

	public function Bame_Register_File(){
		return [
			new \Bame_Banner2() ,
			new \Bame_Section_Title(),
			new \Bame_Button(),
			new \Bame_Blog(),
			new \Bame_Service(),
			new \Bame_Testimonial(),
			new \Bame_Team(),
			new \Bame_Team_info(),
			new \Bame_Image(),
			new \Bame_Contact_Info(),
			new \Bame_Contact_Form(),
			new \Bame_Counterup(),
			new \Bame_Faq(),
			new \Bame_Brand_Logo(),
			new \Bame_Cta(),
			new \Bame_Gallery(),
			new \Bame_Info_Box(),
			new \bame_Service_List(),
			new \Bame_Product(),
			new \Bame_Product_Filter(),
			new \bame_Newsletter(),
			new \Bame_Menu(),
			new \Bame_Game(),
			new \Bame_Game_Filter(),
			new \Bame_Tournament(),
			new \Bame_Tournament_Widgets(),
			new \Bame_Tournament_Team(),
			new \Bame_Footer_Widgets(),
			new \Bame_Point_Table(),

			new \Bame_Social(),
			new \Bame_Gallery_Filter(),
			new \Bame_Animated_Shape(),
			new \Bame_Arrows(),
			new \Bame_Tab_Builder(),
			new \bame_Skill(),
			new \bame_Step(),
			new \Bame_Features(),
			new \Bame_Video(),
			new \Bame_Price(),
			new \Bame_Choose(),
			new \bame_Download(),
			new \Bame_Countdown(), 
			new \Bame_Commando(), 
		];
	}

    public function widget_scripts() {

        // wp_enqueue_script(
        //     'bame-frontend-script',
        //     BAME_PLUGDIRURI . 'assets/js/bame-frontend.js',
        //     array('jquery'),
        //     false,
        //     true
		// );

	}


    function bame_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'bame',
            [
                'title' => __( 'Bame', 'bame' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'bame_footer_elements',
            [
                'title' => __( 'Bame Footer Elements', 'bame' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'bame_header_elements',
            [
                'title' => __( 'Bame Header Elements', 'bame' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Bame_Extension::instance();