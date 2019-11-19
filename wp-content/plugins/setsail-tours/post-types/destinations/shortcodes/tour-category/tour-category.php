<?php

namespace SetSailTours\CPT\Destination\Shortcodes;

use SetSailTours\Lib\ShortcodeInterface;

class TourCategory implements ShortcodeInterface
{
    private $base;

    /**
     * DestinationGrid constructor.
     */
    public function __construct()
    {
        $this->base = 'qodef_tour_category';
        add_action('wp_enqueue_scripts', [$this, 'add_custom_css'], 20);
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function add_custom_css()
    {
        wp_enqueue_style('tour-category-shortcode', plugins_url("assets/css/tour-category.css", __FILE__));
    }

    public function getBase()
    {
        return $this->base;
    }

    public function arrayMapTerms($value)
    {
        return [$value->term_id => $value->name];
    }

    public function arrayMapValue($a)
    {
        return $a;
    }

    public function vcMap()
    {
        $terms = get_terms(array(
            'taxonomy' => 'tour-category',
        ));
        /*if ( ! empty($terms)) {
            $array_values = array_map([$this, 'arrayMapTerms'], $terms);
        }*/
        $array_values = [];
        foreach ($terms as $value) {
            $array_values[$value->name] = $value->slug;
        }
        vc_map(array(
            'name'     => esc_html__('Tour Category', 'setsail - tours'),
            'base'     => $this->base,
            'category' => esc_html__('by SETSAIL TOURS', 'setsail - tours'),
            'icon'     => 'icon - wpb - tour - category extended - custom - tours - icon',
            'params'   => array(

                array(
                    'type'       => 'dropdown',
                    'param_name' => 'slug_category',
                    'heading'    => esc_html__('Choose Category', 'setsail - tours'),
                    'value'      => $array_values,
                ),

            )
        ));
    }

    public function render($atts, $content = null)
    {
        $args   = array(
            'slug_category' => 'europe',
        );
        $params = shortcode_atts($args, $atts);

        //        $query = $this->buildQueryObject($params);

//        $params['query']  = $query;
//        $params['caller'] = $this;

//        $params['holder_classes'] = $this->gridClasses($params, $args);
//        $params['thumb_size']     = setsail_tours_get_image_size_param($params);
//        wp_register_script("prefix-script", plugins_url("js/script.js", __FILE__), array(), "1.0", false);
//        wp_enqueue_script("prefix-script");

        $this->wp_add_css_inline($params);

        return setsail_tours_get_tour_module_template_part('tour-category/templates/tour-category-template',
            'destinations', 'shortcodes', '', $params);
    }

    public function wp_add_css_inline($params)
    {
        $custom_css = '.qodef-category-item{
            width:100px;
            height:100px;
            background-color:black;
        }';

        wp_add_inline_style('slz_add_inline_style', $custom_css);
    }


    private function buildQueryObject($params)
    {
        $queryArray['post_status'] = 'publish';
        $queryArray['post_type']   = 'destinations';

        /*        if ( ! empty($params['orderby'])) {
                    $queryArray['orderby'] = $params['orderby'];
                }

                if ( ! empty($params['order'])) {
                    $queryArray['order'] = $params['order'];
                }

                if ( ! empty($params['number'])) {
                    $queryArray['posts_per_page'] = $params['number'];
                }

                $toursIds = null;
                if ( ! empty($params['selected_destinations'])) {
                    $toursIds               = explode(',', $params['selected_destinations']);
                    $queryArray['post__in'] = $toursIds;
                }*/

//        return new \WP_Query($queryArray);
    }

    private function gridClasses($params, $args)
    {
        $holderClasses = array();

//        $holderClasses[] = ! empty($params['destination_type']) ? 'qodef - destination - ' . $params['destination_type'] : '';
//        $holderClasses[] = 'qodef - grid - list qodef - disable - bottom - space';
//        $holderClasses[] = ! empty($params['number_of_columns']) ? 'qodef - ' . $params['number_of_columns'] . ' - columns' : 'qodef - ' . $args['number_of_columns'] . ' - columns';
//        $holderClasses[] = ! empty($params['space_between_items']) ? 'qodef - ' . $params['space_between_items'] . ' - space' : 'qodef - ' . $args['space_between_items'] . ' - space';
//        $holderClasses[] = $params['rounded_items'] === 'yes' ? 'qodef - has - rounded - style' : '';
//        $holderClasses[] = $params['overlay'] === 'yes' ? 'qodef - has - overlay - style' : '';

        return implode(' ', $holderClasses);
    }
}