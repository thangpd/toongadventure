<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'setsail_select_child_theme_enqueue_scripts' ) ) {
	function setsail_select_child_theme_enqueue_scripts() {
		$parent_style = 'setsail-select-default-style';

		wp_enqueue_style( 'setsail-select-child-style', get_stylesheet_directory_uri() . '/style.css',
			array( $parent_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'setsail_select_child_theme_enqueue_scripts' );
}

function my_styles_method() {
	$background_image     = setsail_select_options()->getOptionValue( 'footer_background_container' );
	$image_pattern_toong  = get_stylesheet_directory_uri() . '/assets/image/toong_pattern.png';
	$image_pattern_toong2 = get_stylesheet_directory_uri() . '/assets/image/pattern.png';
//    $image_toong          = get_stylesheet_directory_uri() . '/assets/image/background.png';
	$image_toong = setsail_select_options()->getOptionValue( 'tour_item_area_background_image' );
	if ( empty( $image_toong ) ) {
		$image_toong = get_stylesheet_directory_uri() . '/assets/image/background.png';
	}
	$custom_css = "
    
    .qodef-tours-type-toong .qodef-tours-gim-holder-inner{
        background: url({$image_toong }) center/100% 100%;
    }
    .qodef-tours-type-toong-2 .qodef-tours-gim-image:after {
    content: \"\";
    top: -2px;
    left: -2px;
    width: 102%;
    height: 102%;
    background: url({$image_pattern_toong2 }) center/100% 100% no-repeat;
    opacity: 1;
}

    .qodef-tours-dwt-holder .qodef-td-items.destination .qodef-tdi-image:after {
        content: \"\";
        top: 0;
        left: 0;
        width: 101%;
        height: 101%;
        background: url({$image_pattern_toong }) center/100% 100% no-repeat;
        opacity: 1;
    }
    .qodef-footer-top-holder{
            background-image: url({$background_image });
            background-color:unset!important;
            background-repeat: no-repeat, repeat;
            padding-bottom:150px;
            background-position: top left;
            background-size: cover;
    }";

	wp_add_inline_style( 'setsail-select-child-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'my_styles_method' );

//do_action('slz_add_inline_style', $custom_css);

if ( ! function_exists( 'tech365_filter_homepage_name' ) ) {
	function tech365_filter_homepage_name() {
		if ( is_front_page() ) {
			return get_bloginfo( 'name', 'display' );
		}
	}

	add_filter( 'pre_get_document_title', 'tech365_filter_homepage_name', 20 );
}

if ( ! function_exists( 'tech365_add_script_header' ) ) {
	function tech365_add_script_header() {
		?>
		<!-- Facebook Pixel Code -->
		<script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '2156488931329722');
            fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		               src="https://www.facebook.com/tr?id=2156488931329722&ev=PageView&noscript=1"
			/></noscript>
		<!-- End Facebook Pixel Code -->
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170475929-1"></script>
		<script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-170475929-1');
		</script>
		<?php
	}

	add_action( 'wp_head', 'tech365_add_script_header' );
}














