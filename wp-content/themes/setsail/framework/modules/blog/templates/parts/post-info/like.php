<?php if(setsail_select_core_plugin_installed()) { ?>
    <div class="qodef-blog-like">
        <?php if( function_exists('setsail_select_get_like') ) setsail_select_get_like(); ?>
    </div>
<?php } ?>