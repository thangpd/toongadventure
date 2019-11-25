<?php

if ( ! function_exists('setsail_tours_tours_category_fields')) {
    function setsail_tours_tours_category_fields()
    {

        $tours_category_fields = setsail_select_add_taxonomy_fields(
            array(
                'scope' => 'tour-category',
                'name'  => 'tour_category'
            )
        );

        setsail_select_add_taxonomy_field(
            array(
                'name'        => 'tours_category_icon',
                'type'        => 'icon',
                'label'       => esc_html__('Choose Icon', 'setsail-tours'),
                'description' => esc_html__('Choose icon from icon pack for category.', 'setsail-tours'),
                'parent'      => $tours_category_fields
            )
        );

        setsail_select_add_taxonomy_field(
            array(
                'name'        => 'tours_category_custom_image',
                'type'        => 'image',
                'label'       => esc_html__('Custom Image', 'setsail-tours'),
                'description' => esc_html__('Choose custom image for category.', 'setsail-tours'),
                'parent'      => $tours_category_fields
            )
        );
    }

    add_action('setsail_select_action_custom_taxonomy_fields', 'setsail_tours_tours_category_fields');
}
if ( ! function_exists('setsail_tours_tours_destination_fields')) {
    function setsail_tours_tours_destination_fields($columns)
    {

        $columns['destination_tour'] = 'Destination Tour';

        return $columns;

    }

    add_filter('manage_tour-item_posts_columns', 'setsail_tours_tours_destination_fields');
}
if ( ! function_exists('setsail_tours_tours_destination_column')) {
    function setsail_tours_tours_destination_column($column)
    {

        switch ($column) {

            case 'destination_tour' :
                $destination = get_post_meta(get_the_ID(), 'tour_destination', true);
                if (is_string($destination)) {
                    echo get_the_title($destination);
                } else {
                    _e('Unable to get value', 'setsail-tours');
                }
                break;
        }

    }

    add_filter('manage_tour-item_posts_custom_column', 'setsail_tours_tours_destination_column', 10, 2);
}
if ( ! function_exists('setsail_tours_tours_destination_quickedit')) {

    add_action('quick_edit_custom_box', 'setsail_tours_tours_destination_quickedit', 10, 2);


    function setsail_tours_tours_destination_quickedit($column_name)
    {
        if ('destination_tour' != $column_name) {
            return;
        }
        $destinations = setsail_tours_get_destinations(true);
        $options      = '';
        foreach ($destinations as $des => $value) {
            $options .= '<option value="' . $des . '">' . $value . '</option>';
        }
        printf('<div style="display:inline-block;">Destination: <select name="destination_tour" id="destination_tour">%s</select></div>',
            $options
        );
    }
}
if ( ! function_exists('setsail_tours_tours_destination_quickedit_save')) {


    function setsail_tours_tours_destination_quickedit_save($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        if (isset($_POST['post_type'])) {
            if ( ! current_user_can('edit_post', $post_id) || 'tour-item' != $_POST['post_type']) {
                return $post_id;
            }

            if ( ! empty($_POST['destination_tour'])) {
                update_post_meta($post_id, 'tour_destination', $_POST['destination_tour']);
            }
        }
    }

    add_action('save_post', 'setsail_tours_tours_destination_quickedit_save');

}
if ( ! function_exists('setsail_tours_reviews_fields')) {
    function setsail_tours_reviews_fields()
    {

        $tours_fields = setsail_select_add_taxonomy_fields(
            array(
                'scope' => 'review-criteria',
                'name'  => 'review_criteria'
            )
        );

        setsail_select_add_taxonomy_field(
            array(
                'name'        => 'review_criteria_order',
                'type'        => 'text',
                'label'       => esc_html__('Order', 'setsail-tours'),
                'description' => esc_html__('If there are multiple criteria, they will be displayed in an ascending order.',
                    'setsail-tours'),
                'parent'      => $tours_fields
            )
        );

        setsail_select_add_taxonomy_field(
            array(
                'name'        => 'review_criteria_show',
                'type'        => 'selectblank',
                'label'       => esc_html__('Show in Reviews', 'setsail-tours'),
                'description' => esc_html__('All the criteria can be rated when leaving a review, but only those marked to be shown will be displayed in the list of reviews.',
                    'setsail-tours'),
                'options'     => array(
                    'no'  => esc_html__('No', 'setsail-tours'),
                    'yes' => esc_html__('Yes', 'setsail-tours'),
                ),
                'parent'      => $tours_fields
            )
        );
    }

    add_action('setsail_select_action_custom_taxonomy_fields', 'setsail_tours_reviews_fields');
}

if ( ! function_exists('setsail_tours_review_criteria_columns')) {
    function setsail_tours_review_criteria_columns($columns)
    {
        $new_columns = array(
            'cb'                    => '<input type="checkbox" />',
            'name'                  => esc_html__('Name', 'setsail-tours'),
            'slug'                  => esc_html__('Slug', 'setsail-tours'),
            'review_criteria_order' => esc_html__('Order', 'setsail-tours'),
            'review_criteria_show'  => esc_html__('Shown in Reviews', 'setsail-tours'),
        );

        return $new_columns;
    }

    add_filter("manage_edit-review-criteria_columns", 'setsail_tours_review_criteria_columns');
}

if ( ! function_exists('setsail_tours_review_criteria_column_values')) {
    function setsail_tours_review_criteria_column_values($out, $column_name, $term_id)
    {
        $term_meta = get_term_meta($term_id);
        switch ($column_name) {
            case 'criteria_order':
                $out .= isset($term_meta['review_criteria_order'][0]) ? $term_meta['review_criteria_order'][0] : '-';
                break;
            case 'main_criterion':
                $out .= (isset($term_meta['review_criteria_show'][0]) && $term_meta['review_criteria_show'][0] == 'yes') ? esc_html__('Yes',
                    'setsail-tours') : esc_html__('No', 'setsail-tours');
                break;

            default:
                break;
        }

        return $out;
    }

    add_filter("manage_review-criteria_custom_column", 'setsail_tours_review_criteria_column_values', 10, 3);
}

if ( ! function_exists('setsail_tours_reviews_get_review_criteria')) {
    function setsail_tours_reviews_get_review_criteria($default_criteria)
    {
        $taxonomy_rating = array();
        if (setsail_select_core_plugin_installed()) {
            $taxonomy_rating = setsail_core_taxonomy_rating_array('review-criteria');
        }

        return array_merge($default_criteria, $taxonomy_rating);
    }

    add_filter('setsail_core_filter_rating_criteria', 'setsail_tours_reviews_get_review_criteria');
}