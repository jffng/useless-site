<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package useless
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :
      /* show the latest thing */
      query_posts('post_type=things&posts_per_page=1');
      while ( have_posts() ) : the_post();
        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

      wp_reset_query();

      /* show the rest of the things */
      $index = 0;
      while ( have_posts() ) : the_post();
        if ($index > 0) :
          get_template_part( 'template-parts/content', get_post_format() );
        else :
          $index++;
        endif;
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
