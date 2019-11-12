<?php
$video_type     = get_post_meta( get_the_ID(), "qodef_video_type_meta", true );
$has_video_link = get_post_meta( get_the_ID(), "qodef_post_video_custom_meta", true ) !== '' || get_post_meta( get_the_ID(), "qodef_post_video_link_meta", true ) !== '';
$holder_class = $video_type === 'social_networks' ? 'qodef-service-video' : '';
if ( $has_video_link ) { ?>
<div class="qodef-blog-video-holder <?php echo esc_attr( $holder_class ); ?>">
    <?php
    if ( $video_type == 'social_networks' ) {
		echo wp_video_shortcode( array( 'src' => esc_url( get_post_meta( get_the_ID(), "qodef_post_video_link_meta", true ) ), 'width' => 880, 'height' => 496, 'loop' => true ) );
    } else if ( $video_type == 'self' ) {
	    echo wp_video_shortcode( array( 'src' => esc_url( get_post_meta( get_the_ID(), "qodef_post_video_custom_meta", true ) ), 'width' => 880, 'height' => 496 ) );
    } ?>
</div>
<?php } ?>