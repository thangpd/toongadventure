<?php

if ( class_exists('SetSailSelectClassWidget') ) {
	class SetSailSelectClassSearchPostType extends SetSailSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_search_post_type',
				esc_html__('SetSail Search Post Type', 'setsail'),
				array('description' => esc_html__('Select post type that you want to be searched for', 'setsail'))
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$post_types = apply_filters('setsail_select_filter_search_post_type_widget_params_post_type', array('post' => esc_html__('Post', 'setsail')));
			
			$this->params = array(
				array(
					'type'        => 'dropdown',
					'name'        => 'post_type',
					'title'       => esc_html__('Post Type', 'setsail'),
					'description' => esc_html__('Choose post type that you want to be searched for', 'setsail'),
					'options'     => $post_types
				)
			);
		}
		
		public function widget($args, $instance) {
			$search_type_class = 'qodef-search-post-type';
			$post_type = $instance['post_type'];
			?>

            <div class="widget qodef-search-post-type-widget">
                <div data-post-type="<?php echo esc_attr($post_type); ?>" <?php setsail_select_class_attribute($search_type_class); ?>>
                    <span class="qodef-input-icon"><?php echo setsail_select_icon_collections()->renderIcon('icon_pushpin', 'font_elegant'); ?></span>
                    <input class="qodef-post-type-search-field" value=""
                           placeholder="<?php esc_attr_e('Travel type...', 'setsail') ?>">
					<?php echo setsail_select_get_button_html(
						array(
							'html_type'    => 'button',
							'custom_class' => 'qodef-spt-button',
							'size'         => 'large',
							'text'         => 'view more'
						)
					) ?>
                    <i class="qodef-search-loading fa fa-spinner fa-spin qodef-hidden" aria-hidden="true"></i>
                </div>
                <div class="qodef-post-type-search-results"></div>
	            <?php wp_nonce_field( 'qodef_search_post_types_nonce', 'qodef_search_post_types_nonce' ); ?>
            </div>
		<?php }
	}
}