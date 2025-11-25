<?php
    /**
     * Class For Builder
     */
    class BameBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'bame_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'bame-core',BAME_PLUGDIRURI.'assets/js/bame-core.js',array( 'jquery' ),'1.0',true );
		}


        public function bame_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'bame_header_option',
                [
                    'label'     => __( 'Header Option', 'bame' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'bame_header_style',
                [
                    'label'     => __( 'Header Option', 'bame' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'bame' ),
    					'header_builder'       => __( 'Header Builder', 'bame' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'bame_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'bame' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->bame_header_choose_option(),
                    'condition' => [ 'bame_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'bame_footer_option',
                [
                    'label'     => __( 'Footer Option', 'bame' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'bame_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'bame' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'bame' ),
    				'label_off'     => __( 'No', 'bame' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'bame_footer_style',
                [
                    'label'     => __( 'Footer Style', 'bame' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'bame' ),
    					'footer_builder'       => __( 'Footer Builder', 'bame' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'bame_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'bame_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'bame' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->bame_footer_build_choose_option(),
                    'condition' => [ 'bame_footer_style' => 'footer_builder','bame_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Bame Builder', 'bame' ),
            	esc_html__( 'Bame Builder', 'bame' ),
				'manage_options',
				'bame',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('bame', esc_html__('Footer Builder', 'bame'), esc_html__('Footer Builder', 'bame'), 'manage_options', 'edit.php?post_type=bame_footerbuild');
			add_submenu_page('bame', esc_html__('Header Builder', 'bame'), esc_html__('Header Builder', 'bame'), 'manage_options', 'edit.php?post_type=bame_header');
			add_submenu_page('bame', esc_html__('Tab Builder', 'bame'), esc_html__('Tab Builder', 'bame'), 'manage_options', 'edit.php?post_type=bame_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','bame' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'bame' ),
				'singular_name'      => __( 'Footer', 'bame' ),
				'menu_name'          => __( 'Bame Footer Builder', 'bame' ),
				'name_admin_bar'     => __( 'Footer', 'bame' ),
				'add_new'            => __( 'Add New', 'bame' ),
				'add_new_item'       => __( 'Add New Footer', 'bame' ),
				'new_item'           => __( 'New Footer', 'bame' ),
				'edit_item'          => __( 'Edit Footer', 'bame' ),
				'view_item'          => __( 'View Footer', 'bame' ),
				'all_items'          => __( 'All Footer', 'bame' ),
				'search_items'       => __( 'Search Footer', 'bame' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'bame' ),
				'not_found'          => __( 'No Footer found.', 'bame' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'bame' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'bame_footerbuild', $args );

			$labels = array(
				'name'               => __( 'Header', 'bame' ),
				'singular_name'      => __( 'Header', 'bame' ),
				'menu_name'          => __( 'Bame Header Builder', 'bame' ),
				'name_admin_bar'     => __( 'Header', 'bame' ),
				'add_new'            => __( 'Add New', 'bame' ),
				'add_new_item'       => __( 'Add New Header', 'bame' ),
				'new_item'           => __( 'New Header', 'bame' ),
				'edit_item'          => __( 'Edit Header', 'bame' ),
				'view_item'          => __( 'View Header', 'bame' ),
				'all_items'          => __( 'All Header', 'bame' ),
				'search_items'       => __( 'Search Header', 'bame' ),
				'parent_item_colon'  => __( 'Parent Header:', 'bame' ),
				'not_found'          => __( 'No Header found.', 'bame' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'bame' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'bame_header', $args );

			$labels = array(
				'name'               => __( 'Tab Builder', 'bame' ),
				'singular_name'      => __( 'Tab Builder', 'bame' ),
				'menu_name'          => __( 'Gesund Tab Builder', 'bame' ),
				'name_admin_bar'     => __( 'Tab Builder', 'bame' ),
				'add_new'            => __( 'Add New', 'bame' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'bame' ),
				'new_item'           => __( 'New Tab Builder', 'bame' ),
				'edit_item'          => __( 'Edit Tab Builder', 'bame' ),
				'view_item'          => __( 'View Tab Builder', 'bame' ),
				'all_items'          => __( 'All Tab Builder', 'bame' ),
				'search_items'       => __( 'Search Tab Builder', 'bame' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'bame' ),
				'not_found'          => __( 'No Tab Builder found.', 'bame' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'bame' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'bame_tab_builder', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'bame_footerbuild' == $post->post_type || 'bame_header' == $post->post_type || 'bame_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function bame_footer_build_choose_option(){

			$bame_post_query = new WP_Query( array(
				'post_type'			=> 'bame_footerbuild',
				'posts_per_page'	    => -1,
			) );

			$bame_builder_post_title = array();
			$bame_builder_post_title[''] = __('Select a Footer','bame');

			while( $bame_post_query->have_posts() ) {
				$bame_post_query->the_post();
				$bame_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $bame_builder_post_title;

		}

		public function bame_header_choose_option(){

			$bame_post_query = new WP_Query( array(
				'post_type'			=> 'bame_header',
				'posts_per_page'	    => -1,
			) );

			$bame_builder_post_title = array();
			$bame_builder_post_title[''] = __('Select a Header','bame');

			while( $bame_post_query->have_posts() ) {
				$bame_post_query->the_post();
				$bame_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $bame_builder_post_title;

        }

    }

    $builder_execute = new BameBuilder();