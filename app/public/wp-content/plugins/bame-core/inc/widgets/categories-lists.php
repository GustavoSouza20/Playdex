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
* Creating Category List Widget
***************************************/

class bame_category_list_widget extends WP_Widget {

        function __construct() {

            parent::__construct(

                // Base ID of your widget

                'bame_category_list_widget',

                // Widget name will appear in UI

                esc_html__( 'Bame :: Category List', 'bame' ),

                // Widget description

                array(
                    'classname'                     => 'widget widget_categories',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Category List Widget', 'bame' ),
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

			$categories = get_categories();

            $limit= $number;

            $counter = 0;

                echo '<ul>';
                    foreach($categories as $category){
                        if($counter<$limit){
                            echo '<li>';
                                echo '<a href="'.esc_url( get_category_link( $category->term_id ) ).'">'.esc_html($category->name).'</a>';
                                echo ' <span>('.esc_html($category->category_count).')</span>';
                            echo '</li>';
                        }
                        $counter++; 
                    }
                echo '</ul>';

            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

             //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = 'Categories';
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
                <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of Category:' ,'bame'); ?></label>
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
    } // Class bame_category_list_widget ends here


    // Register and load the widget
    function bame_category_list_load_widget() {
        register_widget( 'bame_category_list_widget' );
    }
    add_action( 'widgets_init', 'bame_category_list_load_widget' );