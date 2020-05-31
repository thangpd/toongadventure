
<div class="qodef-shortcode_team-holder <?php echo esc_attr( $holder_classes ); ?> clearfix">
    <div class="shortcode-team-user <?php echo $style; ?>">
        <div class="shortcode-team-user_top">
            <div class="shortcode-team-user-image ">
                <?php echo wp_get_attachment_image( esc_attr( $user_attach_image ), 'large' ); ?>
            </div>
            <div class="shortcode-team-user-info text-uppercase">
                <p class="shortcode-team-user-info-job "><?php echo esc_attr( $user_job ); ?></p>
                <p class="shortcode-team-user-info-name"><?php echo esc_attr( $user_name ); ?></p>
            </div>
        </div>
        <div class="shortcode-team-user_bottom">
            <div class="shortcode-team-user-des">
                <?= __( $user_des ) ?>
            </div>
        </div>
    </div>
</div>


