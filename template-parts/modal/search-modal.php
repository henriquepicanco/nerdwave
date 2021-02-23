<div id="search-modal" class="search-modal">
    <div class="container">
        <div class="row">
            <div class="col-sm-11 col-11">
                <?php get_template_part( 'template-parts/header/site-branding' ); ?>
            </div>
            <div class="col-sm-1 col-1">
                <button class="search-close-toggle" aria-controls="menu-modal" aria-expanded="false">
                    <?php echo nerdwave_get_theme_svg( 'cross' ); ?>
                    <span class="screen-reader-text"><?php esc_html_e( 'Close menu', 'nerdwave' ); ?></span>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12">
                <?php
                get_search_form();
                ?>
            </div>
        </div>
    </div>
</div>