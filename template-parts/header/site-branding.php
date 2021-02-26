<div class="site-branding">
    <?php
    if ( is_front_page() && is_home() ) :
        ?>
        <h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
    else :
        ?>
        <p class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
    endif;
    ?>
    
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html( 'Homepage', 'nerdwave' ); ?>" rel="home">
        <?php get_template_part( 'template-parts/brand/logo' ); ?>
    </a>
</div>