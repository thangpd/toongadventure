<div class="qodef-shortcode_team-holder <?php echo esc_attr($holder_classes); ?> clearfix">


    <div class="shortcode-team-user">
        <div class="row ">
            <div class="col-12 ">
                <div class="shortcode-team-user-image d-flex justify-content-center">
                    <?php echo wp_get_attachment_image( esc_attr($user_attach_image), 'large' ); ?>
                </div>
                <div class="hortcode-team-user-info text-uppercase">
                    <p class="hortcode-team-user-info-job d-flex justify-content-center "><?php echo esc_attr($user_job); ?></p>
                    <p class="hortcode-team-user-info-name d-flex justify-content-center "><?php echo esc_attr($user_name); ?></p>
                </div>
            </div>
            <div class="col-12">
                <div class="hortcode-team-user-des">
                   <p>
                   <?=  __($user_des) ?>
                   </p> 
                </div>
            </div>
        </div> 

    </div>
</div>


