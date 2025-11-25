<?php
namespace Eventin\Blocks\BlockTypes;

use Etn\Core\Event\Event_Model;
use Eventin\Blocks\BlockTypes\AbstractBlock;
use Wpeventin;

/**
 * Event Date Time Gutenberg block
 */
class EventDateTime extends AbstractBlock {
    /**
     * Block name.
     *
     * @var string
     */
    protected $block_name = 'event-datetime';

    /**
     * Include and render the block
     *
     * @param   array  $attributes  Block attributes. Default empty array
     * @param   string  $content     Block content. Default empty string
     * @param   WP_Block  $block       Block instance
     *
     * @return  string Rendered block type output
     */
    protected function render( $attributes, $content, $block ) {
        $container_class = ! empty( $attributes['containerClassName'] ) ? $attributes['containerClassName'] : '';
        $styles = ! empty( $attributes['styles'] ) ? $attributes['styles'] : [];

        if ( $this->is_editor() ) {
            $event_id = ! empty( $attributes['eventId'] ) ? intval( $attributes['eventId'] ) : 0;
        } else if ( 'etn-template' == get_post_type( get_the_ID() ) ) {
            $template = new \Eventin\Template\TemplateModel( get_the_ID() );
            $event_id = $template->get_preview_event_id();
        } else {
            $event_id = get_the_ID();
        }

        $event = new Event_Model( $event_id );
        $date_format = etn_date_format();
        $time_format = etn_time_format();

        $start_date = $event->get_start_date( $date_format );
        $start_time = $event->get_start_time( $time_format );
        $end_date   = $event->get_end_date( $date_format );
        $end_time   = $event->get_end_time( $time_format );
        $timezone   = $event->get_timezone();

        ob_start();
        ?>
        <?php echo $this->render_frontend_css( $styles, $container_class ); ?>
        <?php
        require_once Wpeventin::templates_dir() . 'event/parts/event-datetime.php';
        ?>

        <?php
        return ob_get_clean();
    }
}

