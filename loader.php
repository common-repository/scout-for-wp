<?php
defined( 'ABSPATH' ) or die( 'Access forbidden!' );

if ( ! function_exists( 'scout4wp_init' ) ) {
    function scout4wp_init() {
        $load_key = strtoupper( __FUNCTION__ );
        if ( defined( $load_key ) )
            return ;

        define( $load_key, true );

        require_once SCOUT4WP_PATH . 'includes/defines.php';
        require_once SCOUT4WP_PATH . 'libraries/wprx/loader.php';

        Wprx_Loader::register_prefix( 'Scout', SCOUT4WP_PATH . 'includes' );

        $plugin = new \Scout\Plugin(
            array(
                'class_prefix' => 'Scout',

                'version' => SCOUT4WP_VERSION,

                'path' => SCOUT4WP_PATH,

                'url' => SCOUT4WP_URL,

                'view_path' => SCOUT4WP_PATH . 'includes/views/',

                'main_file' => SCOUT4WP_EXEC_FILE,
            )
        );
        $plugin->init();
    }
}
