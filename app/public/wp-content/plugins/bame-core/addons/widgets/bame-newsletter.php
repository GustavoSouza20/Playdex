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
 * Newsletter Widget .
 *
 */
class Bame_Newsletter extends Widget_Base {

	public function get_name() {
		return 'bamenewsletter';
	}
	public function get_title() {
		return __( 'Newsletter', 'bame' );
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
				'label'     => __( 'Newsletter Style', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three'] );

		bame_general_fields( $this, 'title', 'Title', 'TEXT', 'Sign Up For Newsletter', ['1', '2'] );
		bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA2', '', ['1', '2'] );

		bame_general_fields( $this, 'newsletter_placeholder', 'Placeholder', 'TEXT', 'Enter your Email' );
		bame_general_fields( $this, 'newsletter_button', 'Subscribe Button', 'TEXT', '<i class="fa-solid fa-paper-plane"></i>' );
		bame_general_fields( $this, 'checkbox_label', 'Checkbox Label', 'TEXT', 'I agree with the terms & conditions', ['1'] );

		bame_media_fields( $this, 'image3', 'Choose Image', ['2'] );
		bame_general_fields( $this, 'di', 'DIVIDER', 'DIVIDER', '', '1' );
		bame_media_fields( $this, 'image', 'Choose Image', ['1'] );
		bame_url_fields( $this, 'button_url', 'Button URL', [ '1' ] );
		bame_media_fields( $this, 'image2', 'Choose Image 2', ['1'] );
		bame_url_fields( $this, 'button_url2', 'Button URL 2', [ '1' ] );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------
		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .title', ['1', '2']);
		//-------Description Style-------
		bame_common_style_fields($this, 'desc', 'Description', '{{WRAPPER}} .desc', ['1', '2']);
		bame_common_style_fields($this, 'desc2', 'Checkbox Label', '{{WRAPPER}} .info', ['1']);

		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th_btn', ['3'] );

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="widget footer-widget">';
				if($settings['title']){
					echo '<h3 class="widget_title title">'.wp_kses_post($settings['title']).'</h3>';
				}
				echo '<div class="newsletter-widget">';
					if(!empty( $settings['desc'] )){
						echo '<p class="footer-text desc">'.wp_kses_post($settings['desc']).'</p>';
					}
					echo '<form action="#" class="newsletter-form">';
						echo '<input class="form-control" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
						echo '<button type="submit" class="simple-icon">'.wp_kses_post( $settings['newsletter_button'] ).'</button>';
					echo '</form>';
					if($settings['checkbox_label']){
						echo '<div class="form-group">';
							echo ' <input type="checkbox" id="checkbox" name="checkbox">';
							echo '<label for="checkbox info">'.wp_kses_post($settings['checkbox_label']).'</label>';
						echo '</div>';
					}
					echo '<div class="btn-group">';
						if(!empty($settings['image']['url'])){
							echo '<div class="img-btn">';
								echo '<a href="'.esc_url( $settings['button_url']['url'] ).'">';
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['image']['url'] ),
									));
								echo '</a>';
							echo '</div>';
						}
						if(!empty($settings['image2']['url'])){
							echo '<div class="img-btn">';
								echo '<a href="'.esc_url( $settings['button_url2']['url'] ).'">';
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['image2']['url'] ),
									));
								echo '</a>';
							echo '</div>';
						}
					echo '</div>';
					
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="subscribe-wrap1" data-bg-src="'.esc_url( $settings['image3']['url'] ).'">';
				echo '<div class="row align-items-center gy-30">';
					echo '<div class="col-xl-6">';
						echo '<div class="title-area mb-0 text-xl-start text-center">';
							if($settings['title']){
								echo '<h2 class="sec-title title">'.wp_kses_post($settings['title']).'</h2>';
							}
							if(!empty( $settings['desc'] )){
								echo '<p class="sec-text mt-25 desc">'.wp_kses_post($settings['desc']).'</p>';
							}
						echo '</div>';
					echo '</div>';
					echo '<div class="col-xl-6">';
						echo '<form class="newsletter-form">';
							echo '<div class="form-group">';
								echo '<input class="form-control" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
								echo '<button type="submit" class="th-btn">'.wp_kses_post( $settings['newsletter_button'] ).'</button>';
							echo '</div>';
						echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<form class="newsletter-form">';
				echo '<div class="form-group">';
					echo '<input class="form-control" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" required="">';
					echo '<button type="submit" class="th-btn th_btn">'.wp_kses_post( $settings['newsletter_button'] ).'</button>';
				echo '</div>';
			echo '</form>';

		}
	

	}
}
						