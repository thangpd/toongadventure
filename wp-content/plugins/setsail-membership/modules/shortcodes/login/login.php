<?php

namespace SetSailMembership\Shortcodes\SetSailUserLogin;

use SetSailMembership\Lib\ShortcodeInterface;

class SetSailUserLogin implements ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qodef_user_login';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {}
	
	public function render( $atts, $content = null ) {
		$args   = array();
		$params = shortcode_atts( $args, $atts );
		extract( $params );
		
		$html = setsail_membership_get_module_template_part( 'shortcodes', 'login', 'login-template', '', $params );
		
		return $html;
	}
}