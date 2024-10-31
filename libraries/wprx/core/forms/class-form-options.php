<?php
namespace Wprx\Forms;

use Wprx\Utils\Options as Options;
use Wprx\Utils\Array_Helper as Array_Helper;
use Wprx\Utils\Priority_Queue as Priority_Queue;

class Form_Options extends Options {
    public $fields_namespace;

    public $prefix = '';

    function __construct( $options = array() ) {
        $this->fields_namespace = new Priority_Queue();
        $this->fields_namespace->insert( '\\Wprx\\Forms\\Fields', 0 );

        if ( isset( $options['fields_namespace'] ) ) {
            $fields_namespace = Array_Helper::ensure_array( $options['fields_namespace'] );

            foreach ( $fields_namespace as $ns ) {
                if ( ! empty( $ns ) ) {
                    $this->fields_namespace->insert( $ns, 1 );
                }
            }

            unset( $options['fields_namespace'] );
        }

        parent::__construct( $options );
    }
}
