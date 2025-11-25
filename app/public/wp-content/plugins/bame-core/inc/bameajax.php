<?php
/**
 * @Packge     : Bame
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function bame_core_essential_scripts( ) {
    wp_enqueue_script('bame-ajax',BAME_PLUGDIRURI.'assets/js/bame.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'bame-ajax',
    'bameajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'bame-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','bame_core_essential_scripts');


// bame Section subscribe ajax callback function
add_action( 'wp_ajax_bame_subscribe_ajax', 'bame_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_bame_subscribe_ajax', 'bame_subscribe_ajax' );

function bame_subscribe_ajax( ){
  $apiKey = bame_opt('bame_subscribe_apikey');
  $listid = bame_opt('bame_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'bame-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'bame').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'bame').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'bame').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'bame').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'bame').'</div>';
        }
   }

   wp_die();

}

add_action('wp_ajax_bame_addtocart_notification','bame_addtocart_notification');
add_action('wp_ajax_nopriv_bame_addtocart_notification','bame_addtocart_notification');
function bame_addtocart_notification(){

    $_product = wc_get_product($_POST['prodid']);
    $response = [
        'img_url'   => esc_url( wp_get_attachment_image_src( $_product->get_image_id(),array('60','60'))[0] ),
        'title'     => wp_kses_post( $_product->get_title() )
    ];
    echo json_encode($response);

    wp_die();
}