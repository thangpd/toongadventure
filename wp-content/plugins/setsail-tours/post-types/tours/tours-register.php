<?php
namespace SetSailTours\CPT\Tours;

use SetSailTours\Lib;

/**
 * Class ToursRegister
 * @package SetSailTours\CPT\Tours
 */
class ToursRegister implements Lib\PostTypeInterface {
    /**
     * @var string
     */
    private $base;
    /**
     * @var string
     */
    private $taxBase;

    public function __construct() {
        $this->base    = 'tour-item';
        $this->taxBase = 'tour-category';
        add_filter('single_template', array($this, 'registerSingleTemplate'));

        add_action('admin_menu', array($this, 'removeReviewCriteriaMetaBox'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
    }

    /**
     * Registers listing-item single template if one does'nt exists in theme.
     * Hooked to single_template filter
     *
     * @param $single string current template
     *
     * @return string string changed template
     */
    public function registerSingleTemplate($single) {
        global $post;

        if(! empty( $post ) && $post->post_type == $this->base) {
            if(!file_exists(get_template_directory().'/single-tour-item.php')) {
                return SETSAIL_TOURS_CPT_PATH.'/tours/templates/single-'.$this->base.'.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {

        $menuPosition = 11;
        $menuIcon     = 'dashicons-palmtree';
	    
        $slug = $this->base;

        register_post_type($this->base,
            array(
                'labels'        => array(
                    'name'          => esc_html__('SetSail Tour', 'setsail-tours'),
                    'menu_name'     => esc_html__('SetSail Tour', 'setsail-tours'),
                    'all_items'     => esc_html__('Tour Items', 'setsail-tours'),
                    'add_new'       => esc_html__('Add New Tour Item', 'setsail-tours'),
                    'singular_name' => esc_html__('Tour Item', 'setsail-tours'),
                    'add_item'      => esc_html__('New Tour Item', 'setsail-tours'),
                    'add_new_item'  => esc_html__('Add New Tour Item', 'setsail-tours'),
                    'edit_item'     => esc_html__('Edit Tour Item', 'setsail-tours')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => $slug),
                'menu_position' => $menuPosition,
                'show_ui'       => true,
                'show_in_menu'  => true,
                'supports'      => array(
                    'author',
                    'title',
                    'editor',
                    'thumbnail',
                    'excerpt',
                    'page-attributes',
                    'comments'
                ),
                'menu_icon'     => $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name'              => esc_html__('Tours Categories', 'setsail-tours'),
            'singular_name'     => esc_html__('Tour Category', 'setsail-tours'),
            'search_items'      => esc_html__('Search Tours Categories', 'setsail-tours'),
            'all_items'         => esc_html__('All Tours Categories', 'setsail-tours'),
            'parent_item'       => esc_html__('Parent Tour Category', 'setsail-tours'),
            'parent_item_colon' => esc_html__('Parent Tour Category:', 'setsail-tours'),
            'edit_item'         => esc_html__('Edit Tour Category', 'setsail-tours'),
            'update_item'       => esc_html__('Update Tour Category', 'setsail-tours'),
            'add_new_item'      => esc_html__('Add New Tour Category', 'setsail-tours'),
            'new_item_name'     => esc_html__('New Tour Category Name', 'setsail-tours'),
            'menu_name'         => esc_html__('Tours Categories', 'setsail-tours'),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'tour-category'),
        ));

        register_taxonomy('review-criteria', array($this->base), array(
            'hierarchical'      => true,
            'show_ui'           => true,
            'labels'            => array(
                'name'              => esc_html__('Review Criteria', 'setsail-tours'),
                'singular_name'     => esc_html__('Review Criterion', 'setsail-tours'),
                'search_items'      => esc_html__('Search Review Criteria', 'setsail-tours'),
                'all_items'         => esc_html__('All Review Criteria', 'setsail-tours'),
                'parent_item'       => esc_html__('Parent Review Criterion', 'setsail-tours'),
                'parent_item_colon' => esc_html__('Parent Review Criterion:', 'setsail-tours'),
                'edit_item'         => esc_html__('Edit Review Criterion', 'setsail-tours'),
                'update_item'       => esc_html__('Update Review Criterion', 'setsail-tours'),
                'add_new_item'      => esc_html__('Add New Review Criterion', 'setsail-tours'),
                'new_item_name'     => esc_html__('New Review Criterion Name', 'setsail-tours'),
                'menu_name'         => esc_html__('Review Criteria', 'setsail-tours'),
            ),
            'query_var'         => true,
            'show_admin_column' => false,
        ));

        $attributes_labels = array(
            'name'              => esc_html__('Tours Attributes', 'setsail-tours'),
            'singular_name'     => esc_html__('Tour Attribute', 'setsail-tours'),
            'search_items'      => esc_html__('Search Tours Attributes', 'setsail-tours'),
            'all_items'         => esc_html__('All Tours Attributes', 'setsail-tours'),
            'parent_item'       => esc_html__('Parent Tour Attribute', 'setsail-tours'),
            'parent_item_colon' => esc_html__('Parent Tour Attribute:', 'setsail-tours'),
            'edit_item'         => esc_html__('Edit Tour Attribute', 'setsail-tours'),
            'update_item'       => esc_html__('Update Tour Attribute', 'setsail-tours'),
            'add_new_item'      => esc_html__('Add New Tour Attribute', 'setsail-tours'),
            'new_item_name'     => esc_html__('New Tour Attribute Name', 'setsail-tours'),
            'menu_name'         => esc_html__('Tours Attributes', 'setsail-tours'),
        );

        register_taxonomy('tour-attribute', array($this->base), array(
            'hierarchical'      => true,
            'show_ui'           => true,
            'labels'            => $attributes_labels,
            'query_var'         => true,
            'show_admin_column' => false,
        ));
    }

    public function removeReviewCriteriaMetaBox() {
        //remove review criteria meta box from tour single page,
        //because we don't want user to check review criteria for each tour
        remove_meta_box('review-criteriadiv', $this->base, 'side');
    }
}