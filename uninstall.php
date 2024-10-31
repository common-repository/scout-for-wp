<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

function scout4wp_clear_site_settings() {
    global $wpdb;

    $wpdb->query(
        sprintf(
            'DELETE FROM `%1$soptions` WHERE option_name LIKE "scout4wp%%"',
            $wpdb->prefix
        )
    );
}

if ( ! is_multisite() ) {
    scout4wp_clear_site_settings();
} else {
    global $wpdb;

    $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
    $original_blog_id = get_current_blog_id();

    foreach ( $blog_ids as $blog_id )   {
        switch_to_blog( $blog_id );

        scout4wp_clear_site_settings();
    }

    switch_to_blog( $original_blog_id );
}
