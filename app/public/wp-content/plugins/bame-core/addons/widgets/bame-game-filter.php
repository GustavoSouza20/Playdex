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
 * Game Filter Widget .
 *
 */
class Bame_Game_Filter extends Widget_Base {

	public function get_name() {
		return 'bamegamefilter';
	}
	public function get_title() {
		return __( 'Game Filter', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'game_section',
			[
				'label'		 	=> __( 'Game Filter', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One'] );

        bame_switcher_fields($this, 'show_all', 'Show All Tab?');
		bame_general_fields($this, 'all_title', 'All Tab Text', 'TEXT', 'We Recommend');

		$repeater = new Repeater();

		bame_general_fields($repeater, 'tab_title', 'Tab Title', 'TEXT', 'Popular Games');
		bame_general_fields($repeater, 'tab_id', 'Filter Tab ID', 'TEXT', 'cat1');

		$this->add_control(
			'gallery_tab',
			[
				'label' 		=> __( 'Gallery Tab', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_title' 		=> __( 'Residential', 'bame' ),
					],
				],
			]
		);

		$repeater = new Repeater();

		bame_general_fields($repeater, 'tab_id2', 'Filter Content ID', 'TEXT', 'cat1');
		bame_media_fields($repeater, 'image', 'Choose Image');
		bame_general_fields($repeater, 'rating', 'Rating', 'TEXT', '<i class="fas fa-star"></i> 4.5');
		bame_general_fields($repeater, 'cate', 'Category', 'TEXT', 'Desktop');
		bame_general_fields($repeater, 'title', 'Title', 'TEXTAREA', 'Assassin’s Creed Mirage');
		bame_general_fields($repeater, 'subtitle', 'Subtitle', 'TEXT', 'Free to play');
		bame_url_fields($repeater, 'button_url', 'Button URL');

		$this->add_control(
			'gallery_list',
			[
				'label' 		=> __( 'Game Lists', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Assassin’s Creed Mirage', 'bame' ),
					],
				],
			]
		);


        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common2_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title a' );
		//-------Content Style-------
		bame_common_style_fields( $this, 'desc', 'Subtitle', '{{WRAPPER}} .sub' );

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
            echo '<div class="game-filter-btn  filter-menu filter-menu-active custom-anim-top wow">';
                if(!empty($settings['show_all'])){
                    $active = '';
                    if(!empty($settings['all_title'])){
                        $title = $settings['all_title'];
                    }else{
                        $title = 'All Photos';
                    }
                    echo '<button data-filter="*" class="tab-btn active" type="button">'.esc_html($title).'</button>';
                }else{
                    $active = 'active';
                }
                foreach( $settings['gallery_tab'] as $key => $data ){
                    $id = strtolower($data['tab_id']);
                    $active_class = ($key == 0) ? $active : '';
                    echo '<button data-filter=".'.esc_attr($id).'" class="tab-btn '.esc_attr($active_class).'" type="button">'.esc_html($data['tab_title']).'</button>';
                }
            echo '</div>';

            echo '<div class="row gy-4 filter-active">';
                foreach( $settings['gallery_list'] as $data ){
                    $id = strtolower($data['tab_id2']);
                    echo '<div class="col-lg-4 col-md-6 filter-item '.esc_attr($id).'">';
                        echo '<div class="game-card style3" data-mask-src="'.BAME_ASSETS.'img/game_card3_bg.jpg">';
                            echo '<div class="game-card-img" data-mask-src="'.BAME_ASSETS.'img/game_card3_img-shape.jpg">';
                                echo '<a href="'.esc_url( $data['button_url']['url'] ).'">';
                                    if(!empty($data['rating'])){
                                        echo '<span class="game-rating">'.wp_kses_post($data['rating']).'</span>';
                                    }
                                    echo bame_img_tag( array(
                                        'url'   => esc_url( $data['image']['url'] ),
                                    ));
                                echo '</a>';
                            echo '</div>';
                            echo '<div class="game-card-details">';
                                if(!empty($data['cate'])){
                                    echo '<div class="game-tag">'.wp_kses_post($data['cate']).'</div>';
                                }
                                if(!empty($data['title'])){
                                    echo '<h3 class="box-title title"><a href="'.esc_url( $data['button_url']['url'] ).'">'.wp_kses_post($data['title']).'</a></h3>';
                                }
                                if(!empty($data['subtitle'])){
                                    echo '<p class="game-content sub">'.wp_kses_post($data['subtitle']).'</p>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="slider-area">';
				echo '<div class="swiper th-slider has-shadow" id="gameSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['game_lists_2'] as $data ){
							echo '<div class="swiper-slide">';
								echo '<div class="game-card style2">';
									echo '<div class="game-card-img">';
										if(!empty($data['choose_image']['url'])){
											echo '<a href="'.esc_url($data['link']['url']).'">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_image']['url'] ),
												));
											echo '</a>';
										}
										if(!empty($data['choose_logo']['url'])){
											echo '<div class="game-logo">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_logo']['url'] ),
												));
											echo '</div>';
										}
									echo '</div>';
									echo '<div class="game-card-details">';
										echo '<div class="media-left">';
											if( !empty($data['title']) ){
												echo '<h3 class="box-title"><a href="'.esc_url($data['link']['url']).'">'.esc_html($data['title']).'</a></h3>';
											}
											if( !empty($data['label']) || !empty($data['entry_fee']) ){
												echo '<p class="game-content desc">'.esc_html($data['label']).'<span class="text-theme desc2">'.esc_html($data['entry_fee']).'</span></p>';
											}
										echo '</div>';
										echo '<div class="media-body">';
											if( !empty($data['rating']) ){
												echo '<span class="game-rating">'.wp_kses_post($data['rating']).'</span>';
											}
											if( !empty($data['rating_count']) ){
												echo '<span class="review-count">'.esc_html($data['rating_count']).'</span>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}


		

	}

}