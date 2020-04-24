<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 3/9/2020
 * Time: 5:56 PM
 */


wp_head();
global $post;
echo do_shortcode($post->post_content);
wp_footer();