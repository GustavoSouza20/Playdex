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
 * CTA Widget .
 *
 */
class bame_Cta extends Widget_Base {

	public function get_name() {
		return 'bamecta';
	}
	public function get_title() {
		return __( 'CTA', 'bame' );
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
				'label'		 	=> __( 'CTA', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One', 'Style Two', 'Style Three', 'Style Four', 'Style Five' ] );

		// Layout Style 1
		$fields_to_include = [ 'image' => ['Choose Image', 'Choose Image 2', 'Choose thumb'], 'title' => ['Title'], 'desc' => ['Description'], 'btn' => ['Button Text'], 'url' => ['Button URL'] ];
		bame_repeater_fields( $this, 'cta_lists', 'Cta List', $fields_to_include, [ '1' ] );

		bame_media_fields( $this, 'bg', 'Choose BG Image', ['2', '5'] );
		bame_media_fields( $this, 'image2', 'Choose Image', ['2', '4', '5'] );
		bame_media_fields( $this, 'image3', 'Choose Image', ['2'] );
		bame_media_fields( $this, 'image4', 'Choose Image', ['3'] );

		bame_media_fields( $this, 'subtitle_shape', 'Choose Subtitle Shape', ['5'] );
		bame_general_fields( $this, 'subtitle', 'Subtitle', 'TEXTAREA2', '# World Best Gaming Site', ['2', '4', '5'] );
		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Join Bame Esports to Become Next', ['2', '3', '4', '5'] );
		bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA', 'Esports and gaming facilities requires thoughtful consideration', ['2', '3', '4', '5'] );

		bame_general_fields( $this, 'title2', 'Shadow Title', 'TEXTAREA2', 'Download', ['5'] );

		bame_general_fields( $this, 'button_text', 'Button Text', 'TEXT', 'JOIN COMMUNITY', [ '2', '3', '4' ] );
		bame_media_fields( $this, 'icon', 'Choose Icon', ['5'] );
		bame_url_fields( $this, 'button_url', 'Button URL', [ '2', '3', '4', '5' ] );
		bame_general_fields( $this, 'button_text2', 'Button Text', 'TEXT', 'JOIN COMMUNITY', [ '3' ] );
		bame_media_fields( $this, 'icon2', 'Choose Icon', ['5'] );
		bame_url_fields( $this, 'button_url2', 'Button URL', [ '3', '5' ] );
			
        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Subtitle Style-------
		bame_common_style_fields( $this, 'subtitle', 'Subtitle', '{{WRAPPER}} .sub', ['2', '4', '5'] );
		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title', ['1', '2', '3', '4', '5'] );
		//-------Desc Style-------
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc', ['1', '2', '3', '4', '5'] );
		//------Button Style-------
		bame_button3_style_fields( $this, '10', 'Button Styling', '{{WRAPPER}} .th_btn', ['1'] );
		bame_button_style_fields( $this, '11', 'Button Styling', '{{WRAPPER}} .th_btn', ['2', '3', '4'] );
		bame_button3_style_fields( $this, '12', 'Button 2 Styling', '{{WRAPPER}} .th_btn2', ['3'] );

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="swiper th-slider hero-cta-slider1" id="heroSlider1" data-slider-options=\'{"effect":"fade"}\'>';
				echo '<div class="swiper-wrapper">';
					foreach( $settings['cta_lists'] as $key => $data ){
						$mask = 'mask0_47_22'.$key;
						$filter0 = 'filter0_f_47_22'.$key;
						$paint = 'paint0_linear1_47_22'.$key;
						$filter1 = 'filter01_f_47_22'.$key; 
						echo '<div class="swiper-slide">';
							echo '<div class="hero-cta-inner">';
								echo '<div class="container th-container2">';
									echo '<div class="hero-shape-area">';
										echo '<div class="hero-bg-shape">';
											echo '<div class="hero-bg-border-anime" data-mask-src="'.BAME_ASSETS.'img/hero-bg-shape.png"></div>';
											echo '<svg viewBox="0 0 1600 520" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1599 30V490C1599 506.016 1586.02 519 1570 519H1062.43C1054.74 519 1047.36 515.945 1041.92 510.506L1009.49 478.08C1003.68 472.266 995.795 469 987.574 469H612.426C604.205 469 596.32 472.266 590.506 478.08L558.08 510.506C552.641 515.945 545.265 519 537.574 519H30C13.9837 519 1 506.016 1 490V30C1 13.9837 13.9837 1 30 1H400H537.574C545.265 1 552.641 4.05535 558.08 9.4939L590.506 41.9203C596.32 47.7339 604.205 51 612.426 51H987.574C995.795 51 1003.68 47.7339 1009.49 41.9203L1041.92 9.4939C1047.36 4.05535 1054.74 1 1062.43 1H1200H1570C1586.02 1 1599 13.9837 1599 30Z" fill="black" stroke="url(#'.esc_attr($paint).')" stroke-width="2" />
												<mask id="'.esc_attr($mask).'" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0">
													<path d="M1600 490V30C1600 13.4315 1586.57 0 1570 0H1200H1062.43C1054.47 0 1046.84 3.1607 1041.21 8.7868L1008.79 41.2132C1003.16 46.8393 995.53 50 987.574 50H612.426C604.47 50 596.839 46.8393 591.213 41.2132L558.787 8.7868C553.161 3.16071 545.53 0 537.574 0H400H30C13.4315 0 0 13.4314 0 30V490C0 506.569 13.4315 520 30 520H537.574C545.53 520 553.161 516.839 558.787 511.213L591.213 478.787C596.839 473.161 604.47 470 612.426 470H987.574C995.53 470 1003.16 473.161 1008.79 478.787L1041.21 511.213C1046.84 516.839 1054.47 520 1062.43 520H1570C1586.57 520 1600 506.569 1600 490Z" fill="black" />
												</mask>
												<g mask="url(#'.esc_attr($mask).')">
													<g filter="url(#'.esc_attr($filter0).')">
														<circle cx="1413" cy="314" r="287" fill="var(--theme-color2)" fill-opacity="0.2" />
													</g>
													<g filter="url(#'.esc_attr($filter1).')">
														<circle cx="231" cy="172" r="229" fill="var(--theme-color)" fill-opacity="0.5" />
													</g>
												</g>
												<defs>
													<filter id="'.esc_attr($filter0).'" x="566" y="-533" width="1694" height="1694" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
														<feFlood flood-opacity="0" result="BackgroundImageFix" />
														<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
														<feGaussianBlur stdDeviation="280" result="effect1_foregroundBlur_47_22" />
													</filter>
													<filter id="'.esc_attr($filter1).'" x="-558" y="-617" width="1578" height="1578" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
														<feFlood flood-opacity="0" result="BackgroundImageFix" />
														<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
														<feGaussianBlur stdDeviation="280" result="effect1_foregroundBlur_47_22" />
													</filter>
													<linearGradient id="'.esc_attr($paint).'" x1="0" y1="0" x2="1600" y2="520" gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="var(--theme-color)" />
														<stop offset="1" stop-color="var(--theme-color2)" />
													</linearGradient>
												</defs>
											</svg>';
											echo '<div class="verses-thumb d-xl-none d-block">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_thumb']['url'] ),
												));
											echo '</div>';
											echo '<div class="hero-img1 z-index-common" data-ani="slideinleft" data-ani-delay="0.4s">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_image']['url'] ),
												));
											echo '</div>';
											echo '<div class="hero-img2 z-index-common" data-ani="slideinright" data-ani-delay="0.4s">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_image_2']['url'] ),
												));
											echo '</div>';
										echo '</div>';
										echo '<div class="title-area mb-0">';
											if(!empty($data['title'])){
												echo '<h2 class="sec-title title custom-anim-top wow" data-wow-duration="1.3s" data-wow-delay="0.1s">'.wp_kses_post($data['title']).'</h2>';
											}
											if(!empty($data['description'])){
												echo '<p class="mt-30 mb-35 desc custom-anim-top wow" data-wow-duration="1.3s" data-wow-delay="0.2s">'.wp_kses_post($data['description']).'</p>';
											}
											if(!empty($data['button_text'])){
												echo '<div class="btn-group custom-anim-top wow" data-wow-duration="1.3s" data-wow-delay="0.2s">';
													echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="th-btn th_btn style-border">';
														echo '<span class="btn-border">';
															echo wp_kses_post($data['button_text']);
														echo '</span>';
													echo '</a>';
												echo '</div>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
				echo '<div class="slider-pagination"></div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="container th-container4">';
				echo '<div class="cta-area-1">';
					echo '<div class="cta-bg-shape-border">';
						echo '<svg width="1464" height="564" viewBox="0 0 1464 564" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1463.5 30V534C1463.5 550.292 1450.29 563.5 1434 563.5H1098H927.426C919.603 563.5 912.099 560.392 906.567 554.86L884.14 532.433C878.42 526.713 870.663 523.5 862.574 523.5H601.426C593.337 523.5 585.58 526.713 579.86 532.433L557.433 554.86C551.901 560.392 544.397 563.5 536.574 563.5H366H30C13.7076 563.5 0.5 550.292 0.5 534V30C0.5 13.7076 13.7076 0.5 30 0.5H366H536.574C544.397 0.5 551.901 3.60802 557.433 9.14034L579.86 31.5668C585.58 37.2866 593.337 40.5 601.426 40.5H862.574C870.663 40.5 878.42 37.2866 884.14 31.5668L906.567 9.14035C912.099 3.60803 919.603 0.5 927.426 0.5H1098H1434C1450.29 0.5 1463.5 13.7076 1463.5 30Z" stroke="url(#paint0_linear_202_547)" />
							<defs>
								<linearGradient id="paint0_linear_202_547" x1="0" y1="0" x2="1505.47" y2="412.762" gradientUnits="userSpaceOnUse">
									<stop offset="0" stop-color="var(--theme-color)" />
									<stop offset="1" stop-color="var(--theme-color2)" />
								</linearGradient>
							</defs>
						</svg>';
					echo '</div>';
					echo '<div class="cta-wrap-bg bg-repeat" data-bg-src="'.esc_url($settings['bg']['url']).'" data-mask-src="'.BAME_ASSETS.'img/cta-bg-shape1.svg">';
						echo '<div class="cta-bg-img">';
							echo bame_img_tag( array(
								'url'   => esc_url( $settings['image2']['url'] ),
							));
						echo '</div>';
						echo '<div class="cta-thumb">';
							echo bame_img_tag( array(
								'url'   => esc_url( $settings['image3']['url'] ),
							));
						echo '</div>';
					echo '</div>';
					echo '<div class="cta-wrap">';
						echo '<div class="row">';
							echo '<div class="col-xl-5">';
								echo '<div class="title-area mb-0 custom-anim-left wow" data-wow-duration="1.5s" data-wow-delay="0.2s">';
									if($settings['subtitle']){
										echo '<span class="sub-title sub">'.wp_kses_post($settings['subtitle']).'</span>';
									}
									if($settings['title']){
										echo '<h2 class="sec-title title">'.wp_kses_post($settings['title']).'</h2>';
									}
									if($settings['desc']){
										echo '<p class="mt-30 mb-30 desc">'.wp_kses_post($settings['desc']).'</p>';
									}
									if(!empty($settings['button_text'])){
										echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="cta-wrap2">'; 
				echo '<div class="cta-border-shape" data-mask-src="'.BAME_ASSETS.'img/cta-wrap2-bg-shape2.png"></div>';
				echo '<div class="cta-wrap-content" data-mask-src="'.BAME_ASSETS.'img/cta-wrap2-bg-shape.png">';
					echo '<div class="cta-border-shape2" data-bg-src="'.esc_url($settings['image4']['url']).'"></div>';
					echo '<div class="title-area mb-0 custom-anim-top wow" data-wow-duration="1.5s" data-wow-delay="0.2s">';
							if($settings['title']){
								echo '<h2 class="sec-title title">'.wp_kses_post($settings['title']).'</h2>';
							}
							if($settings['desc']){
								echo '<p class="mt-30 mb-30 desc">'.wp_kses_post($settings['desc']).'</p>';
							}
							echo '<div class="btn-wrap justify-content-center">';
							if(!empty($settings['button_text'])){
								echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
							}
							if(!empty($settings['button_text2'])){
								echo '<a href="'.esc_url( $settings['button_url2']['url'] ).'" class="th-btn style-border th_btn2"><span class="btn-border">'.wp_kses_post($settings['button_text2']).' </span></a>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="cta-wrap3">';
				echo '<div class="row gx-0 gy-40 align-items-center flex-row-reverse">';
					echo '<div class="col-xl-7">';
						if(!empty($settings['image2']['url'])){
							echo '<div class="cta-thumb3-1 custom-anim-left wow" data-wow-duration="1.5s" data-wow-delay="0.1s">';
								echo bame_img_tag( array(
									'url'   => esc_url( $settings['image2']['url'] ),
								));
							echo '</div>';
						}
					echo '</div>';
					echo '<div class="col-xl-5">';
						echo '<div class="title-area mb-0 custom-anim-left wow" data-wow-duration="1.5s" data-wow-delay="0.1s">';
							if ( !empty($settings['subtitle' ]) ){
								echo '<span class="sub-title sub style3">';
									echo '<span class="sub-title-shape icon-masking">';
										echo '<span class="mask-icon" data-mask-src="'.BAME_ASSETS.'img/section-title-bg.svg"></span>';
									echo '</span>';
									echo wp_kses_post( $settings['subtitle' ] );
								echo '</span>';
							}
							if($settings['title']){
								echo '<h2 class="sec-title mb-0 title">'.wp_kses_post($settings['title']).'</h2>';
							}
							if($settings['desc']){
								echo '<p class="mt-20 mb-30 desc">'.wp_kses_post($settings['desc']).'</p>';
							}
							if(!empty($settings['button_text'])){
								echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '5' ){
			echo '<div class="cta-area-5" data-bg-src="'.esc_url($settings['bg']['url']).'">';
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="col-lg-5">';
							echo '<div class="cta-wrap5 space">';
								echo '<div class="title-area mb-20">';
									if($settings['subtitle']){
										echo '<span class="sub-title style3 sub">';
											echo '<span class="sub-title-shape icon-masking">';
												echo '<span class="mask-icon" data-mask-src="'.esc_url($settings['subtitle_shape']['url']).'"></span>';
											echo '</span>';
											echo wp_kses_post($settings['subtitle']);
										echo '</span>';
									}
									if($settings['title']){
										echo '<h2 class="sec-title title">'.wp_kses_post($settings['title']).'</h2>';
									}
									if($settings['title2']){
										echo '<div class="shadow-title title2">'.wp_kses_post($settings['title2']).'</div>';
									}
								echo '</div>';
								if($settings['desc']){
									echo '<p class="mb-35 desc">'.wp_kses_post($settings['desc']).'</p>';
								}
								echo '<div class="btn-wrap">';
									if(!empty($settings['icon']['url'])){
									echo '<a href="'.esc_url( $settings['button_url']['url'] ).'">';
										echo bame_img_tag( array(
											'url'   => esc_url( $settings['icon']['url'] ),
										));
									echo '</a>';
									}
									if(!empty($settings['icon2']['url'])){
									echo '<a href="'.esc_url( $settings['button_url2']['url'] ).'">';
										echo bame_img_tag( array(
											'url'   => esc_url( $settings['icon2']['url'] ),
										));
									echo '</a>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="col-lg-7 align-self-end">';
							echo '<div class="cta-thumb5">';
								echo bame_img_tag( array(
									'url'   => esc_url( $settings['image2']['url'] ),
								));
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}
		

	}

}