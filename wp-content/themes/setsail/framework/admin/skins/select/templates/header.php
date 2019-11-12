<div class="qodef-page-header page-header clearfix">
    <img src="<?php echo esc_url(setsail_select_get_skin_uri() . '/assets/img/logo.png'); ?>" alt="<?php esc_attr_e( 'Logo', 'setsail' ); ?>" class="qodef-header-logo pull-left"/>
    <?php $current_theme = wp_get_theme(); ?>
    <h2 class="qodef-page-title pull-left">
        <?php echo esc_html($current_theme->get('Name')); ?>
        <small><?php echo esc_html($current_theme->get('Version')); ?></small>
    </h2>
    <div class="pull-right">
        <?php if($show_save_btn) { ?>
            <input type="button" id="qodef_top_save_button" class="btn btn-primary btn-sm pull-right" value="<?php esc_attr_e('Save Changes', 'setsail'); ?>"/>
        <?php } ?>
    </div>
</div>