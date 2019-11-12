<?php

if ( ! function_exists( 'setsail_select_get_blog_list_types_options' ) ) {
	function setsail_select_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'setsail_select_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'setsail_select_blog_options_map' ) ) {
	function setsail_select_blog_options_map() {
		$blog_list_type_options = setsail_select_get_blog_list_types_options();
		
		setsail_select_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'setsail' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = setsail_select_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'blog_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'setsail' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for blog post lists. Default value is large', 'setsail' ),
				'options'     => setsail_select_get_space_between_items_array( true ),
				'parent'      => $panel_blog_lists
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'setsail' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'setsail' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'setsail' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'setsail' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => setsail_select_get_custom_sidebars_options(),
			)
		);
		
		$setsail_custom_sidebars = setsail_select_get_custom_sidebars();
		if ( count( $setsail_custom_sidebars ) > 0 ) {
			setsail_select_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'setsail' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'setsail' ),
					'parent'      => $panel_blog_lists,
					'options'     => setsail_select_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'setsail' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'setsail' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'setsail' ),
					'full-width' => esc_html__( 'Full Width', 'setsail' )
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'setsail' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'setsail' ),
				'parent'        => $panel_blog_lists,
				'options'       => setsail_select_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'setsail' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'setsail' ),
				'default_value' => 'normal',
				'options'       => setsail_select_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'setsail' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'setsail' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'setsail' ),
					'original' => esc_html__( 'Original', 'setsail' )
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'setsail' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'setsail' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'setsail' ),
					'load-more'       => esc_html__( 'Load More', 'setsail' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'setsail' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'setsail' )
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'setsail' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'setsail' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_tags_area_blog',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Blog Tags on Standard List', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show tags on standard blog list', 'setsail' ),
				'parent'        => $panel_blog_lists
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = setsail_select_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'setsail' )
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_boxed_layout',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Boxed Layout', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will set boxed layout around post content on single post pages', 'setsail' ),
				'parent'        => $panel_blog_single
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_enable_boxed_layout_overlapping',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Boxed Layout Overlapping', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will set boxed content layout to overlap title area on single post pages', 'setsail' ),
				'parent'        => $panel_blog_single,
				'dependency'    => array(
					'show' => array(
						'blog_single_boxed_layout' => 'yes'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'        => 'blog_single_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'setsail' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for Blog Single pages. Default value is large', 'setsail' ),
				'options'     => setsail_select_get_space_between_items_array( true ),
				'parent'      => $panel_blog_single
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'setsail' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'setsail' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => setsail_select_get_custom_sidebars_options()
			)
		);
		
		if ( count( $setsail_custom_sidebars ) > 0 ) {
			setsail_select_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'setsail' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'setsail' ),
					'parent'      => $panel_blog_single,
					'options'     => setsail_select_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'setsail' ),
				'parent'        => $panel_blog_single,
				'options'       => setsail_select_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'setsail' ),
				'parent'        => $panel_blog_single,
				'dependency' => array(
					'hide' => array(
						'show_title_area_blog' => 'no'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'setsail' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'setsail' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'setsail' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'setsail' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = setsail_select_add_admin_container(
			array(
				'name'            => 'qodef_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'setsail' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'setsail' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages. Author biographic info field in Users section must contain some data', 'setsail' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = setsail_select_add_admin_container(
			array(
				'name'            => 'qodef_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'setsail' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		setsail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'setsail' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'setsail' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'setsail_select_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'setsail_select_action_options_map', 'setsail_select_blog_options_map', setsail_select_set_options_map_position( 'blog' ) );
}