<?php
namespace Scout;

use Wprx\App\Plugin as Plugin_Base;
use Scout\Helpers\Settings as Settings;

class Plugin extends Plugin_Base {
    public function init() {
        $this->load_translations();

        add_shortcode( 'scout_form', array( $this, 'shortcode_scout_form' ) );

        if ( is_admin() ) {
            add_filter( 'plugin_action_links_' . plugin_basename( SCOUT4WP_EXEC_FILE ) , array( $this, 'plugin_action_links' ) );

            add_action( 'admin_menu', array( $this, 'admin_menu' ) );
            add_action( 'admin_init', array( $this, 'admin_init' ) );
        }

        parent::init();
    }

    private function load_translations() {
        load_plugin_textdomain( 'scout-for-wp', false, 'scout-for-wp/languages' );
    }

    public function admin_menu() {
        add_options_page(
            __( 'Scout for WP', 'scout-for-wp' ),
            __( 'Scout for WP', 'scout-for-wp' ),
            'manage_options',
            'scout-for-wp',
            array( $this, 'display_settings' )
        );
    }

    public function admin_init() {
        Settings::instance()->init();

        if ( get_option( 'scout4wp_redirect', false ) ) {
            delete_option( 'scout4wp_redirect' );
            if ( ! isset( $_GET['activate-multi'] ) ) {
                wp_redirect( admin_url( 'options-general.php?page=scout-for-wp' ), 302 );
                exit();
            }
        }
    }

    public function plugin_action_links( $links ) {
        $settings_link = '<a href="' . admin_url( 'options-general.php?page=scout-for-wp' ) . '">' . __( 'Settings', 'scout-for-wp' ) . '</a>';

        $links[] = $settings_link;

        return $links;
    }

    public function shortcode_scout_form( $attrs, $content = null ) {
        $api_key = ! empty( $attrs['api_key'] ) ? trim( $attrs['api_key'] ) : '';

        if ( 0 === strlen( $api_key ) )
            $api_key = Settings::instance()->get_option( 'api_key' );

        if ( 0 === strlen( $api_key ) ) {
            return sprintf(
                '<div style="color:red">%1$s</div>',
                __( 'Scout for WP: API key is not specified.', 'scout-for-wp' )
            );
        }

        $snippet = file_exists( SCOUT4WP_SNIPPET_PATH ) ? file_get_contents( SCOUT4WP_SNIPPET_PATH ) : false;
        if ( false === $snippet ) {
            return sprintf(
                '<div style="color:red">%1$s</div>',
                __( 'Scout for WP: the form can not be loaded.', 'scout-for-wp' )
            );
        }

        return str_replace( '{{API_KEY}}', json_encode( $api_key ), $snippet );
    }
}
