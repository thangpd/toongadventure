<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-heading">
			<?php if ( has_post_thumbnail() ) {
				setsail_select_get_module_template_part( 'templates/parts/media', 'blog', $post_format, $part_params );
				setsail_select_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $part_params );
			} ?>
		</div>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<div class="qodef-post-text-main">
					<?php setsail_select_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
					<?php setsail_select_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
					<?php do_action('setsail_select_action_single_link_pages'); ?>
				</div>
				<div class="qodef-post-info-bottom clearfix">
					<div class="qodef-post-info-bottom-left qodef-post-info">
						<?php
						setsail_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $part_params );
						setsail_select_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $part_params );
						if ( ! has_post_thumbnail() ) {
							setsail_select_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $part_params );
						}
						?>
					</div>
					<div class="qodef-post-info-bottom-right">
						<?php setsail_select_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>