<?php
namespace Eventin\Blocks\BlockTypes;

use Etn\Core\Event\Event_Model;
use Eventin\Blocks\BlockTypes\AbstractBlock;
use Wpeventin;

/**
 * Event Social Gutenberg block
 */
class EventSocial extends AbstractBlock {
    /**
     * Block name.
     *
     * @var string
     */
    protected $block_name = 'event-social';

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
        } else {
            $event_id = get_the_ID();
        }

        $event = new Event_Model( $event_id );

        $event_socials = $event->get_social();

        ob_start();
        ?>
        <?php echo $this->render_frontend_css( $styles, $container_class ); ?>
        <?php
        require_once Wpeventin::templates_dir() . 'event/parts/event-social.php';
        ?>

        <?php
        return ob_get_clean();
    }
}

