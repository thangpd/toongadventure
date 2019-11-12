<?php
$title_tag       = isset( $quote_tag ) ? $quote_tag : 'span';
$quote_text_meta = get_post_meta( get_the_ID(), "qodef_post_quote_text_meta", true );

$post_title = ! empty( $quote_text_meta ) ? $quote_text_meta : get_the_title();

$post_author = get_post_meta( get_the_ID(), "qodef_post_quote_author_meta", true );
?>
<div class="qodef-post-quote-holder">
	<<?php echo esc_attr( $title_tag ); ?> itemprop="name" class="qodef-quote-title qodef-post-title">
		<?php if ( setsail_select_blog_item_has_link() ) { ?>
			<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php } ?>
			<?php echo esc_html( $post_title ); ?>
		<?php if ( setsail_select_blog_item_has_link() ) { ?>
			</a>
		<?php } ?>
	</<?php echo esc_attr( $title_tag ); ?>>
	<?php if ( $post_author != '' ) { ?>
		<h5 class="qodef-quote-author"><?php echo esc_html( $post_author ); ?></h5>
	<?php } ?>
</div>