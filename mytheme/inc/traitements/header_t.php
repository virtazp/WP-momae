<?php
function wn_getMenu($nomdumenu)
{
    $array_menu = wp_get_nav_menu_items($nomdumenu);
    // var_dump($array_menu); 

    $menu = array();
    $submenu = array();
    foreach ($array_menu as $m) {
        // Si l'élément n'a pas de parent
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']      =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['target']         =   $m->target;
            $menu[$m->ID]['attr_title']         =   $m->attr_title;
            $menu[$m->ID]['children']    =   array();
        } else {
            // S'il a un parent
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']         =   $m->url;
            $submenu[$m->ID]['target']    =   $m->target;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    };
    return $menu;
}

function wn_formatMenu($menu)
{
    $menuAffiche = '';

    global $wp;
    $_current_url = home_url($wp->request);
    $current_url = $_current_url . "/";

    foreach ($menu as $m) {

        $chevron = '';
        $childrenExist = '';

        // S'il y a un sous menu à afficher
        if (!empty($m['children'])) {
            $chevron = '<span class="chevronj"><img src="' . convertImageBase64('header/chevron-open.svg') . '" alt="Dérouler le sous menu"></span>';
            $childrenExist = 'trueChildrenExist';
        }

        // Sur la page où l'on est dans le loop
        if ($current_url === $m['url']) {
            // S'il y a un sous menu à afficher
            if (!empty($m['children'])) {
                $menuAffiche .= '<li class="currentPage itemMenu ' . $childrenExist . '" ><a href="' . $m['url'] . '" aria-current="page" class="aItemMenu" aria-label="' . $m['title'] . '">' . $m['title'] . ' ' . $chevron . ' ' . '</a>';
            } else {
                $menuAffiche .= '<li class="currentPage itemMenu"><a href="' . $m['url'] . '" aria-current="page" class="aItemMenu" aria-label="' . $m['title'] . '">' . $m['title'] . '</a>';
            }

            if (!empty($m['children'])) {
                $menuAffiche .= '<ul class="sousMenu">';
                foreach ($m['children'] as $sm) {
                    if ($current_url === $sm['url']) {
                        $menuAffiche .= '<li class="itemMenuSsMenu currentPage2"><a href="' . $sm['url'] . '" class="aItemMenuSsMenu" target="' . $sm['target'] . '" aria-label="' . $sm['title'] . '">' . $sm['title'] . '</a></li>';
                    } else {
                        $menuAffiche .= '<li class="itemMenuSsMenu"><a href="' . $sm['url'] . '" class="aItemMenuSsMenu" target="' . $sm['target'] . '" aria-label="' . $sm['title'] . '">' . $sm['title'] . '</a></li>';
                    }
                }
                $menuAffiche .= '</ul>';
            }
            $menuAffiche .= '</li>';
        } else {

            if (!empty($m['children'])) {
                $menuAffiche .= '<li class="itemMenu ' . $childrenExist . '"><a href="' . $m['url'] . '" class="aItemMenu"   aria-label="' . $m['title'] . '">' . $m['title'] . ' ' . $chevron . ' ' . '</a>';
            } else {
                $menuAffiche .= '<li class="itemMenu"><a href="' . $m['url'] . '" class="aItemMenu"   aria-label="' . $m['title'] . '">' . $m['title'] . '</a>';
            }

            if (!empty($m['children'])) {

                $menuAffiche .= '<ul class="sousMenu">';

                foreach ($m['children'] as $sm) {
                    $menuAffiche .= '<li class="itemMenuSsMenu"><a href="' . $sm['url'] . '" class="aItemMenuSsMenu" target="' . $sm['target'] . '" aria-label="' . $sm['title'] . '">' . $sm['title'] . '</a></li>';
                }
                $menuAffiche .= '</ul>';
            }
            $menuAffiche .= '</li>';
        }
    }

    return $menuAffiche;
}

function wn_formatMenuMobile($menu)
{
    global $wp;
    $current_url = home_url($wp->request) . "/";

    $menuRetour = '';
    foreach ($menu as $m) {

        if ($current_url === $m['url']) {
            if (!empty($m['children'])) {
                $menuRetour .= '<li class="menu-mobile1">' .
                    '<a href="#" aria-current="page">' . $m['title'] . '</a>' .
                    '</li>';
            } else {
                $menuRetour .= '<li class="menu-mobile1">' .
                    '<a href="' . $m['url'] . '" aria-current="page">' . $m['title'] . '</a>' .
                    '</li>';
            }

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

            if (!empty($m['children'])) {
                foreach ($m['children'] as $sm) {
                    $menuRetour .= '<li class="menu-mobile2"><a href="' . $sm['url'] . '">' . $sm['title'] . '</a></li>';
                }
            }
        }
    }

    return $menuRetour;
}
