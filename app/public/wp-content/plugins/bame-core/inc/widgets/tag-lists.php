<?php
/**
* @version  1.0
* @package  bame
* @author   Themeholy <themeholy@gmail.com>
*
* Websites: https://themeholy.com/
*
*/

/**************************************
* Creating tag List Widget
***************************************/

class Bame_Tag_List_Widget extends WP_Widget {

        function __construct() {

            parent::__construct(

                // Base ID of your widget

                'bame_tag_list_widget',

                // Widget name will appear in UI

                esc_html__( 'Bame:: Tag List', 'bame' ),

                // Widget description

                array(
                    'classname'                     => 'widget widget_tag_cloud',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add tag List Widget', 'bame' ),
                )
            );
        }

        // This is where the action happens

        public function widget( $args, $instance ) {

            $title  = apply_filters( 'widget_title', $instance['title'] );

            //before and after widget arguments are defined by themes

            echo $args['before_widget'];

           if( !empty( $title  ) ){
                echo '<h3 class="widget_title">'.esc_html( $title ).'</h3>';
            }

            if ( isset( $instance[ 'number' ] ) ) {
                $number = $instance[ 'number' ];
            }else {
                $number = '5';
            }

			$tags = get_tags();

            $limit= $number;

            $counter = 0;

                echo '<div class="tagcloud">';
                    foreach($tags as $tag){
                        if($counter<$limit){
                            echo '<a href="'. esc_url(get_tag_link($tag->term_id)) .'"><span>'. esc_html($tag->name) .'</span></a>';
                        }
                        $counter++; 
                    }
                echo '</div>';

            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

             //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = 'Tags';
            }

             //Number
            if ( isset( $instance[ 'number' ] ) ) {
                $number = $instance[ 'number' ];
            }else {
                $number = '5';
            }

            // Widget admin form
            ?>
             <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'bame'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of tag:' ,'bame'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
            </p>

            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['number']          = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';

            return $instance;
        }
    } // Class bame_tag_list_widget ends here


    // Register and load the widget
    function bame_tag_list_load_widget() {
        register_widget( 'bame_tag_list_widget' );
    }
    add_action( 'widgets_init', 'bame_tag_list_load_widget' );