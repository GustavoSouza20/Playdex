<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Banner Widget.
 *
 */
class Bame_Banner2 extends Widget_Base {

	public function get_name() {
		return 'bamebanner2';
	}
	public function get_title() {
		return __( 'Banner / Hero', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'banner_section',
			[
				'label' 	=> __( 'Banner', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One', 'Style Two', 'Style Three', 'Style Four', 'Style Five' ] );

		bame_media_fields( $this, 'title_shape', 'Choose Title Shape', ['1'] );
		bame_media_fields( $this, 'bg', 'Choose Background', ['1', '2', '3', '4', '5'] );
		bame_media_fields( $this, 'image', 'Choose Image', ['2', '4', '5'] );
		bame_media_fields( $this, 'image2', 'Choose Image', ['2', '4'] );
		bame_media_fields( $this, 'image3', 'Choose Image', ['2'] );
        bame_general_fields( $this, 'subtitle', 'Subtitle', 'TEXT', 'World Class eSports & Gaming Site', ['1', '3']);
		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'SHAPING THE FUTURE OF', ['1', '3', '4', '5']);
		bame_general_fields( $this, 'title2', 'Title 2', 'TEXTAREA2', 'ESPORTS', ['1', '3', '5'] );
		bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA', 'Gamers can join local gaming meetups', ['5'] );
        bame_general_fields( $this, 'button_text', 'Button Text', 'TEXT', 'EXPLORE MORE');
		bame_url_fields( $this, 'button_url', 'Button URL');
		bame_general_fields( $this, 'button_text2', 'Button Text 2', 'TEXT', 'BROWSE GAMES', ['1', '5'] );
		bame_url_fields( $this, 'button_url2', 'Button URL 2', ['1', '5'] );

		bame_general_fields( $this, 'bg_title', 'Background Title', 'TEXTAREA2', 'Gamer', ['5']);
		bame_general_fields( $this, 'button_text3', 'Scroll Text', 'TEXT', 'Scroll down', ['5'] );
		bame_url_fields( $this, 'button_url3', 'Scroll URL', ['5'] );

		$this->add_control(
			'show_tournament',
			[
				'label' 		=> __( 'Show Tournament Slider?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'bame' ),
				'label_off' 	=> __( 'Hide', 'bame' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 
					'layout_style' => ['4']
				],
			]
		);
		$this->add_control(
			'tournament_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'bame' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'tournament', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'bame' ),
				'condition'		=> [ 
					'layout_style' => ['4']
				],
			]
        );
        $this->add_control(
			'tournament_post_order',
			[
				'label' 	=> __( 'Order', 'bame' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','bame'),
                    'DESC'   	=> __('DESC','bame'),
                ],
                'default'  	=> 'DESC',
				'condition'		=> [ 
					'layout_style' => ['4']
				],
			]
        );
        $this->add_control(
			'tournament_post_order_by',
			[
				'label' 	=> __( 'Order By', 'bame' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'bame' ),
                    'author'    => __( 'Author', 'bame' ),
                    'title'    	=> __( 'Title', 'bame' ),
                    'date'    	=> __( 'Date', 'bame' ),
                    'rand'    	=> __( 'Random', 'bame' ),
                ],
                'default'  	=> 'ID',
				'condition'		=> [ 
					'layout_style' => ['4']
				],
			]
        );
		bame_media_fields( $this, 'shape', 'Choose Background Shape', ['4'] );
		bame_media_fields( $this, 'shape2', 'Choose Team Logo Shape', ['4'] );
		bame_media_fields( $this, 'vs_logo', 'Choose Team V/S Logo', ['4'] );

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Subtitle Style-------
		bame_common_style_fields($this, 'subtitle', 'Subtitle', '{{WRAPPER}} .sub-title', ['1', '3'],'--theme-color');
		
		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .hero-title', ['1', '3', '4', '5']);
		bame_common_style_fields($this, 'title2', 'Title 2', '{{WRAPPER}} .title2', ['1', '3', '5']);

		bame_common_style_fields($this, 'desc', 'Description', '{{WRAPPER}} .desc', ['5']);

		//-------Tournament Style-------
		bame_common2_style_fields( $this, 'title22', 'Tournament Title', '{{WRAPPER}} .title a', ['4'] );
		bame_common_style_fields( $this, 'desc22', 'Tournament Subtitle', '{{WRAPPER}} .sub', ['4'] );

		//------Button Style-------
		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th_btn', ['1', '3', '4', '5'] );
		bame_button_style_fields($this, '11', 'Button 2 Styling', '{{WRAPPER}} .th_btn2', ['1']);
		bame_button2_style_fields($this, '13', 'Button Styling', '{{WRAPPER}} .th_btn', ['2'] );
		bame_button2_style_fields($this, '14', 'Button Styling', '{{WRAPPER}} .th_btn2', ['5'] );

    }

	protected function render() {

    	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="th-hero-wrapper hero-1" id="hero" data-bg-src="'.esc_url($settings['bg']['url']).'">';
				echo '<div class="container">';
					echo '<div class="hero-style1 text-center">';
						if(!empty($settings['subtitle'])){
							echo '<span class="sub-title custom-anim-top wow" data-wow-duration="1.2s" data-wow-delay="0.1s">'.wp_kses_post($settings['subtitle']).'</span>';
						}
						echo '<h1 class="hero-title">';
							if(!empty($settings['title'])){
								echo '<span class="title1 custom-anim-top wow" data-wow-duration="1.1s" data-wow-delay="0.3s" data-bg-src="'.esc_url($settings['title_shape']['url']).'">'.wp_kses_post($settings['title']).'</span>';
							}
							if(!empty($settings['title2'])){
								echo '<span class="title2 custom-anim-top wow" data-wow-duration="1.1s" data-wow-delay="0.4s">'.wp_kses_post($settings['title2']).'</span>';
							}
						echo '</h1>';
						echo '<div class="btn-group custom-anim-top wow" data-wow-duration="1.2s" data-wow-delay="0.7s">';
							if(!empty($settings['button_text'])){
								echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
							}
							if(!empty($settings['button_text2'])){
								echo '<a href="'.esc_url( $settings['button_url2']['url'] ).'" class="th-btn th_btn2 style2">'.wp_kses_post($settings['button_text2']).'</a>';
							}
						echo '</div>';
					echo '</div>';
            	echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="th-hero-wrapper hero-2" id="hero" data-bg-src="'.esc_url($settings['bg']['url']).'">';
				echo '<div class="container-fluid">';
					echo '<div class="hero-style2">';
						echo '<div class="hero-title-thumb">';
							if(!empty($settings['image']['url'])){
								echo '<div class="character">';
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['image']['url'] ),
									));
								echo '</div>';
							}
							if(!empty($settings['image2']['url'])){
								echo '<div class="title-img title-img-1 custom-anim-top wow" data-wow-duration="1.2s" data-wow-delay="0.1s">';
									echo '<span class="title-img-mask" data-mask-src="'.esc_url($settings['image2']['url']).'"></span>';
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['image2']['url'] ),
									));
								echo '</div>';
							}
							if(!empty($settings['image3']['url'])){
								echo '<div class="title-img title-img-2 custom-anim-top wow" data-wow-duration="1.2s" data-wow-delay="0.5s">';
									echo '<span class="title-img-mask" data-mask-src="'.esc_url($settings['image3']['url']).'"></span>';
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['image3']['url'] ),
									));
								echo '</div>';
							}
		
						echo '</div>';
						if(!empty($settings['button_text'])){
							echo '<div class="btn-group custom-anim-top wow" data-wow-duration="1.2s" data-wow-delay="0.5s">';
								echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn style-border2">';
									echo '<span class="btn-border">'.wp_kses_post($settings['button_text']).'</span>';
								echo '</a>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="th-hero-wrapper hero-3" id="hero">';
				echo '<div class="th-hero-bg" data-bg-src="'.esc_url($settings['bg']['url']).'"></div>';
				echo '<div class="container">';
					echo '<div class="hero-style3">';
						if(!empty($settings['subtitle'])){
							echo '<span class="sub-title custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.1s">'.wp_kses_post($settings['subtitle']).'</span>';
						}
						if(!empty($settings['title'])){
							echo '<h1 class="hero-title custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.2s">'.wp_kses_post($settings['title']).'</h1>';
						}
						if(!empty($settings['title2'])){
							echo '<h1 class="hero-title style2 title2 custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.3s">'.wp_kses_post($settings['title2']).'</h1>';
						}
						if(!empty($settings['button_text'])){
							echo '<div class="btn-group custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.5s">';
								echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			$args = array(
				'post_type'             => 'tournament',
				'posts_per_page'        => esc_attr( $settings['tournament_post_count'] ),
				'order'                 => esc_attr( $settings['tournament_post_order'] ),
				'orderby'               => esc_attr( $settings['tournament_post_order_by'] ),
				'ignore_sticky_posts'   => true,
			);
	
			$tournament = new WP_Query( $args );

			echo '<div class="th-hero-wrapper hero-4" data-bg-src="'.esc_url($settings['bg']['url']).'" id="hero">';
				echo '<div class="container th-container5">';
					echo '<div class="hero-style4 text-center" data-bg-src="'.esc_url($settings['image']['url']).'" data-mask-src="'.esc_url($settings['image']['url']).'">';
						if(!empty($settings['title'])){
							echo '<h1 class="hero-title custom-anim-top wow" data-wow-duration="1.2s" data-wow-delay="0.2s">'.wp_kses_post($settings['title']).'</h1>';
						}
						if(!empty($settings['image2']['url'])){
							echo '<div class="hero-thumb4-1 custom-anim-top wow" data-wow-duration="1.2s" data-wow-delay="0.2s">';
								echo '<div class="character">';
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['image2']['url'] ),
									));
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="container">';
					echo '<div class="row justify-content-center">';
						echo '<div class="col-lg-11">';
							if(!empty($settings['show_tournament'])){
							echo '<div class="slider-area hero-game-slider4-1">'; 
								echo '<div class="swiper th-slider" id="heroGameSlider4-1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}\'>';
									echo '<div class="swiper-wrapper">';
										while ($tournament->have_posts()){
											$tournament->the_post(); 
											$post_id = get_the_ID();
									
											// Replace $prefix with the actual prefix used in your CMB2 fields
											$prefix = '_tournament_';
									
											$image_url = get_post_meta($post_id, $prefix . 'image1', true);
											$subtitle = get_post_meta($post_id, $prefix . 'subtitle1', true);
											$title = get_post_meta($post_id, $prefix . 'title1', true);
									
											$image_url2 = get_post_meta($post_id, $prefix . 'image2', true);
											$subtitle2 = get_post_meta($post_id, $prefix . 'subtitle2', true);
											$title2 = get_post_meta($post_id, $prefix . 'title2', true);
									
											$vs_image = get_post_meta($post_id, $prefix . 'vs_image', true);
											$status = get_post_meta($post_id, $prefix . 'status', true);
											$time = get_post_meta($post_id, $prefix . 'time', true);
											$date = get_post_meta($post_id, $prefix . 'date', true);
											$points = get_post_meta($post_id, $prefix . 'points', true);

											$social_lists = get_post_meta($post_id, $prefix . 'tournament_repeat_group', true);

											echo '<div class="swiper-slide">';
												echo '<div class="tournament-card style5">';
													echo '<div class="tournament-card-shape" data-bg-src="'.esc_url($settings['shape']['url']).'"></div>';
													echo '<div class="tournament-player-wrap">';
														echo '<div class="tournament-card-img" data-bg-src="'.esc_url($settings['shape2']['url']).'">';
															echo '<img src="'.esc_url($image_url).'" alt="'.esc_attr__('tournament image', 'bame').'">';
														echo '</div>';
														echo '<div class="card-title-wrap">';
															echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle).'</h6>';
															echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title).'</a></h3>';
														echo '</div>';
													echo '</div>';
													echo '<div class="tournament-card-versus">';
														if(!empty($settings['vs_logo']['url'])){
															echo bame_img_tag( array(
																'url'   => esc_url( $settings['vs_logo']['url'] ),
															));
														}else{
															echo '<img src="'.esc_url($vs_image).'" alt="'.esc_attr__('tournament image', 'bame').'">';
														}
													echo '</div>';
													echo '<div class="tournament-player-wrap style2">';
														echo '<div class="tournament-card-img" data-bg-src="'.esc_url($settings['shape2']['url']).'">';
															echo '<img src="'.esc_url($image_url2).'" alt="'.esc_attr__('tournament image', 'bame').'">';
														echo '</div>';
														echo '<div class="card-title-wrap">';
															echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle2).'</h6>';
															echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title2).'</a></h3>';
														echo '</div>';
													echo '</div>';
													echo '<div class="tournament-card-content">';
														echo '<div class="tournament-card-details">';
															echo '<h6 class="tournament-card-time">'.esc_html($time).'</h6>';
															echo '<p class="tournament-card-date">'.esc_html($date).'</p>';
														echo '</div>';
													echo '</div>';
												echo '</div>';
											echo '</div>';
											
										}
									echo '</div>';
								echo '</div>';
								echo '<button data-slider-prev="#heroGameSlider4-1" class="slider-arrow style3 slider-prev"><i class="fas fa-angle-left"></i></button>';
								echo '<button data-slider-next="#heroGameSlider4-1" class="slider-arrow style3 slider-next"><i class="fas fa-angle-right"></i></button>';
							echo '</div>';
							}
							if(!empty($settings['button_text'])){
								echo '<div class="btn-wrap mt-40 justify-content-center">';
									echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '5' ){
			echo '<div class="th-hero-wrapper hero-5 bg-black" id="hero" data-bg-src="'.esc_url($settings['bg']['url']).'">';
				if(!empty($settings['bg_title'])){
					echo '<div class="hero-bg-text">'.wp_kses_post($settings['bg_title']).'</div>';
				}
				echo '<div class="container">';
					echo '<div class="row align-items-center flex-row-reverse">';
						echo '<div class="col-lg-6">';
							if(!empty($settings['image']['url'])){
								echo '<div class="hero-thumb5-1">';
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['image']['url'] ),
									));
								echo '</div>';
							}
						echo '</div>';
						echo '<div class="col-lg-6">';
							echo '<div class="hero-style5">';
								if(!empty($settings['title'])){
									echo '<h1 class="hero-title custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.2s">'.wp_kses_post($settings['title']).'</h1>';
								}
								if(!empty($settings['title2'])){
									echo '<h1 class="hero-title title2 custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.3s">'.wp_kses_post($settings['title2']).'</h1>';
								}
								if(!empty($settings['desc'])){
									echo '<p class="hero-text desc custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.4s">'.wp_kses_post($settings['desc']).'</p>';
								}
								echo '<div class="btn-group custom-anim-left wow" data-wow-duration="1.2s" data-wow-delay="0.5s">';
								if(!empty($settings['button_text'])){
									echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
								}
								if(!empty($settings['button_text2'])){
									echo '<a href="'.esc_url( $settings['button_url2']['url'] ).'" class="th-btn th_btn2 style-border2">';
										echo '<span class="btn-border">'.wp_kses_post($settings['button_text2']).'</span>';
									echo '</a>';
								}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				if(!empty($settings['button_text3'])){
				echo '<div class="scroll-down">';
					echo '<a href="'.esc_url( $settings['button_url3']['url'] ).'" class="hero-5-scroll-wrap">'.wp_kses_post($settings['button_text3']).'</a>';
				echo '</div>';
				}
			echo '</div>';

		}

		
	}

}