<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header2 Widget . 
 *
 */
class Bame_Header2 extends Widget_Base {

	public function get_name() {
		return 'bameheader2';
	}
	public function get_title() {
		return __( 'Header 2', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label' 	=> __( 'Header', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One', 'Style Two' ] );

		$this->add_control(
			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'bame' ),
				'type' 			=> Controls_Manager::MEDIA,
			]
		);				

		$menus = $this->bame_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'bame_menu_select',
				[
					'label'     	=> __( 'Select Bame Menu', 'bame' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'bame' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'bame' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'bame' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

		$this->add_control(
			'show_search_btn',
			[
				'label' 		=> __( 'Show Search Button?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'bame' ),
				'label_off' 	=> __( 'Hide', 'bame' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);		

		$this->add_control(
			'show_offcanvas_btn',
			[
				'label' 		=> __( 'Show Offcanvas Button?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'bame' ),
				'label_off' 	=> __( 'Hide', 'bame' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'bame' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 	=> __( 'Live Streaming', 'bame' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button Link', 'bame' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'bame' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

        $this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------General Style-------
		 $this->start_controls_section(
			'general_styling',
			[
				'label'     => __( 'Background Styling', 'bame' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		bame_color_fields( $this, 'menu_bg', 'Menu BG', 'background', '{{WRAPPER}} .menu-area:after', ['1'] );    
		bame_color_fields( $this, 'menu_bg2', 'Menu BG', 'background', '{{WRAPPER}} .menu-area', ['2'] );
		bame_color_fields( $this, 'logo_bg2', 'Logo BG', 'background', '{{WRAPPER}} .header-logo-wrap', ['1'] );      

		$this->end_controls_section();

		//------Menu Bar Style-------
        $this->start_controls_section(
			'menubar_styling2',
			[
				'label'     => __( 'Menu Styling', 'bame' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		bame_color_fields( $this, 'menu_color7', 'Color', '--white-color', '{{WRAPPER}} .main-menu>ul>li>a', ['1'] );
		bame_color_fields( $this, 'menu_color2', 'Hover Color', 'color', '{{WRAPPER}} .main-menu>ul>li>a:hover', ['1'] );
		bame_color_fields( $this, 'menu_color3', 'Dropdown Color', 'color', '{{WRAPPER}} .main-menu ul.sub-menu li a' );
		bame_color_fields( $this, 'menu_color4', 'Dropdown Hover Color', 'color', '{{WRAPPER}} .main-menu ul.sub-menu li a:hover' );
		bame_color_fields( $this, 'menu_color5', 'Menu Icon Color', 'color', '{{WRAPPER}} .main-menu ul.sub-menu li a:before, {{WRAPPER}} .main-menu ul li.menu-item-has-children > a:after' );

		bame_typography_fields( $this, 'menu_font', 'Menu Trpography', '{{WRAPPER}} .main-menu>ul>li>a, {{WRAPPER}} .main-menu ul.sub-menu li a' );

		bame_dimensions_fields( $this, 'menu_margin', 'Menu Margin', 'margin', '{{WRAPPER}} .main-menu>ul>li>a' );
		bame_dimensions_fields( $this, 'menu_padding', 'Menu Padding', 'padding', '{{WRAPPER}} .main-menu>ul>li>a' );

		$this->end_controls_section();

		//------Button Style-------
		bame_button_style_fields( $this, '12', 'Button Styling', '{{WRAPPER}} .th_btn' );

    }

    public function bame_menu_select(){
	    $bame_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'bame' );
	    foreach( $bame_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		global $woocommerce;

        //Menu by menu select
        $bame_avaiable_menu   = $this->bame_menu_select();
		if( ! $bame_avaiable_menu ){
			return;
		}
		$args = [
			'menu' 			=> $settings['bame_menu_select'],
			'menu_class' 	=> 'bame-menu',
			'container' 	=> '',
		];

		//Mobile menu, Offcanvas, Search
        echo bame_mobile_menu();
		// echo bame_header_cart_offcanvas();
		if(!empty( $settings['show_offcanvas_btn'])){
			echo bame_header_offcanvas();
		}
		if(!empty( $settings['show_search_btn'])){
			echo bame_search_box();
		}

		// Header sub-menu icon
		if( class_exists( 'ReduxFramework' ) ){ 
			if(bame_opt('bame_header_sticky')){
                $sticky = '';
            }else{
                $sticky = '-no';
            }

			if(bame_opt('bame_menu_icon')){
				$menu_icon = '';
			}else{
				$menu_icon = 'hide-icon'; 
			}
		}

		if( $settings['layout_style'] == '1' ){
			echo '<div class="th-header header-layout2">';
				echo '<div class="sticky-wrapper'.esc_attr($sticky).'">';
                    echo '<div class="container">';
                        echo '<div class="row gx-0 justify-content-between">';
                            echo '<div class="col-auto">';
                                echo '<div class="header-logo-wrap">';
                                    echo '<div class="header-logo">';
                                        echo '<a href="'.esc_url( home_url( '/' ) ).'">';
											echo bame_img_tag( array(
												'url'   => esc_url( $settings['logo_image']['url'] ),
											));
										echo '</a>';
                                    echo '</div>';
                               echo ' </div>';
                            echo '</div>';
                            echo '<div class="col-auto">';
                                echo '<div class="menu-area">';
                                    echo '<div class="row gx-0 align-items-center justify-content-lg-between justify-content-end">';
                                        echo '<div class="col-auto">';
                                            echo '<nav class="main-menu d-none d-lg-inline-block '.esc_attr($menu_icon).'">';
                                                if( ! empty( $settings['bame_menu_select'] ) ){
                                                    wp_nav_menu( $args );
                                                }
                                            echo '</nav>';
                                            echo '<div class="header-button d-flex d-lg-none">';
                                                echo '<button type="button" class="th-menu-toggle"><span class="btn-border"></span><i class="far fa-bars"></i></button>';
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-auto d-none d-xl-block">';
                                            echo '<div class="header-button">';
                                                if(!empty( $settings['show_search_btn'])){
                                                    echo '<button type="button" class="simple-icon searchBoxToggler d-none d-xxl-block"><i class="far fa-search"></i></button>';
                                                }
                                                if(!empty( $settings['show_offcanvas_btn'])){
                                                    echo '<button type="button" class="simple-icon sideMenuInfo d-none d-xxl-block"><i class="fa-solid fa-bars"></i></button>';
                                                }
                                                if(!empty( $settings['button_text'])){
                                                    echo '<div class="d-xxl-block d-none">';
                                                        echo '<a href="'.esc_url($settings['button_url']['url']).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
                                                    echo '</div>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
				echo '</div>';
			echo '</div>';
			
		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="th-header header-layout3">';
				echo '<div class="sticky-wrapper'.esc_attr($sticky).'">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container th-container5">';
							echo '<div class="row align-items-center justify-content-between">';
								echo '<div class="col-auto">';
									echo '<div class="header-logo">';
                                        echo '<a href="'.esc_url( home_url( '/' ) ).'">';
											echo bame_img_tag( array(
												'url'   => esc_url( $settings['logo_image']['url'] ),
											));
										echo '</a>';
                                    echo '</div>';
								echo '</div>';
								echo '<div class="col-auto">';
									echo '<nav class="main-menu d-none d-lg-inline-block '.esc_attr($menu_icon).'">';
									if( ! empty( $settings['bame_menu_select'] ) ){
										wp_nav_menu( $args );
									}
								echo '</nav>';
									echo '<div class="header-button d-flex d-lg-none">';
										echo '<button type="button" class="th-menu-toggle"><span class="btn-border"></span><i class="far fa-bars"></i></button>';
									echo '</div>';
								echo '</div>';
								echo '<div class="col-auto d-none d-xl-block">';
									echo '<div class="header-button">';
										if(!empty( $settings['show_search_btn'])){
											echo '<button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if(!empty( $settings['show_offcanvas_btn'])){
											echo '<button type="button" class="simple-icon sideMenuInfo"><i class="fa-solid fa-bars"></i></button>';
										}
										if(!empty( $settings['button_text'])){
											echo '<div class="d-xxl-block d-none">';
												echo '<a href="'.esc_url($settings['button_url']['url']).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}


	}
}