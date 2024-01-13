<?php
// Instancier la classe wpdb
global $wpdb;

// Objet global fournit par WP instantié pour intéragir avec la BDD de WordPress
$GLOBALS["wpdb"] = $wpdb;
// Nom de la table en BDD
$GLOBALS["table_probleme_besoin_pratique"] = $wpdb->prefix . "probleme_besoin_pratique";
// Nom de la table en BDD
$GLOBALS["table_pratique"] = $wpdb->prefix . "pratique";
// Nom de la table en BDD
$GLOBALS["table_probleme_sante_besoin"] = $wpdb->prefix . "probleme_sante_besoin";

#region GET
/**
 * Fonction 
 * 
 * @return  object|null Tableau
 */
function get_probleme_besoin_pratique()
{
  return $GLOBALS['wpdb']->get_results(
    "SELECT A.Id AS idProblemeSante, A.Nom AS NomProblemeSante, A.Description AS DescriptionProblemeSante, C.Id AS idPratique, C.Nom AS NomPratique, C.Description AS DescriptionPratique
    FROM (" . $GLOBALS['table_probleme_sante_besoin'] . " AS A) LEFT JOIN (" . $GLOBALS['table_probleme_besoin_pratique'] . " AS B) ON A.Id = B.IdProblemeBesoin LEFT JOIN (" . $GLOBALS['table_pratique'] . " AS C) ON B.IdPratique = C.Id"
  );
}

/**
 * Fonction 
 * 
 * @param Integer $id
 * 
 * @return int|null Tableau
 */
function get_pratique($id)
{
  return $GLOBALS['wpdb']->get_results(
    "SELECT * FROM " . $GLOBALS['table_pratique']
  );
}

/**
 * Fonction 
 * 
 * @param Integer $id
 * 
 * @return int|null Tableau
 */
function get_probleme_sante_besoin($id)
{
  return $GLOBALS['wpdb']->get_results(
    "SELECT * FROM " . $GLOBALS['table_probleme_sante_besoin']
  );
}
#endregion

#region ADD
/**
 * Fonction
 * 
 * @param Array 
 * 
 * @return Array 
 */
function store_probleme_besoin_pratique()
{

}

/**
 * Fonction
 * 
 * @param Array 
 * 
 * @return Array 
 */
function store_pratique()
{

}

/**
 * Fonction
 * 
 * @param Array 
 * 
 * @return Array 
 */
function store_probleme_sante_besoin()
{

}
#endregion

#region UPDATE


function edit_probleme_besoin_pratique()
{

}

function edit_pratique()
{

}

function edit_probleme_sante_besoin()
{

}
#endregion

#region DELETE
function delete_probleme_besoin_pratique()
{

}
#endregion
