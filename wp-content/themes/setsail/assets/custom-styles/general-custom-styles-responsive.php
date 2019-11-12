<?php

if ( ! function_exists( 'setsail_select_content_responsive_styles' ) ) {
	/**
	 * Generates content responsive custom styles
	 */
	function setsail_select_content_responsive_styles() {
		$content_style = array();
		
		$padding_mobile = setsail_select_options()->getOptionValue( 'content_padding_mobile' );
		if ( $padding_mobile !== '' ) {
			$content_style['padding'] = $padding_mobile;
		}
		
		$content_selector = array(
			'.qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
			'.qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner',
		);
		
		echo setsail_select_dynamic_css( $content_selector, $content_style );
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_1024', 'setsail_select_content_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_h1_responsive_styles3' ) ) {
	function setsail_select_h1_responsive_styles3() {
		$selector = array(
			'h1'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h1_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_768_1024', 'setsail_select_h1_responsive_styles3' );
}

if ( ! function_exists( 'setsail_select_h2_responsive_styles3' ) ) {
	function setsail_select_h2_responsive_styles3() {
		$selector = array(
			'h2'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h2_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_768_1024', 'setsail_select_h2_responsive_styles3' );
}

if ( ! function_exists( 'setsail_select_h3_responsive_styles3' ) ) {
	function setsail_select_h3_responsive_styles3() {
		$selector = array(
			'h3'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h3_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_768_1024', 'setsail_select_h3_responsive_styles3' );
}

if ( ! function_exists( 'setsail_select_h4_responsive_styles3' ) ) {
	function setsail_select_h4_responsive_styles3() {
		$selector = array(
			'h4'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h4_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_768_1024', 'setsail_select_h4_responsive_styles3' );
}

if ( ! function_exists( 'setsail_select_h5_responsive_styles3' ) ) {
	function setsail_select_h5_responsive_styles3() {
		$selector = array(
			'h5'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h5_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_768_1024', 'setsail_select_h5_responsive_styles3' );
}

if ( ! function_exists( 'setsail_select_h6_responsive_styles3' ) ) {
	function setsail_select_h6_responsive_styles3() {
		$selector = array(
			'h6'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h6_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_768_1024', 'setsail_select_h6_responsive_styles3' );
}

if ( ! function_exists( 'setsail_select_h1_responsive_styles' ) ) {
	function setsail_select_h1_responsive_styles() {
		$selector = array(
			'h1'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h1_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680_768', 'setsail_select_h1_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_h2_responsive_styles' ) ) {
	function setsail_select_h2_responsive_styles() {
		$selector = array(
			'h2'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h2_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680_768', 'setsail_select_h2_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_h3_responsive_styles' ) ) {
	function setsail_select_h3_responsive_styles() {
		$selector = array(
			'h3'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h3_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680_768', 'setsail_select_h3_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_h4_responsive_styles' ) ) {
	function setsail_select_h4_responsive_styles() {
		$selector = array(
			'h4'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h4_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680_768', 'setsail_select_h4_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_h5_responsive_styles' ) ) {
	function setsail_select_h5_responsive_styles() {
		$selector = array(
			'h5'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h5_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680_768', 'setsail_select_h5_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_h6_responsive_styles' ) ) {
	function setsail_select_h6_responsive_styles() {
		$selector = array(
			'h6'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h6_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680_768', 'setsail_select_h6_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_text_responsive_styles' ) ) {
	function setsail_select_text_responsive_styles() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'text', '_res1' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680_768', 'setsail_select_text_responsive_styles' );
}

if ( ! function_exists( 'setsail_select_h1_responsive_styles2' ) ) {
	function setsail_select_h1_responsive_styles2() {
		$selector = array(
			'h1'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h1_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680', 'setsail_select_h1_responsive_styles2' );
}

if ( ! function_exists( 'setsail_select_h2_responsive_styles2' ) ) {
	function setsail_select_h2_responsive_styles2() {
		$selector = array(
			'h2'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h2_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680', 'setsail_select_h2_responsive_styles2' );
}

if ( ! function_exists( 'setsail_select_h3_responsive_styles2' ) ) {
	function setsail_select_h3_responsive_styles2() {
		$selector = array(
			'h3'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h3_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680', 'setsail_select_h3_responsive_styles2' );
}

if ( ! function_exists( 'setsail_select_h4_responsive_styles2' ) ) {
	function setsail_select_h4_responsive_styles2() {
		$selector = array(
			'h4'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h4_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680', 'setsail_select_h4_responsive_styles2' );
}

if ( ! function_exists( 'setsail_select_h5_responsive_styles2' ) ) {
	function setsail_select_h5_responsive_styles2() {
		$selector = array(
			'h5'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h5_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680', 'setsail_select_h5_responsive_styles2' );
}

if ( ! function_exists( 'setsail_select_h6_responsive_styles2' ) ) {
	function setsail_select_h6_responsive_styles2() {
		$selector = array(
			'h6'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'h6_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680', 'setsail_select_h6_responsive_styles2' );
}

if ( ! function_exists( 'setsail_select_text_responsive_styles2' ) ) {
	function setsail_select_text_responsive_styles2() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = setsail_select_get_responsive_typography_styles( 'text', '_res2' );
		
		if ( ! empty( $styles ) ) {
			echo setsail_select_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'setsail_select_action_style_dynamic_responsive_680', 'setsail_select_text_responsive_styles2' );
}