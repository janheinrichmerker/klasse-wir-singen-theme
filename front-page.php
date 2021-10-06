<?php
/**
 * @package Dara
 */

if ( 'posts' == get_option( 'show_on_front' ) ) :

	get_template_part( 'index' );

else :

get_header(); ?>

<div class="content-wrapper full-width <?php echo esc_attr( dara_additional_class() ); ?>">

	<div id="primary" class="content-area">
        <div id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'components/page/content', 'page' ); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
	</div><!-- #primary -->
</div><!-- .content-wrapper -->

<?php //dara_featured_pages(); ?>

<div id="quaternary" class="featured-page-area">
    <div class="featured-page-wrapper clear">
        <div class="featured-page">
            <article class="page type-page status-publish has-post-thumbnail hentry tag-jubilaeum with-featured-image">
                <a href="/jubilaeum/">
                    <img src="/wp-content/uploads/2021/10/Frame-12.png"
                         class="attachment-post-thumbnail size-post-thumbnail wp-post-image jetpack-lazy-image jetpack-lazy-image--handled"
                         alt="Landesdgeburtstag"
                         loading="eager">
                </a>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="/jubilaeum/" rel="bookmark" title="75. Geburtstag">75.&nbsp;Landesgeburtstag</a>
                    </h2>
                </header>
                <div class="entry-summary">
                    <a href="/jubilaeum/">
                        <p>
                            Am 1.&nbsp;November&nbsp;2021 wird das Land Niedersachsen 75. Feiern Sie mit!
                        </p>
                    </a>
                </div>
            </article>
        </div>
        <div class="featured-page">
            <article class="page type-page status-publish has-post-thumbnail hentry tag-musical with-featured-image">
                <a href="/musical/">
                    <img src="/wp-content/uploads/2021/10/Frame-12.png"
                         class="attachment-post-thumbnail size-post-thumbnail wp-post-image jetpack-lazy-image jetpack-lazy-image--handled"
                         alt="Musical"
                         loading="eager">
                </a>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="/musical/" rel="bookmark" title="Musical">Musical</a>
                    </h2>
                </header>
                <div class="entry-summary">
                    <a href="/musical/">
                        <p>
                            Das Kindermusical zum Mitmachen, erstmals 2022!
                        </p>
                    </a>
                </div>
            </article>
        </div>
        <div class="featured-page">
            <article class="page type-page status-publish has-post-thumbnail hentry tag-original with-featured-image">
                <a href="/original/">
                    <img src="/wp-content/uploads/2021/10/Frame-12.png"
                         class="attachment-post-thumbnail size-post-thumbnail wp-post-image jetpack-lazy-image jetpack-lazy-image--handled"
                         alt="Original"
                         loading="eager">
                </a>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="/original/" rel="bookmark" title="Original">Original</a>
                    </h2>
                </header>
                <div class="entry-summary">
                    <a href="/original/">
                        <p>Klasse! Wir singen Liederfeste, wie Sie sie kennen und lieben.</p>
                    </a>
                </div>
            </article>
        </div>
    </div>
</div>

<?php get_footer();

endif;
