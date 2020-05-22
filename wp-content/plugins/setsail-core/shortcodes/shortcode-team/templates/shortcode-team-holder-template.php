<div class="qodef-shortcode_team-holder <?php echo esc_attr( $holder_classes ); ?> clearfix">
    <div class="shortcode-team-user style-1">

            <div class="shortcode-team-user-image ">
				<?php echo wp_get_attachment_image( esc_attr( $user_attach_image ), 'large' ); ?>
            </div>
            <div class="hortcode-team-user-info text-uppercase">
                <p class="hortcode-team-user-info-job "><?php echo esc_attr( $user_job ); ?></p>
                <p class="hortcode-team-user-info-name"><?php echo esc_attr( $user_name ); ?></p>
            </div>
            <div class="hortcode-team-user-des">
					<?= __( $user_des ) ?>
            </div>
    </div>
</div>


