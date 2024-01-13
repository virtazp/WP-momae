<?php
#region Déclaration des variables global et du mode dev
function pathSite()
{
  // Permet une meilleure gestion du js : Une variable js est déclarée dans header.php contenant le chemin du site
  return get_site_url();
}
#endregion

#region Menu
function add_Main_Nav()
{
    register_nav_menu('menu', __('Menu'));
}
add_action('init', 'add_Main_Nav');
#endregion

#region CSS
function  theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() .  '/style.css');
    wp_enqueue_style('header', get_template_directory_uri() . '/assets/css/header.css', array('parent-style'));
    wp_enqueue_style('footer', get_template_directory_uri() . '/assets/css/footer.css', array('parent-style', 'header'));
}
add_action('wp_enqueue_scripts',  'theme_enqueue_styles');
#endregion

#region Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl()
{
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
#endregion

#region Footer
add_action('wp_footer', 'mes_scripts');
function mes_scripts()
{
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'));
}
#endregion

// wp_head : ajoute dans la balise head (Possibilité ajout directement dans header.php)
// add_action('wp_head', 'bootsJs');
function bootsJs()
{
    echo '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
}

