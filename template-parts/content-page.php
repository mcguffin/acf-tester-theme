<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ACF_Tester
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<pre><?php
		foreach ( array('choice_select', 'choice_checkbox', 'choice_radio_button', 'choice_button_group', 'choice_truefalse') as $field ) {
			echo "// Field: {$field}\n";
			the_field($field);
			echo "\n";
		}
	?></pre>
<?php foreach ( array('the_choices_mod','the_choices_opt') as $post_id ) { ?>
	<pre><?php
		foreach ( array('choice_select', 'choice_checkbox', 'choice_radio_button', 'choice_button_group', 'choice_truefalse') as $field ) {
			echo "// Field: {$field} Post: {$post_id}\n";
			the_field($field,$post_id);
			echo "\n";
		}
	?></pre>
<?php } ?>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acf-tester' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'acf-tester' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
