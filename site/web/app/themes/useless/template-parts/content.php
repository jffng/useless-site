<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package useless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			 <?php useless_posted_on(); ?> 
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <a class="no-highlight" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a><br>
		<?php 
      /* the_post_thumbnail(); */

			/* the_content( sprintf( */
			/* 	/1* translators: %s: Name of current post. *1/ */
			/* 	wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'useless' ), array( 'span' => array( 'class' => array() ) ) ), */
			/* 	the_title( '<span class="screen-reader-text">"', '"</span>', false ) */
      /* ) ); */ ?>

      <p><?php echo rwmb_meta('tagline'); ?></p>
      <div class="thing-link"><a href="<?php echo get_permalink(); ?>">Read About It</a></div>
      <div class="thing-link"><a href="<?php echo rwmb_meta('link'); ?>">See It</a></div>

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
