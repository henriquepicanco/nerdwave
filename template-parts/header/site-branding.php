<div class="site-branding">
    <p class="site-title screen-reader-text">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
        </a>
    </p>
    
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html( 'Homepage', 'nerdwave' ); ?>" rel="home">
        <?php get_template_part( 'template-parts/brand/logo' ); ?>
    </a>
</div>