<div class="qodef-tours-destination-holder">
    <?php

    $list_category_gallery = vc_param_group_parse_atts($list_category_gallery);

    if ( ! empty($list_category_gallery)) {
        foreach ($list_category_gallery as $value) {
            $term = get_term_by(
                'slug', $value['category_slug'],
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
            $term_link = get_term_link($value['category_slug'], 'tour-category');
            ?>
            <div class="qodef-category-item">
                <a href="<?php echo $term_link ?>"><?php echo $term->name ?></a>
            </div>


            <?php

        }
    } else {
        echo 'Not found Tour Category';
    }


    ?>
</div>


<?php


?>

