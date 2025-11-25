<?php
/**
 * bame Dashboard Welcome page
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
		<a class="nav-tab nav-tab-active" href="<?php echo esc_url( self_admin_url( 'admin.php?page=bame-dashboard' ) ); ?>"><?php esc_html_e( 'Dashboard', 'bame' ); ?></a>
		<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'admin.php?page=bame-admin-plugins' ) ); ?>"><?php esc_html_e( 'Install Plugins', 'bame' ); ?></a>

        <a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'themes.php?page=bame-demo-import' ) ); ?>"><?php esc_html_e( 'Demo Importer', 'bame' ); ?></a>
	</h2>

	<?php

	$bame_theme              = wp_get_theme();
	$theme_version                    = $bame_theme->get( 'Version' );
	$theme_name                       = $bame_theme->get( 'Name' );
	$mem_limit                        = ini_get( 'memory_limit' );
	$mem_limit_byte                   = wp_convert_hr_to_bytes( $mem_limit );
	$upload_max_filesize              = ini_get( 'upload_max_filesize' );
	$upload_max_filesize_byte         = wp_convert_hr_to_bytes( $upload_max_filesize );
	$post_max_size                    = ini_get( 'post_max_size' );
	$post_max_size_byte               = wp_convert_hr_to_bytes( $post_max_size );
	$mem_limit_byte_boolean           = ( $mem_limit_byte < 268435456 );
	$upload_max_filesize_byte_boolean = ( $upload_max_filesize_byte < 67108864 );
	$post_max_size_byte_boolean       = ( $post_max_size_byte < 67108864 );
	$execution_time                   = ini_get( 'max_execution_time' );
	$execution_time_boolean           = ( $execution_time < 300 );
	$input_vars                       = ini_get( 'max_input_vars' );
	$input_vars_boolean               = ( $input_vars < 2000 );
	$input_time                       = ini_get( 'max_input_time' );
	$input_time_boolean               = ( $input_time < 1000 );
	$theme_option_address             = admin_url( 'themes.php?page=bame_theme_options' );

	?>

	<div id="bame-dashboard" class="wrap about-wrap">
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-7">
					<div class="w-row">
						<div class="w-col-sm-6">
							<div class="w-box text-center">
								<div class="w-box-head">
									<?php esc_html_e( 'Theme Documentation', 'bame' ); ?>
								</div>
								<div class="w-box-content">
									<div class="w-button">
										<a href="<?php echo esc_url( 'https://themeholy.com/docs/bame/' ); ?>" target="_blank"><?php esc_html_e( 'DOCUMENTATION', 'bame' ); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="w-col-sm-6">
							<div class="w-box text-center">
								<div class="w-box-head">
									<?php esc_html_e( 'Theme Support', 'bame' ); ?>
								</div>
								<div class="w-box-content">
									<div class="w-button">
										<a href="<?php echo esc_url( 'https://support.themeholy.com/' ); ?>" target="_blank"><?php esc_html_e( 'OPEN SUPPORT TICKET', 'bame' ); ?></a>
									</div>
								</div>
							</div>
						</div>

						<div class="w-col-sm-12">
						    <div class="w-box text-center">
						        <div class="w-box-head" style="font-size: 24px; font-weight: bold; color: #333; margin-bottom: 10px;">
						            <?php esc_html_e( 'Discover Our Best-Selling WordPress Themes', 'bame' ); ?>
						        </div>
						        <div class="w-box-content" style="padding: 15px;">
						            <p style="font-size: 16px; color: #666; margin-bottom: 20px;">
						                Elevate your website with our **premium, high-converting themes** trusted by thousands of businesses worldwide!
						            </p>
						            <div class="w-button">
						                <a href="<?php echo esc_url( 'https://themeforest.net/user/themeholy/portfolio?order_by=sales' ); ?>" 
						                   target="_blank" 
						                   >
						                     <?php esc_html_e( 'Explore Our Top-Rated Themes', 'bame' ); ?>
						                </a>
						            </div>
						        </div>
						    </div>
						</div>



					</div>
				</div>
				<div class="w-col-sm-5">
					<div class="w-box">
						<div class="w-box-head">
							<?php esc_html_e( 'System Status', 'bame' ); ?>
						</div>
						<div class="w-box-content">
							<div class="w-system-info">
								<span> <?php esc_html_e( 'WP Memory Limit', 'bame' ); ?> </span>
								<?php
								$wp_memory_limit       = WP_MEMORY_LIMIT;
								$wp_memory_limit_value = preg_replace( '/[^0-9]/', '', $wp_memory_limit );
								if ( $wp_memory_limit_value < 256 ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $wp_memory_limit ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:256M)', 'bame' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $wp_memory_limit ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Upload Max. Filesize', 'bame' ); ?> </span>
								<?php
								if ( $upload_max_filesize_byte_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $upload_max_filesize ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:64M)', 'bame' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $upload_max_filesize ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Max. Post Size', 'bame' ); ?> </span>
								<?php
								if ( $post_max_size_byte_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $post_max_size ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:64M)', 'bame' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $post_max_size ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Max. Execution Time', 'bame' ); ?> </span>
								<?php
								if ( $execution_time_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i>
									<span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $execution_time ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:300)', 'bame' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $execution_time ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'PHP Max. Input Vars', 'bame' ); ?> </span>
								<?php
								if ( $input_vars_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i>
									<span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $input_vars ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:2000)', 'bame' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $input_vars ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'PHP Max. Input Time', 'bame' ); ?> </span>
								<?php
								if ( $input_time_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $input_time ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:1000)', 'bame' ); ?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'bame' ) . ' ' . esc_html( $input_time ); ?> </span>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end wrap -->