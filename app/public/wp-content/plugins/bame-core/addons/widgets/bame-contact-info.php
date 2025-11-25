
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
 * Contact Info Widget .
 *
 */
class Bame_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'bamecontactinfo';
	}
	public function get_title() {
		return __( 'Contact Info', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() { 

		$this->start_controls_section(
			'title_section',
			[
				'label' 	=> __( 'Contact Info', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', ['Style One', 'Style Two'] );

        $repeater = new Repeater();

		bame_media_fields($repeater, 'icon', 'Choose Icon');
		bame_general_fields($repeater, 'label', 'Label', 'TEXT', 'Label');
		bame_general_fields($repeater, 'content', 'Content', 'TEXTAREA', '');
		bame_general_fields($repeater, 'content2', 'Content 2', 'TEXTAREA', '');

		$this->add_control(
			'contact_info_lists',
			[
				'label' 		=> __( 'Banners', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'label' 	=> __( 'Label', 'bame' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
		);

		bame_general_fields($this, 'title', 'Title', 'TEXT', 'Office', ['2'] );
		bame_general_fields($this, 'content', 'Content', 'TEXTAREA', 'Content', ['2'] );

		bame_general_fields($this, 'title2', 'Title', 'TEXT', 'Contact', ['2'] );
		bame_general_fields($this, 'content2', 'Content', 'TEXTAREA', 'Content', ['2'] );

		bame_general_fields($this, 'title3', 'Title', 'TEXT', 'Follow Us', ['2'] );
		bame_social_fields( $this, 'social_icon_list', 'Social Media', ['2'] );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields( $this, 'label', 'Label', '{{WRAPPER}} .box-title', ['1'] );
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title', ['2'] );
		bame_common_style_fields( $this, 'title2', 'Content', '{{WRAPPER}} .info-box_text, {{WRAPPER}} .info-box_text a', ['2'] );
		//-------Content Style-------
		bame_common_style_fields( $this, 'content', 'Content', '{{WRAPPER}} .contact-feature_link', ['1'] );

		
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

			
		if( $settings['layout_style'] == '1' ){
			foreach( $settings['contact_info_lists'] as $data ){
				echo '<div class="contact-feature">';
					echo '<div class="contact-feature-icon icon-masking">';
						echo '<span class="mask-icon" data-mask-src="'.esc_url( $data['icon']['url'] ).'"></span>';
						echo bame_img_tag( array(
							'url'   => esc_url( $data['icon']['url'] ),
						));
					echo '</div>';
					echo '<div class="media-body">';
						if(!empty($data['label'])){
							echo '<h4 class="box-title">'.wp_kses_post($data['label']).'</h4>';
						}
						if(!empty($data['content'])){
							echo wp_kses_post($data['content']);
						}
						if(!empty($data['content2'])){
							echo wp_kses_post($data['content2']);
						}
					echo '</div>';
				echo '</div>';
			}

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="widget-area">';
				echo '<div class="row justify-content-between">';
					echo '<div class="col-md-6 col-lg-auto">';
						echo '<div class="widget footer-widget">';
							if($settings['title']){
								echo '<h3 class="widget_title title">'.wp_kses_post($settings['title']).'</h3>';
							}
							if($settings['content']){
							echo '<div class="th-widget-contact">';
								echo '<div class="info-box">';
									echo '<p class="info-box_text">'.wp_kses_post($settings['content']).'</p>';
								echo '</div>';
							echo '</div>';
							}
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-6 col-lg-auto">';
						echo '<div class="widget footer-widget">';
							if($settings['title2']){
								echo '<h3 class="widget_title title">'.wp_kses_post($settings['title2']).'</h3>';
							}
							if($settings['content2']){
							echo '<div class="th-widget-contact">';
								echo '<div class="info-box">';
									echo '<p class="info-box_text">'.wp_kses_post($settings['content2']).'</p>';
								echo '</div>';
							echo '</div>';
							}
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-6 col-lg-auto">';
						echo '<div class="widget footer-widget">';
							if($settings['title3']){
								echo '<h3 class="widget_title title">'.wp_kses_post($settings['title3']).'</h3>';
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
				echo '</div>';
			echo '</div>';
			

		}
       

	}

}
