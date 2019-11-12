<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="qodef-info-section-part qodef-tour-item-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>