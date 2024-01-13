<?php
include get_template_directory() . '/inc/extends-functions/add-actions.php';
include get_template_directory() . '/inc/extends-functions/remove-actions.php';

#region Load CPT
require_once('assets/cpt/pratique_cpt.php');
require_once('assets/cpt/probleme_sante_cpt.php');
#endregion

#region Fonctions supplémentaires
require_once('inc/extends-functions/function_util.php');
#endregion

#region Ajax
include get_template_directory() . '/inc/ajax/menu.php';
#endregion


