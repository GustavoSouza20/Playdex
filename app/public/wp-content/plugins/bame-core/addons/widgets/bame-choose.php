<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Choose_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Choose Widget .
 *
 */
class Bame_Choose extends Widget_Base {

	public function get_name() {
		return 'bamechoose';
	}
	public function get_title() {
		return __( 'Choose Us', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Choose_section',
			[
				'label' 	=> __( 'Choose', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',[ 'Style One'] );

		bame_general_fields( $this, 'subtitle', 'Subtitle', 'TEXTAREA2', 'Title' );
		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Title' );
        bame_general_fields($this, 'features', 'Features', 'WYSIWYG', '');
		bame_media_fields( $this, 'image', 'Choose Choose' );
		bame_media_fields( $this, 'image2', 'Choose Choose' );
		bame_media_fields( $this, 'image3', 'Choose Icon' );
        bame_general_fields( $this, 'circle_text', 'Circle Text', 'TEXTAREA2', 'Title' );
        bame_general_fields($this, 'features2', 'Content', 'WYSIWYG', '');

       $this->end_controls_section();

      	//---------------------------------------
			//Style Section Start
		//---------------------------------------

		bame_common_style_fields($this, 'subtitle', 'Subtitle', '{{WRAPPER}} .sub-title', ['1'] );
        bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .sec-title', ['1'] );
        bame_common_style_fields($this, 'title2', 'Circle Text', '{{WRAPPER}} .circle-title-anime', ['1'] );
        bame_common_style_fields($this, 'content', 'Content', '{{WRAPPER}} .checklist li, {{WRAPPER}} p ', ['1'] );


	}

	protected function render() {

        $settings = $this->get_settings_for_display();
       
		if( $settings['layout_style'] == '1' ){
            echo '<div class="about-wrap3">';
                echo '<div class="row gy-40">';
                    echo '<div class="col-xl-6">';
                        echo '<div class="title-area custom-anim-left wow" data-wow-duration="1.5s" data-wow-delay="0.2s">';
                            if(!empty($settings['subtitle'])){
                                echo '<span class="sub-title">'.wp_kses_post($settings['subtitle']).'</span>';
                            }
                            if(!empty($settings['title'])){
                                echo '<h2 class="sec-title">'.wp_kses_post($settings['title']).'</h2>';
                            }
                            if(!empty($settings['features'])){
                                echo '<div class="checklist">'.wp_kses_post($settings['features']).'</div>';
                            }
                        echo '</div>';
                        if(!empty($settings['image']['url'])){
                            echo '<div class="img-box3">';
                                echo '<div class="img1">';
                                    echo bame_img_tag( array(
                                        'url'   => esc_url( $settings['image']['url'] ),
                                    ));
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                    echo '<div class="col-xl-6">';
                        if(!empty($settings['image2']['url'])){
                            echo '<div class="img-box3">';
                                echo '<div class="img1">';
                                    echo bame_img_tag( array(
                                        'url'   => esc_url( $settings['image2']['url'] ),
                                    ));
                                echo '</div>';
                            echo '</div>';
                        }
                        if(!empty($settings['features2'])){
                            echo '<div class="about-content custom-anim-left wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
                                echo wp_kses_post($settings['features2']);
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
                echo '<div class="about-tag">';
                    if(!empty($settings['circle_text'])){
                        echo '<div class="about-experience-tag">';
                            echo '<span class="circle-title-anime">'.wp_kses_post($settings['circle_text']).'</span>';
                        echo '</div>';
                    }
                    if(!empty($settings['image3']['url'])){
                        echo '<div class="about-tag-icon">';
                            echo bame_img_tag( array(
                                'url'   => esc_url( $settings['image3']['url'] ),
                            ));
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
	

		}



	}

}