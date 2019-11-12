<div class="qodef-course-reviews-list-top">
    <?php
    if(setsail_select_core_plugin_installed()) {
        echo setsail_core_list_review_details('per-criteria');
    }
    ?>
</div>
<?php
comments_template('', true);