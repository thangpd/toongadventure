<?php
$blog_single_navigation = setsail_select_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = setsail_select_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="qodef-blog-single-navigation">
		<?php
		/* Single navigation section - SETTING PARAMS */
		$post_navigation = array(
			'prev' => array(
				'mark' => '<span class="qodef-blog-single-nav-mark ion-ios-arrow-thin-left"></span>',
				'label' => '<span class="qodef-blog-single-nav-label">'.esc_html__('Previous', 'setsail').'</span>'
			),
			'next' => array(
				'mark' => '<span class="qodef-blog-single-nav-mark ion-ios-arrow-thin-right"></span>',
				'label' => '<span class="qodef-blog-single-nav-label">'.esc_html__('Next', 'setsail').'</span>'
			)
		);
		
		if($blog_navigation_through_same_category){
			if(get_previous_post(true) !== ""){
				$post_navigation['prev']['post'] = get_previous_post(true);
			}
			if(get_next_post(true) !== ""){
				$post_navigation['next']['post'] = get_next_post(true);
			}
		} else {
			if(get_previous_post() !== ""){
				$post_navigation['prev']['post'] = get_previous_post();
			}
			if(get_next_post() !== ""){
				$post_navigation['next']['post'] = get_next_post();
			}
		}
		
		/* Single navigation section - RENDERING */
		foreach (array('prev', 'next') as $nav_type) {
			if (isset($post_navigation[$nav_type]['post'])) {
				$postObject = $post_navigation[ $nav_type ]['post'];
				$postID     = $postObject->ID;
				$imageClass = get_the_post_thumbnail( $postObject ) !== '' ? 'qodef-has-image' : 'qodef-no-image';
				?>
				<a itemprop="url" class="qodef-blog-single-<?php echo esc_attr( $nav_type ); ?> <?php echo esc_attr( $imageClass ); ?>" href="<?php echo get_permalink( $postID ); ?>">
					<?php if ( has_post_thumbnail( $postID ) ) {
						echo get_the_post_thumbnail( $postID, 'thumbnail' );
					} ?>
					<span class="qodef-blog-single-nav-info">
						<span class="qodef-blog-single-nav-title"><?php echo get_the_title( $postID ); ?></span>
						<?php echo wp_kses( $post_navigation[ $nav_type ]['label'], array( 'span' => array( 'class' => true ) ) ); ?>
					</span>
				</a>
			<?php }
		}
		?>
	</div>
<?php } ?>