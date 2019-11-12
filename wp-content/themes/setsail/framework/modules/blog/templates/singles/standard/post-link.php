<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <?php setsail_select_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
            <?php echo setsail_select_icon_collections()->renderIcon( 'icon_link', 'font_elegant', array( 'icon_attributes' => array( 'class' => 'qodef-link-mark' ) ) ); ?>
        </div>
    </div>
    <div class="qodef-post-additional-content">
        <?php the_content(); ?>
    </div>
	<div class="qodef-post-info-bottom clearfix">
		<div class="qodef-post-info-bottom-left qodef-post-info">
			<?php
			setsail_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $part_params );
			setsail_select_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $part_params );
			setsail_select_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $part_params );
			?>
		</div>
		<div class="qodef-post-info-bottom-right">
			<?php setsail_select_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
		</div>
	</div>
	<?php setsail_select_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
</article>