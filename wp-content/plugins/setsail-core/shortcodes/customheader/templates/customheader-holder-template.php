<?php

?>

<div class="qodef-custom-header-holder <?php echo esc_attr($holder_classes); ?> clearfix">
    <h2 class="qodef-slicksyncing-title">
        <?php echo $params['text']; ?>
    </h2>
</div>


<?php
$custom_css = '.qodef-slicksyncing-title {
    padding: ' . $params['padding'] . ';
    background-size: ' . $params['bg-size'] . ';
}';


wp_add_inline_style('customheader_css', $custom_css) ?>


