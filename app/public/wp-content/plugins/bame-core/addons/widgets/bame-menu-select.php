<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Menu Select Widget .
 *
 */
class Bame_Menu extends Widget_Base {

	public function get_name() {
		return 'bamemenuselect';
	}
	public function get_title() {
		return __( 'Menu Select', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Navigation Menu', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three', 'Style Four'] );

		bame_general_fields( $this, 'title', 'Title', 'TEXT', 'Title', ['3'] );
		bame_media_fields( $this, 'logo_image', 'Choose Logo', ['4'] );
		bame_url_fields( $this, 'logo_url', 'Logo URL', ['4'] );

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

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .widget_title', ['3'] );


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

        //Menu by menu select
        $bame_avaiable_menu   = $this->bame_menu_select();

        if( ! $bame_avaiable_menu ){
            return;
        }
		if( $settings['layout_style'] == '3' ){
			$args = [
				'menu' 		=> $settings['bame_menu_select'],
				'menu_class' 	=> 'menu style2',
				'container' 	=> '',
			];
		}else{
			$args = [
				'menu' 		=> $settings['bame_menu_select'],
				'menu_class' 	=> 'menu',
				'container' 	=> '',
			];
		}

		if( $settings['layout_style'] == '1' ){
			if( ! empty( $settings['bame_menu_select'] ) ){
                wp_nav_menu( $args );
            } 

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="footer-links">';
				if( ! empty( $settings['bame_menu_select'] ) ){
					wp_nav_menu( $args );
				} 
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="widget widget_nav_menu footer-widget">';
				if( !empty($settings['title']) ){
					echo '<h3 class="widget_title">'.esc_html($settings['title']).'</h3>';
				}
				echo '<div class="menu-all-pages-container">';
						if( ! empty( $settings['bame_menu_select'] ) ){
							wp_nav_menu( $args );
						} 
				echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="footer-top text-center">';
				echo '<div class="footer-logo bg-repeat">';
					echo '<a href="'.esc_url($settings['logo_url']['url']).'">';
						echo '<span data-mask-src="'.esc_url( $settings['logo_image']['url'] ).'" class="logo-mask"></span>';
						echo bame_img_tag( array(
							'url'   => esc_url( $settings['logo_image']['url'] ),
						));
					echo '</a>';
				echo '</div>';
				echo '<div class="footer-links">';
					if( ! empty( $settings['bame_menu_select'] ) ){
						wp_nav_menu( $args );
					} 
				echo '</div>';
			echo '</div>';

		}


	}

}