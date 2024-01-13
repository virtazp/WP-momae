<?php
// Register Custom Post Type
function probleme_sante_cpt()
{

	$labels = array(
		"name"                  => _x("Problèmes de santé", "Post Type General Name"),
		"singular_name"         => _x("Problème de santé", "Post Type Singular Name"),
		"menu_name"             => __("Problèmes de santé"),
		"name_admin_bar"        => __("Post Type"),
		"archives"              => __("Problèmes de santé (Pour modifier ce titre : pratique_cpt.php)"),
		"attributes"            => __("Item Attributes"),
		"parent_item_colon"     => __("Parent Item:"),
		"all_items"             => __("Tout les problèmes de santé"),
		"add_new_item"          => __("Ajouter un nouveau problème de santé"),
		"add_new"               => __("Ajouter"),
		"new_item"              => __("Nouveau problème de santé"),
		"edit_item"             => __("Editer le problème de santé"),
		"update_item"           => __("Modifier le problème de santé"),
		"view_item"             => __("Voir le problème de santé"),
		"view_items"            => __("Voir les problèmes de santé"),
		"search_items"          => __("Rechercher un problème de santé"),
		"not_found"             => __("Non trouvée"),
		"not_found_in_trash"    => __("Non trouvée dans la corbeille"),
		"featured_image"        => __("Featured Image"),
		"set_featured_image"    => __("Set featured image"),
		"remove_featured_image" => __("Remove featured image"),
		"use_featured_image"    => __("Use as featured image"),
		"insert_into_item"      => __("Insert into item"),
		"uploaded_to_this_item" => __("Uploaded to this item"),
		"items_list"            => __("Items list"),
		"items_list_navigation" => __("Items list navigation"),
		"filter_items_list"     => __("Filter items list"),
	);
	$args = array(
		"label"                 => __("Problèmes de santé"),
		"description"           => __("Tous sur les problèmes de santé"),
		"labels"                => $labels,
		'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes'),
		"taxonomies"            => array("category", "post_tag"),
		"hierarchical"          => false,
		"public"                => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"menu_position"         => 5,
		'menu_icon' => 'dashicons-building',
		"show_in_admin_bar"     => true,
		"show_in_nav_menus"     => true,
		"can_export"            => true,
		"has_archive"           => true,
		"exclude_from_search"   => false,
		"publicly_queryable"    => true,
		"capability_type"       => "page",
		//"rewrite"			  => array("slug" => "pratique"),
	);
	register_post_type("probleme_sante", $args);

	// Déclaration de la Taxonomie personnalisé
	$labels_taxonomy = array(
		'name' => 'Catégorie de problèmes de santé',
		'new_item_name' => 'Nom de la catégorie de Problème de santé',
		'parent_item' => 'Catégorie du problème de santé parente',
	);

	$args_taxonomy = array(
		'labels' => $labels_taxonomy,
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
	);

	register_taxonomy('type-probleme-sante', 'probleme_sante', $args_taxonomy);

}
add_action("init", "probleme_sante_cpt", 0);

add_theme_support('post-thumbnails', array('probleme_sante'));
