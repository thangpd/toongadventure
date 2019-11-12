<?php
if(get_the_excerpt() !== '') : ?>
    <div class="qodef-info-section-part qodef-tour-item-excerpt">
        <?php the_excerpt(); ?>
    </div>
<?php endif; ?>