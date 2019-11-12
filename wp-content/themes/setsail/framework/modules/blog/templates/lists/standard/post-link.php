<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text">
			<?php setsail_select_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
			<?php echo setsail_select_icon_collections()->renderIcon( 'icon_link', 'font_elegant', array( 'icon_attributes' => array( 'class' => 'qodef-link-mark' ) ) ); ?>
		</div>
	</div>
</article>