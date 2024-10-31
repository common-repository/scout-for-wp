<?php
namespace Scout\Helpers;

use Wprx\Wordpress\Settings as Settings_Base;

class Settings extends Settings_Base {
    protected $settings_group = SCOUT4WP_SETTINGS_GROUP;

    protected $settings_name = SCOUT4WP_SETTINGS_NAME;

    protected $default_settings = array(
		'api_key' => '',
    );
}
