<div class="qodef-tours-destination-holder">
    <?php
    if ( ! empty($slug_category)) {
        $term = get_term_by(
            'slug', $slug_category,
            'tour-category'
        );
        /* [0] => WP_Term Object
    (
        [term_id] => 35
        [name] => Europe
        [slug] => europe
        [term_group] => 0
        [term_taxonomy_id] => 35
        [taxonomy] => tour-category
        [description] =>
        [parent] => 0
        [count] => 5
        [filter] => raw
    )*/
        $term_link = get_term_link($slug_category, 'tour-category');
        ?>
        <div class="qodef-category-item">
            <a href="<?php echo $term_link ?>"><?php echo $term->name ?></a>
        </div>


        <?php

    } else {
        echo 'Not found Tour Category';
    }


    ?>
</div>


<?php





?>

