( function() {

    /**
     * Header e modais
     */

    // Javascript para o corpo da página
    const body = document.getElementsByTagName( 'body' )[0];
    const page = document.getElementById( 'page' );
    
    // Javascript encontra o cabeçalho do site
    const masthead = document.getElementById( 'masthead' );

    // Relacionado ao menu
    const menuMobileToggle = document.querySelectorAll( '.mobile-menu-toggle' );
    const menuModal = document.getElementsByClassName( 'menu-modal' )[0];
    const menuCloseToggle = menuModal.getElementsByClassName( 'menu-close-toggle' )[0];

    menuMobileToggle.forEach( function( menuMobileToggle ) {
        menuMobileToggle.addEventListener( 'click', function() {

            menuModal.classList.toggle( 'offcanvas-menu-active' );
            body.classList.toggle( 'offcanvas-menu-active' );

            if ( menuMobileToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                menuMobileToggle.setAttribute( 'aria-expanded', 'true' );
            }

            if ( menuCloseToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                menuCloseToggle.setAttribute( 'aria-expanded', 'true' );
            }

        });
    });

    menuCloseToggle.addEventListener( 'click', function() {

        menuModal.classList.remove( 'offcanvas-menu-active' );
        body.classList.remove( 'offcanvas-menu-active' );

        if ( menuCloseToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
            menuCloseToggle.setAttribute( 'aria-expanded', 'false' );
        }

        menuMobileToggle.forEach( function( menuMobileToggle ) {
            if ( menuMobileToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
                menuMobileToggle.setAttribute( 'aria-expanded', 'false' );
            }
        });

    });
    
    // Related to search at mobile
    const searchMobileToggle = document.querySelectorAll( '.mobile-search-toggle' );
    const searchModal = document.getElementsByClassName( 'search-modal' )[0];
    const searchCloseToggle = searchModal.getElementsByClassName( 'search-close-toggle' )[0];

    searchMobileToggle.forEach( function( searchMobileToggle ) {
        searchMobileToggle.addEventListener( 'click', function() {

            searchModal.classList.toggle( 'offcanvas-search-active' );
            body.classList.toggle( 'offcanvas-search-active' );

            if ( searchMobileToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                searchMobileToggle.setAttribute( 'aria-expanded', 'true' );
            }

            if ( searchCloseToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                searchCloseToggle.setAttribute( 'aria-expanded', 'true' );
            }

        });
    });

    searchCloseToggle.addEventListener( 'click', function() {

        searchModal.classList.remove( 'offcanvas-search-active' );
        body.classList.remove( 'offcanvas-search-active' );

        if ( searchCloseToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
            searchCloseToggle.setAttribute( 'aria-expanded', 'false' );
        }

        searchMobileToggle.forEach( function( searchMobileToggle ) {
            if ( searchMobileToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
                searchMobileToggle.setAttribute( 'aria-expanded', 'false' );
            }
        });

    });

    
    // Related to search at desktop
    const searchDesktopToggle = document.querySelectorAll( '.desktop-search-toggle' );
    const searchDesktop = document.getElementsByClassName( 'header-search-inner' )[0];
    const searchDesktopField = searchDesktop.getElementsByClassName( 'search-field' )[0];

    searchDesktopToggle.forEach( function( searchDesktopToggle ) {
        searchDesktopToggle.addEventListener( 'click', function() {

            searchDesktop.classList.toggle( 'header-search-active' );
            
            setTimeout(function() {
                searchDesktopField.focus();
            }, 400)

            if ( searchDesktopToggle.getAttribute( 'aria-expanded' ) === 'false' ) {
                searchDesktopToggle.setAttribute( 'aria-expanded', 'true' );
            }

        });
    });
    
}() );