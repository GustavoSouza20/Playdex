<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "bame_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }


    $alowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array()
    );


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        // 'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Bame Options', 'bame' ),
        'page_title'           => esc_html__( 'Bame Options', 'bame' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'bame' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'bame' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'bame' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'bame' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'bame' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */


    // -> START General Fields

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'bame' ),
        'id'               => 'bame_general',
        'customizer_width' => '450px',
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'    => 'theme_1',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Cursor Style', 'bame'),
            ),
            array(
                'id'       => 'bame_display_cursor',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cursor Circle effect Display?', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display cursor effect apply', 'bame' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'bame' ),
                'off'      => esc_html__( 'Disabled', 'bame' ),
            ),
            array(
                'id'       => 'bame_display_cursor_image',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cursor Image  Display?', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display cursor Image apply', 'bame' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'bame' ),
                'off'      => esc_html__( 'Disabled', 'bame' ),
            ),
            array(
                'id'    => 'theme_2',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Global Color', 'bame'),
            ),
            array(
                'id'       => 'bame_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color', 'bame' ),
            ),
            array(
                'id'       => 'bame_theme_color2',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color 2', 'bame' ),
            ),
            array(
                'id'       => 'bame_theme_color3',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color 3', 'bame' ),
            ),
            array(
                'id'       => 'bame_heading_color',
                'type'     => 'color',
                // 'title'    => esc_html__( 'Heading Color (H1-H6)', 'bame' ), 
                'title'    => esc_html__( 'Title Color (--title-color)', 'bame' ),
            ),
            array(
                'id'       => 'bame_white_color',
                'type'     => 'color',
                'title'    => esc_html__( 'White Color (--white-color)', 'bame' ),
            ),
            array(
                'id'       => 'bame_body_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Color (Default Text Color)', 'bame' ),
            ),
            array(
                'id'       => 'bame_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Links Color', 'bame' ), 
                'output'   => array( 'color'    =>  'a' ),
            ),
   
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'bame' ),
        'id'               => 'bame_typography',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bame_theme_body_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font Family', 'bame' ),
                'subtitle' => esc_html__( 'Default font: Poppins. If need change font', 'bame' ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'       => 'bame_theme_heading_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading Font Family', 'bame' ),
                'subtitle' => esc_html__( 'Default font: Rajdhani. If need change font', 'bame' ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'       => 'bame_theme_war_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Style Font Family', 'bame' ),
                'subtitle' => esc_html__( 'Default font: warPriest. If need change font', 'bame' ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'       => 'bame_theme_war2_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Style Font 2 Family', 'bame' ),
                'subtitle' => esc_html__( 'Default font: warPriest3d. If need change font', 'bame' ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''), 
            ),
            array(
                'id'       => 'bame_theme_war3_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Style Font 3 Family', 'bame' ),
                'subtitle' => esc_html__( 'Default font: Goldman. If need change font', 'bame' ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'    => 'info_11',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Heading Fonts', 'bame'),
            ),
            array(
                'id'       => 'bame_theme_h1_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H1 Font', 'bame' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h1'),
            ),
            array(
                'id'       => 'bame_theme_h2_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H2 Font', 'bame' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h2'),
            ),
            array(
                'id'       => 'bame_theme_h3_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H3 Font', 'bame' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h3'),
            ),
            array(
                'id'       => 'bame_theme_h4_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H4 Font', 'bame' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h4'),
            ),
            array(
                'id'       => 'bame_theme_h5_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H5 Font', 'bame' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h5'),
            ),
            array(
                'id'       => 'bame_theme_h6_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H6 Font', 'bame' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h6'),
            ),
            array(
                'id'    => 'info_22',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Paragraph Fonts', 'bame'),
            ),
            array(
                'id'       => 'bame_theme_p_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'P Font', 'bame' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('p'),
            ),
           
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back To Top', 'bame' ),
        'id'               => 'bame_backtotop',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bame_display_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back To Top Button', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display back to top button.', 'bame' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'bame' ),
                'off'      => esc_html__( 'Disabled', 'bame' ),
            ),
            array(
                'id'       => 'bame_bcktotop_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Icon Color', 'bame' ),
                'required' => array('bame_display_bcktotop','equals','1'),
                'output'   => array( '--title-color' =>'.scroll-top:after' ),
            ),
            array(
                'id'       => 'bame_bcktotop_border_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Border Color', 'bame' ),
                'required' => array('bame_display_bcktotop','equals','1'),
                'output'   => array( '--theme-color' =>'.scroll-top:after' ),
            ),
            array(
                'id'       => 'bame_bcktotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'bame' ),
                'required' => array('bame_display_bcktotop','equals','1'),
                'output'   => array( 'background-color' =>'.scroll-top svg' ),
            ),
            array(
                'id'       => 'bame_bcktotop_circle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Circle Scroll Color', 'bame' ),
                'required' => array('bame_display_bcktotop','equals','1'),
                'output'   => array( '--title-color' =>'.scroll-top .progress-circle path' ),
            ),
           
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'bame' ),
        'id'               => 'bame_preloader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bame_display_preloader', 
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'bame' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'bame' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','bame'),
                'off'      => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_preloader_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Preloader Image', 'bame' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your preloader image ( recommendation png or svg format ).', 'bame' ),
                'required' => array( 'bame_display_preloader', 'equals', '1' )
            ),
            array(
                'id'       => 'bame_preloader_btn_text', 
                'type'     => 'text',
                'rows'     => 2,
                'validate' => 'html',
                'default'  => esc_html__( 'Cancel Preloader', 'bame' ),
                'title'    => esc_html__( 'Preloader Cancel Button Text', 'bame' ),
                'required' => array( 'bame_display_preloader', 'equals', '1' ),
            ),
        )
    ));

    /* End General Fields */

    /* Admin Lebel Fields */
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Admin Label', 'bame' ),
        'id'                => 'bame_admin_label',
        'customizer_width'  => '450px',
        'subsection'        => true,
        'fields'            => array(
            array(
                'title'     => esc_html__( 'Admin Login Logo', 'bame' ),
                'subtitle'  => esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'bame' ),
                'id'        => 'bame_admin_login_logo',
                'type'      => 'media',
            ),
            array(
                'title'     => esc_html__( 'Custom CSS For admin', 'bame' ),
                'subtitle'  => esc_html__( 'Any CSS your write here will run in admin.', 'bame' ),
                'id'        => 'bame_theme_admin_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'theme'     => 'chrome',
                'full_width'=> true,
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'bame' ),
        'id'               => 'bame_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'bame_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"   => esc_html__('Prebuilt','bame'),
                    "2"      => esc_html__('Header Builder','bame'),
                ),
                'title'    => esc_html__( 'Header Options', 'bame' ),
                'subtitle' => esc_html__( 'Select header options.', 'bame' ),
            ),
            array(
                'id'       => 'bame_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'bame_header',
                    'posts_per_page' => -1,
                ),
                'title'    => esc_html__( 'Header', 'bame' ),
                'subtitle' => esc_html__( 'Select header.', 'bame' ),
                'required' => array( 'bame_header_options', 'equals', '2' )
            ),
            array(
                'id'       => 'bame_header_search_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'bame' ),
                'off'      => esc_html__( 'Hide', 'bame' ),
                'title'    => esc_html__( 'Show Search Icon?', 'bame' ),
                'subtitle' => esc_html__( 'Click Show To Display Search Icon?', 'bame'),
                'required' => array( 'bame_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'bame_offcanvas_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'bame' ),
                'off'      => esc_html__( 'Hide', 'bame' ),
                'title'    => esc_html__( 'Show Offcanvas Show?', 'bame' ),
                'subtitle' => esc_html__( 'Click Show To Display Offcanvas?', 'bame'),
                'required' => array( 'bame_header_options', 'equals', '1' ),
            ),
            array(
                'id'       => 'bame_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Request a quote', 'bame' ),
                'title'    => esc_html__( 'Button Text', 'bame' ),
                'required' => array( 'bame_header_options', 'equals', '1' ),
            ),
            array(
                'id'       => 'bame_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'bame' ),
                'title'    => esc_html__( 'Button URL?', 'bame' ),
                'required' => array( 'bame_header_options', 'equals', '1' ),
            ),
    
          
        ),
    ) );
    // -> END Basic Fields

    // -> START Header Logo
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Logo', 'bame' ),
        'id'               => 'bame_header_logo_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bame_site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'bame' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site logo for header ( recommendation png format ).', 'bame' ),
            ),
            array(
                'id'       => 'bame_site_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'bame'),
                'output'   => array('.header-logo .logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'bame'),
            ),
            array(
                'id'       => 'bame_site_logomargin_dimensions',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'output'   => array('.header-logo .logo img'),
                'units_extended' => 'false',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Top and Bottom Margin.', 'bame'),
                'left'     => false,
                'right'    => false,
                'subtitle' => esc_html__('Set logo top and bottom margin.', 'bame'),
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'bame_text_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Text Logo', 'bame' ),
                'subtitle' => esc_html__( 'Write your logo text use as logo ( You can use span tag for text color ).', 'bame' ),
            )
        )
    ) );
    // -> End Header Logo

    // -> START Header Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Style', 'bame' ),
        'id'               => 'bame_header_menu_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'    => 'sticky_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Header Sticky On/Off', 'bame'),
            ),
            array(
                'id'       => 'bame_header_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Sticky ON/OFF', 'bame' ),
                'subtitle' => esc_html__( 'ON / OFF Header Sticky ( Default settings ON ).', 'bame' ),
                'default'  => '1',
                'on'       => 'ON',
                'off'      => 'OFF',
            ),
            array(
                'id'    => 'info_32',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Navbar Sub-menu Icon', 'bame'),
            ),
            array(
                'id'       => 'bame_menu_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Navbar Sub-menu Icon Hide/Show', 'bame' ),
                'subtitle' => esc_html__( 'Hide / Show menu icon ( Default settings SHOW ).', 'bame' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'bame_menu_icon_class',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'f11b', 'bame' ),
                'title'    => esc_html__( 'Sub Menu Icon', 'bame' ),
                'subtitle' => esc_html__( 'If you change icon need to use Font-Awesome Unicode icon ( Example: f11b | e00d ).', 'bame' ),
                'required' => array( 'bame_menu_icon', 'equals', '1' )
            ),
            array(
                'id'    => 'info_2',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Background', 'bame'),
            ),
            array(
                'id'       => 'bame_header_logo_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Logo Backgound', 'bame' ),
                'output'   => array( 'background-color'    =>  '.prebuilt .logo-bg' ),
            ),
            array(
                'id'       => 'bame_header_menu_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Menu Backgound', 'bame' ),
                'output'   => array( 'background-color'  =>  '.prebuilt .menu-area' ),
            ),
            array(
                'id'    => 'info_3',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Menu Style', 'bame'),
            ),
            array(
                'id'       => 'bame_header_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'bame' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu>ul>li>a' ),
            ),
            array(
                'id'       => 'bame_header_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'bame' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu>ul>li>a:hover' ),
            ),
            array(
                'id'       => 'bame_header_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Submenu Color', 'bame' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu ul.sub-menu li a' ),
            ),
            array(
                'id'       => 'bame_header_submenu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Hover Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Submenu Hover Color', 'bame' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu ul.sub-menu li a:hover' ),
            ),
            array(
                'id'       => 'bame_header_submenu_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Icon Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Icon Hover Color', 'bame' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu ul.sub-menu li a:before, .prebuilt .main-menu ul li.menu-item-has-children > a:after' ),
            ),
            array(
                'id'    => 'info_4',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Button Style', 'bame'),
            ),
            array(
                'id'       => 'bame_btn_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Header Button Color', 'bame' ),
                'output'   => array( 'color'    =>  '.prebuilt .th_btn' ), 
            ),
            array(
                'id'       => 'bame_btn_line_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Line Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Button Hover Color', 'bame' ),
                'output'   => array( 'background-color'    =>  '.prebuilt .th_btn:before, .prebuilt .th_btn:after' ),
            ),
            array(
                'id'       => 'bame_btn_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background', 'bame' ),
                'subtitle' => esc_html__( 'Set Button Background Color', 'bame' ),
                'output'   => array( 'background'    =>  '.prebuilt .th_btn' ),
            ),
            array(
                'id'       => 'bame_btn_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Button Hover Color', 'bame' ),
                'output'   => array( 'color'    =>  '.prebuilt .th_btn:hover' ),
            ),
            array(
                'id'       => 'bame_btn_bg_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Background', 'bame' ),
                'subtitle' => esc_html__( 'Set Button Background Hover Color', 'bame' ),
                'output'   => array( 'background'  =>  '.prebuilt .th_btn:hover'),
            ),
            array(
                'id'       => 'bame_btn_line_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Line Hover Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Button Hover Color', 'bame' ),
                'output'   => array( 'background-color' =>  '.prebuilt .th_btn:hover:before, .prebuilt .th_btn:hover:after' ),
            ),


        )
    ) );
    // -> End Header Menu

     // -> START Mobile Menu
     Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mobile Menu', 'bame' ), 
        'id'               => 'bame_mobile_menu_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bame_menu_menu_show',
                'type'     => 'switch',
                'title'    => esc_html__( 'Mobile Logo Hide/Show', 'bame' ),
                'subtitle' => esc_html__( 'Hide / Show mobile menu logo ( Default settings SHOW ).', 'bame' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'bame_mobile_logo', 
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'bame' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your mobile logo for mobile menu ( recommendation png format ).', 'bame' ),
                'required' => array( 
                    array('bame_menu_menu_show','equals','1') 
                )
            ),
            array(
                'id'       => 'bame_mobile_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'bame'),
                'output'   => array('.th-menu-wrapper .mobile-logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'bame'),
                'required' => array( 
                    array('bame_menu_menu_show','equals','1') 
                )
            ),
            array(
                'id'       => 'bame_mobile_menu_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Logo Background', 'bame' ),
                'output'   => array( 'background-color'    =>  '.th-menu-wrapper .mobile-logo' ),
                'required' => array( 
                    array('bame_menu_menu_show','equals','1') 
                )
            ),
            array(
                'id'       => 'bame_mobile_menu_bg2',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Background', 'bame' ),
                'output'   => array( 'background-color'    =>  '.th-menu-wrapper .th-menu-area' ),
                'required' => array( 
                    array('bame_menu_menu_show','equals','1') 
                )
            ),
    
        )
    ) );
    // -> End Mobile Menu


     // -> START Offcanvas Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Offcanvas', 'bame' ),
        'id'               => 'bame_offcanvas_panel',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bame_offcanvas_panel_bg3',
                'type'     => 'background',
                'title'    => esc_html__( 'Offcanvas Panel Background', 'bame' ),
                'output'   => array('.sidemenu-wrapper .sidemenu-content'),
                // 'output'   => array( '--title-color'  =>  '.sidemenu-wrapper .sidemenu-content'),
                // 'default'  => array(
                //     'background-color' => '#1b1b1b',
                // )
            ),

        )
    ) );
    // -> End Offcanvas

    // -> START Blog Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'bame' ),
        'id'         => 'bame_blog_page',
        'icon'  => 'el el-blogger',
        'fields'     => array(

            array(
                'id'       => 'bame_blog_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'bame' ),
                'subtitle' => esc_html__( 'Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'bame' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'bame_blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Column', 'bame' ),
                'subtitle' => esc_html__( 'Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'bame' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/1column.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2column.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3column.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'bame_blog_page_title_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__('Show','bame'),
                'off'      => esc_html__('Hide','bame'),
                'title'    => esc_html__('Blog Page Title', 'bame'),
                'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'bame'),
            ),
            array(
                'id'       => 'bame_blog_page_title_setting',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Page Title Setting', 'bame'),
                'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'bame'),
                'options'  => array(
                    "predefine"   => esc_html__('Default','bame'),
                    "custom"      => esc_html__('Custom','bame'),
                ),
                'default'  => 'predefine',
                'required' => array("bame_blog_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'bame_blog_page_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Custom Title', 'bame'),
                'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'bame'),
                'required' => array('bame_blog_page_title_setting','equals','custom')
            ),
            array(
                'id'            => 'bame_blog_postExcerpt',
                'type'          => 'slider',
                'title'         => esc_html__('Blog Posts Excerpt', 'bame'),
                'subtitle'      => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'bame'),
                "default"       => 25,
                "min"           => 0,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'bame_blog_readmore_setting',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Read More Text Setting', 'bame' ),
                'subtitle' => esc_html__( 'Control read more text from here.', 'bame' ),
                'options'  => array(
                    "default"   => esc_html__('Default','bame'),
                    "custom"    => esc_html__('Custom','bame'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'bame_blog_custom_readmore',
                'type'     => 'text',
                'title'    => esc_html__('Read More Text', 'bame'),
                'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'bame'),
                'required' => array('bame_blog_readmore_setting','equals','custom')
            ),
            array(
                'id'       => 'bame_blog_title_color',
                'output'   => array( '.th-blog .blog-title a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Blog Title Color.', 'bame' ),
            ),
            array(
                'id'       => 'bame_blog_title_hover_color',
                'output'   => array( '.th-blog .blog-title a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Hover Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Blog Title Hover Color.', 'bame' ),
            ),
            array(
                'id'       => 'bame_blog_contant_color',
                'output'   => array( '.th-blog .blog-content p'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Excerpt / Content Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Blog Excerpt / Content Color.', 'bame' ),
            ),
            array(
                'id'    => 'blog_info_1',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Button', 'bame'),
            ),
            array(
                'id'       => 'bame_blog_read_more_button_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'bame' ),
                'output'    => array(
                    '--theme-color' => '.blog-single .blog-content .link-btn.style2',
                ),
            ),
            array(
                'id'       => 'bame_blog_read_more_button_color2',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'bame' ),
                'output'    => array(
                    '--theme-color' => '.blog-single .blog-content .link-btn.style2:hover', 
                ),
            ),
     
            array(
                'id'    => 'blog_info_2',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Pagination', 'bame'),
            ),
            array(
                'id'       => 'bame_blog_pagination_color',
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Color', 'bame'),
                'output'    => array(
                    '--white-color' => '.th-pagination a', 
                ),
            ),
            array(
                'id'       => 'bame_blog_pagination_hover_color',
                'output'   => array( '.th-pagination a:hover, .th-pagination a.active'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover & Active Color', 'bame'),
                'output'    => array(
                    '--theme-color' => '.th-pagination a:hover, .th-pagination a.active', 
                ),
            ),

        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Page', 'bame' ),
        'id'         => 'bame_post_detail_styles',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'bame_blog_single_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'bame' ),
                'subtitle' => esc_html__( 'Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'bame' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'bame_post_details_title_position',
                'type'     => 'button_set',
                'default'  => 'header',
                'options'  => array(
                    'header'        => esc_html__('On Header','bame'),
                    'below'         => esc_html__('Below Thumbnail','bame'),
                ),
                'title'    => esc_html__('Blog Post Title Position', 'bame'),
                'subtitle' => esc_html__('Control blog post title position from here.', 'bame'),
            ),
            array(
                'id'       => 'bame_post_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Details Custom Title', 'bame'),
                'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'bame'),
                'required' => array('bame_post_details_title_position','equals','below')
            ),
            array(
                'id'       => 'bame_display_post_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display Tags.', 'bame' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','bame'),
                'off'       => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_post_details_share_options',
                'type'     => 'switch',
                'title'    => esc_html__('Share Options', 'bame'),
                'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'bame'),
                'on'        => esc_html__('Show','bame'),
                'off'       => esc_html__('Hide','bame'),
                'default'   => '0',
            ),
            array(
                'id'       => 'bame_post_details_author_box',
                'type'     => 'switch',
                'title'    => esc_html__('Author Box', 'bame'),
                'subtitle' => esc_html__('Switch On to Display Author Box. Set author bio & social links', 'bame'),
                'on'        => esc_html__('Show','bame'),
                'off'       => esc_html__('Hide','bame'),
                'default'  => true,
            ),
            array(
                'id'       => 'bame_post_details_post_navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Post Navigation', 'bame'),
                'subtitle' => esc_html__('Switch On to Display Post Navigation.', 'bame'),
                'on'        => esc_html__('Show','bame'),
                'off'       => esc_html__('Hide','bame'),
                'default'  => true, 
            ),
           
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Meta Data', 'bame' ),
        'id'         => 'bame_common_meta_data',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'bame_display_post_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post author', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Author.', 'bame' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','bame'),
                'off'       => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_display_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Date.', 'bame' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','bame'),
                'off'       => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_display_post_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Comment', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Comment Number.', 'bame' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','bame'),
                'off'       => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_display_post_cate',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Category', 'bame' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Category.', 'bame' ),
                'default'  => false,
                'on'        => esc_html__('Enabled','bame'),
                'off'       => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_blog_meta_icon_color',
                'output'   => array( '.blog-meta a i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Meta Icon Color', 'bame'),
                'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'bame'),
            ),
            array(
                'id'       => 'bame_blog_meta_text_color',
                'output'   => array( '.blog-meta a,.blog-meta span'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Text Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Blog Meta Text Color.', 'bame' ),
            ),
            array(
                'id'       => 'bame_blog_meta_text_hover_color',
                'output'   => array( '.blog-meta a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Hover Text Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Blog Meta Hover Text Color.', 'bame' ),
            ),
        )
    ));

    /* End blog Page */

    // -> START Breadcrumb Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Breadcrumb', 'bame' ),
        'id'         => 'bame_breadcrumb',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'bame_page_title_switcher',
                'type'     => 'switch',
                'title'    => esc_html__('Title', 'bame'),
                'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'bame'),
                'default'  => '1',
                'on'        => esc_html__('Enabled','bame'),
                'off'       => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_page_title_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','bame'),
                    'h2'        => esc_html__('H2','bame'),
                    'h3'        => esc_html__('H3','bame'),
                    'h4'        => esc_html__('H4','bame'),
                    'h5'        => esc_html__('H5','bame'),
                    'h6'        => esc_html__('H6','bame'),
                ),
                'default'  => 'h1',
                'title'    => esc_html__( 'Title Tag', 'bame' ),
                'subtitle' => esc_html__( 'Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'bame' ),
                'required' => array("bame_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'bame_allHeader_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'bame' ),
                'subtitle' => esc_html__( 'Set Title Color', 'bame' ),
                'output'   => array( 'color' => '.breadcumb-title' ),
                'required' => array("bame_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'bame_allHeader_spacing',
                'type'     => 'spacing',
                'title'    => esc_html__('Breadcrumb Top and Bottom Padding.', 'bame'),
                'mode'     => 'padding',
                'output'   => array('.breadcumb-wrapper'),
                'units_extended' => 'false',
                'units'    => array('px', 'em'),
                'left'     => false,
                'right'    => false,
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'bame_enable_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb Hide/Show', 'bame' ),
                'subtitle' => esc_html__( 'Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'bame' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'bame_allHeader_breadcrumbtextcolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Color', 'bame' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'bame' ),
                'required' => array("bame_enable_breadcrumb","equals","1"),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li a' ),
            ),
            array(
                'id'       => 'bame_allHeader_breadcrumbtextactivecolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Active Color', 'bame' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'bame' ),
                'required' => array( "bame_enable_breadcrumb", "equals", "1" ),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li:last-child' ),
            ),
            array(
                'id'       => 'bame_allHeader_dividercolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Divider Color', 'bame' ),
                'subtitle' => esc_html__( 'Choose breadcrumb divider color.', 'bame' ),
                'required' => array( "bame_enable_breadcrumb", "equals", "1" ),
                'output'   => array( 'color'=>'.breadcumb-wrapper .breadcumb-content ul li:after' ),
            ),
            array(
                'id'       => 'bame_allHeader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background', 'bame' ),
                'subtitle' => esc_html__( 'Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'bame' ),
                'output'   => array( 'background' => '.breadcumb-wrapper' ),
            ),
             array(
                'id'       => 'bame_shoppage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Shop Pages', 'bame' ),
                'output'   => array( 'background' => '.custom-woo-class' ),
            ),
            array(
                'id'       => 'bame_archivepage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Archive Pages', 'bame' ),
                'output'   => array( 'background' => '.custom-archive-class' ),
            ),
            array(
                'id'       => 'bame_searchpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Search Pages', 'bame' ),
                'output'   => array( 'background' => '.custom-search-class' ),
            ),
            array(
                'id'       => 'bame_errorpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Error Pages', 'bame' ),
                'output'   => array( 'background' => '.custom-error-class' ),
            ),
           
        ),
    ) );
    /* End Breadcrumb option */

    // -> START Pages Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'bame' ),
        'id'         => 'bame_pages',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'bame_page_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select layout', 'bame' ),
                'subtitle' => esc_html__( 'Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'bame' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'bame_page_layoutopt',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Settings', 'bame'),
                'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'bame'),
                //Must provide key => value pairs for options
                'options' => array(
                    '1' => esc_html__( 'Page Sidebar', 'bame' ),
                    '2' => esc_html__( 'Blog Sidebar', 'bame' )
                 ),
                'default' => '1',
                'required'  => array('bame_page_sidebar','!=','1')
            ),

        ),
    ) );
    /* End Pages option */

    // -> START Tournaments Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Tournaments', 'bame' ),
        'id'         => 'bame_tournaments',
        'icon'       => 'el el-puzzle',
        'fields'     => array(
            array(
                'id'       => 'bame_tournament_img',
                'type'     => 'background',
                'url'      => true,
                'title'    => esc_html__( 'Section Background', 'bame' ),
                'compiler' => 'true',
                'output'   => array( 'background' => '.tournament-bg' ),
            ),
            array(
                'id'       => 'bame_tournament_subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Subtitle', 'bame' ),
                'default'  => esc_html__( '# Game Streaming Battle', 'bame' ),
            ),
            array(
                'id'       => 'bame_tournament_subtitle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Subtitle Color', 'bame' ),
                'validate' => 'color',
                'output'   => array( '.b-sub' ),
            ), 
            array(
                'id'       => 'bame_tournament_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'bame' ),
                'default'  => esc_html__( 'Our Gaming Tournaments!', 'bame' ),
            ),
            array(
                'id'       => 'bame_tournament_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'bame' ),
                'validate' => 'color',
                'output'   => array( '.b-title' ),
            ), 
            array(
                'id'       => 'bame_display_filter_all', 
                'type'     => 'switch',
                'title'    => esc_html__( 'Filter All Item Show?', 'bame' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','bame'),
                'off'      => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_tournament_all_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Filter All Text', 'bame' ),
                'default'  => esc_html__( 'ALL MATCH', 'bame' ),
                'required' => array( 'bame_display_filter_all', 'equals', '1' )
            ),
            array(
                'id'       => 'bame_display_filter_texts', 
                'type'     => 'switch',
                'title'    => esc_html__( 'UPCOMING & FINISHED Text Change?', 'bame' ),
                'default'  => false,
                'on'       => esc_html__('Enabled','bame'),
                'off'      => esc_html__('Disabled','bame'),
            ),
            array(
                'id'       => 'bame_tournament_upcoming',
                'type'     => 'text',
                'title'    => esc_html__( 'Filter Upcoming Text', 'bame' ),
                'default'  => esc_html__( 'UPCOMING', 'bame' ),
                'required' => array( 'bame_display_filter_texts', 'equals', '1' )
            ),
            array(
                'id'       => 'bame_tournament_finished',
                'type'     => 'text',
                'title'    => esc_html__( 'Filter Finished Text', 'bame' ),
                'default'  => esc_html__( 'FINISHED', 'bame' ),
                'required' => array( 'bame_display_filter_texts', 'equals', '1' )
            ),
            array(
                'id'       => 'bame_tournament_extra_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Filter Button Extra Text', 'bame' ),
                'default'  => esc_html__( 'MATCH', 'bame' ),
            ),

        ),
    ) );
    /* End Tournaments Options */

    // -> START 404 Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'bame' ),
        'id'         => 'bame_404_page',
        'icon'       => 'el el-ban-circle',
        'fields'     => array(
            array(
                'id'       => 'bame_error_bg',
                'type'     => 'background',
                'url'      => true,
                'title'    => esc_html__( 'Error Background', 'bame' ),
                'compiler' => 'true',
                'output'   => array( 'background' => '.error-page' ),
            ),
            array(
                'id'       => 'bame_error_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Error Image', 'bame' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your error image ( recommendation png or svg format ).', 'bame' ),
            ),
            array(
                'id'       => 'bame_error_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Title', 'bame' ),
                'default'  => esc_html__( 'Sorry! Page did not found', 'bame' ),
            ),
            array(
                'id'       => 'bame_error_title_color',
                'type'     => 'color',
                'output'   => array( '.error-title' ),
                'title'    => esc_html__( 'Title Color', 'bame' ),
                'validate' => 'color'
            ), 
            array(
                'id'       => 'bame_error_description',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Description', 'bame' ),
                'default'  => esc_html__( 'Unfortunately, something went wrong and this page does not exist. Try using the search or return to the previous page.', 'bame' ),
            ),
            array(
                'id'       => 'bame_error_desc_color',
                'type'     => 'color',
                'output'   => array( '.error-text' ),
                'title'    => esc_html__( 'Description Color', 'bame' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'bame_error_btn_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'bame' ),
                'default'  => esc_html__( 'Return To Home', 'bame' ),
            ),
            array(
                'id'       => 'bame_error_btn_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'bame' ),
                'output'   => array( 'color' => '.th-btn.error-btn' ),
            ),
            array(
                'id'       => 'bame_error_btn_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background', 'bame' ),
                'output'   => array( '--theme-color' => '.th-btn.error-btn' ),
            ),
            array(
                'id'       => 'bame_error_btn_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'bame' ),
                'output'   => array( 'color' => '.th-btn.error-btn:hover',  ),
            ),
            array(
                'id'       => 'bame_error_btn_hover_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Background', 'bame' ),
                'output'   => array( '--white-color' => '.th-btn.error-btn:hover' ),
            ),
        ),
    ) );
    /* End 404 Page */

    // -> START Woo Page Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Woocommerce Page', 'bame' ),
        'id'         => 'bame_woo_page_page',
        'icon'  => 'el el-shopping-cart',
        'fields'     => array(
            array(
                'id'       => 'bame_shop_container',
                'type'     => 'switch',
                'title'    => esc_html__( 'Container set', 'bame' ),
                'subtitle' => esc_html__( 'Set shop page layout container or full-width', 'bame' ),
                'default'  => '1',
                'on'       => esc_html__('Container','bame'),
                'off'      => esc_html__('Full-Width','bame')
            ),
            array(
                'id'       => 'bame_woo_shoppage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Set Shop Page Sidebar.', 'bame' ),
                'subtitle' => esc_html__( 'Choose shop page sidebar', 'bame' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'bame_woo_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Column', 'bame' ),
                'subtitle' => esc_html__( 'Set your woocommerce product column.', 'bame' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2' => array(
                        'alt' => esc_attr__('2 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('3 Columns','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '4' => array(
                        'alt' => esc_attr__('4 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/6col.png')
                    ),
                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'bame_woo_product_perpage',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Per Page', 'bame' ),
                'default' => '12'
            ),
            array(
                'id'       => 'bame_woo_singlepage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Single Page sidebar', 'bame' ),
                'subtitle' => esc_html__( 'Choose product single page sidebar.', 'bame' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'bame_product_details_title_position',
                'type'     => 'button_set',
                'default'  => 'below',
                'options'  => array(
                    'header'        => esc_html__('On Header','bame'),
                    'below'         => esc_html__('Below Thumbnail','bame'),
                ),
                'title'    => esc_html__('Product Details Title Position', 'bame'),
                'subtitle' => esc_html__('Control product details title position from here.', 'bame'),
            ),
            array(
                'id'       => 'bame_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'bame' ),
                'default'  => esc_html__( 'Shop Details', 'bame' ),
                'required' => array('bame_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'bame_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'bame' ),
                'default'  => esc_html__( 'Shop Details', 'bame' ),
                'required' => array('bame_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'bame_woo_relproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Hide/Show', 'bame' ),
                'subtitle' => esc_html__( 'Hide / Show related product in single page (Default Settings Show)', 'bame' ),
                'default'  => '1',
                'on'       => esc_html__('Show','bame'),
                'off'      => esc_html__('Hide','bame')
            ),
            array(
                'id'       => 'bame_woo_relproduct_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Title', 'bame' ),
                'default'  => esc_html__( 'Related products', 'bame' ),
                'required' => array('bame_woo_relproduct_display','equals',true),
            ),
            array(
                'id'       => 'bame_woo_relproduct_slider', 
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Sldier On/Off', 'bame' ),
                'subtitle' => esc_html__( 'Slider On/Off related product slider in single page (Default Settings Slider On)', 'bame' ),
                'default'  => '1',
                'on'       => esc_html__('Slider On','bame'),
                'off'      => esc_html__('Slider Off','bame'),
                'required' => array('bame_woo_relproduct_display','equals',true),
            ),
            array(
                'id'       => 'bame_woo_relproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products number', 'bame' ),
                'subtitle' => esc_html__( 'Set how many related products you want to show in single product page.', 'bame' ),
                'default'  => 5,
                'required' => array('bame_woo_relproduct_display','equals',true)
            ),

            array(
                'id'       => 'bame_woo_related_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Related Product Column', 'bame' ),
                'subtitle' => esc_html__( 'Set your woocommerce related product column. it works if slider is off', 'bame' ),
                'required' => array('bame_woo_relproduct_display','equals',true),
                'required' => array('bame_woo_relproduct_slider','equals',false),
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'bame_woo_upsellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Upsell product Hide/Show', 'bame' ),
                'subtitle' => esc_html__( 'Hide / Show upsell product in single page (Default Settings Show)', 'bame' ),
                'default'  => '1',
                'on'       => esc_html__('Show','bame'),
                'off'      => esc_html__('Hide','bame'),
            ),
            array(
                'id'       => 'bame_woo_upsellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Upsells products number', 'bame' ),
                'subtitle' => esc_html__( 'Set how many upsells products you want to show in single product page.', 'bame' ),
                'default'  => 3,
                'required' => array('bame_woo_upsellproduct_display','equals',true),
            ),

            array(
                'id'       => 'bame_woo_upsell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Upsells Product Column', 'bame' ),
                'subtitle' => esc_html__( 'Set your woocommerce upsell product column.', 'bame' ),
                'required' => array('bame_woo_upsellproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'bame_woo_crosssellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross sell product Hide/Show', 'bame' ),
                'subtitle' => esc_html__( 'Hide / Show cross sell product in single page (Default Settings Show)', 'bame' ),
                'default'  => '1',
                'on'       => esc_html__( 'Show', 'bame' ),
                'off'      => esc_html__( 'Hide', 'bame' ),
            ),
            array(
                'id'       => 'bame_woo_crosssellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Cross sell products number', 'bame' ),
                'subtitle' => esc_html__( 'Set how many cross sell products you want to show in single product page.', 'bame' ),
                'default'  => 3,
                'required' => array('bame_woo_crosssellproduct_display','equals',true),
            ),

            array(
                'id'       => 'bame_woo_crosssell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Cross sell Product Column', 'bame' ),
                'subtitle' => esc_html__( 'Set your woocommerce cross sell product column.', 'bame' ),
                'required' => array( 'bame_woo_crosssellproduct_display', 'equals', true ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','bame'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','bame'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
        ),
    ) );

    /* End Woo Page option */
    // -> START Gallery
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Gallery', 'bame' ),
        'id'         => 'bame_gallery_widget',
        'icon'       => 'el el-gift',
        'fields'     => array(
            array(
                'id'          => 'bame_gallery_image_widget',
                'type'        => 'slides',
                'title'       => esc_html__('Add Gallery Image', 'bame'),
                'subtitle'    => esc_html__('Add gallery Image and url.', 'bame'),
                'show'        => array(
                    'title'          => false,
                    'description'    => false,
                    'progress'       => false,
                    'icon'           => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => true,
                ),
            ),
        ),
    ) );
    // -> START Subscribe
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe', 'bame' ),
        'id'         => 'bame_subscribe_page',
        'icon'       => 'el el-eject',
        'fields'     => array(

            array(
                'id'       => 'bame_subscribe_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp API Key', 'bame' ),
                'subtitle' => esc_html__( 'Set mailchimp api key.', 'bame' ),
            ),
            array(
                'id'       => 'bame_subscribe_listid',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp List ID', 'bame' ),
                'subtitle' => esc_html__( 'Set mailchimp list id.', 'bame' ),
            ),
        ),
    ) );

    /* End Subscribe */

    // -> START Social Media

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'bame' ),
        'id'         => 'bame_social_media',
        'icon'      => 'el el-globe',
        'desc'      => esc_html__( 'Social', 'bame' ),
        'fields'     => array(
            array(
                'id'          => 'bame_social_links',
                'type'        => 'slides',
                'title'       => esc_html__('Social Profile Links', 'bame'),
                'subtitle'    => esc_html__('Add social icon and url.', 'bame'),
                'show'        => array(
                    'title'          => true,
                    'description'    => true,
                    'progress'       => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => false,
                ),
                'placeholder'   => array(
                    'icon'          => esc_html__( 'Icon (example: fa fa-facebook) ','bame'),
                    'title'         => esc_html__( 'Social Icon Class', 'bame' ),
                    'description'   => esc_html__( 'Social Icon Title', 'bame' ),
                ),
            ),
        ),
    ) );
    /* End social Media */


    // -> START Footer Media
    Redux::setSection( $opt_name , array(
       'title'            => esc_html__( 'Footer', 'bame' ),
       'id'               => 'bame_footer',
       'desc'             => esc_html__( 'bame Footer', 'bame' ),
       'customizer_width' => '400px',
       'icon'              => 'el el-photo',
   ) );

   Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Pre-built Footer / Footer Builder', 'bame' ),
        'id'         => 'bame_footer_section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'bame_footer_builder_trigger',
                'type'     => 'button_set',
                'default'  => 'prebuilt',
                'options'  => array(
                    'footer_builder'        => esc_html__('Footer Builder','bame'),
                    'prebuilt'              => esc_html__('Pre-built Footer','bame'),
                ),
                'title'    => esc_html__( 'Footer Builder', 'bame' ),
            ),
            array(
                'id'       => 'bame_footer_builder_select',
                'type'     => 'select',
                'required' => array( 'bame_footer_builder_trigger','equals','footer_builder'),
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'bame_footerbuild',
                    'posts_per_page' => -1,
                ),
                'on'       => esc_html__( 'Enabled', 'bame' ),
                'off'      => esc_html__( 'Disable', 'bame' ),
                'title'    => esc_html__( 'Select Footer', 'bame' ),
                'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'bame' ),
            ),

            array(
                'id'    => 'info_footer_top',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Footer Top', 'bame'),
                // 'required' => array('bame_footerwidget_enable','=','1'),
            ),
            array(
                'id'       => 'bame_footertop_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Top', 'bame' ),
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'bame' ),
                'off'      => esc_html__( 'Disable', 'bame' ),
                'required' => array( 'bame_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
                'id'       => 'bame_footer_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Footer Logo', 'bame' ),
                'compiler' => 'true',
                'required' => array( 'bame_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
                'id'       => 'bame_footer_logo_shape_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Logo Shape Color', 'bame' ),
                'required' => array('bame_footerwidget_enable','=','1'),
                'output'   => array( '--black-color3'   =>   '.prebuilt-foo .footer-top .footer-logo' ),
            ),
            array(
                'id'       => 'bame_footerwidget_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Widget', 'bame' ),
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'bame' ),
                'off'      => esc_html__( 'Disable', 'bame' ),
                'required' => array( 'bame_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
                'id'       => 'bame_footer_background',
                'type'     => 'background',
                'title'    => esc_html__( 'Footer Widget Background', 'bame' ),
                'subtitle' => esc_html__( 'Set footer background.', 'bame' ),
                'output'   => array( '.prebuilt-foo' ),
                'required' => array( 'bame_footerwidget_enable','=','1' ),
            ),
   
            array(
                'id'       => 'bame_footer_widget_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Widget Title Color', 'bame' ),
                'required' => array('bame_footerwidget_enable','=','1'),
                'output'   => array( '.footer-widget .widget_title' ),
            ),
            array(
                'id'       => 'bame_footer_widget_anchor_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Widget Anchor Color', 'bame' ),
                'required' => array('bame_footerwidget_enable','=','1'),
                'output'   => array( '.footer-widget a' ),
            ),
            array(
                'id'       => 'bame_footer_widget_anchor_hov_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Widget Anchor Hover Color', 'bame' ),
                'required' => array('bame_footerwidget_enable','=','1'),
                'output'   => array( '--theme-color'    =>  '.footer-widget a:hover' ),
            ),
            array(
                'id'    => 'info_newsletter',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Footer Newsletter', 'bame'),
                'required' => array('bame_footerwidget_enable','=','1'),
            ),
            array(
                'id'       => 'bame_footer_newsletter_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Newsletter', 'bame' ),
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'bame' ),
                'off'      => esc_html__( 'Disable', 'bame' ),
                'required' => array('bame_footerwidget_enable','=','1'),
            ),
            array(
                'id'       => 'bame_newsletter_placeholder',
                'type'     => 'text',
                'title'    => esc_html__( 'Newsletter Placeholder Text', 'bame' ),
                'default'  => esc_html__( 'Email Addres', 'bame' ),
                'required' => array('bame_footerwidget_enable','=','1'),
                'required' => array('bame_footer_newsletter_enable','=','1'),
            ),
            array(
                'id'       => 'bame_newsletter_button',
                'type'     => 'text',
                'title'    => esc_html__( 'Newsletter Button Text', 'bame' ),
                'default'  => esc_html__( 'Subscribe', 'bame' ),
                'required' => array('bame_footerwidget_enable','=','1'),
                'required' => array('bame_footer_newsletter_enable','=','1'),
            ),

        ),
    ) );


    // -> START Footer Bottom
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Bottom', 'bame' ),
        'id'         => 'bame_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'bame_disable_footer_bottom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Bottom?', 'bame' ),
                'default'  => 1,
                'on'       => esc_html__('Enabled','bame'),
                'off'      => esc_html__('Disable','bame'),
                'required' => array('bame_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
                'id'       => 'bame_footer_bottom_background2',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Bottom Background Color', 'bame' ),
                'required' => array( 'bame_disable_footer_bottom','=','1' ),
                'output'   => array( 'background-color'   =>   '.prebuilt-foo .copyright-wrap' ),
            ),
            array(
                'id'       => 'bame_footer_bottom_background3',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Bottom Background Shape Color', 'bame' ),
                'required' => array( 'bame_disable_footer_bottom','=','1' ),
                'output'   => array( 'background-color'   =>   '.prebuilt-foo .copyright-wrap .copyright-text' ),
            ),
            array(
                'id'       => 'bame_copyright_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Copyright Text', 'bame' ),
                'subtitle' => esc_html__( 'Add Copyright Text', 'bame' ),
                'default'  => sprintf( '<i class="fal fa-copyright"></i> %s By <a href="%s">%s</a>. All Rights Reserved.',date('Y'),esc_url(esc_url( home_url('/') )),__( 'Bame','bame' ) ),
                'required' => array( 'bame_disable_footer_bottom','equals','1' ),
            ),
            array(
                'id'       => 'bame_footer_copyright_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Text Color', 'bame' ),
                'subtitle' => esc_html__( 'Set footer copyright text color', 'bame' ),
                'required' => array( 'bame_disable_footer_bottom','equals','1'),
                'output'    => array('--white-color' => '.prebuilt-foo .copyright-text'),
            ),
            array(
                'id'       => 'bame_footer_copyright_acolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Ancor Color', 'bame' ),
                'subtitle' => esc_html__( 'Set footer copyright ancor color', 'bame' ),
                'required' => array( 'bame_disable_footer_bottom','equals','1'),
                'output'    => array('color' => '.prebuilt-foo  .copyright-text a'),
            ),
            array(
                'id'       => 'bame_footer_copyright_a_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Ancor Hover Color', 'bame' ),
                'subtitle' => esc_html__( 'Set footer copyright ancor Hover color', 'bame' ),
                'required' => array( 'bame_disable_footer_bottom','equals','1'),
                'output'    => array('color' => '.prebuilt-foo .copyright-text a:hover'),
            ), 

        )
    ));

    /* End Footer Media */

    // -> START Custom Css
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Css', 'bame' ),
        'id'         => 'bame_custom_css_section',
        'icon'  => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'bame_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__('CSS Code', 'bame'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'bame'),
                'mode'     => 'css',
                'theme'    => 'monokai',
            )
        ),
    ) );

    /* End custom css */



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'bame' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'bame' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'bame' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }