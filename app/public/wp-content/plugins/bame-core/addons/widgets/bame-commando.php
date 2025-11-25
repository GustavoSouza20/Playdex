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
 * commando Widget .
 *
 */
class Bame_Commando extends Widget_Base {

	public function get_name() {
		return 'bamecommando';
	}
	public function get_title() {
		return __( 'commando', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'arrow_section',
			[
				'label'     => __( 'Commando', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',[ 'Style One' ] );

		$repeater = new Repeater();

		bame_media_fields( $repeater, 'bg', 'Background' );
		bame_media_fields( $repeater, 'image', 'Image' );
		bame_general_fields( $repeater, 'title', 'Title', 'TEXT', 'PAO' );
		bame_select_field( $repeater, 'client_rating', 'Client Rating', [ 'One Star', 'Two Star', 'Three Star', 'Four Star', 'Five Star' ] );
		bame_general_fields( $repeater, 'desc', 'Description', 'TEXTAREA2', 'Baby Dragooned' );
        bame_media_fields( $repeater, 'icon', 'List Icon 1' );
        bame_general_fields( $repeater, 'text', 'List Title 1', 'TEXT', '30' );
        bame_media_fields( $repeater, 'icon2', 'List Icon 2' );
        bame_general_fields( $repeater, 'text2', 'List Title 2', 'TEXT', '22' );
        bame_media_fields( $repeater, 'icon3', 'List Icon 3' );
        bame_general_fields( $repeater, 'text3', 'List Title 3', 'TEXT', '35' );


		$this->add_control(
			'commando_lists',
			[
				'label' 		=> __( 'Commando Lists', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_image'	=> Utils::get_placeholder_image_src(),
					],
				],
				'condition'	=> [
					'layout_style' => ['1'] 
				]
			]
		);
		
        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------	

		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title', ['1'] );
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc', ['1'] );


	}

	protected function render() {

    $settings = $this->get_settings_for_display(); 

		if( $settings['layout_style'] == '1' ){
            echo '<div class="row gy-30 justify-content-center">';
                foreach( $settings['commando_lists'] as $data ){
                    echo '<div class="col-xl-4 col-lg-6">';
                        echo '<div class="commando-card">';
                            echo '<div class="commando-card-bg-shape" data-bg-src="'.esc_url( $data['bg']['url'] ).'"></div>';
                            echo '<div class="commando-card-content">';
                                if(!empty($data['image']['url'])){
                                echo '<div class="commando-thumb">';
                                    echo bame_img_tag( array(
                                        'url'	=> esc_url( $data['image']['url'] ),
                                    ) );
                                echo '</div>';
                                }
                                echo '<div class="commando-card-details">';
                                    if(!empty($data['title'])){
                                        echo '<h4 class="commando-card-title title">'.wp_kses_post( $data['title'] ).'</h4>';
                                    }
                                    echo '<div class="star-ratting">';
                                        if( $data['client_rating'] == '1' ){
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                        }elseif( $data['client_rating'] == '2' ){
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                        }elseif( $data['client_rating'] == '3' ){
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                        }elseif( $data['client_rating'] == '4' ){
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star"></i>';
                                        }else{
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                            echo '<i class="fas fa-star active"></i>';
                                        }
                                    echo '</div>';
                                    if(!empty($data['desc'])){
                                        echo '<p class="commando-card-text desc">'.wp_kses_post( $data['desc'] ).'</p>';
                                    }
                                echo '</div>';
                            echo '</div>';
                            echo '<ul class="commando-list-wrap">';
                                echo '<li class="commando-single-list">';
                                    if(!empty($data['icon']['url'])){
                                    echo '<div class="icon">';
                                        echo bame_img_tag( array(
                                            'url'	=> esc_url( $data['icon']['url'] ),
                                        ) );
                                    echo '</div>';
                                    }
                                    if(!empty($data['text'])){
                                        echo '<div class="text">'.wp_kses_post( $data['text'] ).'</div>';
                                    }
                                echo '</li>';
                                echo '<li class="commando-single-list">';
                                    if(!empty($data['icon2']['url'])){
                                    echo '<div class="icon">';
                                        echo bame_img_tag( array(
                                            'url'	=> esc_url( $data['icon2']['url'] ),
                                        ) );
                                    echo '</div>';
                                    }
                                    if(!empty($data['text'])){
                                        echo '<div class="text">'.wp_kses_post( $data['text'] ).'</div>';
                                    }
                                echo '</li>';
                                echo '<li class="commando-single-list">';
                                    if(!empty($data['icon3']['url'])){
                                    echo '<div class="icon">';
                                        echo bame_img_tag( array(
                                            'url'	=> esc_url( $data['icon3']['url'] ),
                                        ) );
                                    echo '</div>';
                                    }
                                    if(!empty($data['text3'])){
                                        echo '<div class="text">'.wp_kses_post( $data['text3'] ).'</div>';
                                    }
                                echo '</li>';
                            echo '</ul>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
		
		}elseif( $settings['layout_style'] == '2' ){
			

		}

			
	}
}