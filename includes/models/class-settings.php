<?php
namespace Scout\Models;

use Wprx\Models\Model as Model;
use Scout\Helpers\Helper as Helper;

class Settings extends Model {
    public function data() {
        $form = Helper::get_settings_form();

        $data = array(
            'form' => $form,
        );

        return $data;
    }
}
