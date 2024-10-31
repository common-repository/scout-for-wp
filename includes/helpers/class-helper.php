<?php
namespace Scout\Helpers;

use Scout\Forms\Settings as Settings_Form;
use Scout\Helpers\Settings as Settings;
use Wprx\Utils\Array_Helper as Array_Helper;

class Helper {
    public static function get_settings_form() {
        $form = new Settings_Form();
        $form->bind( Array_Helper::to_flat_array( Settings::instance()->full_options() ) );

        return $form;
    }
}
