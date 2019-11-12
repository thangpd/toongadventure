<button type="submit" <?php setsail_select_inline_style($button_styles); ?> <?php setsail_select_class_attribute($button_classes); ?> <?php echo setsail_select_get_inline_attrs($button_data); ?> <?php echo setsail_select_get_inline_attrs($button_custom_attrs); ?>>
    <span class="qodef-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo setsail_select_icon_collections()->renderIcon($icon, $icon_pack); ?>
</button>