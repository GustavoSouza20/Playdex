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
 * Header3 Widget . 
 *
 */
class Bame_Header3 extends Widget_Base {

	public function get_name() {
		return 'bameheader3';
	}
	public function get_title() {
		return __( 'Header Onepage', 'bame' );
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

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One' ] );

		$this->add_control(
			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'bame' ),
				'type' 			=> Controls_Manager::MEDIA,
			]
		);				

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

        
        $repeater = new Repeater();

		bame_general_fields($repeater, 'icon', 'Menu Icon', 'TEXTAREA2', '<i class="fal fa-home"></i>');
		bame_general_fields($repeater, 'title', 'Menu Title', 'TEXTAREA2', 'Home');
        bame_url_fields( $repeater, 'button_url', 'Button URL');

		$this->add_control(
			'menu_lists',
			[
				'label' 		=> __( 'Menu List', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title'    => __( 'Home', 'bame' ),
					],
				],
			]
		);


        //Social 
		$this->add_control(
			'show_social',
			[
				'label' 		=> __( 'Show Social?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'bame' ),
				'label_off' 	=> __( 'Hide', 'bame' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        bame_social_fields( $this, 'social_icon_list', 'Social Media', ['1'] );


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

		bame_color_fields( $this, 'menu_bg', 'Menu BG', 'background', '{{WRAPPER}} .menu-area', ['1'] );    
		bame_color_fields( $this, 'menu_bg2', 'Sidebar Menu BG', 'background', '{{WRAPPER}} .header-sidebar-menu', ['1'] );    

		$this->end_controls_section();

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

		//Mobile menu, Offcanvas, Search
        echo bame_mobile_menu();

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
            echo '<div class="th-header header-layout4">'; 
                echo '<div class="sticky-wrapper'.esc_attr($sticky).'">';
                    echo '<!-- Main Menu Area -->';
                    echo '<div class="menu-area">';
                        echo '<div class="logo-bg"></div>';
                        echo '<div class="container-fluid p-0">';
                            echo '<div class="row g-0 align-items-center">';
                                echo '<div class="col-auto me-auto">';
                                    echo '<div class="header-logo">';
                                        echo '<a href="'.esc_url( home_url( '/' ) ).'">';
											echo bame_img_tag( array(
												'url'   => esc_url( $settings['logo_image']['url'] ),
											));
										echo '</a>';
                                    echo '</div>';
                                echo '</div>';
                                if(!empty( $settings['show_search_btn'])){
                                echo '<div class="col-auto me-auto">';
                                    echo '<div class="header-search-wrap">';
                                        echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'">';
                                            echo '<input value="'.esc_html( get_search_query() ).'" name="s" type="text" placeholder="'.esc_attr__('What are you looking for?', 'bame').'">';
                                            echo '<button type="submit"><i class="far fa-search"></i></button>';
                                        echo '</form>';
                                    echo '</div>';
                                echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            echo '<div class="header-sidebar-menu" id="navbar-collapse-toggle">';
                echo '<nav class="main-menu">';
                    echo '<ul>';
                        foreach( $settings['menu_lists'] as $key => $data ){
                            $active = ($key==0) ? 'active':'';
                        echo '<li class="'.esc_attr($active).'">';
                            echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="menu-section-link">'.wp_kses_post($data['icon']).'<span class="text">'.wp_kses_post($data['title']).'</span></a>';
                        echo '</li>';
                        }
                    echo '</ul>';
                echo '</nav>';
            echo '</div>';

            if(!empty( $settings['show_social'])){
            echo '<div class="header-fixed-social-wrap">';
                echo '<div class="header-social-wrap"> ';
                    echo '<a href="#" class="header-social-hover_btn d-none d-lg-block">';
                        echo '<i class="fal fa-share-nodes"></i>';
                    echo '</a>';
                    echo '<div class="th-social style-mask d-none d-lg-flex">'; 
                        foreach( $settings['social_icon_list'] as $social_icon ){
                            $social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
                            $social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

                            echo '<a class="'.esc_attr($social_icon['social_class']).'" '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

                            echo '</a> ';
                        }
                    echo '</div>';
                    echo '<div class="header-button d-flex d-lg-none">';
                        echo '<button type="button" class="th-menu-toggle"><span class="btn-border"></span><i class="far fa-bars"></i></button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            }
			
		}elseif( $settings['layout_style'] == '2' ){
			

		}


	}
}