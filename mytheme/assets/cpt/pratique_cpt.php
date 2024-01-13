<?php
// Register Custom Post Type
function pratique_cpt()
{

	$labels = array(
		"name"                  => _x("Pratiques", "Post Type General Name"),
		"singular_name"         => _x("Pratique", "Post Type Singular Name"),
		"menu_name"             => __("Pratique"),
		"name_admin_bar"        => __("Post Type"),
		"archives"              => __("Pratiques (Pour modifier ce titre : pratique_cpt.php)"),
		"attributes"            => __("Item Attributes"),
		"parent_item_colon"     => __("Parent Item:"),
		"all_items"             => __("Toutes les Pratiques"),
		"add_new_item"          => __("Ajouter une nouvelle pratique"),
		"add_new"               => __("Ajouter"),
		"new_item"              => __("Nouvelle pratique"),
		"edit_item"             => __("Editer la pratique"),
		"update_item"           => __("Modifier la pratique"),
		"view_item"             => __("Voir la pratique"),
		"view_items"            => __("Voir les pratiques"),
		"search_items"          => __("Rechercher une pratique"),
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
		"label"                 => __("Pratique"),
		"description"           => __("Tous sur Pratique"),
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
	register_post_type("pratique", $args);

	// Déclaration de la Taxonomie personnalisé
	$labels_taxonomy = array(
		'name' => 'Catégorie de pratique',
		'new_item_name' => 'Nom de la catégorie de pratique',
		'parent_item' => 'Catégorie de la pratique parente',
	);

	$args_taxonomy = array(
		'labels' => $labels_taxonomy,
		'public' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
	);

	register_taxonomy('type-pratique', 'pratique', $args_taxonomy);

}
add_action("init", "pratique_cpt", 0);

add_theme_support('post-thumbnails', array('pratique'));
