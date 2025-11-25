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
 * Skill Widget .
 *
 */
class bame_Skill extends Widget_Base {

	public function get_name() {
		return 'bameskill';
	}
	public function get_title() {
		return __( 'Skill Bar', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

        $this->start_controls_section(
            'skill_bar_section',
                [
                    'label' 	=> __( 'Skill Bar', 'bame' ),
                    'tab' 		=> Controls_Manager::TAB_CONTENT,
                ]
        );

        bame_select_field( $this, 'layout_style', 'Layout Style', ['Style One', 'Style Two'] );

        bame_general_fields( $this, 'subtitle', 'Title', 'TEXTAREA2', 'My Experience', ['2'] );
        bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'My Gaming Experiences Are 6 Years', ['2'] );
        bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA', '', ['2'] );
        bame_media_fields( $this, 'image', 'Choose Image', ['2'] );

        $repeater = new Repeater();

        bame_general_fields($repeater, 'skill_title', 'Title', 'TEXT', 'Equipment Installation');
        bame_general_fields($repeater, 'skill_num', 'Number', 'TEXT', '90');

        $this->add_control(
            'skill_lists',
            [
                'label' 		=> __( 'Skill Lists', 'bame' ),
                'type' 			=> Controls_Manager::REPEATER,
                'fields' 		=> $repeater->get_controls(),
                'default' 		=> [
                        [
                            'skill_title' 		=> __( 'Title', 'bame' ),
                        ],
                ],
            ]
        );

        $this->end_controls_section();

    //---------------------------------------
        //Style Section Start
    //---------------------------------------

    bame_common_style_fields( $this, 'sub', 'Subtitle', '{{WRAPPER}} .sub-title', ['2']);
    bame_common_style_fields( $this, 'title2', 'Title', '{{WRAPPER}} .sec-title', ['2']);
    bame_common_style_fields( $this, 'desc2', 'Description', '{{WRAPPER}} .desc', ['2']);

    bame_common_style_fields($this, 'title', 'Skill Title', '{{WRAPPER}} .skill-feature_title');


	}

	protected function render() {

    $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == '1' ){
            foreach( $settings['skill_lists'] as $data ){
                echo '<div class="skill-feature">';
                    if(!empty($data['skill_title'])){
                        echo '<h5 class="skill-feature_title">'.esc_html($data['skill_title']).'</h5>';
                    }
                    echo '<div class="progress">';
                        echo '<div class="progress-bar" style="width: '.esc_attr($data['skill_num']).'%;">';
                            echo '<div class="progress-value">'.esc_attr($data['skill_num']).'%</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }elseif( $settings['layout_style'] == '2' ){
            echo '<div class="row gy-40 align-items-center justify-content-center flex-row-reverse">';
                echo '<div class="col-xl-6">';
                    if(!empty($settings['image']['url'])){
                        echo '<div class="experience-thumb ms-xxl-5">';
                            echo '<div class="custom-anim-right wow" data-wow-duration="1.5s" data-wow-delay="0.2s">';
                                echo bame_img_tag( array(
                                    'url'   => esc_url( $settings['image']['url'] ),
                                ));
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
                echo '<div class="col-xl-5">';
                    echo '<div class="title-area custom-anim-left wow" data-wow-duration="1.5s" data-wow-delay="0.1s">';
                        if(!empty($settings['subtitle'])){
                            echo '<span class="sub-title style3">';
                                echo '<span class="sub-title-shape icon-masking">';
                                    echo '<span class="mask-icon" data-mask-src="'.BAME_ASSETS.'img/section-title-bg.svg"></span>';
                                echo '</span>';
                                echo wp_kses_post($settings['subtitle']) ;
                            echo '</span>';
                        }
                        if(!empty($settings['title'])){
                            echo '<h2 class="sec-title mb-0">'.wp_kses_post($settings['title']).'</h2>';
                        }
                        if(!empty($settings['desc'])){
                            echo '<p class="mt-20 desc">'.wp_kses_post($settings['desc']).'</p>';
                        }
                    echo '</div>';
                    foreach( $settings['skill_lists'] as $data ){
                    echo '<div class="skill-feature style2">';
                        if(!empty($data['skill_title'])){
                            echo '<h5 class="skill-feature_title">'.esc_html($data['skill_title']).'</h5>';
                        }
                        echo '<div class="progress">';
                            echo '<div class="progress-bar" style="width: '.esc_attr($data['skill_num']).'%;"></div>';
                        echo '</div>';
                        echo '<div class="progress-value">'.esc_attr($data['skill_num']).' <span>/</span>'.esc_html__('100', 'bame').'</div>';
                    echo '</div>';
                    }
                echo '</div>';
            echo '</div>';

        }


	}

}