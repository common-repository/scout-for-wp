<?php
namespace Scout\Forms;

use Wprx\Forms\Form as Form;

class Settings extends Form {
    function __construct( $options = array() ) {
        if ( ! isset( $options['prefix'] ) ) {
            $options['prefix'] = SCOUT4WP_SETTINGS_NAME;
        }

        parent::__construct( $options );
    }

    protected function setup() {
        $this->register_groups(
            array(
                'general',
            )
        );
		
        $this->register_fields(
            array(
                array(
                    'id' => 'api_key',

                    'label' => __( 'API Key *', 'scout-for-wp' ),

                    'description' => __( 'API key is required for integration with Scout.', 'scout-for-wp' ),

                    'type' => 'text',
					
					'class' => 'regular-text',

                    'postfix' => true,
                ),
            ),
            'general'
        );
	}
}
