<li class="qodef-bl-item qodef-item-space">
	<div class="qodef-bli-inner">
		<?php setsail_select_get_module_template_part( 'templates/parts/media', 'blog', '', $params ); ?>
        <div class="qodef-bli-content">
	        <?php setsail_select_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
			<?php setsail_select_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
	        <div class="qodef-bli-info">
		        <?php
		        setsail_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
		        setsail_select_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		        ?>
	        </div>
        </div>
	</div>
</li>