<?php

namespace Jeff_Matson\Plugin_Boilerplate\Admin;

class Init extends \Jeff_Matson\Plugin_Boilerplate\Includes\Init {

	private static $_instance;

	public $scripts = array(
		'' => array(
			'path' => '',
			'vendor' => false,
			'requires' => array(

			),
			'locations' => array(

			),
			'footer'  => false,
			'version' => false,
		),
	);

	public $styles = array(
		'' => array(
			'path' => '',
			'vendor' => false,
			'requires' => array(

			),
			'locations' => array(

			),
			'footer'  => false,
			'version' => false,
		),
	);

	public static function get_instance() {
		if ( empty( $_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public function __construct() {
		$this->add_actions();
	}

	public function add_actions() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

}