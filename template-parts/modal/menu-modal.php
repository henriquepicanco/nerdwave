<div id="menu-modal" class="menu-modal">
    <div class="container">
        <div class="row">
            <div class="col-11-sm col-11">
                <?php get_template_part( 'template-parts/header/site-branding' ); ?>
            </div>
            <div class="col-1-sm col-1">
                <button class="menu-close-toggle" aria-controls="menu-modal" aria-expanded="false">
                    <?php echo nerdwave_get_theme_svg( 'cross' ); ?>
                    <span class="screen-reader-text"><?php esc_html_e( 'Fechar menu', 'nerdwave' ); ?></span>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12-sm col-12">
                <?php
                get_template_part( 'template-parts/navigation/main-navigation' );
                get_template_part( 'template-parts/navigation/social-navigation' );
                ?>
            </div>
        </div>
    </div>
</div>