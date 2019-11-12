<?php
namespace SetSailTours\CPT\Tours\Shortcodes;

use SetSailTours\CPT\Tours\Lib\ToursQuery;
use SetSailTours\Lib\ShortcodeInterface;

class ToursList implements ShortcodeInterface {
	private $base;

	/**
	 * ToursCarousel constructor.
	 */
	public function __construct() {
		$this->base = 'setsail_tours_list';

		add_action('vc_before_init', array($this, 'vcMap'));

		add_action('wp_ajax_nopriv_setsail_tours_list_ajax_pagination', array($this, 'handleLoadMore'));
		add_action('wp_ajax_setsail_tours_list_ajax_pagination', array($this, 'handleLoadMore'));
	}


	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Tours List', 'setsail-tours'),
			'base'                      => $this->base,
			'category'        			=> esc_html__('by SETSAIL TOURS', 'setsail-tours'),
			'icon'                      => 'icon-wpb-tours-list extended-custom-tours-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Tours List Type', 'setsail-tours'),
						'param_name'  => 'tour_type',
						'value'       => array(
							esc_html__( 'Standard', 'setsail-tours' )                    => 'standard',
							esc_html__( 'Gallery', 'setsail-tours' )                     => 'gallery',
							esc_html__( 'Gallery Simple', 'setsail-tours' ) => 'gallery-simple',
							esc_html__( 'Gallery With Description', 'setsail-tours' )    => 'gallery-with-description',
							esc_html__( 'Masonry', 'setsail-tours' )                     => 'masonry'
						),
						'admin_label' => true,
						'save_always' => true,
						'description' => esc_html__('Default value is Standard', 'setsail-tours'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Number of Columns', 'setsail-tours'),
						'param_name'  => 'tour_item',
						'value'       => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6'
						),
						'save_always' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Image Proportions', 'setsail-tours'),
						'param_name'  => 'image_size',
						'value'       => array(
							esc_html__('Original', 'setsail-tours')  => 'full',
							esc_html__('Square', 'setsail-tours')    => 'square',
							esc_html__('Landscape', 'setsail-tours') => 'landscape',
							esc_html__('Portrait', 'setsail-tours')  => 'portrait',
							esc_html__('Custom', 'setsail-tours')    => 'custom'
						),
						'save_always' => true,
						'dependency'  => array('element' => 'tour_type', 'value' => array('standard', 'gallery', 'gallery-simple', 'gallery-with-description'))
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'info_position',
						'heading'     => esc_html__('Info Position', 'setsail-tours'),
						'value'       => array(
							esc_html__( 'On image', 'setsail-tours' )    => 'on-image',
							esc_html__( 'Below image', 'setsail-tours' ) => 'below-image'
						),
						'save_always' => true,
						'dependency'  => array('element' => 'tour_type', 'value' => array('gallery-with-description'))
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'info_skin',
						'heading'     => esc_html__('Info Skin', 'setsail-tours'),
						'value'       => array(
							esc_html__( 'Light', 'setsail-tours' ) => 'light',
							esc_html__( 'Dark', 'setsail-tours' )  => 'dark'
						),
						'save_always' => true,
						'dependency'  => array('element' => 'tour_type', 'value' => array('masonry', 'gallery', 'gallery-with-description', 'gallery-simple'))
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Image Dimensions', 'setsail-tours'),
						'param_name'  => 'custom_image_dimensions',
						'description' => esc_html__('Enter custom image dimensions. Enter image size in pixels: 200x100 (Width x Height)', 'setsail-tours'),
						'dependency'  => array('element' => 'image_size', 'value' => 'custom')
					),
					array(
			            'type' => 'dropdown',
			            'heading' => esc_html__('Space Between Items','setsail-tours'),
			            'param_name' => 'space_between_items',
                        'value'       => array_flip( setsail_select_get_space_between_items_array() ),
		            ),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__( 'Title Tag', 'setsail-tours' ),
						'value'       => array_flip( setsail_select_get_title_tag( true ) ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Text Length', 'setsail-tours'),
						'param_name'  => 'text_length',
						'description' => esc_html__('Number of words (Default value is empty - hidden excerpt)', 'setsail-tours'),
						'dependency'  => array('element' => 'tour_type', 'value' => array('standard', 'gallery-with-description'))
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Enable Reviews', 'setsail-tours'),
						'param_name'  => 'reviews',
						'value'       => array(
							esc_html__('Yes', 'setsail-tours') => 'yes',
							esc_html__('No', 'setsail-tours')  => 'no'
						),
						'save_always' => true,
						'dependency'  => array('element' => 'tour_type', 'value' => array('masonry', 'gallery-with-description', 'gallery-simple'))
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Enable Category Filter', 'setsail-tours'),
						'param_name'  => 'filter',
						'value'       => array(
							esc_html__('No', 'setsail-tours')  => 'no',
							esc_html__('Yes', 'setsail-tours') => 'yes'
						),
						'save_always' => true,
						'description' => esc_html__('Default value is No', 'setsail-tours'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Enable Load More', 'setsail-tours'),
						'param_name'  => 'enable_load_more',
						'value'       => array(
							esc_html__('No', 'setsail-tours')  => 'no',
							esc_html__('Yes', 'setsail-tours') => 'yes'
						),
						'save_always' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Load More Button Text', 'setsail-tours'),
						'param_name'  => 'load_more_text',
						'dependency'  => array('element' => 'enable_load_more', 'value' => 'yes'),
						'description' => esc_html__('Default text is "Load More"', 'setsail-tours')
					)
				),
				setsail_tours_query()->queryVCParams()
			) //close array_merge
		));
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'tour_type'               => 'standard',
			'tour_item'               => '3',
			'info_position'           => '',
			'info_skin'               => 'light',
			'image_size'              => 'full',
			'custom_image_dimensions' => '',
			'space_between_items'     => 'normal',
			'title_tag'               => 'h4',
			'text_length'             => '',
			'reviews'                 => 'yes',
			'filter'                  => 'no',
			'enable_load_more'        => '',
			'load_more_text'          => ''
		);

		$args   = array_merge($args, setsail_tours_query()->getShortcodeAtts());
		$params = shortcode_atts($args, $atts);
		
		$meta_params = $this->getMetaQueryParams($params);
		$query  = setsail_tours_query()->buildQueryObject($params,$meta_params);

		$params['query']  = $query;
		$params['caller'] = $this;

		$params['thumb_size'] = setsail_tours_get_image_size_param($params);

		if($params['filter'] == 'yes') {
			$params['filter_categories'] = $this->getFilterCategories($params);
		}

		$params['list_classes']			   = $this->getListClasses($params);
		$params['enable_load_more']        = $params['enable_load_more'] === 'yes';
		$params['load_more_text']          = empty($params['load_more_text']) ? esc_html__('Load More', 'setsail-tours') : $params['load_more_text'];
		$params['display_load_more_data']  = (int) $params['number'] == $params['number'] && $params['number'] > 0;

		return setsail_tours_get_tour_module_template_part('tours-list/templates/tours-list-holder', 'tours', 'shortcodes', '', $params);
	}

	public function getMetaQueryParams($params){
		$meta_params = array();

		if(!empty($params['destination'])) {
			$destination_query = new \WP_Query(array('post_status' => 'published', 'post_type' => 'destinations', 'name' => esc_attr(strtolower($params['destination']))));
			wp_reset_postdata();
			$destination_id = $destination_query->posts[0]->ID;
			
			$meta_params = array(
				'meta_key' => 'tour_destination',
				'meta_value' => esc_attr($destination_id)
			);
		}

		return $meta_params;
	}


	public function handleLoadMore() {
		$fields = $this->parseRequest();

		$returnObject = new \stdClass();
		
		$meta_params = $this->getMetaQueryParams($fields);
		$query  = setsail_tours_query()->buildQueryObject($fields,$meta_params);

		if($query->have_posts()) {
			ob_start();

			$this->getToursQueryTemplate(array(
				'query'     => $query,
				'tour_type' => $fields['tour_type'],
				'caller'    => $this,
				'params'    => $fields
			));

			$returnObject->html      = ob_get_clean();
			$returnObject->havePosts = true;
			$returnObject->message   = esc_html__('Success','setsail-tours');
			$returnObject->nextPage  = $fields['next_page'] + 1;
		} else {
			$returnObject->havePosts = false;
			$returnObject->message   = esc_html__('No more tours.', 'setsail-tours');
		}

		echo json_encode($returnObject);
		exit;
	}

	private function parseRequest() {
		if(empty($_POST['fields'])) {
			return false;
		}

		parse_str($_POST['fields'], $fields);

		if(!(is_array($fields) && count($fields))) {
			return false;
		}

		return $fields;
	}

	public function getItemTemplate($tour_type = 'standard', $params = array()) {
		echo setsail_tours_get_tour_module_template_part('templates/tour-item/'.$tour_type, 'tours', '', '', $params);
	}

	public function getFilterCategories($params) {
		$cat_id       = 0;
		$top_category = '';

		if(!empty($params['tour_category'])) {
			$top_category = get_term_by('slug', $params['tour_category'], 'tour-category');
			if(isset($top_category->term_id)) {
				$cat_id = $top_category->term_id;
			}
		}

		$args = array(
			'taxonomy' => 'tour-category',
			'child_of' => $cat_id,
		);

		$filter_categories = get_terms($args);

		return $filter_categories;
	}

	public function getToursQueryTemplate($params) {
		echo setsail_tours_get_tour_module_template_part('tours-list/templates/tours-list-loop', 'tours', 'shortcodes', '', $params);
	}

	private function getListClasses($params) {
		$list_classes = array();
		$list_classes[] = 'qodef-tours-list-holder';
		$list_classes[] = 'qodef-tours-row';

        $list_classes[] = ! empty( $params['space_between_items'] ) ? 'qodef-' . $params['space_between_items'] . '-space' : 'qodef-normal-space';
        $list_classes[] = ! empty( $params['info_position'] ) ? 'qodef-info-' . $params['info_position'] : '';
        $list_classes[] = ! empty( $params['info_skin'] ) ? 'qodef-info-skin-' . $params['info_skin'] : '';

		if ($params['tour_item']) {
			$list_classes[] = 'qodef-tours-columns-'.$params['tour_item'];
		}

		if ($params['tour_type']) {
			$list_classes[] = 'qodef-tours-type-'.$params['tour_type'];
		}

		return implode(' ', $list_classes);
	}
}