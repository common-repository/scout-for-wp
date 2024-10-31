<?php
/*
	Plugin Name: Scout for WordPress
	Plugin URI: https://wordpress.org/plugins/scout-for-wordpress
	Description: Embed Scout Lead form into your website
	Version: 1.0.0
	Author: Scout
	Author URI: http://www.scoutforpets.com
	Text Domain: scout-for-wp
	Domain Path: /languages
	License: GPL2
 */

defined( 'ABSPATH' ) or die( 'Access forbidden!' );

define( 'SCOUT4WP_EXEC_FILE', __FILE__ );
define( 'SCOUT4WP_URL', plugin_dir_url( __FILE__ ) );
define( 'SCOUT4WP_PATH', plugin_dir_path( __FILE__ ) );

if ( ! function_exists( 'scout4wp_activation' ) ) {
    function scout4wp_activation() {
        if ( version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
            add_option( 'scout4wp_redirect', true );

            scout4wp_init();
        } else {
            wp_die(
                sprintf(
                    __( '"Scout for WordPress" is compatible with PHP 5.3+. PHP %s is installed on the site.', 'scout-for-wp' ),
                    PHP_VERSION
                )
            );
        }
    }
}

if ( version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
    require_once SCOUT4WP_PATH . 'loader.php';

    add_action( 'plugins_loaded', 'scout4wp_init' );
} else {
    if ( ! function_exists( 'scout4wp_notice' ) ) {
        function scout4wp_notice() {
            printf(
                '<div class="notice notice-error"><p>%s</p></div>',
                sprintf(
                    __( '"Scout for WordPress" is compatible with PHP 5.3+. PHP %s is installed on the site.', 'scout-for-wp' ),
                    PHP_VERSION
                )
            );
        }
    }

    add_action( 'admin_notices', 'scout4wp_notice' );
}

register_activation_hook( SCOUT4WP_EXEC_FILE, 'scout4wp_activation' );
