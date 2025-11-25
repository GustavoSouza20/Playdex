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
 * Download Widget .
 *
 */
class bame_Download extends Widget_Base {

	public function get_name() {
		return 'bamedownload';
	}
	public function get_title() {
		return __( 'Download', 'bame' );
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
				'label'		 	=> __( 'Download', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One' ] );

		bame_media_fields( $this, 'image', 'Choose Image' );
		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Download Now' );
		bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA', 'Mobile ');
		bame_general_fields( $this, 'info', 'Gamen Info', 'HEADING', '');
		bame_general_fields( $this, 'rating_icon', 'Rating Icon', 'TEXTAREA', '4.8');
		bame_general_fields( $this, 'rating_count', 'Rating Count', 'TEXTAREA2', '(2.6k Review)');
		bame_general_fields( $this, 'downlaod_count', 'Download Count', 'TEXTAREA2', '10M+');
		bame_general_fields( $this, 'downlaod_label', 'Download Label', 'TEXTAREA2', 'Downloads');
        
		bame_general_fields( $this, 'info2', 'Button', 'HEADING', '');
        bame_media_fields( $this, 'image1', 'Choose Image' );
		bame_url_fields( $this, 'button_url', 'Button URL' );
		bame_media_fields( $this, 'image2', 'Choose Image 2' );
		bame_url_fields( $this, 'button_url2', 'Button URL 2' );

        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title' );
		//-------Description Style-------
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc' );
		

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

			if( $settings['layout_style'] == '1' ){
                echo '<div class="widget  ">';
                    echo '<div class="widget-game-info">';
                        if(!empty($settings['image']['url'])){
                            echo '<div class="player-logo">';
                                echo bame_img_tag( array(
                                    'url'   => esc_url( $settings['image']['url'] ),
                                ));
                            echo '</div>';
                        }
                        if(!empty($settings['title'])){
							echo '<h2 class="game-info-title title">'.wp_kses_post($settings['title']).'</h2>';
						}
						if(!empty($settings['desc'])){
							echo '<div class="game-meta-list desc">'.wp_kses_post($settings['desc']).'</div>';
						}
                        echo '<div class="game-rating-info">';
                            echo '<div class="rating-wrap">';
                                if(!empty($settings['rating_icon'])){
                                    echo '<span class="game-rating">'.wp_kses_post($settings['rating_icon']).'</span>';
                                }
                                if(!empty($settings['rating_count'])){
                                    echo '<span class="review-count">'.wp_kses_post($settings['rating_count']).'</span>';
                                }
                            echo '</div>';
                            echo '<div class="download-wrap">';
                                if(!empty($settings['downlaod_count'])){
                                    echo '<h5 class="download-wrap-title">'.wp_kses_post($settings['downlaod_count']).'</h5>';
                                }
                                if(!empty($settings['downlaod_label'])){
                                    echo '<span class="download-wrap-text">'.wp_kses_post($settings['downlaod_label']).'</span>';
                                }
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="btn-wrap">';
                            if(!empty($settings['image1']['url'])){
                                echo '<a href="'.esc_url( $settings['button_url']['url'] ).'">';
                                    echo bame_img_tag( array(
                                        'url'   => esc_url( $settings['image1']['url'] ),
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
                    echo '</div>';
                echo '</div>';
				
			}elseif( $settings['layout_style'] == '2' ){
				

			}


	}

}