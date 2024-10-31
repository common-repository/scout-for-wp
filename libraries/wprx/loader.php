<?php
if ( ! class_exists( 'Wprx_Loader' ) )
	require_once dirname( __FILE__ ) . '/class-wprx-loader.php';

Wprx_Loader::register_prefix( 'Wprx', dirname( __FILE__ ) . '/core' );
