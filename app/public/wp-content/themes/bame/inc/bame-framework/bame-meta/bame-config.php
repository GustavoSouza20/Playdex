<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function bame_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'bame_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function bame_register_metabox() {

	$prefix = '_bame_';

	$prefixpage = '_bamepage_';
	
	$bame_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'bame' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );

    $bame_post_meta->add_field( array(
        'name' => esc_html__( 'Post Format Video', 'bame' ),
        'desc' => esc_html__( 'Use This Field When Post Format Video', 'bame' ),
        'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );

	$bame_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'bame' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'bame' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$bame_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'bame' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'bame' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );
	
	$bame_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'bame' ),
		'object_types'  => array( 'page', 'bame_event' ), // Post type
        'closed'        => true
    ) );

    $bame_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'bame' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'bame' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','bame'),
            '2'     => esc_html__('Hide','bame'),
        )
    ) );


    $bame_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'bame' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__('Global Settings','bame'),
            'page'     => esc_html__('Page Settings','bame'),
        )
	) );

    $bame_page_meta->add_field( array(
        'name'    => esc_html__( 'Breadcumb Image', 'bame' ),
        'desc'    => esc_html__( 'Upload an image or enter an URL.', 'bame' ),
        'id'      => $prefix . 'breadcumb_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => __( 'Add File', 'bame' ) // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

    $bame_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'bame' ),
		'desc' => esc_html__( 'check to display Page Title.', 'bame' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','bame'),
            '2'     => esc_html__('Hide','bame'),
        )
	) );

    $bame_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'bame' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','bame'),
            'custom'  => esc_html__('Custom Title','bame'),
        ),
        'default'   => 'default'
    ) );

    $bame_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'bame' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $bame_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'bame' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'bame' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => bame_set_checkbox_default_for_new_post( true ),
    ) );

    $bame_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'bame' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$bame_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'bame' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'bame' ),
            '2' => esc_html__( 'Container Fluid', 'bame' ),
            '3' => esc_html__( 'Fullwidth', 'bame' ),
        ),
	) );

	// code for body class//

    $bame_layout_meta->add_field( array(
	'name' => esc_html__( 'Insert Your Body Class', 'bame' ),
	'id'   => $prefix . 'custom_body_class',
	'type' => 'text'
    ) );

}

add_action( 'cmb2_admin_init', 'bame_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function bame_register_taxonomy_metabox() {

    $prefix = '_bame_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$bame_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'bame' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$bame_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'bame' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$bame_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'bame' ),
		'desc' => esc_html__( 'Set Category Image', 'bame' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','bame') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$bame_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'bame' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta as post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
    $bame_user->add_field( array(
		'name' => esc_html__( 'Author Designation', 'bame' ),
		'desc' => esc_html__( 'Use This Field When Author Designation', 'bame' ),
		'id'   => $prefix . 'author_desig',
        'type' => 'text',
    ) );
	$bame_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'bame' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $bame_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'bame' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'bame' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'bame' ),
            'remove_button'     => __( 'Remove Social Profile', 'bame' ),
            'closed'         => true
        ),
    ) );

    $bame_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Icon Class', 'bame' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'text', // This field type
    ) );

    $bame_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'bame' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'bame' ),
        'type'       => 'text'
    ) );
}


if ( ! function_exists( 'cmb2_tournament_fields' ) ) {
    function cmb2_tournament_fields() {
        $prefix = '_tournament_'; // Change this prefix as needed

        // Create a new metabox
        $cmb = new_cmb2_box( array(
            'id'            => 'tournament_metabox',
            'title'         => __( 'Tournament Fields', 'bame' ),
            'object_types'  => array( 'tournament' ),
            'context'       => 'normal',
            'priority'      => 'high',
            'classes'       => 'cmb2-two-columns',
        ) );

        // Add a heading field
        $cmb->add_field( array(
            'name'             => __( 'Tournament Status', 'bame' ),
            'id'               => $prefix . 'status',
            'type'             => 'select',
            'options'          => array(
                'upcoming'  => __( 'Upcoming', 'bame' ),
                'finished'  => __( 'Finished', 'bame' ),
            ),
            'default'          => 'upcoming',
            'show_option_none' => false,
        ) );
        
        $cmb->add_field(array(
            'name' => __('Player/Team 1', 'bame'),
            'id'   => $prefix . 'tournament_heading',
            'type' => 'title',
        ));
        $cmb->add_field( array(
            'name' => __( 'Image', 'bame' ),
            'id'   => $prefix . 'image1',
            'type' => 'file',
        ) );
        $cmb->add_field( array(
            'name' => __( 'Subtitle', 'bame' ),
            'id'   => $prefix . 'subtitle1',
            'type' => 'text',
        ) );
        $cmb->add_field( array(
            'name' => __( 'Title', 'bame' ),
            'id'   => $prefix . 'title1',
            'type' => 'text',
        ) );

        // Add a heading field
        $cmb->add_field(array(
            'name' => __('Player/Team 2', 'bame'),
            'id'   => $prefix . 'tournament_heading2',
            'type' => 'title',
        ));
        $cmb->add_field( array(
            'name' => __( 'Image', 'bame' ),
            'id'   => $prefix . 'image2',
            'type' => 'file',
        ) );
        $cmb->add_field( array(
            'name' => __( 'Subtitle', 'bame' ),
            'id'   => $prefix . 'subtitle2',
            'type' => 'text',
        ) );
        $cmb->add_field( array(
            'name' => __( 'Title', 'bame' ),
            'id'   => $prefix . 'title2',
            'type' => 'text',
        ) );

        // Add a heading field
        $cmb->add_field(array(
            'name' => __('Other Information', 'bame'),
            'id'   => $prefix . 'tournament_heading3',
            'type' => 'title',
        ));
        $cmb->add_field( array(
            'name' => __( 'V/S Image', 'bame' ),
            'id'   => $prefix . 'vs_image',
            'type' => 'file',
        ) );
        $cmb->add_field( array(
            'name' => __( 'Time', 'bame' ),
            'id'   => $prefix . 'time',
            'type' => 'text',
        ) );
        $cmb->add_field( array(
            'name' => __( 'Date', 'bame' ),
            'id'   => $prefix . 'date',
            'type' => 'text',
        ) );
        $cmb->add_field( array(
            'name' => __( 'Game Points', 'bame' ),
            'id'   => $prefix . 'points',
            'type' => 'text',
        ) );

        // Repeater social field
        $tournament_repeat_group = $cmb->add_field(array(
            'id'          => $prefix . 'tournament_repeat_group',
            'type'        => 'group',
            'description' => __('Tournament Social Links', 'bame'),
            'options'     => array(
                'group_title'   => __('Tournament {#}', 'bame'),
                'add_button'    => __('Add Another Tournament', 'bame'),
                'remove_button' => __('Remove Tournament', 'bame'),
                'sortable'      => true,
            ),
        ));
        $cmb->add_group_field($tournament_repeat_group, array(
            'name' => __('Social Icon', 'bame'),
            'id'   => $prefix . 'social_icon',
            'description' => __('Use icon class name only (fab fa-youtube)', 'bame'),
            'type' => 'text',
        ));
        $cmb->add_group_field($tournament_repeat_group, array(
            'name' => __('Social Name', 'bame'),
            'id'   => $prefix . 'social_name',
            'type' => 'text',
        ));
        $cmb->add_group_field($tournament_repeat_group, array(
            'name' => __('Social URL', 'bame'),
            'id'   => $prefix . 'social_url',
            'type' => 'text_url',
        ));
        
    }

    add_action( 'cmb2_init', 'cmb2_tournament_fields' );
}

