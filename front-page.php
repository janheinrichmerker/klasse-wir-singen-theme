<?php
/**
 * @package Dara
 */

if ( 'posts' == get_option( 'show_on_front' ) ) :

	get_template_part( 'index' );

else :

get_header(); ?>

    <?php dara_featured_pages(); ?>

	<div id="primary" class="content-area">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'components/page/content', 'page' ); ?>

			<?php // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
		<?php endwhile; ?>
	</div><!-- #primary -->

<?php get_sidebar( 'footer' ); ?>
<?php get_footer();

endif;
