<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <?php
    wp_head();
    do_action('header_hook_file');
    ?>
</head>

<body <?php body_class(); ?>>
    <header id="main-header">
        <div id="sub-header">
            <div id="sub-headerCont">
                <!-- <div id="sub-header1">
                    Web-network
                </div> -->
                <div id="sub-header2">
                    <!-- <div id="sub-header21">
                        <a href="">Lorem</a>
                    </div> -->
                    <!-- <div id="sub-header22">|</div> -->
                    <div id="sub-header23">
                        <img src="<?php echo convertImageBase64("header/plus.svg", false) ?>" alt="Augmenter la taille des polices">
                    </div>
                    <div id="sub-header24">
                        <img src="<?php echo convertImageBase64("header/moins.svg", false) ?>" alt="Diminuer la taille des polices">
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once('inc/traitements/header_t.php');
        $menu = wn_getMenu('menu');
        ?>

        <div id="header1">
            <div id="header-1">
                <div id="header-1-1">
                    <a id="header-1-1-1" href="<?php echo esc_url(home_url('/')); ?>">
                        Momae
                    </a>
                </div>
                <div id="header-1-2">
                    <nav id="menu-principal">
                        <ul id="menu-principal-ul">
                            <?php echo wn_formatMenu($menu); ?>
                        </ul>
                    </nav>
                    <div id="et_top_search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.061" height="17.061" viewBox="0 0 17.061 17.061">
                            <g transform="translate(-1652.439 -41)">
                                <line id="maLigne" x1="4.848" y2="4.848" transform="translate(1653.5 52.152)" fill="none" stroke="#202427" stroke-linecap="round" stroke-width="1.5" />
                                <g  id="maLigne2" transform="translate(1655.924 41)" fill="none" stroke="#202427" stroke-linecap="round" stroke-width="1.5">
                                    <circle cx="6.788" cy="6.788" r="6.788" stroke="none" />
                                    <circle cx="6.788" cy="6.788" r="6.038" fill="none" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div id="et_mobile_nav_menu">
                        <div class="mobile_nav1" id="mobileNav">
                        </div>
                    </div>
                </div>
            </div>

            <div class="et_search_outer" id="rechercheUser">
                <div class="container et_search_form_container">
                    <form role="search" method="get" class="et-search-form" action="<?php echo get_site_url(); ?>">
                        <input type="search" class="et-search-field" placeholder="Rechercher …" value="" name="s" title="Rechercher:" id="search-field">
                    </form>
                    <span class="et_close_search_field" id="closeRechercheUser">X</span>
                </div>
            </div>

            <div>
                <nav id="top-menu-nav">
                </nav>
            </div>
        </div>
    </header>