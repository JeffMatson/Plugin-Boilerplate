<?php

namespace Jeff_Matson\Plugin_Boilerplate\Includes;

class Init {

	private static $_instance;

	public $scripts = array();
	public $styles = array();

	public static function get_instance() {
		if ( empty( $_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public function __construct() {
		$this->add_actions();
	}

	public function add_actions() {}

	public function load_script( $slug, $script ) {
		if ( $script['vendor'] ) {
			$path = ASSETS_URL . 'js/vendor/' . $script['path'];
		} else {
			$path = ASSETS_URL . 'js/' . $script['path'];
		}

		wp_enqueue_script( $slug, $path, $script['requires'], $script['version'], $script['footer'] );
	}

	public function load_style( $slug, $style ) {
		if ( $script['vendor'] ) {
			$path = ASSETS_URL . 'css/vendor/' . $style['path'];
		} else {
			$path = ASSETS_URL . 'css/' . $style['path'];
		}

		wp_enqueue_script( $slug, $path, $style['requires'], $style['version'], $style['media'] );
	}

	public function enqueue_scripts( $location ) {
		foreach ( $this->scripts as $slug => $script ) {
			if ( in_array( $location, $script['locations'] ) || empty( $script['locations'] ) ) {
				$this->load_script( $slug, $script );
			}
		}

		foreach ( $this->styles as $slug => $style ) {
			if ( in_array( $location, $style['locations'] ) || empty( $style['locations'] ) ) {
				$this->load_style( $slug, $style );
			}
		}
	}

}