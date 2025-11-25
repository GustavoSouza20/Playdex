<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
/**
 * 
 * Footer Widgets .
 *
 */
class Bame_Footer_Widgets extends Widget_Base {

	public function get_name() {
		return 'bamefooterwidgets';
	}
	public function get_title() {
		return __( 'Footer Widgets', 'bame' ); 
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label'     => __( 'Footer Widget Style', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', ['Style One', 'Style Two', 'Style Three'] );

        bame_media_fields( $this, 'logo', 'Choose Logo', ['1'] );
		bame_general_fields( $this, 'title', 'Title', 'TEXT', 'Sign Up For Newsletter', ['1', '2', '3'] );
		bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA', '', ['1', '2'] );
        bame_social_fields( $this, 'social_icon_list', 'Social Media', ['1'] );
		bame_general_fields( $this, 'newsletter_placeholder', 'Placeholder', 'TEXT', 'Enter your Email', ['2'] );
		bame_general_fields( $this, 'newsletter_button', 'Subscribe Button', 'TEXT', '<i class="fa-solid fa-paper-plane"></i>', ['2'] );

		bame_media_fields( $this, 'image', 'Choose Image', ['2'] );
		bame_url_fields( $this, 'button_url', 'Button URL', [ '2' ] );
		bame_media_fields( $this, 'image2', 'Choose Image 2', ['2'] );
		bame_url_fields( $this, 'button_url2', 'Button URL 2', [ '2' ] );

        bame_general_fields( $this, 'gallery_icon', 'Gallery Icon', 'TEXTAREA2', '<i class="fab fa-instagram"></i>', ['3'] );

		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Gallery Slider', 'bame' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
                'condition'		=> [ 
					'layout_style' => ['3']
				],
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------
		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .title', ['1', '2', '3']);
		//-------Description Style-------
		bame_common_style_fields($this, 'desc', 'Description', '{{WRAPPER}} .desc', ['1', '2']);

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="widget footer-widget">';
                echo '<div class="th-widget-about">';
                    if(!empty($settings['logo']['url'])){
                        echo '<div class="about-logo">';
                            echo '<a href="'.esc_url( home_url('/') ).'">';
                                echo '<span data-mask-src="'.esc_url( $settings['logo']['url'] ).'" class="logo-mask"></span>';
                                echo bame_img_tag( array(
                                    'url'   => esc_url( $settings['logo']['url'] ),
                                ));
                            echo '</a>';
                        echo '</div>';
                    }
                    if($settings['desc']){
                        echo '<p class="about-text desc">'.wp_kses_post($settings['desc']).'</p>';
                    }
                    if($settings['title']){
                        echo '<h3 class="widget_title title">'.wp_kses_post($settings['title']).'</h3>';
                    }
                    echo '<div class="th-widget-contact">';
                        echo '<div class="th-social style-mask">';
                            foreach( $settings['social_icon_list'] as $social_icon ){
                                $social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
                                $social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

                                echo '<a class="'.esc_attr($social_icon['social_class']).'" '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

                                \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

                                echo '</a> ';
                            }
                        echo '</div>'; 
                    echo '</div>';
                echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="widget newsletter-widget footer-widget">';
                if($settings['title']){
                    echo '<h3 class="widget_title title">'.wp_kses_post($settings['title']).'</h3>';
                }
                if($settings['desc']){
                    echo '<p class="footer-text desc">'.wp_kses_post($settings['desc']).'</p>';
                }
                echo '<form class="newsletter-form">';
                    echo '<div class="form-group">';
                        echo '<input class="form-control" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" required="">';
                        echo '<button type="submit" class="th-btn">'.wp_kses_post( $settings['newsletter_button'] ).'</button>';
                    echo '</div>';
                    echo '<div class="btn-wrap">';
                        if(!empty($settings['image']['url'])){
                            echo '<a href="'.esc_url( $settings['button_url']['url'] ).'">';
                                echo bame_img_tag( array(
                                    'url'   => esc_url( $settings['image']['url'] ),
                                ));
                            echo '</a>';
                        }
                        if(!empty($settings['image2']['url'])){
                            echo '<a href="'.esc_url( $settings['button_url2']['url'] ).'">';
                                echo bame_img_tag( array(
                                    'url'   => esc_url( $settings['image2']['url'] ),
                                ));
                            echo '</a>';
                        }
                    echo '</div>';
                echo '</form>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){  
            echo '<div class="widget  footer-widget">';
                if($settings['title']){
                    echo '<h3 class="widget_title title">'.wp_kses_post($settings['title']).'</h3>';
                }
                echo '<div class="widget-instagram-feeds">';
                    foreach ( $settings['gallery'] as $data ){
                        echo '<div class="gallery-thumb">';
                            echo bame_img_tag( array(
                                'url'   => esc_url( $data['url'] ),
                            ));
                            echo '<a href="'.esc_url( $data['url'] ).'" class="gallery-btn popup-image">'.wp_kses_post($settings['gallery_icon']).'</a>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';

        }
	

	}
}
						