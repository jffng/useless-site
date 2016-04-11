<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package useless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-meta">
      <?php the_date(); ?><br>
      <span>By <?php $link = rwmb_meta('link'); ?></span>
      <?php echo rwmb_meta('thing_author'); ?><br>
      <a href="<?php echo $link; ?>"><?php echo $link; ?></a>
		</div><!-- .entry-meta -->
    <?php the_post_thumbnail(); ?><br>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'useless' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php useless_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

