<?php
/**
 * bame Dashboard Install Plugins Page
 *
 * @package bame
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bame_my_theme = wp_get_theme();
if ( $bame_my_theme->parent_theme ) {
	$bame_my_theme = wp_get_theme( basename( get_template_directory() ) );
}

?>

<div class="wrap about-wrap et-admin-wrap">

	<div class="et-header">
		<h1><?php echo esc_html__( 'Welcome to ', 'bame' ) . esc_html( $bame_my_theme->Name ); ?> <?php printf( esc_html__( 'V%s', 'bame' ), esc_html( $bame_my_theme->Version ) ); ?></h1>
		<div class="about-text"><?php echo esc_html( $bame_my_theme->Name ) . esc_html__( ' is now installed and ready to use!', 'bame' ); ?></div>
		<h2>Developed By <a href="<?php echo esc_url( 'https://themeforest.net/user/themeholy/portfolio' ); ?>" target="_blank"><?php esc_html_e( 'Themeholy', 'bame' ); ?></a></h2>
	</div>

	<h2 class="nav-tab-wrapper wp-clearfix">
		<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'admin.php?page=bame-dashboard' ) ); ?>"><?php esc_html_e( 'Dashboard', 'bame' ); ?></a>
		<a class="nav-tab nav-tab-active" href="<?php echo esc_url( self_admin_url( 'admin.php?page=bame-admin-plugins' ) ); ?>"><?php esc_html_e( 'Install Plugins', 'bame' ); ?></a>
		<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'themes.php?page=bame-demo-import' ) ); ?>"><?php esc_html_e( 'Demo Importer', 'bame' ); ?></a>
	</h2>
	<?php
    if ( isset($_POST['bame_demo']) ) {
		echo "<meta http-equiv='refresh' content='0'>";
        update_option('et_bame_demo_plugin_name', $_POST['bame_demo'], 'yes');
    }
    $bame_demo = get_option( 'et_bame_demo_plugin_name' );
    if($bame_demo):
        update_option('et_selected_bame_demo_plugin', $bame_demo, 'yes');
    else:
        update_option('et_selected_bame_demo_plugin', 'without_woocommerce', 'yes');
    endif;
    ?>

    <form action="" method="post" id="et-bame_demo-check" class="et-theme-register-form">
        <div class="bame_demo-plugin">
            <h3><?php echo esc_html__('Please select the preferred version of the theme you would like to use.', 'bame'); ?></h3>
            <ul> 
                <li>
                    <input type="radio" id="with_woocommerce" name="bame_demo" value="with_woocommerce" <?php if($bame_demo == 'with_woocommerce'): ?>checked<?php endif; ?>>
                    <label for="with_woocommerce"><?php echo esc_html__('With WooCommerce', 'bame'); ?></label>
                </li>
                <li>
                    <input type="radio" id="without_woocommerce" name="bame_demo" value="without_woocommerce" <?php if($bame_demo == 'without_woocommerce'): ?>checked<?php endif; ?>>
                    <label for="without_woocommerce"><?php echo esc_html__('Without WooCommerce', 'bame'); ?></label>
                </li>
            </ul>
        </div>

		

        <input type="submit" class="et-bame_demo-btn" value='Save'>
    </form>

	<div id="bame-dashboard" class="wrap about-wrap">
		<div class="welcome-content w-clearfix extra">
			<div class="bame-plugins bame-theme-browser-wrap">
				<div class="theme-browser rendered">
					<div class="whi-install-plugins-wrap">
						<h3><?php echo esc_html__( 'These below plugins are required', 'bame' ); ?></h3>
						<a href="#" class="bame-admin-btn whi-install-plugins"><?php echo esc_html__( 'Activate all plugins', 'bame' ); ?></a>
						

						
					</div>
					<div class="bame-plugins-wrap bame-plugins">

					<?php

					$tgmpa_list_table = new TGMPA_List_Table();
					$plugins          = TGM_Plugin_Activation::$instance->plugins;

					foreach ( $plugins as $plugin ) :

						$plugin_status              = '';
						$plugin['type']             = isset( $plugin['type'] ) ? $plugin['type'] : 'recommended';
						$plugin['sanitized_plugin'] = $plugin['name'];

						$plugin_action = $tgmpa_list_table->actions_plugin( $plugin );

						if ( strpos( $plugin_action, 'deactivate' ) !== false ) {
							$plugin_status = 'active';
							$plugin_action = '<div class="row-actions visible active"><span class="activate"><a class="button bame-admin-btn">' . esc_html__( 'Activated', 'bame' ) . '</a></span></div>';
						}

						?>
						<div class="bame-plugin wp-clearfix <?php echo esc_attr( $plugin_status ); ?>" data-plugin-name="<?php echo esc_html( $plugin['name'] ); ?>">
							<h4><?php echo esc_html( $plugin['name'] ); ?></h4>
							<?php echo '' . $plugin_action; ?>
						</div>

					<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end wrap -->
