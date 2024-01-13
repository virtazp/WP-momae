<?php

include get_template_directory() . '/inc/traitements/header_t.php';

add_action('wp_ajax_wn_menu_mobile', 'wn_menu_mobile');
add_action('wp_ajax_nopriv_wn_menu_mobile', 'wn_menu_mobile');

function wn_menu_mobile()
{
    $menu = wn_getMenu('menu');
    $menuRetour = '<ul id="top-menu">';
    foreach ($menu as $m) {

        if (get_permalink() === $m['url']) {
            if (!empty($m['children'])) {
                $menuRetour .= '<li class="menu-mobile1">' .
                    '<a href="#" aria-current="page">' . $m['title'] . '</a>' .
                    '</li>';
            } else {
                $menuRetour .= '<li class="menu-mobile1">' .
                    '<a href="' . $m['url'] . '" aria-current="page">' . $m['title'] . '</a>' .
                    '</li>';
            }
            // // $menuRetour .= '<li class="menu-mobile1">' .
            //     '<a href="' . $m['url'] . '" aria-current="page">' . $m['title'] . '</a>' .
            //     '</li>';
            if (!empty($m['children'])) {
                foreach ($m['children'] as $sm) {
                    $menuRetour .= '<li class="menu-mobile2"><a href="' . $sm['url'] . '">' . $sm['title'] . '</a></li>';
                }
            }
        } else {
            if (!empty($m['children'])) {
                $menuRetour .= '<li class="menu-mobile1">' .
                    '<a href="#">' . $m['title'] . '</a>' .
                    '</li>';
            } else {
                $menuRetour .= '<li class="menu-mobile1">' .
                    '<a href="' . $m['url'] . '">' . $m['title'] . '</a>' .
                    '</li>';
            }
            // $menuRetour .= '<li class="menu-mobile1">' .
            //     '<a href="' . $m['url'] . '">' . $m['title'] . '</a>' .
            //     '</li>';
            if (!empty($m['children'])) {
                foreach ($m['children'] as $sm) {
                    $menuRetour .= '<li class="menu-mobile2"><a href="' . $sm['url'] . '">' . $sm['title'] . '</a></li>';
                }
            }
        }
    }
    $menuRetour .= '</ul>';
    wp_send_json_success($menuRetour);
    wp_die();
}

add_action('wp_ajax_wn_icone_menu_mobile', 'wn_icone_menu_mobile');
add_action('wp_ajax_nopriv_wn_icone_menu_mobile', 'wn_icone_menu_mobile');

function wn_icone_menu_mobile()
{
    $menuRetour = '<img src="' . get_template_directory_uri() . '/assets/css/images/header/icone_hamburger.svg" alt="Affichage du menu version mobile" id="hamburgerMenuMobile">';
    
    wp_send_json_success($menuRetour);
    wp_die();
}
