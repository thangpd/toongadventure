<?php
$custom_unique_class = wp_unique_id( 'custom_header' );

?>

<div class="qodef-custom-header-holder <?php echo esc_attr( $holder_classes ); ?> <?php echo $custom_unique_class ?> clearfix">
    <<?php echo $tag ?> class="qodef-slicksyncing-title <?php echo $custom_unique_class ?>">
	<?php echo $params['text']; ?>
</<?php echo $tag ?>>
</div>


<?php
$custom_css = '.qodef-slicksyncing-title.' . $custom_unique_class . ' {
    background-size: 100% 100%;
    font-size: ' . $params['font_size'] . ';
    
}
.qodef-custom-header-holder.' . $custom_unique_class . '{
text-align: ' . $params['text_align'] . ';
}';


wp_add_inline_style( 'customheader_css', $custom_css ) ?>


