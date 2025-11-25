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
 * Contact Form Widget .
 *
 */
class bame_Contact_Form extends Widget_Base {

	public function get_name() {
		return 'bamecontactform';
	}
	public function get_title() {
		return __( 'Contact Form', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	public function get_as_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $as_cfa         = array();
        $as_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $as_forms       = get_posts( $as_cf_args );
        $as_cfa         = ['0' => esc_html__( 'Select Form', 'bame' ) ];
        if( $as_forms ){
            foreach ( $as_forms as $as_form ){
                $as_cfa[$as_form->ID] = $as_form->post_title;
            }
        }else{
            $as_cfa[ esc_html__( 'No contact form found', 'bame' ) ] = 0;
        }
        return $as_cfa;
    }

	protected function register_controls() {

		$this->start_controls_section(
			'contact_form_section',
			[
				'label' 	=> __( 'Contact Form', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', ['Style One', 'Style Two'] ); 

		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA', 'Book An Appointment', ['2'] );

		$this->add_control(
            'bame_select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'bame' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_as_contact_form(),
            ]
        );

		$fields_to_include = [ 'title' => ['Title'], 'desc' => ['Content'] ];
		bame_repeater_fields( $this, 'contact_lists', 'Contact Lists', $fields_to_include, [ '2' ] );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------
		bame_common_style_fields( $this, 'title', 'Form Title', '{{WRAPPER}} .title', ['2'] );
		bame_common_style_fields( $this, 'title2', 'Contact Title', '{{WRAPPER}} .title2', ['2'] );
		bame_common_style_fields( $this, 'desc', 'Contact Content', '{{WRAPPER}} div, {{WRAPPER}} .contact-feature_link', ['2'] );
		//------Button Style-------
		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th-btn');
		

	}

	protected function render() {

	    $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="contact-form ajax-contact pb-xl-0 space-bottom custom-anim-left wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
				if( !empty($settings['bame_select_contact_form']) ){
					echo do_shortcode( '[contact-form-7  id="'.$settings['bame_select_contact_form'].'"]' ); 
				}else{
					echo '<div class="alert alert-warning"><p class="m-0">' . __('Please Select contact form.', 'bame' ). '</p></div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="row gy-40 justify-content-between">';
                echo '<div class="col-xxl-5 col-xl-6">';
                    echo '<div class="contact-wrap2 me-xl-4">';
						foreach( $settings['contact_lists'] as $data ){
							echo '<div class="contact-feature2">';
								echo '<div class="media-body">';
									if(!empty($data['title'])){
										echo '<h4 class="box-title title2">'.wp_kses_post($data['title']).'</h4>';
									}
									if(!empty($data['content'])){
										echo '<div>'.wp_kses_post($data['content']).'</div>';
									}
								echo '</div>';
							echo '</div>';
						}
                    echo '</div>';
                echo '</div>';
                echo '<div class="col-xxl-7 col-xl-6">';
					if(!empty($settings['title'])){
						echo '<div class="title-area">';
							echo '<h2 class="sec-title title">'.esc_html($settings['title']).'</h2>';
						echo '</div>';
					}
                    echo '<div class="contact-form ajax-contact pb-xl-0">';
						if( !empty($settings['bame_select_contact_form']) ){
							echo do_shortcode( '[contact-form-7  id="'.$settings['bame_select_contact_form'].'"]' ); 
						}else{
							echo '<div class="alert alert-warning"><p class="m-0">' . __('Please Select contact form.', 'bame' ). '</p></div>';
						}
                    echo '</div>';
                echo '</div>';
            echo '</div>';

		}


	}

}