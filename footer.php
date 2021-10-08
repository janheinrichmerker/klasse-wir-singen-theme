<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dara
 */

?>

	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
        <nav id="site-footer-navigation" class="footer-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'bottom-menu' ) ); ?>
        </nav>
	</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
