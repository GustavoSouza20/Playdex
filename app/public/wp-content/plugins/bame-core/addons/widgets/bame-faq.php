<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class bame_Faq extends Widget_Base {

	public function get_name() {
		return 'bamefaq';
	}
	public function get_title() {
		return __( 'Faq', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two'] );

		bame_general_fields($this, 'faq_id', 'Faq ID', 'TEXT2', '1' );

        $repeater = new Repeater();

		bame_general_fields($repeater, 'faq_question', 'Faq Question', 'TEXTAREA', 'What Services Do You Offer?');
		bame_general_fields($repeater, 'faq_answer', 'Faq Answer', 'WYSIWYG', 'We specialize in providing top-notch pool service and maintenance');

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq Lists', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'What Services Do You Offer?', 'bame' ),
					],

				],
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Question Style-------
		bame_common_style_fields($this, 'question', 'Question', '{{WRAPPER}} .accordion-button');
		//-------Answer Style-------
		bame_common_style_fields($this, 'answer', 'Answer', '{{WRAPPER}} .accordion-body');


	}

	protected function render() {

	$settings = $this->get_settings_for_display();

	if( $settings['layout_style'] == '1' || $settings['layout_style'] == '2' || $settings['layout_style'] == '3' ){
			if($settings['layout_style'] == '1'){
			echo '<div class="accordion" id="faqAccordion'.esc_attr($settings['faq_id']).'">';
			}else{
				echo '<div class="accordion custom-anim-left wow " data-wow-duration="1.5s" data-wow-delay="0.2s" id="faqAccordion'.esc_attr($settings['faq_id']).'">';
			}
				$x = 0;
				foreach( $settings['faq_repeater'] as $single_data ){
					$unique_id = uniqid();
					$x++;
					if( $x == '1' ){
						$ariaexpanded 	= 'true';
						$class 			= 'show';
						$collesed 		= '';
						$is_active 		= 'active';
					}else{
						$ariaexpanded 	= 'false';
						$class 			= '';
						$collesed 		= 'collapsed';
						$is_active 		= '';
					}

				echo '<div class="accordion-card '.esc_attr( $is_active ).'">';
					echo '<div class="accordion-header" id="collapse-item-'.esc_attr( $unique_id ).'">';
						echo '<button class="accordion-button '.esc_attr( $collesed ).'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.esc_attr( $unique_id ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="collapse-'.esc_attr( $unique_id ).'">'.wp_kses_post($single_data['faq_question']).'</button>';
					echo '</div>';

					echo '<div id="collapse-'.esc_attr( $unique_id ).'" class="accordion-collapse collapse '.esc_attr( $class ).'" aria-labelledby="collapse-item-'.esc_attr( $unique_id ).'" data-bs-parent="#faqAccordion'.esc_attr($settings['faq_id']).'">';
						echo '<div class="accordion-body">';
							echo wp_kses_post($single_data['faq_answer']);
						echo '</div>';
					echo '</div>';
				echo '</div>';
				}
		echo '</div>';

	}
 

	}
}