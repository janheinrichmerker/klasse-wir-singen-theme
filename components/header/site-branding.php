<div class="site-branding">
    <a href="/" class="logo-link" rel="home">
        <?php
        $tags = get_the_tags();
        foreach ( $tags as $tag ) {
            if ($tag->slug == "musical") {
                $logo_file = "logo-devil.svg";
            }
        }
        if (!isset($logo_file)) {
            $logo_file = "logo.svg";
        }
        ?>
        <img src="<?php echo(bloginfo('template_directory')); ?>/images/<?php echo($logo_file) ?>"
             class="logo"
             alt="Klasse! Wir singen">
    </a>
</div><!-- .site-branding -->
